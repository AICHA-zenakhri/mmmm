<?php
// Restaurant owner sign-up PHP page

// Database configuration
include 'connect.php';

$owner_name = $_POST['Name'];
$email = $_POST['Email'];
$pass = $_POST['Password'];
$tlf_num = $_POST['Phone'];
$owner_address = $_POST['Personal_Address'];
$store_name = $_POST['Store_Name'];
$store_address = $_POST['Store_Address'];
$business = $_POST['Business'];
$fileName = $_FILES['Image']['name'];
$fileTmpName = $_FILES['Image']['tmp_name'];
$fileSize = $_FILES['Image']['size'];
$fileError = $_FILES['Image']['error'];
$fileType = $_FILES['Image']['type'];
$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));
$allowed = array('jpg', 'jpeg', 'png');
$pwd_hash = password_hash($pass, PASSWORD_DEFAULT);

if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
        if ($fileSize < 1000000) {
            $fileNameNew = uniqid('', true) . "." . $fileActualExt;
            $fileDestination = 'uploads/' . $fileNameNew;
            $image = 'uploads/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
        } else {
            echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "File Upload Error",
                        text: "Your file is too big!"
                    }).then(function() {
                        window.location.href = "Owner.html";
                    });
                </script>';
            exit;
        }
    } else {
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "File Upload Error",
                    text: "There was an error uploading your file!"
                }).then(function() {
                    window.location.href = "Owner.html";
                });
            </script>';
        exit;
    }
} else {
    echo '<script>
            Swal.fire({
                icon: "error",
                title: "File Upload Error",
                text: "You cannot upload files of this type!"
            }).then(function() {
                window.location.href = "Owner.html";
            });
        </script>';
    exit;
}

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    $error_message = mysqli_error($conn);
    echo "Error: " . $error_message;
    exit;
}

$count = mysqli_num_rows($result);

if ($count >= 1) {
    echo '<script>
            alert("Registration Error: Email already exists!");
            window.location.href = "Owner.html";
          </script>';
    exit;
} else {
    // Prepare the MySQL query statement and bind parameters
    $sql = "INSERT INTO users (user_full_name, email, pass, tlf_num, user_address, profile_type)
            VALUES ('$owner_name', '$email', '$pwd_hash', '$tlf_num', '$owner_address', 'owner');";
    $result = mysqli_query($conn, $sql);

    $stm = "INSERT INTO restaurant (email, store_name, store_address, phone_num, business, rest_img)
            VALUES ('$email', '$store_name', '$store_address', '$tlf_num', '$business', '$image');";
    $result1 = mysqli_query($conn, $stm);

    if ($result && $result1) {
        session_start();
        $_SESSION['user_id'] = mysqli_insert_id($conn);
        header("Location: menuMaker.php");
        exit;
    } else {
        $error_message = mysqli_error($conn);
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Registration Error",
                    text: "Registration failed. Please try again.\n\nError: ' . $error_message . '"
                }).then(function() {
                    window.location.href = "Owner.html";
                });
              </script>';
        exit;
    }
}
?>
