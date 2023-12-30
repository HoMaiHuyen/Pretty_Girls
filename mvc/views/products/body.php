<div id="banner">
    <div class="left-section">
        <div>
            <h1>Pretty Girls</h1>
            <h2 class="fw-bold">
                <span>In the past, beauty was given by God</span>
                <br>
                <span>Nowadays beauty is made by people</span>
            </h2>
            <br>
            <h5 class="fw-bold">Beauty is a gift from heaven. But how long it lasts is up to you to take care of</h5>
        </div>
    </div>
    <div class="right-section">
        <img src="https://res.cloudinary.com/di9iwkkrc/image/upload/v1701007081/Prety_Girls/ybbf7561bxtuutopksth.jpg" alt="Background Image">
    </div>
</div>
<section>
    <div class="container">
        <div class="row">
            <h2 style='color:var(--blue-color);padding-top:30px;'>FACE</h2>
            <?php
            foreach ($products as $product) :
                if ($product['categories'] == 'face') {
            ?>
                    <form action="<?php echo ROOT_URL . '/user/shoppingCart' ?>" method="post">
                        <div class="col-sm-4" style="padding-bottom: 20px;">
                            <div class="card card-product">
                                <img src="<?php echo $product['image_url'] ?>" class="card-image" alt="..." style="background-image: linear-gradient(#9FCBF4, #EAD8FC);">
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
                                    <input type="hidden" name="PId" value="<?php  echo  $product['id'] ?>">
                                    <input type='hidden' name='PName' value="<?php echo $product['product_name'] ?>">
                                    <input type='hidden' name='Image' value=" <?php echo $product['image_url'] ?>">
                                    <input type='hidden' name='PPrice' value=" <?php echo $product['price'] ?>">
                                    <input type='hidden' name='addcart' value="order">
                                </div>
                            </div>
                        </div>
                    </form>
            <?php } else {
                    $hair = [$product];
                }
            endforeach ?>
            <?php
            if (!empty($hair))
                echo "<h2 class='title-face'>HAIR</h2>";
            foreach ($products as $product) :
                if ($product['categories'] == 'hair') {
            ?>
                    <form action="<?php echo ROOT_URL . '/user/shoppingCart' ?>" method="post">
                        <div class="col-sm-4" style="padding-bottom: 20px;  ">
                            <div class="card card-product">
                                <img src="<?php echo $product['image_url'] ?>" class="card-image" alt="..." style="background-image: linear-gradient(#9FCBF4, #EAD8FC);">
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
            <?php } else {
                    $hair = [$product];
                }
            endforeach ?>
            </form>
        </div>
    </div>
</section>