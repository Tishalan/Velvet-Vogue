<?php
// session_start();
// if (!isset($_SESSION['admin_id'])) {
//     header("Location: admin_login.php");
//     exit;
// }
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
    background-color: #007bff;
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

/* Admin reply textarea */
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-bottom: 10px;
    font-size: 1rem;
}

/* Action Button (Remove from View) */
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
                  <li class="hidden-xs"><a href="Admindb.php">Home</a></li>
                  <li class="hidden-xs"><a href="index.php">Manage Products</a></li>
                  <li class="hidden-xs"><a href="manage_order.php">Manage Orders</a></li>
                  <li class="hidden-xs"><a href="manage_contact.php">Reports</a></li>
                  <li class="hidden-xs"><a href="dailyShop/login.php">Logout</a></li>

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
    <img src="img\admin2.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Welcome back Admin...!</h2>
        <ol class="breadcrumb">
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


$success_message = "";
$error_message = "";

// Create a connection to the database
$con = mysqli_connect("localhost", "root", "", "Velvet_vogue");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check for admin reply update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_reply'])) {
    $contact_ID = $_POST['contact_ID'];
    $admin_reply = $_POST['admin_reply'];

    // Prepare the SQL query to update the admin reply
    $update_sql = "UPDATE contact_us SET admin_reply = ? WHERE contact_ID = ?";
    if ($update_stmt = $con->prepare($update_sql)) {
        $update_stmt->bind_param("si", $admin_reply, $contact_ID);

        if ($update_stmt->execute()) {
            $success_message = "Admin reply updated successfully!";
        } else {
            $error_message = "Error updating admin reply: " . $update_stmt->error;
        }

        $update_stmt->close();
    } else {
        $error_message = "Error preparing update query: " . $con->error;
    }
}

// Check for delete action (removes from the admin table view only)
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Delete from the admin view (not the database)
    unset($contact_details[$delete_id]);
    $success_message = "Inquiry removed from the table view.";
}

// Retrieve all contact details (admin view)
$sql = "SELECT contact_ID, email, phone_number, address, description, admin_reply FROM contact_us ORDER BY contact_ID DESC";
if ($stmt = $con->prepare($sql)) {
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $contact_details = $result;
    } else {
        $error_message = "No inquiries found.";
    }

    $stmt->close();
} else {
    $error_message = "Error retrieving inquiries: " . $con->error;
}

// Close the connection
mysqli_close($con);
?>

<?php if ($success_message): ?>
    <div class="alert alert-success"><?php echo $success_message; ?></div>
<?php endif; ?>
<?php if ($error_message): ?>
    <div class="alert alert-danger"><?php echo $error_message; ?></div>
<?php endif; ?>

<table>
    <thead>
        <tr>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Description</th>
            <th>Admin Reply</th>
            <!-- <th>Action</th> -->
        </tr>
    </thead>
    <tbody>
        <?php if ($contact_details && $contact_details->num_rows > 0): ?>
            <?php while ($row = $contact_details->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone_number']); ?></td>
                    <td><?php echo htmlspecialchars($row['address']); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['description'])); ?></td>
                    <td>
                        <!-- Admin Reply -->
                        <form action="manage_contact.php" method="POST">
                            <input type="hidden" name="contact_ID" value="<?php echo $row['contact_ID']; ?>">
                            <textarea name="admin_reply" rows="4" cols="50"><?php echo htmlspecialchars($row['admin_reply']); ?></textarea>
                            <br><br>
                            <button type="submit" name="update_reply">Update Reply</button>
                        </form>
                    </td>

                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No inquiries available.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>






       

        





        











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