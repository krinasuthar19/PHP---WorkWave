<?php
// admin_salary_confirm.php

include 'layouts/config.php';

if (isset($_GET['u_id']) && !empty($_GET['u_id'])) {
  $user_id = $_GET['u_id'];

  // Fetch user details based on the user_id
  $query = "SELECT * FROM users WHERE u_id = $user_id";
  $result = mysqli_query($link, $query);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $u_id = $row['u_id'];
    $u_name = $row['username'];
    $base_salary = $row['salary'];
  } else {
    echo "User not found!";
  }


  session_start(); // Start session to get user role
  require 'layouts/check_hr.php';
  include 'layouts/head-main.php';

?>

  <head>
    <title><?php echo $language["Dashboard"]; ?> | Employee Management System</title>
    <?php include 'layouts/head.php'; ?>
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <?php include 'layouts/head-style.php'; ?>
    <style>
      .form-content {
        padding: 25px;
        border-radius: 15px;
        margin: 10px;
        box-shadow: 0 0 20px 15px rgba(0, 0, 0, 0.1);
      }
    </style>
  </head>

  <?php include 'layouts/body.php'; ?>

  <!-- Begin page -->
  <div id="layout-wrapper">
    <?php include 'layouts/menu.php'; ?>
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
      <div class="page-content">
        <div class="container-fluid">
          <!-- start page title -->
          <div class="row">
            <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Admin Salary confirms</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin Salary confirms</a></li>
                    <li class="breadcrumb-item active">Admin Salary confirms</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <section class="form-content">
            <div class="row">
              <form id="salaryForm" method="POST" action="process_salary.php">

                <div class="row">
                  <div class="col-md-4">
                    <label for="yearDropdown" class="form-label">Select Year:</label>
                    <select class="form-select" id="yearDropdown" name="yearDropdown">
                      <?php
                      // Get the current year
                      $currentYear = date("Y");

                      // Set the range of years you want to display
                      $startYear = $currentYear-2;
                      $endYear = $currentYear;

                      // Generate options for the year dropdown
                      for ($year = $startYear; $year <= $endYear; $year++) {
                        echo "<option value='$year'>$year</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="monthDropdown" class="form-label">Select Month:</label>
                    <select class="form-select" id="monthDropdown" name="monthDropdown">
                      <option value="January">January</option>
                      <option value="February">February</option>
                      <option value="March">March</option>
                      <option value="April">April</option>
                      <option value="May">May</option>
                      <option value="June">June</option>
                      <option value="July">July</option>
                      <option value="August">August</option>
                      <option value="September">September</option>
                      <option value="October">October</option>
                      <option value="November">November</option>
                      <option value="December">December</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="allowance">Username:</label>
                    <input type="text" class="form-control" name="username" value='<?php echo $u_name; ?>' readonly>
                  </div>
                  <div class="col-md-4">
                    <label for="uId">Employee ID:</label>
                    <input type="text" class="form-control" id="uId" name="uId" value='<?php echo $u_id; ?>' readonly>
                  </div>
                </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-4">
                <label for="baseSalary">Base Salary:</label>
                <input type="text" class="form-control" id="baseSalary" name="baseSalary" value='<?php echo $base_salary; ?>' readonly>
              </div>
              <div class="col-md-4">
                <label for="deduction">Deduction:</label>
                <input type="text" class="form-control" id="deduction" name="deduction">
              </div>
              <div class="col-md-4">
                <label for="allowance">Allowance:</label>
                <input type="text" class="form-control" id="allowance" name="allowance">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-4">
                <h3><label for="finalSalary">Final Salary:</label></h3>
                <input type="text" class="form-control" id="finalSalary" name="finalSalary" readonly>
              </div>
            </div>
            <br>
            <button id="confirmButton" class="btn btn-primary">Confirm</button>
            </form>
          </section>
        </div>

      </div>
    </div>
    <!-- End Page-content -->
    <?php include 'layouts/footer.php'; ?>
  </div>
  <!-- end main content-->
  </div>
  <!-- END layout-wrapper -->
  <!-- Right Sidebar -->
  <?php include 'layouts/right-sidebar.php'; ?>
  <!-- /Right-bar -->
  <!-- JAVASCRIPT -->
  <?php include 'layouts/vendor-scripts.php'; ?>
  <!-- apexcharts -->
  <script src="http://localhost/EMS-CI/assets/libs/apexcharts/apexcharts.min.js"></script>
  <!-- Plugins js-->
  <script src="http://localhost/EMS-CI/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="http://localhost/EMS-CI/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
  <!-- DataTables js -->
  <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
  <!-- Datatable -->
  <!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

<script src="assets/js/app.js"></script>
  <script>
    $(document).ready(function() {
      $('#example1').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#employeeDropdown').change(function() {
        var selectedEmployee = $(this).val(); // Get the selected employee username
        if (selectedEmployee) {
          $.ajax({
            type: 'POST',
            url: 'get_employees.php', // PHP script to fetch employee information
            data: {
              username: selectedEmployee
            },
            success: function(response) {
              var data = JSON.parse(response);
              // Update the base salary and u_id fields with the fetched data
              $('#baseSalary').val(data.baseSalary);
              $('#uId').val(data.u_id);
            }
          });
        } else {
          $('#baseSalary').val(''); // Clear the base salary field if no employee is selected
          $('#uId').val(''); // Clear the u_id field if no employee is selected
        }
      });

      // Handle change event for the month dropdown
      $('#monthDropdown').change(function() {
        // You can perform additional actions here based on the selected month
      });

      // Handle input change events for deduction and allowance fields
      $('#deduction, #allowance').on('input', function() {
        // Calculate the final salary based on deduction, allowance, and base salary
        var baseSalary = parseFloat($('#baseSalary').val());
        var deduction = parseFloat($('#deduction').val()) || 0;
        var allowance = parseFloat($('#allowance').val()) || 0;
        var finalSalary = baseSalary - deduction + allowance;
        $('#finalSalary').val(finalSalary.toFixed(2));
      });

      // Handle click event for the confirm button
      $('#confirmButton').click(function() {
        // You can perform actions here when the confirm button is clicked
      });
    });

    $(document).ready(function() {
      $('#departmentDropdown').on('change', function() {
        var departmentId = $(this).val(); // Get the selected department ID
        if (departmentId) {
          $.ajax({
            type: 'POST',
            url: 'get_employees.php', // PHP script to fetch employees based on department
            data: {
              d_id: departmentId
            },
            success: function(html) {
              $('#employeeDropdown').html(html); // Update employee dropdown with new options
            }
          });
        } else {
          $('#employeeDropdown').html('<option value="">Select Department First</option>'); // If no department is selected, reset employee dropdown
        }
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Handle input change events for deduction and allowance fields
      $('#deduction, #allowance').on('input', function() {
        calculateFinalSalary(); // Calculate final salary when deduction or allowance changes
      });

      // Function to calculate final salary
      function calculateFinalSalary() {
        var baseSalary = parseFloat($('#baseSalary').val()) || 0; // Get base salary
        var deduction = parseFloat($('#deduction').val()) || 0; // Get deduction
        var allowance = parseFloat($('#allowance').val()) || 0; // Get allowance

        // Calculate final salary
        var finalSalary = baseSalary + allowance - deduction;

        // Display final salary in the final salary field
        $('#finalSalary').val(finalSalary.toFixed(2));
      }

      // Trigger calculation initially
      calculateFinalSalary();

      // Handle click event for the confirm button
      $('#confirmButton').click(function() {
        // Perform additional actions here when the confirm button is clicked
      });
    });
    $('#yearDropdown').change(function() {
      // You can perform additional actions here based on the selected year
    });
  </script>

<?php
} else {
  echo "Invalid request!";
}

$link->close();
?>