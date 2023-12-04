<?php
$conn = new mysqli('localhost', 'root', '', 'onlinestore');
if ($conn->connect_error) {
    exit("Something went wrong");
}

$userInp = $_GET['q'];

$sql = "
SELECT product_name, product_id
FROM Products
WHERE product_name LIKE '%$userInp%'
ORDER BY product_name
";

$ans = "";
$data = ["result" => []];
$res = $conn->query($sql);
if ($res->num_rows) {
    while ($row = $res->fetch_assoc()) {
        array_push($data["result"], ["product_id" => $row["product_id"], "product_name" => $row["product_name"]]);
    }
}

echo json_encode($data);
?>