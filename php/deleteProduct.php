<?php
    $product_id = '';
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        if (empty($_GET)) {
            $product_id = '1';
        } else {
            $product_id = trim($_GET["product_id"]);
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
        $name_query = "DELETE FROM product WHERE ID = '$product_id';";
    
        if($stmt = mysqli_prepare($db_connect, $name_query)){    
            if (mysqli_stmt_execute($stmt)) {
                $message = 'Xóa sản phẩm thành công';

                echo "<SCRIPT> 
                    window.location.replace('./productManager.php');
                    alert('$message')
                </SCRIPT>";
                exit();
            } else {
                header("location: ./productManager.php");
                exit();
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($dbhandle);
?>