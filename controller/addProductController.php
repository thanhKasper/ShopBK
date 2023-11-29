<?php 
include "../model/insertProduct.php";
$name = $_POST['name'];
$price = $_POST['price'];
$rating = $_POST['rating'];
$description = $_POST['description'];

insertProduct($name, $price, $rating, $description);

?>