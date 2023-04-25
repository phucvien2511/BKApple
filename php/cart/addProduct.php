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
$id = $_POST['id'];
$name_query = "INSERT INTO cart (customerId, productId, quantity) VALUES ('{$_SESSION['user_login']}', '$id', '1');";
// Execute query to insert data into cart table
mysqli_query($db_connect, $name_query);
//Response a message
$response = array(
    'message' => 'success'
);
echo json_encode($response);
?>