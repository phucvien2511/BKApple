<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
    <div class="login-container">
        <h1 class="login-title">Đăng nhập</h1>
        <form method="post">
            <div class="form-group">
                <label for="username">Tên đăng nhập</label>
                <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu">
            </div>
            <button id="submit-btn" name="submit-btn" type="submit">Đăng nhập</button>
        </form>
        <div class="form-footer">
            <a href="#" class="forgot-password">Quên mật khẩu?</a>
            <div>Bạn chưa có tài khoản? <a href="/php/register.php">Đăng ký tại đây. </a></div>
        </div>
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

session_start();


if (isset($_POST["submit-btn"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = mysqli_query($db_connect, "SELECT * FROM customer where username = '$username' and password = '$password'");
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $_SESSION['user_login'] = $username;
        $_SESSION['user_avatar'] = $row['avatar'];
        //--------------------//

        header('Location: /index.php');
    } else {
        echo '<script>alert("Sai tài khoản hoặc mật khẩu. Vui lòng nhập lại.")</script>';
    }
}
?>

</html>