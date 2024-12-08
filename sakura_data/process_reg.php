<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["Password"] !== $_POST["ConfirmPassword"]) {
        $_SESSION['status'] = 'password_mismatch';
        header("Location: homepage.php");
        exit();
    } else {
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

        $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
        $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
        $Password = mysqli_real_escape_string($conn, $_POST["Password"]);
        $ContactNumber = mysqli_real_escape_string($conn, $_POST["ContactNumber"]);
        $Address = mysqli_real_escape_string($conn, $_POST["Address"]);
        $City = mysqli_real_escape_string($conn, $_POST["City"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $locationidentifier = mysqli_real_escape_string($conn, $_POST["locationidentifier"]);
        $name = $fname . ' ' . $lname;

        // Store data in session variables
        $_SESSION['lname'] = $_POST['lname']; 
        $_SESSION['fname'] = $_POST['fname']; 
        $_SESSION['ContactNumber'] = $_POST['ContactNumber'];  
        $_SESSION['Address'] = $_POST['Address'];
        $_SESSION['City'] = $_POST['City'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['locationidentifier'] = $_POST['locationidentifier'];

        $sql = "INSERT INTO customer (custname, ContactNumber, cust_address, City, email, locationidentifier, custPassword)
                VALUES ('$name', '$ContactNumber', '$Address', '$City', '$email', '$locationidentifier', '$Password')";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['status'] = 'registration_success';
        } else {
            $_SESSION['status'] = 'registration_failed';
        }

        mysqli_close($conn);
        header("Location: homepage.php");
        exit();
    }
}
?>
