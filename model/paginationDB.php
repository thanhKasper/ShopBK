<?php
function getTotal()
{
    $conn = new mysqli("localhost", "root", "", "onlinestore");
    $sql = "SELECT COUNT(product_id) FROM Products";
    $res = $conn->query($sql);
    $res = $res->fetch_assoc();
    $conn->close();
    return $res['COUNT(product_id)'];
}

function getLimitData($startOffset)
{
    // LIMIT 6*(startOffset - 1), 6
    $startOffset = 6 * ($startOffset - 1);
    $conn = new mysqli("localhost", "root", "", "onlinestore");
    $sql = "
    SELECT *
    FROM Products
    LIMIT $startOffset, 6
    ";
    $res = $conn->query($sql);
    class ProductList
    {
        public $list = array();
    }
    $products = new ProductList();
    while ($row = $res->fetch_assoc()) {
        array_push(
            $products->list,
            [
                "product_id" => $row["product_id"],
                "product_name" => $row["product_name"],
                "price" => $row["price"],
                "rating" => $row["rating"],
                "description" => $row["description"]
            ]
        );
    }
    $conn->close();
    return json_encode($products);
}
