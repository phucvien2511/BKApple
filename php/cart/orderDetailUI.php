<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "applestore";
//Connect to database
$db_connect = mysqli_connect($servername, $username, $password, $db);
//Check connection
if (!$db_connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/order_style.css">
</head>

<body>
    <div class="container-fluid">
        <!-- Header -->
        <?php include "../header.php" ?>
        <?php
        $orderId = $_GET['id'];
        $order_query = "SELECT * from order_product where customerId = '$_SESSION[user_login]' and orderId = '$orderId'";
        $order_result = mysqli_query($db_connect, $order_query);
        $productList = array();
        $quantityList = array();
        while ($order = mysqli_fetch_assoc($order_result)) {
            $product_query = "SELECT * from product where id = '$order[productId]'";
            $product_result = mysqli_query($db_connect, $product_query);
            $product = mysqli_fetch_assoc($product_result);
            $productList[] = $product;
            $quantityList[] = $order['quantity'];
            
        }
        ?>
        <!-- End of Header -->
        <div class="wrapper col-12 d-flex flex-column justify-content-center ">
            <!-- Product information -->
            <div class="row d-flex justify-content-center align-items-center mt-4 mb-3 mx-auto column-bg-white">

                <?php
                if (count($productList) == 0) {
                    echo '<h6 class="my-3 text-center">Mã đơn hàng không hợp lệ. Vui lòng thử lại.</h6>';
                } else {
                    echo '<h6 class="my-3 justify-content-between fw-bold">Chi tiết đơn hàng ID = ' . $orderId . '</h6>';
                    echo '<table class="order-table">';
                    echo '<th>STT</th>';
                    echo '<th>Tên sản phẩm</th>';
                    echo '<th>Số lượng</th>';
                    echo '<th>Giá</th>';
                    echo '<th>Thành tiền</th>';
                    for ($i = 0; $i < count($productList); $i++) {
                        echo '<tr>';
                        echo '<td>' . ($i + 1) . '</td>';
                        echo '<td>' . $productList[$i]['productName'] . '</td>';
                        echo '<td>' . $quantityList[$i] . '</td>';
                        echo '<td>' . number_format($productList[$i]['price'], 0, '.', '.') . 'đ'  . '</td>';
                        echo '<td>' . number_format($productList[$i]['price'] * $quantityList[$i], 0, '.', '.') . 'đ' . '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                }
                ?>

            </div>
        </div>
            <!-- End product information -->
           
        <!-- Footer -->
        <?php include "../footer.php" ?>
        <!-- End of Footer -->
    </div>

    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-3.6.1.min.js"></script>
    <script>
        function formatPrice(price) {
            const formatter = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND',
            });
            return formatter.format(price).replace('₫', '').trim();
        }

    </script>

</body>

</html>