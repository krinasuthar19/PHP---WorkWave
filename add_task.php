<?php
session_start();
require "layouts/check_admin.php";
?>
<?php include 'layouts/head-main.php'; ?>
<?php
include 'layouts/config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $desc = $_POST['description'];
  $department = $_POST['department'];
  $startDate = $_POST['startDate'];
  $endDate = $_POST['endDate'];
  $status = 0;
  if (empty($title) || empty($desc) || empty($department) || empty($startDate) || empty($endDate)) {
    // echo "<script>openModal()</script>";
    echo "Please fill in all fields";
  } else {
    $startDate = date('Y-m-d', strtotime($startDate)); // Format the date
    $endDate = date('Y-m-d', strtotime($endDate)); // Format the date
    // Check if end date is before start date
    if ($endDate < $startDate) {
      // echo "<script>openModal()</script>";
      echo "End date cannot be before the start date.";
    } else {
      // Check if start date is before today's date
      $today = date('Y-m-d');
      if ($startDate < $today) {
        // echo "<script>openModal()</script>";
        echo "Start date cannot be before today's date.";
      } else {
        // Check if year is greater than 3000
        if (date('Y', strtotime($startDate)) > 3000 || date('Y', strtotime($endDate)) > 3000) {
          // echo "<script>openModal()</script>";
          echo "Select an appropriate year. Year should not exceed 3000.";
        } else {
          // Insert data into the database
          $sql = "INSERT INTO task (t_title, t_description, department, start_date, end_date, status) 
                            VALUES ('$title','$desc','$department','$startDate','$endDate', '$status')";
          if ($link->query($sql) === TRUE) {
            echo "Record inserted successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $link->error;
          }
        }
      }
    }
  }
}
$link->close();
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

    /* modal styling */
    /* .modal {
    top: 0;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.1);
    text-align: center;
    color: #333;
    position: absolute;
    width: 400px;
    background-color: #fff;
    border-radius: 8px;
    padding: 28px 28px;
    visibility: visible;
    transition: transform 0.4s, top 0.4s;
    z-index: 1000000000000;
  } */

    /* .open-modal {
    visibility: visible;
    top: 25%;
    transform: translate(-50%, -50%) scale(1);
  } */

    /* Modal Close Button */
    /* .modal-close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    cursor: pointer;
    color: #555;
  } */

    /* Modal Title */
    /* .modal-title {
    font-size: 24px;
    margin-bottom: 15px;
    color: #4549a2;
  } */

    /* Modal Body */
    /* .modal-body {
    margin-bottom: 20px;
    color: #666;
  } */

    /* Modal Button Container */
    /* .modal-buttons {
    display: flex;
    justify-content: center;
  } */

    /* Modal Cancel Button */
    /* .modal-cancel-btn,
  .modal-confirm-btn {
    padding: 10px 20px;
    margin: 0 10px;
    background-color: #4549a2;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
    font-size: 16px;
  } */

    /* .modal-cancel-btn:hover,
  .modal-confirm-btn:hover {
    background-color: #363a7e;
  } */
  </style>
</head>
<?php include 'layouts/body.php'; ?>
<div id="layout-wrapper">
  <?php include 'layouts/menu.php'; ?>
  <div class="main-content">

    <!-- Modal -->
    <!-- <div class="modal" id="modal">
      <span class="modal-close" onclick="closeModal()">&times;</span>
      <h2 class="modal-title">Validation Error</h2>
      <div id="modalBody" class="modal-body">
        <p id="validationMessage">Error message goes here</p>
      </div>
      <div class="modal-footer">
        <div class="modal-buttons">
          <button id="cancelBtn" class="modal-cancel-btn" onclick="closeModal()">
            Cancel
          </button>
        </div>
      </div>
    </div> -->

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
                <form action="" method="POST" enctype="multipart/form-data" is="taskForm">
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
                  reader.onload = function (e) {
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
<script src="assets/js/pages/dashboard.init.js"></script>
<script src="assets/js/app.js"></script>
<script>
  function validateDates() {
    var startDate = new Date(document.getElementById('startDate').value);
    var endDate = new Date(document.getElementById('endDate').value);
    var today = new Date();
    var errorMessage = "";
    if (!startDate || !endDate) {
      errorMessage += "Please select both start and end dates. ";
    } else if (startDate < today) {
      errorMessage += "Start date cannot be before today's date. ";
    }
    if (endDate < startDate) {
      errorMessage += "End date cannot be before the start date. ";
    }
    if (startDate.getFullYear() > 3000 || endDate.getFullYear() > 3000) {
      errorMessage += "Select appropriate year. Year should not exceed 3000. ";
    }
    return errorMessage;
  }

  function displayError(message) {
    var errorElement = document.getElementById('error-message');
    errorElement.innerText = message;
  }

  function onStartDateSelected() {
    var errorMessage = validateDates();
    displayError(errorMessage);
  }

  function onEndDateSelected() {
    var errorMessage = validateDates();
    displayError(errorMessage);
  }
  document.getElementById('startDate').addEventListener('change', onStartDateSelected);
  document.getElementById('endDate').addEventListener('change', onEndDateSelected);

  function onSubmit() {
    event.preventDefault();
    var errorMessage = validateDates();
    displayError(errorMessage);
    if (!errorMessage) {
      document.getElementById('taskForm').submit();
    }
  }
  document.getElementById('taskForm').addEventListener('submit', onSubmit);


  // modal
  // let modal = document.getElementById("modal");

  // function openModal() {
  //   modal.classList.add("open-modal");
  // }

  // function closeModal() {
  //   modal.classList.remove("open-modal");
  // }
</script>
</body>

</html>