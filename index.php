<?php
session_start();
// require "layouts/session_check.php";
if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)) {
  header("location: auth-login.php");
}
include 'layouts/head-main.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title><?php echo $language["Dashboard"]; ?> | Minia - Admin & Dashboard Template</title>
  <?php include 'layouts/head.php'; ?>
  <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
  <?php include 'layouts/head-style.php'; ?>
  <style>
    .icon-big {
      width: 75;
      height: 75;
    }

    .card-title {
      color: #5156be;
      font-size: 1.5rem;
    }
  </style>
</head>

<body>
  <!-- Begin page -->
  <div id="layout-wrapper">
    <header id="page-topbar">
      <div class="navbar-header">
        <div class="d-flex">
          <!-- LOGO -->
          <div class="navbar-brand-box">
            <a href="index.php" class="logo logo-dark">
              <span class="logo-sm">
                <img src="assets/images/logo.png" alt="" height="26">
              </span>
              <span class="logo-lg">
                <img src="assets/images/wwlogo.jpeg" alt="" height="26"> <span class="logo-txt">Work Wave</span>
              </span>
            </a>

            <a href="index.php" class="logo logo-light">
              <span class="logo-sm">
                <img src="assets/images/logo-sm.svg" alt="" height="26">
              </span>
              <span class="logo-lg">
                <img src="assets/images/wwlogo.jpeg" alt="" height="26"> <span class="logo-txt">Work Wave</span>
              </span>
            </a>
          </div>
        </div>

        <div class="d-flex">
          <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item bg-light-subtle border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
              <span class="d-none d-xl-inline-block ms-1 fw-medium"><?php echo $language["Shawn_L"]; ?>.</span>
              <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item" href="logout.php"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> <?php echo $language["Logout"]; ?></a>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- ========== Left Sidebar Start ========== -->
    <!-- No sidebar included here -->
    <!-- Left Sidebar End -->

    <div class="main-content">
      <div class="page-content">
        <div class="container-fluid">
          <!-- start page title -->
          <?php
          $user_role = $_SESSION['role'];
          if ($user_role == 1) {
            include "layouts/index-admin.php";
          } elseif ($user_role == 2) {
            include "layouts/index-hr.php";
          } elseif ($user_role == 3) {
            include "layouts/index-pm.php";
          } else {
            include "layouts/index-emp.php";
          }
          ?>
          <!-- end page title -->
        </div>
        <!-- container-fluid -->
      </div>
      <!-- End Page-content -->
    </div>
    <!-- end main content-->
  </div>
  <!-- END layout-wrapper -->

  <!-- Right Sidebar -->
  <?php include 'layouts/right-sidebar.php'; ?>
  <!-- /Right-bar -->

  <!-- JAVASCRIPT -->
  <script>
    // Get all SVG elements with data-feather attribute
    var svgElements = document.querySelectorAll('.icon-big');

    // Loop through each SVG element and modify width and height
    svgElements.forEach(function(svgElement) {
      svgElement.setAttribute('width', '100'); // Set width to 100 pixels
      svgElement.setAttribute('height', '100'); // Set height to 100 pixels
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