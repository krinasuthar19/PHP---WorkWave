<?php
session_start(); // Start session to get user role
include 'layouts/session.php';
require 'layouts/check_hr.php';
include 'layouts/head-main.php';
?>

<head>
  <title><?php echo $language["Dashboard"]; ?> | Employee Management System</title>

  <?php include 'layouts/head.php'; ?>
  <?php include 'layouts/head-style.php'; ?>

</head>

<?php include 'layouts/body.php'; ?>


<!-- Begin page -->
<div id="layout-wrapper">

  <?php include 'layouts/menu.php'; ?>
  <div class="main-content">

    <div class="page-content">
      <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
          <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0 font-size-18">Approv Leave</h4>

              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">WorkWave</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        <!-- Add the content and functionality of the "Approve Leave" page here -->
        <div class="content-wrapper" style="min-height: 637.2px;">
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
                      <!-- DataTable -->
                      <table id="example1" class="table table-bordered table-striped dataTable no-footer">
                        <thead>
                          <tr role="row">
                            <!-- Table Headers -->
                            <th>#</th>
                            <th>Emp_id</th>
                            <th>Reason</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Description</th>
                            <th>Applied On</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- Leave Data Goes Here -->
                          <?php
                          include 'layouts/config.php';
                          // Fetch leave records with pending status
                          $sql = "SELECT * FROM leave_tbl WHERE status = 2";
                          $result = $link->query($sql);

                          // Check if there are any leave records
                          if ($result->num_rows > 0) {
                            $rowNumber = 1;

                            while ($row = $result->fetch_assoc()) {
                              echo '<tr>';
                              echo '<td>' . $rowNumber . '</td>';
                              echo '<td>' . $row['emp_id'] . '</td>';
                              // Add other fields accordingly
                              echo '<td>' . $row['leave_reason'] . '</td>';
                              echo '<td>' . $row['leave_from'] . '</td>';
                              echo '<td>' . $row['leave_to'] . '</td>';
                              echo '<td>' . $row['description'] . '</td>';
                              echo '<td>' . $row['applied_on'] . '</td>';
                              echo '<td>
                                        <form action="" method="post">
                                          <input type="hidden" name="leave_id" value="' . $row['id'] . '">
                                          <button type="submit" name="approve" class="btn btn-success">Approve</button>
                                          <button type="submit" name="reject" class="btn btn-danger">Reject</button>
                                        </form>
                                    </td>';
                              echo '</tr>';

                              $rowNumber++;
                            }
                          } else {
                            echo '<tr class="odd">
                                    <td valign="top" colspan="10">No pending leave requests found.</td>
                                  </tr>';
                          }
                          // Handle approval and rejection actions
                          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            if (isset($_POST['approve'])) {
                              // Update status to 1 (approved) in the database
                              $leaveId = $_POST['leave_id'];
                              $updateSql = "UPDATE leave_tbl SET status = 1 WHERE id = $leaveId";
                              if ($link->query($updateSql) === TRUE) {
                                echo "updated";
                              } else {
                                echo "Error updating record: " . $link->error;
                              }
                            }

                            if (isset($_POST['reject'])) {
                              // Update status to 0 (rejected) in the database
                              $leaveId = $_POST['leave_id'];
                              $updateSql = "UPDATE leave_tbl SET status = 0 WHERE id = $leaveId";
                              if ($link->query($updateSql) === TRUE) {

                                echo "updated";
                              } else {
                                echo "Error updating record: " . $link->error;
                              }
                            }
                          }

                          // Close database connection
                          $link->close();
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


      </div>
      <?php include 'layouts/footer.php'; ?>4
      <!-- Right Sidebar -->
      <?php include 'layouts/right-sidebar.php'; ?>
      <!-- /Right-bar -->

      <!-- JAVASCRIPT -->
      <?php include 'layouts/vendor-scripts.php'; ?>

      <!-- apexcharts -->
      <script src="http://localhost/EMS-CI/assets/libs/apexcharts/apexcharts.min.js"></script>

      <!-- App js -->
      <script src="assets/js/app.js"></script>



      </body>

      </html>