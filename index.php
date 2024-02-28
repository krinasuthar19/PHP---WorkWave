<?php
session_start();
// require "layouts/session_check.php";
if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)) {
  header("location: auth-login.php");
}
include 'layouts/head-main.php';
?>


<head>

  <title><?php echo $language["Dashboard"]; ?> | Minia - Admin & Dashboard Template</title>

  <?php include 'layouts/head.php'; ?>


  <!-- <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />-->


  <?php include 'layouts/head-style.php'; ?>



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
                <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">WorkWave</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

          <!-- Boxes -->
          <div class="row">
            <div class="col-md-3">
              <div class="card bg-c-blue order-card">
                <div class="card-body">
                  <h5 class="m-b-20">Total Numbers of Employees</h5>
                  <h2 class="text-right"><i data-feather="users" class="icon-big"></i><span class="numbers">486</span></h2>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card bg-c-green order-card">
                <div class="card-body">
                  <h5 class="m-b-20">Total Number of Department</h5>
                  <h2 class="text-right"><i data-feather="user-plus" class="icon-big"></i><span class="numbers">486</span></h2>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card bg-c-yellow order-card">
                <div class="card-body">
                  <h5 class="m-b-20">Total Employees Present Today</h5>
                  <h2 class="text-right"><i data-feather="calendar" class="icon-big"></i><span class="numbers">486</span></h2>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card bg-c-pink order-card">
                <div class="card-body">
                  <h5 class="m-b-20">Total Amount of Salary Given</h5>
                  <h2 class="text-right"><i class='fas fa-wallet' style='font-size:30px'></i><span class="numbers">486</span></h2>
                </div>
              </div>
            </div>
          </div>

          <!-- Charts -->
          <div class="row mt-4">
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="header-title">Total Salary Given This Month</h4>
                  <div id="chart1"></div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="header-title">Total Attendance Count This Month</h4>
                  <div id="chart2"></div>
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
  </div>
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

  <script>
    var options1 = {
      chart: {
        height: 350,
        type: 'line',
      },
      series: [{
        name: 'Salary',
        data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
      }],
      xaxis: {
        categories: ['01', '02', '03', '04', '05', '06', '07', '08', '09']
      }
    };

    var options2 = {
      chart: {
        height: 350,
        type: 'line',
      },
      series: [{
        name: 'Attendance',
        data: [23, 45, 56, 78, 99, 102, 143, 165, 178]
      }],
      xaxis: {
        categories: ['01', '02', '03', '04', '05', '06', '07', '08', '09']
      }
    };

    var chart1 = new ApexCharts(document.querySelector("#chart1"), options1);
    chart1.render();

    var chart2 = new ApexCharts(document.querySelector("#chart2"), options2);
    chart2.render();
  </script>

  <style>
    .numbers{
      margin-left: 15px;
    }
    .bg-c-blue {
      background-color: #007bff;
      color: #fff;
    }

    .bg-c-green {
      background-color: #28a100;
      color: #fff;
    }

    .bg-c-yellow {
      background-color: #ffc107;
      color: #fff;
    }

    .bg-c-pink {
      background-color: #e83e8c;
      color: #fff;
    }

    .order-card {
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 20px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      height: 80%;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .icon-big {
      font-size: 36px;
      margin-bottom: 10px;
    }

    .order-card h2 {
      margin-top: 10px;
    }
  </style>

  </body>

  </html>