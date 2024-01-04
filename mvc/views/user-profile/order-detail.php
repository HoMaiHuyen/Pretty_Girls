<?php require_once dirname(__DIR__) . "/partials/header.php";
$total_for_product = 0;
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
          <?php $total_for_product = $item['quantity'] * $item['unit_price'] ?>
          <hr>
          <p class="card-text">Total : <?php echo $total_for_product ?></p>
        </div>
      <?php endforeach ?>
    </div>
  </div>

  <div class="py-5">
    <div class="container">

      <div class="row">

        <div class="card">
          <div class="card-header">
            Order details
          </div>
          <div class="card-body">
            <div class="row"> 
              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                    </tr>
                    <tr>
                      <th>ID</th>
                      <th>Product name</th>
                      <th>Unit price</th>
                      <th>Quantity</th>
                      <th>Quantity</th>

                      <th>Total price </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td> fhdjd </td>
                      <td> fhdjd </td>
                    </tr>

                  </tbody>
                </table>
                <hr>
                <h4>Total price <span class="float-end">bhdhsbl </span> </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>