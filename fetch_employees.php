<?php

include 'layouts/config.php';

// Check if departmentId is set in the POST request
if (isset($_POST['departmentId'])) {
  $departmentId = $_POST['departmentId'];
  
  // Perform SQL query to fetch employees based on departmentId
  $sql = "SELECT * FROM users WHERE d_id = $departmentId";
  $stmt = $link->prepare($sql);
  $stmt->bind_param("i", $departmentId);
  $stmt->execute();
  $result = $stmt->get_result();

  // Fetch and store the result in an array
  $employees = array();
  while ($row = $result->fetch_assoc()) {
    $employees[] = array(
      'id' => $row['u_id'],
      'name' => $row['username']
      // Add other fields as needed
    );
  }

  // Close statement and database connection
  $stmt->close();
  $link->close(); // Close connection if not needed elsewhere

  // Return the array of employees as JSON
  echo json_encode($employees);
} 
// else {
//   // If departmentId is not set in the POST request, return an error message
//   echo json_encode(array('error' => 'Department ID not provided'));
// }
