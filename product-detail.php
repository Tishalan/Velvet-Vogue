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
    <title>Daily Shop | Product Detail</title>
    
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

.aa-product-catg-body {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

/* Style for each product item */
#aa-product-related-item .aa-product-catg aa-related-item-slider .aa-product-img
 {
    width: 70%; /* Adjust this width to fit 4 items in one row */
    margin-bottom: 30px; /* Adds spacing between rows */
    box-sizing: border-box;
}
/* Styling the Color Checkboxes */
.aa-sidebar-widget .aa-color-tag {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
}

.aa-sidebar-widget .aa-color-tag input[type="checkbox"] {
  position: absolute;
  visibility: hidden;
}

.aa-sidebar-widget .aa-color-tag label {
  display: inline-block;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  border: 1px solid #ddd;
  cursor: pointer;
}

.aa-sidebar-widget .aa-color-green {
  background-color: green;
}

.aa-sidebar-widget .aa-color-butter {
  background-color: #F0E2B6;
}

.aa-sidebar-widget .aa-color-blue {
  background-color: blue;
}

.aa-sidebar-widget .aa-color-red {
  background-color: #E10600;
}

.aa-sidebar-widget input[type="checkbox"]:checked + label {
  border: 3px solid #000;
}

.aa-sidebar-widget label:hover {
  opacity: 0.8;
}

/* Styling the Size Checkboxes */
.size-checkbox-group {
  display: flex;
  gap: 15px;
  align-items: center;
  margin-top: 10px;
}

.size-checkbox-group input[type="checkbox"] {
  display: none; /* Hide the actual checkbox */
}

/* Style for the labels (styled as buttons) */
.size-checkbox-group label {
  padding: 5px 20px;
  background-color: #f1f1f1;
  border-radius: 30px;
  font-size: 16px;
  font-weight: 600;
  text-align: center;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Hover effect on labels */
.size-checkbox-group label:hover {
  background-color: #007bff;
  color: white;
  box-shadow: 0 6px 12px rgba(0, 123, 255, 0.3);
  transform: translateY(-2px);
}

/* Style for the checked labels */
.size-checkbox-group input[type="checkbox"]:checked + label {
  background-color: #007bff;
  color: white;
  box-shadow: 0 6px 12px rgba(0, 123, 255, 0.3);
  transform: translateY(-2px);
}

/* Active state when clicking the label */
.size-checkbox-group label:active {
  transform: translateY(2px);
}

/* Label text color change when checked */
.size-checkbox-group input[type="checkbox"]:checked + label {
  background-color: #007bff;
  color: #fff;
}

.size-checkbox-group input[type="checkbox"]:checked + label:hover {
  background-color: #0056b3;
  box-shadow: 0 6px 12px rgba(0, 86, 179, 0.3);
}

/* Responsive Design: Ensure labels are aligned in a row but wrap in small screens */
@media (max-width: 768px) {
  .size-checkbox-group {
    justify-content: center;
  }

  .size-checkbox-group label {
    font-size: 14px;
    padding: 8px 16px;
  }
}

/* General Styles */
/* body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    color: #333;
} */

/* .container {
    width: 100%;
    margin: 0 auto;
    padding: 40px 20px;
} */

.aa-product-view-content h3 {
    font-size: 26px;
    font-weight: 300;
    font-family: 'Arial', sans-serif;  
    color: #333;
    margin-bottom: 20px;
    text-transform: uppercase;

}

#aa-product-view-content p {
    font-size: 16px;
    line-height: 1.6;
    color: #333;
    margin: 10px 0;
    font-family: 'Arial', sans-serif;
    font-weight: 400;
    margin-bottom: 10px;
}

/* Product View Section */
.aa-product-view-slider {
    margin-bottom: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.simpleLens-gallery-container {
    max-width: 500px;
}

.simpleLens-container {
    position: relative;
}

.simpleLens-lens-image img {
    width: 100%;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.aa-product-view-content {
    max-width: 600px;
    margin-left: 30px;
}

.aa-price-block {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    font-size: 20px;
    font-weight: 300; 
}

.aa-product-view-price {
    font-size: 20px;
    font-weight: 400;
    color: #ff2851; /* Trendy pink for pricing */
}

.aa-product-availability {
    font-size: 15px;
    color: #333;
    
}

#aa-prod-quantity .aa-prod-category {
    font-size: 16px;
    font-weight: 300;
    color: #333;
    
}

.aa-prod-quantity {
    margin-bottom: 20px;
}

.aa-add-to-cart-btn {
    background-color: #ff2851; /* Trendy pink for buttons */
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: 600;
    border-radius: 30px;
    text-decoration: none;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.aa-add-to-cart-btn:hover {
    background-color: #d81b60;
    transform: translateY(-3px);
}

/* Responsiveness */
@media screen and (max-width: 768px) {
    .aa-product-view-slider {
        max-width: 100%;
    }

    .aa-product-view-content {
        max-width: 100%;
        margin-left: 0;
        margin-top: 20px;
    }
}

@media screen and (max-width: 480px) {
    .aa-product-view-content {
        padding: 10px;
    }

    h3 {
        font-size: 22px;
    }

    .aa-price-block {
        flex-direction: column;
        align-items: flex-start;
    }

    .aa-add-to-cart-btn {
        width: 100%;
        padding: 15px;
        font-size: 20px;
    }
}


/* Modal Styling */
.simpleLens-lens-image img {
    transition: transform 0.3s ease;
}

.simpleLens-lens-image img:hover {
    transform: scale(1.05);
}

.aa-prod-quantity {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Custom Size and Color (Already added) */
.size-checkbox-group {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
}

.size-checkbox-group label {
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    transition: color 0.3s ease;
}

/* .size-checkbox-group input[type="checkbox"]:checked + label {
    color: #E91E63;
    font-weight: 600;
} */

.aa-color-tag {
    display: flex;
    gap: 10px;
}

.aa-color-tag label {
    display: block;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 2px solid #ccc;
    cursor: pointer;
    transition: transform 0.3s ease, border-color 0.3s ease;
}

.aa-color-tag label:hover {
    transform: scale(1.1);
    border-color: #E91E63;
}

/* Fancy Hover Effects */
.aa-product-view-content h4 {
    font-size: 18px;
    font-family: 'Arial', sans-serif;
    font-weight: 400;
    margin-bottom: 10px;
    color: #333;
}

.aa-price-block span {
    font-weight: 600;
    color: #E91E63;
}

.aa-add-to-cart-btn {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.aa-add-to-cart-btn:focus {
    outline: none;
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
  <!-- / menu -->  
 
  <!-- catg header banner section -->

  <?php
// Database Connection
$con = mysqli_connect("localhost", "root", "", "Velvet_vogue");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get Product ID from URL
$product_id = isset($_GET['pid']) ? $_GET['pid'] : 0;

// Fetch product details from the database based on the product ID
$sql = "SELECT * FROM Products_details WHERE Product_ID = '$product_id'";
$result = $con->query($sql);
$product = $result->fetch_assoc();

// Check if product exists
if (!$product) {
    echo "Product not found!";
    exit;
}
?>


  
  <section id="aa-catg-head-banner">
   <img src="Images/Fashion.png" alt="fashion img" class="img-fashion">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2><?php echo htmlentities($product['Product_name']); ?></h2>
        <!-- <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>         
          <li><a href="#">Product</a></li>
          <li class="active">T-shirt</li>
        </ol> -->
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                

















                <!-- Modal view content -->


<div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-lens-image"><img src="Admindb/uploads/<?php echo htmlentities($product['Image']); ?>" class="simpleLens-big-image"></a></div>
                      </div>
                     
                    </div>
                  </div>
                </div> 

                <div class="col-md-7 col-sm-7 col-xs-12">
    <div class="aa-product-view-content">
        <!-- Product Title -->
        <h3><?php echo htmlentities($product['Product_name']); ?></h3>
        <div class="aa-price-block">
            <span class="aa-product-view-price">LKR <?php echo htmlentities($product['Discount_Price'] > 0 ? $product['Discount_Price'] : $product['Price']); ?></span>
            <p class="aa-product-availability">Availability: <span><?php echo $product['Availability'] == 'in_stock' ? 'In stock' : 'Sold out'; ?></span></p>
        </div>
        <p>Description: <?php echo htmlentities($product['Description']); ?></p>

        <!-- Sizes -->
        <h4>Available Size</h4>
        <div class="size-checkbox-group">
            <?php
            // Convert the sizes into an array and display each one as a styled button
            $sizes = explode(",", $product['Size']);
            foreach ($sizes as $size) {
                echo "<input type='checkbox' id='size_$size' name='size' value='$size' style='display: none;'>
                      <label for='size_$size'>$size</label>";
            }
            ?>
        </div>

        <!-- Colors -->
        <h4> Available Color</h4>
        <div class="aa-sidebar-widget">
            <div class="aa-color-tag">
                <?php
                // Convert the colors into an array and display each one as a circular color tag
                $colors = explode(",", $product['Colors']);
                foreach ($colors as $color) {
                    echo "<input type='checkbox' id='color_$color' name='color' value='$color' style='display: none;'>
                          <label class='aa-color-$color' for='color_$color'></label>";
                }
                ?>
            </div>
        </div>

        <!-- Category -->
        <div class="aa-prod-quantity">
            <p class="aa-prod-category">
                Category: <a href="#"><?php echo htmlentities($product['category']); ?></a>
            </p>
        </div>

        <!-- Add to Cart Button -->
        <div class="aa-prod-view-bottom">
            <a class="aa-add-to-cart-btn" href="">Add To Cart</a>
        </div>
    </div>
</div>




















<!-- Related product -->
<div class="aa-product-related-item">
  <h3>Related Products</h3>
  <ul class="aa-product-catg aa-related-item-slider">
    <?php
    // Fetch related products based on category
    $category = $product['category'];  // Assuming 'category' is in the product table
    $related_sql = "SELECT * FROM Products_details WHERE category = '$category' AND Product_ID != '$product_id' LIMIT 6"; // Fetch 6 related products
    $related_result = $con->query($related_sql);

    // Check if there are related products
    if ($related_result->num_rows > 0) {
      while ($related_product = $related_result->fetch_assoc()) {
        $related_product_id = htmlentities($related_product['Product_ID']);
        $related_product_name = htmlentities($related_product['Product_name']);
        $related_product_price = htmlentities($related_product['Price']);
        $related_product_discount_price = htmlentities($related_product['Discount_Price']);
        $related_product_image = "Admindb/uploads/" . htmlentities($related_product['Image']);
    ?>
    <!-- Start single product item -->
    <li>
      <figure>
        <a class="aa-product-img" href="product-detail.php?pid=<?php echo $related_product_id; ?>"><img src="<?php echo $related_product_image; ?>" alt="<?php echo $related_product_name; ?>"></a>
        <a class="aa-add-card-btn" href="cart.html"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
        <figcaption>
          <h4 class="aa-product-title"><a href="product-detail.php?pid=<?php echo $related_product_id; ?>"><?php echo $related_product_name; ?></a></h4>
          <span class="aa-product-price">LKR <?php echo $related_product_discount_price > 0 ? $related_product_discount_price : $related_product_price; ?></span>
          <?php if ($related_product_discount_price > 0) { ?>
            <span class="aa-product-price"><del>LKR <?php echo $related_product_price; ?></del></span>
          <?php } ?>
        </figcaption>
      </figure>
      <div class="aa-product-hvr-content"> 
      </div>
      <!-- Product badge (optional) -->
      <?php if ($product['Availability'] == 'in_stock') { ?>
            <span class="aa-badge aa-sale" href="#">In Stock!</span>
        <?php } else { ?>
            <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
        <?php } ?>
    </li>
    <?php
      }
    } else {
      echo "<li>No related products found!</li>";
    }
    ?>
  </ul>
</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <!-- / product category -->



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

  <script>

  document.querySelector('.aa-add-to-cart-btn').addEventListener('click', function(e) {
    e.preventDefault();  // Prevent the default behavior of the button

    let selectedSize = document.querySelectorAll('input[name="size"]:checked');
    let selectedColor = document.querySelectorAll('input[name="color"]:checked');

    // Check if more than one size is selected
    if (selectedSize.length > 1) {
        alert("Please select only one size.");
        return;  // Prevent form submission
    }

    // Check if more than one color is selected
    if (selectedColor.length > 1) {
        alert("Please select only one color.");
        return;  // Prevent form submission
    }

    // Validate if both size and color are selected
    if (selectedSize.length === 0 || selectedColor.length === 0) {
        alert('Please select both size and color.');
        return;  // Prevent form submission
    }

    // Get the values from the selected checkboxes
    selectedSize = selectedSize[0].value;  // Get the value of the selected size
    selectedColor = selectedColor[0].value;  // Get the value of the selected color

    // Send the data to the backend using a GET request with the product ID, size, and color
    window.location.href = `Addcart.php?pid=<?php echo $product['Product_ID']; ?>&size=${selectedSize}&color=${selectedColor}`;
});

</script>






    
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