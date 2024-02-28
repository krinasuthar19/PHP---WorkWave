<?php
session_start();
require "layouts/check_admin.php";
include 'layouts/head-main.php';
?>

<head>
  <title>Add Employee</title>
  <?php include 'layouts/head.php'; ?>
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
              <h4 class="mb-sm-0 font-size-18">Add Employee</h4>
              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                <!--<li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>-->
                  <li class="breadcrumb-item"><a href="javascript:void(0);">Add Employee</a></li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="form-content">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <form action="process_add_emp.php" method="POST" enctype="multipart/form-data" id="employeeForm">
                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <label for="FirstName">First Name</label>
                      <input type="text" class="form-control" id="FirstName" name="FirstName" autocomplete="off"
                        required>
                      <span id="firstNameError" style="color: red;"></span>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="LastName">Last Name</label>
                      <input type="text" class="form-control" id="LastName" name="LastName" autocomplete="off" required>
                      <span id="lastNameError" style="color: red;"></span>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="Email">Email</label>
                      <input type="email" class="form-control" id="Email" name="Email" autocomplete="off"
                        pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
                      <span id="emailError" style="color: red;"></span>
                      <!-- Add this span element for displaying email error -->

                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="MobileNumber">Mobile Number</label>
                      <input type="tel" class="form-control" id="MobileNumber" name="MobileNumber" autocomplete="off"
                        pattern="[0-9]{10}" required title="Please enter a 10-digit number">
                    </div>
                  </div>
                  <div class="row">

                    <!-- dob code start -->
                    <div class="col-md-3 mb-3">
                      <label for="DateOfBirth">Date of Birth</label>
                      <input type="text" class="form-control" id="DateOfBirth" name="DateOfBirth" autocomplete="off"
                        required>
                      <span id="ageError" style="color: red;"></span>
                    </div>
                    <!-- dob code end -->

                    <div class="col-md-3 mb-3">
                      <label for="Gender">Gender</label>
                      <select class="form-control" id="Gender" name="Gender">
                        <option value="select" disabled selected hidden>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="Address">Address</label>
                      <input type="text" class="form-control" id="Address" name="Address" autocomplete="off" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="City">City</label>
                      <input type="text" class="form-control" id="City" name="City" autocomplete="off" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <label for="State">State</label>
                      <input type="text" class="form-control" id="State" name="State" autocomplete="off" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="Pincode">Pincode</label>
                      <input type="text" class="form-control" id="Pincode" name="Pincode" autocomplete="off"
                        pattern="[0-9]{6}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="Country">Country</label>
                      <input type="text" class="form-control" id="Country" name="Country" autocomplete="off" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="Role">Role</label>
                      <select class="form-control" id="Role" name="Role">
                        <option value="0" disabled selected hidden>Select Role</option>
                        <?php
                        include 'layouts/config.php';
                        $sql = "SELECT r_name FROM role";
                        $result = $link->query($sql);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            $roleName = $row['r_name'];
                            echo "<option value=\"$roleName\">$roleName</option>";
                          }
                        } else {
                          echo "<option value=\"\">No roles found</option>";
                        }
                        $link->close();
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <label for="Department">Department</label>
                      <select class="form-control" id="Department" name="Department">
                        <option value="0" disabled selected hidden>Select Department</option>
                        <?php
                        include 'layouts/config.php';
                        $sql = "SELECT d_name FROM department";
                        $result = $link->query($sql);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            $depName = $row['d_name'];
                            echo "<option value=\"$depName\">$depName</option>";
                          }
                        } else {
                          echo "<option value=\"\">No roles found</option>";
                        }
                        $link->close();
                        ?>
                      </select>
                    </div>

                    <!-- doj code start -->
                    <div class="col-md-3 mb-3">
                      <label for="DateOfJoining">Date of Joining</label>
                      <input type="text" class="form-control" id="DateOfJoining" name="DateOfJoining" required>
                    </div>
                    <!-- doj code start -->

                    <div class="col-md-3 mb-3">
                      <label for="Salary">Salary</label>
                      <input type="text" class="form-control" id="Salary" name="Salary" autocomplete="off" required>
                    </div>
                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <div>
                          <br>
                          <label for="imageInput" class="btn btn-primary form-control" id="button2"
                            style="margin-top: 8px;">Select Image</label>
                          <input type="file" id="imageInput" name="imageInput" style="display:none;"
                            onchange="displayProfileImage()">
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <br>
                        <button type="submit" class="btn btn-primary form-control" id="button1"
                          style="margin-top: 8px;">Add Employee</button>
                      </div>
                    </div>
                    <div class="row">
                    </div>
                  </div>
                </form>
                <div class="col-md-3 mb-3">
                  <div class="image-container" id="displayContainer">
                    <img id="displayImage" alt="profile Image" src="profile_images/user_default_img.jpg">
                  </div>
                </div>
              </div>
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
<script src="assets/js/app.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {

  //! ----------START-firstname and lastname validator-START---------- 
  document.getElementById('FirstName').addEventListener('input', function() {
    var firstName = this.value.trim();
    var errorSpan = document.getElementById('firstNameError');
    errorSpan.textContent = (/[^a-zA-Z]/.test(firstName)) ? 'First name should contain only letters.' : '';
  });

  document.getElementById('LastName').addEventListener('input', function() {
    var lastName = this.value.trim();
    var errorSpan = document.getElementById('lastNameError');
    errorSpan.textContent = (/[^a-zA-Z]/.test(lastName)) ? 'Last name should contain only letters.' : '';
  });

  const form = document.getElementById('employeeForm');
  form.addEventListener('submit', function(event) {
    const firstName = document.getElementById('FirstName').value;
    const lastName = document.getElementById('LastName').value;
    const lettersOnly = /^[a-zA-Z]+$/;

    if (!firstName.match(lettersOnly)) {
      alert('First name should contain only letters.');
      event.preventDefault();
    }

    if (!lastName.match(lettersOnly)) {
      alert('Last name should contain only letters.');
      event.preventDefault();
    }
  });
  //! ----------END-firstname and lastname validator-END---------- 

});
</script>

