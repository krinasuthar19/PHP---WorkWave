<?php
// Include necessary files and session handling logic

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $employeeName = $_POST['employee_name'];
    $employeeID = $_POST['employee_id'];
    $basicSalary = $_POST['basic_salary'];
    $bonus = $_POST['bonus'];

    // Calculate total salary
    $totalSalary = $basicSalary + $bonus;

    // Save salary details to the database (replace with actual database logic)
    saveSalaryDetails($employeeID, $employeeName, $basicSalary, $bonus, $totalSalary);

    // Redirect to salary slip page
   
} else {
    // Redirect to salary page if accessed without form submission
    header('Location: salary.php');
    exit();
}

// Function to save salary details to the database (replace with your database logic)
function saveSalaryDetails($employeeID, $employeeName, $basicSalary, $bonus, $totalSalary) {
    // Connect to your database (replace with actual database connection code)
    include 'layouts/config.php';
    // Check the connection
    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    }

    // Prepare and execute SQL query to insert salary details
    $sql = "INSERT INTO salaries (u_id, basic_salary, bonus, total_salary, payment_date)
            VALUES ('$employeeID', '$basicSalary', '$bonus', '$totalSalary', NOW())";

    if ($link->query($sql) === TRUE) {
        // Salary details saved successfully
        echo "Salary details saved successfully.";
    } else {
        // Error in saving salary details
        echo "Error: " . $sql . "<br>" . $link->error;
    }

    // Close the database connection
    $link->close();
}
?>
