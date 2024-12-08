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

$Customer_ID = mysqli_real_escape_string($conn, $_POST["Customer_ID"]);
$sql = "DELETE FROM customer WHERE Customer_ID = '$Customer_ID'";

if (mysqli_query($conn, $sql)) {
error_reporting(0);
ini_set('display_errors', 0);
header('Location: admin_viewCustomers.php');
exit(0);
}

else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

}

?>