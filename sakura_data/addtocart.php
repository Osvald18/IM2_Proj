<?php
include 'header.php'; 


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_to_cart'])) {
  
        $product_ID = filter_var($_POST['product_ID'], FILTER_SANITIZE_NUMBER_INT);
        $prodName = filter_var($_POST['prodName'], FILTER_SANITIZE_STRING);
        $prodPrice = filter_var($_POST['prodPrice'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $prodPrice = floatval($prodPrice);
        $quantity = isset($_POST['quantity']) ? max(1, intval($_POST['quantity'])) : 1;

        // Initialize or retrieve cart session
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Add item to cart
        if (!isset($_SESSION['cart'][$product_ID])) {
            $_SESSION['cart'][$product_ID] = [
                'prodName' => $prodName,
                'prodPrice' => $prodPrice,
                'quantity' => $quantity
            ];
        } else {
            $_SESSION['cart'][$product_ID]['quantity'] += $quantity;
        }
    }

    if (isset($_POST['update_quantity'])) {
        $product_ID = filter_var($_POST['product_ID'], FILTER_SANITIZE_NUMBER_INT);
        $new_quantity = max(1, intval($_POST['quantity']));
        if (isset($_SESSION['cart'][$product_ID])) {
            $_SESSION['cart'][$product_ID]['quantity'] = $new_quantity;
        }
    }

    if (isset($_POST['remove_from_cart'])) {
        // Remove item from cart
        $product_ID = filter_var($_POST['product_ID'], FILTER_SANITIZE_NUMBER_INT);
        if (isset($_SESSION['cart'][$product_ID])) {
            unset($_SESSION['cart'][$product_ID]);
        }
    }
}

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$subtotal = array_sum(array_map(function($item) {
    return floatval($item['prodPrice']) * $item['quantity'];
}, $cart));
$delivery_fee = 50; 
$total = $subtotal + $delivery_fee;
?>

<main>
<div class="mt-0">
        <div class="p-5 text-center bg-body-tertiary position-relative overflow-hidden">
            <img src="IMAGES/SERVICEPAGEBANNER.png" class="w-100 position-absolute top-0 start-0 h-100" alt="Full-width background image" style="object-fit: cover; z-index: -1;">
        </div>
    </div>


    <div class="container my-5">
        <div class="row justify-content-start">
            <div class="col-md-4">
                <!-- Order Summary -->
                <div class="card no-hover-card">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #c07d9c; font-weight: bold;">Order Summary</h5>
                        <span class="text-muted">Subtotal: ₱<?php echo number_format($subtotal, 2); ?></span> 
                        <br><span class="text-muted">Delivery Fee: ₱<?php echo number_format($delivery_fee, 2); ?></span> 
                        <hr style="border-color: #c07d9c; margin-top: 10px; margin-bottom: 10px;">
                        <h5 class="card-title" style="color: #c07d9c; font-weight: bold;">Total Amount: ₱<?php echo number_format($total, 2); ?></h5>
                        <form method="post" action="process_order.php">
    <input type="hidden" name="total_amount" value="<?php echo $total; ?>">
    <button class="btn btn-custom btn-md" type="submit" name="confirm_order" style="background-color: #9dbab3; color: white; font-weight: bold;width: 100%;" >
        <i class="fas fa-check-circle"></i> Confirm Order
    </button>
</form>          </div>
                </div>
            </div>

            <div class="col-md-8">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <span style="color: #c07d9c; font-weight: bold;">Items in Cart: </span>
            <span class="text-muted"><?php echo count($cart); ?></span>
        </div>
    </div>

    <hr style="border-color: #c07d9c; margin-top: 10px; margin-bottom: 10px;">

    <ul class="list-group">
        <?php foreach($cart as $product_ID => $item): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title"><?php echo htmlspecialchars($item['prodName']); ?></h5>
                    <p class="card-text">Price: ₱<?php echo number_format(floatval($item['prodPrice']), 2); ?></p>
                    <form method="post" action="addtocart.php" class="d-inline">
                        <input type="hidden" name="product_ID" value="<?php echo htmlspecialchars($product_ID); ?>">
                        <input type="number" name="quantity" value="<?php echo intval($item['quantity']); ?>" min="1" class="form-control d-inline-block" style="width: 60px;">
                        <button type="submit" name="update_quantity" class="btn btn-primary btn-md"><b>Update</b></button>
                    </form>
                    <p class="card-text">Total: ₱<?php echo number_format(floatval($item['prodPrice']) * intval($item['quantity']), 2); ?></p>
                </div>
                <form method="post" action="addtocart.php" style="margin: 0;">
                    <input type="hidden" name="product_ID" value="<?php echo htmlspecialchars($product_ID); ?>">
                    <button type="submit" name="remove_from_cart" class="btn btn-danger btn-sm"><b>Remove</b></button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
        </div>
    </div>

    

<?php include 'footer.php'; ?>

               