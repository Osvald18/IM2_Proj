<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sakurashop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    // Validate and sanitize input data
    $prodName = mysqli_real_escape_string($conn, $_POST["prodName"]);
    $prodDesc = mysqli_real_escape_string($conn, $_POST["prodDesc"]);
    $category = mysqli_real_escape_string($conn, $_POST["category"]);
    $prodPrice = mysqli_real_escape_string($conn, $_POST["prodPrice"]);
    $imagePath = mysqli_real_escape_string($conn, $_POST["image"]);

    // Prepare statement for inserting product details
    $stmt = $conn->prepare("INSERT INTO product(prodName, prodDesc,fkcat_name, prodPrice, prodImage) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $prodName, $prodDesc, $category, $prodPrice, $imagePath);

    // Execute the prepared statement
    if ($stmt->execute()) {
        header('landing:admin_viewProducts.php');
    } else {
        echo "<script>alert('Error adding product!');</script>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Display form if not submitted
    // HTML form goes here
}
?>

