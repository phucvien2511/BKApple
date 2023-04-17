<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BKApple</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/product_style.css">
</head>

<body>
    <!-- Main page -->
    <div class="container-fluid">
        <!-- Header -->
        <div class="header sticky-top d-flex flex-row justify-content-between">
            <a class="col-sm-4 col-lg-2 title text-decoration-none" href="/index.php">
                <img src="/images/apple.png" alt="Apple logo" class="logo">
                BKApple
            </a>
            <div class="col-sm-6 col-lg-9 mx-auto text-end mr-2">
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
                            <div class="navbar-nav" id="header-options">
                                <a class="nav-link white" href="/php/iphone.php">iPhone</a>
                                <a class="nav-link white" href="/php/ipad.php">iPad</a>
                                <a class="nav-link white" href="/php/mac.php">Mac</a>
                                <a class="nav-link white" href="/php/watch.php">Watch</a>
                                <a class="nav-link white" href="/php/sound.php">Âm thanh</a>
                                <a class="nav-link white" href="/php/accessory.php">Phụ kiện</a>
                                <a class="nav-link white" href="/php/warranty.php">Bảo hành</a>
                                <a class="nav-link white" href="/php/about.php">Về chúng tôi</a>
                            </div>

                            <form class="d-flex flex-row ml-auto justify-content-end">
                                <input id="search" class="form-control me-2" type="text" placeholder="Tìm kiếm" aria-label="Search">
                                <button class="btn btn-outline-light" type="submit">Tìm</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-sm-1 d-flex flex-row align-items-center justify-content-end user-icons">
                <a href="/html/cart.html" class="white">
                    <i class="fa-solid fa-cart-shopping fa-xl"></i>
                </a>
                <a href="/php/login.php" class="white">
                    <i class="fa-solid fa-circle-user fa-xl"></i>
                </a>
            </div>
        </div>
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
            }
        }
        $name_query = "SELECT * FROM product JOIN $table_result ON product.id = $table_result.id WHERE product.id = '$id'";
        $result = mysqli_query($db_connect, $name_query);
        $rows = mysqli_fetch_assoc($result);
        $classify = $rows['classify'];
        $name = $rows['productName'];
        $price = number_format($rows['price'], 0, '.', '.') . 'đ';;
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
                        foreach ($colors as $color) {
                            echo '<a href="#" class="color-card-round color-card" style="background-color: ' . $color . '" onclick="changeSliderImage(\'' . $thumbnail . '\', \'' . $color . '\')"></a>';
                        }
                        ?>
                    </div>

                    <br>
                    <div class="col text-center mb-3">
                        <a href="#" class="btn btn-danger" id="buy-btn">Thêm vào giỏ hàng</a>
                    </div>
                    <div class="col product-desc">
                        <h5>Mô tả:</h5>
                        <div class="col-12"><?php echo $rows['description']; ?></div>
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
        <div class="row">
            <footer class="text-center text-lg-start bg-dark text-muted">
                <!-- Section: Social media -->
                <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                    <!-- Left -->
                    <div class="me-5 d-none d-lg-block">
                        <img src="/images/apple.png" alt="Apple logo" class="logo">
                        BKApple
                    </div>
                    <!-- Left -->

                    <!-- Right -->
                    <div>
                        <a href="#" class="me-4 text-reset">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                    <!-- Right -->
                </section>
                <!-- Section: Social media -->

                <!-- Section: Links  -->
                <section class="">
                    <div class="container text-center text-md-start mt-5">
                        <!-- Grid row -->
                        <div class="row mt-3">
                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                                <!-- Content -->
                                <h6 class="text-uppercase fw-bold mb-4">
                                    <i class="fas fa-gem me-3"></i>
                                    Giới thiệu
                                </h6>
                                <p>
                                    Thành lập từ năm 2013 với gần 20 chi nhánh trên toàn quốc. BKApple là công ty trách
                                    nhiệm hữu hạn nhiều thành viên, chuyên bán các thiết bị điện tử chính hãng của
                                    Apple.
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">Hệ thống cửa hàng</h6>
                                <p><a href="#!" class="text-reset">Danh sách cửa hàng</a></p>
                                <p><a href="#!" class="text-reset">Nội quy cửa hàng</a></p>
                                <p><a href="#!" class="text-reset">Chính sách bảo hành & đổi trả</a></p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">Hỗ trợ khách hàng</h6>
                                <p><a href="#" class="text-reset">Hướng dẫn mua hàng online</a></p>
                                <p><a href="#" class="text-reset">Chính sách giao hàng</a></p>
                                <p><a href="#" class="text-reset">Hướng dẫn thanh toán</a></p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">Thông tin liên lạc</h6>
                                <p>
                                    268 Lý Thường Kiệt, Phường 14, Quận 10, TPHCM
                                </p>
                                <p>
                                    bkapple@hcmut.com
                                </p>
                                <p>
                                    (028) 0123456.
                                </p>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                    </div>
                </section>
                <!-- Section: Links  -->

                <!-- Copyright -->
                <div class="text-center p-4" style="background-color: rgba(34,34,34,255);">
                    © 2023 Copyright:
                    <a class="text-reset fw-bold" href="https://github.com/phucvien2511/BKApple">Github</a>
                </div>
                <!-- Copyright -->
            </footer>
            <!-- Footer -->
        </div>
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
    <!-- End of extra script -->
</body>