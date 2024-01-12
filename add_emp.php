<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Starter Page | Minia - Admin & Dashboard Template</title>
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
                            <h4 class="mb-sm-0 font-size-18">Add Employee</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Add Employee</a></li>
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
                                <form>


                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="FirstName">First Name</label>
                                            <input type="text" class="form-control" id="FirstName" name="FirstName">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="LastName">Last Name</label>
                                            <input type="text" class="form-control" id="LastName" name="LastName">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="Email">Email</label>
                                            <input type="email" class="form-control" id="Email" name="Email">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="MobileNumber">Mobile Number</label>
                                            <input type="tel" class="form-control" id="MobileNumber" name="MobileNumber">
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-3 mb-3">
                                            <label for="DateOfBirth">Date of Birth</label>
                                            <input type="date" class="form-control" id="DateOfBirth" name="DateOfBirth">
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
                                            <input type="text" class="form-control" id="Address" name="Address">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="City">City</label>
                                            <select class="form-control" id="City" name="City">
                                                <option value="select" disabled selected hidden>Select City</option>
                                                <option value="city1">City 1</option>
                                                <option value="city2">City 2</option>
                                                <!-- Add more cities as needed -->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="State">State</label>
                                            <select class="form-control" id="State" name="State">
                                                <option value="select" disabled selected hidden>Select State</option>
                                                <option value="state1">State 1</option>
                                                <option value="state2">State 2</option>
                                                <!-- Add more states as needed -->
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="Pincode">Pincode</label>
                                            <input type="text" class="form-control" id="Pincode" name="Pincode">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="Country">Country</label>
                                            <select class="form-control" id="Country" name="Country">
                                                <option value="select" disabled selected hidden>Select Country</option>
                                                <option value="country1">Country 1</option>
                                                <option value="country2">Country 2</option>
                                                <!-- Add more countries as needed -->
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="Role">Role</label>
                                            <select class="form-control" id="Role" name="Role">
                                                <option value="select" disabled selected hidden>Select Role</option>
                                                <option value="employee">Employee</option>
                                                <option value="manager">Manager</option>
                                                <option value="admin">Admin</option>
                                                <!-- Add more roles as needed -->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-md-3 mb-3">
                                            <div>
                                                <br>
                                                <label for="imageInput" class="btn btn-primary form-control" id="button2" style="margin-top: 8px;">Select Image</label>
                                                <input type="file" id="imageInput" style="display: none;" onchange="displayImage()">
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="Salary">Salary</label>
                                            <input type="text" class="form-control" id="Salary" name="Salary">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="DateOfJoining">Date of Joining</label>
                                            <input type="date" class="form-control" id="DateOfJoining" name="DateOfJoining">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <br>
                                            <button type="submit" class="btn btn-primary form-control" id="button1" style="margin-top: 8px;">Add Employee</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                    </div>
                                </form>



                                <div class="col-md-3 mb-3">
                                    <div class="image-container" id="displayContainer">
                                        <img id="displayImage" alt="Your Image">
                                    </div>

                                </div>

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
                                                container.style.display = 'block'; // Show the image container
                                            };

                                            reader.readAsDataURL(file);
                                        }
                                    }
                                </script>

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

    </body>

    </html>