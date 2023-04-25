

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "applestore";
//Connect to database
$user_id = $_GET['user_id'];
$db_connect = mysqli_connect($servername, $username, $password, $db);
//Check connection
if (!$db_connect) {
    die("Connection failed: " . mysqli_connect_error());
}
$name_query = "SELECT * FROM user WHERE ID = ?";
$stmt = mysqli_prepare($db_connect, $name_query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$rows = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - BKApple</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include "sidebar.php" ?>

            <div class="content d-flex flex-column flex-shrink-0 p-3 text-white col-8 container">
                <div class="navigation row">
                    <div class="col">
                        <a href="viewUserDetail.php?user_id=<?php echo $user_id ?>"><span class="material-symbols-outlined">arrow_back</span></a>
                        <h1>Chỉnh sửa tài khoản người dùng</h1>
                    </div>
                </div>

                <div class="row">
                    <form class="g-3 needs-validation" method="post" action="editUser.php" novalidate>
                        <div class="col">
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="customerusername" placeholder="Enter username" name="customerusername" pattern="[A-Za-z0-9]+" required value="<?php echo "{$rows["username"]}"; ?>" readonly>
                                <label for="customerusername">Tên tài khoản</label>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="customerpassword" placeholder="Enter password" name="customerpassword" required value="<?php echo $rows['password']; ?>">
                                <label for="customerpassword">Mật khẩu</label>
                                <div class="invalid-feedback">
                                    Mật khẩu sai cú pháp.
                                </div>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required value="<?php echo "{$rows["name"]}"; ?>">
                                <label for="name">Tên người dùng</label>
                                <div class="invalid-feedback">
                                    Tên người dùng sai cú pháp.
                                </div>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="date" class="form-control" id="birthDay" placeholder="Enter birthday" name="birthDay" value="<?php echo "{$rows["birthday"]}"; ?>">
                                <label for="birthDay">Ngày sinh</label>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="phone" placeholder="Enter phone" pattern="[0-9]+" name="phone" value="<?php echo "{$rows["phone"]}"; ?>">
                                <label for="phone">Số điện thoại</label>
                                <div class="invalid-feedback">
                                    Số điện thoại sai cú pháp.
                                </div>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo "{$rows['mail']}"; ?>">
                                <label for="email">Email</label>
                                <div class="invalid-feedback">
                                    Email sai cú pháp.
                                </div>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" value="<?php echo "{$rows["address"]}"; ?>">
                                <label for="address">Địa chỉ</label>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-1">
                                    <a href="viewUserList.php" class="btn btn-secondary">Hủy</a>
                                </div>
                                <div class="col-1">
                                    <button type="submit" class="btn btn-secondary">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-3.6.1.min.js"></script>
    <script src="/js/addProduct.js"></script>

    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>