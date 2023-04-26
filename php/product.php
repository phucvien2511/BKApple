<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BKApple</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/product_style.css">

</head>

<body>
    <!-- Main page -->
    <div class="container-fluid">
        <!-- Header -->
        <?php include "header.php" ?>
        <!-- End of Header -->
        <!-- Content -->
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
        if (isset($_GET['product'])) {
            $id = $_GET['product'];
            //Find which table does that product id belong to
            if (substr($id, 0, 6) == 'IPHONE') {
                $table_result = 'iphone';
            } else if (substr($id, 0, 3) == 'MAC' || substr($id, 0, 4) == 'IMAC') {
                $table_result = 'mac';
            } else if (substr($id, 0, 4) == 'IPAD') {
                $table_result = 'ipad';
            } else if (substr($id, 0, 5) == 'WATCH') {
                $table_result = 'watch';
            } else if (substr($id, 0, 6) == 'AIRPOD' || substr($id, 0, 6) == 'EARPOD') {
                $table_result = 'sound';
            } else if (substr($id, 0, 6) == 'AIRTAG' || substr($id, 0, 4) == 'CASE' || substr($id, 0, 4) == 'WIRE' || substr($id, 0, 7) == 'CHARGER' || substr($id, 0, 7) == 'BATTERY') {
                $table_result = 'accessory';
            } else {
                echo "<h1 style='text-align:center; margin-top: 40vh;'>Lỗi: Không tìm thấy sản phẩm.</h1>";
                exit;
            }
        }
        $name_query = "SELECT * FROM product JOIN $table_result ON product.id = $table_result.id WHERE product.id = '$id'";
        $result = mysqli_query($db_connect, $name_query);
        $rows = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) <= 0) {
            echo "<h1 style='text-align:center; margin-top: 40vh;'>Lỗi: Không tìm thấy sản phẩm.</h1>";
            exit;
        }
        $classify = $rows['classify'];
        $name = $rows['productName'];
        $price = number_format($rows['price'], 0, '.', '.') . 'đ';
        $colors = explode(',', $rows['color']);
        $thumbnail = $rows['thumbnail'];
        switch ($table_result) {
            case 'iphone':
                $version = $rows['version'];
                $img_src = $thumbnail . '_' . $colors[0] . '.png';
                break;
            case 'ipad':
                $img_src = $thumbnail . '_' . $colors[0] . '.png';
                break;
            case 'mac':
                $img_src = $thumbnail . '_' . $colors[0] . '.png';
                break;
            case 'watch':
                $img_src = $thumbnail . '_' . $colors[0] . '.png';
                break;
            case 'sound':
                $img_src = $thumbnail . '.png';
                break;
            case 'accessory':
                if ($classify == 'case') {
                    $img_src = $thumbnail . '_' . $colors[0] . '.png';
                } else {
                    $img_src = $thumbnail . '.png';
                }
                break;
        }
        ?>
        <div class="mt-3 col-12 col-lg-10" id="middle">
            <div class="row product-detail">
                <div class="col-12 col-md-7 mx-auto">
                    <div id="carouselExampleControls" class="carousel w-100 slide mx-auto mb-3" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo $img_src; ?>" alt="<?php echo $name . ' - 1' ?>" class="mx-auto big-img" alt="Banner 1">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo substr($img_src, 0, -4) . '_small1.png'; ?>" class="mx-auto big-img" alt="Banner 2">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo substr($img_src, 0, -4) . '_small2.png'; ?>" class="mx-auto big-img" alt="Banner 3">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="small-img-set">
                        <a href="#">
                            <img src="<?php echo $img_src; ?>" alt="<?php echo $name . ' - 1' ?>" class="small-img" data-bs-target="#carouselExampleControls" data-bs-slide-to="0">
                        </a>
                        <a href="#">
                            <img src=" <?php echo substr($img_src, 0, -4) . '_small1.png'; ?>" alt="<?php echo $name . ' - 2' ?>" class="small-img" data-bs-target="#carouselExampleControls" data-bs-slide-to="1">
                        </a>
                        <a href="#">
                            <img src=" <?php echo substr($img_src, 0, -4) . '_small2.png'; ?>" alt="<?php echo $name . ' - 3' ?>" class="small-img" data-bs-target="#carouselExampleControls" data-bs-slide-to="2">
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-5 summary mt-sm-4 mt-md-0">
                    <h2 class="text-md-start text-center mb-3 product-name"><?php echo $name; ?></h2>
                    <h4 class="text-md-start text-center mb-4"><?php echo $price; ?></h4>
                    <?php
                    if ($table_result == 'iphone') {

                        $name_query_2 = "SELECT product.*, GROUP_CONCAT(capacity SEPARATOR ',') as capacities FROM product JOIN iphone ON product.id = iphone.id WHERE classify = '$classify' AND version = '$version' GROUP BY classify, version";
                        $result_2 = mysqli_query($db_connect, $name_query_2);
                        $rows_2 = mysqli_fetch_assoc($result_2);
                        $capacities = explode(',', $rows_2['capacities']);
                        echo
                        '<h6 class="text-center text-md-start choose-capacity">Chọn dung lượng: ' . $rows['capacity'] . '</h6>
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-md-start mt-2 mb-2">';
                        foreach ($capacities as $capacity_2) {
                            $capacity_value = substr($capacity_2, 0, -2);
                            $id_parts = explode('_', $id);
                            if ($capacity_value == '1') {   //1TB case
                                $capacity_value = '1024';
                                $capacity_2 = '1TB';
                            }
                            echo '<a href="/php/product.php?product=' . $id_parts[0] . '_' . $capacity_value . '" class="memory-card">' . $capacity_2 . '</a>';
                        }
                        echo '</div>';
                    }

                    ?>

                    <h6 class="text-md-start text-center choose-color-title">Chọn màu: <?php echo $colors[0]; ?></h6>
                    <div class=" d-flex flex-row align-items-center justify-content-center justify-content-md-start choose-color">
                        <?php
                        $selected_color = $colors[0];
                        foreach ($colors as $color) {

                            echo '<a href="#" class="color-card-round color-card" style="background-color: ' . $color . '" onclick="changeSliderImage(\'' . $thumbnail . '\', \'' . $color . '\')"></a>';
                        }
                        ?>
                    </div>

                    <br>
                    <div class="col text-center mb-3">
                        <button type="button" onclick="addProductToCart('<?php echo $_GET['product'] ?>')" class="btn btn-danger" id="buy-btn">Thêm vào giỏ hàng</button>
                    </div>
                    <div class="col product-desc d-flex flex-column align-items-center-sm">
                        <h5 class="text-center text-md-start">Mô tả:</h5>
                        <div class="col-12 text-center text-md-start"><?php echo $rows['description']; ?></div>
                    </div>
                </div>
            </div>

        </div>
        <?php
        mysqli_free_result($result);
        //Close connection
        mysqli_close($db_connect);
        ?>
        <!-- Content end -->
        <!-- Footer -->
        <?php include 'footer.php'; ?>
        <!-- Footer -->
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-3.6.1.min.js"></script>
    <!-- Extra script to change background images when choose color -->
    <script>
        //Change the background color of memory-card into white after click
        function changeSliderImage(thumbnail, color) {
            //Change big images
            let carouselActiveItem = document.querySelector('.carousel-item.active img');
            let carouselNonActiveItems = document.querySelectorAll('.carousel-item:not(.active) img');
            let big_img_url = thumbnail + '_' + color + '.png';
            let small_img_urls = [];
            small_img_urls[0] = thumbnail + '_' + color + '_small1.png';
            small_img_urls[1] = thumbnail + '_' + color + '_small2.png';
            carouselActiveItem.src = big_img_url;
            carouselNonActiveItems[0].src = small_img_urls[0];
            carouselNonActiveItems[1].src = small_img_urls[1];
            //Change small images
            let smallImgSet = document.querySelectorAll('.small-img-set img');
            //First small image is the big image
            smallImgSet[0].src = big_img_url;
            smallImgSet[1].src = small_img_urls[0];
            smallImgSet[2].src = small_img_urls[1];
            document.querySelector('.choose-color-title').innerText = 'Chọn màu: ' + color;
        }
        //Change <title> tag into product name
        let productName = document.querySelector('.product-name').innerText;
        document.title = productName;
    </script>
    <script>
function addProductToCart(product) {
    $(document).ready(function() {
        // Check if user is logged in
        if("<?php echo isset($_SESSION['user_login']) ? $_SESSION['user_login'] : '' ?>" != '') {
            // User is logged in, send AJAX request
            $.ajax({
                url: "/php/cart/addProduct.php",
                type: "POST",
                data: {
                    id: product
                },
                success: function(response) {
                    alert('Thêm sản phẩm vào giỏ thành công');
                    let cartCount = parseInt(document.querySelector('.cart-count').innerText);
                    document.querySelector('.cart-count').innerText = cartCount + 1;
                }
            });
        } else {
            // User is not logged in, redirect to login page
            alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng');
            window.location.href = "login.php";
        }
    })
}

    </script>
    <!-- End of extra script -->
</body>