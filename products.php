<?php
$conn = new mysqli("localhost", "root", "", "onlinestore");
$sql = "
SELECT product_name, description, price, rating, image_dir
FROM Products
";

$res = $conn->query($sql);
?>

<section class="container d-flex flex-row gap-5 pt-3">
    <?php while ($row = $res->fetch_assoc()) : ?>
        <div class="card" >
            <div class="row">
                <div class="col-md-4">
                    <img src="./model<?php echo $row['image_dir'] ?>" class="img-fluid d-flex align-items-end" alt="product">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['product_name'] ?></h5>
                        <h6 class="card-subtitle"><?php echo $row['rating'] ?>⭐</h6>
                        <p class="card-text" style="max-height:100px;overflow:hidden;text-overflow:ellipsis;"><?php echo $row["description"] ?></p>
                        <a href="#" class="btn btn-primary">More Detail</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</section>