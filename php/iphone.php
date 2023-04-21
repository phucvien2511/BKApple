<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iPhone - BKApple</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/iphone_style.css">
    <link rel="stylesheet" href="/css/header.css">
</head>

<body>
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
                <h2 class="brand-name">iPhone</h2>
            </div>
        </div>
        <!-- End of Category Logo -->

        <!-- Slider -->
        <div id="carouselExampleIndicators" class="carousel slide mx-auto" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <a class="carousel-item active" href="/php/iphone.php?classify=iphone14">
                    <img src="/images/iphone/banner1.png" class="d-block w-100" alt="Banner 1">
                </a>
                <a class="carousel-item" href="/php/iphone.php?classify=iphone11">
                    <img src="/images/iphone/banner2.png" class="d-block w-100" alt="Banner 2">
                </a>
                <a class="carousel-item" href="/php/product.php?product=IPHONE14PROMAX_256">
                    <img src="/images/iphone/banner3.png" class="d-block w-100" alt="Banner 3">
                </a>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- End of Slider -->

        <!-- Choose Product -->
        <div class="row d-flex flex-row align-items-center justify-content-center mt-3 mb-2 text-center choose-series">
            <nav class="col-9 navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#openMacList" aria-controls="openMacList" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="openMacList">
                        <div class="navbar-nav">
                            <a class="nav-link white <?php if (!isset($_GET['classify'])) echo 'active'; ?>" href="/php/iphone.php">Tất cả</a>
                            <a class="nav-link white <?php if (isset($_GET['classify']) && $_GET['classify'] == 'iphone14') echo 'active'; ?>" href="/php/iphone.php?classify=iphone14">iPhone 14</a>
                            <a class="nav-link white <?php if (isset($_GET['classify']) && $_GET['classify'] == 'iphone13') echo 'active'; ?>" href="/php/iphone.php?classify=iphone13">iPhone 13</a>
                            <a class="nav-link white <?php if (isset($_GET['classify']) && $_GET['classify'] == 'iphone12') echo 'active'; ?>" href="/php/iphone.php?classify=iphone12">iPhone 12</a>
                            <a class="nav-link white <?php if (isset($_GET['classify']) && $_GET['classify'] == 'iphone11') echo 'active'; ?>" href="/php/iphone.php?classify=iphone11">iPhone 11</a>
                        </div>
                    </div>
            </nav>
            <div class="col-3 dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Sắp xếp
                </button>
                <ul class="dropdown-menu">
                    <?php
                    function sort_url($direction)
                    {
                        // Get the current query string
                        $current_query_string = $_SERVER['QUERY_STRING'];
                        //Replace the sort param if it existed
                        if (strpos($current_query_string, 'sort=') === false) {
                            $new_query_string = $current_query_string . '&sort=' . $direction;
                        } else {
                            $new_query_string = preg_replace('/sort=[a-z]+/', 'sort=' . $direction, $current_query_string);
                        }
                        // Build the new URL
                        $new_url = '?' . $new_query_string;
                        // Return the new URL
                        return $new_url;
                    }
                    ?>
                    <li><a class="dropdown-item" href="<?php echo sort_url('asc') ?>">Giá từ thấp đến cao</a></li>
                    <li><a class="dropdown-item" href="<?php echo sort_url('dsc') ?> ">Giá từ cao đến thấp</a></li>
                    <li><a class="dropdown-item" href="<?php echo sort_url('date') ?>">Mới ra mắt</a></li>
                    <li><a class="dropdown-item" href="<?php echo sort_url('fav') ?>">Bán chạy</a></li>
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
                $name_query = "SELECT product.*, iphone.version, GROUP_CONCAT(iphone.capacity ORDER BY iphone.capacity ASC SEPARATOR ',') AS capacities FROM product JOIN iphone ON product.id = iphone.id WHERE iphone.classify = '$classify' GROUP BY iphone.classify, iphone.version";
            } else {
                $name_query = "SELECT product.*, iphone.version, GROUP_CONCAT(iphone.capacity ORDER BY iphone.capacity ASC SEPARATOR ',') AS capacities FROM product JOIN iphone ON product.id = iphone.id GROUP BY iphone.classify, iphone.version";
            }
            if (isset($_GET['sort'])) {
                $sort_option = $_GET['sort'];
                if ($sort_option == 'asc') {
                    //Sort $result by price ascending
                    $result = mysqli_query($db_connect, $name_query . " ORDER BY price ASC");
                } else if ($sort_option == 'dsc') {
                    //Sort $result by price descending
                    $result = mysqli_query($db_connect, $name_query . " ORDER BY price DESC");
                } else if ($sort_option == 'date') {
                    //Sort $result by date descending
                    $result = mysqli_query($db_connect, $name_query . " ORDER BY releaseDate DESC");
                } else if ($sort_option == 'fav') {
                    //Sort $result by favorite descending
                    $result = mysqli_query($db_connect, $name_query . " ORDER BY sold DESC");
                }
            } else {
                $result = mysqli_query($db_connect, $name_query);
            }
            $num_rows = mysqli_num_rows($result);
            if ($num_rows <= 0) {
                echo '<h1 class="white text-center mb-5 mt-5">Không tìm thấy sản phẩm nào</h1>';
            }
            while ($rows = mysqli_fetch_assoc($result)) {
                if ($num_rows > 0) {
                    $price = $rows['price'];
                    $formatted_price = number_format($price, 0, '.', '.') . 'đ';
                    $capacities = explode(',', $rows['capacities']);
                    $thumbnail = $rows['thumbnail'];
                    $productName = $rows['productName'];
                    $colors = explode(',', $rows['color']);
                    $img_src = $thumbnail . '_' . $colors[0] . '.png';
                    echo
                    '<a href="/php/product.php?product=' . $rows['id'] . '" class="d-flex flex-column align-items-center justify-content-center bottom-card">
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

        <!-- Footer -->
        <footer class="row text-center text-lg-start bg-dark text-muted">
            <!-- Section: Social media -->
            <div class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <div class="me-5 d-none d-lg-block">
                    <img src="/images/apple.png" alt="Apple logo" class="logo">
                    BKApple
                </div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
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
            </div>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(34,34,34,255);">
                &copy; 2023 Copyright:
                <a class="text-reset fw-bold" href="https://github.com/phucvien2511/BKApple">Github</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-3.6.1.min.js"></script>

    <style>
        .navbar-nav a.active {
            color: white !important;
            background-color: grey !important;
        }
    </style>
</body>

</html>