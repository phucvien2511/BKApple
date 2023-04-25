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

if ($amt == "inc") {
    $update_query = "UPDATE cart SET quantity = quantity + 1 WHERE customerId = '{$_SESSION['user_login']}' AND productId = '{$id}';";

} 
else {
    $update_query = "UPDATE cart SET quantity = quantity - 1 WHERE customerId = '{$_SESSION['user_login']}' AND productId = '{$id}';";
}
mysqli_query($db_connect, $update_query);
//Get the new quantity and calculate total price then response it
//TODO
// Get the new quantity
$get_quantity_query = "SELECT quantity FROM cart WHERE customerId = '{$_SESSION['user_login']}' AND productId = '{$id}'";
$result = mysqli_query($db_connect, $get_quantity_query);
$row = mysqli_fetch_assoc($result);
$new_quantity = $row['quantity'];

// Calculate the total price
$get_price_query = "SELECT price FROM product WHERE id = '{$id}'";
$result = mysqli_query($db_connect, $get_price_query);
$row = mysqli_fetch_assoc($result);
$price = $row['price'];
$total_price = $price * $new_quantity;
$all_price_query = "SELECT * FROM cart WHERE customerId = '{$_SESSION['user_login']}'";
$all_price_result = mysqli_query($db_connect, $all_price_query);
$all_cart_price = 0;
while($row = mysqli_fetch_assoc($all_price_result)) {
    $get_price_query = "SELECT price FROM product WHERE id = '{$row['productId']}'";
    $price_result = mysqli_query($db_connect, $get_price_query);
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