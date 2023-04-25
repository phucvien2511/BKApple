<?php
$offset = 10;
$page = 1;
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
if (isset($_POST["page"])) {
    $page = intval($_POST["page"]);
}
$name_query = "SELECT * FROM user WHERE role = 'user'";
$result = mysqli_query($db_connect, $name_query);

$number_of_product = mysqli_num_rows($result);
if ($number_of_product == 0) {
    echo "<tr>";
    echo "<td colspan='7'>Không có khách hàng nào!</td>";
    echo "</tr>";
    return;
}

for ($index = 0; $index < $offset * ($page - 1); $index++) {
    $rows = mysqli_fetch_assoc($result);
}

for ($index = 0; $index < $offset; $index++) {
    $rows = mysqli_fetch_assoc($result);
    if (!$rows) return;

    echo "<tr>";
    echo '<th scope="row">' . ($index + 1 + ($page - 1) * 10) . '</th>';
    echo "<th scope='row'>{$rows['username']}</th>";
    echo "<td>{$rows['name']}</td>";
    echo "<td>{$rows['phone']}</td>";
    echo "<td>{$rows['mail']}</td>";
    echo "<td>{$rows['address']}</td>";
    echo "<td>";
    echo "<a href='viewUserDetail.php?user_id={$rows['id']}' class='btn btn-dark btn-sm'><span class='material-symbols-outlined'>info</span></a>";
    echo "<a href='editUserUI.php?user_id={$rows['id']}' class='btn btn-dark btn-sm'><span class='material-symbols-outlined'>edit</span></a>";

    echo "<button type='button' class='btn btn-dark btn-sm' data-bs-toggle='modal' data-bs-target='#delete{$rows['id']}'>";
    echo "<span class='material-symbols-outlined'>delete</span>";
    echo "</button>";

    echo "<div class='modal fade' id='delete{$rows['id']}' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='delete{$rows['id']}Label' aria-hidden='true'>";
    echo "<div class='modal-dialog' style='color: white'>";
    echo "<div class='modal-content' style='background-color: #2c2c2c'>";
    echo "<div class='modal-header'>";
    echo "<h5 class='modal-title' id='delete{$rows['id']}Label'>Xóa khách hàng </h5>";
    echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
    echo "</div>";
    echo "<div class='modal-body'>";
    echo "Bạn muốn xóa khách hàng {$rows['name']} khỏi danh sách? Lịch sử mua hàng và bình luận cũng sẽ bị xóa theo.";
    echo "</div>";
    echo "<div class='modal-footer'>";
    echo "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Hủy</button>";
    echo "<a href='deleteUser.php?user_id={$rows['id']}' class='btn btn-primary'>Xác nhận</a>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</td>";
    echo "</tr>";
}
mysqli_close($db_connect);
?>