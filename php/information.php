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

    $result = mysqli_query($db_connect, "SELECT * FROM user where username = '$user_name'");

    if (mysqli_num_rows($result) > 0) {
        // Fetch the first row as an associative array
        $row = mysqli_fetch_assoc($result);
        
        // Extract customer information into variables
        $full_name = $row["name"];
        $address = $row["address"];
        $birthday = $row["birthday"];
        $email = $row["mail"];
        $phone_number = $row["phone"];
        $password = $row["password"];
        $avatar_url = $row["avatar"];

    } else {
        echo "No customer information found.";
    }

    if (isset($_POST["submit-btn"])){
        $full_name = $_POST['full_name'];
        $address = $_POST['address'];
        $birthday = $_POST['birthday'];
        $email = $_POST['email'];
        $phone = $_POST['phone_number'];
        $password = $_POST['password'];

        $sql = "UPDATE user SET name='$full_name', address='$address', birthday='$birthday', mail='$email', phone='$phone', password='$password' WHERE username='$user_name'";
        $result = mysqli_query($db_connect, $sql);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/information.css">
</head>

<body>
    <div class="container mt-4">
        <h1>Thông tin cá nhân</h1>
        <div class="row mt-4">
            <div class="col-md-4">
                <!-- Avatar -->
                <img src="<?php echo $avatar_url ?>" alt="Avatar" class="img-fluid rounded-circle">
            </div>
            <div class="col-md-8">
                <div class="customer-info">
                    <!-- Full Name -->
                    <p><strong>Họ và tên:</strong> <?php echo $full_name; ?></p>
                    <!-- Address -->
                    <p><strong>Địa chỉ:</strong> <?php echo $address; ?></p>
                    <!-- Birthday -->
                    <p><strong>Sinh nhật:</strong> <?php echo $birthday; ?></p>
                    <!-- Email -->
                    <p><strong>Email:</strong> <?php echo $email; ?></p>
                    <!-- Phone Number -->
                    <p><strong>Số điện thoại:</strong> <?php echo $phone_number; ?></p>
                    <!-- Password (hidden) -->
                    <p><strong>Mật khẩu:</strong> ********</p>
                </div>
            </div>
        </div>
    </div>

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal">Thay đổi thông tin cá nhân</button>

    <!-- Update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Thay đổi thông tin cá nhân</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="information.php" method="post">
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo $full_name ?>">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo $address ?>">
                        </div>
                        <div class="mb-3">
                            <label for="birthday" class="form-label">Sinh nhật</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo $birthday ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>">
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Số điện thoại</label>
                            <input type="tel" class="form-control" id="phone_number" name="phone_number" value="<?php echo $phone_number ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $password ?>">
                        </div>
                        <button id="submit-btn" name="submit-btn" type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <script src="/js/bootstrap.bundle.min.js"></script>

</body>
</html>
