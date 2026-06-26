
<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');  // Redirect to login if not logged in
    exit;
}

$user_id = $_SESSION['user_id'];  // Retrieve the user_id from the session

// Fetch user-specific data from the database
$con = mysqli_connect("localhost", "root", "", "Velvet_vogue");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users WHERE user_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Display user-specific data
// Continue with the rest of the checkout process...
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Daily Shop | Checkout Page</title>
    
    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/default-theme.css" rel="stylesheet">
    <!-- Top Slider CSS -->
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet"> 
    <link href="css/theme-color/pink-theme.css" rel="stylesheet">
   

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  

  </head>
  <body> 

  <style>
    /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

/* Section Styles */
#checkout {
    padding: 5px 0;
}

/* Checkout Container */
.container {
    max-width: 1200px;
    margin: 0 auto;
}

/* Checkout Table */
#cart-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 30px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

#cart-table th,
#cart-table td {
    padding: 12px 15px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

#cart-table th {
    background-color: #f4f4f4;
    font-weight: bold;
    text-transform: uppercase;
    color: #333;
}

#cart-table td img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 6px;
}

#cart-table tr:hover {
    background-color: #f9f9f9;
}

/* Quantity Input */
input[type="number"] {
    width: 60px;
    padding: 5px;
    border-radius: 4px;
    border: 1px solid #ccc;
    text-align: center;
    font-size: 14px;
    transition: all 0.3s;
}

input[type="number"]:focus {
    border-color: #3E2723;
    outline: none;
}


/* Payment Method Section */
h3 {
    font-size: 24px;
    margin-top: 40px;
    color: #333;
    font-weight: 500;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 10px;
    display: block;
    color: #333;
}

#payment_method {
    width: 30%;
    padding: 12px;
    font-size: 16px;
    border-radius: 6px;
    border: 1px solid #ccc;
    background-color: #f9f9f9;
    transition: all 0.3s;
    height: 42px;
}

#payment_method:focus {
    border-color: #3E2723;
    outline: none;
}

/* Summary Section */
.summary-section {
    margin-top: 30px;
    width: 30%;
    max-width: 35%;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.summary-section p {
    font-size: 18px;
    color: #333;
    font-weight: 600;
}

button[type="submit"] {
    background-color: #3E2723;
    color: #fff;
    border: none;
    padding: 12px 20px;
    font-size: 16px;
    font-weight: 600;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.3s;
}

button[type="submit"]:hover {
    background-color:rgba(62, 39, 35, 0.7);
}

/* Responsive Design */
@media (max-width: 768px) {
    #cart-table th, #cart-table td {
        padding: 8px 10px;
    }

    #cart-table td img {
        width: 80px;
        height: 80px;
    }

    h3 {
        font-size: 20px;
    }

    .summary-section p {
        font-size: 16px;
    }

    button[type="submit"] {
        width: 100%;
    }
}

    
  </style>
    
  
  <!-- <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div>  -->
    <!-- / wpf loader Two --> 
    <!-- / wpf loader Two -->       
 <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">

                <!-- start language -->
                <div class="aa-language">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <img src="img/flag/english.jpg" alt="english flag">ENGLISH                      
                    </a>
                    
                  </div>
                </div>
                <!-- / language -->

                <!-- start currency -->
                <div class="aa-currency">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="fa fa-LKR"></i>LKR                      
                    </a>
                    
                  </div>
                </div>
                <!-- / currency -->

                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>0750906065</p>
                </div>
                <!-- / cellphone -->

              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                <li class="hidden-xs"><a href="index.php">Home</a></li>
                  <li class="hidden-xs"><a href="product.php">Product Categories</a></li>
                  <li class="hidden-xs"><a href="cart.php">My Cart</a></li>
                  <li class="hidden-xs"><a href="checkout.php">Checkout</a></li>
                  <li class="hidden-xs"><a href="contact.php">Contact</a></li>
                  <li class="hidden-xs"><a href="profile.php">My Profile</a></li>
                  <li class="hidden-xs"><a href="login.html">Logout</a></li>

                  </ul>
         
                  
                   </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="index.html">
                  <span class="fa fa-shopping-cart"></span>
                  <p>Velvet<strong>Vogue</strong> <span>Your Shopping Partner</span></p>
                </a>                
              </div>

              <!-- search box -->


              <div class="aa-search-box">
                <form action="">
                  <input type="text" name="" id="" placeholder="Search here... ">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->      
               
              
            </div>
          </div>
        </div>
      </div>
    </div>
         
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->


  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            
  </section>
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="Images\CHECKOUT.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Checkout Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Checkout</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->




  

 <!-- Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">

        <?php

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

