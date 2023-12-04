<?php
include "./model/queryProduct.php";
$conn = new mysqli("localhost", "root", "", "onlinestore");
# if there exist q params in the GET request
if (isset($_GET['q']) && $_GET['q'] != '') {
    $findingProduct = $_GET['q'];
    $res = findProduct(strtoupper($findingProduct));
}
# if there doesn't exist q params then list out all products in the database
else {
    $res = null;
}
?>

<!-- ./controller/findProduct.php -->
<section id="product-list" class="container-fluid d-flex flex-column pt-2 px-5">
    <div class="d-flex flex-sm-column flex-md-row justify-content-between w-100">
        <form class='search-bar w-75' action="./controller/findProduct.php" method="GET">
            <div class='input-group'>
                <input name='q' autocomplete="off" type='text' class='form-control' placeholder="Search Product">
                <button class="btn btn-primary">Search</button>
            </div>
            <ul class="list-group position-absolute z-3"></ul>
        </form>
        <?php if (isset($_SESSION["user_id"]) && $_SESSION['user_id'] == 1) : ?>
            <a class="btn btn-primary mt-sm-3 mt-md-0" style="width:fit-content;" href="http://localhost/index.php?page=add_product" role='button'>Add Product</a>
        <?php endif; ?>
    </div>
    <nav class="mt-3" id="pagination" aria-label="product pagination" style="z-index: 0;">
        <ul class=" pagination">
        </ul>
    </nav>
    <div id="show-products" class="row mb-3">
        <?php  ?>
        <?php if ($res != null && $res->num_rows) : ?>
            <!-- There exist a product-->
            <?php while ($row = $res->fetch_assoc()) : ?>
                <div class="col-sm-12 col-lg-6">
                    <div class="card mb-4">
                        <div class="row">
                            <div class="col-lg-4 d-flex align-items-center justify-content-center">
                                <img src="https://placehold.co/600x400" class="img-fluid" alt="product">
                            </div>
                            <div class="col-lg-8">
                                <div class="card-body">
                                    <h5 class="card-title fs-4"><?php echo $row['product_name'] ?></h5>
                                    <h6 class="card-subtitle"><?php echo $row['rating'] ?>⭐</h6>
                                    <p class="card-text mt-1 mb-1 fw-bold">Price: <?php echo $row['price'] ?>vnd</p>
                                    <p class="card-text product-description"><?php echo $row["description"] ?></p>
                                    <a href=<?php echo "http://localhost/index.php?page=products&product_id=" . $row['product_id']; ?> class="btn btn-primary">More Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <a id="go-back-link" href="http://localhost/index.php?page=products">Go Back</a>

        <?php else : ?>
            <!-- Cannot find any product -->
            <h1>Sorry, We cannot find any products that you need!</h1>
            <a id="go-back-link" href="http://localhost/index.php?page=products">Go Back</a>
        <?php endif; ?>
    </div>
</section>


<script src="./pagination.js"></script>
<script>
    const input = document.querySelector('input');
    const recomList = document.querySelector('.list-group');


    input.addEventListener('input', (e) => {
        while (recomList.firstChild)
            recomList.removeChild(recomList.lastChild);

        const searchProduct = e.target.value

        // Search data from database if there is value
        if (searchProduct != "") {
            const xhttp = new XMLHttpRequest()
            xhttp.open('GET', `../controller/autocomplete_processing.php?q=${searchProduct}`)
            xhttp.send()

            let productRecom;
            xhttp.onload = function() {
                productRecom = JSON.parse(this.responseText).result;
                while (recomList.firstChild)
                    recomList.removeChild(recomList.lastChild);
                for (value of productRecom) {
                    const opt = document.createElement('a');
                    opt.innerHTML = value.product_name;
                    opt.href = `http://localhost/index.php?page=products&product_id=${value.product_id}`;
                    opt.classList.add('list-group-item');
                    opt.classList.add('list-group-item-action');
                    recomList.appendChild(opt)
                }
            }
        }
    })

    document.addEventListener('click', (e) => {
        const focusOnInput = input.contains(e.target)
        const focusOnRecommendation = recomList.contains(e.target)
        if (!focusOnInput && !focusOnRecommendation) {
            while (recomList.firstChild)
                recomList.removeChild(recomList.lastChild);
        }
    })
</script>