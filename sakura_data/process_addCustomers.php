<?php

if(empty($_POST ["custName"]) || empty($_POST ["contactNumber"]) || empty($_POST ["address"]) || empty($_POST ["email"]) || empty($_POST ["locIdentifier"]) || empty($_POST ["password"]))
{ 
	echo"<h3>";
	echo "Please Fill all the required field"; 
	echo"</h3>";

}  else{
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

$custName = mysqli_real_escape_string($conn, $_POST ["custName"]);
$Password = mysqli_real_escape_string($conn, $_POST ["password"]);
$contactNumber = mysqli_real_escape_string($conn, $_POST ["contactNumber"]);
$address = mysqli_real_escape_string($conn, $_POST ["address"]);
$email = mysqli_real_escape_string($conn, $_POST ["email"]);
$locIdentifier = mysqli_real_escape_string($conn, $_POST ["locIdentifier"]);
	
// store data in session variable through user
 
$_SESSION['custName']= $_POST['custName']; 
$_SESSION['contactNumber']= $_POST['contactNumber']; 
$_SESSION['address']= $_POST['address']; 
$_SESSION['email']= $_POST['email'];  
$_SESSION['locIdentifier']= $_POST['locIdentifier'];

	


$sql = "INSERT INTO customer (custname, contactNumber, cust_address, email, locationidentifier,custPassword)
VALUES ('$custName','$contactNumber', '$address', '$email', '$locIdentifier', '$Password')";

if (mysqli_query($conn, $sql)) {
error_reporting(0);
ini_set('display_errors', 0);
header("location: admin_viewCustomers.php");
}

else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>
