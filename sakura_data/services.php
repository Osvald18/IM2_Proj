<?php include 'header.php'; ?>


    <!-- START-->
     

    <div class="mt-0">
      <div class="p-5 text-center bg-body-tertiary position-relative overflow-hidden">
          <img src="IMAGES/SERVICEPAGEBANNER.png" class="w-100 position-absolute top-0 start-0 h-100" alt="Full-width background image" style="object-fit: cover; z-index: -1;">
        <!--  <div class="container py-5 position-relative d-flex flex-column justify-content-center align-items-center" style="z-index: 1; height: 100%;">
              <img src="IMAGES/servicetxt.png" alt="Title Image" class="img-fluid mb-3">
             <!-- <nav aria-label="breadcrumb" class="bg-transparent py-2 breadcrumb-nav">
                  <ol class="breadcrumb">
                      Breadcrumb items will be inserted here by JavaScript 
                  </ol>
              </nav>
          </div>-->
      </div>
  </div>
 
  
   <!-- START-->

 
  
  <div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="IMAGES/FLOWERPICS/collageflower.png" class="d-block mx-lg-auto img-fluid rounded" alt="Bootstrap Themes" width="1500" height="600" loading="lazy">
        </div>
        <div class="col-lg-6 text-color" style="color: #9dbab3; ">
            
            <img src="IMAGES/servicetitle.png" class="img-fluid mb-3" style =" margin-left: 50px; ">
      
            <p class="lead"><strong>Personalized Bouquets</strong><br>We specialize in creating bespoke bouquets tailored to your preferences. Whether it's for a birthday, anniversary, or any special occasion, our personalized bouquets are designed to leave a lasting impression.</p>
            <p class="lead"><strong>Personalized Flower Baskets</strong><br>Our beautiful flower baskets are perfect for gifting and home decor. Each basket is thoughtfully arranged with a variety of fresh, vibrant flowers to brighten anyone's day.</p>
            <p class="lead"><strong>Event Decoration</strong><br>From weddings to corporate events, we provide comprehensive event decoration services. Our team will work closely with you to design and decorate your venue, creating an enchanting atmosphere that perfectly complements your event.</p>
            <p class="lead">Let us help you celebrate life's moments with the beauty of flowers. Contact us today to discuss your floral needs and let our experts create something truly special for you.</p>
           
        </div>
    </div>
</div>

  
     

            <!-- CARDS -->
            <div class="container" id="featured-3">
              <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
          
                  <div class="feature col">
                      <div class="card h-100">
                          <div class="card-body d-flex flex-column align-items-left">
                              
                              <h3 class="card-title fs-2 text-body-emphasis mb-4">
                                  <i class="bi bi-calendar-event-fill text-body-emphasis me-3"></i>Event Decorating
                              </h3>
                              <p class="card-text" style="color: #9dbab3;">Elevate your special occasions with our bespoke occasion catering services. We specialize in crafting floral arrangements tailored to your event's theme and ambiance. From weddings to corporate events, our floral designs enhance every moment with elegance and grace.</p>
                              <button type="button" class="btn btn-custom mt-auto" data-bs-toggle="modal" data-bs-target="#occasionDecoratingModal" style="background-color: #9dbab3; color: white;">
                                  <b>Request Service</b>
                              </button>
                          </div>
                      </div>
                  </div>
          
               
                  <div class="feature col">
                      <div class="card h-100">
                          <div class="card-body d-flex flex-column align-items-left">
                              
                              <h3 class="card-title fs-2 text-body-emphasis mb-4">
                                  <i class="bi bi-flower1 text-body-emphasis me-3"></i>Bouquet
                              </h3>
                              <p class="card-text" style="color: #9dbab3;">Create your perfect bouquet with our customizable bouquet service. Choose from a variety of fresh flowers and colors to tailor a bouquet that matches your unique style and occasion. Whether it's for a wedding, anniversary, or special event, our floral experts ensure every detail reflects your personal taste and sentiment.</p>
                              <button type="button" class="btn btn-custom mt-auto" data-bs-toggle="modal" data-bs-target="#bouquetModal" style="background-color: #9dbab3; color: white;">
                                  <b>Request Service</b>
                              </button>
                          </div>
                      </div>
                  </div>
          
                  <div class="feature col">
                      <div class="card h-100">
                          <div class="card-body d-flex flex-column align-items-left">
                              <h3 class="card-title fs-2 text-body-emphasis mb-4">
                                  <i class="bi bi-basket2-fill text-body-emphasis me-3"></i>Basket
                              </h3>
                              <p class="card-text" style="color: #9dbab3;">Design your ideal gift basket with our personalized basket service. Select from a range of gourmet treats, artisanal goods, and specialty items to create a customized gift that suits any occasion. Whether it's for holidays, corporate gifts, or special celebrations, our curated baskets ensure your thoughtful gesture stands out.</p>
                              <button type="button" class="btn btn-custom mt-auto" data-bs-toggle="modal" data-bs-target="#basketModal" style="background-color: #9dbab3; color: white;">
                                  <b>Request Service</b>
                              </button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          
    
           <!-- MODAL FORMS -->
         <!-- MODAL FORMS -->
