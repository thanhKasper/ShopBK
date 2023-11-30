<?php

function findProduct($product)
{
    $conn = new mysqli("localhost", "root", "", "onlinestore");
    $sql = "
        SELECT *
        FROM Products
        WHERE product_name LIKE '%$product%';
    ";
    $res = $conn->query($sql);
    return $res;
}

