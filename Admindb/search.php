


<?php

$con = mysqli_connect("localhost", "root", "", "Velvet_vogue");

// Search parameters from GET request
$search_product_id = isset($_GET['search_product_id']) ? $_GET['search_product_id'] : '';
$search_category = isset($_GET['search_category']) ? $_GET['search_category'] : '';

// Initialize the SQL query to fetch all products
$sql = "SELECT * FROM Products_details WHERE 1";

// Add filters to the query based on search input
if ($search_product_id != '') {
    $sql .= " AND Product_ID LIKE '%$search_product_id%'";
}

if ($search_category != '') {
    $sql .= " AND Category LIKE '%$search_category%'";
}

// Execute the query and fetch the results
$res = $con->query($sql);
?>
