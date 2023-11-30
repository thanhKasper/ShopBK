<?php
include "./model/getProductByID.php";
$id = $_GET["product_id"];
$res = getProductByID($id);
?>

<section id="product-detail" class="row mx-5 mt-5 bg-tertiary">
    <div class="col-sm-12 col-lg-5">
        <img class="img-fluid" src="https://placehold.co/600x400" alt="product">
    </div>
    <div class="col-sm-12 col-lg-7">
        <h1><?php echo $res['name']; ?></h1>
        <p><?php echo $res['rating']; ?> ⭐</p>
        <p><?php echo $res['price']; ?> vnd</p>
        <p><?php echo $res['description']; ?></p>
    </div>
    <a role="button" class="btn btn-primary mt-3" style="width: fit-content;" href="http://localhost/index.php?page=products">Go Back</a>
</section>
