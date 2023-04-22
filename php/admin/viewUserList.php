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
                        <h1>Danh sách người dùng</h1>
                    </div>
                    <div class="col-4">
                        <div class="input-group">
                            <input type="search" id="searchUser" class="form-control" placeholder="Tìm (Theo họ và tên)">
                            <div class="input-group-btn text-white">
                                <button class="btn btn-secondary" id="searchUserButton">
                                    <span class="material-symbols-outlined">search</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter row d-flex justify-content-end mt-3 mb-4">
                    <div class="col-1">
                        <a href="addUserUI.php" class="btn btn-secondary">Thêm</a>
                    </div>
                </div>
                <div class="list row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Username</th>
                                <th scope="col">Họ và tên</th>
                                <th scope="col">SĐT</th>
                                <th scope="col">Mail</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once('getUserList.php')
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
                                if ($page_id == 1) echo "<li class='page-item'><a class='page-link active' href='viewUserList.php?page={$page_id}' id='page-{$page_id}'>{$page_id}</a></li>";
                                else echo "<li class='page-item'><a class='page-link' href='viewUserList.php?page={$page_id}' id='page-{$page_id}'>{$page_id}</a></li>";
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
        document.querySelector('.nav-link-user').style.backgroundColor = 'white';
        document.querySelectorAll('.nav-link-user > *').forEach((elem) => {
            elem.style.color = 'black';
        });
        document.querySelectorAll('.nav-link-product > *').forEach((elem) => {
            elem.style.color = 'white';
        });
    </script>
    <script>
        $(document).ready(function() {
            <?php
            for ($page_id = 1; $page_id <= $page; $page_id++) {
                echo "$('#page-{$page_id}').click(function(e) {";
                echo "e.preventDefault();";
                echo "$.ajax({";
                echo "url: 'getUserList.php',";
                echo "type: 'POST',";
                echo "dataType: 'html',";
                echo "data: {";
                echo "page: '{$page_id}',";
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
            $('#searchUserButton').click(function(e) {
                let name = $('#searchUser').val();
                e.preventDefault();
                $.ajax({
                    url: 'getUserSearch.php',
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        name: name
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