
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
        /* General Styles */
        /* body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        } */

        h2 {
            text-align: center;
            color: #333;
            margin-top: 30px;
        }

        /* Cart View Container */
        #cart-view {
            background-color:rgba(244, 232, 214, 0.89);
            padding: 30px 0;
            margin: 30px 0;
        }

        #cart-view .container {
            width: 50%;
            margin: 0 auto;
        }

        .cart-view-area {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: #ffffff;
            transition: box-shadow 0.3s ease;
        }

        .cart-view-area:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
            gap: 2px;
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            color: #555;
        }

        input[type="email"],
        input[type="tel"],
        input[type="text"],
        textarea {
            padding: 12px 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="tel"]:focus,
        input[type="text"]:focus,
        textarea:focus {
            border-color: #4caf50;
            outline: none;
        }

        textarea {
            resize: vertical;
        }

        /* Submit Button */
        button {
            padding: 12px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }

            form {
                width: 100%;
            }

            button {
                padding: 14px 25px;
            }
        }

        /* General styles for the table */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    font-family: 'Arial', sans-serif;
    background-color: #f9f9f9;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

thead {
    background-color:rgba(228, 198, 140, 0.73);
    color: #fff;
}

th, td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    font-weight: 600;
    font-size: 1.1rem;
}

td {
    font-size: 1rem;
    color: #333;
}

/* Table row hover effect */
tbody tr:hover {
    background-color: #f1f1f1;
    cursor: pointer;
}

/* Admin reply styling */
td:nth-child(5) {
    word-wrap: break-word;
}

/* Action Button (Delete) */
.delete-btn {
    background-color: #dc3545;
    color: white;
    padding: 8px 12px;
    text-decoration: none;
    border-radius: 4px;
    font-weight: bold;
    text-align: center;
    display: inline-block;
}

.delete-btn:hover {
    background-color: #c82333;
    transition: background-color 0.3s;
}

/* Media query for smaller screens */
@media (max-width: 768px) {
    table {
        font-size: 0.9rem;
    }
    th, td {
        padding: 8px 10px;
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
        <h2>Inquiry Page</h2>
        <ol class="breadcrumb">
          <li><a href="product.php">Home</a></li>                   
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

<?php
  // Initialize flags for success, error message, and contact details
$success_message = "";
$error_message = "";
$contact_details = null;

// Create a connection to the database
$con = mysqli_connect("localhost", "root", "", "Velvet_vogue");

// Check the connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $description = $_POST['description'];

    // Assuming the user_id is set in the session
    if (!isset($_SESSION['user_id'])) {
        $error_message = "User is not logged in.";
    } else {
        $user_id = $_SESSION['user_id']; // Retrieve user_id from the session

        // Prepare the SQL query to insert the data into the contact_us table
        $sql = "INSERT INTO contact_us (user_id, email, phone_number, address, description) 
                VALUES (?, ?, ?, ?, ?)";

        // Prepare the statement
        if ($stmt = $con->prepare($sql)) {
            // Bind the parameters
            $stmt->bind_param("issss", $user_id, $email, $phone_number, $address, $description);

            // Execute the statement
            if ($stmt->execute()) {
                // Set success message
                $success_message = "Your inquiry has been submitted successfully!";
            } else {
                // Set error message
                $error_message = "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            // Set error message for query preparation
            $error_message = "Error preparing the query: " . $con->error;
        }
    }
}

// Check for delete action
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Prepare the SQL query to delete the record
    $delete_sql = "DELETE FROM contact_us WHERE contact_ID = ? AND user_id = ?";
    if ($delete_stmt = $con->prepare($delete_sql)) {
        // Bind the parameters
        $delete_stmt->bind_param("ii", $delete_id, $_SESSION['user_id']);
        
        // Execute the statement
        if ($delete_stmt->execute()) {
            $success_message = "Inquiry deleted successfully!";
        } else {
            $error_message = "Error deleting inquiry: " . $delete_stmt->error;
        }

        // Close the statement
        $delete_stmt->close();
    } else {
        $error_message = "Error preparing delete query: " . $con->error;
    }
}

// Retrieve the user's contact details from the database
$sql = "SELECT contact_ID, email, phone_number, address, description, admin_reply FROM contact_us WHERE user_id = ? ORDER BY contact_ID DESC";
if ($stmt = $con->prepare($sql)) {
    // Bind the parameters and execute the query
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the inquiry data
        $contact_details = $result;
    } else {
        $error_message = "No inquiry details found.";
    }

    // Close the statement
    $stmt->close();
} else {
    $error_message = "Error retrieving inquiry data: " . $con->error;
}

// Close the connection
mysqli_close($con);
?>




















<!-- Cart view section -->
<section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="contact.php" method="POST">
                <!-- Hidden input for user_id, assuming this is handled on the server -->
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

                <!-- Email Input -->
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <br><br>

                <!-- Phone Number Input -->
                <label for="phone_number">Phone Number:</label>
                <input type="tel" id="phone_number" name="phone_number" required>
                <br><br>

                <!-- Address Input -->
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
                <br><br>

                <!-- Description Input -->
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" cols="50" required></textarea>
                <br><br>

                <!-- Submit Button -->
                <button type="submit">Submit Inquiry</button>
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
</section>

<?php if ($contact_details && $contact_details->num_rows > 0): ?>
                 <h3></h3>
                 <table>
                     <thead>
                         <tr>
                             <th>Email</th>
                             <th>Phone Number</th>
                             <th>Address</th>
                             <th>Description</th>
                             <th>Admin Reply</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php while ($row = $contact_details->fetch_assoc()): ?>
                             <tr>
                                 <td><?php echo htmlspecialchars($row['email']); ?></td>
                                 <td><?php echo htmlspecialchars($row['phone_number']); ?></td>
                                 <td><?php echo htmlspecialchars($row['address']); ?></td>
                                 <td><?php echo nl2br(htmlspecialchars($row['description'])); ?></td>
                                 <td>
    <?php 
        // Check if the value of 'admin_reply' is NULL
        $admin_reply = $row['admin_reply'] ?? 'No reply';  // Use 'No reply' if it's NULL
        echo nl2br(htmlspecialchars($admin_reply)); 
    ?>
</td>
                                 <td>
                                     <a href="contact.php?delete_id=<?php echo $row['contact_ID']; ?>" class="delete-btn">Delete</a>
                                 </td>
                             </tr>
                         <?php endwhile; ?>
                     </tbody>
                 </table>
             <?php else: ?>
                 <p>No inquiry details available.</p>
             <?php endif; ?>


<!-- JavaScript for Success/Error Message -->
<?php if ($success_message): ?>
    <script>
        alert("<?php echo $success_message; ?>");
    </script>
<?php elseif ($error_message): ?>
    <script>
        alert("<?php echo $error_message; ?>");
    </script>
<?php endif; ?>
























 


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