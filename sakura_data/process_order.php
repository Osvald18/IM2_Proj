<?php
session_start();
include 'db_connection.php'; 

if(isset($_POST['confirm_order'])) {
    $total_amount = filter_var($_POST['total_amount'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    // Check if user is logged in
    if(!isset($_SESSION['Customer_ID'])) {
        // Redirect to login page or show error
        header("Location: homepage.php");
        exit();
    }

    // Check if cart is empty
    if(empty($cart)) {
        echo "Your cart is empty. Please add items before placing an order.";
        exit();
    }

    $customer_ID = $_SESSION['Customer_ID'];
    $order_date = date('Y-m-d');

    // Start transaction
    $conn->begin_transaction();

    try {
        // Insert into order table
        $sql = "INSERT INTO `orders` (fkcustomer_ID, order_date, total_amount) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isd", $customer_ID, $order_date, $total_amount);
        
        if (!$stmt->execute()) {
            throw new Exception("Error inserting order: " . $stmt->error);
        }
        
        $order_ID = $stmt->insert_id;

        // Insert order items
        $sql_items = "INSERT INTO order_items (order_ID, product_ID, quantity, price) VALUES (?, ?, ?, ?)";
        $stmt_items = $conn->prepare($sql_items);

        foreach($cart as $item) {
            $product_ID = $item['product_ID'];
            $quantity = $item['quantity'];
            $price = $item['prodPrice'];
            $stmt_items->bind_param("iiid", $order_ID, $product_ID, $quantity, $price);
            
            if (!$stmt_items->execute()) {
                throw new Exception("Error inserting order item: " . $stmt_items->error);
            }
        }

        // Commit transaction
        $conn->commit();

        // Clear the cart
        unset($_SESSION['cart']);

        echo "Order placed successfully!";
        // Redirect to a thank you page or order confirmation page
        header("Location: addtocart.php" );
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        echo "Error placing order: " . $e->getMessage();
    }

    $stmt->close();
    $stmt_items->close();
    $conn->close();
} else {
    echo "Invalid request";
}
?>