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
    <style>
        .order-table {
            width: 100%;
        }
        .column-bg-white {
            width: 95%;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!-- Header -->
        <?php include "../header.php" ?>
        <?php
        $order_query = "SELECT * from orders where customerId = '$_SESSION[user_login]'";
        $order_result = mysqli_query($db_connect, $order_query);
        $orderList = array();
        $totalPriceList = array();
        while ($order = mysqli_fetch_assoc($order_result)) {
            $orderList[] = $order;
                    //Get total price of each order
            $order2_query = "SELECT * from order_product where customerId = '$_SESSION[user_login]' and orderId = '$order[orderId]'";
            $order2_result = mysqli_query($db_connect, $order2_query);
            $productList = array();
            $quantityList = array();
            while ($order2 = mysqli_fetch_assoc($order2_result)) {
                $product_query = "SELECT * from product where id = '$order2[productId]'";
                $product_result = mysqli_query($db_connect, $product_query);
                $product = mysqli_fetch_assoc($product_result);
                $productList[] = $product;
                $quantityList[] = $order2['quantity'];
                $totalPrice = 0;

            }
            foreach ($productList as $key => $product) {
                $totalPrice += $product['price'] * $quantityList[$key];
            }
            $totalPriceList[] = $totalPrice;
        }
        //Get user fullname
        $user_query = "SELECT * from user where username = ?";
        $stmt = mysqli_prepare($db_connect, $user_query);
        mysqli_stmt_bind_param($stmt, "s", $_SESSION['user_login']);
        mysqli_stmt_execute($stmt);
        $user_result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($user_result);

        
        ?>
        
        <!-- End of Header -->
        <div class="wrapper col-12 d-flex flex-column justify-content-center ">
            <!-- Product information -->
            <div class="row d-flex justify-content-center align-items-center mt-4 mb-3 mx-auto column-bg-white">

                <?php
                if (count($orderList) == 0) {
                    echo '<h6 class="my-3 text-center">Bạn chưa thực hiện giao dịch mua hàng nào.</h6>';
                } else {
                    echo '<h6 class="my-3 justify-content-between fw-bold">Danh sách đơn hàng</h6>';
                    echo '<table class="order-table">';
                    echo '<th>Mã đơn</th>';
                    echo '<th>Người nhận</th>';
                    echo '<th>Địa chỉ</th>';
                    echo '<th>Ngày đặt hàng</th>';
                    echo '<th>Tổng tiền</th>';
                    echo '<th>Trạng thái</th>';
                    echo '<th>Chi tiết</th>';
                    for ($i = 0; $i < count($orderList); $i++) {
                        echo '<tr>';
                        echo '<td>' . $orderList[$i]['orderId'] . '</td>';
                        echo '<td>' . $user['name'] . '</td>';
                        echo '<td>' . $orderList[$i]['address'] . '</td>';
                        echo '<td>' . $orderList[$i]['date'] . '</td>';
                        echo '<td>' . number_format($totalPriceList[$i], 0, '.', '.') . 'đ'  . '</td>';
                        echo '<td>' . $orderList[$i]['status'].'</td>';
                        echo '<td><a class="btn btn-primary btn-dark" href="/php/cart/orderDetailUI.php?id=' . $orderList[$i]['orderId'] . '">Xem</a></td>';
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