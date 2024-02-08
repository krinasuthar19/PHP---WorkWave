<?php
session_start(); // Start session to get user role
if ($_SESSION['role'] != 1) {
    // Redirect user to another page or show access denied message
    header("Location: auth-login.php");
    exit(); // Stop further execution
}
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
                <!-- end page title -->
                <!-- Content Header -->
                <!-- Main Content -->
                <section class="content">
                    
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="departmentDropdown" class="form-label">Select Department:</label>
                        <select class="form-select" id="departmentDropdown" name="departmentDropdown">
                            <!-- Replace the options with actual employee data -->
                            <?php
                            include 'layouts/config.php';

                            //Assuming you have a connection to your database
                            $sql = "SELECT d_name FROM department";
                            $result = $link->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $depName = $row['d_name'];
                                    echo "<option value=\"$depName\">$depName</option>";
                                }
                            } else {
                                echo "<option value=\"\">No roles found</option>";
                            }
                            $link->close();

                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="employeeDropdown" class="form-label">Select Employee:</label>
                        <select class="form-select" id="employeeDropdown" name="Employee">
                            <!-- Replace the options with actual employee data -->
                            <?php
                            include 'layouts/config.php';


                            $sql = "SELECT username,u_id FROM users";
                            $result = $link->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $username = $row['username'];
                                    $u_id = $row['u_id'];
                                    echo "<option value=\"$username\">$username</option>";
                                }
                            } else {
                                echo "<option value=\"\">No roles found</option>";
                            }

                            ?>
                        </select>
                    </div>
                </div>
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
                                                    <th>SR</th>
                                                    <th>UserID</th>
                                                    <th>UserName</th>
                                                    <th>Salary</th>
                                                    <th>deduction</th>
                                                    <th>final salary</th>
                                                    <th>HR status</th>
                                                    <th>Admin status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

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
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 3.4.13
                </div>
                <strong>© 2024</strong> Employee Management System in CodeIgniter Framework
            </footer>
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