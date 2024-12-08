<?php include 'admin_headerSidebar.php'; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h2>Edit Customer</h2>
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

          if (isset($_GET['Customer_ID'])){

            $Customer_ID = $_GET['Customer_ID'];
            $user = "SELECT * FROM customer WHERE Customer_ID = '$Customer_ID'";
            $users_run = mysqli_query($conn, $user);

            if (mysqli_num_rows($users_run) > 0){

                foreach($users_run as $user){

                    ?>

          <div class="prodinfo">
    <form method="POST" action = "process_editCustomers.php">
        <input type = "hidden" name = "Customer_ID" value = "<?=$user['Customer_ID'];?>">
        <div class="form-group">
            <label for="custName">Customer Name</label>
            <input type="text" class="form-control" name="custName" value="<?=$user['custname'];?>">
        </div>

        <div class="form-group">
            <label for="contactNumber">Contact Number</label>
            <input type="text" class="form-control" name="contactNumber" value="<?=$user['ContactNumber'];?>">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" value="<?=$user['cust_address'];?>">
        </div>

        <div class="form-group">
            <label for="City">City</label>
            <select class="form-select" name="city" id="signupCity" required>
                <option value="" disabled>Select City</option>
                <option value="Cebu City" <?=$user['City'] == 'Cebu City' ? 'selected':'' ?> >Cebu City</option>
                <option value="Lapu-Lapu City" <?=$user['City'] == 'Lapu-Lapu City' ? 'selected':'' ?> >Lapu-Lapu City</option>
            </select>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" value="<?=$user['email'];?>">
        </div>

        <div class="form-group">
            <label for="locIdentifier">Location Identifier</label>
            <textarea class="form-control" name="locIdentifier" rows="2"><?=$user['locationidentifier'];?></textarea>
        </div>

        <!-- Assuming password is not editable in this form -->

        <div class="form-group">
            <button type="submit" name="update_submit" class="btn btn-custom" style="background-color: #9dbab3; color: white;"><b>Update Customer</b></button>
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

