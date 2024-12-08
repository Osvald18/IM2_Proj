<?php include 'header.php'; ?>

<!-- (FOOTER) MODALS FOR EVERY PAGE (MAYBE UNLESS NAAY WAY NA MU HREF ANG FOOTER THROUGH ANOTHER PAGE)-->
 


<!---MODAL END---->


      <main>
      
        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
		<form method = "POST" action="process_order.php">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="IMAGES/BANNER1.png" class="d-block w-100" alt="Slide 1">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <img src="IMAGES/carouseltxt3.png" alt="Image 1">
                            <p><a class="btn btn-lg btn-custom" style="background-color: #9dbab3; color: white;" href="shop.php"><b>Shop Now</b></a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="IMAGES/BANNER2.png" class="d-block w-100" alt="Slide 2">
                    <div class="container">
                        <div class="carousel-caption">
                            <img src="IMAGES/carouseltxt2.png" alt="Image 2">
                            <p><a class="btn btn-lg btn-custom" style="background-color: #9dbab3; color: white;" href="#about-us"><b>Learn More</b></a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="IMAGES/BANNER3.png" class="d-block w-100" alt="Slide 3">
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <img src="IMAGES/carouseltxt1.png" alt="Image 3">
                            <p><a class="btn btn-lg btn-custom" style="background-color: #9dbab3; color: white;" href="services.php"><b>Explore More</b></a></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="my-5">
          <div class="container">
            <div class="border-line my-4" style="border-bottom: 1px solid #c07d9c;"></div>
          </div>
          
          <div class="container text-center">
            <img src="IMAGES/titlefeatured1.png" alt="Featured Plants Image" class="img-fluid mx-auto d-block" style="max-height: 200px;">
            <p class="lead mt-4" style="color: #9dbab3;">Sakura Flower Shop, Your Premier Destination for Exquisite Florals.<br>
              Transform Every Moment with Sakura's Timeless Bouquets.<br>
              Crafting Cherished Memories with Every Petal.</p>
          </div>
          
          <div id="plantCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <!-- Featured Plant 1 -->
              <div class="carousel-item active">
                <div class="container">
                  <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                      <div class="card h-100 shadow-sm">
                        <img src="IMAGES/FLOWERPICS/flowerpic1.png" class="card-img-top" alt="Featured Plant 1">
                        <div class="card-body">
                          <h5 class="card-title text-left">Spring Blossom Bouquet</h5>
                          <div class="d-flex justify-content-between align-items-center">
                            <div>
                              <h3 class="text-custom">₱2,500</h3>
                            </div>
                            <div>
                              <button class="btn btn-custom me-2" type="button" data-bs-toggle="modal" data-bs-target="#plantModal1" style="background-color: #9dbab3; color: white; font-weight: bold;">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                              </button>
                              <button class="btn btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#plantModal1Details" style="background-color: #9dbab3; color: white; font-weight: bold;">
                                <i class="fas fa-eye"></i> View Details
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Featured Plant 2 -->
                    <div class="col">
                      <div class="card h-100 shadow-sm">
                        <img src="IMAGES/FLOWERPICS/flowerpic2.png" class="card-img-top" alt="Featured Plant 2">
                        <div class="card-body">
                          <h5 class="card-title text-left">Summer Garden Bouquet</h5>
                          <div class="d-flex justify-content-between align-items-center">
                            <div>
                              <h3 class="text-custom">₱3,500</h3>
                            </div>
                            <div>
                              <button class="btn btn-custom me-2" type="button" data-bs-toggle="modal" data-bs-target="#plantModal2" style="background-color: #9dbab3; color: white; font-weight: bold;">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                              </button>
                              <button class="btn btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#plantModal2Details" style="background-color: #9dbab3; color: white; font-weight: bold;">
                                <i class="fas fa-eye"></i> View Details
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Featured Plant 3 -->
                    <div class="col">
                      <div class="card h-100 shadow-sm">
                        <img src="IMAGES/FLOWERPICS/flowerpic3.png" class="card-img-top" alt="Featured Plant 3">
                        <div class="card-body">
                          <h5 class="card-title text-left">Autumn Harvest Bouquet</h5>
                          <div class="d-flex justify-content-between align-items-center">
                            <div>
                              <h3 class="text-custom">₱2,000</h3>
                            </div>
                            <div>
                              <button class="btn btn-custom me-2" type="button" data-bs-toggle="modal" data-bs-target="#plantModal3" style="background-color: #9dbab3; color: white; font-weight: bold;">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                              </button>
                              <button class="btn btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#plantModal3Details" style="background-color: #9dbab3; color: white; font-weight: bold;">
                                <i class="fas fa-eye"></i> View Details
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
         
    <button class="carousel-control-prev custom-carousel-control-prev" type="button" data-bs-target="#plantCarousel" data-bs-slide="prev">
      <span class="custom-carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next custom-carousel-control-next" type="button" data-bs-target="#plantCarousel" data-bs-slide="next">
      <span class="custom-carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
          </div>
          
          
    
          <div class="container text-center mt-4">
            <a href="shop.php" class="btn btn-custom btn-lg d-flex align-items-center justify-content-center mx-auto" style="background-color: #9dbab3; color: white; font-weight: bold; width: 200px;">
              View More <i class="fas fa-chevron-right ms-2"></i>
            </a>
          </div>
        </div>
        
        
        
        <div class="container">
          <br>
          <div class="border-line my-4" style="border-bottom: 1px solid #c07d9c;"></div>
        </div>
        
        
        

        
        
        
           
        
        <div id="about-us" class="my-5">
            <div class="p-5 text-center bg-body-tertiary" style="background-color: #f5eaea;">
                <div class="container py-5">
                    <div class="row align-items-center">
                        <div class="col-lg-6 text-lg-start">
                            <img src="IMAGES/SAKURA.png" alt="Brand Image" style="width: 100%; max-width: 600px; height: auto;">
                        </div>
                        <div class="col-lg-6 mt-4 mt-lg-0">
                            <img src="IMAGES/welcometxt.png" alt="Welcome Image" style="max-width: 100%; height: auto;">
                            <p class="lead mt-3" style="color: #9dbab3; ">
                                Welcome to <b>SAKURA</b> Flower Shop nestled in the heart of Banilad, Cebu, where beauty 
                                blossoms with every petal. We specialize in crafting exquisite floral arrangements for every occasion, from weddings and 
                                corporate events to intimate celebrations and heartfelt gifts. With a passion for creativity and quality, we strive to bring nature's elegance
                                into your life, one bouquet at a time.
                            </p>
                            
                            
                        </div>
                        
                        </div>
                    </div>
                </div>
            </div>
  
            <div class="container">
              <br>
              <div class="border-line my-4" style="border-top: 1px solid #c07d9c;"></div>
            </div>
            
 <div class="my-5">
         
  <div class="container text-center">
    <img src="IMAGES/titlefeatured2.png" alt="Latest Products Image" class="img-fluid mx-auto d-block" style="max-height: 200px;">
    <p class="lead mt-4" style="color: #9dbab3;">Discover Our Latest Collection of Exquisite Florals.<br>
  
      Crafted with Passion and Precision for Unforgettable Moments.</p>
  </div>
          
  <div id="plantCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <!-- Featured Plant 1 -->
      <div class="carousel-item active">
        <div class="container">
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div class="card h-100 shadow-sm">
                <img src="IMAGES/FLOWERPICS/flowerpic4.png" class="card-img-top" alt="Featured Plant 1">
                <div class="card-body">
                  <h5 class="card-title text-left">Spring Blossom Bouquet</h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h3 class="text-custom">₱2,500</h3>
                    </div>
                    <div>
                      <button class="btn btn-custom me-2" type="button" data-bs-toggle="modal" data-bs-target="#plantModal1" style="background-color: #9dbab3; color: white; font-weight: bold;">
                        <i class="fas fa-shopping-cart"></i> Add to Cart
                      </button>
                      <button class="btn btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#plantModal1Details" style="background-color: #9dbab3; color: white; font-weight: bold;">
                        <i class="fas fa-eye"></i> View Details
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Featured Plant 2 -->
            <div class="col">
              <div class="card h-100 shadow-sm">
                <img src="IMAGES/FLOWERPICS/flowerpic5.png" class="card-img-top" alt="Featured Plant 2">
                <div class="card-body">
                  <h5 class="card-title text-left">Summer Garden Bouquet</h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h3 class="text-custom">₱3,500</h3>
                    </div>
                    <div>
                      <button class="btn btn-custom me-2" type="button" data-bs-toggle="modal" data-bs-target="#plantModal2" style="background-color: #9dbab3; color: white; font-weight: bold;">
                        <i class="fas fa-shopping-cart"></i> Add to Cart
                      </button>
                      <button class="btn btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#plantModal2Details" style="background-color: #9dbab3; color: white; font-weight: bold;">
                        <i class="fas fa-eye"></i> View Details
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Featured Plant 3 -->
            <div class="col">
              <div class="card h-100 shadow-sm">
                <img src="IMAGES/FLOWERPICS/flowerpic6.png" class="card-img-top" alt="Featured Plant 3">
                <div class="card-body">
                  <h5 class="card-title text-left">Autumn Harvest Bouquet</h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h3 class="text-custom">₱2,000</h3>
                    </div>
                    <div>
                      <button class="btn btn-custom me-2" type="button" data-bs-toggle="modal" data-bs-target="#plantModal3" style="background-color: #9dbab3; color: white; font-weight: bold;">
                        <i class="fas fa-shopping-cart"></i> Add to Cart
                      </button>
                      <button class="btn btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#plantModal3Details" style="background-color: #9dbab3; color: white; font-weight: bold;">
                        <i class="fas fa-eye"></i> View Details
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  
    <!-- Carousel controls -->
    <button class="carousel-control-prev custom-carousel-control-prev" type="button" data-bs-target="#plantCarousel" data-bs-slide="prev">
      <span class="custom-carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next custom-carousel-control-next" type="button" data-bs-target="#plantCarousel" data-bs-slide="next">
      <span class="custom-carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  
  
          
         
  <div class="container text-center mt-4">
            <a href="shop.php" class="btn btn-custom btn-lg d-flex align-items-center justify-content-center mx-auto" style="background-color: #9dbab3; color: white; font-weight: bold; width: 200px;">
              View More <i class="fas fa-chevron-right ms-2"></i>
            </a>
          </div>
        </div>
            <div class="container">
              <br>
              <div class="border-line my-4" style="border-top: 1px solid #c07d9c;"></div>
            </div>
            
            <div class="my-5">
              <div class="row">
                  <div class="col-12">
                      <div class="position-relative">
                          <!-- Gradient Mask for Background Image -->
                          <div class="gradient-mask">
                              <img src="IMAGES/SERVICESBANNER.png" class="img-fluid w-100" alt="Services Banner">
                          </div>
                          
                          <!-- Follow Us on Social Media with Image -->
                          <div class="follow-us position-absolute top-0 start-50 translate-middle mt-3 text-center">
                              <img src="IMAGES/socialmedia.png" alt="Follow Us Title" class="img-fluid" style="transform: translateY(+90%);">
                              <ul class="list-inline social-icons" style="margin-top: 170px;"> 
                                  <li class="list-inline-item"><a href="#" style="color:  #9dbab3;"><i class="fab fa-facebook"></i></a></li>
                                  <li class="list-inline-item"><a href="#"style="color:  #9dbab3;"><i class="fab fa-twitter"></i></a></li>
                                  <li class="list-inline-item"><a href="#"style="color:  #9dbab3;"><i class="fab fa-instagram"></i></a></li>
                                
                              </ul>
                          </div>
                             
                          
                          <!-- Position for Facebook Embed -->
                          <div class="position-absolute" style="top: 50%; left: 30%; transform: translateY(-50%); width: 75%;">
                              <!-- First Facebook Embed -->
                              <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3Dpfbid02BNhQ1toBS3nBcJddcNx2jf2myw4BEUkQBMLynQ3d4eqaWRTUmvgWkBGF112cs5Gjl%26id%3D100054209723669&show_text=true&width=500" width="500" height="589" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          
           

          <?php include 'footer.php'; ?>
            
