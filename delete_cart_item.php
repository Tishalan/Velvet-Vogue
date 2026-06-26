<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "Velvet_vogue");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get cart item ID from URL
$cart_id = isset($_GET['id']) ? $_GET['id'] : '';

if ($cart_id) {
    // Delete the item from the cart
    $delete_query = "DELETE FROM cart WHERE _id = $cart_id";
    if (mysqli_query($con, $delete_query)) {
        header('Location: cart.php');  // Redirect back to cart page
        exit;
    } else {
        echo "Error deleting item: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
