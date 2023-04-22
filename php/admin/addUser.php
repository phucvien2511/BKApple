<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["customerusername"])) {
        $customerusername = $_POST["customerusername"];
    } else {
        $message = 'Tên tài khoản không được để trống';

        echo "<SCRIPT> 
                window.location.replace('addUser.php');
                alert('$message')
            </SCRIPT>";
        exit();
    }

    if (!empty($_POST["customerpassword"])) {
        $customerpassword = $_POST["customerpassword"];
    } else {
        $message = 'Mật khẩu không được để trống';

        echo "<SCRIPT> 
                window.location.replace('addUser.php');
                alert('$message')
            </SCRIPT>";
        exit();
    }

    if (!empty($_POST["name"])) {
        $name = $_POST["name"];
    } else {
        $message = 'Tên người dùng không được để trống';

        echo "<SCRIPT> 
                window.location.replace('addUser.php');
                alert('$message')
            </SCRIPT>";
        exit();
    }

    if (!empty($_POST["birthday"])) {
        $birthday = $_POST["birthday"];
    } else {
        $birthday = "2023-01-01";
    }

    if (!empty($_POST["phone"])) {
        $phone = $_POST["phone"];
    } else {
        $phone = "";
    }

    if (!empty($_POST["mail"])) {
        $mail = $_POST["mail"];
    } else {
        $mail = "";
    }

    if (!empty($_POST["address"])) {
        $address = $_POST["address"];
    } else {
        $address = "";
    }
} else {
    header("location: viewUserList.php");
}
?>

<?php
include("connectDB.php");
$name_query = "INSERT INTO user (username, password, name, birthday, phone, mail, address) VALUES ('{$customerusername}', '{$customerpassword}', '{$name}' ,'{$birthday}' ,'{$phone}', '{$mail}', '{$address}');";

if ($stmt = mysqli_prepare($db_connect, $name_query)) {
    try {
        if (mysqli_stmt_execute($stmt)) {
            $message = 'Thêm khách hàng thành công';

            echo "<SCRIPT>
                    window.location.replace('viewUserList.php');
                    alert('$message')
                </SCRIPT>";

            mysqli_stmt_close($stmt);
            exit();
        } else {
            header("location: viewUserList.php");
            mysqli_stmt_close($stmt);
            exit();
        }
    } catch (Exception $e) {
        $message = 'Không thể thêm khách hàng';

        echo "<SCRIPT> 
                window.location.replace('addUser.php');
                alert('$message')
            </SCRIPT>";
        exit();
    }
}
?>
