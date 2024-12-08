<?php include 'admin_headerSidebar.php'; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h2>Add Product</h2>
          </div>

          <div class = "prodinfo">
            <form method = "POST" action = "process_addProducts.php">
                <div class="form-group">
                  <label for="prodName" style = "margin-bottom: 10px;">Product Name</label>
                  <input type="text" class="form-control" name = "prodName">
                </div>

                <div class="form-group">
                    <label for="prodDesc" style = "margin-bottom: 10px;">Product Description</label>
                    <textarea class="form-control" name = "prodDesc" rows="2"></textarea>
                  </div>

                  <div class = "form-group">
                  <label for="signupCity" class="form-label">Product Category</label>
            <select class="form-select" name = "category" id="signupCity" required>
              <option value="" disabled selected>Select Category</option>
              <option value="Flowers">Flowers</option>
              <option value="Bouquet">Bouquet</option>
              <option value="Basket">Basket</option>
            </select>
                    </div>

                  <div class="form-group">
                    <label for="prodMin" style = "margin-bottom: 10px;">Product Price</label>
                    <input type="text" class="form-control" name = "prodPrice">
                  </div>

                  <div class="mb-3">
                <label for="formFile" class="form-label">Product Image</label>
                <input class="form-control" name = "image"  type="file" id="formFile" accept = ".jpg, .jpeg, .png">
                </div>


                  <div class="form-group">
                  <button type="submit" name = "submit" class="btn btn-custom" style="background-color: #9dbab3; color: white;"><b>Add Product</b></button>
                  </div>
                
              </form>
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