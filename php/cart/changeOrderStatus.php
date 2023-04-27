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
session_start();
$status = $_GET['status'];
$orderId = $_GET['id'];
if ($status == 'Chưa xác nhận') {
    $status = 'Đang xử lý';
}
else if ($status == 'Đang xử lý') {
    $status = 'Đang giao hàng';
}
else if ($status == 'Đang giao hàng') {
    $status = 'Đã giao hàng';
}
$update_query = "UPDATE orders SET status = '{$status}' WHERE orderId = '{$orderId}'";
mysqli_query($db_connect, $update_query);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>