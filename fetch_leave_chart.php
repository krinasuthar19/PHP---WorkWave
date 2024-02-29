<?php
include "layouts/config.php";

// Check connection
if ($link->connect_error) {
  die("Connection failed: " . $link->connect_error);
}

// Fetch data based on parameter
$sql = "SELECT * FROM leave_tbl";
$result = $link->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
  $data[] = $row['id'];
}

// Close connection
$link->close();

// Output data as JSON
echo json_encode($data);
