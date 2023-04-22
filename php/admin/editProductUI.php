<?php
$product_id = 'AIRPOD2';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (empty($_GET)) {
        $product_id = 'AIRPOD2';
    } else {
        $product_id = trim($_GET["product_id"]);
    }
}
?>

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
$name_query = "SELECT * FROM product WHERE ID = '$product_id';";
$result = mysqli_query($db_connect, $name_query);
$rows = mysqli_fetch_assoc($result);

$price = $rows['price'];
$formatted_price = $formatted_price = number_format($price, 0, '.', '.') . 'đ';
$description = $rows['description'];
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
                        <a href="viewProductList.php"><span class="material-symbols-outlined">arrow_back</span></a>
                        <h1>Chỉnh sửa sản phẩm</h1>
                    </div>
                </div>

                <div class="row">
                    <form class="g-3 needs-validation" method="post" action="editProduct.php" accept-charset="utf-8" novalidate>
                        <div class="col">
                            <h4>Thông tin chung</h4>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="id" placeholder="Enter ID" name="id" pattern="[A-Za-z0-9._]+" value=<?php echo "{$rows['id']}"; ?> required readonly>
                                <label for="id">ID</label>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="productName" placeholder="Enter product name" name="productName" value=<?php echo "{$rows['productName']}"; ?> required>
                                <label for="productName">Tên sản phẩm</label>
                                <div class="invalid-feedback">
                                    Tên sản phẩm sai cú pháp.
                                </div>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="number" min="0" step="1000" class="form-control" id="price" placeholder="Enter Price" name="price" value=<?php echo "{$rows['price']}"; ?> required>
                                <label for="price">Giá</label>
                                <div class="invalid-feedback">
                                    Giá sản phẩm không được để trống.
                                </div>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="date" class="form-control" id="releaseDate" placeholder="Enter release date" name="releaseDate" value=<?php echo "{$rows['releaseDate']}"; ?>>
                                <label for="releaseDate">Ngày ra mắt</label>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="number" min="0" step="1" class="form-control" id="quantity" placeholder="Enter quantity" name="quantity" value=<?php echo "{$rows['quantity']}"; ?>>
                                <label for="quantity">Số lượng sản phẩm</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Mô tả" id="description"><?php echo "{$description}"; ?></textarea>
                                <label for="description">Mô tả chi tiết</label>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-1">
                                    <a href="viewProductList.php" class="btn btn-secondary">Hủy</a>
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
        document.querySelector('.nav-link-product').style.backgroundColor = 'white';
        document.querySelectorAll('.nav-link-product > *').forEach((elem) => {
            elem.style.color = 'black';
        });
        document.querySelectorAll('.nav-link-user > *').forEach((elem) => {
            elem.style.color = 'white';
        });
    </script>
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