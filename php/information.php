

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/information.css">

</head>

<body>
    <?php include 'header.php' ?>
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
    $user_name = $_SESSION['user_login'];
    $stmt = mysqli_prepare($db_connect, "SELECT * FROM user where username = ?");
    mysqli_stmt_bind_param($stmt, "s", $user_name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    

        // Fetch the first row as an associative array
        $row = mysqli_fetch_assoc($result);
        // Extract customer information into variables
        $name = $row["name"];
        $address = $row["address"];
        $birthday = $row["birthday"];
        $mail = $row["mail"];
        $phone = $row["phone"];
        $password = $row["password"];
        $avatar_url = $row["avatar"];
?>
    
    <div class="wrapper mt-4">
        <h1 class="row">Thông tin cá nhân</h1>
        <div class="mt-4 d-flex flex-md-row flex-column align-items-center justify-content-between">
            <img src="<?php echo $avatar_url; ?>" alt="Avatar col-4" class="avatar rounded-circle">
            <form class="col-8" method="post" action="./updateInfo.php">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên" value="<?php echo $name ?>" >
                    <label for="name" style="color: grey;">Họ và tên</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Ngày tháng năm sinh" value="<?php echo $birthday ?>" >
                    <label for="birthday" style="color: grey;">Ngày tháng năm sinh</label>
                </div>
                <div class="form-floating my-3">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại" value="<?php echo $phone ?>" >
                    <label for="phone" style="color: grey;">Số điện thoại</label>
                </div>
                <div class="form-floating my-3">
                    <input type="text" class="form-control" id="mail" name="mail" placeholder="Mail (Ví dụ: example@gmail.com)" value="<?php echo $mail ?>" >
                    <label for="mail" style="color: grey;">Mail</label>
                </div>
                <div class="form-floating my-3">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ (Ví dụ: 268 Lý Thường Kiệt, Phường 14, Quận 10, TP.HCM" value="<?php echo $address ?>" >
                    <label for="address" style="color: grey;">Địa chỉ</label>
                </div>
                <div class="form-floating my-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" value="<?php echo $password ?>" >
                    <label for="password" style="color: grey;">Mật khẩu</label>
                </div>
                <button type="submit" name="submit-btn" id="submit-btn" class="btn btn-primary w-100">Thay đổi</button>
            </form>
        </div>
    </div>
    <?php include 'footer.php' ?>    

    <!-- Update Modal -->


    
    <script src="/js/bootstrap.bundle.min.js"></script>
    <!-- <script>
        const submitBtn = document.getElementById("submit-btn");
        submitBtn.addEventListener("click", () => {
            alert("Cập nhật thông tin thành công!");
        })
    </script> -->

</body>
</html>