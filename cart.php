
<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');  // Redirect to login if not logged in
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
    <title>Daily Shop | Cart Page</title>
    
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
    /* General Styles for the Cart Section */
#cart-view {
  background-color: #F5E7DE;
  padding: 30px 0;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
}

/* Cart Table */
.cart-view-table table {
  width: 100%;
  border-collapse: collapse;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  background-color: #fff;
  margin-top: 20px;
  border-radius: 10px;
  overflow: hidden;
}

.cart-view-table th, .cart-view-table td {
  padding: 8px;
  text-align: center;
  font-size: 12px;
  font-family: 'Arial', sans-serif;
  color: #333;
}

.cart-view-table th {
  background-color:rgb(95, 88, 65);
  color: white;
  font-weight: bold;
  text-transform: uppercase;
}

.cart-view-table td {
  background-color: #f9f9f9;
  font-size: 16px;
  line-height: 1.5;
}

.cart-view-table tr:nth-child(even) td {
  background-color: #f1f1f1;
}

/* Product Image Style */
.cart-view-table img {
  width: 80px;
  height: 80px;
  object-fit: cover;
  border-radius: 5px;
}

/* Input and Button Style */
.cart-view-table input[type="number"] {
  padding: 5px;
  width: 60px;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.cart-view-table button {
  padding: 8px 16px;
  background-color: #007bff;
  border: none;
  color: white;
  font-size: 14px;
  cursor: pointer;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

.cart-view-table button:hover {
  background-color: #0056b3;
}

/* Delete Button Style */
.cart-view-table button[name="delete_item"] {
  background-color: #dc3545;
}

.cart-view-table button[name="delete_item"]:hover {
  background-color: #c82333;
}

/* Total Price Style */
#cart-view p {
  font-size: 18px;
  font-weight: bold;
  color: #333;
  margin-top: 20px;
  margin-left: 41%;

}

#cart-view a {

  display: inline-block;
  background-color: #28a745;
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
  text-decoration: none;
  font-weight: bold;
  transition: background-color 0.3s ease;
  margin-top: 20px;
  text-align: center;
  margin-left: 42%;
}

#cart-view a:hover {
  background-color: #218838;
}

/* Responsive Design */
@media (max-width: 768px) {
  .cart-view-table th, .cart-view-table td {
    font-size: 14px;
    padding: 10px;
  }

  .cart-view-table img {
    width: 60px;
    height: 60px;
  }

  #cart-view p {
    font-size: 16px;
    text-align: left;
  }

  #cart-view a {
    width: 100%;
    text-align: center;
    margin-top: 10px;
  }
}

  </style>
    
   
   <!-- wpf loader Two -->
     <!-- wpf loader Two -->
     <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
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
                  <li class="hidden-xs"><a href="">My Profile</a></li>
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
                <a href="product.php">
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
  <!-- / menu -->  
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="Images\mycart.jpg" alt="fashion img" height = "300px" width = "1920px" >
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="product.php">Home</a></li>                   
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
























<!-- Cart view section -->
<section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">

           <?php
$con = mysqli_connect("localhost", "root", "", "Velvet_vogue"); // Database connection

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

  // Assuming the user is logged in and we have user_id in session

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
                <th>Price (LKR)</th>
                <!-- <th>Quantity</th> -->
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
                <!-- <td><?php echo htmlentities($row['color']); ?></td> -->
                <td>LKR <?php echo number_format($price, 2); ?></td>
                <!-- <td>
                    <input type="number" name="quantity" value="<?php echo $quantity; ?>" min="1" max="10" style="width: 50px;" class="quantity" data-price="<?php echo $price; ?>" data-id="<?php echo $cart_item_id; ?>" onchange="updateTotalPrice(this)">
                </td> -->
                <td class="total-price" id="total-price-<?php echo $cart_item_id; ?>">LKR <?php echo number_format($total_price_for_item, 2); ?></td>
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
    <p style="font-weight: bold; margin-top: 20px;" id="grand-total">Total Price: LKR <?php echo number_format($total_price, 2); ?></p>

<?php
} else {
    echo "<p>Your cart is empty.</p>";
}

?>

<!-- Proceed to checkout -->
<a href="checkout.php" style="margin-top: 20px; display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; font-weight: bold;">Proceed to Checkout</a>
 </section>

 <script>
    // Function to update total price in real-time
    function updateTotalPrice(element) {
        const price = parseFloat(element.getAttribute('data-price')); // Price per unit
        const quantity = parseInt(element.value); // New quantity
        const cartItemId = element.getAttribute('data-id'); // Order ID

        // Calculate the total price for this item
        const totalPrice = price * quantity;

        // Update the total price for this item in the table
        document.getElementById('total-price-' + cartItemId).innerHTML = 'LKR ' + totalPrice.toFixed(2);

        // Update the grand total
        updateGrandTotal();
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
        document.getElementById('grand-total').innerText = 'Total Price: LKR ' + grandTotal.toFixed(2);
    }
</script>

























 


  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->

  <!-- footer -->  
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