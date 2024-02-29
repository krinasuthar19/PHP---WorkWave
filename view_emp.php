<?php
include 'layouts/session.php';
include 'layouts/head-main.php';

// Assuming you have a database connection
include "layouts/config.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data from the database
$sql = "SELECT username, u_id, profile FROM users";
$result = $conn->query($sql);
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
                                                <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-xl rounded-circle img-thumbnail">
                                            </div>
                                            <h5 class="font-size-16 mb-1"><a href="#" class="text-body">' . $row['username'] . '</a></h5>
                                            <p class="text-muted mb-2">' . $row['profile'] . '</p>
                                            <a href="profile.php?id=' . $row['u_id'] . '">
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

                    $conn->close();
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
