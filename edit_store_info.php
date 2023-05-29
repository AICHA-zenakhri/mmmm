<?php
include 'connect.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$userId = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize the user input
    $name = $_POST['Name'];
    $address = $_POST['Address'];
    $phone = $_POST['Phone'];
    $businessType = $_POST['Business'];

    // Perform any additional validation if required

    // Update the store information in the database

    $sql = "UPDATE restaurant SET store_name = '$name', store_address = '$address', phone_num = $phone, business = '$businessType' WHERE email = (SELECT email FROM users WHERE user_id = '$userId')";
    if ($conn->query($sql) === TRUE) {
        // Store information updated successfully
        header("Location: settings.php"); // Redirect to the settings page
        exit();
    } else {
        // Error occurred while updating store information
        $error = "Error: " . $conn->error;
    }
}

// If the code reaches this point, either the request method was not POST or an error occurred during form submission
// You can handle and display the error message here if needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content here -->
</head>
<body>
    <!-- Add your HTML content here -->
</body>
</html>
