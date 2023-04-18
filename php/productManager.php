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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <div class="container-fluid">
        <div class="row">      
            <?php include "productSidebar.php"?>

            <div class="content d-flex flex-column flex-shrink-0 p-3 text-white col-8 container">
                <div class="navigation row">
                    <div class="col">
                        <h1>Sản phẩm</h1>
                    </div>
                    <div class="col-4">
                        <div class="input-group">
                            <input type="search" id="searchProduct" class="form-control" placeholder="Search">
                            <div class="input-group-btn text-white">
                                <button class="btn btn-secondary" id="searchProductButton" >
                                    <span class="material-symbols-outlined">search</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter row justify-content-between">
                    <div class="col-3 dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="true">
                            Mặt hàng
                        </button>
                        <ul class="dropdown-menu" data-popper-placement="bottom-end">
                            <li><a class="dropdown-item" href="?&amp;sort=iphone">iPhone</a></li>
                            <li><a class="dropdown-item" href="?&amp;sort=ipad ">iPad</a></li>
                            <li><a class="dropdown-item" href="?&amp;sort=mac">Mac</a></li>
                            <li><a class="dropdown-item" href="?&amp;sort=watch">Watch</a></li>
                            <li><a class="dropdown-item" href="?&amp;sort=sound">Âm thanh</a></li>
                            <li><a class="dropdown-item" href="?&amp;sort=accessory">Phụ kiện</a></li>                        
                        </ul>
                    </div>

                    <div class="col-1">
                        <a href="./addProduct.php" class="btn btn-secondary">Thêm</a>
                    </div>
                </div>
                <div class="list row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá thành</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Đã bán</th>
                                <th scope="col">Tương tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include_once('./getProductList.php')
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
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.1.min.js"></script>

    <script>
        $(document).ready(function() {
            <?php 
                for ($page_id = 1; $page_id <= $page; $page_id++) {
                    echo "$('#page-{$page_id}').click(function(e) {";
                    echo "e.preventDefault();";
                    echo "$.ajax({";
                    echo "url: './getProductList.php',";
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
                    url: './getProductSearch.php',
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
    </script>
</body>

</html>