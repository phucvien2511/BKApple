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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['ship'] == '0') { //No shipping
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = 'Nhận trực tiếp tại ' . $_POST['storeSelect'];
        $mail = $_POST['mail'];
        $note = '';
    }
    else { //Shipping
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $mail = $_POST['mail'];
        $note = $_POST['note'];
    }

    
}
$name_query = "SELECT * FROM user WHERE id = ?";
$stmt = mysqli_prepare($db_connect, $name_query);
mysqli_stmt_bind_param($stmt, "s", $_SESSION['user_login']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$customerId = mysqli_fetch_assoc($result);
$order_query = "INSERT INTO orders (customerId, address, phone, mail, note) VALUES ('{$_SESSION['user_login']}', '{$address}', '{$phone}', '{$mail}', '{$note}')";
$result = mysqli_query($db_connect, $order_query);
//Get the orderId from $order_query result
$orderId = mysqli_insert_id($db_connect);
//Add products to order_product
//Step 1: Get all products in cart, using prepared statement to prevent SQL injection
$cart_query = "SELECT * FROM cart WHERE customerId = ?";
$stmt = mysqli_prepare($db_connect, $cart_query);
mysqli_stmt_bind_param($stmt, "s", $_SESSION['user_login']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);



//Step 2: Add products to order_product
while ($cart = mysqli_fetch_assoc($result)) {
    $order_product_query = "INSERT INTO order_product (orderId, customerId, productId, quantity) VALUES ('{$orderId}', '{$_SESSION['user_login']}', '{$cart['productId']}', '{$cart['quantity']}');";
    mysqli_query($db_connect, $order_product_query);
}
//Step 3: Delete all products in cart
$delete_query = "DELETE FROM cart WHERE customerId = ?";
$stmt = mysqli_prepare($db_connect, $delete_query);
mysqli_stmt_bind_param($stmt, "s", $_SESSION['user_login']);
mysqli_stmt_execute($stmt);
//Back to orderUI.php
header("Location: orderUI.php");
?>
