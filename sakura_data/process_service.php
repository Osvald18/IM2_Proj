<?php
// Database connection
$servername = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$dbname = "your_db_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$occasionType = $_POST['occasionType'];
$location = $_POST['decoratingLocation'];
$eventDate = $_POST['eventDate'];
$message = $_POST['decoratingMessage'];
$serviceType = $_POST['serviceType']; 


if (isset($_SESSION['Customer_ID'])) {
    $customerId = $_SESSION['Customer_ID'];
} else {
    die("Customer ID is not set in session.");
}


// Determine category_id based on serviceType
$category_id = 0;
switch ($serviceType) {
    case 'event_decorating':
        $category_id = 5; 
        break;
    case 'bouquet':
        $category_id = 4; 
        break;
    case 'basket':
        $category_id = 6; 
        break;
    default:
        $category_id = 0; 
        break;
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO service (category_id, payment_method, quantity, location, request_date, message, Customer_IDFK) VALUES (?, 'cash-on-delivery', ?, ?, ?, ?, ?)");
$stmt->bind_param("isssi", $category_id, $location, $eventDate, $message, $customerId);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
