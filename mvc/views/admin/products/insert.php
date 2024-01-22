<?php require_once dirname(__DIR__) . '/partials/header.php';  ?>

<div id="layoutSidenav_content">

    <main>
        <?php 
        ?>
        <div class="container">
            <form action="<?php echo ROOT_URL . '/AdminProduct/insertProduct1' ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label for="PName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="PName" placeholder="Enter Product Name " name="PName">
                    <p style="color: red;"><?php echo  empty($name_error) ?  "" : $name_error ?></p>
                </div>
                <div class="mb-3 mt-3">
                    <label for="PDescription" class="form-label">Description</label>
                    <input type="text" class="form-control" id="PDescription" placeholder="Enter Description " name="PDescription">
                    <p style="color: red;"><?php echo  empty($description_error) ?  "" : $description_error ?></p>
                </div>
                <div class="mb-3 mt-3">
                    <label for="PCategories" class="form-label">Categories</label>
                    <input type="text" class="form-control" id="PCategories" placeholder="Enter Categories" name="PCategories">
                    <p style="color: red;"><?php echo  empty($categories_error) ?  "" : $categories_error ?></p>
                </div>
                <div class="mb-3 mt-3">
                    <label for="PImage_name" class="form-label">Image name</label>
                    <input type="text" class="form-control" id="PImage_name" placeholder="Enter Image name" name="PImage_name">
                    <p style="color: red;"><?php echo  empty($image_name_error) ?  "" : $image_name_error ?></p>
                </div>
                <div class="mb-3 mt-3">
                    <label for="PImage_url" class="form-label">Image URL</label>
                    <input type="file" class="form-control" id="PImage_url" placeholder="Enter Image URL " name="PImage_url">
                    <p style="color: red;"><?php echo  empty($image_url_error) ?  "" : $image_url_error ?></p>
                </div>
                <div class="mb-3 mt-3">
                    <label for="PQty" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="PQty" placeholder="Enter quantity " name="PQty">
                    <p style="color: red;"><?php echo  empty($qty_error) ?  "" : $qty_error ?></p>
                </div>
                <div class="mb-3 mt-3">
                    <label for="Price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="Price" placeholder="Enter Price " name="PPrice">
                    <p style="color: red;"><?php echo  empty($price_error) ?  "" : $price_error ?></p>
                </div>
                <button type="submit" class="btn btn-primary">Cancel</button>
                <button type="submit" class="btn btn-primary" name="insertProduct1">Add</button>
            </form>
        </div>
    </main>
</div>
<?php require_once dirname(__DIR__) . '/partials/footer.php' ?>