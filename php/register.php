<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/register.css">
</head>

<body>
    <div class="login-container">
        <h1 class="login-title">Đăng kí tài khoản</h1>
        <form method="post">
            <div class="form-group">
                <label for="username">Tên đăng nhập</label>
                <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>
            <div class="form-group">
                <label for="fullName">Họ và Tên</label>
                <input type="text" id="fullName" name="fullName" placeholder="Nhập họ và tên" required>
            </div>
            <div class="form-group">
                <label for="birthday">Birthday</label>
                <input type="date" id="birthday" name="birthday" required>
            </div>
            <div class="form-group">
                <label for="phoneNumber">Số điện thoại</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Nhập số điện thoại" pattern="[0-9]{10}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Nhập Email" required>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ nhà</label>
                <input type="text" id="address" name="address" placeholder="Nhập địa chỉ nhà" required>
            </div>
            <button id="btnSubmit" name="btnSubmit" type="submit">Đăng Ký</button>
        </form>
    </div>
</body>
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

if (isset($_POST["btnSubmit"])) {

    $usernameRegister = $_POST['username'];
    $passwordRegister = $_POST['password'];
    $fullNameRegister = $_POST['fullName'];
    $birthdayRegister = $_POST['birthday'];
    $phoneNumberRegister = $_POST['phoneNumber'];
    $emailRegister = $_POST['email'];
    $addressRegister = $_POST['address'];

    if (
        !empty($usernameRegister)
        && !empty($passwordRegister)
        && !empty($fullNameRegister)
        && !empty($birthdayRegister)
        && !empty($phoneNumberRegister)
        && !empty($emailRegister)
        && !empty($addressRegister)
    ) {
        $checkUsername = mysqli_query($db_connect, "SELECT * FROM customer where username = '$usernameRegister'");
        $row = mysqli_num_rows($checkUsername);
        if ($row > 0) {
            $message = "Tên đăng nhập đã được sử dụng. Vui lòng chọn tên đăng nhập khác!";
            echo '<script>alert("' . $message . '");</script>';
        } else {
            $query = "INSERT INTO `customer`(`username`, `password`, `name`, `birthday`, `phone`, `mail`, `address`) VALUES 
                    ('$usernameRegister','$passwordRegister','$fullNameRegister','$birthdayRegister','$phoneNumberRegister','$emailRegister','$addressRegister')";
            $result = mysqli_query($db_connect, $query);
            header('Location: /php/login.php');
        }
    }
}
?>

</html>