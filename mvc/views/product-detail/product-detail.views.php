<?php
require_once dirname(dirname(dirname(__DIR__))) . "/mvc/models/Products.php";
require_once dirname(dirname(dirname(__DIR__))) . "/mvc/controllers/Product.php";


$id = 2;
$db = new Products(); // Instantiate the database connection
$productDetails = $db->getOneProduct($id);
$products= $db->getAllProduct();

?>

<section class="product-detail">
    <div class="card mb-2 " style="min-width:70%; border: none">
        <div class="row g-0" id="produc-detail-body">
            <div class="col-md-4">
                <img class="product-detail-image" src="<?php echo $productDetails['image_url']  ?>" style="width: 100%; height:100%" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body product-detail-body">
                    <h1 class="card-title"><?php echo $productDetails['product_name']  ?></h1>
                    <p class="card-text" style="color: #ED4D2D; font-size: 18px;">
                        <?php echo $productDetails['price']  ?>VNĐ</p>
                    <p class="card-text">Categories : <?php echo $productDetails['categories']  ?></p>
                    <p class="card-text">Quantity : <input type="number" name="quantity" id="" value="1"></p>
                    <p class="card-text"><?php echo $productDetails['describes']  ?>.</p>

                    <div class="product-detail-button">
                        <button type="button" class="btn button-item1">Add to cart</button>
                        <button type="button" class="btn button-item2 ">Buy now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="card-group" style="width:85% ;" id="product-recommend"  >
     <?php foreach ($products as $product) : 
     if($product['categories']=='face'){
     ?>
        <div class="card card-product-recommend" >
            <img src="<?php echo $product['image_url'] ?>" class=" card-img-top" alt="Product 1">
            <div clss="card-body" style="padding: 5px 0 20px 15px; height: 4%;">
                <h5 class="card-title pt-4"><?php echo $product['product_name'] ?></h5>
                <h5 class="card-text"><?php echo $product['price'] ?></h5>
                <div class="rate">
                    <input type="radio" id="star5" name="rate" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 star</label>
                </div>
                </br>
                </br>
                <button type="button" class="btn btn-add-to-card">Add to Card</button>
                <button type="button" class="btn btn-buy-now">Buy now</button>
            </div>
        </div>
        <?php } 
        endforeach?>
        
    </div>
</section>