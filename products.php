<?php
include "./model/queryProduct.php";
$conn = new mysqli("localhost", "root", "", "onlinestore");
# if there exist q params in the GET request
if (isset($_GET['q'])) {
    $findingProduct = $_GET['q'];
    $res = findProduct(strtoupper($findingProduct));
}
# if there doesn't exist q params then list out all products in the database
else {
    $res = findProduct("");
}
?>

<section class="container-fluid d-flex flex-row gap-3 pt-2 px-5 flex-wrap">
    <form class="input-group mb-3" action="./controller/findProduct.php" method="GET">
        <input name="q" type="text" class="form-control" placeholder="Enter the product you want to find" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-primary" id="button-addon2">Search</button>
    </form>
    <div class="row mb-3">
        <?php if ($res->num_rows): ?>
            <!-- There exist a product-->
            <?php while ($row = $res->fetch_assoc()) : ?>
                <div class="col-sm-12 col-md-6 col-xl-4">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center">
                                <img src="./model<?php echo $row['image_dir'] ?>" class="img-fluid" alt="product">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fs-4"><?php echo $row['product_name'] ?></h5>
                                    <h6 class="card-subtitle"><?php echo $row['rating'] ?>⭐</h6>
                                    <p class="card-text mt-1 mb-1 fw-bold">Price: <?php echo $row['price'] ?>vnd</p>
                                    <p class="card-text" style="max-height:100px;overflow:hidden;text-overflow:ellipsis;"><?php echo $row["description"] ?></p>
                                    <a href="#" class="btn btn-primary">More Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <!-- Cannot find any product --> 
            <h1>Sorry, We cannot find any products that you need!</h1>
        <?php endif; ?>
    </div>
</section>