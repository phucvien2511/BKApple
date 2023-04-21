<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/news.css">

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
                                <a class="nav-link white" href="/php/news.php">Tin tức</a>
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
                <div class="dropdown">
                    <a class="btn btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                        session_start();
                        if (isset($_SESSION['user_login'])) {
                            echo '<span><img src=' . $_SESSION['user_avatar'] . ' alt="User avatar" style="width: 35px; height: 35px; border-radius: 50%; margin-right: 5px"></span>';
                            echo '<span class="white">' . $_SESSION['user_login'] . '</span>';
                        } else {
                            echo '<i class="fa-solid fa-circle-user fa-xl white"></i>';
                        }
                        ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end">
                        <?php
                        if (isset($_SESSION['user_login'])) {
                            echo '<li><a class="dropdown-item" href="#">Thông tin cá nhân</a></li>
                                    <li><a class="dropdown-item" href="#">Giỏ hàng</a></li>
                                    <li><a class="dropdown-item" href="/php/logout.php">Đăng xuất</a></li>';
                        } else {
                            echo '<li><a class="dropdown-item" href="/php/login.php">Đăng nhập</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End of Header -->

        <!-- Category Logo -->
        <div class="row brand">
            <div class="d-flex justify-content-center">
                <img class="brand-img" src="/images/apple.png" alt="Apple logo">
                <h2 class="brand-name">Tin tức</h2>
            </div>
        </div>
        <!-- End of Category Logo -->
        <div class="container" data-aos="fade-up">
            <!--Section: Content-->
            <div class="text-center">
                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="/images/news/news1.png" alt="News img">
                            </div>
                            <div class="card-body">
                                <div class="card-title">iPhone 15 khi nào ra mắt? Giá bao nhiêu?</div>
                                <div class="card-text">
                                    Vẫn còn khoảng 6 tháng nữa thì dòng iPhone 15 tiếp theo mới chính thức được Apple
                                    giới thiệu đến người dùng nhưng những hình ảnh, tin đồn xung quanh chiếc iPhone
                                    này là chưa bao giờ hết hot...
                                </div>
                                <a href="" class="btn btn-primary">Đọc thêm</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="/images/news/news2.png" class="img-fluid" alt="News img">
                            </div>
                            <div class="card-body">
                                <div class="card-title">watchOS 10 sẽ là bản cập nhật lớn nhất của Apple Watch kể từ năm
                                    2015</div>
                                <div class="card-text">
                                    Apple dự kiến sẽ công bố watchOS 10 cùng với iOS 17, macOS 14 và phần mềm mới
                                    khác trong bài phát biểu quan trọng WWDC 2023 vào ngày 5 tháng 6.
                                </div>
                                <a href="" class="btn btn-primary">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="dark">
                                <img src="/images/news/news3.png" class="img-fluid" alt="News img">
                            </div>
                            <div class="card-body">
                                <div class="card-title">iPhone 15 sẽ có màn hình M12 OLED với độ sáng cao hơn</div>
                                <div class="card-text">
                                    Nhà cung cấp màn hình Samsung Display sẽ tiếp tục đảm nhận trọng trách sản xuất màn
                                    hình OLED M12 cho iPhone 15.


                                </div>
                                <a href="" class="btn btn-primary">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" data-aos="fade-up">
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="/images/news/news4.png" class="img-fluid" alt="News img">
                            </div>
                            <div class="card-body">
                                <div class="card-title">3 sản phẩm Apple sẽ khiến iFan “đứng ngồi không yên” trong năm
                                    2023</div>
                                <div class="card-text">
                                    Kính thực tế ảo hỗn hợp AR/VR, dòng iPhone 15, Apple Watch thế hệ mới,… sẽ là những
                                    “bom tấn” được nhiều người mong chờ trong năm nay.
                                </div>
                                <a href="#!" class="btn btn-primary">Đọc thêm</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="/images/news/news5.png" class="img-fluid" alt="News img">
                            </div>
                            <div class="card-body">
                                <div class="card-title">Apple iPhone SE 4 có gì hấp dẫn: Thiết kế tràn viền, chip A16
                                    Bionic, Face ID và còn gì nữa? </div>
                                <div class="card-text">
                                    iPhone SE 4 sẽ là một lựa chọn hấp dẫn cho những ai tìm kiếm một chiếc iPhone chất
                                    lượng nhưng có giá bán phải chăng vào năm tới.
                                </div>
                                <a href="#!" class="btn btn-primary">Đọc thêm</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="/images/news/news6.png" class="img-fluid" alt="News img">
                            </div>
                            <div class="card-body">
                                <div class="card-title">Top 5 lý do bạn nên cập nhật phần mềm cho máy Mac của mình</div>
                                <div class="card-text">
                                    Máy Mac chạy các phiên bản macOS lỗi thời thường gây hại nhiều hơn là lợi và dưới
                                    đây là những lý do.
                                </div>
                                <a href="#!" class="btn btn-primary">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center text-lg-start bg-dark text-muted">
            <!-- Section: Social media -->
            <div class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
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
            </div>
            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <div>
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
                                Công ty trách nhiệm hữu hạn nhiều thành viên, chuyên bán các sản phẩm điện tử của Apple
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">Hệ thống cửa hàng</h6>
                            <p><a href="#!" class="text-reset">Xem danh sách cửa hàng</a></p>
                            <p><a href="#!" class="text-reset">Nội quy cửa hàng</a></p>
                            <p><a href="#!" class="text-reset">Chất lượng phục vụ</a></p>
                            <p><a href="#!" class="text-reset">Chính sách bảo hành & đổi trả</a></p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">Hỗ trợ khách hàng</h6>
                            <p><a href="#!" class="text-reset">Điều kiện giao dịch chung</a></p>
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
                                268 Lý Thường Kiệt, Phường 14, Quận 10, TP.HCM
                            </p>
                            <p>
                                bkapple@hcmut.com
                            </p>
                            <p>
                                028 123456.
                            </p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </div>
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

    <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>