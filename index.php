<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BKApple</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <!-- Main page -->
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
        <div class="body">
            <div class="row">
                <div class="top-banner-wrapper">
                    <!-- <img src="/images/landingPage/top-banner-1.webp" alt="Top banner" class="top-banner"> -->
                </div>
            </div>
            <div class="row d-flex flex-row align-items-center justify-content-center">
                <div class="d-flex flex-column align-items-center justify-content-center col-6 col-sm-4 col-md-2 top-card">
                    <a href="/php/iphone.php" class="text-decoration-none">
                        <img src="images/landingPage/img-cateiphone-1.webp" alt="iPhone 11" class="top-card-img">
                        <h5 class="white text-center">iPhone</h5>
                    </a>
                </div>
                <div class="d-flex flex-column align-items-center justify-content-center col-6 col-sm-4 col-md-2 top-card">
                    <a href="/php/ipad.php" class="text-decoration-none">
                        <img src="images/landingPage/img-cateipad.webp" alt="iPhone 11" class="top-card-img">
                        <h5 class="white text-center">iPad</h5>
                    </a>
                </div>
                <div class="d-flex flex-column align-items-center justify-content-center col-6 col-sm-4 col-md-2 top-card">
                    <a href="/php/mac.php" class="text-decoration-none">
                        <img src="images/landingPage/img-catemac-1.webp" alt="iPhone 11" class="top-card-img">
                        <h5 class="white text-center">Mac</h5>
                    </a>
                </div>
                <div class="d-flex flex-column align-items-center justify-content-center col-6 col-sm-4 col-md-2 top-card">
                    <a href="/php/watch.php" class="text-decoration-none">
                        <img src="images/landingPage/img-catewatch-1.webp" alt="iPhone 11" class="top-card-img">
                        <h5 class="white text-center">Apple Watch</h5>
                    </a>
                </div>
                <div class="d-flex flex-column align-items-center justify-content-center col-6 col-sm-4 col-md-2 top-card">
                    <a href="/php/sound.php" class="text-decoration-none">
                        <img src="images/landingPage/img-catesound.webp" alt="iPhone 11" class="top-card-img">
                        <h5 class="white text-center">Âm thanh</h5>
                    </a>
                </div>
                <div class="d-flex flex-column align-items-center justify-content-center col-6 col-sm-4 col-md-2 top-card">
                    <a href="/php/accessory.php" class="text-decoration-none">
                        <img src="images/landingPage/img-catephukien.webp" alt="iPhone 11" class="top-card-img">
                        <h5 class="white text-center">Phụ kiện</h5>
                    </a>
                </div>
            </div>
            <div class="row">
                <!-- iPhone top products -->
                <div class="col-12 category-title">iPhone</div>
                <div class="row d-flex flex-row align-items-center justify-content-center">
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
                    //Get name from db
                    $name_query = "SELECT * FROM product";
                    $result = mysqli_query($db_connect, $name_query);
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $price = $rows['price'];
                        $formatted_price = $formatted_price = number_format($price, 0, '.', '.') . 'đ';
                        echo
                        '<a href="#"
                        class="d-flex flex-column align-items-center justify-content-center bottom-card col-sm-12 col-md-6 col-lg-3">
                            <img src="' . $rows['thumbnail'] . '" alt="iPhone 11" class="bottom-card-img">
                            <div class="d-flex flex-column align-items-center">
                                <h6 class="white text-center" class="mt-4 mb-4">' . $rows['productName'] . '</h6>
                                <h5 class="white text-center">' . $formatted_price . '</h5>
                            </div>
                        </a>';
                    }
                    mysqli_free_result($result);
                    //Close connection
                    mysqli_close($db_connect);
                    ?>
                </div>
                <!-- iPad top products -->
                <div class="col-12 category-title">iPad</div>
                <div class="row d-flex flex-row align-items-center justify-content-center">
                    <a href="#" class="d-flex flex-column align-items-center justify-content-center bottom-card col-sm-12 col-md-6 col-lg-3">
                        <img src="images/landingPage/ipad10.webp" alt="iPhone 11" class="bottom-card-img">
                        <div class="d-flex flex-column align-items-center">
                            <h5 class="white text-center" class="mt-4 mb-4">iPhone 14 Pro Max 128GB</h5>
                            <h5 class="white text-center">9.999.000đ</h5>
                        </div>
                    </a>
                    <a href="#" class="d-flex flex-column align-items-center justify-content-center bottom-card col-sm-12 col-md-6 col-lg-3">
                        <img src="images/landingPage/ipad10.webp" alt="iPhone 11" class="bottom-card-img">
                        <div class="d-flex flex-column align-items-center">
                            <h5 class="white text-center" class="mt-4 mb-4">iPhone 14 Pro Max 128GB</h5>
                            <h5 class="white text-center">9.999.000đ</h5>
                        </div>
                    </a>
                    <a href="#" class="d-flex flex-column align-items-center justify-content-center bottom-card col-sm-12 col-md-6 col-lg-3">
                        <img src="images/landingPage/ipad10.webp" alt="iPhone 11" class="bottom-card-img">
                        <div class="d-flex flex-column align-items-center">
                            <h5 class="white text-center" class="mt-4 mb-4">iPhone 14 Pro Max 128GB</h5>
                            <h5 class="white text-center">9.999.000đ</h5>
                        </div>
                    </a>
                    <a href="#" class="d-flex flex-column align-items-center justify-content-center bottom-card col-sm-12 col-md-6 col-lg-3">
                        <img src="images/landingPage/ipad10.webp" alt="iPhone 11" class="bottom-card-img">
                        <div class="d-flex flex-column align-items-center">
                            <h5 class="white text-center" class="mt-4 mb-4">iPhone 14 Pro Max 128GB</h5>
                            <h5 class="white text-center">9.999.000đ</h5>
                        </div>
                    </a>
                </div>
                <!-- Mac top products -->
                <div class="col-12 category-title">Mac</div>
                <div class="row d-flex flex-row align-items-center justify-content-center">
                    <a href="#" class="d-flex flex-column align-items-center justify-content-center bottom-card col-sm-12 col-md-6 col-lg-3">
                        <img src="images/landingPage/macairm1.webp" alt="iPhone 11" class="bottom-card-img">
                        <div class="d-flex flex-column align-items-center">
                            <h5 class="white text-center" class="mt-4 mb-4">iPhone 14 Pro Max 128GB</h5>
                            <h5 class="white text-center">9.999.000đ</h5>
                        </div>
                    </a>
                    <a href="#" class="d-flex flex-column align-items-center justify-content-center bottom-card col-sm-12 col-md-6 col-lg-3">
                        <img src="images/landingPage/macairm1.webp" alt="iPhone 11" class="bottom-card-img">
                        <div class="d-flex flex-column align-items-center">
                            <h5 class="white text-center" class="mt-4 mb-4">iPhone 14 Pro Max 128GB</h5>
                            <h5 class="white text-center">9.999.000đ</h5>
                        </div>
                    </a>
                    <a href="#" class="d-flex flex-column align-items-center justify-content-center bottom-card col-sm-12 col-md-6 col-lg-3">
                        <img src="images/landingPage/macairm1.webp" alt="iPhone 11" class="bottom-card-img">
                        <div class="d-flex flex-column align-items-center">
                            <h5 class="white text-center" class="mt-4 mb-4">iPhone 14 Pro Max 128GB</h5>
                            <h5 class="white text-center">9.999.000đ</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
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
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>