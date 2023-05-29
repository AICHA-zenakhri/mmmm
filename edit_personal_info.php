<?php

include 'connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$userId = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize the user input
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $pass = $_POST['password'];
    $pwd_hash = password_hash($pass, PASSWORD_DEFAULT);

    // Perform any additional validation if required

    // Update the user's personal information in the database
    $sql = "UPDATE users SET user_full_name = '$name', email = '$email', tlf_num = '$phone', pass = '$pwd_hash' WHERE user_id = $userId";
    if ($conn->query($sql) === TRUE) {
        // Personal information updated successfully
        header("Location: settings.php"); // Redirect to the settings page
        exit();
    } else {
        // Error occurred while updating personal information
        $error = "Error: " . $conn->error;
    }
}
?>
