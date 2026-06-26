<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Orders</title>
</head>
<body>

<?php
// Assuming a valid connection is already established
$con = mysqli_connect("localhost", "root", "", "Velvet_vogue");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user_id from query parameters
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : 0;

// Fetch order details for the user from track_details
$sql = "SELECT t.order_id, t.product_name, t.price, t.quantity, t.total_price, t.status, p.Image, t.order_date
        FROM track_details t
        JOIN Products_details p ON t.product_name = p.Product_name
        WHERE t.user_id = ?";

$stmt = $con->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    
    // Display the order details as a receipt-style format
    while ($row = $result->fetch_assoc()) {
        echo "<div class='order-detail' id='order_" . htmlentities($row['order_id']) . "'>
                <h3>Order ID: " . htmlentities($row['order_id']) . "</h3>
                <img src='Admindb/uploads/" . htmlentities($row['Image']) . "' alt='" . htmlentities($row['product_name']) . "' style='width: 50px; height: 50px;'>
                <p>Product: " . htmlentities($row['product_name']) . "</p>
                <p>Price: LKR " . number_format($row['price'], 2) . "</p>
                <p>Quantity: " . htmlentities($row['quantity']) . "</p>
                <p>Status: " . htmlentities($row['status']) . "</p>
                <p>Ordered date: " . htmlentities($row['order_date']) . "</p>
                <button class='delete-btn' data-order-id='" . htmlentities($row['order_id']) . "'>Remove</button>
                <hr>
            </div>";
    }
} else {
    echo "<p class='no-orders'>No orders found for this user.</p>";
}

$stmt->close();
?>

<style>
    /* Order Details Styles */
    .order-detail {
        background-color: #f9f9f9;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .order-detail:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .order-detail h3 {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
    }

    .order-detail img {
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .order-detail p {
        font-size: 14px;
        color: #555;
        margin: 5px 0;
    }

    .order-detail hr {
        border: 0;
        height: 1px;
        background-color: #e0e0e0;
        margin: 15px 0;
    }

    /* Delete Button Styles */
    .delete-btn {
        background-color: #e74c3c;
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .delete-btn:hover {
        background-color: #c0392b;
    }

    /* No Orders Found Message */
    .no-orders {
        text-align: center;
        font-size: 16px;
        color: #888;
        padding: 20px;
    }
</style>

<script>
    // JavaScript for handling delete action
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-btn');
        
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const orderId = this.getAttribute('data-order-id');
                
                // Send AJAX request to delete the order
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'delete_order.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // On success, remove the order from the UI
                        const orderDiv = document.getElementById('order_' + orderId);
                        if (orderDiv) {
                            orderDiv.remove();
                        }
                    }
                };
                xhr.send('order_id=' + orderId);
            });
        });
    });
</script>

</body>
</html>
