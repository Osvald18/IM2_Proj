<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>
    
       
  <header class="p-3 mb-3 border-bottom" style="text-align: left;">
    <div class="container">
        <div class="d-flex align-items-center">
            <img src="IMAGES/SAKURA.png" alt="Brand Image" style="width: 300px; height: auto; margin-right: 10px; display: inline-block;">
        </div>
    </div>
</header>



<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar border-end">
            <div class="position-sticky">
                <ul class="nav flex-column">
                    
                <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="ordersDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-file-alt"></i>
                                Orders
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="ordersDropdown">
                                <li><a class="dropdown-item" href="admin_viewordersactual.php">Shop Orders</a></li>
                                <li><a class="dropdown-item" href="admin_vieworders.php">Shop Orders (items)</a></li>
                                <li><a class="dropdown-item" href="admin_viewServices.php">Service Orders</a></li>
                              
                            </ul>
                        </li>
                    <li class="nav-item">
                    <a class="nav-link" href="admin_viewProducts.php">
                            <i class="fas fa-shopping-cart"></i>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_viewCustomers.php">
                            <i class="fas fa-users"></i>
                            Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_viewInventory.php">
                            <i class="fas fa-chart-line"></i>
                            Inventory
                        </a>
                    </li>
                 
                </ul>
                <hr>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-cog"></i>
                            Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-sign-out-alt"></i>
                            Sign out
                        </a>
                    </li>
                </ul>
            </div>
        </nav>