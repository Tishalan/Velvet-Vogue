<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="css/style.css" rel="stylesheet"> 
    <link href="css/theme-color/pink-theme.css" rel="stylesheet">

</head>
<body>

<style>
body {
    background-color: #F6C7A1; /* Set background color */
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    background: white; /* Keep form background separate */
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    font-weight: bold;
}

/* Form fields */
.form-group label {
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Submit Button */
.btn-primary {
    width: 100%;
    padding: 10px;
    font-size: 18px;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        width: 90%;
        margin: auto;
    }
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



  </style>

  
</body>
</html>


<?php
  // Database Connection
  $con = mysqli_connect("localhost", "root", "", "Velvet_vogue");

  if(isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    // Get the existing product data
    $sql = "SELECT * FROM Products_details WHERE Product_ID = $product_id";
    $result = $con->query($sql);
    $product = $result->fetch_assoc();

    if(isset($_POST['update'])) {
      // Retrieve the form data
      $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
      $price = $_POST['price'];
      $discount_price = $_POST['discount_price'] ? $_POST['discount_price'] : NULL;
      $category = $_POST['category'];
      $description = mysqli_real_escape_string($con, $_POST['description']);
      $availability = $_POST['availability'];  
      $sizes = implode(",", $_POST['size']);  // Get selected sizes as a comma-separated string
      $colors = implode(",", $_POST['color']);  // Get selected colors as a comma-separated string

      // Update the product in the database
      $update_sql = "UPDATE Products_details SET 
                     Product_name='$product_name', 
                     Price='$price', 
                     Discount_Price='$discount_price', 
                     Category='$category', 
                     Description='$description', 
                     Availability='$availability', 
                     Size='$sizes', 
                     Colors='$colors' 
                     WHERE Product_ID=$product_id";

      if($con->query($update_sql)) {
        header("Location: index.php?status=1"); // Redirect to index after success
      } else {
        echo "Error: " . $con->error;
      }
    }
  } else {
    header("Location: index.php");
  }
?>
















<html>
  <head>
    <title>Update Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  </head>
  <body>
    <div class='container mt-5'>
      <div class='row'>
        <div class='col-md-6 mx-auto'>
          <h2>Update Product</h2>
          
          <form method='post' action=''>
            <div class='form-group'>
              <label>Product Name</label>
              <input type='text' name='product_name' class='form-control' value='<?php echo $product['Product_name']; ?>' required>
            </div>
            
            <div class='form-group'>
              <label>Price</label>
              <input type='text' name='price' class='form-control' value='<?php echo $product['Price']; ?>' required>
            </div>

            <div class='form-group'>
              <label>Discount Price (optional)</label>
              <input type='text' name='discount_price' class='form-control' value='<?php echo $product['Discount_Price']; ?>'>
            </div>

            <div class='form-group'>
              <label>Category</label>
              <select name='category' class='form-control' required>
                <option value='men' <?php echo ($product['category'] == 'men' ? 'selected' : ''); ?>>Men</option>
                <option value='women' <?php echo ($product['category'] == 'women' ? 'selected' : ''); ?>>Women</option>
                <option value='kids' <?php echo ($product['category'] == 'kids' ? 'selected' : ''); ?>>Kids</option>
              </select>
            </div>

            <div class='form-group'>
              <label>Description</label>
              <textarea name='description' class='form-control' required><?php echo $product['Description']; ?></textarea>
            </div>

            <div class='form-group'>
              <label>Available</label>
              <select name='availability' class='form-control' required>
                <option value='in_stock' <?php echo ($product['Availability'] == 'in_stock' ? 'selected' : ''); ?>>In Stock</option>
                <option value='out_of_stock' <?php echo ($product['Availability'] == 'out_of_stock' ? 'selected' : ''); ?>>Out of Stock</option>
              </select>
            </div>

            <div class='form-group'>
              <label>Sizes</label>
              <div class="size-checkbox-group">
                <input type="checkbox" name="size[]" value="S" id="size_s" <?php echo (in_array('S', explode(",", $product['Size'])) ? 'checked' : ''); ?>><label for="size_s">S</label>
                <input type="checkbox" name="size[]" value="M" id="size_m" <?php echo (in_array('M', explode(",", $product['Size'])) ? 'checked' : ''); ?>><label for="size_m">M</label>
                <input type="checkbox" name="size[]" value="L" id="size_l" <?php echo (in_array('L', explode(",", $product['Size'])) ? 'checked' : ''); ?>><label for="size_l">L</label>
                <input type="checkbox" name="size[]" value="XL" id="size_xl" <?php echo (in_array('XL', explode(",", $product['Size'])) ? 'checked' : ''); ?>><label for="size_xl">XL</label>
              </div>
            </div>

            <div class='form-group'>
              <label>Available Colors</label>
              <div class="aa-sidebar-widget">
                <div class="aa-color-tag">
                  <input type="checkbox" name="color[]" value="green" id="green" <?php echo (in_array('green', explode(",", $product['Colors'])) ? 'checked' : ''); ?>><label class="aa-color-green" for="green"></label>
                  <input type="checkbox" name="color[]" value="butter" id="butter" <?php echo (in_array('butter', explode(",", $product['Colors'])) ? 'checked' : ''); ?>><label class="aa-color-butter" for="butter"></label>
                  <input type="checkbox" name="color[]" value="blue" id="blue" <?php echo (in_array('blue', explode(",", $product['Colors'])) ? 'checked' : ''); ?>><label class="aa-color-blue" for="blue"></label>
                  <input type="checkbox" name="color[]" value="red" id="red" <?php echo (in_array('red', explode(",", $product['Colors'])) ? 'checked' : ''); ?>><label class="aa-color-red" for="red"></label>
                </div>
              </div>
            </div>

            <input type='submit' name='update' value='Update' class='btn btn-primary'>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
