<?php require_once dirname(__DIR__) . "/partials/header.php"; ?>
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
		<div class="row mt-5">
			<?php
			$count = 0;
			foreach ($products as $product) :
				if ($product['categories'] == 'face') :
			?>

					<div class="col-lg-4 col-md-4 col-sm-12 mb-5">
						<form action="<?php echo ROOT_URL . '/user/shoppingCart' ?>">
							<div class="product-card">
							<a href="<?php echo ROOT_URL . '/Product/show&id=' . $product['id'] ?>">
								<div class="product-tumb">
									<img src="<?php echo $product['image_url'] ?>" class="img-fluid" alt="">
								</div>
								</a>
								<div class="product-details">
									<span class="product-catagory product-price"><?php echo $product['price'] ?><small> VNĐ</small></span>
									<h4><a href=""><?php echo $product['product_name'] ?></a></h4>
									<p class="text-truncate--2"><?php echo $product['description'] ?></p>
									<div class="product-bottom-details">
										<div class="product-price"><button class="btn btn-outline-success"  name="addcart">Add cart</button></div>
										<div class="product-links">
											<a href=""><i class="fa fa-heart"></i></a>
											<a href=""><i class="fa fa-shopping-cart"></i></a>
										</div>
									</div>
								</div>

								<div>
									<input type="hidden" name="PId" value="<?php echo  $product['id'] ?>">
									<input type='hidden' name='PName' value="<?php echo $product['product_name'] ?>">
									<input type='hidden' name='Image' value=" <?php echo $product['image_url'] ?>">
									<input type='hidden' name='PPrice' value=" <?php echo $product['price'] ?>">
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
		<div class="row">
			<?php
			$count = 0;
			foreach ($products as $product) :
				if ($product['categories'] == 'hair') :
			?>

					<div class="col-lg-4 col-md-4 col-sm-12 mb-5">
						<form action="<?php echo ROOT_URL . '/user/shoppingCart' ?>" method="post">
							<div class="product-card">

								<div class="badge">Buy <?php echo $product['id'] ?></div>
								<a href="<?php echo ROOT_URL . '/Product/show&id=' . $product['id'] ?>">
									<div class="product-tumb">
										<img src="<?php echo $product['image_url'] ?>" class="img-fluid" alt="">
									</div>
								</a>
								<div class="product-details">
									<span class="product-catagory product-price"><?php echo $product['price'] ?><small> VNĐ</small></span>
									<h4><a href=""><?php echo $product['product_name'] ?></a></h4>
									<p class="text-truncate--2"><?php echo $product['description'] ?></p>
									<div class="product-bottom-details">
										<div class="product-price"><button class="btn btn-outline-success"  name="addcart">Add cart</button></div>
										<div class="product-links">
											<a href="#!"><i class="fa fa-heart"></i></a>
											<a href=""><i class="fa fa-shopping-cart"></i></a>
										</div>
									</div>
								</div>

								<div>
									<input type="hidden" name="PId" value="<?php echo  $product['id'] ?>">
									<input type='hidden' name='PName' value="<?php echo $product['product_name'] ?>">
									<input type='hidden' name='Image' value=" <?php echo $product['image_url'] ?>">
									<input type='hidden' name='PPrice' value=" <?php echo $product['price'] ?>">
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
<?php require_once dirname(__DIR__) . "/partials/footer.php"; ?>