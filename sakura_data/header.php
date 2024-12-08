<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAKURA//HOME</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <link href="headers.css" rel="stylesheet">
    <link href="heroes.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

    
</head>
<body>

    

    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4" style="border-bottom: 1px solid #c07d9c;">
            <div class="col-md-3 mb-2 mb-md-0">
                <img src="IMAGES/SAKURA.png" alt="Brand Image" style="width: 300px; height: auto;">
            </div>
            
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="homepage.php" class="nav-link px-2"><b>HOME</b></a></li>
                <li class="nav-item dropdown" id="dropdownShop">
                    <a class="nav-link " href="shop.php" id="navbarDropdownShop" role="button" aria-haspopup="true" aria-expanded="false">
                        <b>SHOP</b>
                    </a>
                 
                </li>
                <li class="nav-item dropdown" id="dropdownServices">
                    <a class="nav-link dropdown-toggle px-2" href="services.php" id="navbarDropdownServices" role="button" aria-haspopup="true" aria-expanded="false">
                        <b>SERVICES</b>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownServices">
                        <li><a class="dropdown-item" href="services.php#occasionDecoratingModal"><i class="bi bi-calendar-event"></i> Event Decorating</a></li>
                        <li><a class="dropdown-item" href="services.php#bouquetModal"><i class="bi bi-flower1"></i> Bouquet</a></li>
                        <li><a class="dropdown-item" href="services.php#basketModal"><i class="bi bi-basket2"></i> Basket</a></li>
                    </ul>
                    
                </li>
            </ul>

    
            <div class="col-md-3 text-end d-flex align-items-center">
                <div class="input-group me-3">
                    <span class="input-group-text" style="background-color: #c07d9c; border: none;">
                        <i class="bi bi-search" style="color: white;"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="" style="background-color: #ffffff; border: 1px solid #c07d9c;">
                </div>
                <div class="dropdown">
                    <a href="#" class="nav-link d-inline" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-lines-fill fs-4"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
            <?php if(isset($_SESSION['Custemail'])): ?>
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModal"><i class="bi bi-person-circle"></i> Profile</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Settings</a></li>
                <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
            <?php else: ?>
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="bi bi-box-arrow-in-right"></i> Login</a></li>
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#signupModal"><i class="bi bi-person-plus"></i> Sign Up</a></li>
            <?php endif; ?>
        </ul>
                </div>
                <a href="addtocart.php" class="nav-link d-inline ms-3"><i class="bi bi-basket2-fill fs-4"></i></a>
            </div>
        </header>
    </div>
    
 <!-- Profile Modal -->
 <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel" style="color: #c07d9c;"><b><i class="fas fa-user" style="color: #c07d9c;"></i> Profile</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if(isset($_SESSION['Custemail'])): ?>
                    <p><i class="fas fa-envelope" style="color: #c07d9c;"></i> <strong style="color: #c07d9c;">Email:</strong> <span style="color: #c07d9c;"><br><?php echo $_SESSION['Custemail']; ?></span></p>
                    <p><i class="fas fa-user" style="color: #c07d9c;"></i> <strong style="color: #c07d9c;">Name:</strong> <span style="color: #c07d9c;"><br><?php echo $_SESSION['custname']; ?></span></p>
                    <p><i class="fas fa-phone" style="color: #c07d9c;"></i> <strong style="color: #c07d9c;">Contact Number:</strong> <span style="color: #c07d9c;"><br><?php echo $_SESSION['ContactNumber']; ?></span></p>
                    <p><i class="fas fa-map-marker-alt" style="color: #c07d9c;"></i> <strong style="color: #c07d9c;">Address:</strong> <span style="color: #c07d9c;"><br><?php echo $_SESSION['Address']; ?></span></p>
                    <p><i class="fas fa-city" style="color: #c07d9c;"></i> <strong style="color: #c07d9c;">City:</strong> <span style="color: #c07d9c;"><br><?php echo $_SESSION['City']; ?></span></p>
                    <p><i class="fas fa-location-arrow" style="color: #c07d9c;"></i> <strong style="color: #c07d9c;">Location Identifier:</strong> <span style="color: #c07d9c;"><br><?php echo $_SESSION['locationidentifier']; ?></span></p>
                <?php else: ?>
                    <p style="color: #c07d9c;">No profile data available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>




    
  
<!-- MODALS FOR EVERY PAGE (MAYBE UNLESS NAAY WAY NA MU HREF ANG FOOTER THROUGH ANOTHER PAGE)-->  
<div class="modal fade" id="passwordMismatchModal" tabindex="-1" role="dialog" aria-labelledby="passwordMismatchModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="passwordMismatchModalLabel">Password Mismatch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="modal-body">
        <p>The passwords you entered do not match. Please try again.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="loginModalLabel" style="color: #c07d9c; font-weight: bold;"><i class="fas fa-sign-in-alt"></i> Login</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form method = "POST" action="process_login.php">
                  <div class="mb-3">
                      <label for="loginEmail" class="form-label" style="font-weight: bold; color: #c07d9c;"><i class="fas fa-envelope"></i> Email address</label>
                      <input type="email" name = "Custemail" class="form-control" id="loginEmail" required>
                  </div>
                  <div class="mb-3 password-wrapper position-relative">
                      <label for="loginPassword" class="form-label" style="font-weight: bold; color: #c07d9c;"><i class="fas fa-lock"></i> Password</label>
                      <div class="input-group">
                          <input type="password" name = "Custpassword" class="form-control" id="loginPassword" required>
                          <button class="btn custom" type="button" style="background-color: #9dbab3; color: white;" onclick="togglePasswordVisibility('loginPassword')">
                              <i class="fas fa-eye-slash"></i>
                          </button>
                      </div>
                      <div class="form-text">
                          <a href="#" class="text-muted text-decoration-none">Forgot password?</a>
                      </div>
                  </div>
                  <button type="submit" name = "submit" class="btn btn-custom" style="background-color: #9dbab3; color: white;"><b>Login</b></button>
                  <button type="button" class="btn btn-custom" style="background-color: #809993; color: white;" id="openSignupModal"><b>Create An Account</b></button>
				  
                  </form>             
          </div>
      </div>
  </div>
