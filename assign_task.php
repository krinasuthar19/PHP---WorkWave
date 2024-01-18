<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<?php
include 'layouts/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $department = $_POST['department'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    // $status = NULL;


    $sql = "INSERT INTO task (t_title, t_description, department, start_date, end_date) 
            VALUES ('$title','$desc','$department','$startDate','$endDate')";

    if ($link->query($sql) === TRUE) {
        // echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
}

$link->close();
?>



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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Assign Task</a></li>
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
                                <form action="" method="POST" enctype="multipart/form-data">



                                    <div class="employee-container">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label for="Department">Employee</label>
                                                <select class="form-control" id="department" name="department">
                                                    <option value="select" disabled selected hidden>Select Employee</option>
                                                    <?php
                                                    include 'layouts/config.php';

                                                    // Assuming you have a connection to your database
                                                    $sql = "SELECT username FROM users";
                                                    $result = $link->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            $uName = $row['username'];
                                                            echo "<option value=\"$uName\">$uName</option>";
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
                            <div class="col-md-4 mb-3">
                                <button type="button" class="btn btn-secondary" id="addEmployeeField">+</button>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <br>
                                    <button type="submit" class="btn btn-primary form-control" id="submit" name="submit" style="margin-top: 8px;">Assign Task
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                </form>






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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        $("#addEmployeeField").click(function() {
            // Clone the first employee selection field
            var clone = $(".employee-container .col-md-4:first").clone();

            // Clear selected options in the clone
            clone.find('option:selected').removeAttr('selected');

            // Append the cloned field to the container
            $(".employee-container").append(clone);
        });
    });
</script>
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