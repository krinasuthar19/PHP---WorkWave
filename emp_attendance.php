<!DOCTYPE html>
<html lang="en">

<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Employee Attendance | Your Company Name</title>

    <?php include 'layouts/head.php'; ?>
</head>

<?php include 'layouts/body.php'; ?>

<div id="layout-wrapper">
    <?php include 'layouts/menu.php'; ?>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Daily Attendance Form Section -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Daily Attendance</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Daily Attendance</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <form action="process_attendance.php" method="post">
                                    <div class="mb-3">
                                        <label for="employee_id" class="form-label">Employee ID</label>
                                        <input type="text" class="form-control" id="employee_id" name="employee_id" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="attendance_date" class="form-label">Attendance Date</label>
                                        <input type="date" class="form-control" id="attendance_date" name="attendance_date" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="in_time" class="form-label">In Time</label>
                                        <input type="time" class="form-control" id="in_time" name="in_time" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="out_time" class="form-label">Out Time</label>
                                        <input type="time" class="form-control" id="out_time" name="out_time" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="total_hours" class="form-label">Total Hours</label>
                                        <input type="text" class="form-control" id="total_hours" name="total_hours" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" id="status" name="status" required>
                                            <option value="Present">Present</option>
                                            <option value="Absent">Absent</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?php include 'layouts/right-sidebar.php'; ?>
<?php include 'layouts/vendor-scripts.php'; ?>

</body>

</html>
