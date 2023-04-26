

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
$product_id = trim($_GET["product_id"]);
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
    <link rel="stylesheet" href="/css/viewProduct.css">
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
                        <h1><?php echo "{$rows['productName']}"; ?></h1>
                    </div>
                </div>

                <div class="main-content row">
                    <div class="col-5 picture-container">
                        <?php
                        $colorList = explode(",", $rows['color']);
                        $colorDefault = '';
                        if (count($colorList) > 1) {
                            $colorDefault = "_{$colorList[1]}";
                        } else {
                            $colorDefault = "";
                        }
                        ?>
                        <div class="row">
                            <?php
                            echo "<img id='thumbnail' src='{$rows['thumbnail']}{$colorDefault}.png' class='thumbnail' alt='Thumbnail'>";
                            ?>
                        </div>
                        <div class="row my-3">
                            <div class="col">
                                <?php
                                echo "<img id='thumbnailsmall1' src='{$rows['thumbnail']}{$colorDefault}_small1.png' class='thumbnail' alt='ThumbnailSmall1' style='border-radius: 10px;'>";
                                ?>
                            </div>
                            <div class="col">
                                <?php
                                echo "<img id='thumbnailsmall2' src='{$rows['thumbnail']}{$colorDefault}_small2.png' class='thumbnail' alt='ThumbnailSmall2' style='border-radius: 10px;'>";
                                ?>
                            </div>
                        </div>
                        <div class="row color my-3">
                            <?php
                            if (count($colorList) > 1) {
                                foreach ($colorList as $color) {
                                    echo "<div class='col'>";
                                    echo '<button class="chooseColor" style="background-color: ' . $color . '; width: 50px; height: 50px; border-radius: 25px;" onclick="changeImageSource(\'' . $rows['thumbnail'] . '_' . $color . '\')"></button>';
                                    echo "</div>";
                                }
                            } else {
                                echo "<div class='col'>";
                                echo '<button class="chooseColor" style="background-color: ' . $colorList[0] . '; width: 50px; height: 50px; border-radius: 25px;"></button>';
                                echo "</div>";
                            }
                            ?>
                        </div>
                        <div class="row">
                            <div class="col">
                                <a href="editProductUI.php?product_id=<?php echo "$product_id"; ?>" class="btn btn-dark">Chỉnh sửa</a>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#deleteProduct">
                                    Xóa
                                </button>

                                <div class="modal fade" id="deleteProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteProductLabel" aria-hidden="true">
                                    <div class="modal-dialog text-white">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteProductLabel">Xóa sản phẩm</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn muốn xóa mặt hàng <?php echo "{$rows['productName']}"; ?> khỏi danh sách sản phẩm ?
                                                Sản phẩm sau khi xóa không thể khôi phục.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                <?php echo "<a href='deleteProduct.php?product_id={$rows['id']}' class='btn btn-primary'>Xác nhận</a>"; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <h2>Thông tin chi tiết</h2>
                        <table class="table">
                            <tbody>
                                <?php
                                echo "<tr>";
                                echo "<th scope='row'>ID</th>";
                                echo "<td>{$rows['id']}</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th scope='row'>Tên sản phẩm</th>";
                                echo "<td>{$rows['productName']}</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th scope='row'>Giá sản phẩm</th>";
                                echo "<td>{$formatted_price}</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th scope='row'>Ngày ra mắt</th>";
                                echo "<td>{$rows['releaseDate']}</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th scope='row'>Số lượng</th>";
                                echo "<td>{$rows['quantity']}</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<th scope='row'>Đã bán</th>";
                                echo "<td>{$rows['sold']}</td>";
                                echo "</tr>";

                                $name_query = "SELECT * FROM sound WHERE ID = '$product_id';";
                                $result = mysqli_query($db_connect, $name_query);
                                $rows = mysqli_fetch_assoc($result);
                                if ($rows) {
                                    echo "<tr>";
                                    echo "<th scope='row'>Phân loại mặt hàng</th>";
                                    echo "<td>Tai nghe</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<th scope='row'>Phân loại tai nghe</th>";
                                    echo "<td>{$rows['classify']}</td>";
                                    echo "</tr>";
                                }

                                $name_query = "SELECT * FROM iphone WHERE ID = '$product_id';";
                                $result = mysqli_query($db_connect, $name_query);
                                $rows = mysqli_fetch_assoc($result);
                                if ($rows) {
                                    echo "<tr>";
                                    echo "<th scope='row'>Phân loại mặt hàng</th>";
                                    echo "<td>iPhone</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<th scope='row'>Phân loại iPhone</th>";
                                    echo "<td>{$rows['classify']}</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<th scope='row'>Phiên bản</th>";
                                    echo "<td>{$rows['version']}</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<th scope='row'>Dung lượng bộ nhớ</th>";
                                    echo "<td>{$rows['capacity']}</td>";
                                    echo "</tr>";
                                }

                                $name_query = "SELECT * FROM ipad WHERE ID = '$product_id';";
                                $result = mysqli_query($db_connect, $name_query);
                                $rows = mysqli_fetch_assoc($result);
                                if ($rows) {
                                    echo "<tr>";
                                    echo "<th scope='row'>Phân loại mặt hàng</th>";
                                    echo "<td>iPad</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<th scope='row'>Phân loại iPad</th>";
                                    echo "<td>{$rows['classify']}</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<th scope='row'>Dung lượng bộ nhớ</th>";
                                    echo "<td>{$rows['capacity']}</td>";
                                    echo "</tr>";
                                }


                                $name_query = "SELECT * FROM mac WHERE ID = '$product_id';";
                                $result = mysqli_query($db_connect, $name_query);
                                $rows = mysqli_fetch_assoc($result);
                                if ($rows) {
                                    echo "<tr>";
                                    echo "<th scope='row'>Phân loại mặt hàng</th>";
                                    echo "<td>Mac</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<th scope='row'>Phân loại Mac</th>";
                                    echo "<td>{$rows['classify']}</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<th scope='row'>Dung lượng bộ nhớ</th>";
                                    echo "<td>{$rows['capacity']}</td>";
                                    echo "</tr>";
                                }

                                $name_query = "SELECT * FROM watch WHERE ID = '$product_id';";
                                $result = mysqli_query($db_connect, $name_query);
                                $rows = mysqli_fetch_assoc($result);
                                if ($rows) {
                                    echo "<tr>";
                                    echo "<th scope='row'>Phân loại mặt hàng</th>";
                                    echo "<td>Đồng hồ thông minh</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<th scope='row'>Phân loại đồng hồ</th>";
                                    echo "<td>{$rows['classify']}</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<th scope='row'>Đường kính mặt</th>";
                                    echo "<td>{$rows['diameter']}</td>";
                                    echo "</tr>";
                                }

                                $name_query = "SELECT * FROM accessory WHERE ID = '$product_id';";
                                $result = mysqli_query($db_connect, $name_query);
                                $rows = mysqli_fetch_assoc($result);
                                if ($rows) {
                                    echo "<tr>";
                                    echo "<th scope='row'>Phân loại mặt hàng</th>";
                                    echo "<td>Phụ kiện</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<th scope='row'>Phân loại phụ kiện</th>";
                                    echo "<td>{$rows['classify']}</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <h2>Mô tả sản phẩm</h2>
                    <?php echo "<p>{$description}</p>"; ?>
                </div>

            </div>
        </div>
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-3.6.1.min.js"></script>
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
        function changeImageSource(mainsrc) {
            $("#thumbnail").attr('src', mainsrc + ".png");
            $("#thumbnailsmall1").attr('src', mainsrc + "_small1.png");
            $("#thumbnailsmall2").attr('src', mainsrc + "_small2.png");
        }
    </script>
    <?php mysqli_close($db_connect); ?>
</body>

</html>