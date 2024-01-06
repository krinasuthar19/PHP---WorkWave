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
            width: 300px;
            height: 300px;
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
                            <h4 class="mb-sm-0 font-size-18">Add Product</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Add Product</a></li>
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
                                <div class="col-md-9">
                                    <form>
                                        <div class="row">

                                            <div class="col-md-4 mb-3">
                                                <label for="field1">SKU</label>
                                                <input type="text" class="form-control" id="field1" name="field1">
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="col-md-4 mb-3">
                                                <label for="field1">Product Name</label>
                                                <input type="text" class="form-control" id="ProductName"
                                                    name="ProductName">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="field2">Size</label>
                                                <input type="number" class="form-control" id="Size" name="SIze">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="field3">Category</label>
                                                <select class="form-control" id="SelectCategory" name="SelectCategory">
                                        <option value="select" disabled selected hidden>Select Category</option>
                                        <option value="option1">Option 1</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                                </div>
                                        </div>




                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label for="field1">Brand</label>
                                                <input type="text" class="form-control" id="Brand" name="Brand">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="field2">Buying Price</label>
                                                <input type="text" class="form-control" id="BuyingPrice"
                                                    name="BuyingPrice">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="field3">Selling Price</label>
                                                <input type="text" class="form-control" id="SellingPrice"
                                                    name="SellingPrice">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <br>
                                                <button type="submit" class="btn btn-primary form-control" id="button1"
                                                    style="margin-top: 8px;">Add Product</button>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                
                                            </div>
                                            <div class="col-md-4 mb-3">
                                            <div>
                                                    <br>
                                                    <label for="imageInput" class="btn btn-primary form-control" id="button2" style="margin-top: 8px;">Select Image</label>
                                                    <input type="file" id="imageInput" style="display: none;" onchange="displayImage()">    
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-3">
                                <div class="column">
                                            <div class="image-container" id="displayContainer">
                                                <img id="displayImage" alt="Your Image">
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