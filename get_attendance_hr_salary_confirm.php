<?php
// get_attendance_hr_salary_confirm.php

include 'layouts/config.php';

if (isset($_POST['userId'], $_POST['month'], $_POST['year'])) {
  $userId = $_POST['userId'];
  $month = $_POST['month'];
  $year = $_POST['year'];

  // Calculate the start and end dates of the month
  $startDate = date("Y-m-01", strtotime("$year-$month"));
  $endDate = date("Y-m-t", strtotime("$year-$month"));

  // Query to get total absent days for the selected month
  $absentQuery = "SELECT COUNT(*) AS totalAbsentDays FROM employee_attendance WHERE emp_id = '$userId' AND attendance_date BETWEEN '$startDate' AND '$endDate' AND status = 'absent'";
  $absentResult = mysqli_query($link, $absentQuery);
  $totalAbsentDays = 0;
  if ($absentResult && mysqli_num_rows($absentResult) > 0) {
    $row = mysqli_fetch_assoc($absentResult);
    $totalAbsentDays = $row['totalAbsentDays'];
  }

  // Query to get total half-days for the selected month
  $halfDayQuery = "SELECT COUNT(*) AS totalHalfDays FROM employee_attendance WHERE emp_id = '$userId' AND attendance_date BETWEEN '$startDate' AND '$endDate' AND status = 'half-day'";
  $halfDayResult = mysqli_query($link, $halfDayQuery);
  $totalHalfDays = 0;
  if ($halfDayResult && mysqli_num_rows($halfDayResult) > 0) {
    $row = mysqli_fetch_assoc($halfDayResult);
    $totalHalfDays = $row['totalHalfDays'];
  }

  echo json_encode(array('totalAbsentDays' => $totalAbsentDays, 'totalHalfDays' => $totalHalfDays));
} else {
  echo json_encode(array('error' => 'Invalid request'));
}

$link->close();
?>