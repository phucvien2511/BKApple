<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["id"])) {
        $id = $_POST["id"];
    } else {
        $message = 'Giá trị Id không được để trống';

        echo "<SCRIPT> 
                window.location.replace('addProduct.php');
                alert('$message')
            </SCRIPT>";
        exit();
    }

    if (!empty($_POST["productName"])) {
        $productName = $_POST["productName"];
    } else {
        $message = 'Giá trị tên sản phẩm không được để trống';

        echo "<SCRIPT> 
                window.location.replace('addProduct.php');
                alert('$message')
            </SCRIPT>";
        exit();
    }

    if (!empty($_POST["price"])) {
        $price = $_POST["price"];
    } else {
        $message = 'Giá trị giá tiền không được để trống';

        echo "<SCRIPT> 
                window.location.replace('addProduct.php');
                alert('$message')
            </SCRIPT>";
        exit();
    }

    if (!empty($_POST["releaseDate"])) {
        $releaseDate = $_POST["releaseDate"];
    } else {
        $releaseDate = "2023-01-01";
    }

    if (!empty($_POST["quantity"])) {
        $quantity = $_POST["quantity"];
    } else {
        $quantity = 0;
    }

    if (!empty($_POST["description"])) {
        $description = $_POST["description"];
    } else {
        $description = "Không có mô tả";
    }

    $productColorNumber = $_POST["productColorNumber"];

    $defaultColor = $_POST["defaultColor"];
    $colorNumber = $_POST["productColorNumber"];
    if ($colorNumber == 1) {
        $colorInfo = $_POST["defaultColor"];
    } else if ($colorNumber == 2) {
        $colorInfo = $_POST["defaultColor"] . "," . $_POST["subColor1"];
    } else if ($colorNumber == 3) {
        $colorInfo = $_POST["defaultColor"] . "," . $_POST["subColor1"] . "," . $_POST["subColor2"];
    }

    $productType = $_POST["productType"];

    if ($productType == "iphone") {
        $classify = $_POST["classifyIPhone"];
        $versionIPhone = $_POST["versionIPhone"];
        $capacityIPhone = $_POST["capacityIPhone"];
    } else if ($productType == "ipad") {
        $classify = $_POST["classifyIPad"];
        $capacityIPad = $_POST["capacityIPad"];
    } else if ($productType == "mac") {
        $classify = $_POST["classifyMac"];
        $capacityMac = $_POST["capacityMac"];
    } else if ($productType == "watch") {
        $classify = $_POST["classifyWatch"];
        $diameter = $_POST["diameter"];
    } else if ($productType == "sound") {
        $classify = $_POST["classifySound"];
    } else if ($productType == "accessory") {
        $classify = $_POST["classifyAccessory"];
    }

    $defaultColorPath = "";
    $thumbnail_path = "";

    if ($productType == "iphone") {
        $defaultColorPath = "/images/{$productType}/{$classify}/{$id}";
        $thumbnail_path = "/images/{$productType}/{$classify}/";
    } else if ($productType == "ipad") {
        $defaultColorPath = "/images/{$productType}/{$classify}/{$id}";
        $thumbnail_path = "/images/{$productType}/{$classify}/";
    } else if ($productType == "mac") {
        $defaultColorPath = "/images/{$productType}/{$id}";
        $thumbnail_path = "/images/{$productType}/";
    } else if ($productType == "watch") {
        $defaultColorPath = "/images/{$productType}/{$id}";
        $thumbnail_path = "/images/{$productType}/";
    } else if ($productType == "sound") {
        $defaultColorPath = "/images/{$productType}/{$classify}/{$id}";
        $thumbnail_path = "/images/{$productType}/{$classify}/";
    } else if ($productType == "accessory") {
        $defaultColorPath = "/images/{$productType}/{$classify}/{$id}";
        $thumbnail_path = "/images/{$productType}/{$classify}/";
    }
} else {
    header("location: viewProductList.php");
}
?>