<div class="modal fade" id="occasionDecoratingModal" tabindex="-1" aria-labelledby="occasionDecoratingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="occasionDecoratingModalLabel" style="color: #c07d9c; font-weight: bold;">
                    <i class="fas fa-paint-brush"></i> Request Event Decorating
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="process_service.php" method="post">
                    <div class="mb-3">
                        <label for="occasionType" class="form-label" style="color: #c07d9c; font-weight: bold;">
                            <i class="fas fa-glass-cheers"></i> Occasion Type
                        </label>
                        <select class="form-select" id="occasionType" name="occasionType" required style="color: #c07d9c;">
                            <option value="wedding">Wedding</option>
                            <option value="birthday">Birthday</option>
                            <option value="anniversary">Anniversary</option>
                            <option value="corporate">Corporate Event</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="decoratingLocation" class="form-label" style="color: #c07d9c; font-weight: bold;">
                            <i class="fas fa-map-marker-alt"></i> Location
                        </label>
                        <input type="text" class="form-control" id="decoratingLocation" name="decoratingLocation" style="color: #c07d9c;">
                        <div class="form-text text-muted" style="color: #c07d9c;">Optional</div>
                    </div>
                    <div class="mb-3">
                        <label for="eventDate" class="form-label" style="color: #c07d9c; font-weight: bold;">
                            <i class="fas fa-calendar-alt"></i> Date
                        </label>
                        <input type="date" class="form-control" id="eventDate" name="eventDate" required style="color: #c07d9c;">
                    </div>
                    <div class="mb-3">
                        <label for="decoratingMessage" class="form-label" style="color: #c07d9c; font-weight: bold;">
                            <i class="fas fa-envelope"></i> Message
                        </label>
                        <textarea class="form-control" id="decoratingMessage" name="decoratingMessage" rows="3" style="color: #c07d9c;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-custom" style="background-color: #9dbab3; color: white;"><b>Submit</b></button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="bouquetModal" tabindex="-1" aria-labelledby="bouquetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bouquetModalLabel" style="color: #c07d9c; font-weight: bold;">
                    <i class="fas fa-gift"></i> Request Bouquet Service
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="process_service.php" method="post">
                    <div class="mb-3">
                        <label for="paymentMethod" class="form-label" style="color: #c07d9c; font-weight: bold;">
                            <i class="fas fa-money-bill-wave"></i> Payment
                        </label>
                        <select class="form-select" id="paymentMethod" name="paymentMethod" required style="color: #c07d9c;">
                            <option value="cash-on-delivery">Cash on delivery</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quantityOrder" class="form-label" style="color: #c07d9c; font-weight: bold;">
                            <i class="fas fa-box"></i> Quantity
                        </label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="quantityOrder" name="quantityOrder" style="color: #c07d9c;" min="1" step="1">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="bouquetLocation" class="form-label" style="color: #c07d9c; font-weight: bold;">
                            <i class="fas fa-map-marker-alt"></i> Location
                        </label>
                        <input type="text" class="form-control" id="bouquetLocation" name="bouquetLocation" style="color: #c07d9c;">
                        <div class="form-text text-muted" style="color: #c07d9c;">Optional</div>
                    </div>
                    <div class="mb-3">
                        <label for="bouquetDate" class="form-label" style="color: #c07d9c; font-weight: bold;">
                            <i class="fas fa-calendar-alt"></i> Date
                        </label>
                        <input type="date" class="form-control" id="bouquetDate" name="bouquetDate" required style="color: #c07d9c;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" style="color: #c07d9c; font-weight: bold;">
                            <i class="fas fa-seedling"></i> Flower Arrangement
                        </label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="random-flower" id="customItem" name="flowerArrangement[]">
                            <label class="form-check-label" for="customItem" style="color: #c07d9c;">Custom Item</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="roses" id="roses" name="flowerArrangement[]">
                            <label class="form-check-label" for="roses" style="color: #c07d9c;">Roses</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="tulips" id="tulips" name="flowerArrangement[]">
                            <label class="form-check-label" for="tulips" style="color: #c07d9c;">Tulips</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="lilies" id="lilies" name="flowerArrangement[]">
                            <label class="form-check-label" for="lilies" style="color: #c07d9c;">Lilies</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="daisies" id="daisies" name="flowerArrangement[]">
                            <label class="form-check-label" for="daisies" style="color: #c07d9c;">Daisies</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="orchids" id="orchids" name="flowerArrangement[]">
                            <label class="form-check-label" for="orchids" style="color: #c07d9c;">Orchids</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="sunflowers" id="sunflowers" name="flowerArrangement[]">
                            <label class="form-check-label" for="sunflowers" style="color: #c07d9c;">Sunflowers</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="carnations" id="carnations" name="flowerArrangement[]">
                            <label class="form-check-label" for="carnations" style="color: #c07d9c;">Carnations</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="bouquetMessage" class="form-label" style="color: #c07d9c; font-weight: bold;">
                            <i class="fas fa-envelope"></i> Message
                        </label>
                        <textarea class="form-control" id="bouquetMessage" name="bouquetMessage" rows="3" style="color: #c07d9c;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-custom" style="background-color: #9dbab3; color: white;"><b>Submit</b></button>
                </form>
            </div>
        </div>
    </div>
</div>

          



      
          <?php include 'footer.php'; ?>


        
    

    <script>
      
        function openModal(modalId) {
            var myModal = new bootstrap.Modal(document.getElementById(modalId), {
                keyboard: false
            });
            myModal.show();
        }

       
        $(document).ready(function() {
    var hash = window.location.hash;
    if (hash === '#basketModal') {
        openModal('basketModal');
    } else if (hash === '#occasionDecoratingModal') {
        openModal('occasionDecoratingModal');
    } else if (hash === '#bouquetModal') {
        openModal('bouquetModal');
    } 
});

    </script>