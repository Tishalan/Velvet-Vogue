


<?php
  // Database Connection
  $con = mysqli_connect("localhost", "root", "", "Velvet_vogue");

  if(isset($_GET['id']) && isset($_GET['image'])) {
    $product_id = $_GET['id'];
    $image_name = $_GET['image'];

    // Delete the product from the database
    $sql = "DELETE FROM Products_details WHERE Product_ID = {$product_id}";
    
    if($con->query($sql)) {
      // If product is deleted from the database, delete the image from the server
      if(file_exists("uploads/{$image_name}")) {
        unlink("uploads/{$image_name}");
      }
      // Redirect to index page with status=1 (success)
      header("Location: index.php?status=1");
    } else {
      // If there was an error deleting from the database, redirect with status=0 (error)
      header("Location: index.php?status=0");
    }
  } else {
    // In case no valid parameters are passed
    header("Location: index.php?status=0");
  }
?>



