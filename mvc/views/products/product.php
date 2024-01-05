 <?php require_once dirname(__DIR__) . '/partials/header.php';?>
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
    <div class="container" id="product-list">
        <div class="row">
            <?php
            $count = 0;
            foreach ($products as $product) :
                if ($product['categories'] == 'face') :
            ?>
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <form action="<?php echo ROOT_URL . '/user/shoppingCart' ?>" method="post">
                    <div class="product-card bg-white d-lg-flex flex-column position-relative">
                        <div class="product-image">
                            <img src="<?php  echo $product['image_url']?> " alt="" class="product-thumbnail">
                        </div>
                        <div class="p-4 product-details">
                            <h4 class="font-weight-bold d-flex justify-content-between">
                                <a href="#!" class="text-dark text-truncate--2"
                                    title="Elegant designed coffee plant for desktop decoration">
                                  <?php  echo $product['product_name']?> 
                                </a>
                                <a href="#!" class="ml-2 text-muted" style="color: red;"><i class="fa fa-heart-o"></i></a>
                            </h4>
                            <div class="d-flex align-items-center ">
                                <div class="rating-stars">
                                    <img src="https://dev-to-uploads.s3.amazonaws.com/uploads/articles/e3c2iwxs5qpbx1w34rkc.png"
                                        alt="">
                                    <div class="filled-star" style="width:86%"></div>
                                </div>
                                <a href="#!" class="ml-2 text-muted">(245)</a>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <h2 class="mr-2"><?php  echo $product['price']?> </h2>
                          
                                <h5 class="text-success">42% off</h5>
                            </div>
                            <button class="btn btn-outline-primary">Add to cart</button>
                            <button class="btn btn-outline-primary m-lg-1">Add to cart</button>
                        </div>
                        <div>
                            <input type="hidden" name="PId" value="<?php echo $product['id']; ?>">
                            <input type='hidden' name='PName' value="<?php echo $product['product_name']; ?>">
                            <input type='hidden' name='Image' value="<?php echo $product['image_url']; ?>">
                            <input type='hidden' name='PPrice' value="<?php echo $product['price']; ?>">
                            <input type='hidden' name='addcart' value="order">
                        </div>
                    </div>
                </form>
            </div>
            <?php
                $count++;
                if ($count % 3 == 0) {
                    echo '</div><div class="row">';
                }
            endif;
            endforeach;
            ?>
        </div>
    </div>
</section>
<section>
    <div class="container" id="product-list">
        <div class="row">
            <?php
            $count = 0;
            foreach ($products as $product) :
                if ($product['categories'] == 'hair') :
            ?> 
            <h4></h4>
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <form action="<?php echo ROOT_URL . '/user/shoppingCart' ?>" method="post">
                    <div class="product-card bg-white d-lg-flex flex-column position-relative">
                        <div class="product-image">
                            <img src="<?php  echo $product['image_url']?> " alt="" class="product-thumbnail">
                        </div>
                        <div class="p-4 product-details">
                            <h4 class="font-weight-bold d-flex justify-content-between">
                                <a href="#!" class="text-dark text-truncate--2"
                                    title="Elegant designed coffee plant for desktop decoration">
                                  <?php  echo $product['product_name']?> 
                                </a>
                                <a href="#!" class="ml-2 text-muted" style="color: red;"><i class="fa fa-heart-o"></i></a>
                            </h4>
                            <div class="d-flex align-items-center ">
                                <div class="rating-stars">
                                    <img src="https://dev-to-uploads.s3.amazonaws.com/uploads/articles/e3c2iwxs5qpbx1w34rkc.png"
                                        alt="">
                                    <div class="filled-star" style="width:86%"></div>
                                </div>
                                <a href="#!" class="ml-2 text-muted">(245)</a>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <h2 class="mr-2"><?php  echo $product['price']?> </h2>
                          
                                <h5 class="text-success">42% off</h5>
                            </div>
                            <button class="btn btn-outline-primary">Add to cart</button>
                            <button class="btn btn-outline-primary m-lg-1">Add to cart</button>
                        </div>
                        <div>
                            <input type="hidden" name="PId" value="<?php echo $product['id']; ?>">
                            <input type='hidden' name='PName' value="<?php echo $product['product_name']; ?>">
                            <input type='hidden' name='Image' value="<?php echo $product['image_url']; ?>">
                            <input type='hidden' name='PPrice' value="<?php echo $product['price']; ?>">
                            <input type='hidden' name='addcart' value="order">
                        </div>
                    </div>
                </form>
            </div>
            <?php
                $count++;
                if ($count % 3 == 0) {
                    echo '</div><div class="row">';
                }
            endif;
            endforeach;
            ?>
        </div>
    </div>
</section>



<?php require_once dirname(__DIR__) . '/partials/footer.php' ?>