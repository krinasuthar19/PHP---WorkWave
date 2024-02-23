<?php
session_start();
require "layouts/check_admin.php";
include 'layouts/head-main.php';
?>

<head>
  <title>
    <?php echo $language["Dashboard"]; ?> | Minia - Admin & Dashboard Template
  </title>
  <?php include 'layouts/head.php'; ?>
  <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
    type="text/css" />
  <?php include 'layouts/head-style.php'; ?>
  <style>
  .form-content {
    padding: 25px;
    border-radius: 15px;
    margin: 10px;
    box-shadow: 0 0 20px 15px rgba(0, 0, 0, 0.1);
  }

  table {
    border-collapse: collapse;
    margin-top: 20px;
    padding: 20px;
  }

  th {
    border-bottom: 2px solid #ddd;
  }

  #button1 {
    width: 100%;
    font-weight: bold;
  }

  #button2 {
    width: 100%;
    border-color: blue;
    background-color: white;
    color: blue;
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
<div id="layout-wrapper">
  <?php include 'layouts/menu.php'; ?>
  <div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0 font-size-18">Add Task</h4>
              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">WorkWave</a></li>
                  <li class="breadcrumb-item active">Assign Task</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="form-content">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <form action="process_add_task.php" method="POST" enctype="multipart/form-data" id="taskForm">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="Title">Title</label>
                      <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="Description">Description</label>
                      <input type="text" class="form-control" id="description" name="description">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label for="Department">Department</label>
                      <select class="form-control" id="department" name="department">
                        <option value="select" disabled selected hidden>Select Department</option>
                        <?php
                        include 'layouts/config.php';
                        $sql = "SELECT d_name,d_id FROM department";
                        $result = $link->query($sql);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            $depName = $row['d_name'];
                            $dep_id = $row['d_id'];
                            echo "<option value=\"$dep_id\">$depName</option>";
                          }
                        } else {
                          echo "<option value=\"\">No roles found</option>";
                        }
                        $link->close();
                        ?>
                      </select>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="startdate">Start Date</label>
                      <input type="date" class="form-control" id="startDate" name="startDate">
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="enddate">End Date</label>
                      <input type="date" class="form-control" id="endDate" name="endDate">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <br>
                      <button type="submit" class="btn btn-primary form-control" id="submit" name="submit"
                        style="margin-top: 8px;">Add Task
                    </div>
                  </div>
                  <div id="error-message" style="color: red;"></div>
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
                  container.style.display = 'block';
                };
                reader.readAsDataURL(file);
              }
            }
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php include 'layouts/footer.php'; ?>
</div>
<?php include 'layouts/right-sidebar.php'; ?>
<?php include 'layouts/vendor-scripts.php'; ?>
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
<!-- <script src="assets/js/pages/dashboard.init.js"></script> -->
<script src="assets/js/app.js"></script>
<script>
function validateDates() {
  var startDate = new Date(document.getElementById('startDate').value);
  var endDate = new Date(document.getElementById('endDate').value);
  var today = new Date();
  var errorMessage = '';

  if (startDate <= today) {
    errorMessage += "Start date must be after today's date. ";
  }
  if (startDate >= endDate) {
    errorMessage += "Start date must be before end date. ";
  }
  if (endDate <= startDate) {
    errorMessage += "End date must be after start date. ";
  }
  if (startDate.getFullYear() > 3000 || endDate.getFullYear() > 3000) {
    errorMessage += "Select an appropriate year. Year should not exceed 3000.";
  }

  var errorElement = document.getElementById('error-message');
  errorElement.textContent = errorMessage;
}

document.getElementById('startDate').addEventListener('change', validateDates);
document.getElementById('endDate').addEventListener('change', validateDates);

document.getElementById('taskForm').addEventListener('submit', function(event) {
  validateDates();
  var errorMessage = document.getElementById('error-message').textContent;
  if (errorMessage) {
    event.preventDefault();
    alert("Please correct the errors before submitting the form: \n" + errorMessage);
    return false; // Prevent form submission
  }
  return true; // Allow form submission
});
</script>
</body>

</html>