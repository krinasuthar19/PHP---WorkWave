<?php
// Include your database configuration
include 'layouts/config.php';

// Get parameters from AJAX request
$employeeId = $_GET['employeeId'];
$start = $_GET['start'];
$end = $_GET['end'];

// Perform a query to fetch attendance data
$sql = "SELECT * FROM employee_attendance
        WHERE emp_id = '$employeeId' AND attendance_date BETWEEN '$start' AND '$end'";
$result = $link->query($sql);

$attendanceData = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $attendanceData[] = $row;
    }
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($attendanceData);

// Close the database connection
$link->close();
?>
