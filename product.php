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
    <title>Daily Shop | Product</title>
    
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
    
<script>
  function this.form.submit() {
        document.getElementById('productFilterForm').submit(); // Submit the search form automatically
      }

      function resetFilters() {
        // Set all dropdowns to "All"
        document.getElementById("category").value = "all";
        document.getElementById("priceSort").value = "1";
        document.getElementById("colorSort").value = "1";
        document.getElementById("sizeSort").value = "1";

        // Submit the form after resetting to "All"
        document.getElementById("productFilterForm").submit();
    }
     
</script>

    

  </head>
  <!-- !Important notice -->
  <!-- Only for product page body tag have to added .productPage class -->
  <body class="productPage">
    
  <style>

    /* Add this CSS to your stylesheet */

/* Style for the product container */
.aa-product-catg-body {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

/* Style for each product item */
.aa-product-catg li {
    width: 20%; /* Adjust this width to fit 4 items in one row */
    margin-bottom: 30px; /* Adds spacing between rows */
    box-sizing: border-box;
}



/* Optional: You can also add a responsive design for smaller screens */


 

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
  <section id="aa-catg-head-banner">
   <img src="Images/fashion.png" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>PRODUCT CATEGORIES</h2>
        
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->





  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <!-- <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3"> -->
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">


              <form action="product.php" method="get" class="aa-sort-form" id="productFilterForm">
    <!-- Category Filter -->
    <label for="Category">Category</label>
    <select name="category" onchange="this.form.submit()">
        <option value="all" <?php echo isset($_GET['category']) && $_GET['category'] == 'all' ? 'selected' : ''; ?>>All</option>
        <option value="men" <?php echo isset($_GET['category']) && $_GET['category'] == 'men' ? 'selected' : ''; ?>>Men</option>
        <option value="women" <?php echo isset($_GET['category']) && $_GET['category'] == 'women' ? 'selected' : ''; ?>>Women</option>
        <option value="kids" <?php echo isset($_GET['category']) && $_GET['category'] == 'kids' ? 'selected' : ''; ?>>Kids</option>
    </select>

    <!-- Price Filter -->
    <label for="priceSort">Price</label>
    <select name="priceSort" id="priceSort" onchange="this.form.submit()">
        <option value="1" <?php echo !isset($_GET['priceSort']) || $_GET['priceSort'] == '1' ? 'selected' : ''; ?>>All</option>
        <option value="asc" <?php echo isset($_GET['priceSort']) && $_GET['priceSort'] == 'asc' ? 'selected' : ''; ?>>Low to High</option>
        <option value="desc" <?php echo isset($_GET['priceSort']) && $_GET['priceSort'] == 'desc' ? 'selected' : ''; ?>>High to Low</option>
    </select>

    <!-- Color Filter -->
    <label for="colorSort">Color</label>
    <select name="colorSort" id="colorSort" onchange="this.form.submit()">
        <option value="1" <?php echo !isset($_GET['colorSort']) || $_GET['colorSort'] == '1' ? 'selected' : ''; ?>>All</option>
        <option value="green" <?php echo isset($_GET['colorSort']) && $_GET['colorSort'] == 'green' ? 'selected' : ''; ?>>Green</option>
        <option value="butter" <?php echo isset($_GET['colorSort']) && $_GET['colorSort'] == 'butter' ? 'selected' : ''; ?>>Butter</option>
        <option value="blue" <?php echo isset($_GET['colorSort']) && $_GET['colorSort'] == 'blue' ? 'selected' : ''; ?>>Blue</option>
        <option value="red" <?php echo isset($_GET['colorSort']) && $_GET['colorSort'] == 'red' ? 'selected' : ''; ?>>Red</option>
    </select>

    <!-- Size Filter -->
    <label for="sizeSort">Size</label>
    <select name="sizeSort" id="sizeSort" onchange="this.form.submit()">
        <option value="1" <?php echo !isset($_GET['sizeSort']) || $_GET['sizeSort'] == '1' ? 'selected' : ''; ?>>All</option>
        <option value="S" <?php echo isset($_GET['sizeSort']) && $_GET['sizeSort'] == 'S' ? 'selected' : ''; ?>>S</option>
        <option value="M" <?php echo isset($_GET['sizeSort']) && $_GET['sizeSort'] == 'M' ? 'selected' : ''; ?>>M</option>
        <option value="L" <?php echo isset($_GET['sizeSort']) && $_GET['sizeSort'] == 'L' ? 'selected' : ''; ?>>L</option>
        <option value="XL" <?php echo isset($_GET['sizeSort']) && $_GET['sizeSort'] == 'XL' ? 'selected' : ''; ?>>XL</option>
    </select>

    <label for="priceRange">Price Range</label>
    <select name="priceRange" id="priceRange" onchange="this.form.submit()">
        <option value="all" <?php echo !isset($_GET['priceRange']) || $_GET['priceRange'] == 'all' ? 'selected' : ''; ?>>All</option>
        <option value="0-1000" <?php echo isset($_GET['priceRange']) && $_GET['priceRange'] == '0-1000' ? 'selected' : ''; ?>>0 - 1000</option>
        <option value="1001-2000" <?php echo isset($_GET['priceRange']) && $_GET['priceRange'] == '1001-2000' ? 'selected' : ''; ?>>1001 - 2000</option>
        <option value="2001-3000" <?php echo isset($_GET['priceRange']) && $_GET['priceRange'] == '2001-3000' ? 'selected' : ''; ?>>2001 - 3000</option>
        <option value="3001-5000" <?php echo isset($_GET['priceRange']) && $_GET['priceRange'] == '3001-5000' ? 'selected' : ''; ?>>3001 - 5000</option>
        <option value="5001+" <?php echo isset($_GET['priceRange']) && $_GET['priceRange'] == '5001+' ? 'selected' : ''; ?>>5001+</option>
    </select>


    
</form>



              
                
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
    <ul class="aa-product-catg">
        <!-- start single product item -->
        <?php
// Establish connection to the database
$con = mysqli_connect("localhost", "root", "", "Velvet_vogue");

// Get filter parameters from URL (GET)
$category = isset($_GET['category']) ? $_GET['category'] : 'all';
$priceSort = isset($_GET['priceSort']) ? $_GET['priceSort'] : '1';
$colorSort = isset($_GET['colorSort']) ? $_GET['colorSort'] : '1';
$sizeSort = isset($_GET['sizeSort']) ? $_GET['sizeSort'] : '1';
$priceRange = isset($_GET['priceRange']) ? $_GET['priceRange'] : 'all';



// Start the query
$sql = "SELECT * FROM Products_details WHERE 1";

// Category filter
if ($category != 'all') {
    $sql .= " AND Category = '$category'";
}

if ($priceRange !== 'all') {
  if ($priceRange == '0-1000') {
      $sql .= " AND COALESCE(discount_price, price) BETWEEN 0 AND 1000";
  } elseif ($priceRange == '1001-2000') {
      $sql .= " AND COALESCE(discount_price, price) BETWEEN 1001 AND 2000";
  } elseif ($priceRange == '2001-3000') {
      $sql .= " AND COALESCE(discount_price, price) BETWEEN 2001 AND 3000";
  } elseif ($priceRange == '3001-5000') {
      $sql .= " AND COALESCE(discount_price, price) BETWEEN 3001 AND 5000";
  } elseif ($priceRange == '5001+') {
      $sql .= " AND COALESCE(discount_price, price) > 5000";
  }
}

if ($priceSort == 'asc') {
  // If discount price exists, order by discount price, otherwise by regular price
  $sql .= " ORDER BY 
              CASE 
                  WHEN discount_price > 0 THEN discount_price 
                  ELSE price 
              END ASC";
} elseif ($priceSort == 'desc') {
  // If discount price exists, order by discount price, otherwise by regular price
  $sql .= " ORDER BY 
              CASE 
                  WHEN discount_price > 0 THEN discount_price 
                  ELSE price 
              END DESC";
}

// Color filter (if selected)
if ($colorSort != '1') {
    $sql .= " AND FIND_IN_SET('$colorSort', Colors)";
}

// Size filter (if selected)
if ($sizeSort != '1') {
    $sql .= " AND FIND_IN_SET('$sizeSort', Size)";
}

// Execute the query
$res = $con->query($sql);
?>

<!-- Loop through each product -->
<?php while ($row = $res->fetch_assoc()) { ?>
    <li>
        <figure>
            <!-- Product Image -->
            <a class="aa-product-img"  href="product-detail.php?pid=<?php echo htmlentities($row['Product_ID']); ?>">
                <img src="Admindb/uploads/<?php echo htmlentities($row['Image']); ?>" 
                     alt="<?php echo htmlentities($row['Product_name']); ?> img" 
                     width="250" height="300">
            </a>

            <!-- Add to Cart Button -->
            <a class="aa-add-card-btn" href="cart.html">
                <span class="fa fa-shopping-cart"></span> Add To Cart
            </a>

            <figcaption>
                <!-- Product Title -->
                <h4 class="aa-product-title">
                    <a href="product-details.php?pid=<?php echo htmlentities($row['Product_ID']); ?>">
                        <?php echo htmlentities($row['Product_name']); ?>
                    </a>
                </h4>

                <!-- Product Price -->
                <?php if ($row['Discount_Price'] > 0) { ?>
                    <span class="aa-product-price">
                        LKR <?php echo htmlentities($row['Discount_Price']); ?>
                    </span>
                    <span class="aa-product-price">
                        <del>LKR <?php echo htmlentities($row['Price']); ?></del>
                    </span>
                <?php } else { ?>
                    <span class="aa-product-price">LKR <?php echo htmlentities($row['Price']); ?></span>
                <?php } ?>
            </figcaption>
        </figure>

        <!-- Product Availability -->
        <?php if ($row['Availability'] == 'in_stock') { ?>
            <span class="aa-badge aa-sale" href="#">In Stock!</span>
        <?php } else { ?>
            <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
        <?php } ?>
    </li>
<?php } ?>
                                          
    </ul>
    


                                          
    


            









              

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



<!-- <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a> -->
