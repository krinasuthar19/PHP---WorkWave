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
  // $password = password_hash($pass, PASSWORD_DEFAULT); // Hash the password for security

  $salary = $_POST['Salary'];
  $dateOfJoining = $_POST['DateOfJoining'];

  $role = $_POST['Role'];
  // Perform a query to retrieve the role_id for the specified user
  $sql = "SELECT r_id FROM role WHERE r_name = '$role'";
  $result = $link->query($sql);

  if ($result->num_rows > 0) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();
    // Store the role_id in a PHP variable
    $roleId = $row['r_id'];
    // Now $roleId contains the value of the role_id for the specified user
  } else {
    echo "User not found or r_id is not available.";
  }


  $department = $_POST['Department'];
  // Perform a query to retrieve the role_id for the specified user
  $sql = "SELECT d_id FROM department WHERE d_name = '$department'";
  $result = $link->query($sql);

  if ($result->num_rows > 0) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();
    // Store the d_id in a PHP variable
    $depId = $row['d_id'];
  } else {
    echo "User not found or d_id is not available.";
  }

  // Handle image upload
  $image = $_FILES['imageInput'];

  if ($image['size'] > 0) {
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $extension = pathinfo($image['name'], PATHINFO_EXTENSION);

    if (in_array(strtolower($extension), $allowedExtensions)) {
      $imageName = uniqid('img_') . '.' . $extension;
      $imagePath = 'profile_images/' . $imageName; // Adjust the folder path as needed

      move_uploaded_file($image['tmp_name'], $imagePath);
    } else {
      echo "Invalid image format. Allowed formats: jpg, jpeg, png, gif.";
      exit();
    }
  } else {
    // Handle the case where no image is uploaded
    $imagePath = 'profile_images/user_default_img.jpg'; // Set a default image path or leave it empty based on your requirements
  }

  $query = "SELECT email FROM users where email='$email'";
  $result = mysqli_query($link, $query);

  if ($result) {
    $rowCount = mysqli_num_rows($result);
    if ($rowCount != 0) {
      echo "<script>alert('user already exsist')</script>";
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

  <div class="main-content">

    <div class="page-content">
      <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
          <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0 font-size-18">Profile</h4>

              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
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
                <div class="col-md-3 mb-3">
                  <div class="image-container" id="displayContainer">
                    <img id="displayImage" alt="profile Image" src="profile_images/user_default_img.jpg">
                  </div>
                </div>

                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <label for="FirstName">First Name</label>
                      <input type="text" class="form-control" id="FirstName" name="FirstName" autocomplete="off" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="LastName">Last Name</label>
                      <input type="text" class="form-control" id="LastName" name="LastName" autocomplete="off" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="Email">Email</label>
                      <input type="email" class="form-control" id="Email" name="Email" autocomplete="off" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="MobileNumber">Mobile Number</label>
                      <input type="tel" class="form-control" id="MobileNumber" name="MobileNumber" autocomplete="off" pattern="[0-9]{10}" required title="Please enter a 10-digit number">
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-md-3 mb-3">
                      <label for="DateOfBirth">Date of Birth</label>
                      <input type="date" class="form-control" id="DateOfBirth" name="DateOfBirth" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="Gender">Gender</label>
                      <select class="form-control" id="Gender" name="Gender">
                        <option value="select" disabled selected hidden>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <!-- Add more options as needed -->
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
                      <input type="text" class="form-control" id="Pincode" name="Pincode" autocomplete="off" pattern="[0-9]{6}" required value=<?php echo $pincode; ?>>
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

                        // Assuming you have a connection to your database
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

                        // Assuming you have a connection to your database
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
                          <label for="imageInput" class="btn btn-primary form-control" id="button2" style="margin-top: 8px;">Select Image</label>
                          <input type="file" id="imageInput" name="imageInput" style="display:none;" onchange="displayProfileImage()">
                        </div>
                      </div>

                      <div class="col-md-3 mb-3">
                        <br>
                        <button type="submit" class="btn btn-primary form-control" id="button1" style="margin-top: 8px;">Add Employee</button>
                      </div>
                    </div>
                    <div class="row">

                    </div>
                </form>






              </div>


            </div>
            <!-- end form -->

          </div>
        </div> <!-- container-fluid -->
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

  <script src="assets/js/app.js"></script>
  <!-- App js -->
  <script src="assets/js/app.js"></script>
  <!-- Add this script at the end of your HTML, just before the closing </body> tag -->
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
          container.style.display = 'block'; // Show the image container
        };

        reader.readAsDataURL(file);
      } else {
        // If no file is selected, display the default image
        image.src =
          'profile_images/user_default_img.jpg'; // Replace with the actual path to your default image
        image.style.objectFit = 'cover';
        image.style.width = '100%';
        image.style.height = '100%';
        container.style.display = 'block'; // Show the image container
      }
    }
  </script>

  </body>

  </html>