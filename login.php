<?php
// LOGIN PAGE

// Database configuration
include_once 'connect.php';

$email = $_POST['email'];
$pass = $_POST['pass'];
$owner = "owner";
$customer = "customer";

// Prepare the MySQL query statement and bind parameters
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if (password_verify($pass, $row['pass'])) {
    if ($count == 1 && $row['profile_type'] == $owner) {
        session_start();
        $_SESSION['user_id'] = $row['user_id'];
        header("Location: menuMaker.php");
        exit();
    } elseif ($count == 1 && $row['profile_type'] == $customer) {
        session_start();
        $_SESSION['user_id'] = $row['user_id'];
        header("Location: restaurants.php");
        exit();
    } else {
        echo '<script>
                window.location.href = "login.html";
                alert("Login failed. Invalid username or password!!");
              </script>';
        exit();
    }
} else {
    echo '<script>
            window.location.href = "login.html";
            alert("Login failed. Invalid username or password!!");
          </script>';
    exit();
}
?>
