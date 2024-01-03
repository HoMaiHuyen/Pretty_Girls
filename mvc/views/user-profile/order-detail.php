<?php require_once dirname(__DIR__) . "/partials/header.php"; ?>
<section>
  <div>
    <h3>Thông tin chi tiết của order</h3>
    <?php foreach ($order_item as $item) : ?>
      <div class="container">
        <div class="row ml-0 d-flex align-items-center justify-content-center">
          <div class="col-5 my-2">
            <img src="<?php echo $item['image_url'] ?>"  style="height: 200px; width: 250px;" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-3 my-2">
            <h5 class="card-title"><?php echo $item['product_name'] ?></h5>
          </div>
          <div class="col-3 my-2">
            <p class="card-text"><?php echo $item['unit_price'] ?></p>
          </div>
        </div>
      </div>

    <?php endforeach ?>
  </div>
</section>