$user_id = $_SESSION['user_id']; // Assuming the user is logged in and we have user_id in session

// Fetch all items in the cart for the current user
$sql = "SELECT c.order_id, p.Product_name, p.Price, p.Discount_Price, c.size, c.color, c.quantity, p.Image 
        FROM cart c 
        JOIN Products_details p ON c.Product_ID = p.Product_ID 
        WHERE c.user_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$total_price = 0;
$products = [];
if ($result->num_rows > 0) {
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
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['complete_purchase'])) {
    // Generate a unique track_id for this purchase
    $track_id = uniqid(); // Generates a unique ID for the entire purchase

    foreach ($products as $product) {
        $order_id = $product['order_id'];
        $product_name = $product['product_name'];
        $price = $product['price'];
        $quantity = $product['quantity'];
        $total = $product['total_price'];

        // Insert into track_details table
        $insert_sql = "INSERT INTO track_details (order_id, user_id, product_name, price, quantity, total, total_price)
                       VALUES (?, ?, ?, ?, ?, ?, ?)";
        $insert_stmt = $con->prepare($insert_sql);
        $insert_stmt->bind_param("iissddd", $order_id, $user_id, $product_name, $price, $quantity, $total, $total_price);
        $insert_stmt->execute();
    }

    // Clear the cart after purchase
    $clear_cart_sql = "DELETE FROM cart WHERE user_id = ?";
    $clear_cart_stmt = $con->prepare($clear_cart_sql);
    $clear_cart_stmt->bind_param("i", $user_id);
    $clear_cart_stmt->execute();

    // Redirect to a success page or display a success message
    
}
?>


<!-- Checkout page -->
<!-- Checkout page -->
<section id="checkout">
    <div class="container">
        <form method="POST" action="">
            <!-- Cart Details Table -->
            <?php if (!empty($products)) { ?>
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
            <?php } else { ?>
                <p>Your cart is empty.</p>
            <?php } ?>

            <!-- Payment Method Selection -->
            <div class="form-group">
                <label for="payment_method">Choose Payment Method</label>
                <select id="payment_method" name="payment_method" class="form-control" required>
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="cod">Cash on Delivery</option>
                </select>
            </div>
            
            <!-- Summary Section -->
            <div class="summary-section">
                <p>Total Price: LKR <span id="grand-total"><?php echo number_format($total_price, 2); ?></span></p>
                <button type="submit" name="complete_purchase" class="btn btn-primary" onclick = "showPaymentMessage()">Complete Purchase</button> <br>
                <br>                
                <button type="button" class="btn btn-info" id="trackBtn">Track Your Order</button> <!-- Track Button -->            </div>
        </form>
    </div>
</section>

<script>
    // JavaScript function to show prompt message when the button is clicked
    function showPaymentMessage() {
      alert("Payment successful! Your order has been placed.");
    }
  </script>



<!-- Modal for Tracking Orders -->
<div id="trackModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Track Your Order</h2>
        <div id="orderDetails"></div>
    </div>
</div>

<script>
// JavaScript to handle the modal visibility
document.getElementById('trackBtn').onclick = function() {
    // Open the modal
    document.getElementById('trackModal').style.display = 'block';

    // Fetch order details for the user from the server
    fetchOrderDetails(); // A function to call the backend and fetch the order details for the user
}

