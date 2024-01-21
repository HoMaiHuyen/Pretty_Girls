<?php
if (isset($_COOKIE['success'])) {
?>
	<script>
		alert("Added order successful");
	</script>
<?php
}
if (isset($products)) { ?>

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
   
        <div class="row row-cols-1 row-cols-md-3 g-4">
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
                                        <button type="submit" name="addcart" class="btn btn-success">Add to cart</button>
                                        <a href="<?php echo ROOT_URL . '/Checkout/buyNow&product_id=' . $product['id'] ?>"><button type="submit" class="btn btn-success">Buy now</button></a>
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
                }  } ?>
        </div>
</div>
<?php }?>