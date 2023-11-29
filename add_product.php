<section class="flex-grow-1">
    <form action="./controller/addProductController.php" method="POST" class="w-50 mt-5 mx-auto bg-body-secondary p-4 rounded">
        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Product Name</label>
            <input id="name" type="text" class="form-control" name="name">
        </div>
        <div class="d-flex mb-3 gap-4">
            <div class="flex-grow-1">
                <label for="price" class="form-label fw-semibold">Product Price</label>
                <input id="price" type="number" class="form-control" name="price">
            </div>
            <div class="flex-grow-1">
                <label for="rating" class="form-label fw-semibold">Rating</label>
                <input id="rating" type="number" class="form-control" step="0.1" name="rating" max="5.0">
            </div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label fw-semibold">Description</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="4"></textarea>
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary" style="width:fit-content;">Add</button>
        </div>
    </form>
</section>