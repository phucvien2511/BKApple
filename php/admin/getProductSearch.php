<?php
$offset = 10;
$page = 1;
$productName = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST)) {
        $productName = "";
    } else {
        $productName = trim($_POST["productName"]);
    }
}
?>

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
$name_query = "SELECT * FROM product WHERE productName LIKE '%{$productName}%';";
$result = mysqli_query($db_connect, $name_query);

$number_of_product = mysqli_num_rows($result);
if ($number_of_product == 0) {
    echo "<tr>";
    echo "<td colspan='7'>Không tìm thấy sản phẩm nào.</td>";
    echo "</tr>";
    return;
}

while ($rows = mysqli_fetch_assoc($result)) {
    $price = $rows['price'];
    $formatted_price = $formatted_price = number_format($price, 0, '.', '.') . 'đ';
    echo "<tr>";
    echo "<th scope='row'>{$rows['id']}</th>";
    echo "<td>{$rows['productName']}</td>";
    echo "<td>{$formatted_price}</td>";
    echo "<td>{$rows['quantity']}</td>";
    echo "<td>{$rows['sold']}</td>";
    echo "<td>";
    echo "<a href='viewProductDetail.php?product_id={$rows['id']}' class='btn btn-dark'><span class='material-symbols-outlined'>info</span></a>";
    echo "<a href='editProductUI.php?product_id={$rows['id']}' class='btn btn-dark'><span class='material-symbols-outlined'>edit</span></a>";

    echo "<button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#delete{$rows['id']}'>";
    echo "<span class='material-symbols-outlined'>delete</span>";
    echo "</button>";

    echo "<div class='modal fade' id='delete{$rows['id']}' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='delete{$rows['id']}Label' aria-hidden='true'>";
    echo "<div class='modal-dialog' style='color: white'>";
    echo "<div class='modal-content' style='background-color: #2c2c2c'>";
    echo "<div class='modal-header'>";
    echo "<h5 class='modal-title' id='delete{$rows['id']}Label'>Xóa sản phẩm </h5>";
    echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
    echo "</div>";
    echo "<div class='modal-body'>";
    echo "Bạn muốn xóa mặt hàng {$rows['productName']} khỏi danh sách sản phẩm ?";
    echo "<br>";
    echo "Thao tác xóa không thể hoàn tác.";
    echo "</div>";
    echo "<div class='modal-footer'>";
    echo "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Hủy</button>";
    echo "<a href='./deleteProduct.php?product_id={$rows['id']}' class='btn btn-primary'>Xác nhận</a>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</td>";
    echo "</tr>";
}
mysqli_close($db_connect);
?>