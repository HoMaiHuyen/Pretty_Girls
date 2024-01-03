<?php require_once dirname(__DIR__) . "/partials/header.php"; 
$total_for_product =0;
?>
<section>
  <div class="container-fluid">
    <h3>Thông tin chi tiết của order</h3>
    <div class="row">
      <?php foreach ($order_item as $item) : ?>
        <div class="col-3" style="border: 1px solid bisque;">
          <h6>Product name : <?php echo $item['product_name'] ?> </h6>
          <p class="card-text">Quantity : <?php echo $item['quantity'] ?></p>
          <p class="card-text">Unit price : <?php echo $item['unit_price'] ?></p>
          <?php $total_for_product= $item['quantity']*$item['unit_price'] ?>
          <hr>
          <p class="card-text">Total : <?php echo $total_for_product ?></p>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>