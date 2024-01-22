<?php require_once dirname(__DIR__) . "/partials/header.php";
?>

<form action="<?php echo ROOT_URL . '/Checkout/shoppingCart' ?>" method="post">
    <div class="wrapper-product">
        <div class="product-img-detail">
            <img src="<?php echo htmlspecialchars($product['image_url']) ?>" height="420" width="327">
        </div>
        <div class="product-info">
            <div class="product-text">
                <h1><?php echo $product['product_name'] ?></h1>
                <h2>by studio and friends</h2>
                <p><?php echo htmlspecialchars($product['description']) ?> <br><span style="font-size: 25px;   color: #ED4D2D;"> <?php echo htmlspecialchars($product['price']) ?></span></p>
            </div>
            <div class="product-price-btn d-flex">
                <button type="submit" name="addcart" style="width: 200px;">add to cart</button>
                <button type="submit">buy now</button>
            </div>
        </div>
    </div>

    <input type="hidden" name="PId" value="<?php echo  $product['id'] ?>">
    <input type='hidden' name='PName' value="<?php echo $product['product_name'] ?>">
    <input type='hidden' name='Image' value=" <?php echo $product['image_url'] ?>">
    <input type='hidden' name='PPrice' value=" <?php echo $product['price'] ?>">
    <input type='hidden' name='addcart' value="order">

</form>
<div class="container mb-5">
    <div class="card mt-4 w-75 mx-auto">
        <div class="card-body">
            <?php if (isset($comments)) : ?>
                <?php foreach ($comments as $comment) { ?>
                    <div class="comment">
                        <p><?php echo $comment['message']; ?></p>
                        <p class="text-muted small"><?php echo $comment['comment_time']; ?></p>
                        <div class="d-flex align-items-center">
                            <form action="<?php echo ROOT_URL . '/Comment/deleteComment&id=' . $comment['id'] . '&user_id=' . $comment['user_id'] . '&product_id=' . $comment['product_id'] ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                                <input type="hidden" name="id" value="<?php echo $comment['id']; ?>">
                                <input type="hidden" name="user_id" value="<?php echo $comment['user_id']; ?>">
                                <input type="hidden" name="product_id" value="<?php echo $comment['product_id']; ?>">
                                <button type="submit" class="btn btn-link me-2" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $comment['id']; ?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $comment['id']; ?>">
                                <i class="fas fa-pen"></i>
                            </button>
                        </div>
                        <div class="modal fade" id="editModal<?php echo $comment['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel<?php echo $comment['id']; ?>" aria-hidden="true">
                            <form action="<?php echo ROOT_URL . '/Comment/updateComment&id=' . $comment['id'] . '&user_id=' . $comment['user_id'] . '&product_id=' . $comment['product_id'] ?>" method="POST">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel<?php echo $comment['id']; ?>">Update comment</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group mb-3">
                                                <textarea class="form-control" name="message"><?php echo $comment['message']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-outline">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr>
                    </div>
                <?php } ?>
            <?php endif; ?>
        </div>
        <div class="card mt-2 w-75 mb-3 mx-auto">
            <div class="card-body">
                <h5 class="card-title">Write Comment</h5>
                <form action="<?php echo ROOT_URL . '/Comment/comment&id=' . $product['id'] ?>" method="post">
                    <input type="hidden" name="PId" value="<?php echo $product['id'] ?>">
                    <div class="mb-3">
                        <textarea class="form-control" name="comment" placeholder="Your comment" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
   
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-6" style="margin-top: 5%;">
            <?php
            $i = 0;
            foreach ($products as $product) {
                if ($product['categories'] == 'face') {
            ?>
                    <div class="col-md-4">
                     <form action="<?php echo ROOT_URL . '/Checkout/shoppingCart' ?>" method="post">
                        <div class="card">
                        
                            <a class="text-decoration-none" href="<?php echo ROOT_URL . '/Product/details&id=' . $product['id'] ?>">
                                <img src="<?php echo htmlspecialchars($product['image_url']) ?>" class="card-img-top" alt="...">                   
                                 </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                                    <p class="card-text text-truncate--2"><?php echo $product['price']; ?></p>
                                    <div>
                                        <button type="button" class="btn btn-success">Add to cart</button>
                                        <a href="<?php echo ROOT_URL . '/Checkout/buyNow&product_id=' . $product['id'] ?>"><button type="button" class="btn btn-success">Buy now</button></a>
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
                } elseif($product['categories'] =='hair') {
                    ?>
                    <div class="col-md-4 mt-6" style="margin-top: 5%;">
                     <form action="<?php echo ROOT_URL . '/Checkout/shoppingCart' ?>" method="post">
                        <div class="card">
                            <a class="text-decoration-none" href="<?php echo ROOT_URL . '/Product/details&id=' . $product['id'] ?>">
                                <img src="<?php echo htmlspecialchars($product['image_url']) ?>" class="card-img-top" alt="...">
                                  </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                                    <p class="card-text text-truncate--2"><?php echo $product['price']; ?></p>
                                    <div>
                                        <button type="submit" name="addcart" class="btn btn-success">Add to cart</button>
                                        <button type="submit" class="btn btn-success">Buy now</button>
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
                }
            }
            ?>
        </div>
</div>


<?php require_once dirname(__DIR__) . "/partials/footer.php"; ?>