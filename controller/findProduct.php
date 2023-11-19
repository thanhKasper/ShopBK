<?php
$product = $_GET['q'];
header("Location: http://localhost/index.php?page=products&q=$product");
exit;
?>