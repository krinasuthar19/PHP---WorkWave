<?php
// Connect to the database (replace these values with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "workwave_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to calculate status based on in time and out time
function calculateStatus($inTime, $outTime)
{
    if ($inTime === null) {
        return "Absent";
    } elseif ($inTime > '09:00:00' && $outTime < '17:00:00') {
        return "Half Day";
    } else {
        return "Present";
    }
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Loop through the arrays
    for ($i = 0; $i < count($_POST['emp_id']); $i++) {
        $emp_id = $_POST['emp_id'][$i];
        $attendance_date = $_POST['attendance_date'][$i];
        $in_time = $_POST['in_time'][$i];
        $out_time = $_POST['out_time'][$i];

        // Calculate status
        $status = calculateStatus($in_time, $out_time);

        // Insert data into the database
        $sql = "INSERT INTO employee_attendance (emp_id, attendance_date, in_time, out_time, status) VALUES ( '$emp_id', '$attendance_date', '$in_time', '$out_time', '$status')";
        if ($conn->query($sql) === TRUE) {
            // echo "Record inserted successfully";
        }
        // $stmt = $conn->prepare($sql);
        // $stmt->bind_param("issis", $emp_id, $attendance_date, $in_time, $out_time, $status);
        // $stmt->execute();
        // $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Form</title>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="emp_id">Employee ID:</label>
    <input type="text" name="emp_id[]" required>

    <label for="attendance_date">Date:</label>
    <input type="date" name="attendance_date[]" required>

    <label for="in_time">In Time:</label>
    <input type="time" name="in_time[]">

    <label for="out_time">Out Time:</label>
    <input type="time" name="out_time[]">

    <hr>
    
    <!-- Repeat the above fields for additional entries -->

    <input type="submit" value="Submit">
</form>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
