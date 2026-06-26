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

// Store the username in a PHP variable
$username = htmlentities($user['username']);
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Daily Shop | Home</title>
    
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">   
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">    
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <link id="switcher" href="css/style.css" rel="stylesheet">
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">
    <link href="css/style.css" rel="stylesheet">    
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href="css/theme-color/pink-theme.css" rel="stylesheet">
    
   

  </head>
  <body> 

  <style>

    /* Add this CSS to your stylesheet */

/* Style for the product container */
.product-container {
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
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
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
                <a href="index.php">
                  <span class="fa fa-shopping-cart"></span>
                  <p>Velvet<strong>Vogue</strong> <span>Your Shopping Partner</span></p>
                </a>                
              </div>

              <!-- search box -->


              <div class="aa-search-box">
                <form action="">
                  <input type="text" name="" id="" placeholder="Search here... ">
                  <button type="submit" ><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->      
               
              
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
               </ul>
              </li>
            </ul>
          </div> 
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->
  <!-- Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="Images\menslide.png" alt="Men slide img" />
              </div>
              <div class="seq-title">
               <span data-seq >Save Up to 75% Off</span>                
                <h2 data-seq>Men Collection</h2>                
                <p data-seq>" Redefine Your Style with Our Premium Men's Collection "</p>
                <a data-seq href="prodcut.php" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="Images\womenslide.png" alt="Wristwatch slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 40% Off</span>                
                <h2 data-seq>Women Collection</h2>                
                <p data-seq>" Fashion that inspires confidence is waiting for you at Velvet Vogue for women "</p>
                <a data-seq href="prodcut.php" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
                      
            <li>
              <div class="seq-model">
                <img data-seq src="Images/shoe.png" alt="Shoes slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 75% Off</span>                
                <h2 data-seq>Exclusive Shoes</h2>                
                <p data-seq>" Walk with confidence by shopping our curated collection of exclusive footwear "</p>
                <a data-seq href="prodcut.php" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
            <!-- single slide item -->  
             <li>
              <div class="seq-model">
                <img data-seq src="Images/new.png" alt="Male Female slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 50% Off</span>                
                <h2 data-seq>Best Collection</h2>                
                <p data-seq>" Where quality meets style, explore our best selection "</p>
                <a data-seq href="prodcut.php" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>                   
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider -->
  <!-- Start Promo section -->
  <section id="aa-promo">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-promo-area">
            <div class="row">
              <!-- promo left -->
              <div class="col-md-5 no-padding">                
                <div class="aa-promo-left">
                  <div class="aa-promo-banner">                    
                    <img src="Images/women.png" alt="img">                    
                    <div class="aa-prom-content">
                      <span>75% Off</span>
                      <h4><a href="prodcut.php">For Women</a></h4>                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- promo right -->
              <div class="col-md-7 no-padding">
                <div class="aa-promo-right">
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="Images/men.png" alt="img">                      
                      <div class="aa-prom-content">
                        <span>Exclusive Item</span>
                        <h4><a href="prodcut.php">For Men</a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="Images/shoes1.png" alt="img">                      
                      <div class="aa-prom-content">
                        <span>Sale Off</span>
                        <h4><a href="prodcut.php">On Shoes</a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="Images/kids.png" alt="img">                      
                      <div class="aa-prom-content">
                        <span>New Arrivals</span>
                        <h4><a href="prodcut.php">For Kids</a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="Images/bags.png" alt="img">                      
                      <div class="aa-prom-content">
                        <span>25% Off</span>
                        <h4><a href="prodcut.php">For Bags</a></h4>                        
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
  </section>
  <!-- / Promo section -->
  <!-- Products section -->
  <!-- <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">


                 <ul class="nav nav-tabs aa-products-tab">
                    <li class="active"><a href="#men" data-toggle="tab">Men</a></li>
                    <li><a href="#women" data-toggle="tab">Women</a></li>
                    <li><a href="#Kids" data-toggle="tab">Kids</a></li>
                  </ul> -->
                  <!-- Tab panes -->
                  <section id="aa-product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="aa-product-area">
                        <div class="aa-product-inner">
                            <!-- Start product navigation -->
                            <ul class="nav nav-tabs aa-products-tab">
                                <li class="active"><a href="#men" data-toggle="tab">Men</a></li>
                                <li><a href="#women" data-toggle="tab">Women</a></li>
                                <li><a href="#kids" data-toggle="tab">Kids</a></li>
                            </ul>

                            <!-- Tab panes -->
<div class="tab-content">
    <!-- Men Category -->
    <div class="tab-pane fade in active" id="men">
        <div class="product-container">
            <ul class="aa-product-catg">
                <?php
                $con = mysqli_connect("localhost", "root", "", "Velvet_vogue");
                $sql = "SELECT * FROM Products_details WHERE Category = 'men'";
                $res = $con->query($sql);
                while ($row = $res->fetch_assoc()) {
                ?>
                    <li>
                        <figure>
                            <a class="aa-product-img">
                                <img src="Admindb/uploads/<?php echo htmlentities($row['Image']); ?>" alt="<?php echo htmlentities($row['Product_name']); ?> img" width="250" height="300">
                            </a>
                            <a class="aa-add-card-btn" href="prodcut.php"><span class="fa fa-shopping-cart"></span> Add To Cart</a>
                            <figcaption>
                                <h4 class="aa-product-title">
                                    <a href="product-details.php?pid=<?php echo htmlentities($row['Product_ID']); ?>">
                                        <?php echo htmlentities($row['Product_name']); ?>
                                    </a>
                                </h4>
                                <?php
                                if ($row['Discount_Price'] > 0) {
                                ?>
                                    <span class="aa-product-price">LKR <?php echo htmlentities($row['Discount_Price']); ?></span>
                                    <span class="aa-product-price"><del>LKR <?php echo htmlentities($row['Price']); ?></del></span>
                                <?php
                                } else {
                                ?>
                                    <span class="aa-product-price">LKR <?php echo htmlentities($row['Price']); ?></span>
                                <?php
                                }
                                ?>
                            </figcaption>
                        </figure>
                        <div class="aa-product-hvr-content"></div>
                        <?php
                        if ($row['Availability'] == 'in_stock') {
                        ?>
                            <span class="aa-badge aa-sale" href="#">In Stock!</span>
                        <?php
                        } else {
                        ?>
                            <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                        <?php
                        }
                        ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <!-- Women Category -->
    <div class="tab-pane fade" id="women">
        <div class="product-container">
            <ul class="aa-product-catg">
                <?php
                $sql = "SELECT * FROM Products_details WHERE Category = 'women'";
                $res = $con->query($sql);
                while ($row = $res->fetch_assoc()) {
                ?>
                    <li>
                        <figure>
                            <a class="aa-product-img" href="product-details.php?pid=<?php echo htmlentities($row['Product_ID']); ?>">
                                <img src="Admindb/uploads/<?php echo htmlentities($row['Image']); ?>" alt="<?php echo htmlentities($row['Product_name']); ?> img" width="250" height="300">
                            </a>
                            <a class="aa-add-card-btn" href="prodcut.php"><span class="fa fa-shopping-cart"></span> Add To Cart</a>
                            <figcaption>
                                <h4 class="aa-product-title">
                                    <a href="product-details.php?pid=<?php echo htmlentities($row['Product_ID']); ?>">
                                        <?php echo htmlentities($row['Product_name']); ?>
                                    </a>
                                </h4>
                                <?php
                                if ($row['Discount_Price'] > 0) {
                                ?>
                                    <span class="aa-product-price">LKR <?php echo htmlentities($row['Discount_Price']); ?></span>
                                    <span class="aa-product-price"><del>LKR <?php echo htmlentities($row['Price']); ?></del></span>
                                <?php
                                } else {
                                ?>
                                    <span class="aa-product-price">LKR <?php echo htmlentities($row['Price']); ?></span>
                                <?php
                                }
                                ?>
                            </figcaption>
                        </figure>
                        <div class="aa-product-hvr-content"></div>
                        <?php
                        if ($row['Availability'] == 'in_stock') {
                        ?>
                            <span class="aa-badge aa-sale" href="#">In Stock!</span>
                        <?php
                        } else {
                        ?>
                            <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                        <?php
                        }
                        ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <!-- Kids Category -->
    <div class="tab-pane fade" id="kids">
        <div class="product-container">
            <ul class="aa-product-catg">
                <?php
                $sql = "SELECT * FROM Products_details WHERE Category = 'kids'";
                $res = $con->query($sql);
                while ($row = $res->fetch_assoc()) {
                ?>
                    <li>
                        <figure>
                            <a class="aa-product-img">
                                <img src="Admindb/uploads/<?php echo htmlentities($row['Image']); ?>" alt="<?php echo htmlentities($row['Product_name']); ?> img" width="250" height="300">
                            </a>
                            <a class="aa-add-card-btn" href="prodcut.php"><span class="fa fa-shopping-cart"></span> Add To Cart</a>
                            <figcaption>
                                <h4 class="aa-product-title">
                                    <a href="product-details.php?pid=<?php echo htmlentities($row['Product_ID']); ?>">
                                        <?php echo htmlentities($row['Product_name']); ?>
                                    </a>
                                </h4>
                                <?php
                                if ($row['Discount_Price'] > 0) {
                                ?>
                                    <span class="aa-product-price">LKR <?php echo htmlentities($row['Discount_Price']); ?></span>
                                    <span class="aa-product-price"><del>LKR <?php echo htmlentities($row['Price']); ?></del></span>
                                <?php
                                } else {
                                ?>
                                    <span class="aa-product-price">LKR <?php echo htmlentities($row['Price']); ?></span>
                                <?php
                                }
                                ?>
                            </figcaption>
                        </figure>
                        <div class="aa-product-hvr-content"></div>
                        <?php
                        if ($row['Availability'] == 'in_stock') {
                        ?>
                            <span class="aa-badge aa-sale" href="#">In Stock!</span>
                        <?php
                        } else {
                        ?>
                            <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                        <?php
                        }
                        ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>


                            <!-- Browse all Product Button -->
                            <div class="text-center">
                                <a class="aa-browse-btn" href="prodcut.php">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                                <br>
                                <br>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
                    <!-- / sports product category -->
                                  
                  <!-- quick view modal -->                  
                  <!-- <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">                      
                        <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <div class="row"> -->

  <!-- banner section -->
   <br>
   
   

  <section id="aa-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="Images\banner.png" alt="Fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>

  </section>
 
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>FREE SHIPPING</h4>
                <P>" Get free shipping on all orders, so you don't have to pay extra for delivery "</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 DAYS MONEY BACK</h4>
                <P>" Enjoy our 30-day money-back guarantee, so you can shop without worry "</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>SUPPORT 24/7</h4>
                <P>" We offer 24/7 support to help you with any questions or issues at any time "</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>    
  </section>
  

  <!-- footer --> 
   <br>
   <br>

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
                    <li><a href="">Home</a></li>
                    <li><a href="">Our Services</a></li>
                    <li><a href="">Our Products</a></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Knowledge Base</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="">Delivery</a></li>
                      <li><a href="">Returns</a></li>
                      <li><a href="">Services</a></li>
                      <li><a href="">Discount</a></li>
                      <li><a href="">Special Offer</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Useful Links</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="">Site Map</a></li>
                      <li><a href="">Search</a></li>
                      <li><a href="">Advanced Search</a></li>
                      <li><a href="">Suppliers</a></li>
                      <li><a href="">FAQ</a></li>
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
                      <a href=""><span class="fa fa-facebook"></span></a>
                      <a href=""><span class="fa fa-twitter"></span></a>
                      <a href=""><span class="fa fa-google-plus"></span></a>
                      <a href=""><span class="fa fa-youtube"></span></a>
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

  <!-- Welcome Modal -->
<div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="welcomeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="welcomeModalLabel">Welcome</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Welcome, <span id="usernamePlaceholder"></span>!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

 

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

  <script>
    // Display a welcome message with the username
    window.onload = function() {
        const username = "<?php echo $username; ?>";  // Pass the username from PHP to JavaScript
        alert(`Welcome back, ${username}!`);  // Display the welcome message in an alert box
    };
</script>



  </body>
</html>