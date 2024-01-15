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
			<div class="row mt-5">
				<?php
				$count = 0;
				foreach ($products as $product) :
					if ($product['categories'] == 'face') :
				?>

						<div class="col-lg-4 col-md-4 col-sm-12 mb-5">
							<form action="<?php echo ROOT_URL . '/user/shoppingCart' ?>" method="post">
								<div class="product-card">
									<a href="<?php echo ROOT_URL . '/Product/show&id=' . $product['id'] ?>">
										<div class="product-tumb">
											<img src="<?php echo $product['image_url'] ?>" class="img-fluid" alt="" <?php echo $product['image_name'] ?>">
										</div>
									</a>
									<div class="product-details">
										<span class="product-catagory product-price"><?php echo $product['price'] ?><small> VNĐ</small></span>
										<h4><a href="#!"><?php echo $product['product_name'] ?></a></h4>
										<p class="text-truncate--2"><?php echo $product['description'] ?></p>
										<div class="product-bottom-details">
											<div class="product-price"><button type="submit" class="btn btn-outline-success" name="addcart">Add cart</button></div>
											<div class="product-links">
												<a href="#!"><i class="fa fa-heart"></i></a>
												<a href="<?php echo ROOT_URL . '/user/shoppingCart' ?>"><i class="fa fa-shopping-cart"></i></a>
											</div>
										</div>
									</div>

									<div>
										<input type="hidden" name="PId" value="<?php echo  $product['id'] ?>">
										<input type='hidden' name='PName' value="<?php echo $product['product_name'] ?>">
										<input type='hidden' name='Image' value=" <?php echo $product['image_url'] ?>">
										<input type='hidden' name='PPrice' value=" <?php echo $product['price'] ?>">
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
		</div>
	</section>      

<?php

require_once dirname(__DIR__) . "/partials/footer.php"; ?>