<?php
if (!isset($_FILES['defaultColorthumbnail'])) {
    $message = 'Không tìm thấy ảnh';

    echo "<SCRIPT> 
            window.location.replace('addProduct.php');
            alert('$message')
        </SCRIPT>";
    exit();
}

if ($_FILES['defaultColorthumbnail']['type'] != 'image/png') {
    $message = 'Chỉ hỗ trợ định dạng PNG';

    echo "<SCRIPT> 
            window.location.replace('addProduct.php');
            alert('$message')
        </SCRIPT>";
    exit();
}

if ($_FILES['defaultColorthumbnail']['error']) {
    $message = 'Xảy ra lỗi khi cập nhật hình ảnh';

    echo "<SCRIPT> 
            window.location.replace('addProduct.php');
            alert('$message')
        </SCRIPT>";
    exit();
}

move_uploaded_file($_FILES['defaultColorthumbnail']['tmp_name'], "..$thumbnail_path" . $_FILES['defaultColorthumbnail']['name']);

if (isset($_FILES['defaultColorpicture'])) {
    $countfiles = count($_FILES['defaultColorpicture']['name']);

    for ($i = 0; $i < $countfiles; $i++) {
        if ($_FILES['defaultColorpicture']['type'][$i] != 'image/png') {
            $message = 'Chỉ hỗ trợ định dạng PNG';

            echo "<SCRIPT> 
                    window.location.replace('addProduct.php');
                    alert('$message')
                </SCRIPT>";
            exit();
        }

        if ($_FILES['defaultColorpicture']['error'][$i]) {
            $message = 'Xảy ra lỗi khi cập nhật hình ảnh';

            echo "<SCRIPT> 
                    window.location.replace('addProduct.php');
                    alert('$message')
                </SCRIPT>";
            exit();
        }

        move_uploaded_file($_FILES['defaultColorpicture']['tmp_name'][$i], "$thumbnail_path" . $_FILES['defaultColorpicture']['name'][$i]);
    }
}

if ($colorNumber > 1) {
    if (!isset($_FILES['subColor1thumbnail'])) {
        $message = 'Không tìm thấy ảnh';

        echo "<SCRIPT> 
                window.location.replace('addProduct.php');
                alert('$message')
            </SCRIPT>";
        exit();
    }

    if ($_FILES['subColor1thumbnail']['type'] != 'image/png') {
        $message = 'Chỉ hỗ trợ định dạng PNG';

        echo "<SCRIPT> 
                window.location.replace('addProduct.php');
                alert('$message')
            </SCRIPT>";
        exit();
    }

    move_uploaded_file($_FILES['subColor1thumbnail']['tmp_name'], "$thumbnail_path" . $_FILES['subColor1thumbnail']['name']);

    if (isset($_FILES['subColor1picture'])) {
        $countfiles = count($_FILES['subColor1picture']['name']);

        for ($i = 0; $i < $countfiles; $i++) {
            if ($_FILES['subColor1picture']['type'][$i] != 'image/png') {
                $message = 'Chỉ hỗ trợ định dạng PNG. Vui lòng thêm ảnh PNG vào. Không cho phép không được để trống';

                echo "<SCRIPT> 
                        window.location.replace('addProduct.php');
                        alert('$message')
                    </SCRIPT>";
                exit();
            }

            if ($_FILES['subColor1picture']['error'][$i]) {
                $message = 'Xảy ra lỗi khi cập nhật hình ảnh';

                echo "<SCRIPT> 
                        window.location.replace('addProduct.php');
                        alert('$message')
                    </SCRIPT>";
                exit();
            }

            move_uploaded_file($_FILES['subColor1picture']['tmp_name'][$i], "$thumbnail_path" . $_FILES['subColor1picture']['name'][$i]);
        }
    }
}

