<!DOCTYPE html>
<html lang="en">

<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["Dashboard"]; ?> | Minia - Admin & Dashboard Template</title>

    <?php include 'layouts/head.php'; ?>

    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <?php include 'layouts/head-style.php'; ?>
    <style>
        /* Additional CSS styles for improved UI */

        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .profile-section {
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            margin: 20px;
            border-radius: 10px;
            overflow: hidden;
        }

        .details-box {
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            margin: 20px;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #ddd; /* Added border styling */
            border-color: #333;
        }

        .details-box img {
            max-width: 100%;
            border-radius: 50%;
            margin-bottom: 20px;
            width: 100px;
            height: 100px;
            object-fit: cover;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border-color: #333;
        }

        .details-box h5 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
            text-align: center;
        }

        .details-box p {
            margin: 0 0 15px;
            font-size: 18px;
            color: #555;
        }

        .details-box strong {
            color: #333;
        }
    </style>
</head>

<?php include 'layouts/body.php'; ?>

<div id="layout-wrapper">
    <?php include 'layouts/menu.php'; ?>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Employee Profile Section -->
                <div class="profile-section">
                    <div class="details-box">
                        <img src="employee_image.jpg" alt="Employee Image">
                        <h5 class="mb-3">John Doe</h5>
                        <p><strong>Employee ID:</strong> EMP123</p>
                        <p><strong>Email:</strong> john.doe@example.com</p>
                        <p><strong>Phone Number:</strong> +1234567890</p>
                        <p><strong>Address:</strong> 123 Main St, Cityville, Stateville, 12345, Countryville</p>
                        <p><strong>Gender:</strong> Male</p>
                        <p><strong>Date of Joining:</strong> 2022-01-01</p>
                        <p><strong>Department:</strong> IT</p>
                        <p><strong>Role:</strong> Developer</p>
                    </div>
                </div>

                <!-- Employee Progress Section -->
                <div class="details-box">
                    <h5 class="mb-3">Progress Overview</h5>
                    <!-- Display employee progress using charts, tables, etc. -->
                    <div id="progressChart"></div>
                    <p><strong>Completed Tasks:</strong> 75</p>
                    <p><strong>Total Tasks:</strong> 100</p>
                    <!-- Add more progress information as needed -->
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

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Additional scripts for employee progress -->
<script>
    // Use JavaScript to generate progress charts or display progress information
    // Example: Initialize ApexCharts for progress chart
    var options = {
        // Add options for the progress chart
    };

    var chart = new ApexCharts(document.getElementById('progressChart'), options);
    chart.render();
</script>

</body>

</html>
