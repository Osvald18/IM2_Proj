<?php include 'admin_headerSidebar.php'; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h2>Edit Product</h2>
          </div>

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

          if (isset($_GET['product_ID'])){

            $product_ID = $_GET['product_ID'];
            $user = "SELECT * FROM product WHERE product_ID = '$product_ID'";
            $users_run = mysqli_query($conn, $user);

            if (mysqli_num_rows($users_run) > 0){

                foreach($users_run as $user){

                    ?>

          <div class="prodinfo">
    <form method="POST" action = "process_editProducts.php">
        <input type = "hidden" name = "product_ID" value = "<?=$user['product_ID'];?>">
        <div class="form-group">
            <label for="prodName">Product Name</label>
            <input type="text" class="form-control" name="prodName" value="<?=$user['prodName'];?>">
        </div>

        <div class="form-group">
            <label for="prodDesc">Product Description</label>
            <textarea class="form-control" name="prodDesc" rows="2"><?=$user['prodDesc'];?></textarea>
        </div>

        <div class="form-group">
            <label for="City">Product Category</label>
            <select class="form-select" name="fkcat_name" id="signupCity" required>
                <option value="" disabled>Select Category</option>
                <option value="Flowers" <?=$user['fkcat_name'] == 'Flowers' ? 'selected':'' ?> >Flowers</option>
                <option value="Bouquet" <?=$user['fkcat_name'] == 'Bouquet' ? 'selected':'' ?> >Bouquet</option>
                <option value="Basket" <?=$user['fkcat_name'] == 'Basket' ? 'selected':'' ?> >Basket</option>
            </select>
        </div>

        <div class="form-group">
            <label for="contactNumber">Product price</label>
            <input type="text" class="form-control" name="prodPrice" value="<?=$user['prodPrice'];?>">
        </div>

        <div class="mb-3">
                <label for="formFile" class="form-label">Product Image</label>
                <input class="form-control" name = "prodImage"  value= "IMAGES/FLOWERPICS/<?=$user['prodImage'];?>"  type="file" id="formFile" accept = ".jpg, .jpeg, .png">
                </div>


        <div class="form-group">
            <button type="submit" name="update_submit" class="btn btn-custom" style="background-color: #9dbab3; color: white;"><b>Update Product</b></button>
        </div>

    </form>

    <?php
                
                }
                

            } else {
                ?>
                <h4>No Record found</h4>
                <?php
            }
          }
           
          ?>
</div>


      </main>

      
    </div>
</div>
      





    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- DOESN'T WORK FK
    <script src="script.js"></script>
    <script src="dateScript.js"></script>
    -->    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
    
    <script>
        $(document).ready(function() {
    $('#datePickerButton').daterangepicker({
        startDate: moment().startOf('week'),
        endDate: moment().endOf('week'),
        opens: 'left',
        locale: {
            format: 'MM/DD/YYYY'
        }
    }, function(start, end, label) {
        $('#datePickerButton').html('<i class="bi bi-calendar"></i> ' + start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
    });
});



// Export Functionality
document.getElementById('exportButton').addEventListener('click', () => {
    const data = [
        { name: 'John Doe', age: 30, city: 'New York' },
        { name: 'Jane Smith', age: 25, city: 'San Francisco' }
    ];

    // Convert JSON data to CSV
    const csv = convertToCSV(data);

    // Create a blob from the CSV data
    const blob = new Blob([csv], { type: 'text/csv' });

    // Create a link element to download the CSV file
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = 'data.csv';
    link.click();
});

// Convert JSON array to CSV string
function convertToCSV(arr) {
    const array = [Object.keys(arr[0])].concat(arr);

    return array.map(it => {
        return Object.values(it).toString();
    }).join('\n');
}

    </script>
</body>
</html>