// Close the modal when the user clicks on the close button
document.querySelector('.close-btn').onclick = function() {
    document.getElementById('trackModal').style.display = 'none';
}

// Function to fetch order details
function fetchOrderDetails() {
    const userId = <?php echo $user_id; ?>; // Assuming you have the user_id available
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch_order_details.php?user_id=' + userId, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('orderDetails').innerHTML = xhr.responseText;
        }
    }
    xhr.send();
}
</script>

<!-- Modal Styling (CSS) -->
<style>

  /* Modal Background */
.modal {
    display: none; /* Hidden by default */
    position: fixed; 
    z-index: 1000; /* Make sure the modal is on top */
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
    overflow: auto; /* Enable scrolling */
    padding-top: 100px; /* Top space for modal */
    transition: opacity 0.3s ease-in-out;
}

/* Modal Content */
.modal-content {
    background-color: #fff;
    margin: 0 auto; /* Center the modal */
    padding: 20px;
    border-radius: 10px;
    width: 80%;
    max-width: 700px; /* Limit width for large screens */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    position: relative;
    animation: slideIn 0.3s ease-out;
}

/* Close Button */
.close-btn {
    color: #aaa;
    font-size: 28px;
    font-weight: bold;
    position: absolute;
    top: 10px;
    right: 20px;
    cursor: pointer;
}

/* Close Button Hover Effect */
.close-btn:hover,
.close-btn:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* Scrollable Content */
#orderDetails {
    max-height: 400px; /* Adjust as needed */
    overflow-y: auto;
    padding-right: 10px; /* To prevent the scrollbar from hiding content */
    margin-top: 10px;
}

/* Animation for Modal */
@keyframes slideIn {
    0% {
        transform: translateY(-50px);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}

/* Mobile responsiveness */
@media screen and (max-width: 768px) {
    .modal-content {
        width: 90%;
        padding: 15px;
    }

    .close-btn {
        font-size: 24px;
        top: 5px;
        right: 10px;
    }
}

  
  


</style>


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
        updateGrandTotal();
        
        // Send the updated quantity to the server using AJAX
        updateCartQuantity(cartItemId, quantity);
    }

    // Function to update the grand total price
    function updateGrandTotal() {
        let grandTotal = 0;

        // Loop through each total price cell and sum them up
        const totalPriceElements = document.querySelectorAll('[id^="total-price-"]'); // Select all elements with IDs starting with "total-price-"
        totalPriceElements.forEach(function (element) {
            // Remove the "LKR" prefix and parse the value as a float
            const priceValue = parseFloat(element.innerText.replace('LKR', '').trim());
            if (!isNaN(priceValue)) { // Ensure the value is a valid number
                grandTotal += priceValue;
            }
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











         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

 <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Our Products</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Knowledge Base</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Delivery</a></li>
                      <li><a href="#">Returns</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Discount</a></li>
                      <li><a href="#">Special Offer</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Useful Links</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Site Map</a></li>
                      <li><a href="#">Search</a></li>
                      <li><a href="#">Advanced Search</a></li>
                      <li><a href="#">Suppliers</a></li>
                      <li><a href="#">FAQ</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p> No.21,Columbuthurai,Jaffna</p>
                      <p><span class="fa fa-phone"></span>+ 94 750906065</p>
                      <p><span class="fa fa-envelope"></span>Velvet_Vogue@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Designed by <a href="http://www.markups.io/">S.Tishalan</a></p>
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover"></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->
  <!-- / footer -->


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>  
    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
    <!-- SmartMenus jQuery Bootstrap Addon -->
    <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>  
    <!-- To Slider JS -->
    <script src="js/sequence.js"></script>
    <script src="js/sequence-theme.modern-slide-in.js"></script>  
    <!-- Product view slider -->
    <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
    <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
    <!-- slick slider -->
    <script type="text/javascript" src="js/slick.js"></script>
    <!-- Price picker slider -->
    <script type="text/javascript" src="js/nouislider.js"></script>
    <!-- Custom js -->
    <script src="js/custom.js"></script> 
    
  </body>
</html>