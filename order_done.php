<?php


// Check if the order ID is provided
if (isset($_GET['orderId'])) {
    $orderId = $_GET['orderId'];

    // Perform the update by executing an UPDATE query
    $conn = mysqli_connect("localhost", "root", "", "fooDZ");
    $query = "UPDATE orders SET orders_status = 'returned' WHERE order_id = $orderId";
    mysqli_query($conn, $query);

    // Redirect to the page where you display the orders
    header("Location: orders.php");
    exit;
}
?>
