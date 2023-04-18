<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - BKApple</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include "userSidebar.php"?>

            <div class="content d-flex flex-column flex-shrink-0 p-3 text-white col-8 container">
                <div class="navigation row">
                    <div class="col">
                        <h1>Thêm khách hàng</h1>
                    </div>
                </div>

                <div class="row">
                    <form class="g-3 needs-validation" method="post" action="./addUserControler.php" novalidate>
                        <div class="col">
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="customerusername" placeholder="Enter username" name="customerusername" pattern="[A-Za-z0-9]+" required>
                                <label for="customerusername">Tên tài khoản</label>
                                <div class="invalid-feedback">
                                    Tên tài khoản sai cú pháp.
                                </div>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="password" class="form-control" id="customerpassword" placeholder="Enter password" name="customerpassword" required>
                                <label for="customerpassword">Mật khẩu</label>
                                <div class="invalid-feedback">
                                    Mật khẩu sai cú pháp.
                                </div>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
                                <label for="name">Tên người dùng</label>
                                <div class="invalid-feedback">
                                    Tên người dùng sai cú pháp.
                                </div>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="date" class="form-control" id="birthDay" placeholder="Enter birthday" name="birthDay">
                                <label for="birthDay">Ngày sinh</label>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="phone" placeholder="Enter phone" pattern="[0-9]+" name="phone">
                                <label for="phone">Số điện thoại</label>
                                <div class="invalid-feedback">
                                    Số điện thoại sai cú pháp.
                                </div>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                <label for="email">Email</label>
                                <div class="invalid-feedback">
                                    Email sai cú pháp.
                                </div>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="address" placeholder="Enter address" name="address">
                                <label for="address">Địa chỉ</label>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-1">
                                    <a href="./userManager.php" class="btn btn-secondary">Hủy</a>
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
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.1.min.js"></script>
    <script src="../js/addProduct.js"></script>

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