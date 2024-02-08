<?php
// Include your database connection configuration file
include 'layouts/config.php';

// Check if the required parameters are set
if (isset($_GET['employeeId'], $_GET['start'], $_GET['end'])) {
  // Get the parameters from the AJAX request
  $employeeId = $_GET['employeeId'];
  $start = $_GET['start'];
  $end = $_GET['end'];

  // Prepare and execute SQL query to fetch attendance data
  $sql = "SELECT * FROM employee_attendance WHERE emp_id = ? AND attendance_date BETWEEN ? AND ?";
  $stmt = $link->prepare($sql);
  $stmt->bind_param("iss", $employeeId, $start, $end);
  $stmt->execute();
  $result = $stmt->get_result();

  // Prepare an array to hold the fetched data
  $attendanceData = array();

  // Fetch data and add it to the array
  while ($row = $result->fetch_assoc()) {
    $attendanceData[] = array(
      'title' => $row['status'], // Assuming 'status' contains the title (e.g., Present, Absent)
      'start' => $row['attendance_date'],
      'status' => $row['status']
    );
  }

  // Close the prepared statement and database connection
  $stmt->close();
  $link->close();

  // Return the fetched data as JSON
  echo json_encode($attendanceData);
} else {
  // If any of the required parameters is not set, return an error message
  echo json_encode(array('error' => 'One or more required parameters are missing.'));
}
