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

if(isset($_GET['delete_button'])){
    $user_id = $_GET['delete_button'];
    $query = "DELETE FROM product WHERE product_ID = '$user_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        echo "Record successfully deleted";
        header('Location: admin_viewProducts.php');
        exit();
    } else {
        echo "Record deletion failed: " . mysqli_error($conn);
    }
}
?>



<?php include 'admin_headerSidebar.php'; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h2>List of Products</h2>
              <div class="btn-toolbar mb-2 mb-md-0">
                  <div class="btn-group me-2">
                      <button type="button" class="btn btn-custom" style="background-color: #9dbab3; color: white; font-weight: bold;">
                          <i class="bi bi-share"></i> Share
                      </button>
                      <button type="button" class="btn btn-custom" style="background-color:  #809993; color: white; font-weight: bold;">
                          <i class="bi bi-box-arrow-up"></i> Export
                      </button>
                  </div>
              </div>
          </div>
      
          <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="container">
              <form class="d-flex col-12 col-lg-auto mb-3 mb-lg-0 ms-auto" role="search">
                  <div class="input-group" style = "width: 50%;">
                      <input type="search" class="form-control" name = "search" placeholder="Search Products..." aria-label="Search" value = "<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">
                      <button class="btn btn-custom" type="submit" style="background-color: #9dbab3; color: white; font-weight: bold;">
                          <i class="bi bi-search"></i> 
                      </button>
                  </div>
              </form>
          </div>
          <div class="container">
                  <div class="row">
                      <div class="col-auto">
                      <button type="submit" name = "submit" class="btn btn-custom" style="background-color: #9dbab3; color: white;" onclick= "location.href='admin_addProducts.php';"><b>Add Product</b></button>
                      </div>
            
                    
                  </div>
              </div>
 
          </div>
      
          <div class="table-responsive small">
              <table class="table table-striped table-hover table-sm">
                  <thead class="table-light">
                      <tr>
                          <th scope="col">Product ID</th>
                          <th scope="col">Product Name</th>
                          <th scope="col">Product Category</th>
                          <th scope="col">Product Price</th>
                          <th scope="col">Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      <!-- Example rows, replace with dynamic content -->
                       <!-- php inside the table-->

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

                        $sql = "SELECT product_ID, prodName,fkcat_name, prodPrice FROM product";

                        $result = $conn->query($sql);
                        if(!$result){
                            die("Invalid query: " . $conn->error);
                        }


                        if(isset($_GET['search'])){
                            $filter = $_GET['search'];
                            $sql = "SELECT * FROM product where CONCAT(product_ID,prodName,fkcat_name) like '%$filter%'";
                            $sql_run = mysqli_query($conn, $sql);

                            if(mysqli_num_rows($sql_run) > 0){

                                while($items = mysqli_fetch_assoc($sql_run)){
                                    echo "<tr>
                                      <td>$items[product_ID]</td>
                                      <td>$items[prodName]</td>
                                      <td>$items[fkcat_name]</td>
                                      <td>$items[prodPrice]</td>
                                      <td>
                                      <a class = 'btn btn-primary btn-sm' style='background-color: #9dbab3; border: none; color: white;' href = 'admin_editProducts.php?product_ID=$items[product_ID]'>Edit</a>
                                      <button class = 'btn btn-primary btn-sm' style='background-color: #9dbab3; border: none; color: white;' name = 'delete_button' onclick='confirmDelete({$items['product_ID']})'>Delete</a>
                                        </td>
                                  </tr>";
                                    }

                            } else {
                                ?>
                                <tr>
                                    <td colspan = "5">No Records found</h3>
                                </tr>

                                <?php
                            }

                } else {

                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                          <td>$row[product_ID]</td>
                          <td>$row[prodName]</td>
                          <td>$row[fkcat_name]</td>
                          <td>$row[prodPrice]</td>
                          <td>
                          <a class = 'btn btn-primary btn-sm' style='background-color: #9dbab3; border: none; color: white;' href = 'admin_editProducts.php?product_ID=$row[product_ID]'>Edit</a>
                          <button class = 'btn btn-primary btn-sm' style='background-color: #9dbab3; border: none; color: white;' name = 'delete_button' onclick='confirmDelete({$row['product_ID']})' >Delete</a>
                            </td>
                      </tr>";
                        }
                }

                       ?>

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

                       ?>

                                          <!-- Add more rows as needed -->
                  </tbody>
              </table>
          </div>
      </main>
      

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


function confirmDelete(productId) {
        if (confirm("Are you sure you want to delete this record?")) {
            window.location.href = `admin_viewProducts.php?delete_button=${productId}`;
        }
    }

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

