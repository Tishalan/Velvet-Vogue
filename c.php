<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "Velvet_vogue"); // Database connection

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_SESSION['user_id'];  // Assuming the user is logged in and we have user_id in session

// Handle quantity change
if (isset($_POST['update_cart'])) {
    $cart_item_id = $_POST['order_id'];
    $new_quantity = $_POST['quantity'];
    
    // Update the cart item quantity in the database
    $update_sql = "UPDATE cart SET quantity = ? WHERE order_id = ? AND user_id = ?";
    $stmt = $con->prepare($update_sql);
    $stmt->bind_param("iii", $new_quantity, $cart_item_id, $user_id);
    $stmt->execute();
    $stmt->close();
}

// Handle delete item from cart
if (isset($_POST['delete_item'])) {
    $cart_item_id = $_POST['order_id'];
    
    // Delete the item from the cart
    $delete_sql = "DELETE FROM cart WHERE order_id = ? AND user_id = ?";
    $stmt = $con->prepare($delete_sql);
    $stmt->bind_param("ii", $cart_item_id, $user_id);
    $stmt->execute();
    $stmt->close();
}

// Fetch all items in the cart for the current user
$sql = "SELECT c.order_id, p.Product_name, p.Price, p.Discount_Price, c.size, c.color, c.quantity, p.Image 
        FROM cart c 
        JOIN Products_details p ON c.Product_ID = p.Product_ID 
        WHERE c.user_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if the cart has any items
if ($result->num_rows > 0) {
    $total_price = 0; // Variable to calculate total price
    ?>

    <!-- Display Cart Table -->
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-top: 20px;">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Size</th>
                <th>Color</th>
                <th>Price (LKR)</th>
                <th>Quantity</th>
                <th>Total (LKR)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $result->fetch_assoc()) {
            $product_name = $row['Product_name'];
            $price = $row['Discount_Price'] > 0 ? $row['Discount_Price'] : $row['Price'];
            $quantity = $row['quantity'];
            $cart_item_id = $row['order_id'];
            $image = "Admindb/uploads/" . $row['Image']; // Image path
            
            // Calculate the total price for this product
            $total_price_for_item = $price * $quantity;
            $total_price += $total_price_for_item;
        ?>
            <tr>
                <!-- Product Image Column -->
                <td>
                    <img src="<?php echo $image; ?>" alt="<?php echo htmlentities($product_name); ?>" style="width: 100px; height: 100px; object-fit: cover;">
                </td>
                <td><?php echo htmlentities($product_name); ?></td>
                <td><?php echo htmlentities($row['size']); ?></td>
                <td><?php echo htmlentities($row['color']); ?></td>
                <td>LKR <?php echo number_format($price, 2); ?></td>
                <td>
                    <form method="POST" action="cart.php" style="display: inline-block;">
                        <input type="number" name="quantity" value="<?php echo $quantity; ?>" min="1" max="10" style="width: 50px;">
                        <input type="hidden" name="order_id" value="<?php echo $cart_item_id; ?>">
                        <button type="submit" name="update_cart">Update</button>
                    </form>
                </td>
                <td>LKR <?php echo number_format($total_price_for_item, 2); ?></td>
                <td>
                    <form method="POST" action="cart.php" style="display: inline-block;">
                        <input type="hidden" name="order_id" value="<?php echo $cart_item_id; ?>">
                        <button type="submit" name="delete_item" onclick="return confirm('Are you sure you want to remove this item from your cart?');">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <!-- Display the total price of all items in the cart -->
    <p style="font-weight: bold; margin-top: 20px;">Total Price: LKR <?php echo number_format($total_price, 2); ?></p>

<?php
} else {
    echo "<p>Your cart is empty.</p>";
}

?>

<!-- Proceed to checkout -->
<a href="checkout.php" style="margin-top: 20px; display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; font-weight: bold;">Proceed to Checkout</a>
