<?php
$conn = new mysqli('localhost', 'root', '', 'onlinestore');
if ($conn->connect_error) {
    exit("Something went wrong");
}

$userInp = $_GET['q'];

$sql = "
SELECT product_name
FROM Products
WHERE product_name LIKE '%$userInp%'
ORDER BY product_name
";

$ans = "";

$res = $conn->query($sql);
$res = $res->fetch_all();
foreach ($res as $ele) {
    foreach ($ele as $data) {
        $ans = $ans . $data . ";";
    }
}
$ans = substr_replace($ans, "", -1); // Remove the last ';' character
echo $ans;
?>