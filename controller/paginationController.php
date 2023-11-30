<?php
include "../model/paginationDB.php";
$action = $_GET["action"];
function getTotalProduct()
{
    echo getTotal();
}

if ($action == 1) {
    echo getTotalProduct();
} else if ($action == 2) {
    $num = $_GET["page"];
    echo getLimitData($num);
}
