<?php
function getProductByID($id)
{
    $conn = new mysqli("localhost", "root", "", "onlinestore");
    $sql = "SELECT * FROM Products WHERE product_id = $id;";
    $res = $conn->query($sql)->fetch_assoc();
    return array("name" => $res['product_name'], "price" => $res['price'], "rating" => $res["rating"], "description" => $res["description"]);
}
