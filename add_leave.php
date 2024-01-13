<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["Dashboard"]; ?> | Add Leave</title>

    <?php include 'layouts/head.php'; ?>
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
                            <h4 class="mb-sm-0 font-size-18">Add Leave</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">WorkWave</a></li>
                                    <li class="breadcrumb-item active">Add Leave</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <!-- Add the content and functionality of the "Add Leave" page here -->
                <div class="content-wrapper" style="min-height: 637.2px;">
                    <!-- Content Header -->

                    <!-- Main Content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box box-info">
                                    <div class="box-header">
                                        <h3 class="box-title">Leave Details</h3>
                                    </div>
                                    <div class="box-body">
                                        <form action="process_leave.php" method="post" >
                                            <!-- Add leave form fields here -->
                                            <!-- Example: -->
                                            <div class="form-group">
                                                <label for="leave_reason">Leave Reason</label>
                                                <input type="text" class="form-control" id="leave_reason" name="leave_reason" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="leave_from">Leave From</label>
                                                <input type="date" class="form-control" id="leave_from" name="leave_from" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="leave_to">Leave To</label>
                                                <input type="date" class="form-control" id="leave_to" name="leave_to" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
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

<!-- dashboard init -->
<script src="http://localhost/EMS-CI/assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="http://localhost/EMS-CI/assets/js/app.js"></script>

</body>

</html>


