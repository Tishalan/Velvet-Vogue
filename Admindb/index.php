<html>
  <head>
    <title>Image Upload in PHP With MySQL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
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


    <script type="text/javascript">
      // Function to clear form fields
      function clearForm() {
        document.getElementById('productform').reset(); // Reset all form fields
      }

      function autoSubmit() {
        document.getElementById('searchForm').submit(); // Submit the search form automatically
      }
    </script>
  
  </head>
  <body>

  <style>
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
}

.size-checkbox-group input[type="checkbox"] {
  margin-right: 5px;
}

/* Container for size checkboxes */
.size-checkbox-group {
  display: flex;
  gap: 15px;
  flex-wrap: wrap;
  margin-top: 10px;
}

/* Style for individual checkbox input */
.size-checkbox-group input[type="checkbox"] {
  display: none; 
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

@media (max-width: 768px) {
  .size-checkbox-group {
    justify-content: center;
  }

  .size-checkbox-group label {
    font-size: 14px;
    padding: 8px 16px;
  }
}
.product {
    background-color: #ffffff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    max-width: 900px;
    margin: 50px auto;
    font-size: 14px;
}


.product1 {
    background-color: #ffffff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    max-width: 900px;
    margin: 50px auto;
    font-size: 14px;
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
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="img\admin.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Manage Produts</h2>
        <ol class="breadcrumb">
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <div class='container mt-5'>
      <div class='row'>
        <div class='col-md-6 mx-auto'>
          <?php
            // Database Connection
            $con = mysqli_connect("localhost", "root", "", "Velvet_vogue");
            $message = "";

          // Default values for search
          $search_category = isset($_GET['search_category']) ? $_GET['search_category'] : '';

          // Search functionality (based on category)
          $sql = "SELECT * FROM Products_details WHERE 1";

          if ($search_category != '') {
              $sql .= " AND Category = '$search_category'";
          }

          $res = $con->query($sql);
            
            if(isset($_POST['submit'])) {
              $product_id = $_POST['product_id']; // Get Product ID
              $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
              $price = $_POST['price'];
              $discount_price = $_POST['discount_price'] ? $_POST['discount_price'] : NULL;
              $category = $_POST['category']; // Get the selected category
              $description = mysqli_real_escape_string($con, $_POST['description']);
              $availability = $_POST['availability']; // Get availability
              $sizes = implode(",", $_POST['size']); // Get selected sizes
              $colors = implode(",", $_POST['color']); // Get selected colors
              
              // Check if an image is uploaded
              if(isset($_FILES["image"])) {
                $allowedTypes = ["png", "jpg", "jpeg"];
                $fileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
                
                // Check Image Extension
                if(!in_array($fileType, $allowedTypes)) {
                  $message = "<div class='alert alert-danger'>Image Upload Failed. Invalid Image Format.</div>";
                }
                // Check Image Size greater than 1000KB
                elseif($_FILES["image"]["size"] > 1000000) {
                  $message = "<div class='alert alert-danger'>Image Upload Failed. Image Size greater than 1000KB.</div>";
                }
                // Upload Image
                else {
                  $fileName = time() . "." . $fileType;
                  // Move image into 'uploads' Folder
                  if(move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $fileName)) {
                    // Save product and image details in database
                    $sql = "INSERT INTO Products_details (Product_ID, Product_name, Price, Discount_Price, Image, Category, Description, Availability, Size, Colors) 
                            VALUES ('$product_id', '$product_name', '$price', '$discount_price', '$fileName', '$category', '$description', '$availability', '$sizes', '$colors')";
                    
                    if($con->query($sql)) {
                      $message = "<div class='alert alert-success'>Product and Image Uploaded Successfully.</div>";
                    } else {
                      $message = "<div class='alert alert-danger'>Image Upload Failed. Try Again.</div>";
                    }
                  } else {
                    $message = "<div class='alert alert-danger'>Image Upload Failed. Try Again.</div>";
                  }
                }
              }
            }
            
          ?>
          
        
        <form class= "product"method='post' action='' enctype='multipart/form-data' id="productform">
          <?php 
            // Display Status Message
            if($message != "") echo $message;
          ?>
          
          <div class='form-group'>
            <label>Product ID</label>
            <input type='text' name='product_id' required class='form-control'>
          </div>
          <div class='form-group'>
              <label>Category</label>
              <select name='category' class='form-control' required>
                <option value=''></option>
                <option value='men'>Men</option>
                <option value='women'>Women</option>
                <option value='kids'>Kids</option>
              </select>
            </div>

          <div class='form-group'>
            <label>Product Name</label>
            <input type='text' name='product_name' required class='form-control'>
          </div>

          <div class='form-group'>
            <label>Description</label>
            <textarea name='description' class='form-control' required></textarea>
          </div>

          <div class='form-group'>
            <label>Price</label>
            <input type='text' name='price' required class='form-control'>
          </div>
          <div class='form-group'>
            <label>Discount Price (optional)</label>
            <input type='text' name='discount_price' class='form-control'>
          </div>

          <div class='form-group'>
            <label>Available</label>
            <select name='availability' class='form-control' required>
                <option value=''></option>
                <option value='in_stock'>In Stock</option>
                <option value='out_of_stock'>Out of Stock</option>
            </select>
          </div>

          <div class='form-group'>
  <label>Sizes</label>
  <div class="size-checkbox-group">
    <input type="checkbox" name="size[]" value="S" id="size_s"><label for="size_s">S</label>
    <input type="checkbox" name="size[]" value="M" id="size_m"><label for="size_m">M</label>
    <input type="checkbox" name="size[]" value="L" id="size_l"><label for="size_l">L</label>
    <input type="checkbox" name="size[]" value="XL" id="size_xl"><label for="size_xl">XL</label>
  </div>
</div>


<div class='form-group'>
  <label>Available Colors</label>
  <div class="aa-sidebar-widget">
    <div class="aa-color-tag">
      <input type="checkbox" name="color[]" value="green" id="green"><label class="aa-color-green" for="green"></label>
      <input type="checkbox" name="color[]" value="butter" id="butter"><label class="aa-color-butter" for="butter"></label>
      <input type="checkbox" name="color[]" value="blue" id="blue"><label class="aa-color-blue" for="blue"></label>
      <input type="checkbox" name="color[]" value="red" id="red"><label class="aa-color-red" for="red"></label>
    </div>
  </div>
</div>


          <div class='form-group'>
            <label>Choose Image</label>
            <input type='file' name='image' required class='form-control'>
          </div>
          <input type='submit' name='submit' value='Submit' class='btn btn-primary'>
          <button type="button" class="btn btn-secondary" onclick="clearForm()">Clear</button>
        </form>

        <!-- Search Form -->
        <form class="product1" method="get" action="" id="searchForm">
          <div class="form-group">
            <label>Search by Category</label>
            <select name="search_category" class="form-control" onchange="autoSubmit()">
                <option value="">All Categories</option>
                <option value="men" <?php if($search_category == 'men') echo 'selected'; ?>>Men</option>
                <option value="women" <?php if($search_category == 'women') echo 'selected'; ?>>Women</option>
                <option value="kids" <?php if($search_category == 'kids') echo 'selected'; ?>>Kids</option>
            </select>
          </div>
        </form>
      </div>
    </div>
    <style>
      .product1 .form-control {
    font-size: 10px;  /* Increase font size */
    width: 100%;  /* Ensure it takes full width */
    min-width: 250px;  /* Minimum width for better readability */
    height: 50px;  /* Increase height */
    border-radius: 5px;  /* Rounds the corners slightly */
}

    </style>

    <!-- Table to show uploaded images and product details -->
    <div class='row'>
      <div class='col-md-12'>
        <table class='table'>
          <thead>
            <tr>
              <th>Product ID</th>
              <th>Category</th>
              <th>Product Name</th>
              <th>Description</th>        
              <th>Price</th>
              <th>Discount Price</th>
              <th>Available</th>
              <th>Size</th> 
              <th>Colors</th>
              <th>Image</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $sql = "SELECT * FROM Products_details";
              if ($search_category != '') {
                $sql .= " WHERE Category LIKE '$search_category'";
              }
              $res = $con->query($sql);
              $i = 0;
              while($row = $res->fetch_assoc()) {
                $i++;
                      // Explode the sizes and colors into arrays
      $sizes = explode(",", $row['Size']);
      $colors = explode(",", $row['Colors']);

      // Create a new line for each size and color
      $sizeOutput = implode("<br>", $sizes);  // Display sizes one below the other
      $colorOutput = implode("<br>", $colors);  // Display colors one below the other
              
              
                echo "
                  <tr>
                    <td>{$row['Product_ID']}</td>
                    <td>{$row['category']}</td>
                    <td>{$row['Product_name']}</td>
                    <td>{$row['Description']}</td>
                    <td>{$row['Price']}</td>
                    <td>{$row['Discount_Price']}</td>
                    <td>{$row['Availability']}</td>
                    <td>$sizeOutput</td>
                    <td>$colorOutput</td>                   
                    <td><img src='uploads/{$row['Image']}' style='height:80px;' ></td>
                    <td><a href='update.php?id={$row['Product_ID']}' class='btn btn-warning'>Edit</a></td>
                    <td><a href='delete.php?id={$row['Product_ID']}&image={$row['Image']}' class='btn btn-danger'>Delete</a></td>
                  </tr>
                ";
              }
            ?>
          </tbody>
        </table>
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
    

  </body>
</html>

