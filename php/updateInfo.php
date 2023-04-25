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
    $user_name = $_SESSION['user_login'];
    if (isset($_POST["submit-btn"])) {
        $nameForm = $_POST['name'];
        $addressForm = $_POST['address'];
        $birthdayForm = $_POST['birthday'];
        $mailForm = $_POST['mail'];
        $phoneForm = $_POST['phone'];
        $passwordForm = $_POST['password'];
    
        $sql = "UPDATE user SET name='$nameForm', address='{$addressForm}', birthday='{$birthdayForm}', mail='{$mailForm}', phone='{$phoneForm}', password='{$passwordForm}' WHERE username='{$user_name}';";
        $result = mysqli_query($db_connect, $sql);
        echo'<script>alert("Update successfully!");</script>';
    }
    echo '<script>window.location.href = "information.php";</script>';
?>