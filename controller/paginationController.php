<?php
include "../model/paginationDB.php";
$action = $_GET["action"];
function getTotalProduct() {
    echo getTotal();
}

if ($action == 1) {
    echo getTotalProduct();
}
?>