<?php
     // Get the variables
$category_name = $_POST['category_name'];

      //Validate user input
if(empty($category_name)){
    $error = "Invalid category name. The category name must be filled";
    include ('error.php');
}  else {
    require_once('database.php');
    
    // Creating the query
    $query = "INSERT INTO categories (categoryName) VALUES ('$category_name')";
    
    // Running the query
    $db->exec($query);
    
    //Returning to main page
    include('category_list.php');
}


?>