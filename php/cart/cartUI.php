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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/cart_style.css">
</head>

<body>
    <div class="container-fluid">
        <!-- Header -->
        <?php include "../header.php" ?>
        <?php

        $cart_query = "SELECT * from cart where customerId = ?";
        $stmt = mysqli_prepare($db_connect, $cart_query);
        mysqli_stmt_bind_param($stmt, "s", $_SESSION['user_login']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $productList = array();
        $priceList = array();
        $colorList = array();
        $has_capacity = array();
        $tableList = array();
        //Find which table does that product id belong to
        while ($rows = mysqli_fetch_assoc($result)) {
            $id = $rows['productId'];
            $table_result = null;
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
            } else {
                echo "<h1 style='text-align:center; margin-top: 40vh;'>Lỗi: Không tìm thấy sản phẩm.</h1>";
                exit;
            }
            $tableList[] = $table_result;
            $product_query = "SELECT * FROM product JOIN $table_result ON product.id = $table_result.id WHERE product.id = ?";
            $stmt = mysqli_prepare($db_connect, $product_query);
            mysqli_stmt_bind_param($stmt, "s", $id);
            mysqli_stmt_execute($stmt);
            $product_result = mysqli_stmt_get_result($stmt);
            $product = mysqli_fetch_assoc($product_result);
            $productList[] = $product;
            $colorList[] = $product['color'];
            $priceList[] = $product['price'] * $rows['quantity'];

            //Find if that product has capacity key
            if (array_key_exists('capacity', $product)) {
                $has_capacity[] = true;
            } else {
                $has_capacity[] = false;
            }
        }
        $total_price = 0;
        foreach ($priceList as $price) {
            $total_price += $price;
        }
        $user_query = "SELECT * from user where username = ?";
        $stmt = mysqli_prepare($db_connect, $user_query);
        mysqli_stmt_bind_param($stmt, "s", $_SESSION['user_login']);
        mysqli_stmt_execute($stmt);
        $user_result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($user_result);
        ?>
        <!-- End of Header -->
        <div class="wrapper col-12 d-flex flex-column justify-content-center ">
            <!-- Product information -->
            <div class="row d-flex justify-content-center align-items-center mt-4 mb-3 mx-auto column-bg-white">

                <?php
                if (count($productList) == 0) {
                    echo '<h6 class="my-3 text-center">Giỏ hàng của bạn đang trống.</h6>';
                } else {
                    echo '<h6 class="my-3 justify-content-between fw-bold">Danh sách sản phẩm</h6>';
                    for ($i = 0; $i < count($productList); $i++) {
                        echo
                        '<button type="button" onclick="removeProductInCart(' . $i . ',\'' . $productList[$i]['id'] . '\')" class="btn-close btn-close-white remove-product-btn"></button>
                        <div class="row justify-content-between cart-item mb-3">
                        <div class="col-7 d-flex flex-row justify-content-evenly align-items-center px-0">
                        <img class="product-img" src="' . $productList[$i]['thumbnail'] . (($colorList[$i] == 'white' || $colorList[$i] == 'red') ? '' : '_' . explode(',', $productList[$i]['color'])[0]) . '.png" style="width:125px;height:125px;" alt="' . $productList[$i]['productName'] . '">
                            <div class="d-flex flex-column">
                                <div class="col-12">
                                    <p class="detail-product" style="font-size: 18px; font-weight: bold;">';
                        if ($has_capacity[$i]) {
                            echo $productList[$i]['productName'] . ' ' . $productList[$i]['capacity'];
                        } else {
                            echo $productList[$i]['productName'];
                        }
                        $colors = array();
                        $colors = explode(",", $productList[$i]['color']);
                        echo '</p>
                                        <p class="product-detail mb-0">Chọn màu</p>
                                        <div class="dropdown">';
                        /* Disable toggle dropdown if product only has 1 color */
                        echo '<button class="btn btn-secondary dropdown-toggle" type="button" 
                                                data-bs-toggle="dropdown" aria-expanded="false" id="dropdown' . $i . '"' . (($colorList[$i] == 'white' || $colorList[$i] == 'red') ? 'disabled' : '') . '>';
                        echo ucfirst($colors[0]);
                        echo '</button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdown' . $i . '">';
                        foreach ($colors as $color) {
                            echo "<li><a class='dropdown-item' href='#' style='color:black;' onclick=\"changeSliderImage('{$productList[$i]['thumbnail']}', '{$color}', '{$i}')\">$color</a></li>";
                        }
                        echo '</ul>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        <div class="col-4 d-flex flex-column align-items-center text-center">
                            <p class="pay-price">';
                        echo number_format($priceList[$i], 0, '.', '.') . 'đ';
                        echo '</p>
                            <div class="input-group mt-2">
                                <button class="btn btn-dark btn-outline-secondary dec-btn" type="button" onclick="updateCart(\''.$i.'\',\'' . $productList[$i]['id'] . '\', \'dec\')">-</button>
                                <input type="number" class="form-control text-center quantity-input" aria-label="Amount" value="'. ($priceList[$i] / $productList[$i]['price']).'" readonly>
                                <button class="btn btn-dark btn-outline-secondary inc-btn" type="button" onclick="updateCart(\''.$i.'\',\'' . $productList[$i]['id'] . '\', \'inc\')">+</button>
                            </div>
                        </div>
                        </div>';
                    
                    }
                }
                ?>

            </div>
            <!-- End product information -->
            <!-- Ship way -->
            <div class=" row d-flex flex-row justify-content-center my-1 mx-auto column-bg-white px-3 pt-2 pb-3">
                <p class="fw-bold">Hình thức giao hàng</p>
                <div class=" form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="onlineShip" checked>
                    <label class="form-check-label" for="onlineShip">
                        Giao hàng tận nơi
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="offlineShip">
                    <label class="form-check-label" for="offlineShip">
                        Nhận trực tiếp tại cửa hàng
                    </label>
                </div>
            </div>
            <!-- Customer information -->
            <div id="customer-info" class=" row d-flex flex-row justify-content-center my-1 mx-auto column-bg-white px-3 pt-2 pb-3">

            </div>
            <!-- End customer information -->
        </div>
        <!-- Footer -->
        <?php include "../footer.php" ?>
        <!-- End of Footer -->
    </div>

    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-3.6.1.min.js"></script>
    <script>
        let onlineShipHTML =
            `<p class="fw-bold">Thông tin khách hàng</p>
            <form method="post" action="addOrder.php?ship=1">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên" value="<?php echo $user['name']; ?>" required>
                    <label for="name" style="color: grey;">Họ và tên</label>
                </div>
                <div class="form-floating my-3">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại" value="<?php echo $user['phone']; ?>" required>
                    <label for="phone" style="color: grey;">Số điện thoại</label>
                </div>
                <div class="form-floating my-3">
                    <input type="text" class="form-control" id="mail" name="mail" placeholder="Mail (Ví dụ: example@gmail.com)" value="<?php echo $user['mail']; ?>" required>
                    <label for="mail" style="color: grey;">Mail</label>
                </div>
                <div class="form-floating my-3">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ (Ví dụ: 268 Lý Thường Kiệt, Phường 14, Quận 10, TP.HCM" value="<?php echo $user['address']; ?>" required>
                    <label for="address" style="color: grey;">Địa chỉ giao hàng</label>
                </div>
                <div class="form-floating my-3">
                    <textarea class="form-control" placeholder="Ghi chú thêm" id="note" name="note"></textarea>
                    <label for="note" style="color: grey;">Ghi chú thêm (nếu có)</label>
                </div>
                <div class="form-floating my-3">
                    <textarea class="form-control" placeholder="Mã khuyến mãi" id="voucher" name="voucher"></textarea>
                    <label for="voucher" style="color: grey;">Mã khuyến mãi (nếu có)</label>
                </div>
                <div style="color: gold; font-style: italic; font-size: 15px;" class="mb-3">*Quý khách vui lòng kiểm tra kỹ thông tin trước khi đặt hàng.</div>
                <div class="d-flex flex-row justify-content-between">
                    <p class="fw-bold">Tổng:</p>
                    <p class="fw-bold" id="total-price"><?php echo number_format($total_price, 0, '.', '.') . 'đ'; ?></p>
                </div>
                <button type="submit" class="btn btn-primary w-100">Đặt hàng</button>
            </form>`;
        if (document.getElementById('onlineShip').checked) {
            document.getElementById('customer-info').innerHTML = onlineShipHTML;
        }
        document.getElementById('onlineShip').addEventListener('click', function() {
            document.getElementById('customer-info').innerHTML = onlineShipHTML;
        });
        document.getElementById('offlineShip').addEventListener('click', function() {
            document.getElementById('customer-info').innerHTML =
                `<form method="post" action="addOrder.php?ship=0">
                    <p class="fw-bold">Thông tin khách hàng</p>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" placeholder="Họ và tên" value="<?php echo $user['name']; ?>" required>
                        <label for="name" style="color: grey;">Họ và tên</label>
                    </div>
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="phone" placeholder="Số điện thoại" value="<?php echo $user['phone']; ?>" required>
                        <label for="phone" style="color: grey;">Số điện thoại</label>
                    </div>
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="mail" placeholder="Mail (Ví dụ: example@gmail.com)" value="<?php echo $user['mail']; ?>" required>
                        <label for="mail" style="color: grey;">Mail</label>
                    </div>
                    <div class="form-floating mt-3 mb-1">
                        <select class="form-select" id="storeSelect" aria-label="Cửa hàng" style="width: 100%" required>
                            <option selected hidden>Chọn cửa hàng</option>
                            <option value="1">268 Lý Thường Kiệt, Phường 14, Quận 10, TP.HCM</option>
                            <option value="2">528 Nguyễn Văn Khối, Phường 9, Quận Gò Vấp, TP.HCM</option>
                            <option value="3">Tòa A5, KTX Khu A - Khu đô thị ĐHQG TP.HCM, Phường Linh Trung, TP.Thủ Đức, TP.HCM</option>
                            <option value="4">1765A QL13, Xã Hiệp An, TP. Thủ Dầu Một, tỉnh Bình Dương</option>
                        </select>
                        <label for="storeSelect" style="color: grey;">Chọn cửa hàng</label>
                    </div>
                    <div style="color: orange; font-size: 13px;">Nhân viên sẽ liên lạc với quý khách khi có hàng (sau 2-5 ngày).</div>
                    <div class="form-floating my-3">
                        <textarea class="form-control" placeholder="Mã khuyến mãi" id="voucher"></textarea>
                        <label for="voucher" style="color: grey;">Mã khuyến mãi (nếu có)</label>
                    </div>
                    <div style="color: gold; font-style: italic; font-size: 15px;" class="mb-3">*Quý khách vui lòng kiểm tra kỹ thông tin trước khi đặt hàng.</div>
                    <div class="d-flex flex-row justify-content-between">
                        <p class="fw-bold">Tổng tiền:</p>
                        <p class="fw-bold"><?php echo number_format($total_price, 0, '.', '.') . 'đ'; ?></p>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Đặt hàng</button>
                </form>`;
        });
    </script>
    <script>
        //Change the background color of memory-card into white after click
        function changeSliderImage(thumbnail, color, index) {
            //Change big images
            let cartImg = document.querySelectorAll('.product-img')[index];
            let big_img_url = thumbnail + '_' + color + '.png';
            cartImg.src = big_img_url;
            document.getElementById('dropdown' + index).innerText = color.charAt(0).toUpperCase() + color.slice(1);
        }
    </script>
    <?php
    $productData = [];
    foreach ($productList as $i => $product) {
        $price = $priceList[$i];
        $productData[] = [
            'price' => $price,
            'quantity' => 1,
        ];
    }
    ?>
    <script>
        //Disabled quantity buttons when the page is reloaded if needed
        $(document).ready(function() {
            document.querySelectorAll('.quantity-input').forEach(function(input, index) {
                    if (input.value === '1') {
                        document.querySelectorAll('.dec-btn')[index].disabled = true;
                    }
                    if (input.value === '10') {
                        document.querySelectorAll('.inc-btn')[index].disabled = true;
                    }
            });
        });
    </script>
    <script>
        function updateCart(index, product, amount) {
            $(document).ready(function() {
                $.ajax({
                    url: '/php/cart/updateQuantity.php?id=' + product + '&amt=' + amount,
                    type: 'GET',
                    success: function(response) {
                        let formattedResponse = JSON.parse(response);
                        //Change quantity input value
                        let quantityInput = document.querySelectorAll('.quantity-input')[index];
                        let payPrice = document.querySelectorAll('.pay-price')[index];
                        let newQuantity = formattedResponse.quantity;
                        quantityInput.setAttribute('value', newQuantity);
                        payPrice.innerText = formatPrice(formattedResponse.total_price) + 'đ';
                        let totalPrice = document.querySelector('#total-price');
                        totalPrice.innerText = formatPrice(formattedResponse.cart_price) + 'đ';
                        // console.log(parseInt(formattedResponse.total_price)/parseInt(newQuantity));
                        // console.log(totalPrice);
                        if (parseInt(newQuantity) === 1) {
                            document.querySelectorAll('.dec-btn')[index].disabled = true;
                        }
                        else {
                            document.querySelectorAll('.dec-btn')[index].disabled = false;
                        }
                        if (parseInt(newQuantity) === 10) {
                            document.querySelectorAll('.inc-btn')[index].disabled = true;
                        }
                        else {
                            document.querySelectorAll('.inc-btn')[index].disabled = false;
                        }
                    }

                });
            });
        }
        function removeProductInCart(index, product) {
            $(document).ready(function() {
                $.ajax({
                    url: '/php/cart/removeProduct.php?id=' + product,
                    type: 'GET',
                    success: function(response) {
                        let formattedResponse = JSON.parse(response);
                        //Decrease the price of cart
                        let totalPrice = document.querySelector('#total-price');
                        console.log(totalPrice.innerText);
                        let totalPrice_int = parseInt(totalPrice.innerText.replace('đ', '').replace('.', '').trim()) * 1000;
                        console.log(totalPrice_int);
                        totalPrice.innerText = formatPrice(totalPrice_int - parseInt(formattedResponse.removed_price)) + 'đ';
                        console.log(formattedResponse.removed_price);
                        //Remove the product from cart
                        alert('Xóa sản phẩm thành công');
                        let cartItem = document.querySelectorAll('.cart-item')[index];
                        cartItem.remove();
                        let removeBtn = document.querySelectorAll('.remove-product-btn')[index];
                        removeBtn.remove();
                        
                        //Reload page if cart is empty
                        if (document.querySelectorAll('.cart-item').length === 0) {
                            location.reload();
                        }
                    }
                });
            });
        }
        function formatPrice(price) {
            const formatter = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND',
            });
            return formatter.format(price).replace('₫', '').trim();
        }

    </script>

</body>

</html>