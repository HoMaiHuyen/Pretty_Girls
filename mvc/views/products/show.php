<?php require_once dirname(__DIR__) . "/partials/header.php";  ?>
<section class="product-detail">
    <form action="<?php echo ROOT_URL . '/user/shoppingCart' ?>" method="post">
        <div class="card mb-2 " style="min-width:70%; border: none" id="product">
            <div class="row g-0" id="produc-detail-body">
                <div class="col-md-4">
                    <img class="product-detail-image" src="<?php echo $product['image_url']  ?>" style="width: 100%; height:100%" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body product-detail-body">
                        <h1 class="card-title"><?php echo $product['product_name']  ?></h1>
                        <p class="card-text">
                            <?php echo $product['price']  ?>VNĐ</p>
                        <p class="card-text">Categories : <?php echo $product['categories']  ?></p>
                        <p class="card-text">Quantity : <input type="number" name="PQuantity" id="input-quantity" value="1"></p>
                        <p class="card-text"><?php echo $product['description']  ?>.</p>

                        <div class="product-detail-button">
                            <button type="submit" name="addcart" class="btn button-item1">Add to cart</button>
                            <button type="button" class="btn button-item2 ">Buy now</button>
                        </div>
                        <div>
                            <input type="hidden" name="PId" value="<?php echo  $product['id'] ?>">
                            <input type='hidden' name='PName' value="<?php echo $product['product_name'] ?>">
                            <input type='hidden' name='Image' value=" <?php echo $product['image_url'] ?>">
                            <input type='hidden' name='PPrice' value=" <?php echo $product['price'] ?>">
                            <input type='hidden' name='addcart' value="order">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<section>
    <div class="container">
        <div class="row">
            <?php if ($product['categories'] == 'face') { ?>
                <h2 style='color:var(--blue-color);padding-top:30px;'>FACE</h2>
                <?php
                foreach ($products as $product) :
                    if ($product['categories'] == 'face') {
                ?>
                        <form action="<?php echo ROOT_URL . '/user/shoppingCart' ?>" method="post">
                            <div class="col-sm-4" style="padding-bottom: 20px;">
                                <div class="card card-product">
                                    <a href="<?php echo ROOT_URL . '/Product/show&id=' . $product['id'] ?>">
                                        <img src="<?php echo $product['image_url'] ?>" class="card-image" alt="..." style="background-image: linear-gradient(#9FCBF4, #EAD8FC);">
                                    </a>
                                    <div class="card-body">
                                        <h4 class="card-title" style="color: black;"><?php echo $product['product_name'] ?></h4>
                                        <br>
                                        <h5 class="card-text" style="color: red;"><?php echo "$" . $product['price'] ?></h5>
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
                                        <br>
                                        <br>
                                        <button type="submit" name="addcart" class="btn btn-light btn-light-addtocart">Add To Cart</button>
                                        <button type="button" class="btn btn-light btn-light-buynow"><a href="#!">Buy Now</a></button>
                                    </div>
                                    <div>
                                        <input type="hidden" name="PId" value="<?php echo  $product['id'] ?>">
                                        <input type='hidden' name='PName' value="<?php echo $product['product_name'] ?>">
                                        <input type='hidden' name='Image' value=" <?php echo $product['image_url'] ?>">
                                        <input type='hidden' name='PPrice' value=" <?php echo $product['price'] ?>">
                                        <input type='hidden' name='addcart' value="order">
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php }
                endforeach;
            } else {
                echo "<h2 class='title-face'>HAIR</h2>";
                foreach ($products as $product) :
                    if ($product['categories'] == 'hair') {
                    ?>
                        <form action="<?php echo ROOT_URL . '/user/shoppingCart' ?>" method="post">
                            <div class="col-sm-4" style="padding-bottom: 20px;  ">
                                <div class="card card-product">
                                    <a href="<?php echo ROOT_URL . '/Product/show&id=' . $product['id'] ?>">
                                        <img src="<?php echo $product['image_url'] ?>" class="card-image" alt="..." style="background-image: linear-gradient(#9FCBF4, #EAD8FC);">
                                    </a>
                                    <div class="card-body">
                                        <h4 class="card-title" style="color: black;"><?php echo $product['product_name'] ?></h4>
                                        <br>
                                        <h5 class="card-text" style="color: red;"><?php echo "$" . $product['price'] ?></h5>
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
                                        <br>
                                        <br>
                                        <button type="submit" name="addcart" class="btn btn-light btn-light-addtocart">Add To Cart</button>
                                        <button type="button" class="btn btn-light btn-light-buynow"><a href="#!">Buy Now</a></button>
                                    </div>
                                    <div>
                                        <input type="hidden" name="PId" value="<?php echo $product['id'] ?>">
                                        <input type='hidden' name='PName' value="<?php echo $product['product_name'] ?>">
                                        <input type='hidden' name='Image' value=" <?php echo $product['image_url'] ?>">
                                        <input type='hidden' name='PPrice' value=" <?php echo $product['price'] ?>">
                                        <input type='hidden' name='addcart' value="order">
                                    </div>
                                </div>
                            </div>
                        </form>
            <?php }
                endforeach;
            }
            ?>
            </form>
        </div>
    </div>
</section>

<?php
require_once dirname(__DIR__) . "/partials/footer.php"; ?>