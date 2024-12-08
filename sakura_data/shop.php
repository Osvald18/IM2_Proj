<?php include 'header.php'; ?>

<?php
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

$sql = "SELECT product_ID, prodName, prodDesc, prodPrice, prodImage, fkcat_name, fkcategory_ID FROM product";
$prod = $conn->query($sql);
$productCount = mysqli_num_rows($prod); // Count the number of products

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $productID = intval($_POST['product_ID']);
    $productName = $_POST['prodName'];
    $productPrice = filter_var($_POST['prodPrice'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $productPrice = floatval($productPrice);
    $productImage = $_POST['prodImage'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $productExists = false;

    foreach ($_SESSION['cart'] as &$cartItem) {
        if ($cartItem['product_ID'] == $productID) {
            $cartItem['quantity'] += 1;
            $productExists = true;
            break;
        }
    }

    if (!$productExists) {
        $_SESSION['cart'][] = [
            'product_ID' => $productID,
            'prodName' => $productName,
            'prodPrice' => $productPrice,
            'prodImage' => $productImage,
            'quantity' => 1
        ];
    }
}

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
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="keywordSearch" placeholder="Search keywords...">
                    <button class="btn custom" type="button" style="background-color: #c07d9c; color: white;">
                        <i class="fas fa-search"></i>
                    </button>
                </div>

                <div class="card no-hover-card">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #c07d9c; font-weight: bold;">Category</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="categoryFlowers">
                            <label class="form-check-label" for="categoryFlowers">
                                <i class="fas fa-seedling" style="color: #c07d9c;"></i> Flowers
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="2" id="categoryBouquet">
                            <label class="form-check-label" for="categoryBouquet">
                                <i class="fas fa-asterisk" style="color: #c07d9c;"></i> Bouquet
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="3" id="categoryBasket">
                            <label class="form-check-label" for="categoryBasket">
                                <i class="fas fa-shopping-basket" style="color: #c07d9c;"></i> Basket
                            </label>
                        </div>

                        <div class="my-4">
                            <h5 style="color: #c07d9c; font-weight: bold;">Price Range</h5>
                            <label for="priceRange" style="color: #c07d9c;">₱0 - ₱10,000</label>
                            <input type="range" class="form-range custom-range" id="priceRange" min="0" max="10000" step="100" oninput="updatePriceValue(this.value)">
                            <span id="priceOutput" style="color: #c07d9c; font-weight: bold;">₱0</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <span style="color: #c07d9c; font-weight: bold;">Items found: </span>
                        <span class="text-muted"><?php echo $productCount; ?></span> 
                    </div>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="sortByDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="color: #c07d9c;">
                            <i class="fas fa-filter" style="margin-right: 5px;"></i> Sort By
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="sortByDropdown">
                            <li><a class="dropdown-item" href="#">Price: Low to High</a></li>
                            <li><a class="dropdown-item" href="#">Price: High to Low</a></li>
                            <li><a class="dropdown-item" href="#">Alphabetical: A to Z</a></li>
                            <li><a class="dropdown-item" href="#">Alphabetical: Z to A</a></li>
                        </ul>
                    </div>
                </div>
                
                <hr style="border-color: #c07d9c; margin-top: 10px; margin-bottom: 10px;">

                <div class="row row-cols-1 row-cols-md-3 g-4" id="productList">
                    <?php while ($row = mysqli_fetch_assoc($prod)) { ?>
                        <div class="col product-item" data-price="<?php echo floatval($row["prodPrice"]); ?>" data-category="<?php echo $row["fkcategory_ID"]; ?>">
                            <div class="card h-100 shadow-sm">
                                <img src="IMAGES/FLOWERPICS/<?php echo htmlspecialchars($row["prodImage"]); ?>" class="card-img-top" alt="Product Image">
                                <div class="card-body">
                                    <h6 class="card-title text-left fs-6"><?php echo htmlspecialchars($row["prodName"]); ?></h6>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="text-custom fs-6">₱<?php echo number_format(floatval($row["prodPrice"]), 2); ?></h6>
                                        </div>
                                        <div>
                                            <button class="btn btn-custom btn-sm me-2 view-product-btn" type="button" data-bs-toggle="modal" data-bs-target="#viewProductModal" 
                                                    data-product-id="<?php echo intval($row['product_ID']); ?>" 
                                                    data-name="<?php echo htmlspecialchars($row['prodName']); ?>" 
                                                    data-desc="<?php echo htmlspecialchars($row['prodDesc']); ?>" 
                                                    data-category="<?php echo htmlspecialchars($row['fkcat_name']); ?>" 
                                                    data-price="<?php echo floatval($row['prodPrice']); ?>" 
                                                    data-image="<?php echo htmlspecialchars($row['prodImage']); ?>" 
                                                    style="background-color: #9dbab3; color: white; font-weight: bold;">
                                                <i class="fas fa-eye"></i> View
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center mt-4 rounded-pill">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">&laquo;</a>
                </li>
                <li class="page-item"><a class="page-link text-pink fw-bold" href="#">1</a></li>
                <li class="page-item"><a class="page-link text-pink fw-bold" href="#">2</a></li>
                <li class="page-item"><a class="page-link text-pink fw-bold" href="#">3</a></li>
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">&raquo;</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Product Modal -->
    <div class="modal fade" id="viewProductModal" tabindex="-1" aria-labelledby="viewProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewProductModalLabel">Product Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="" id="viewProductImage" class="img-fluid rounded shadow-sm" alt="Product Image">
                        </div>
                        <div class="col-md-6">
                            <h5 id="modalProductName"></h5>
                            <p id="viewProductDesc"></p>
                            <p id="viewProductCategory"></p>
                            <h6 class="text-muted">Price: ₱<span id="viewProductPrice"></span></h6>
                            <form method="post" action="shop.php">
                                <input type="hidden" name="product_ID" id="productID">
                                <input type="hidden" name="prodName" id="modalProdName">
                                <input type="hidden" name="prodPrice" id="modalProdPrice">
                                <input type="hidden" name="prodImage" id="modalProdImage">
                                <button type="submit" name="add_to_cart" class="btn btn-custom mt-3" style="background-color: #9dbab3; color: white;">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<script>
const viewProductModal = document.getElementById('viewProductModal');
const priceRangeInput = document.getElementById('priceRange');
const priceOutput = document.getElementById('priceOutput');
const productList = document.getElementById('productList');
const totalItemsText = document.querySelector('.text-muted');
const categoryCheckboxes = document.querySelectorAll('.form-check-input');

function updatePriceValue(value) {
    document.getElementById("priceOutput").textContent = "₱" + value;
}

function updateProductCounter() {
    const products = document.querySelectorAll('.product-item');
    let visibleCount = 0;

    products.forEach(product => {
        if (product.style.display !== 'none') {
            visibleCount++;
        }
    });

    totalItemsText.textContent = visibleCount; // Update the counter
}

function filterProducts() {
    const priceLimit = parseFloat(priceRangeInput.value);
    const selectedCategories = Array.from(categoryCheckboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => parseInt(checkbox.value));

    const products = document.querySelectorAll('.product-item');
    products.forEach(product => {
        const productPrice = parseFloat(product.getAttribute('data-price'));
        const productCategory = parseInt(product.getAttribute('data-category'));

        if (productPrice <= priceLimit && (selectedCategories.length === 0 || selectedCategories.includes(productCategory))) {
            product.style.display = 'block';
        } else {
            product.style.display = 'none';
        }
    });

    updateProductCounter(); // Update the product counter
}

priceRangeInput.addEventListener('input', filterProducts);
categoryCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', filterProducts);
});

viewProductModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget; 
    const productId = button.getAttribute('data-product-id');
    const name = button.getAttribute('data-name');
    const desc = button.getAttribute('data-desc');
    const category = button.getAttribute('data-category');
    const price = parseFloat(button.getAttribute('data-price'));
    const image = button.getAttribute('data-image');

    viewProductModal.querySelector('#productID').value = productId;
    viewProductModal.querySelector('#modalProdName').value = name;
    viewProductModal.querySelector('#modalProdPrice').value = price.toFixed(2);
    viewProductModal.querySelector('#modalProdImage').value = image;

    viewProductModal.querySelector('#modalProductName').textContent = name;
    viewProductModal.querySelector('#viewProductDesc').textContent = desc;
    viewProductModal.querySelector('#viewProductCategory').textContent = category;
    viewProductModal.querySelector('#viewProductPrice').textContent = price.toFixed(2);
    viewProductModal.querySelector('#viewProductImage').src = "IMAGES/FLOWERPICS/" + image; 
});

// Initialize price output and product counter
priceOutput.textContent = '₱' + priceRangeInput.value;
updateProductCounter(); // Initial count
</script>

<?php include 'footer.php'; ?>