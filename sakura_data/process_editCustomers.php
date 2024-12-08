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

    $name = $_POST['custName'];
    $Customer_ID = $_POST['Customer_ID'];
    $contactNumber = $_POST['contactNumber'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $locIdentifier = $_POST['locIdentifier'];

    $sql = "UPDATE customer SET custname = '$name', ContactNumber = '$contactNumber', cust_address = '$address', City = '$city', email = '$email', locationidentifier = '$locIdentifier' where Customer_ID = '$Customer_ID'";

    $query_run = mysqli_query($conn, $sql);

    if($query_run){
        header('Location: admin_viewCustomers.php');
        exit(0);
    }
}


?>

