<?php
include 'layouts/session.php';
include 'layouts/head-main.php';

// Assuming you have a database linkection
include 'layouts/config.php';

// Check linkection status
if ($link->connect_error) {
    die("linkection failed: " . $link->connect_error);
}

// Fetch user data from the database
$sql = "SELECT username, u_id, profile_image FROM users";
$result = $link->query($sql);

// Check if query execution was successful
if (!$result) {
    die("Query execution failed: " . $link->error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Grid | Minia - Admin & Dashboard Template</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<body>

<?php include 'layouts/body.php'; ?>

<div id="layout-wrapper">
    <?php include 'layouts/menu.php'; ?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="col-xl-3 col-sm-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div class="dropdown text-end">
                                                <a class="text-muted dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"></a>
                                            </div>
                                            <div class="mx-auto mb-4">
                                                <img src="' . $row['profile_image'] . '" alt="Profile Image" class="avatar-xl rounded-circle img-thumbnail">
                                            </div>
                                            <h5 class="font-size-16 mb-1"><a href="#" class="text-body">' . $row['username'] . '</a></h5>
                                            <p class="text-muted mb-2">' . $row['u_id'] . '</p>
                                            <a href="emp_profile.php?id=' . $row['u_id'] . '">
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-outline-light text-truncate"><i class="uil uil-user me-1"></i> Profile</button>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>';
                        }
                    } else {
                        echo "No records found";
                    }

                    $link->close();
                    ?>
                </div>
            </div>
        </div>

        <!-- Rest of your HTML content -->

        <?php include 'layouts/footer.php'; ?>
    </div>
</div>

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>
<script src="assets/js/app.js"></script>
</body>
</html>
