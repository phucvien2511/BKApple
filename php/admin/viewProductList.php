<?php
$sort = "";
if (!empty($_GET['sort'])) {
    $sort = $_GET['sort'];
}
?>

<!DOCTYPE html>
<html lang="vi">

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
                        <h1>Danh sách sản phẩm
                            <?php echo " ";
                            if (isset($_GET['sort'])) {
                                if ($_GET['sort'] == "iphone") {
                                    echo "iPhone";
                                } else if ($_GET['sort'] == "ipad") {
                                    echo "iPad";
                                } else if ($_GET['sort'] == "mac") {
                                    echo "Mac";
                                } else if ($_GET['sort'] == "watch") {
                                    echo "Watch";
                                } else if ($_GET['sort'] == "sound") {
                                    echo "âm thanh";
                                } else if ($_GET['sort'] == "accessory") {
                                    echo "phụ kiện";
                                }
                            }
                            ?></h1>
                    </div>
                    <div class="col-4">
                        <div class="input-group">
                            <input type="search" id="searchProduct" class="form-control" placeholder="Tìm (Theo tên sản phẩm)">
                            <div class="input-group-btn text-white">
                                <button class="btn btn-secondary" id="searchProductButton">
                                    <span class="material-symbols-outlined">search</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter row justify-content-between mt-3 mb-4">
                    <div class="col-3 dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="true">
                            Phân loại
                        </button>
                        <ul class="dropdown-menu" data-popper-placement="bottom-end">
                            <li><a class="dropdown-item" href="/php/admin/viewProductList.php">Tất cả</a></li>
                            <li><a class="dropdown-item" href="?sort=iphone">iPhone</a></li>
                            <li><a class="dropdown-item" href="?sort=ipad ">iPad</a></li>
                            <li><a class="dropdown-item" href="?sort=mac">Mac</a></li>
                            <li><a class="dropdown-item" href="?sort=watch">Watch</a></li>
                            <li><a class="dropdown-item" href="?sort=sound">Âm thanh</a></li>
                            <li><a class="dropdown-item" href="?sort=accessory">Phụ kiện</a></li>
                        </ul>
                    </div>

                    <div class="col-1">
                        <a href="addProductUI.php" class="btn btn-secondary">Thêm</a>
                    </div>
                </div>
                <div class="list row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Mã sản phẩm</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá thành</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Đã bán</th>
                                <th scope="col">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once('getProductList.php')
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="page">
                    <ul class="pagination justify-content-end">
                        <?php
                        $page = ceil($number_of_product / 10);
                        if ($page > 1) {
                            for ($page_id = 1; $page_id <= $page; $page_id++) {
                                if ($page_id == 1) echo "<li class='page-item'><a class='page-link active' href='./productManager.php?page={$page_id}' id='page-{$page_id}'>{$page_id}</a></li>";
                                else echo "<li class='page-item'><a class='page-link' href='./productManager.php?page={$page_id}' id='page-{$page_id}'>{$page_id}</a></li>";
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function() {
            <?php
            for ($page_id = 1; $page_id <= $page; $page_id++) {
                echo "$('#page-{$page_id}').click(function(e) {";
                echo "e.preventDefault();";
                echo "$.ajax({";
                echo "url: 'getProductList.php',";
                echo "type: 'POST',";
                echo "dataType: 'html',";
                echo "data: {";
                echo "page: '{$page_id}',";
                echo "sort: '{$sort}'";
                echo "}";
                echo "}).done(function(result) {";
                echo '$("tbody").html(result);';
                echo '$(".page").show();';
                echo "});";
                echo "$('a').removeClass('active');";
                echo "$('#page-{$page_id}').addClass('active')";
                echo "});";
            }
            ?>
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#searchProductButton').click(function(e) {
                let name = $('#searchProduct').val();
                e.preventDefault();
                $.ajax({
                    url: 'getProductSearch.php',
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        productName: name
                    }
                }).done(function(result) {
                    $("tbody").html(result);
                    $(".page").hide();
                });
            });
        });
        document.querySelector('.nav-link-product').style.backgroundColor = 'white';
        document.querySelectorAll('.nav-link-product > *').forEach((elem) => {
            elem.style.color = 'black';
        });
        document.querySelectorAll('.nav-link-user > *').forEach((elem) => {
            elem.style.color = 'white';
        });
    </script>
</body>

</html>