<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "Velvet_vogue");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['cart_item_id']) && isset($_POST['quantity'])) {
    $cart_item_id = $_POST['cart_item_id'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE cart SET quantity = ? WHERE order_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $quantity, $cart_item_id);
    $stmt->execute();

    echo "Quantity updated successfully.";
}
?>