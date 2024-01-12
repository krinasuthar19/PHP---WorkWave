<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>
        <?php echo $language["Dashboard"]; ?> | Minia - Admin & Dashboard Template
    </title>

    <?php include 'layouts/head.php'; ?>

    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <?php include 'layouts/head-style.php'; ?>
    <style>
        .form-content {
            padding: 25px;
            /* Adjust padding as needed */
            border-radius: 15px;
            /* Increase border-radius for rounded corners */
            margin: 10px;
            /* Center the content horizontally */
            box-shadow: 0 0 20px 15px rgba(0, 0, 0, 0.1);
            /* Darker shadow */
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
            padding: 20px;
        }

        th {
            border-bottom: 2px solid #ddd;
            /* Add a bottom border to th and td elements */
        }

        #button1 {
            width: 100%;
            font-weight: bold;
        }

        #button2 {
            width: 100%;
            border-color: blue;
            /* Set border color to blue */
            background-color: white;
            color: blue;
            /* Set font color to blue */
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
                            <h4 class="mb-sm-0 font-size-18">Assign Task</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">WorkWave</a></li>
                                    <li class="breadcrumb-item active">Assign Task</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <!-- start form -->
                <div class="form-content">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="row">
                                <form>


                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="Title">Title</label>
                                            <input type="text" class="form-control" id="Title" name="Title">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="Description">Description</label>
                                            <input type="text" class="form-control" id="Description" name="Descriptipon">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="Department">Department</label>
                                            <select class="form-control" id="Department" name="Department">
                                                <option value="select" disabled selected hidden>Select Department
                                                </option>
                                                <option value="Department 1">Department 1</option>
                                                <option value="Department 2">Department 2</option>
                                                <option value="Department 3">Department 3</option>
                                                <option value="Department 4">Department 4</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="startdate">Start Date</label>

                                            <input type="date" class="form-control" id="Deadline" name="Deadline">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="enddate">End Date</label>

                                            <input type="date" class="form-control" id="Deadline" name="Deadline">
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                    <div class="col-md-4 mb-3">
                                            <br>
                                            <button type="submit" class="btn btn-primary form-control" id="button1" style="margin-top: 8px;">Add Task
                                        </div>
                                    </div>
















                                    </select>
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
                                        container.style.display = 'block'; // Show the image container
                                    };

                                    reader.readAsDataURL(file);
                                }
                            }
                        </script>

                    </div>


                </div>
                <!-- end form -->

            </div>
        </div> <!-- container-fluid -->
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

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Plugins js-->
<script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

<!-- dashboard init -->
<script src="assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>