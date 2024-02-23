<?php
session_start();
require "layouts/check_admin.php";
include 'layouts/head-main.php';
include 'layouts/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstName = $_POST['FirstName'];
  $lastName = $_POST['LastName'];
  $username = $firstName . ' ' . $lastName;
  $email = $_POST['Email'];
  $mobileNumber = $_POST['MobileNumber'];
  $dateOfBirth = $_POST['DateOfBirth'];
  $gender = $_POST['Gender'];
  $address = $_POST['Address'];
  $city = $_POST['City'];
  $state = $_POST['State'];
  $pincode = $_POST['Pincode'];
  $country = $_POST['Country'];
  $salary = $_POST['Salary'];

  $pass = strtolower($firstName . $lastName . substr((string) $mobileNumber, -4));
  $password = $pass;

  $role = $_POST['Role'];
  $sql = "SELECT r_id FROM role WHERE r_name = '$role'";
  $result = $link->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $roleId = $row['r_id'];
  }

  $department = $_POST['Department'];
  $sql = "SELECT d_id FROM department WHERE d_name = '$department'";
  $result = $link->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $depId = $row['d_id'];
  }

  $image = $_FILES['imageInput'];
  if ($image['size'] > 0) {
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
    if (in_array(strtolower($extension), $allowedExtensions)) {
      $imageName = uniqid('img_') . '.' . $extension;
      $imagePath = 'profile_images/' . $imageName;
      move_uploaded_file($image['tmp_name'], $imagePath);
    }
  } else {
    $imagePath = 'profile_images/user_default_img.jpg';
  }

  $query = "SELECT email FROM users where email='$email'";
  $result = mysqli_query($link, $query);
  if ($result) {
    $rowCount = mysqli_num_rows($result);
    if ($rowCount != 0) {
      echo "<script>alert('user already exist')</script>";
    } else {
      $sql = "INSERT INTO users (username, firstname, lastname, email, phone, dob, gender, address, city, state, pincode, country, role, d_id, password, date_of_joining, profile_image) 
              VALUES ('$username','$firstName', '$lastName', '$email', '$mobileNumber', '$dateOfBirth', '$gender', '$address', '$city', '$state', '$pincode', '$country', $roleId, $depId, '$password', '$dateOfJoining', '$imagePath')";
    }
  }
  if ($link->query($sql) === TRUE) {
    // echo "Record inserted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $link->error;
  }
}
$link->close();
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
                <form action="" method="POST" enctype="multipart/form-data" id="employeeForm">
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
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="MobileNumber">Mobile Number</label>
                      <input type="tel" class="form-control" id="MobileNumber" name="MobileNumber" autocomplete="off"
                        pattern="[0-9]{10}" required title="Please enter a 10-digit number">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <label for="DateOfBirth">Date of Birth</label>
                      <input type="date" class="form-control" id="DateOfBirth" name="DateOfBirth" required>
                      <span id="ageError" style="color: red;"></span>
                      <span id="dobError" style="color: red;"></span>
                    </div>
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
                    <div class="col-md-3 mb-3">
                      <label for="DateOfJoining">Date of Joining</label>
                      <input type="date" class="form-control" id="DateOfJoining" name="DateOfJoining" required>
                    </div>
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
<script src="assets/js/app.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {

  // ----------START-firstname and lastname validator-START---------- 
  // dynamic error message displaying

  document.getElementById('FirstName').addEventListener('input', function() {
    var firstName = this.value.trim();
    var errorSpan = document.getElementById('firstNameError');
    if (/[^a-zA-Z]/.test(firstName)) {
      errorSpan.textContent = 'First name should contain only letters.';
    } else {
      errorSpan.textContent = '';
    }
  });

  // submit preventing(managing)
  document.getElementById('LastName').addEventListener('input', function() {
    var lastName = this.value.trim();
    var errorSpan = document.getElementById('lastNameError');
    if (/[^a-zA-Z]/.test(lastName)) {
      errorSpan.textContent = 'Last name should contain only letters.';
    } else {
      errorSpan.textContent = '';
    }
  });
  // Find the form by its ID
  const form = document.getElementById('employeeForm');
  // Attach an event listener to the form submission event
  form.addEventListener('submit', function(event) {
    // Get the values of the first name and last name fields
    const firstName = document.getElementById('FirstName').value;
    const lastName = document.getElementById('LastName').value;
    // Regular expression to match only letters (no numbers or special characters)
    const lettersOnly = /^[a-zA-Z]+$/;
    // Validation checks
    if (!firstName.match(lettersOnly)) {
      alert('First name should contain only letters.');
      event.preventDefault(); // Prevent form submission
    }

    if (!lastName.match(lettersOnly)) {
      alert('Last name should contain only letters.');
      event.preventDefault(); // Prevent form submission
    }
  });
  // ----------END-firstname and lastname validator-END---------- 

  // ----------START-Date of birth validator-START---------- 
  // dynamic error message displaying
  document.getElementById('DateOfBirth').addEventListener('change', function() {
    var dob = new Date(this.value); // Get the selected date of birth
    var today = new Date(); // Get today's date

    // Calculate the age based on the selected date of birth
    var age = today.getFullYear() - dob.getFullYear();
    var monthDiff = today.getMonth() - dob.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
      age--;
    }

    // Validate age (age should be at least 19)
    var ageErrorSpan = document.getElementById('ageError');
    if (age < 19) {
      ageErrorSpan.textContent = 'Employee must be at least 19 years old. ';
    } else {
      ageErrorSpan.textContent = '';
    }

    // Validate date of birth (should not be in the future or too far in the past)
    var maxDate = new Date();
    maxDate.setFullYear(maxDate.getFullYear() - 19); // Maximum date of birth (19 years ago)
    var dobErrorSpan = document.getElementById('dobError');
    if (dob > today || dob >= maxDate) {
      dobErrorSpan.textContent = 'Please enter a valid date of birth. ';
    } else {
      dobErrorSpan.textContent = '';
    }
  });

  // submit preventing(managing)
  document.getElementById('employeeForm').addEventListener('submit', function(event) {
    var dob = new Date(document.getElementById('DateOfBirth').value);
    var today = new Date();
    var age = today.getFullYear() - dob.getFullYear();
    var monthDiff = today.getMonth() - dob.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
      age--;
    }

    // Validation for age (age should be at least 19)
    if (age < 19) {
      alert('Employee must be at least 19 years old. ');
      event.preventDefault(); // Prevent form submission
      return;
    }

    // Validation for date of birth (should not be in the future or too far in the past)
    var maxDate = new Date();
    maxDate.setFullYear(maxDate.getFullYear() - 19);
    if (dob > today || dob >= maxDate) {
      alert('Please enter a valid date of birth. ');
      event.preventDefault(); // Prevent form submission
      return;
    }
  });
  // ----------END-Date of birth validator-END---------- 
});

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
</body>

</html>