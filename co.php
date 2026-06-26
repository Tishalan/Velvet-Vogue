<?php
session_start(); // Assuming the session is already started for the user

// Simulate a checkout page
if (!isset($_SESSION['user_id'])) {
    // Redirect to login if the user is not logged in
    header('Location: login.php');
    exit();
}

$con = mysqli_connect("localhost", "root", "", "Velvet_vogue"); // Database connection

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_SESSION['user_id'];  // Assuming the user is logged in and we have user_id in session

// Fetch all items in the cart for the current user
$sql = "SELECT c.order_id, p.Product_name, p.Price, p.Discount_Price, c.size, c.color, c.quantity, p.Image 
        FROM cart c 
        JOIN Products_details p ON c.Product_ID = p.Product_ID 
        WHERE c.user_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $total_price = 0;
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $product_name = $row['Product_name'];
        $price = $row['Discount_Price'] > 0 ? $row['Discount_Price'] : $row['Price'];
        $quantity = $row['quantity'];
        $image = "Admindb/uploads/" . $row['Image'];
        
        $total_price_for_item = $price * $quantity;
        $total_price += $total_price_for_item;
        
        $products[] = [
            'product_name' => $product_name,
            'price' => $price,
            'quantity' => $quantity,
            'image' => $image,
            'total_price' => $total_price_for_item,
            'order_id' => $row['order_id']
        ];
    }
} else {
    echo "<p>Your cart is empty.</p>";
    exit();
}
?>

<!-- Checkout page -->
<section id="checkout">
    <div class="container">
        <h2>Checkout</h2>
        
        <!-- Cart Details Table -->
        <h3>Your Cart:</h3>
        <table class="table table-bordered" id="cart-table">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Price (LKR)</th>
                    <th>Quantity</th>
                    <th>Total (LKR)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) { ?>
                    <tr id="cart-item-<?php echo $product['order_id']; ?>">
                        <td><img src="<?php echo $product['image']; ?>" alt="<?php echo htmlentities($product['product_name']); ?>" style="width: 100px; height: 100px; object-fit: cover;"></td>
                        <td><?php echo htmlentities($product['product_name']); ?></td>
                        <td>LKR <?php echo number_format($product['price'], 2); ?></td>
                        <td>
                            <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" min="1" max="10" style="width: 50px;" class="quantity" data-price="<?php echo $product['price']; ?>" data-id="<?php echo $product['order_id']; ?>" onchange="updateTotalPrice(this)">
                        </td>
                        <td class="total-price" id="total-price-<?php echo $product['order_id']; ?>">LKR <?php echo number_format($product['total_price'], 2); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Shipping Details Form -->
        <h3>Shipping Information:</h3>
        <form action="process_checkout.php" method="POST">
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="shipping_address">Shipping Address:</label>
                <textarea id="shipping_address" name="shipping_address" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number:</label>
                <input type="text" id="contact_number" name="contact_number" class="form-control" required>
            </div>
            
            <!-- Payment Method Selection -->
            <h3>Payment Method:</h3>
            <div class="form-group">
                <label for="payment_method">Choose Payment Method:</label>
                <select id="payment_method" name="payment_method" class="form-control" required>
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="cod">Cash on Delivery</option>
                </select>
            </div>
            
            <!-- Summary Section -->
            <div class="summary-section">
                <h4>Order Summary</h4>
                <p>Total Price: LKR <span id="grand-total"><?php echo number_format($total_price, 2); ?></span></p>
                <button type="submit" class="btn btn-primary">Complete Purchase</button>
            </div>
        </form>
    </div>
</section>

<!-- AJAX Script -->
<script>
    // Function to update total price in real-time
    function updateTotalPrice(element) {
        const price = parseFloat(element.getAttribute('data-price')); // Price per unit
        const quantity = parseInt(element.value); // New quantity
        const cartItemId = element.getAttribute('data-id'); // Order ID

        // Update the total price for this item in the table
        const totalPrice = price * quantity;
        document.getElementById('total-price-' + cartItemId).innerHTML = 'LKR ' + totalPrice.toFixed(2);

        // Update the grand total
        updateGrandTotal(cartItemId, totalPrice);
        
        // Send the updated quantity to the server using AJAX
        updateCartQuantity(cartItemId, quantity);
    }

    // Function to update the grand total price
    function updateGrandTotal() {
        let grandTotal = 0;

        // Loop through each total price cell and sum them up
        const totalPriceElements = document.querySelectorAll('.total-price');
        totalPriceElements.forEach(function (element) {
            grandTotal += parseFloat(element.innerText.replace('LKR', '').trim());
        });

        // Update the grand total display
        document.getElementById('grand-total').innerText = 'LKR ' + grandTotal.toFixed(2);
    }

    // Function to update cart quantity in the database using AJAX
    function updateCartQuantity(cartItemId, quantity) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "update_cart_quantity.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log("Cart quantity updated.");
            }
        };
        xhr.send("cart_item_id=" + cartItemId + "&quantity=" + quantity);
    }
</script>

