<?php
include 'layouts/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $username = `$firstName $lastName`;
    $email = $_POST['Email'];
    $mobileNumber = $_POST['MobileNumber'];
    $dateOfBirth = $_POST['DateOfBirth'];
    $gender = $_POST['Gender'];
    $address = $_POST['Address'];
    $city = $_POST['City'];
    $state = $_POST['State'];
    $pincode = $_POST['Pincode'];
    $country = $_POST['Country'];
    $role = $_POST['Role'];

    // Perform a query to retrieve the role_id for the specified user
    $sql = "SELECT r_id FROM role WHERE r_name = '$role'";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the result as an associative array
        $row = $result->fetch_assoc();

        // Store the role_id in a PHP variable
        $roleId = $row['r_id'];

        // Now $roleId contains the value of the role_id for the specified user
        // echo "Role ID for user with ID $role is: $roleId";
    } else {
        echo "User not found or role_id is not available.";
    }


    $department = $_POST['Department'];
    // Perform a query to retrieve the role_id for the specified user
    $sql = "SELECT d_id FROM department WHERE d_name = '$department'";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the result as an associative array
        $row = $result->fetch_assoc();

        // Store the role_id in a PHP variable
        $depId = $row['d_id'];

        // Now $roleId contains the value of the role_id for the specified user
        // echo "Role ID for user with ID $role is: $roleId";
    } else {
        echo "User not found or role_id is not available.";
    }


    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT); // Hash the password for security
    $salary = $_POST['Salary'];
    $dateOfJoining = $_POST['DateOfJoining'];

    // Handle image upload
    $image = $_FILES['imageInput'];

    if ($image['size'] > 0) {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $extension = pathinfo($image['name'], PATHINFO_EXTENSION);

        if (in_array(strtolower($extension), $allowedExtensions)) {
            $imageName = uniqid('img_') . '.' . $extension;
            $imagePath = 'profile_images/' . $imageName; // Adjust the folder path as needed

            move_uploaded_file($image['tmp_name'], $imagePath);
        } else {
            echo "Invalid image format. Allowed formats: jpg, jpeg, png, gif.";
            exit();
        }
    } else {
        // Handle the case where no image is uploaded
        $imagePath = ''; // Set a default image path or leave it empty based on your requirements
    }

    $sql = "INSERT INTO users (username, firstname, lastname, email, phone, dob, gender, address, city, state, pincode, country, role, d_id, password, salary, date_of_joining, profile_image) 
            VALUES ('$username', $firstName', '$lastName', '$email', '$mobileNumber', '$dateOfBirth', '$gender', '$address', '$city', '$state', '$pincode', '$country', $roleId, $depId, '$password', '$salary', '$dateOfJoining', '$imagePath')";

    if ($link->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
}

$link->close();
?>
