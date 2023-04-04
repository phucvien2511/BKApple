<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iPhone Page</title>
    <link rel="stylesheet" href="/css/skdslider.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/iphone_style.css">
</head>

<body>
    <div class="container-fluid">
        <!-- Header -->
        <div class="row header sticky-top">
            <a class="col-2 text-center title text-decoration-none" href="/index.php">
                <img src="/images/apple.png" alt="Apple logo" class="logo">
                BKApple
            </a>
            <div class="col-10 text-center">
                <nav class="navbar navbar-expand-lg" style="background-color: black;">
                    <div class="container-fluid">
                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                            <div class="navbar-nav col-8" id="header-options">
                                <a class="nav-link white" href="/php/iphone.php">iPhone</a>
                                <a class="nav-link white" href="/php/ipad.php">iPad</a>
                                <a class="nav-link white" href="/php/mac.php">Mac</a>
                                <a class="nav-link white" href="/php/sound.php">Âm thanh</a>
                                <a class="nav-link white" href="/php/accessory.php">Phụ kiện</a>
                                <a class="nav-link white" href="/php/warranty.php">Bảo hành</a>
                                <a class="nav-link white" href="/php/about.php">Về chúng tôi</a>
                            </div>
                            <form class="d-flex flex-row justify-content-center ml-auto" role="search">
                                <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                                <button class=" btn btn-outline-light" type="submit">Tìm</button>
                            </form>
                        </div>
                    </div>

                </nav>

            </div>
        </div>
        <!-- End of Header -->

        <!-- Category Logo -->
        <div class="row brand">
            <div class="d-flex justify-content-center">
                <img class="brand-img" src="/images/apple.png" alt="Apple logo">
                <h2 class="brand-name">iPhone</h2>
            </div>
        </div>
        <!-- End of Category Logo -->

        <!-- Slider -->
        <div class="slider">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 p-0">
                        <div id="slider__img">
                            <div class="slide">
                                <img src="/images/iphone/banner_one.png" alt="">
                            </div>
                            <div class="slide">
                                <img src="/images/iphone/banner_two.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Slider -->

        <!-- Choose Product -->
        <div class="row d-flex flex-row align-items-center justify-content-center mt-3 mb-2 choose-series">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#openIphoneList" aria-controls="openIphoneList" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="openIphoneList">
                        <div class="navbar-nav">
                            <a class="nav-link white" href="/php/iphone.php">Tất cả</a>
                            <a class="nav-link white" href="/php/iphone.php?classify=iphone14">iPhone 14</a>
                            <a class="nav-link white" href="/php/iphone.php?classify=iphone13">iPhone 13</a>
                            <a class="nav-link white" href="/php/iphone.php?classify=iphone12">iPhone 12</a>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Sắp xếp
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Giá từ cao đến thấp</a></li>
                    <li><a class="dropdown-item" href="#">Giá từ thấp đến cao</a></li>
                    <li><a class="dropdown-item" href="#">Ngày ra mắt</a></li>
                </ul>
            </div>
        </div>
        <!-- Choose Product -->

        <!-- Card Product -->

        <div class="row d-flex flex-row align-items-center justify-content-center" id="product-list">

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
            //Check URL parameter
            if (isset($_GET['classify'])) {
                $classify = $_GET['classify'];
                $name_query = "SELECT product.*, iphone.version, GROUP_CONCAT(iphone.capacity ORDER BY iphone.capacity SEPARATOR ',') AS capacities FROM product JOIN iphone ON product.id = iphone.id WHERE iphone.classify = '$classify' GROUP BY iphone.version";
            } else {
                $name_query = "SELECT product.*, iphone.version, GROUP_CONCAT(iphone.capacity ORDER BY iphone.capacity SEPARATOR ',') AS capacities FROM product JOIN iphone ON product.id = iphone.id GROUP BY iphone.version";
            }
            $result = mysqli_query($db_connect, $name_query);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows <= 0) {
                echo '<h1 class="white text-center mb-5 mt-5">Không tìm thấy sản phẩm nào</h1>';
            }
            while ($rows = mysqli_fetch_assoc($result)) {
                if ($num_rows > 0) {
                    $price = $rows['price'];
                    $formatted_price = number_format($price, 0, '.', '.') . 'đ';
                    $capacities = explode(',', $rows['capacities']);
                    $version = str_replace(' ', '', $rows['version']);
                    $thumbnail = $rows['thumbnail'];
                    $productName = $rows['productName'];
                    $colors = explode(',', $rows['color']);
                    if ($version != '') {
                        $img_src = $thumbnail . '_' . $version . '_' . $colors[0] . '.png';
                    } else {
                        $img_src = $thumbnail . '_' . $colors[0] . '.png';
                    }
                    echo
                    '<a href="#" class="d-flex flex-column align-items-center justify-content-center bottom-card">
                    <img src="' . $img_src . '" alt="' . $productName . '" class="bottom-card-img">
                        <div class="row">';
                    foreach ($capacities as $capacity) {
                        echo
                        '<div class="col memory-card">
                            <div class="memory">' . $capacity . '</div>
                        </div>';
                    }
                    echo
                    '</div>
                        <div class="d-flex flex-column align-items-center mt-2">
                            <h6 class="white text-center" class="mt-4 mb-4">' . $productName . '</h6>
                            <h5 class="white text-center">' . $formatted_price . '</h5>
                        </div>
                    </a>';
                }
            }

            mysqli_free_result($result);
            //Close connection
            mysqli_close($db_connect);
            ?>


        </div>
        <!-- Card Product -->

        <div class="row">
            <!-- Footer -->
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
                        <a href="" class="me-4 text-reset">
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
                                <p><a href="#!" class="text-reset">Hướng dẫn mua hàng online</a></p>
                                <p><a href="#!" class="text-reset">Chính sách giao hàng</a></p>
                                <p><a href="#!" class="text-reset">Hướng dẫn thanh toán</a></p>
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
                    <a class="text-reset fw-bold" href="https://github.com/phucvien2511/Web-Assignment-222.git">Github</a>
                </div>
                <!-- Copyright -->
            </footer>
            <!-- Footer -->
        </div>
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>

    <!--Script for Slider-->
    <script src="/js/jquery-3.6.1.min.js"></script>
    <script src="/js/skdslider.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('#slider__img').skdslider({
                slideSelector: '.slide',
                delay: 5000,
                animationSpeed: 2000,
                showNextPrev: true,
                showPlayButton: false,
                autoSlide: false,
                animationType: 'sliding'
            });

            jQuery('#demo2').skdslider({
                slideSelector: '.slide',
                delay: 5000,
                animationSpeed: 1000,
                showNextPrev: true,
                showPlayButton: false,
                autoSlide: true,
                animationType: 'sliding'
            });
        });
    </script>
    <!--Script for Slider-->
</body>

</html>