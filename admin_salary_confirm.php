<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["Dashboard"]; ?> | Minia - Admin & Dashboard Template</title>

    <?php include 'layouts/head.php'; ?>

    <!-- FullCalendar CSS -
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />

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
                            <h4 class="mb-sm-0 font-size-18">Admin salary confirm</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">WorkWave</a></li>
                                    <li class="breadcrumb-item active">HR salary< confirm</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <!-- Employee Dropdown -->
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
                            $link->close();


                            ?>
                        </select>
                    </div>
                </div>
             </div>
             <!-- main content -->
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
                                                    <th>SR</th>
                                                    <th>UserID</th>
                                                    <th>UserName</th>
                                                    <th>Salary</th>
                                                    <th>deduction</th>
                                                    <th>final salary</th>
                                                    <th>HR status</th>
                                                    <th>Admin status</th>
                                                    <th>Action</th>
                                                    echo '<td>';
                                                        if ($status == 0) {
                                                            // Status is Pending
                                                            echo '<a href="assign_task.php?task_id=' . $row['t_id'] . '" class="btn btn-primary">confirm</a>';
                                                        }
                                                </tr>
                                            </thead>
                                            <tbody>
                                           
                                            
                                               