if ($colorNumber > 2) {
    if (!isset($_FILES['subColor2thumbnail'])) {
        $message = 'Không tìm tháy ảnh';

        echo "<SCRIPT> 
                window.location.replace('addProduct.php');
                alert('$message')
            </SCRIPT>";
        exit();
    }

    if ($_FILES['subColor2thumbnail']['type'] != 'image/png') {
        $message = 'Chỉ hỗ trợ định dạng PNG';

        echo "<SCRIPT> 
                window.location.replace('addProduct.php');
                alert('$message')
            </SCRIPT>";
        exit();
    }

    move_uploaded_file($_FILES['subColor2thumbnail']['tmp_name'], "$thumbnail_path" . $_FILES['subColor2thumbnail']['name']);

    if (isset($_FILES['subColor2picture'])) {
        $countfiles = count($_FILES['subColor2picture']['name']);

        for ($i = 0; $i < $countfiles; $i++) {
            if ($_FILES['subColor2picture']['type'][$i] != 'image/png') {
                $message = 'Chỉ hỗ trợ định dạng PNG. Vui lòng thêm ảnh PNG vào. Không cho phép không được để trống';

                echo "<SCRIPT> 
                        window.location.replace('addProduct.php');
                        alert('$message')
                    </SCRIPT>";
                exit();
            }

            if ($_FILES['subColor2picture']['error'][$i]) {
                $message = 'Xảy ra lỗi khi cập nhật hình ảnh';

                echo "<SCRIPT> 
                        window.location.replace('addProduct.php');
                        alert('$message')
                    </SCRIPT>";
                exit();
            }

            move_uploaded_file($_FILES['subColor2picture']['tmp_name'][$i], "$thumbnail_path" . $_FILES['subColor2picture']['name'][$i]);
        }
    }
}
?>


<?php
include("connectDB.php");
$name_query = "INSERT INTO product(id, productName, releaseDate, quantity, price, description, color, thumbnail) VALUES ('{$id}', '{$productName}', '{$releaseDate}', {$quantity} ,{$price} ,'{$description}', '{$colorInfo}', '{$defaultColorPath}');\n";
$name_query_sub = "";
if ($productType == "iphone") {
    $name_query_sub = "INSERT INTO iphone(id, classify, version, capacity) VALUES ('{$id}', '{$classify}', '{$versionIPhone}', '{$capacityIPhone}');";
} else if ($productType == "ipad") {
    $name_query_sub =  "INSERT INTO ipad VALUES ('{$id}', '{$classify}', '{$capacityIPad}');";
} else if ($productType == "mac") {
    $name_query_sub =  "INSERT INTO mac VALUES ('{$id}', '{$classify}', '{$capacityMac}');";
} else if ($productType == "watch") {
    $name_query_sub =  "INSERT INTO watch VALUES ('{$id}', '{$classify}', '{$diameter}');";
} else if ($productType == "sound") {
    $name_query_sub =  "INSERT INTO sound VALUES ('{$id}', '{$classify}');";
} else if ($productType == "accessory") {
    $name_query_sub =  "INSERT INTO accessory VALUES ('{$id}', '{$classify}');";
}

if ($stmt = mysqli_prepare($db_connect, $name_query)) {
    try {
        if (mysqli_stmt_execute($stmt)) {
        } else {
            header("location: viewProductList.php");
            mysqli_stmt_close($stmt);
            exit();
        }
    } catch (Exception $e) {
        $message = 'Giá trị ID đã tồn tại';

        echo "<SCRIPT> //not showing me this
                window.location.replace('addProduct.php');
                alert('$message')
            </SCRIPT>";
        exit();
    }
}

if ($stmt = mysqli_prepare($db_connect, $name_query_sub)) {
    try {
        if (mysqli_stmt_execute($stmt)) {
            $message = 'Thêm sản phẩm thành công';

            echo "<SCRIPT>
                    window.location.replace('viewProductList.php');
                    alert('$message')
                </SCRIPT>";

            mysqli_stmt_close($stmt);
            exit();
        } else {
            header("location: viewProductList.php");
            mysqli_stmt_close($stmt);
            exit();
        }
    } catch (Exception $e) {
        $message = 'Giá trị ID đã tồn tại trong bảng phụ';

        echo "<SCRIPT> //not showing me this
                window.location.replace('addProduct.php');
                alert('$message')
            </SCRIPT>";
        exit();
    }
}
?>
