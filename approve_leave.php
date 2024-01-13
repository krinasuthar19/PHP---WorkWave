<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title><?php echo $language["Dashboard"]; ?> | Employee Management System</title>

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
                            <h4 class="mb-sm-0 font-size-18">Approv Leave</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">WorkWave</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->  

                <!-- Add the content and functionality of the "Approve Leave" page here -->
                <div class="content-wrapper" style="min-height: 637.2px;">
    <!-- Content Header -->

    <!-- Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <!-- DataTable -->
                <table id="example1" class="table table-bordered table-striped dataTable no-footer">
                  <thead>
                    <tr role="row">
                      <!-- Table Headers -->
                      <th>#</th>
                      <th>Staff</th>
                      <th>Photo</th>
                      <th>Department</th>
                      <th>Reason</th>
                      <th>From</th>
                      <th>To</th>
                      <th>Description</th>
                      <th>Applied On</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Leave Data Goes Here -->
                    <tr class="odd">
                      <td valign="top" colspan="10" class="dataTables_empty">No data available in the table</td>
                    </tr>
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



</body>

</html>
