<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "Velvet_vogue");  // Database connection

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get product ID, size, and color from the URL parameters
$product_id = isset($_GET['pid']) ? $_GET['pid'] : '';  // Get product ID from URL
$size = isset($_GET['size']) ? $_GET['size'] : '';  // Get size from URL
$color = isset($_GET['color']) ? $_GET['color'] : '';  // Get color from URL

// Validate inputs
if ($product_id <= 0 || empty($size) || empty($color)) {
    echo "Invalid input. Please select a size and a color.";
    exit;
}

// Ensure only one size is selected
if (is_array($size)) {
    echo "Please select only one size.";
    exit;
}

// Ensure only one color is selected
if (is_array($color)) {
    echo "Please select only one color.";
    exit;
}

// Get the current user's ID from the session
$user_id = $_SESSION['user_id'];


// Prepare the SQL statement to insert into the cart table
$stmt = $con->prepare("INSERT INTO cart (user_id, Product_ID, size, color, quantity, order_date) VALUES (?, ?, ?, ?, 1, NOW())");

if ($stmt === false) {
    die("Error preparing the SQL statement: " . $con->error);
}

// Bind the parameters to the SQL query
$stmt->bind_param("iiss", $user_id, $product_id, $size, $color);

// Execute the statement
if ($stmt->execute()) {
    // Redirect to the Addcart.php page after successful insertion
    header('Location: cart.php');
    exit;
} else {
    // Print the error if the query fails
    echo "Error adding to cart: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$con->close();
?>