</div>

<!-- Sign Up Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel" style="color: #c07d9c; font-weight: bold;"><i class="fas fa-user-plus"></i> Sign Up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method = "POST" action="process_reg.php">
          <!-- Personal Information Section -->
          <h3 style="color: #c07d9c; font-weight: bold;"><i class="fas fa-info-circle"></i> Your Personal Information</h3>
          <hr style="border-top: 1px solid #c07d9c;">
          <div class="mb-3">
            <label for="signupEmail" class="form-label" style="font-weight: bold; color: #c07d9c;"><i class="fas fa-envelope"></i> Email address</label>
            <input type="email" name = "email" class="form-control" id="signupEmail" required>
          </div>
          <div class="mb-3">
            <label for="signupFirstName" class="form-label" style="font-weight: bold; color: #c07d9c;"><i class="fas fa-user"></i> First Name</label>
            <input type="text" name = "fname" class="form-control" id="signupFirstName" required>
          </div>
          <div class="mb-3">
            <label for="signupLastName" class="form-label" style="font-weight: bold; color: #c07d9c;"><i class="fas fa-user"></i> Last Name</label>
            <input type="text" name = "lname" class="form-control" id="signupLastName" required>
          </div>
          <div class="mb-3">
            <label for="signupPhoneNumber" class="form-label" style="font-weight: bold; color: #c07d9c;"><i class="fas fa-phone"></i> Phone Number</label>
            <input type="text" name = "ContactNumber" class="form-control" id="signupPhoneNumber" required>
          </div>

          <!-- Address Section -->
          <h3 style="color: #c07d9c; font-weight: bold;"><i class="fas fa-map-marker-alt"></i> Your Address Information</h3>
          <hr style="border-top: 1px solid #c07d9c;">
          <div class="mb-3">
            <label for="signupStreetAddress" class="form-label" style="font-weight: bold; color: #c07d9c;"><i class="fas fa-road"></i> Street Address</label>
            <input type="text" name = "Address" class="form-control" id="signupStreetAddress" required>
          </div>
          <div class="mb-3">
            <label for="signupCity" class="form-label" style="font-weight: bold; color: #c07d9c;"><i class="fas fa-city"></i> City</label>
            <select class="form-select" name = "City" id="signupCity" required>
              <option value="" disabled selected>Select City</option>
              <option value="Cebu City">Cebu City</option>
              <option value="Lapu-Lapu City">Lapu-Lapu City</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="signupSpecialIdentifier" class="form-label" style="font-weight: bold; color: #c07d9c;"><i class="fas fa-tag"></i> Location Identifier</label>
            <input type="text" name = "locationidentifier" class="form-control" id="signupSpecialIdentifier" required>
          </div>

          <!-- Password Section -->
          <h3 style="color: #c07d9c; font-weight: bold;"><i class="fas fa-key"></i> Your Password</h3>
          <hr style="border-top: 1px solid #c07d9c;">
          <div class="mb-3 password-wrapper position-relative">
            <label for="signupPassword" class="form-label" style="font-weight: bold; color: #c07d9c;"><i class="fas fa-lock"></i> Password</label>
            <div class="input-group">
              <input type="password" name = "Password" class="form-control" id="signupPassword" required>
              <button class="btn custom" type="button" style="background-color: #9dbab3; color: white;" onclick="togglePasswordVisibility('signupPassword')">
                <i class="fas fa-eye-slash"></i>
              </button>
            </div>
          </div>
          <div class="mb-3 password-wrapper position-relative">
            <label for="signupConfirmPassword" name = "ConfirmPassword" class="form-label" style="font-weight: bold; color: #c07d9c;"><i class="fas fa-lock"></i> Confirm Password</label>
            <div class="input-group">
              <input type="password" class="form-control" id="signupConfirmPassword" name="ConfirmPassword" required>
              <button class="btn custom" type="button" style="background-color: #9dbab3; color: white;" onclick="togglePasswordVisibility('signupConfirmPassword')">
                <i class="fas fa-eye-slash"></i>
              </button>
            </div>
          </div>
          
          <div class="mb-3">
            <input type="checkbox" name = "terms" class="form-check-input" id="agreeTerms">
            <label class="form-check-label" for="agreeTerms">I have read the <a href="#" style="color: #c07d9c;"><b>terms of service</b></a></label>
          </div>
          
          <div class="mb-3">
            <button type="submit" name = "submit" class="btn btn-custom" style="background-color: #9dbab3; color: white;"><b>Sign Up</b></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>