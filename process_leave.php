<?php
include 'layouts/session.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Include database connection file
    include 'layouts/config.php';

    // Get form data
    $leave_reason = $_POST['leave_reason'];
    $leave_from = $_POST['leave_from'];
    $leave_to = $_POST['leave_to'];
    $description = $_POST['description'];

    // Set the initial status to 2 (pending)
    $status = 2;

    // SQL query to insert data into leave_tbl with status
    $sql = "INSERT INTO leave_tbl (leave_reason, leave_from, leave_to, description, status) 
            VALUES ('$leave_reason', '$leave_from', '$leave_to', '$description', $status)";

    // Execute query
    if ($link->query($sql) === TRUE) {
        // Redirect to leave_status.php after successful submission
        header("Location: leave_status.php");
        exit();
    } else {
        // Handle error
        echo "Error: " . $sql . "<br>" . $link->error;
    }

    // Close database connection
    $link->close();
} else {
    // Redirect to the form page if accessed directly without submitting the form
    header("Location: leave_status.php");
    exit();
}
?>
