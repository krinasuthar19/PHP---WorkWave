<?php
session_start();
include 'layouts/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $user_id = $_SESSION['u_id'];
    $newPhone = mysqli_real_escape_string($link, $_POST['newPhone']);
    $newCity = mysqli_real_escape_string($link, $_POST['newCity']);
    $newState = mysqli_real_escape_string($link, $_POST['newState']);
    $newCountry = mysqli_real_escape_string($link, $_POST['newCountry']);
    $newAddress = mysqli_real_escape_string($link, $_POST['newAddress']);

    // Perform database update
    $sql = "UPDATE users SET phone = '$newPhone', city = '$newCity', state = '$newState', country = '$newCountry', address = '$newAddress' WHERE u_id = $user_id";
    if (mysqli_query($link, $sql)) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "error" => mysqli_error($link)));
    }
} else {
    // If the request method is not POST, return an error
    echo json_encode(array("success" => false, "message" => "Invalid request method."));
}

$link->close();
?>
    