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

$user_id = $_GET['user_id'];
$name_query = "SELECT * FROM user WHERE id = ?";
$stmt = mysqli_prepare($db_connect, $name_query);

// Bind the parameter to the prepared statement and execute it
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);

// Get the results of the query
$result = mysqli_stmt_get_result($stmt);
$rows = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - BKApple</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/viewProduct.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include "sidebar.php" ?>
            <div class="content d-flex flex-column flex-shrink-0 p-3 text-white col-8 container">
                <div class="navigation row">
                    <div class="col">
                        <a href="viewUserList.php"><span class="material-symbols-outlined">arrow_back</span></a>
                        <h1><?php echo "{$rows['name']}"; ?></h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <a href="./editUserUI.php?user_id=<?php echo "$user_id"; ?>" class="btn btn-dark">Chỉnh sửa</a>
                    </div>

                    <div class="col-2">
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#deleteProduct">
                            Xóa
                        </button>

                        <div class="modal fade" id="deleteProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby='deleteProductLabel' aria-hidden="true">
                            <div class="modal-dialog text-white">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteProductLabel">Xóa khách hàng</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn muốn xóa khách hàng <?php echo "{$rows['name']}"; ?> khỏi danh sách khách hàng ?
                                        Khách hàng sau khi xóa không thể khôi phục.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                        <?php echo "<a href='./deleteUser.php?user_id={$rows['id']}' class='btn btn-primary'>Xác nhận</a>"; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-content row">
                    <div class="col">
                        <h2>Thông tin chi tiết</h2>
                        <table class="table">
                            <tbody>
                                <?php
                                echo "<tr>";
                                echo "<th scope='row'>ID</th>";
                                echo "<td>{$rows['id']}</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th scope='row'>Tên đăng nhập</th>";
                                echo "<td>{$rows['username']}</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th scope='row'>Mật khẩu</th>";
                                echo "<td>{$rows['password']}</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th scope='row'>Họ và tên</th>";
                                echo "<td>{$rows['name']}</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th scope='row'>Sinh nhật</th>";
                                echo "<td>{$rows['birthday']}</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th scope='row'>Số điện thoại</th>";
                                echo "<td>{$rows['phone']}</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th scope='row'>Mail</th>";
                                echo "<td>{$rows['mail']}</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th scope='row'>Địa chỉ</th>";
                                echo "<td>{$rows['address']}</td>";
                                echo "</tr>";
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <h2>Lịch sử mua hàng</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Mã đơn</th>
                                <th scope="col">Ngày đặt hàng</th>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $name_query = "SELECT * FROM orders WHERE customerId = '{$rows['username']}';";
                            $result = mysqli_query($db_connect, $name_query);
                            $username = $rows['username'];
                            $number_of_product = mysqli_num_rows($result);
                            if ($number_of_product == 0) {
                                echo "<tr>";
                                echo "<td colspan='3'>Không có sản phẩm nào.</td>";
                                echo "</tr>";
                            }

                            while ($rows = mysqli_fetch_assoc($result)) {
                                //Set 2 column id and date as th
                                echo "<tr>";
                                echo "<th scope='row'>{$rows["orderId"]}</th>";
                                echo "<td>{$rows["date"]}</td>";

                                $order_product_query = "SELECT * FROM order_product WHERE customerId = '$username' AND orderId = '{$rows['orderId']}';";
                                $order_product_result = mysqli_query($db_connect, $order_product_query);
                                echo "<td>";
                                $orderPrice = 0;
                                while($order_product = mysqli_fetch_assoc($order_product_result)) {
                                    $product_query = "SELECT * FROM product WHERE id = '{$order_product['productId']}';";
                                    $product_result = mysqli_query($db_connect, $product_query);
                                    $product = mysqli_fetch_assoc($product_result);
                                    
                                    // echo "<th scope='row'>{$product["productName"]}</th>";
                                    // echo "<td>{$order_product["quantity"]}</td>";
                                    // echo "<td>";
                                    // echo $product['price'] * $order_product['quantity'];
                                    // echo "</td>";
                                    // echo "</tr>";
                                    // echo "<tr>";
                                    // echo "<th scope='row'>{$order_product["orderId"]}</th>";
                                    // echo "<td>{$rows["date"]}</td>";
                                    // echo "</tr>";
                                    //Stack all product name into 1 column
                                    echo "{$product["productName"]}";
                                    echo "  x{$order_product["quantity"]}<br>";
                                    $orderPrice += $product['price'] * $order_product['quantity'];
                                }
                                echo "</td>";
                                echo "<td>";
                                echo number_format($orderPrice, 0, ',', '.') . 'đ';
                                echo "</td>";
                                echo "<td>";
                                echo "{$rows["status"]}";
                                echo "<td>";

                                echo "<a href='/php/cart/changeOrderStatus.php?id={$rows['orderId']}&status={$rows["status"]}' class='btn btn-primary order-manage".$rows['orderId']."'>";
                                if ($rows['status'] == 'Chưa xác nhận') {
                                    echo "Duyệt đơn";
                                }
                                else if ($rows['status'] == 'Đang xử lý') {
                                    echo "Giao hàng";
                                }
                                else if ($rows['status'] == 'Đang giao hàng') {
                                    echo "Hoàn thành";
                                }
                                echo "</a>";
                                echo "</td>";
                                echo "</tr>";
                                //echo "<script>alert('Cập nhật trạng thái cho đơn hàng thành công!');</script>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-3.6.1.min.js"></script>
    <script>
        document.querySelector('.nav-link-user').style.backgroundColor = 'white';
        document.querySelectorAll('.nav-link-user > *').forEach((elem) => {
            elem.style.color = 'black';
        });
        document.querySelectorAll('.nav-link-product > *').forEach((elem) => {
            elem.style.color = 'white';
        });
    </script>
</body>

</html>

<?php mysqli_close($db_connect); ?>