<script>
function displayProfileImage() {
  var input = document.getElementById('imageInput');
  var container = document.getElementById('displayContainer');
  var image = document.getElementById('displayImage');
  var file = input.files[0];
  if (file) {
    var reader = new FileReader();
    reader.onload = function(e) {
      image.src = e.target.result;
      image.style.objectFit = 'cover';
      image.style.width = '100%';
      image.style.height = '100%';
      container.style.display = 'block';
    };
    reader.readAsDataURL(file);
  } else {
    image.src = 'profile_images/user_default_img.jpg';
    image.style.objectFit = 'cover';
    image.style.width = '100%';
    image.style.height = '100%';
    container.style.display = 'block';
  }
}
</script>
<div>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var currentDate = new Date();

    flatpickr("#DateOfBirth", {
      dateFormat: "d-m-Y",
      changeMonth: true,
      changeYear: true,
      yearRange: "-100:+0",
      maxDate: new Date(currentDate.getFullYear() - 19, currentDate.getMonth(), currentDate.getDate()),

      onChange: function(selectedDates, dateStr, instance) {
        var selectedDate = selectedDates[0];
        if (!selectedDate) {
          // Handle invalid date
          console.log("Invalid Date");
          return;
        }
        var age = Math.floor((currentDate - selectedDate) / (365 * 24 * 60 * 60 * 1000));
        if (age < 18) {
          $("#ageError").text("Age must be at least 18.");
          instance.clear();
        } else if (age < 19) {
          $("#ageError").text("Age must be at least 19.");
          instance.clear();
        } else {
          $("#ageError").text("");
        }
      }
    });
  });
  </script>
</div>

<!-- Add this <div> containing the script for the Date of Joining date picker -->
<div>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var today = new Date();
    var maxDate = new Date(today.getFullYear(), today.getMonth() + 2, 0);

    flatpickr("#DateOfJoining", {
      dateFormat: "d-m-Y",
      maxDate: maxDate, // Date of joining cannot be in the future
    });
  });
  </script>
</div>
</body>

</html>