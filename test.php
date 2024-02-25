<?php
include 'layouts/config.php';

function isHoliday($date)
{
    // Define an array of holidays
    $holidays_2024 = array(
        '2024-01-01', // New Year's Day
        '2024-01-15', // Makar Sankranti
        '2024-01-26', // Republic Day
        '2024-02-21', // Mahashivratri
        '2024-03-08', // Holi
        '2024-04-14', // Dr. Ambedkar Jayanti
        '2024-04-19', // Good Friday
        '2024-05-01', // May Day
        '2024-08-15', // Independence Day
        '2024-09-02', // Janmashtami
        '2024-10-02', // Gandhi Jayanti
        '2024-10-28', // Dussehra
        '2024-11-02', // Diwali
        '2024-12-25', // Christmas Day
    );

    // Include all Sundays of 2024 as holidays
    $start_date = new DateTime('2024-01-01');
    $end_date = new DateTime('2024-12-31');
    $interval = new DateInterval('P1D'); // 1 day interval
    $date_range = new DatePeriod($start_date, $interval, $end_date);

    foreach ($date_range as $d) {
        if ($d->format('N') == 7) { // Sunday
            $holidays_2024[] = $d->format('Y-m-d');
        }
    }

    // Sort the holidays array
    sort($holidays_2024);
    return in_array($date, $holidays_2024);
}

// Insert records for holidays automatically when the page is loaded
// foreach ($holidays_2024 as $holiday) {
//     $status = 'holiday';
//     $sql1 = "SELECT u_id FROM users";
//     $result = mysqli_query($link, $sql1);
//     if (mysqli_num_rows($result) > 0) {
//         while ($row = mysqli_fetch_assoc($result)) {
//             $in_time = 'null';
//             $out_time = 'null';
//             $emp_id = $row['u_id'];
//             // Check if a record already exists for the user and holiday date
//             $check_sql = "SELECT * FROM employee_attendance WHERE emp_id = '$emp_id' AND attendance_date = '$holiday'";
//             $check_result = mysqli_query($link, $check_sql);
//             if (mysqli_num_rows($check_result) == 0) {
//                 // If no record exists, insert the attendance record
//                 $insert_sql = "INSERT INTO employee_attendance (emp_id, in_time, out_time, attendance_date, status) VALUES ('$emp_id', $in_time, $out_time, '$holiday', '$status')";
//                 if ($link->query($insert_sql) === TRUE) {
//                     echo "Attendance recorded successfully for $holiday";
//                 } else {
//                     echo "Error: " . $insert_sql . "<br>" . $link->error;
//                 }
//             } else {
//                 echo "Attendance record already exists for user $emp_id on $holiday<br>";
//             }
//         }
//     }
// }




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

    // Check if the selected date is a holiday
    if (isHoliday($date)) {
        $in_time = 'null';
        $out_time = 'null';
        $status = 'holiday';
    } elseif ($in_time == '' && $out_time == '') {
        // If no time is inserted, update status to absent
        $status = 'absent';
    } elseif ($in_time <= '09:00' && $out_time >= '17:00') {
        // If in_time <= 9:00 and out_time >= 17:00, update status to present
        $status = 'present';
    } else {
        // Otherwise, update status to halfday
        $status = 'halfday';
    }

    // Check if a record already exists for the selected employee and date
    $check_sql = "SELECT * FROM employee_attendance WHERE emp_id = '$employee_id' AND attendance_date = '$date'";
    $check_result = mysqli_query($link, $check_sql);
    if (mysqli_num_rows($check_result) == 0) {
        // If no record exists, insert the attendance record
        $insert_sql = "INSERT INTO employee_attendance (emp_id, in_time, out_time, attendance_date, status) VALUES ('$employee_id', '$in_time', '$out_time', '$date', '$status')";
        if ($link->query($insert_sql) === TRUE) {
            echo "Attendance recorded successfully";
        } else {
            echo "Error: " . $insert_sql . "<br>" . $link->error;
        }
    } else {
        echo "Attendance record already exists for employee $employee_id on $date";
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
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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