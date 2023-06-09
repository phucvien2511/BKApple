<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iPad - BKApple</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/ipad_style.css">
    <link rel="stylesheet" href="/css/header.css">
</head>

<body>
    <div class="container-fluid">
        <!-- Header -->
        <?php include "../header.php" ?>
        <!-- End of Header -->

        <!-- Category Logo -->
        <div class="row brand">
            <div class="d-flex justify-content-center">
                <img class="brand-img" src="/images/apple.png" alt="Apple logo">
                <h2 class="brand-name">iPad</h2>
            </div>
        </div>
        <!-- End of Category Logo -->

        <!-- Slider -->
        <div id="carouselExampleIndicators" class="carousel slide mx-auto" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/images/ipad/banner1.png" class="d-block w-100" alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img src="/images/ipad/banner2.png" class="d-block w-100" alt="Banner 2">
                </div>
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
        <div class="row d-flex flex-row text-nowrap align-items-center justify-content-between mt-3 mb-2 text-center choose-series">
            <nav class="col-9 navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#openMacList" aria-controls="openMacList" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse text-center text-sm-start" id="openMacList">

                        <div class="navbar-nav">
                            <a class="nav-link white <?php if (!isset($_GET['classify'])) echo 'active'; ?>" href="/php/categories/ipad.php">Tất cả</a>
                            <a class="nav-link white <?php if (isset($_GET['classify']) && $_GET['classify'] == 'pro-m1') echo 'active'; ?>" href="/php/categories/ipad.php?classify=pro-m1">iPad Pro M1</a>
                            <a class="nav-link white <?php if (isset($_GET['classify']) && $_GET['classify'] == 'pro-m2') echo 'active'; ?>" href="/php/categories/ipad.php?classify=pro-m2">iPad Pro M2</a>
                            <a class="nav-link white <?php if (isset($_GET['classify']) && $_GET['classify'] == 'air') echo 'active'; ?>" href="/php/categories/ipad.php?classify=air">iPad Air</a>
                            <a class="nav-link white <?php if (isset($_GET['classify']) && $_GET['classify'] == 'mini') echo 'active'; ?>" href="/php/categories/ipad.php?classify=mini">iPad Mini</a>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="col-3 dropdown sort-menu">
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
                    <li><a class="dropdown-item" href="<?php echo sort_url('date') ?>">Ngày ra mắt</a></li>
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

            $img_classify = null;
            //Check connection
            if (!$db_connect) {
                die("Connection failed: " . mysqli_connect_error());
            }
            if (isset($_GET['classify'])) {
                $classify = $_GET['classify'];
                $name_query = "SELECT product.* FROM product JOIN ipad ON product.id = ipad.id WHERE ipad.classify = '$classify'";
            } else {
                $name_query = "SELECT product.* FROM product JOIN ipad ON product.id = ipad.id";
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
                    $thumbnail = $rows['thumbnail'];
                    $productName = $rows['productName'];
                    $colors = explode(',', $rows['color']);
                    $price = $rows['price'];
                    $img_src = $thumbnail . '_' . $colors[0] . '.png';
                    echo
                    '<a href="/php/product.php?product=' . $rows['id'] . '" class="d-flex flex-column align-items-center justify-content-center bottom-card">
                    <img src="' . $img_src . '" alt="' . $productName . '" class="bottom-card-img">
                    <div class="row">';
                    echo
                    '<div class="col memory-card">
                        <div class="memory">256GB</div>
                    </div>';
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

        <?php include "../footer.php" ?>
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