<?php require_once dirname(__DIR__) . "/partials/header.php"; ?>

<?php
if (empty($keyword)) {
    ?>
    <?php
} else {
    ?>
    <div class="container">

        <div class="row row-cols-1 row-cols-md-3 g-4 mt-6" style="margin-top: 5%;">
            <?php
            $i = 0;
            foreach ($searchResult as $product) {
                if ($product['categories'] == 'face') {
                    ?>
                    <div class="col-md-4 col-12">
                        <form action="<?php echo ROOT_URL . '/Checkout/shoppingCart' ?>" method="post">
                            <div class="card">
                                <a class="text-decoration-none"
                                   href="<?php echo ROOT_URL . '/Product/details&id=' . $product['id'] ?>">
                                    <img src="<?php echo htmlspecialchars($product['image_url']) ?>"
                                         class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                                    <p class="card-text text-truncate--2"><?php echo $product['price']; ?></p>
                                    <div>
                                        <button type="button" class="btn btn-success">Thêm vào giỏ hàng</button>
                                        <a href="<?php echo ROOT_URL . '/Checkout/buyNow&product_id=' . $product['id'] ?>">
                                            <button type="button" class="btn btn-success">Mua ngay</button>
                                        </a>
                                        <input type="hidden" name="PId" value="<?php echo $product['id'] ?>">
                                        <input type='hidden' name='PName' value="<?php echo $product['product_name'] ?>">
                                        <input type='hidden' name='Image' value="<?php echo $product['image_url'] ?>">
                                        <input type='hidden' name='PPrice' value="<?php echo $product['price'] ?>">
                                        <input type='hidden' name='addcart' value="order">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <?php
                    $i++;
                    if ($i % 3 == 0) {
                        echo '<div class="clearfix d-md-none"></div>';
                    }

                } else {
                    $hair = [$product];
                }
            }
            ?>
        </div>
    </div>
    <div class="container">

        <div class="row row-cols-1 row-cols-md-3 g-4 mt-6" style="margin-top: 5%;">
            <?php if (!empty($hair))
                foreach ($searchResult as $product) {
                    if ($product['categories'] == 'hair') { ?>
                        <div class="col-md-4 col-12">
                            <form action="<?php echo ROOT_URL . '/Checkout/shoppingCart' ?>" method="post">
                                <div class="card">
                                    <a class="text-decoration-none"
                                       href="<?php echo ROOT_URL . '/Product/details&id=' . $product['id'] ?>">
                                        <img src="<?php echo htmlspecialchars($product['image_url']) ?>"
                                             class="card-img-top" alt="...">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                                        <p class="card-text text-truncate--2"><?php echo $product['price']; ?></p>
                                        <div>
                                            <button type="button" class="btn btn-success">Thêm vào giỏ hàng</button>
                                            <a
                                                href="<?php echo ROOT_URL . '/Checkout/buyNow&product_id=' . $product['id'] ?>">
                                                <button type="button" class="btn btn-success">Mua ngay</button>
                                            </a>
                                            <input type="hidden" name="PId" value="<?php echo $product['id'] ?>">
                                            <input type='hidden' name='PName'
                                                   value="<?php echo $product['product_name'] ?>">
                                            <input type='hidden' name='Image' value="<?php echo $product['image_url'] ?>">
                                            <input type='hidden' name='PPrice' value="<?php echo $product['price'] ?>">
                                            <input type='hidden' name='addcart' value="order">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <?php
                        $i++;
                        if ($i % 3 == 0) {
                            echo '<div class="clearfix d-md-none"></div>';
                        }

                    }
                } ?>
        </div>
    </div>
<?php } ?>
