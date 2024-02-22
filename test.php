<?php
include 'layouts/config.php';

// Fetch employee list from the database
$sql = "SELECT u_id FROM users";
echo $sql;

$result = mysqli_query($link, $sql);
if (!$result) {
    die("Error in SQL query: " . mysqli_error($link));
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $employees[] = $row;
    }
}


// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_id = $_POST['employee_id'];
    $in_time = $_POST['in_time'];
    $out_time = $_POST['out_time'];
    $date = $_POST['date'];
    
    if ($in_time == '' && $out_time == '') {
        // If no time is inserted, update status to absent
        $status = 'absent';
    } elseif ($in_time <= '09:00' && $out_time >= '17:00') {
        // If in_time <= 9:00 and out_time >= 17:00, update status to present
        $status = 'present';
    } else {
        // Otherwise, update status to halfday
        $status = 'halfday';
    }

    // Insert or update the record in the database
    $sql = "INSERT INTO employee_attendance (emp_id, in_time, out_time, attendance_date, status) VALUES ('$employee_id', '$in_time', '$out_time', '$date', '$status') ";
    if ($link->query($sql) === TRUE) {
        echo "Attendance recorded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Attendance Form</title>
</head>
<body>
    <h2>Employee Attendance Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="employee_id">Select Employee:</label>
        <input type="text" name="employee_id">
        <br><br>
        <label for="date">Date:</label>
        <input type="date" name="date" id="date">
        <br><br>
        <label for="in_time">In Time:</label>
        <input type="time" name="in_time" id="in_time">
        <br><br>
        <label for="out_time">Out Time:</label>
        <input type="time" name="out_time" id="out_time">
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
