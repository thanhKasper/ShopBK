<?php 
function getTotal() {
    $conn = new mysqli("localhost", "root", "", "onlinestore");
    $sql = "SELECT COUNT(product_id) FROM Products";
    $res = $conn->query($sql)->fetch_assoc();
    return $res['COUNT(product_id)'];
}
?>