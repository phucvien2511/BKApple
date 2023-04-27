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
        <h1 class="login-title">Thay đổi mật khẩu</h1>
        <form method="post">
            <div class="form-group">
                <label for="username">Tên đăng nhập</label>
                <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu">
            </div>
            <div class="form-group">
                <label for="password2">Xác nhận mật khẩu</label>
                <input type="password" id="password2" name="password2" placeholder="Nhập lại mật khẩu">
            </div>
            <p id="incorrect-password"></p>
            <button id="submit-btn" name="submit-btn" type="submit">Đổi mật khẩu</button>
        </form>
        <div class="form-footer">
            <div>Bạn đã có tài khoản? <a href="/php/login.php">Đăng nhập tại đây. </a></div>
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


if (isset($_POST["submit-btn"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    //Check password
    if ($password != $password2) {
        echo "<script>document.querySelector('#incorrect-password').innerText = 'Mật khẩu không khớp, vui lòng nhập lại.';</script>";
    }
    else {

    
    //Prepare the SQL query
    $stmt = mysqli_prepare($db_connect, "UPDATE user SET password = '$password' where username = ?");
    
    //Bind the variables to the placeholders in the prepared statement
    mysqli_stmt_bind_param($stmt, "s", $username);
    
    //Execute the prepared statement
    mysqli_stmt_execute($stmt);
    header('Location: /php/login.php');
    }
}
?>


</html>