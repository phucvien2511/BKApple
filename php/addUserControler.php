<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["customerusername"])) {
            $customerusername = $_POST["customerusername"];
        } else {
            $message = 'Tên tài khoản để trống';

            echo "<SCRIPT> 
                window.location.replace('./addUser.php');
                alert('$message')
            </SCRIPT>";
            exit();
        }

        if (!empty($_POST["customerpassword"])) {
            $customerpassword = $_POST["customerpassword"];
        } else {
            $message = 'Mật khẩu để trống';

            echo "<SCRIPT> 
                window.location.replace('./addUser.php');
                alert('$message')
            </SCRIPT>";
            exit();
        }

        if (!empty($_POST["name"])) {
            $name = $_POST["name"];
        } else {
            $message = 'Tên người dùng để trống';

            echo "<SCRIPT> 
                window.location.replace('./addUser.php');
                alert('$message')
            </SCRIPT>";
            exit();
        }

        if (!empty($_POST["birthDay"])) {
            $birthDay = $_POST["birthDay"];
        } else {
            $birthDay = "2023-01-01";
        }

        if (!empty($_POST["phone"])) {
            $phone = $_POST["phone"];
        } else {
            $phone = "";
        }

        if (!empty($_POST["email"])) {
            $email = $_POST["email"];
        } else {
            $email = "";
        }

        if (!empty($_POST["address"])) {
            $address = $_POST["address"];
        } else {
            $address = "";
        }
    } else {
        header("location: ./userManager.php");
    }
?>

<?php
    include("./connectDB.php");
    $name_query = "INSERT INTO customer(username, password, name, birthDay, phone, gmail, address) VALUES ('{$customerusername}', '{$customerpassword}', '{$name}' ,'{$birthDay}' ,'{$phone}', '{$email}', '{$address}');";    

    if($stmt = mysqli_prepare($db_connect, $name_query)){    
        try {
            if (mysqli_stmt_execute($stmt)) {
                $message = 'Thêm khách hàng thành công';

                echo "<SCRIPT>
                    window.location.replace('./userManager.php');
                    alert('$message')
                </SCRIPT>";

                mysqli_stmt_close($stmt);
                exit();
            } else {
                header("location: ./userManager.php");
                mysqli_stmt_close($stmt);
                exit();
            }
        } catch (Exception $e) {
            $message = 'Không thể thêm khách hàng';

            echo "<SCRIPT> 
                window.location.replace('./addUser.php');
                alert('$message')
            </SCRIPT>";
            exit();
        }
    }
?>
