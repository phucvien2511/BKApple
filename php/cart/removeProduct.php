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
//Check url paramater
$id = $_GET['id'];
$user_login = $_SESSION['user_login'];
// Get the quantity value from the cart table
$quantity_query = "SELECT quantity FROM cart WHERE customerId = ? AND productId = ?";
$stmt = mysqli_prepare($db_connect, $quantity_query);
mysqli_stmt_bind_param($stmt, "ss", $user_login, $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$removed_quantity = $row['quantity'];
// Get the price of removed product
$removed_price_query = "SELECT price FROM product WHERE id = ?";
$stmt = mysqli_prepare($db_connect, $removed_price_query);
mysqli_stmt_bind_param($stmt, "s", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$removed_price = $row['price'] * $removed_quantity;
// Delete the row from the cart table
$delete_query = "DELETE FROM cart WHERE customerId = ? AND productId = ?";
$stmt = mysqli_prepare($db_connect, $delete_query);
mysqli_stmt_bind_param($stmt, "ss", $user_login, $id);
mysqli_stmt_execute($stmt);


// Redirect to the previous page
$response = array(
    'removed_price' => $removed_price
);
echo json_encode($response);
?>