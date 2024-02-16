<?php
session_start(); // Start session to get user role
require 'layouts/check_pm.php';
include 'layouts/head-main.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['task_id'])) {
  $task_id = $_GET['task_id'];

  // Include database connection or configuration file
  include 'layouts/config.php';

  // Fetch task data from the database
  $query = "SELECT * FROM task WHERE t_id = $task_id";
  $result = mysqli_query($link, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $status = $row['status'];

    // Start Task
    if ($status == 0) {
      $updateQuery = "UPDATE task SET status = 1 WHERE t_id = $task_id";
      if (mysqli_query($link, $updateQuery)) {
        // Task started successfully
        header("Location: view_task.php"); // Redirect back to view_tasks.php
        exit();
      } else {
        // Error updating task status
        echo "Error updating task status: " . mysqli_error($link);
        exit();
      }
    }

    // End Task
    if ($status == 1) {
      $updateQuery = "UPDATE task SET status = 2 WHERE t_id = $task_id";
      if (mysqli_query($link, $updateQuery)) {
        // Task ended successfully
        header("Location: view_task.php"); // Redirect back to view_tasks.php
        exit();
      } else {
        // Error updating task status
        echo "Error updating task status: " . mysqli_error($link);
        exit();
      }
    }
  } else {
    // Task not found
    echo "Task not found.";
    exit();
  }

  // Close the database connection
  mysqli_close($link);
}
?>

<head>
  <title><?php echo $language["Dashboard"]; ?> | Employee Management System</title>
  <?php include 'layouts/head.php'; ?>
  <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
  <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <?php include 'layouts/head-style.php'; ?>
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
              <h4 class="mb-sm-0 font-size-18">View Tasks</h4>
              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">View Tasks</a></li>
                  <li class="breadcrumb-item active">View Tasks</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!-- end page title -->
        <!-- Content Header -->
        <!-- Main Content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header">
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                    <div class="row">
                    </div>
                    <!-- DataTable -->
                    <table id="example1" class="table table-bordered table-striped dataTable no-footer">
                      <thead>
                        <tr role="row">
                          <!-- Table Headers -->
                          <th>#</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // Include database connection or configuration file
                        include 'layouts/config.php';
                        $u_id = $_SESSION['u_id'];

                        // Fetch task data from the database
                        $query = "SELECT * FROM task where t_id IN (Select t_id from assign_task where u_id = $u_id)";
                        $result = mysqli_query($link, $query);

                        if (!$result) {
                          die('Error executing query: ' . mysqli_error($link));
                        }

                        // Check if there are rows in the result
                        if (mysqli_num_rows($result) > 0) {
                          $rowNumber = 1; // Variable to track the row number in the table
                          while ($row = mysqli_fetch_assoc($result)) {
                            // Output each row in the table 
                            echo '<tr>';
                            echo '<td>' . $rowNumber . '</td>'; // Assuming 'emp_id' is the employee ID column
                            // Add other fields accordingly
                            echo '<td>' . $row['t_title'] . '</td>';
                            echo '<td>' . $row['t_description'] . '</td>';
                            echo '<td>' . $row['start_date'] . '</td>';
                            echo '<td>' . $row['end_date'] . '</td>';
                            $status = $row['status'];
                            $statusColor = ($status == 0) ? 'red' : (($status == 1) ? 'green' : 'blue');
                            echo '<td style="color: ' . $statusColor . ';">';
                            echo ($status == 0) ? 'Pending' : (($status == 1) ? 'Working' : 'Completed');
                            echo '</td>';

                            // Action buttons
                            echo '<td>';
                            if ($status == 0) {
                              // Display the Start button
                              echo '<a href="?task_id=' . $row['t_id'] . '" class="btn btn-success">Start</a>';
                            } elseif ($status == 1) {
                              // Display the End button
                              echo '<a href="?task_id=' . $row['t_id'] . '" class="btn btn-warning">End</a>';
                            }
                            echo '</td>';

                            echo '</tr>';

                            $rowNumber++;
                          }
                        } else {
                          // If no data is available
                          echo '<tr><td colspan="7">No data available in the table</td></tr>';
                        }

                        // Close the database connection
                        mysqli_close($link);
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- Footer -->

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
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<!-- Datatable -->


<!-- App js -->
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