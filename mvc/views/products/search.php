<?php require_once dirname(__DIR__) . "/partials/header.php"; ?>

<section>
    <div class="container">
        <div class="row">
            <?php
            if (!empty($searchResult)) :
            ?>
                <h2 style='color:var(--blue-color);padding-top:30px;'>FACE</h2>
                <?php
                $hair = [];
                foreach ($searchResult as $product) :
                    if ($product['categories'] == 'face') :
                ?>
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
                                    <button type="button" class="btn btn-light btn-light-addtocart">Add To Cart</button>
                                    <button type="button" class="btn btn-light btn-light-buynow"><a href="#!">Buy Now</a></button>
                                </div>
                            </div>
                        </div>
            <?php elseif ($product['categories'] == 'hair') :
                        array_push($hair, $product);
                    endif;
                endforeach;
            endif;
            ?>
            <?php
            if (!empty($hair)) :
            ?>
                <h2 style='color:var(--blue-color);'>HAIR</h2>
                <?php foreach ($hair as $product) : ?>
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
                                <button type="button" class="btn btn-light btn-light-addtocart">Add To Cart</button>
                                <button type="button" class="btn btn-light btn-light-buynow"><a href="#!">Buy Now</a></button>
                            </div>
                        </div>
                    </div>
            <?php endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<?php require_once dirname(__DIR__) . "/partials/footer.php"; ?>