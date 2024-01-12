<?php require_once dirname(__DIR__) . "/partials/header.php";

?>
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

<div class="container">
    <div class="card mt-4 w-75 mx-auto">
        <div class="card-body">
            <h5 class="card-title">Comments</h5>
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
                <form action="<?php echo ROOT_URL . '/Comment/comment' ?>" method="post">
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