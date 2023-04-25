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

$id = $_GET['id'];
$amt = $_GET['amt'];
session_start();
$user_login = $_SESSION['user_login'];

// Prepare and execute the update query
if ($amt == "inc") {
    $update_query = "UPDATE cart SET quantity = quantity + 1 WHERE customerId = ? AND productId = ?";
} else {
    $update_query = "UPDATE cart SET quantity = quantity - 1 WHERE customerId = ? AND productId = ?";
}
$stmt = mysqli_prepare($db_connect, $update_query);
mysqli_stmt_bind_param($stmt, "ss", $user_login, $id);
mysqli_stmt_execute($stmt);

// Get the new quantity and calculate total price then response it
$get_quantity_query = "SELECT quantity FROM cart WHERE customerId = ? AND productId = ?";
$stmt = mysqli_prepare($db_connect, $get_quantity_query);
mysqli_stmt_bind_param($stmt, "ss", $user_login, $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$new_quantity = $row['quantity'];

// Calculate the total price of the product which has been updated quantity
$get_price_query = "SELECT price FROM product WHERE id = ?";
$stmt = mysqli_prepare($db_connect, $get_price_query);
mysqli_stmt_bind_param($stmt, "s", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$price = $row['price'];
$total_price = $price * $new_quantity;

// Calculate the total cart price
$all_price_query = "SELECT * FROM cart WHERE customerId = ?";
$stmt = mysqli_prepare($db_connect, $all_price_query);
mysqli_stmt_bind_param($stmt, "s", $user_login);
mysqli_stmt_execute($stmt);
$all_price_result = mysqli_stmt_get_result($stmt);
$all_cart_price = 0;
while($row = mysqli_fetch_assoc($all_price_result)) {
    $get_price_query = "SELECT price FROM product WHERE id = ?";
    $stmt = mysqli_prepare($db_connect, $get_price_query);
    mysqli_stmt_bind_param($stmt, "s", $row['productId']);
    mysqli_stmt_execute($stmt);
    $price_result = mysqli_stmt_get_result($stmt);
    $price = mysqli_fetch_assoc($price_result);
    $all_cart_price += ($price['price'] * $row['quantity']);
}

// Return the new quantity and total price as JSON
$response = array(
    'quantity' => $new_quantity,
    'total_price' => $total_price,
    'cart_price' => $all_cart_price
);
echo json_encode($response);


?>