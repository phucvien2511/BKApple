<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerusername = $_POST["customerusername"];

    if (!empty($_POST["customerpassword"])) {
        $customerpassword = $_POST["customerpassword"];
    } else {
        $message = 'Mật khẩu để trống';

        echo "<script> 
                window.location.replace('./addUser.php');
                alert('$message')
            </script>";
        exit();
    }

    if (!empty($_POST["name"])) {
        $name = $_POST["name"];
    } else {
        $message = 'Tên người dùng để trống';

        echo "<script> 
                window.location.replace('./addUser.php');
                alert('$message')
            </script>";
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
include("./connectDB.php");
$name_query = "UPDATE user SET password = '{$customerpassword}', name = '{$name}', birthday = '{$birthday}', phone = '{$phone}', mail = '{$mail}', address = '{$address}' WHERE username = '{$customerusername}';";

if ($stmt = mysqli_prepare($db_connect, $name_query)) {
    try {
        if (mysqli_stmt_execute($stmt)) {
            $message = 'Cập nhật thông tin khách hàng thành công';

            echo "<script>
                    window.location.replace('viewUserList.php');
                    alert('$message')
                </script>";

            mysqli_stmt_close($stmt);
            exit();
        } else {
            header("location: viewUserList.php");
            mysqli_stmt_close($stmt);
            exit();
        }
    } catch (Exception $e) {
        $message = 'Không thể cập nhật thông tin khách hàng';

        echo "<script>
                window.location.replace('viewUserList.php');
                alert('$message')
            </script>";
        mysqli_stmt_close($stmt);
        exit();
    }
}
?>
