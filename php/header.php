<div class="header sticky-top d-flex flex-row justify-content-between">
    <a class="col-sm-4 col-lg-2 title text-decoration-none d-flex align-items-center px-3" href="/index.php">
        <img src="/images/apple.png" alt="Apple logo" class="logo">
        <span>BKApple</span>
    </a>
    <div class="col-sm-6 col-lg-9 mx-auto text-end">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
                    <div class="navbar-nav" id="header-options">
                        <a class="nav-link white" href="/php/categories/iphone.php">iPhone</a>
                        <a class="nav-link white" href="/php/categories/ipad.php">iPad</a>
                        <a class="nav-link white" href="/php/categories/mac.php">Mac</a>
                        <a class="nav-link white" href="/php/categories/watch.php">Watch</a>
                        <a class="nav-link white" href="/php/categories/sound.php">Âm thanh</a>
                        <a class="nav-link white" href="/php/categories/accessory.php">Phụ kiện</a>
                        <a class="nav-link white" href="/php/categories/news.php">Tin tức</a>
                        <a class="nav-link white" href="/php/categories/about.php">Về chúng tôi</a>
                    </div>

                    <form class="d-flex flex-row my-auto me-5">
                        <input id="search" class="form-control" type="text" placeholder="Tìm sản phẩm" aria-label="Search">
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <div class="col-sm-1 d-flex flex-row align-items-center justify-content-end user-icons">
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
        session_start();
        //check if user is logged in
            
        //Count number of items in cart
            
        if (isset($_SESSION['user_login'])) {
            $cart_query = "SELECT COUNT(*) FROM cart WHERE customerId = '{$_SESSION['user_login']}';";
            $cart_result = mysqli_query($db_connect, $cart_query);
            $cart_row = mysqli_fetch_array($cart_result);
            $cart_count = $cart_row[0];
            echo '<div class="dropdown">
                    <a class="btn btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span><img src="' . $_SESSION['user_avatar'] . '" alt="User avatar" style="width: 35px; height: 35px; border-radius: 50%;"></span>
                        <span class="white">' . $_SESSION['user_login'] . '</span> 
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end">';
            if ($_SESSION['user_role'] == 'admin') {
                echo '<li><a class="dropdown-item" href="/php/admin/viewProductList.php">Trang Admin</a></li>';
            }
            echo '<li><a class="dropdown-item" href="/php/information.php">Thông tin cá nhân</a></li>
                        <li><a class="dropdown-item d-flex justify-content-between align-items-center" href="/php/cart/cartUI.php">Giỏ hàng<span class="badge bg-dark cart-count">'.$cart_count.'</span></a></li>
                        <li><a class="dropdown-item" href="/php/cart/orderUI.php">Xem đơn hàng</a></li> 
                        <li><a class="dropdown-item" href="/php/logout.php">Đăng xuất</a></li> 
                    </ul>
                </div>';
        } else {
            echo '<a href="/php/login.php" class="btn btn-sm btn-outline-light mx-auto">Đăng nhập</a>';
        }
        ?>

    </div>
</div>
<style>
</style>