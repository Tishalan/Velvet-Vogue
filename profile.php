
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
    <title>Daily Shop | Contact Page</title>
    
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
    /* General body styling */
/* body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
} */

/* Container for the profile form */
h1 {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: #333;
}

/* Form container styling */
form {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
    box-sizing: border-box;
    position: center;
}

/* Label styling */
form label {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 5px;
    display: block;
}

/* Input fields styling */
form input[type="text"],
form input[type="email"],
form input[type="file"] {
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    margin-bottom: 20px;
    border-radius: 8px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

form input[type="text"]:focus,
form input[type="email"]:focus,
form input[type="file"]:focus {
    border-color: #0056b3;
    outline: none;
}

/* Image styling for the profile picture */
form img {
    border-radius: 50%;
    margin-bottom: 10px;
}

/* Submit button styling */
form input[type="submit"] {
    background-color: #0056b3;
    color: #fff;
    border: none;
    padding: 12px;
    font-size: 1.2rem;
    width: 100%;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s;
}

form input[type="submit"]:hover {
    background-color: #004494;
}

/* Spacing and responsiveness */
@media (max-width: 600px) {
    h1 {
        font-size: 2rem;
    }

    form {
        padding: 20px;
    }

    form input[type="submit"] {
        font-size: 1rem;
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
                <li class="hidden-xs"><a href="index.php"> Home</a></li>                  
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
                <a href="product.php">
                  <span class="fa fa-shopping-cart"></span>
                  <p>Velvet<strong>Vogue</strong> <span>Your Shopping Partner</span></p>
                </a>                
              </div>

              <!-- search box -->

<!-- 
              <div class="aa-search-box">
                <form action="">
                  <input type="text" name="" id="" placeholder="Search here... ">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div> -->
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
        <h2>Inquiry Page</h2>
        <ol class="breadcrumb">
          <li><a href="product.php">Home</a></li>                   
        </ol>
      </div>
     </div>
   </div>
  </section>
  





















<!-- Cart view section -->
<section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
           <?php
$servername = "localhost";
$username = "root";  // MySQL username
$password = "";      // MySQL password
$dbname = "velvet_vogue";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit;
}

// Fetch user details from the session
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Fetch existing shipping details if available
$shipping_stmt = $conn->prepare("SELECT * FROM shipping_details WHERE user_id = ?");
$shipping_stmt->bind_param("i", $user_id);
$shipping_stmt->execute();
$shipping_result = $shipping_stmt->get_result();
$shipping = $shipping_result->fetch_assoc();

// Handle profile and shipping details update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];
    $new_phonenumber = $_POST['phonenumber'];
    $new_image = null;

    // Handle profile image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = "Admindb/uploads/" . $image_name;
        move_uploaded_file($image_tmp, $image_path);
        $new_image = $image_path;
    }

    // Update the user details
    $update_query = "UPDATE users SET username = ?, email = ?, phonenumber = ?";
    if ($new_image) {
        $update_query .= ", profile_image = ?";
    }
    $update_query .= " WHERE user_id = ?";
    
    $stmt = $conn->prepare($update_query);
    if ($new_image) {
        $stmt->bind_param("ssssi", $new_username, $new_email, $new_phonenumber, $new_image, $user_id);
    } else {
        $stmt->bind_param("sssi", $new_username, $new_email, $new_phonenumber, $user_id);
    }
    
    if ($stmt->execute()) {
        echo "<script>alert('Profile updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating profile.');</script>";
    }

    // Handle shipping details update
    $shipping_address = $_POST['shipping_address'];
    $shipping_city = $_POST['shipping_city'];
    $shipping_state = $_POST['shipping_state'];
    $shipping_country = $_POST['shipping_country'];

    if ($shipping) {
        // Update existing shipping details
        $shipping_update_query = "UPDATE shipping_details SET shipping_address = ?, shipping_city = ?, shipping_state = ?, shipping_country = ? WHERE user_id = ?";
        $stmt = $conn->prepare($shipping_update_query);
        $stmt->bind_param("ssssi", $shipping_address, $shipping_city, $shipping_state, $shipping_country, $user_id);
    } else {
        // Insert new shipping details
        $shipping_insert_query = "INSERT INTO shipping_details (user_id, shipping_address, shipping_city, shipping_state, shipping_country) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($shipping_insert_query);
        $stmt->bind_param("issss", $user_id, $shipping_address, $shipping_city, $shipping_state, $shipping_country);
    }

    if ($stmt->execute()) {
        echo "<script>alert('Shipping details updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating shipping details.');</script>";
    }
}

// Fetch updated user and shipping details
$stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$shipping_stmt = $conn->prepare("SELECT * FROM shipping_details WHERE user_id = ?");
$shipping_stmt->bind_param("i", $user_id);
$shipping_stmt->execute();
$shipping_result = $shipping_stmt->get_result();
$shipping = $shipping_result->fetch_assoc();

$conn->close();
?>

<h1>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h1>
<form action="" method="POST" enctype="multipart/form-data">
    <h2>Profile Details</h2>
    <label for="username">Username:</label>
    <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br>

    <label for="phonenumber">Phone Number:</label>
    <input type="text" name="phonenumber" value="<?php echo htmlspecialchars($user['phonenumber']); ?>" required><br>

    <label for="image">Profile Image:</label>
    <?php if ($user['profile_image']): ?>
        <img src="<?php echo htmlspecialchars($user['profile_image']); ?>" alt="Profile Image" width="100">
    <?php endif; ?>
    <input type="file" name="image"><br>

    <h2>Shipping Details</h2>
    <label for="shipping_address">Shipping Address:</label>
    <input type="text" name="shipping_address" value="<?php echo htmlspecialchars($shipping['shipping_address'] ?? ''); ?>" required><br>

    <label for="shipping_city">Shipping City:</label>
    <input type="text" name="shipping_city" value="<?php echo htmlspecialchars($shipping['shipping_city'] ?? ''); ?>" required><br>

    <label for="shipping_state">Shipping State:</label>
    <input type="text" name="shipping_state" value="<?php echo htmlspecialchars($shipping['shipping_state'] ?? ''); ?>" required><br>

    <label for="shipping_country">Shipping Country:</label>
    <input type="text" name="shipping_country" value="<?php echo htmlspecialchars($shipping['shipping_country'] ?? ''); ?>" required><br>

    <input type="submit" name="update" value="Update Profile and Shipping Details">
</form>








     </div>
   </div>
</section>

























 


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