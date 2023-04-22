<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    if (!empty($_POST["productName"])) {
        $productName = $_POST["productName"];
    } else {
        $message = 'Giá trị tên sản phẩm để trống';

        echo "<SCRIPT> 
                window.location.replace('addProduct.php');
                alert('$message')
            </SCRIPT>";
        exit();
    }

    if (!empty($_POST["price"])) {
        $price = $_POST["price"];
    } else {
        $message = 'Giá trị giá tiền để trống';

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
        $description = "Trống";
    }
} else {
    header("location: viewProductList.php");
}
?>

<?php
include("connectDB.php");
$name_query = "UPDATE product SET productName = '{$productName}', releaseDate = '{$releaseDate}', quantity = {$quantity}, price = {$price}, description = '{$description}' WHERE id = '{$id}';";

if ($stmt = mysqli_prepare($db_connect, $name_query)) {
    try {
        if (mysqli_stmt_execute($stmt)) {
            $message = 'Cập nhật sản phẩm thành công';

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
        $message = 'Không thể cập nhật thông tin sản phẩm';

        echo "<SCRIPT>
                window.location.replace('viewProductList.php');
                alert('$message')
            </SCRIPT>";
        mysqli_stmt_close($stmt);
        exit();
    }
}
?>
