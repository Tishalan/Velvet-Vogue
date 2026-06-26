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

    /* Body Styles (keeping the existing body styling) */
/* body {
    font-family: 'Roboto', sans-serif;
    background-color: #f4f4f4; 
    color: #333;
    margin: 0;
    padding: 0;
} */

/* Container for the manage orders section */
#manage-orders {
    padding: 30px;
    background: linear-gradient(135deg, #fff,rgb(245, 203, 153));
    border-radius: 12px;
    box-shadow: 0px 12px 30px rgba(0, 0, 0, 0.1);
    /* margin: 25px auto; */
    max-width: 1200px;
}

/* Heading Style with Brown Header */
#manage-orders h2 {
    font-size: 2.4em;
    color: #fff;
    margin-bottom: 20px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    text-align: center;
    background: linear-gradient(45deg, #8B4513, #D2691E); /* Brown gradient header */
    -webkit-background-clip: text;
    color: transparent;
    padding: 10px 0;
}

/* Table Container */
.order-table-area {
    overflow-x: auto;
    margin-top: 20px;
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    border-radius: 8px;
    overflow: hidden;
}

/* Table Header Styling with Brown Background */
thead {
    background-color:rgba(104, 74, 53, 0.39); /* Brown header */
    color: #fff;
    text-align: left;
    font-weight: 600;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);

}

th, td {
    padding: 14px 20px;
    text-align: left;
    border: 1px solid #ddd;
    font-size: 1em;
    color: #333;
}

/* Table Row Styling */
td {
    background-color: #ffffff;
    color: #444;
    transition: background-color 0.3s ease, color 0.3s ease;
}

td:hover {
    background-color: #f1f1f1;
    color: #333;
}

/* Hover Effect for Table Rows */
tbody tr:hover {
    background-color: #f9f9f9;
    box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.1);
}

/* Image Styling for Product */
td img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

td img:hover {
    transform: scale(1.1);
}

/* Form Styling for Status Dropdown */
form {
    display: inline-block;
}

select {
    padding: 8px 15px;
    border: 2px solid #ddd;
    border-radius: 4px;
    font-size: 1em;
    background-color: #fff;
    color: #444;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 130px;
    font-weight: 600;
}

select:focus {
    border-color: #8B4513; /* Brown focus border */
    outline: none;
    box-shadow: 0px 0px 10px rgba(139, 69, 19, 0.3);
}

/* Stylish Update Button */
button {
    padding: 10px 20px;
    background-color: #007bff; /* Brown button */
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    margin-left: 10px;
    width: 100px;
}

button:hover {
    background-color: #5a2d0c; /* Darker brown on hover */
    transform: translateY(-2px);
}

button:active {
    transform: translateY(2px);
}

/* No Orders Message */
p {
    font-size: 1.2em;
    color: #888;
    text-align: center;
}

/* Responsive Table for Smaller Screens */
@media (max-width: 768px) {
    th, td {
        font-size: 0.9em;
        padding: 10px 12px;
    }

    td img {
        width: 40px;
        height: 40px;
    }

    button {
        font-size: 0.9em;
    }
}

  </style>

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
                  <li class="hidden-xs"><a href="Admindb.php">Home</a></li>
                  <li class="hidden-xs"><a href="index.php">Manage Products</a></li>
                  <li class="hidden-xs"><a href="manage_order.php">Manage Orders</a></li>
                  <li class="hidden-xs"><a href="">Reports</a></li>
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


              <!-- <div class="aa-search-box">
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
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="img\Fashion.png" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Manage Orders</h2>
        <ol class="breadcrumb">
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->


  <?php
$con = mysqli_connect("localhost", "root", "", "Velvet_vogue"); // Database connection

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch all orders from track_details instead of cart
$sql = "SELECT t.order_id, t.user_id, t.product_name, t.price, t.quantity, t.total, t.total_price, p.Image, t.status
        FROM track_details t
        JOIN Products_details p ON t.product_name = p.Product_name"; // Assuming `product_name` exists in both tables

$result = $con->query($sql);

// Handle order status update
if (isset($_POST['update_order'])) {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    // Update order status
    $update_sql = "UPDATE track_details SET status = ? WHERE order_id = ?";
    $stmt = $con->prepare($update_sql);
    $stmt->bind_param("si", $status, $order_id);
    $stmt->execute();
    $stmt->close();

    // Refresh the page to show updated status
}
?>

<section id="manage-orders">
   <div class="container">
     <!-- <h2>Manage Orders</h2> -->
    </div>
     <div class="order-table-area">
    

     <?php
     // Check if there are any orders to manage
     if ($result->num_rows > 0) {
     ?>

     <!-- Display Orders Table -->
     <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-top: 20px;">
         <thead>
             <tr>
                 <th>Order ID</th>
                 <th>User ID</th>
                 <th>Image</th>
                 <th>Product Name</th>
                 <th>Price</th>
                 <th>Quantity</th>
                 <th>Total Price</th>
                 <th>Status</th>
                 <th>Actions</th>
             </tr>
         </thead>
         <tbody>
         <?php
         while ($row = $result->fetch_assoc()) {
             $order_id = $row['order_id'];
             $Image = $row['Image'];
             $user_id = $row['user_id'];
             $product_name = $row['product_name'];
             $total_price = $row['price'];
             $quantity = $row['quantity'];             
             $status = $row['status']; // Current status of the order
             $tot= $quantity * $total_price;
         ?>
             <tr>
                 <td><?php echo htmlentities($order_id); ?></td>
                 <td><?php echo htmlentities($user_id); ?></td>
                 <td> <img src="uploads/<?php echo $Image; ?>" alt="<?php echo htmlentities($product_name); ?>" style="width: 50px; height: 50px;">
                 <td><?php echo htmlentities($product_name); ?></td>
                 <td>LKR <?php echo number_format($total_price, 2); ?></td>
                 <td><?php echo htmlentities($quantity); ?></td>
                 <td>LKR <?php echo number_format($tot, 2); ?></td>
                 <td>
                     <?php echo htmlentities($status); ?>
                     <!-- Status dropdown to update -->
                     <form method="POST" action="manage_order.php" style="display: inline;">
                         <select name="status">
                             <option value="Pending" <?php echo ($status == "Pending") ? "selected" : ""; ?>>Pending</option>
                             <option value="On Process" <?php echo ($status == "On Process") ? "selected" : ""; ?>>On Process</option>
                             <option value="Delivered" <?php echo ($status == "Delivered") ? "selected" : ""; ?>>Delivered</option>
                         </select>
                 </td>
                 <td>
                     <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                     <button type="submit" name="update_order">Update</button>
                     </form>
                 </td>
             </tr>
         <?php } ?>
         </tbody>
     </table>

     <?php
     } else {
         echo "<p>No orders to manage.</p>";
     }
     ?>
     </div>
   </div>

</div>
       </div>
     </div>
   </div>
 </section>


















 

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
