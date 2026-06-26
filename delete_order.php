<?php
// Assuming a valid connection is already established
$con = mysqli_connect("localhost", "root", "", "Velvet_vogue");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];

    // Prepare delete statement to remove the product from the track_details table
    $sql = "DELETE FROM track_details WHERE order_id = ?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Order deleted successfully!";
    } else {
        echo "Error deleting order.";
    }

    $stmt->close();
}

$con->close();
?>
