<?php
    $user_id = '1';
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        if (empty($_GET)) {
            $user_id = '1';
        } else {
            $user_id = trim($_GET["user_id"]);
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


    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $name_query = "DELETE FROM customer WHERE ID = '$user_id';";
    
        if($stmt = mysqli_prepare($db_connect, $name_query)){    
            if (mysqli_stmt_execute($stmt)) {
                $message = 'Xóa khách hảng thành công';

                echo "<SCRIPT> 
                    window.location.replace('./userManager.php');
                    alert('$message')
                </SCRIPT>";
                exit();
            } else {
                header("location: ./userManager.php");
                exit();
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($dbhandle);
?>