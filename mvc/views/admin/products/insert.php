<?php require_once dirname(__DIR__) . '/partials/header.php';  ?>

<div id="layoutSidenav_content">

    <main>
        <?php 
        ?>
        <div class="container">
            <form action="<?php echo ROOT_URL . '/admin/insertProduct1' ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label for="PName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="PName" placeholder="Enter Product Name " name="PName">
                </div>
                <div class="mb-3 mt-3">
                    <label for="PDescription" class="form-label">Description</label>
                    <input type="text" class="form-control" id="PDescription" placeholder="Enter Description " name="PDescription">
                </div>
                <div class="mb-3 mt-3">
                    <label for="PCategories" class="form-label">Categories</label>
                    <input type="text" class="form-control" id="PCategories" placeholder="Enter Categories" name="PCategories">
                </div>
                <div class="mb-3 mt-3">
                    <label for="PImage_name" class="form-label">Image name</label>
                    <input type="text" class="form-control" id="PImage_name" placeholder="Enter Image name" name="PImage_name">
                </div>
                <div class="mb-3 mt-3">
                    <label for="PImage_url" class="form-label">Image URL</label>
                    <input type="file" class="form-control" id="PImage_url" placeholder="Enter Image URL " name="PImage_url">
                    <?php if(isset($uploadOk) && $uploadOk==0){
                        echo "yêu cầu nhập đúng file hình ảnh";
                        }?>
                </div>
                <div class="mb-3 mt-3">
                    <label for="PQty" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="PQty" placeholder="Enter quantity " name="PQty">
                </div>
                <div class="mb-3 mt-3">
                    <label for="Price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="Price" placeholder="Enter Price " name="PPrice">
                </div>
                <button type="submit" class="btn btn-primary">Cancel</button>
                <button type="submit" class="btn btn-primary" name="insertProduct1">Add</button>
            </form>
        </div>
    </main>
</div>
<?php require_once dirname(__DIR__) . '/partials/footer.php' ?>