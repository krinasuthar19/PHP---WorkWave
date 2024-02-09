<?php
// fetch_employees.php

// Assuming you have included/configured your database connection

// Check if the department parameter is set
if (isset($_POST['department'])) {
  $department = $_POST['department'];

  // Perform a database query to fetch employees based on the selected department
  // Replace this with your actual database query
  $sql = "SELECT u_id, username FROM users WHERE department = ?";
  $stmt = $link->prepare($sql);
  $stmt->bind_param("s", $department);
  $stmt->execute();
  $result = $stmt->get_result();

  // Store the fetched employees in an array
  $employees = array();
  while ($row = $result->fetch_assoc()) {
    $employees[] = $row;
  }

  // Close the database connection
  $stmt->close();
  $link->close();

  // Return the list of employees as JSON
  header('Content-Type: application/json');
  echo json_encode($employees);
} else {
  // Return an empty response if department parameter is not set
  echo json_encode(array());
}
