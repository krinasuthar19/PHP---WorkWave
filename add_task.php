<?php
session_start();
require "layouts/check_admin.php";
include 'layouts/head-main.php';
?>

<head>
  <title>
    <?php echo $language["Dashboard"]; ?> | Minia - Admin & Dashboard Template
  </title>
  <?php include 'layouts/head.php'; ?>
  <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
    type="text/css" />
  <?php include 'layouts/head-style.php'; ?>
  <style>
  .form-content {
    padding: 25px;
    border-radius: 15px;
    margin: 10px;
    box-shadow: 0 0 20px 15px rgba(0, 0, 0, 0.1);
  }

  table {
    border-collapse: collapse;
    margin-top: 20px;
    padding: 20px;
  }

  th {
    border-bottom: 2px solid #ddd;
  }

  #button1 {
    width: 100%;
    font-weight: bold;
  }

  #button2 {
    width: 100%;
    border-color: blue;
    background-color: white;
    color: blue;
    font-weight: bold;
  }

  .image-container {
    width: 150px;
    height: 150px;
    border-radius: 15px;
    overflow: hidden;
    border: 1px solid #ccc;
  }

  .image-container img {
    width: 100%;
    height: auto;
  }
  </style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>
<?php include 'layouts/body.php'; ?>
<div id="layout-wrapper">
  <?php include 'layouts/menu.php'; ?>
  <div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0 font-size-18">Add Task</h4>
              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">WorkWave</a></li>
                  <li class="breadcrumb-item active">Assign Task</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="form-content">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <form action="process_add_task.php" method="POST" enctype="multipart/form-data" id="taskForm">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="Title">Title</label>
                      <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="Description">Description</label>
                      <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label for="Department">Department</label>
                      <select class="form-control" id="department" name="department" required>
                        <option value="" disabled selected hidden>Select Department</option>
                        <?php
                        include 'layouts/config.php';
                        $sql = "SELECT d_name,d_id FROM department";
                        $result = $link->query($sql);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            $depName = $row['d_name'];
                            $dep_id = $row['d_id'];
                            echo "<option value=\"$dep_id\">$depName</option>";
                          }
                        } else {
                          echo "<option value=\"\">No roles found</option>";
                        }
                        $link->close();
                        ?>
                      </select>
                    </div>
                    <!-- start date open -->
                    <div class="col-md-4 mb-3">
                      <label for="startdate">Start Date</label>
                      <input type="text" class="form-control" id="startDate" name="startDate" required>
                    </div>
                    <!-- start date close -->
                    <!-- end date open -->
                    <div class="col-md-4 mb-3">
                      <label for="enddate">End Date</label>
                      <input type="text" class="form-control" id="endDate" name="endDate" required>
                    </div>
                    <!-- end date close -->
                  </div>
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <br>
                      <button type="submit" class="btn btn-primary form-control" id="submit" name="submit"
                        style="margin-top: 8px;">Add Task
                    </div>
                  </div>
                  <div id="error-message" style="color: red;"></div>
              </div>
            </div>
            </form>
            <script>
            function displayImage() {
              var input = document.getElementById('imageInput');
              var container = document.getElementById('displayContainer');
              var image = document.getElementById('displayImage');
              var file = input.files[0];
              if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                  image.src = e.target.result;
                  container.style.display = 'block';
                };
                reader.readAsDataURL(file);
              }
            }
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php include 'layouts/footer.php'; ?>
</div>
<?php include 'layouts/right-sidebar.php'; ?>
<?php include 'layouts/vendor-scripts.php'; ?>
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
<!-- <script src="assets/js/pages/dashboard.init.js"></script> -->
<script src="assets/js/app.js"></script>

<!-- datepicker -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var today = new Date();
  var SminDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());
  var SmaxDate = new Date(today.getFullYear(), today.getMonth() + 4, 0);
  var EminDate = new Date();
  var EmaxDate = new Date(today.getFullYear(), today.getMonth() + 4, 0); // Maximum end date is 4 months from today

  var startDatePicker = flatpickr("#startDate", {
    dateFormat: "d-m-Y",
    minDate: SminDate,
    maxDate: SmaxDate,
    onChange: function(selectedDates, selectedDate) {
      // Update the minimum date of the end date picker to be the selected start date
      endDatePicker.set("minDate", selectedDate);
    }
  });

  var endDatePicker = flatpickr("#endDate", {
    dateFormat: "d-m-Y",
    minDate: EminDate,
    maxDate: EmaxDate
  });
});
</script>




<!-- <script>
  document.addEventListener('DOMContentLoaded', function () {
    var today = new Date();

    // Get defaultStartDate's date
    var defaultStartDate = new Date(today);
    defaultStartDate.setDate(defaultStartDate.getDate() + 1);

    // Calculate tomorrow's date
    var defaultEndDate = new Date(defaultStartDate);
    defaultEndDate.setDate(defaultEndDate.getDate() + 1);

    // Initialize Flatpickr for startDate and endDate inputs
    flatpickr("#startDate", {
      dateFormat: "d-m-Y",
      defaultDate: defaultStartDate, // Set default start date to today
      onChange: validateDates // Call validateDates whenever endDate changes

    });

    flatpickr("#endDate", {
      dateFormat: "d-m-Y",
      defaultDate: defaultEndDate, // Set default end date to tomorrow
      onChange: validateDates // Call validateDates whenever endDate changes
    });

    // Function to validate dates
    function validateDates() {
      var startDate = document.getElementById('startDate').value;
      var endDate = document.getElementById('endDate').value;
      var today = new Date();
      var errorMessage = '';

      // Parse date strings into the appropriate format
      var startDateParsed = flatpickr.parseDate(startDate, "d-m-Y");
      var endDateParsed = flatpickr.parseDate(endDate, "d-m-Y");

      if (startDateParsed <= today) {
        errorMessage += "Start date must be after today's date. ";
      }
      if (startDateParsed >= endDateParsed) {
        errorMessage = "Start date must be before end date. ";
      }
      if (endDateParsed <= startDateParsed) {
        errorMessage = "End date must be after start date. ";
      }

      var errorElement = document.getElementById('error-message');
      errorElement.textContent = errorMessage;

      // Return true if there are no errors, false otherwise
      return errorMessage === '';
    }

    // Validate dates initially
    validateDates();
    // Form submission event listener
    document.getElementById('taskForm').addEventListener('submit', function (event) {
      // Validate dates
      var isValid = validateDates();

      // If validation failed, prevent form submission
      if (!isValid) {
        event.preventDefault();
        alert("Please correct the errors before submitting the form.");
      }
    });
  });
</script> -->


</body>

</html>