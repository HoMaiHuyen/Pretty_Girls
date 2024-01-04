<?php require_once dirname(__DIR__) . '/partials/header.php';  ?>

<div id="layoutSidenav_content">
    <main>
    <?php 
        ?>

        <div class="container">
            <form action="<?php echo ROOT_URL . '/admin/updateProduct1' ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                    <label for="id" class="form-label">ID Product</label>
                    <input type="text" class="form-control" id="id"  name="id" value="<?php echo $productOne['id']?>" readonly>
                </div>
                <div class="mb-3 mt-3">
                    <label for="PName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="PName" placeholder="Enter Product Name " name="PName" value="<?php echo $productOne['product_name']?>">
                </div>
                <div class="mb-3 mt-3">
                    <label for="PDescription" class="form-label">Description</label>
                    <input type="text" class="form-control" id="PDescription" placeholder="Enter Description " name="PDescription" value="<?php echo $productOne['description']?>">
                </div>
                <div class="mb-3 mt-3">
                    <label for="PCategories" class="form-label">Categories</label>
                    <input type="text" class="form-control" id="PCategories" placeholder="Enter Categories" name="PCategories" value="<?php echo $productOne['categories']?>">
                </div>
                <div class="mb-3 mt-3">
                    <label for="PImage_name" class="form-label">Image name</label>
                    <input type="text" class="form-control" id="PImage_name" placeholder="Enter Image name" name="PImage_name" value="<?php echo $productOne['image_name']?>">
                </div>
                <div class="mb-3 mt-3">
                    <label for="PImage_url" class="form-label">Image URL</label>
                    <input type="file" class="form-control" id="PImage_url" placeholder="Enter Image URL " name="PImage_url">
                    <img src="<?php echo $productOne['image_url'] ?>" alt="<?php echo $productOne['image_name'] ?>" style="width:100px;height:80px">
                    
                </div>
                <div class="mb-3 mt-3">
                    <label for="PQty" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="PQty" placeholder="Enter quantity " name="PQty" value="<?php echo $productOne['quantity']?>">
                </div>
                <div class="mb-3 mt-3">
                    <label for="Price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="Price" placeholder="Enter Price " name="PPrice" value="<?php echo $productOne['price']?>">
                </div>
                <button type="submit" class="btn btn-primary">Cancel</button>
                <button type="submit" class="btn btn-primary" name="updateProduct">Add</button>
            </form>
        </div>
    </main>
</div>
<?php require_once dirname(__DIR__) . '/partials/footer.php' ?>