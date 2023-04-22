<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page</title>
    <link rel="stylesheet" href="/css/skdslider.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/cart_style.css">
</head>

<body>
    <div class="container-fluid">
        <!-- Header -->
        <div class="row header sticky-top">
            <a class="col-2 text-center title text-decoration-none" href="/index.html">
                <img src="/images/apple.png" alt="Apple logo" class="logo">
                BKApple
            </a>
            <div class="col-6 text-center">
                <nav class=" navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav" id="header-options">
                                <a class="nav-link white" href="/html/iphone.html">iPhone</a>
                                <a class="nav-link white" href="/html/ipad.html">iPad</a>
                                <a class="nav-link white" href="/html/mac.html">Mac</a>
                                <a class="nav-link white" href="/html/sound.html">Âm thanh</a>
                                <a class="nav-link white" href="/html/accessory.html">Phụ kiện</a>
                                <a class="nav-link white" href="/html/warranty.html">Bảo hành</a>
                                <a class="nav-link white" href="/html/about.html">Về chúng tôi</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <form action="#" class="col-4 text-center search-bar">
                <input type="text" placeholder="Search" class="search-input">
                <button type="submit">&#128269;</button>
                <a href="/html/login.html" class="text-decoration-none">Đăng nhập</a>
            </form>
        </div>
        <!-- End of Header -->

        <!-- Description Feature -->
        <div class="row">
            <div class="d-flex justify-content-center description-feature">
                <div class="col-4">
                    <p class="description-feature-text">
                        &lt; Mua thêm sản phẩm khác</p>
                </div>
                <div class="col-1">
                    <p class="description-feature-text">Giỏ hàng của bạn</p>
                </div>
            </div>
        </div>
        <!-- Description Feature -->

        <!-- Information Product -->
        <div class="row justify-content-center">
            <div class="row justify-content-center">
                <div class="col-4 column-bg-white">
                    <div class="row justify-content-start image-and-infor-product">
                        <div class="col-3">
                            <img src="/images/shopPage/iphone_14_plus_128GB.png" style="width:100px;" alt="iPhone 14 Plus">
                        </div>
                        <div class="col-6">
                            <p class="detail-product">iPhone 14 Plus 128GB</p>
                            <div class="dropdown">
                                <button onclick="dropDown()" class="btn-dropdown">
                                    Chọn màu
                                    <img alt="Choose color" src="/images/shopPage/drop_down.png" class="image-dropdown">
                                </button>
                                <div class="dropItem">
                                    <a href="#">Tím Nhạt</a>
                                    <a href="#">Xanh Dương</a>
                                    <a href="#">Đen</a>
                                    <a href="#">Trắng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1 column-bg-white">
                    <p class="pay-price">23.090.000đ</p>
                    <p class="old-price">27.990.000đ</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-4 column-bg-white">
                    <p class="before-discount-price">Tạm tính:</p>
                </div>
                <div class="col-1 column-bg-white">
                    <p class="before-discount-price">23.090.000đ</p>
                </div>
            </div>
        </div>
        <!-- End Information Product -->

        <!-- Information Customer -->
        <div class="row justify-content-center information-customer">
            <div class="row justify-content-center">
                <div class="col-5 column-bg-white">
                    <p class="bold-text">Thông tin khách hàng</p>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">Anh</label>
                        <input title="Male" class="form-check-input" type="radio" name="inlineRadio1" id="inlineRadio1" value="male">

                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio2">Chị</label>
                        <input title="Female" class="form-check-input" type="radio" name="inlineRadio2" id="inlineRadio2" value="female">

                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5 column-bg-white">
                    <form>
                        <div class="row justify-content-center">
                            <input type="text" class="form-control form-information" placeholder="Họ và tên">
                            <input type="text" class="form-control form-information" placeholder="Số điện thoại">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Information Customer -->

        <!-- Ship Way -->
        <div class="row justify-content-center ship-way">
            <div class="row justify-content-center">
                <div class="col-5 column-bg-white">
                    <p class="bold-text">Chọn hình thức nhận hàng</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option1">
                        <label class="form-check-label" for="inlineRadio3">Giao hàng tận nơi</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option2">
                        <label class="form-check-label" for="inlineRadio4">Nhận tại cửa hàng</label>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5 column-bg-white">
                    <form>
                        <div class="form-row">
                            <div class="form-group form-ship-way">
                                <select title="City" class="form-control">
                                    <option selected hidden>Tỉnh/Thành phố</option>
                                    <option>Hồ Chí Minh</option>
                                    <option>Bình Dương</option>
                                    <option>Đồng Nai</option>
                                    <option>Tây Ninh</option>
                                    <option>Bà Rịa - Vũng Tàu</option>
                                </select>
                            </div>
                            <div class="form-group form-ship-way">
                                <select title="District" class="form-control">
                                    <option selected hidden>Quận/Huyện</option>
                                    <option>Quận 1</option>
                                    <option>Quận 2</option>
                                    <option>Quận 3</option>
                                    <option>Quận 4</option>
                                </select>
                            </div>
                            <div class="form-group form-ship-way">
                                <select title="Ward" class="form-control">
                                    <option selected hidden>Phường/Xã</option>
                                    <option>Phường 1</option>
                                    <option>Phường 2</option>
                                    <option>Phường 3</option>
                                    <option>Phường 4</option>
                                </select>
                            </div>
                            <div class="form-group form-ship-way">
                                <input type="text" class="form-control" placeholder="Số nhà, tên đường (Ví dụ: 268 Lý Thường Kiệt)">
                            </div>
                            <div class="form-group form-ship-way">
                                <input type="text" class="form-control" placeholder="Ghi chú thêm (Nếu có)">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Ship Way -->

        <!-- Accept to buy -->
        <div class="row justify-content-center accept-to-buy">
            <div class="row justify-content-center">
                <div class="col-5 column-bg-white">
                    <div class="form-group">
                        <label for="discount-code" class="discount-text">Mã giảm giá</label>
                        <input id="discount-code" name="discount-code" type="text" class="form-control" placeholder="Nhập mã giảm giá (Nếu có)">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-4 column-bg-white">
                    <p class="total-price">Tổng tiền:</p>
                </div>
                <div class="col-1 column-bg-white">
                    <p class="total-price total-price-color">23.090.000đ</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5 column-bg-white">
                    <button type="button" class="btn btn-primary btn-buy">Đặt hàng</button>
                    <p class="text-thank-you">Cám ơn bạn đã tin tưởng BKApple</p>
                </div>
            </div>
        </div>
        <!-- Accept to buy -->
    </div>

    <script src="/js/bootstrap.bundle.min.js"></script>
    <script>
        function dropDown() {
            document.querySelector(".dropItem").classList.toggle("show-drop-item");
        }
    </script>
</body>

</html>