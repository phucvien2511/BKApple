<?php
session_start();
if (!isset($_SESSION['user_login'])) {
    header("location: /index.php");
    exit;
}
?>
<div class="sidebar d-flex flex-column flex-shrink-0 p-3 col-2">
    <a href="viewProductList.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="/images/apple.png" alt="Apple logo" class="logo">
        <span class="fs-4">BKApple</span>
    </a>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?php
                        echo $_SESSION['user_avatar']; ?>" alt="Admin avatar" width="32" height="32" class="rounded-circle me-2">
            <strong>
                <?php echo $_SESSION['user_login']; ?>
            </strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">Thông tin tài khoản</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="/php/logout.php">Đăng xuất</a></li>
        </ul>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="viewProductList.php" class="nav-link nav-link-product">
                <span class="material-symbols-outlined">phone_iphone</span>
                <span>Sản phẩm</span>

            </a>
        </li>
        <li class="nav-item">
            <a href="viewUserList.php" class="nav-link nav-link-user">
                <span class="material-symbols-outlined">group</span>
                <span>Khách hàng</span>
            </a>
        </li>
    </ul>
</div>