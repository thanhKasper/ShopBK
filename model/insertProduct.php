<?php 
function insertProduct($name, $price, $rating, $des) {
    $conn = new mysqli("localhost", "root", "", "onlinestore");
    // Get the lastest ID
    $sql = "SELECT MAX(product_id) FROM Products;";
    $res = $conn->query($sql)->fetch_assoc();
    $nextID = $res['MAX(product_id)'] + 1;
    // Insert product
    $sql = "INSERT INTO Products VALUES ($nextID, '$name', $price, $rating, '$des', '/')";
    $conn->query($sql);
    header("Location: http://localhost/index.php?page=products");
    exit;
}
?>