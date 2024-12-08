<?php
session_start();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'sakurashop');
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($db, $_POST['Custemail']);
    $password = mysqli_real_escape_string($db, $_POST['Custpassword']); 

    if ($email === "admin@gmail.com" && $password === "admin") {

        header('Location: admin_viewCustomers.php');
        exit();

    }


    // Select user data from the database
    $sql = "SELECT * FROM customer WHERE email = '$email' AND custPassword = '$password'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    $count = mysqli_num_rows($result);
    

    if ($count == 1) {
        $_SESSION['Customer_ID'] = $row['Customer_ID']; 
        $_SESSION['Custemail'] = $email;
        $_SESSION['custname'] = $row['custname']; 
        $_SESSION['ContactNumber'] = $row['ContactNumber']; 
        $_SESSION['Address'] = $row['cust_address']; 
        $_SESSION['City'] = $row['City']; 
        $_SESSION['locationidentifier'] = $row['locationidentifier']; 

        header("Location: homepage.php");
        exit();
    } else {
        echo "<h3>Incorrect Username or Password. Please try again.</h3>";
    }
}
?>
