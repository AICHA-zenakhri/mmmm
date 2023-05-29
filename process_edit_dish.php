<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $dishId = $_POST["dishId"];
    $dishName = $_POST["dishName"];
    $dishCategory = $_POST["dishCategory"];
    $dishPrice = $_POST["dishPrice"];

    // Perform the necessary operations, such as updating the database
    $conn = mysqli_connect("localhost", "root", "", "fooDZ");

    // Check if the connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "UPDATE products SET dish_name = '$dishName', dish_price = '$dishPrice', dish_categ = '$dishCategory' WHERE dish_id = '$dishId'";

    mysqli_query($conn, $query);

    // Close the database connection
    mysqli_close($conn);

    header("Location: menuMaker.php");
    exit();
}
?>
