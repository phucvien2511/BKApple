<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - BKApple</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include "sidebar.php" ?>
            <script>
                document.querySelector('.nav-link-product').style.backgroundColor = 'white';
                document.querySelectorAll('.nav-link-product > *').forEach((element) => {
                    element.style.color = 'black';
                });
                document.querySelectorAll('.nav-link-user > *').forEach((element) => {
                    element.style.color = 'white';
                });
            </script>
            <div class="content d-flex flex-column flex-shrink-0 p-3 text-white col-8 container">
                <div class="navigation row">
                    <a class="col">
                        <a href="viewProductList.php"><span class="material-symbols-outlined">arrow_back</span></a>
                        <h1>Thêm sản phẩm</h1>
                    </a>
                </div>

                <div class="row">
                    <form class="g-3 needs-validation" method="post" action="addProduct.php" enctype="multipart/form-data" novalidate>
                        <div class="col">
                            <h4>Thông tin chung</h4>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="id" placeholder="Enter ID" name="id" pattern="[A-Za-z0-9._]+" required>
                                <label for="id">ID</label>
                                <div class="invalid-feedback">
                                    ID sai cú pháp.
                                </div>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="productName" placeholder="Enter product name" name="productName" required>
                                <label for="productName">Tên sản phẩm</label>
                                <div class="invalid-feedback">
                                    Tên sản phẩm sai cú pháp.
                                </div>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="number" min="0" step="1000" class="form-control" id="price" placeholder="Enter Price" name="price" required>
                                <label for="price">Giá</label>
                                <div class="invalid-feedback">
                                    Giá không được trống.
                                </div>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="date" class="form-control" id="releaseDate" placeholder="Enter release date" name="releaseDate">
                                <label for="releaseDate">Ngày ra mắt</label>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="number" min="0" step="1" class="form-control" id="quantity" placeholder="Enter quantity" name="quantity">
                                <label for="quantity">Số lượng sản phẩm</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea name="description" class="form-control" placeholder="Mô tả" id="description"></textarea>
                                <label for="description">Mô tả chi tiết</label>
                            </div>

                            <h4>Hình ảnh</h4>
                            <div class="form-floating">
                                <select class="form-select" name="productColorNumber" id="productColorNumber" aria-label="productColorNumber" onchange="customColorInfo()">
                                    <option selected value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                                <label for="productColorNumber">Số lượng màu sắc</label>
                            </div>

                            <div class="row defaultColor mt-2">
                                <div class="mb-4 col">
                                    <label for="defaultColor" class="mb-2">Màu mặc định</label>
                                    <select class="form-select" name="defaultColor" id="defaultColor" aria-label="defaultColor">
                                        <option value="red" selected>Đỏ</option>
                                        <option value="black">Đen</option>
                                        <option value="brown">Nâu</option>
                                        <option value="lightblue">Lam nhạt</option>
                                        <option value="blue">Xanh lam</option>
                                        <option value="green">Xanh lục</option>
                                        <option value="gold">Vàng</option>
                                        <option value="pink">Hồng</option>
                                        <option value="purple">Tím</option>
                                        <option value="silver">Bạc</option>
                                        <option value="gray">Xám</option>
                                        <option value="white">Trắng</option>
                                    </select>
                                </div>

                                <div class="mb-3 col">
                                    <label for="defaultColorthumbnail" class="form-label">Ảnh đại diện</label>
                                    <input class="form-control" type="file" name="defaultColorthumbnail" id="defaultColorthumbnail" accept=".png" required>
                                    <div class="invalid-feedback">
                                        Thumbnail không được trống.
                                    </div>
                                </div>

                                <div class="mb-3 col">
                                    <label for="defaultColorpicture" class="form-label">Ảnh minh họa</label>
                                    <input class="form-control" type="file" name="defaultColorpicture[]" id="defaultColorpicture" multiple accept=".png" required>
                                    <div class="invalid-feedback">
                                        Ảnh không được trống.
                                    </div>
                                </div>
                            </div>

                            <div class="row subColor1">
                                <div class="mb-3 col">
                                    <label for="subColor1">Màu bổ sung 1</label>
                                    <select class="form-select" name="subColor1" id="subColor1" aria-label="subColor1">
                                        <option value="red" selected>Đỏ</option>
                                        <option value="black">Đen</option>
                                        <option value="brown">Nâu</option>
                                        <option value="lightblue">Lam nhạt</option>
                                        <option value="blue">Xanh dương</option>
                                        <option value="green">Xanh lục</option>
                                        <option value="gold">Vàng</option>
                                        <option value="pink">Hồng</option>
                                        <option value="purple">Tím</option>
                                        <option value="silver">Bạc</option>
                                        <option value="gray">Xám</option>
                                        <option value="white">Trắng</option>
                                    </select>
                                </div>

                                <div class="mb-3 col">
                                    <label for="subColor1thumbnail" class="form-label">Ảnh đại diện bổ sung 1</label>
                                    <input class="form-control" type="file" name="subColor1thumbnail" id="subColor1thumbnail">
                                </div>

                                <div class="mb-3 col">
                                    <label for="subColor1picture" class="form-label">Ảnh minh họa bổ sung 1</label>
                                    <input class="form-control" type="file" name="subColor1picture[]" id="subColor1picture" multiple>
                                </div>
                            </div>

                            <div class="row subColor2">
                                <div class="mb-3 col">
                                    <label for="subColor2">Màu bổ sung 2</label>
                                    <select class="form-select" name="subColor2" id="subColor2" aria-label="subColor2">
                                        <option value="red" selected>Đỏ</option>
                                        <option value="black">Đen</option>
                                        <option value="brown">Nâu</option>
                                        <option value="lightblue">Lam nhạt</option>
                                        <option value="blue">Xanh dương</option>
                                        <option value="green">Xanh lục</option>
                                        <option value="gold">Vàng</option>
                                        <option value="pink">Hồng</option>
                                        <option value="purple">Tím</option>
                                        <option value="silver">Bạc</option>
                                        <option value="gray">Xám</option>
                                        <option value="white">Trắng</option>
                                    </select>
                                </div>

                                <div class="mb-3 col">
                                    <label for="subColor2thumbnail" class="form-label">Ảnh đại diện bổ sung 2</label>
                                    <input class="form-control" type="file" name="subColor2thumbnail" id="subColor2thumbnail">
                                </div>

                                <div class="mb-3 col">
                                    <label for="subColor2picture" class="form-label">Ảnh minh họa bổ sung 2</label>
                                    <input class="form-control" type="file" name="subColor2picture[]" id="subColor2picture" multiple>
                                </div>
                            </div>

                            <h4>Phân loại</h4>
                            <div class="form-floating mb-3">
                                <select class="form-select" name="productType" id="productType" aria-label="productType" onchange="customInfo()">
                                    <option value="iphone" selected>iPhone</option>
                                    <option value="ipad">iPad</option>
                                    <option value="mac">Mac</option>
                                    <option value="watch">Watch</option>
                                    <option value="sound">Âm thanh</option>
                                    <option value="accessory">Phụ kiện</option>
                                </select>
                                <label for="productType">Phân loại</label>
                            </div>

                            <div class="row iphone">
                                <div class="col form-floating">
                                    <select class="form-select" name="classifyIPhone" id="classifyIPhone" aria-label="classifyIPhone">
                                        <option value="iphone11" Selected>iPhone 11</option>
                                        <option value="iphone12">iPhone 12</option>
                                        <option value="iphone13">iPhone 13</option>
                                        <option value="iphone14">iPhone 14</option>
                                    </select>
                                    <label for="classifyIPhone">Phân loại iPhone</label>
                                </div>

                                <div class="col form-floating">
                                    <select class="form-select" name="versionIPhone" id="versionIPhone" aria-label="versionIPhone">
                                        <option value="None" Selected>Phổ thông</option>
                                        <option value="pro">Pro</option>
                                        <option value="promax">Pro Max</option>
                                        <option value="plus">Plus</option>
                                    </select>
                                    <label for="versionIPhone">Phiên bản</label>
                                </div>

                                <div class="col form-floating">
                                    <select class="form-select" name="capacityIPhone" id="capacityIPhone" aria-label="capacityIPhone">
                                        <option value="64GB" Selected>64 GB</option>
                                        <option value="128GB">128 GB</option>
                                        <option value="256GB">256 GB</option>
                                        <option value="512GB">512 GB</option>
                                        <option value="1TB">1 TB</option>
                                    </select>
                                    <label for="capacityIPhone">Dung lượng bộ nhớ</label>
                                </div>
                            </div>

                            <div class="row ipad">
                                <div class="col form-floating">
                                    <select class="form-select" name="classifyIPad" id="classifyIPad" aria-label="classifyIPad">
                                        <option value="air" Selected>Air</option>
                                        <option value="mini">Mini</option>
                                        <option value="prom1">Pro M1</option>
                                        <option value="prom12">Pro M2</option>
                                    </select>
                                    <label for="classifyIPad">Phân loại iPad</label>
                                </div>

                                <div class="col form-floating">
                                    <select class="form-select" name="capacityIPad" id="capacityIPad" aria-label="capacityIPad">
                                        <option value="64GB" Selected>64 GB</option>
                                        <option value="128GB">128 GB</option>
                                        <option value="256GB">256 GB</option>
                                        <option value="512GB">512 GB</option>
                                        <option value="1TB">1 TB</option>
                                    </select>
                                    <label for="capacityIPad">Dung lượng bộ nhớ</label>
                                </div>
                            </div>

                            <div class="row mac">
                                <div class="col form-floating">
                                    <select class="form-select" name="classifyMac" id="classifyMac" aria-label="classifyMac">
                                        <option value="imac" Selected>iMac</option>
                                        <option value="air">Air</option>
                                        <option value="pro">Pro</option>
                                    </select>
                                    <label for="classifyMac">Phân loại Mac</label>
                                </div>

                                <div class="col form-floating">
                                    <select class="form-select" name="capacityMac" id="capacityMac" aria-label="capacityMac">
                                        <option value="6256" Selected>RAM 8GB - SSD 256GB</option>
                                        <option value="16512">RAM 16GB - SSD 512GB</option>
                                    </select>
                                    <label for="capacityMac">Dung lượng bộ nhớ</label>
                                </div>
                            </div>

                            <div class="row watch">
                                <div class="col form-floating">
                                    <select class="form-select" name="classifyWatch" id="classifyWatch" aria-label="classifyWatch">
                                        <option value="ultra" Selected>Ultra</option>
                                        <option value="se">Se</option>
                                    </select>
                                    <label for="classifyWatch">Phân loại đồng hồ</label>
                                </div>

                                <div class="col form-floating">
                                    <select class="form-select" name="diameter" id="diameter" aria-label="diameter">
                                        <option value="40mm" Selected>40mm</option>
                                        <option value="44mm">44mm</option>
                                        <option value="49mm">49mm</option>
                                    </select>
                                    <label for="diameter">Đường kính mặt đồng hồ</label>
                                </div>
                            </div>


                            <div class="row sound">
                                <div class="col form-floating">
                                    <select class="form-select" name="classifySound" id="classifySound" aria-label="classifySound">
                                        <option value="airpod" Selected>Airpod</option>
                                        <option value="earpod">Earpod</option>
                                    </select>
                                    <label for="classifySound">Phân loại tai nghe</label>
                                </div>
                            </div>

                            <div class="row accessory">
                                <div class="col form-floating">
                                    <select class="form-select" name="classifyAccessory" id="classifyAccessory" aria-label="classifyAccessory">
                                        <option value="airtag" Selected>Airtag</option>
                                        <option value="battery">Sạc dự phòng</option>
                                        <option value="case">Ốp lưng</option>
                                        <option value="charger">Cục sạc</option>
                                        <option value="wire">Dây kết nối</option>
                                    </select>
                                    <label for="classifyAccessory">Phân loại phụ kiện</label>
                                </div>
                            </div>

                            <div class="row justify-content-end mt-3">
                                <div class="col-1">
                                    <a href="viewProductList.php" class="btn btn-secondary">Hủy</a>
                                </div>
                                <div class="col-1">
                                    <button type="submit" class="btn btn-secondary">Lưu</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-3.6.1.min.js"></script>
    <script src="/js/addProduct.js"></script>

    <script>
        $(".subColor1").hide();
        $(".subColor2").hide();
        $(".ipad").hide();
        $(".mac").hide();
        $(".watch").hide();
        $(".sound").hide();
        $(".accessory").hide();

        function customColorInfo() {
            let productColorNumber = $("#productColorNumber option:selected").val();
            $(".subColor1").hide();
            $(".subColor2").hide();

            if (productColorNumber > 1) $(".subColor1").show();
            if (productColorNumber > 2) $(".subColor2").show();
        }

        function customInfo() {
            let productType = $("#productType option:selected").val();
            $(".iphone").hide();
            $(".ipad").hide();
            $(".mac").hide();
            $(".watch").hide();
            $(".sound").hide();
            $(".accessory").hide();

            if (productType != 'Không') $("." + productType).show();
        }

        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>