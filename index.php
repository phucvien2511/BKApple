<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - BKApple</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/header.css">

</head>

<body>
    <!-- Main page -->
    <div class="container-fluid">
        <!-- Header -->
        <?php include "php/header.php" ?>
        <!-- End of Header -->
        <div class="body">

            <!-- Slider -->
            <div id="carouselExampleIndicators" class="carousel slide mb-3 mt-3 mx-auto" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/images/landingPage/banner1.jpg" class="d-block w-100" alt="Banner 1">
                    </div>
                    <div class="carousel-item">
                        <img src="/images/landingPage/banner2.jpg" class="d-block w-100" alt="Banner 2">
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
            <div class="row d-flex flex-row align-items-center justify-content-center">
                <div class="d-flex flex-column align-items-center justify-content-center col-6 col-sm-4 col-md-2 top-card">
                    <a href="/php/categories/iphone.php" class="text-decoration-none">
                        <img src="images/landingPage/img-cateiphone-1.webp" alt="iPhone" class="top-card-img">
                        <h5 class="white text-center">iPhone</h5>
                    </a>
                </div>
                <div class="d-flex flex-column align-items-center justify-content-center col-6 col-sm-4 col-md-2 top-card">
                    <a href="/php/categories/ipad.php" class="text-decoration-none">
                        <img src="images/landingPage/img-cateipad.webp" alt="iPad" class="top-card-img">
                        <h5 class="white text-center">iPad</h5>
                    </a>
                </div>
                <div class="d-flex flex-column align-items-center justify-content-center col-6 col-sm-4 col-md-2 top-card">
                    <a href="/php/categories/mac.php" class="text-decoration-none">
                        <img src="images/landingPage/img-catemac-1.webp" alt="Mac" class="top-card-img">
                        <h5 class="white text-center">Mac</h5>
                    </a>
                </div>
                <div class="d-flex flex-column align-items-center justify-content-center col-6 col-sm-4 col-md-2 top-card">
                    <a href="/php/categories/watch.php" class="text-decoration-none">
                        <img src="images/landingPage/img-catewatch-1.webp" alt="Apple Watch" class="top-card-img">
                        <h5 class="white text-center">Apple Watch</h5>
                    </a>
                </div>
                <div class="d-flex flex-column align-items-center justify-content-center col-6 col-sm-4 col-md-2 top-card">
                    <a href="/php/categories/sound.php" class="text-decoration-none">
                        <img src="images/landingPage/img-catesound.webp" alt="Âm thanh" class="top-card-img">
                        <h5 class="white text-center">Âm thanh</h5>
                    </a>
                </div>
                <div class="d-flex flex-column align-items-center justify-content-center col-6 col-sm-4 col-md-2 top-card">
                    <a href="/php/categories/accessory.php" class="text-decoration-none">
                        <img src="images/landingPage/img-catephukien.webp" alt="Phụ kiện" class="top-card-img">
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
                    //Get iphone products from database, but not duplicate if same classify and version
                    $name_query = "SELECT * FROM product JOIN iphone ON product.id = iphone.id GROUP BY classify, version ORDER BY releaseDate DESC LIMIT 4";
                    $result = mysqli_query($db_connect, $name_query);
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $price = $rows['price'];
                        $formatted_price = $formatted_price = number_format($price, 0, '.', '.') . 'đ';
                        $thumbnail = $rows['thumbnail'];
                        $colors = explode(',', $rows['color']);
                        $version = str_replace(' ', '', $rows['version']);
                        $img_src = $thumbnail . '_' . $colors[0] . '.png';
                        echo
                        '<a href="/php/product.php?product=' . $rows['id'] . '"
                        class="d-flex flex-column align-items-center justify-content-center bottom-card col-sm-12 col-md-6 col-lg-3">
                            <img src="' . $img_src . '" alt="' . $rows['productName'] . '" class="bottom-card-img">
                            <div class="d-flex flex-column align-items-center">
                                <h6 class="white text-center" class="mt-4 mb-4">' . $rows['productName'] . ' ' . $rows['capacity'] . '</h6>
                                <h5 class="white text-center">' . $formatted_price . '</h5>
                            </div>
                        </a>';
                    }
                    ?>
                </div>
                <!-- iPad top products -->
                <div class="col-12 category-title">iPad</div>
                <div class="row d-flex flex-row align-items-center justify-content-center">
                    <?php
                    //Get iphone products from database, but not duplicate if same classify and version
                    $name_query = "SELECT * FROM product JOIN ipad ON product.id = ipad.id GROUP BY ipad.classify ORDER BY releaseDate DESC LIMIT 4";
                    $result = mysqli_query($db_connect, $name_query);
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $price = $rows['price'];
                        $formatted_price = $formatted_price = number_format($price, 0, '.', '.') . 'đ';
                        $thumbnail = $rows['thumbnail'];
                        $colors = explode(',', $rows['color']);
                        $classify = str_replace(' ', '', $rows['classify']);
                        $img_src = $thumbnail . '_' . $colors[0] . '.png';
                        echo
                        '<a href="/php/product.php?product=' . $rows['id'] . '"
                        class="d-flex flex-column align-items-center justify-content-center bottom-card col-sm-12 col-md-6 col-lg-3">
                            <img src="' . $img_src . '" alt="' . $rows['productName'] . '" class="bottom-card-img">
                            <div class="d-flex flex-column align-items-center">
                                <h6 class="white text-center" class="mt-4 mb-4">' . $rows['productName'] . '</h6>
                                <h5 class="white text-center">' . $formatted_price . '</h5>
                            </div>
                        </a>';
                    }
                    ?>
                </div>
                <!-- Mac top products -->
                <div class="col-12 category-title">Mac</div>
                <div class="row d-flex flex-row align-items-center justify-content-center">
                    <?php
                    //Get iphone products from database, but not duplicate if same classify and version
                    $name_query = "SELECT * FROM product JOIN mac ON product.id = mac.id ORDER BY sold DESC LIMIT 4";
                    $result = mysqli_query($db_connect, $name_query);
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $price = $rows['price'];
                        $formatted_price = $formatted_price = number_format($price, 0, '.', '.') . 'đ';
                        $thumbnail = $rows['thumbnail'];
                        $colors = explode(',', $rows['color']);
                        $classify = str_replace(' ', '', $rows['classify']);
                        $img_src = $thumbnail . '_' . $colors[0] . '.png';
                        echo
                        '<a href="/php/product.php?product=' . $rows['id'] . '"
                        class="d-flex flex-column align-items-center justify-content-center bottom-card col-sm-12 col-md-6 col-lg-3">
                            <img src="' . $img_src . '" alt="' . $rows['productName'] . '" class="bottom-card-img">
                            <div class="d-flex flex-column align-items-center">
                                <h6 class="white text-center" class="mt-4 mb-4">' . $rows['productName'] . '</h6>
                                <h5 class="white text-center">' . $formatted_price . '</h5>
                            </div>
                        </a>';
                    }
                    ?>
                </div>
                <div class="col-12 category-title">Watch</div>
                <div class="row d-flex flex-row align-items-center justify-content-center">
                    <?php
                    //Get iphone products from database, but not duplicate if same classify and version
                    $name_query = "SELECT * FROM product JOIN watch ON product.id = watch.id ORDER BY sold DESC LIMIT 4";
                    $result = mysqli_query($db_connect, $name_query);
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $price = $rows['price'];
                        $formatted_price = $formatted_price = number_format($price, 0, '.', '.') . 'đ';
                        $thumbnail = $rows['thumbnail'];
                        $colors = explode(',', $rows['color']);
                        $classify = str_replace(' ', '', $rows['classify']);
                        $img_src = $thumbnail . '_' . $colors[0] . '.png';
                        echo
                        '<a href="/php/product.php?product=' . $rows['id'] . '"
                        class="d-flex flex-column align-items-center justify-content-center bottom-card col-sm-12 col-md-6 col-lg-3">
                            <img src="' . $img_src . '" alt="' . $rows['productName'] . '" class="bottom-card-img">
                            <div class="d-flex flex-column align-items-center">
                                <h6 class="white text-center" class="mt-4 mb-4">' . $rows['productName'] . '</h6>
                                <h5 class="white text-center">' . $formatted_price . '</h5>
                            </div>
                        </a>';
                    }
                    ?>
                </div>
                <div class="col-12 category-title">Âm thanh</div>
                <div class="row d-flex flex-row align-items-center justify-content-center">
                    <?php
                    //Get iphone products from database, but not duplicate if same classify and version
                    $name_query = "SELECT * FROM product JOIN sound ON product.id = sound.id ORDER BY sold DESC LIMIT 4";
                    $result = mysqli_query($db_connect, $name_query);
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $price = $rows['price'];
                        $formatted_price = $formatted_price = number_format($price, 0, '.', '.') . 'đ';
                        $thumbnail = $rows['thumbnail'];
                        $colors = explode(',', $rows['color']);
                        $classify = str_replace(' ', '', $rows['classify']);
                        $img_src = $thumbnail . '.png';
                        echo
                        '<a href="/php/product.php?product=' . $rows['id'] . '"
                            class="d-flex flex-column align-items-center justify-content-center bottom-card col-sm-12 col-md-6 col-lg-3">
                                <img src="' . $img_src . '" alt="' . $rows['productName'] . '" class="bottom-card-img">
                                <div class="d-flex flex-column align-items-center">
                                    <h6 class="white text-center" class="mt-4 mb-4">' . $rows['productName'] . '</h6>
                                    <h5 class="white text-center">' . $formatted_price . '</h5>
                                </div>
                            </a>';
                    }
                    ?>
                </div>
                <div class="col-12 category-title">Phụ kiện</div>
                <div class="row d-flex flex-row align-items-center justify-content-center">
                    <?php
                    //Get iphone products from database, but not duplicate if same classify and version
                    $name_query = "SELECT * FROM product JOIN accessory ON product.id = accessory.id GROUP BY classify ORDER BY sold DESC LIMIT 4";
                    $result = mysqli_query($db_connect, $name_query);
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $price = $rows['price'];
                        $formatted_price = $formatted_price = number_format($price, 0, '.', '.') . 'đ';
                        $thumbnail = $rows['thumbnail'];
                        $colors = explode(',', $rows['color']);
                        if ($rows['classify'] != 'case') {
                            $img_src = $thumbnail . '.png';
                        } else {
                            $img_src = $thumbnail . '_' . $colors[0] . '.png';
                        }
                        echo
                        '<a href="/php/product.php?product=' . $rows['id'] . '"
                        class="d-flex flex-column align-items-center justify-content-center bottom-card col-sm-12 col-md-6 col-lg-3">
                            <img src="' . $img_src . '" alt="' . $rows['productName'] . '" class="bottom-card-img">
                            <div class="d-flex flex-column align-items-center">
                                <h6 class="white text-center" class="mt-4 mb-4">' . $rows['productName'] . '</h6>
                                <h5 class="white text-center">' . $formatted_price . '</h5>
                            </div>
                        </a>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        mysqli_free_result($result);
        mysqli_close($db_connect);
        include 'php/footer.php';
        ?>
        
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-3.6.1.min.js"></script>
</body>

</html>