<?php
// CUSTOMER SIGN UP PHP PAGE

// Database configuration
include_once 'connect.php';

$customer_name = $_POST['Name'];
$email = $_POST['Email'];
$pass = $_POST['Password'];
$tlf_num = $_POST['Phone'];
$cus_address = $_POST['Address'];
$allergy = $_POST['myCheckboxName'];
$pwd_hash = password_hash($pass, PASSWORD_DEFAULT);

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count >= 1) {
    echo '<script>
            window.location.href = "signup.html";
            alert("Email already exists!!");
          </script>';
    exit();
} else {
    $sql = "INSERT INTO users (user_full_name, email, pass, tlf_num, user_address, allergy, profile_type)
            VALUES ('$customer_name', '$email', '$pwd_hash', '$tlf_num', '$cus_address', '$allergy', 'customer');";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        session_start();
        $_SESSION['user_id'] = mysqli_insert_id($conn);
        header("Location: restaurants.php");
        exit();
    } else {
        echo "Failed to insert data.";
        exit();
    }
}
?>
