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
$name_query = "DELETE FROM cart WHERE customerId = '{$_SESSION['user_login']}' AND productId = '{$id}';";
// Execute query to insert data into cart table
mysqli_query($db_connect, $name_query);
// Redirect to the previous page
$response = array(
    'message' => 'Product removed from cart!'
);
echo json_encode($response);
?>