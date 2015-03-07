<?php
// Getting the variable
$category_name = $_POST['category_name'];

//Setting database and delete query
require_once('database.php');
$query = "DELETE FROM categories
Where categoryName = '$category_name'";

//Execute query
$db->exec($query);

// Return to main page
include('category_list.php');

?>

