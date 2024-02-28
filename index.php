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
        
        <div class="row">
          <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0 font-size-18">
                <?php
                switch ($_SESSION['role']) {
                  case 1:
                    echo "";
                    break;
                  case 2:
                    echo "hr";
                    break;
                  case 3:
                    echo "pm";
                    break;
                  case 4:
                    echo "emp";
                    break;
                }
                ?>
              </h4>
              
         
<div class="container">
    <div class="row">
        <div class="col-md-4 col-xl-3">
           <div class="card bg-c-blue order-card">
            
               <div class="card-block">
                    
                    <h5 class="m-b-20">Total Numbers of Employees</h5>
                    <h2 class="text-right"> <i data-feather="users" class="icon-big"></i><span>486</span></h2>
                  
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h5 class="m-b-20">Total Number of Department</h5>
                    <h2 class="text-right"> <i data-feather="user-plus" class="icon-big"></i></i><span>486</span></h2>
                   
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h5 class="m-b-20">Total Employees Present Today</h5>
                    <h2 class="text-right">
                   <i data-feather="calendar" class="icon-big"></i><span>486</span></h2>
                
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h5 class="m-b-20">Total Amount of Salary Given</h5>
                    <h2 class="text-right"><i class='fas fa-wallet' style='font-size:30px'></i> <span>486</span></h2>
                 
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