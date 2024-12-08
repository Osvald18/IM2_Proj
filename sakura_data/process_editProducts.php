<?php

session_start();

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sakurashop";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }


    if(isset($_POST['update_submit'])){

    $name = $_POST['prodName'];
    $product_ID = $_POST['product_ID'];
    $prodDesc = $_POST['prodDesc'];
    $category = $_POST['fkcat_name'];
    $prodPrice = $_POST['prodPrice'];
    $prodImage = $_POST['prodImage'];

    $sql = "UPDATE product SET prodName = '$name', prodDesc = '$prodDesc', fkcat_name = '$category', prodPrice = '$prodPrice', prodImage = '$prodImage' where product_ID = '$product_ID'";

    $query_run = mysqli_query($conn, $sql);

    if($query_run){
        header('Location: admin_viewProducts.php');
        exit(0);
    }

}
        
?>