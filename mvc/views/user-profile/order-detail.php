<?php require_once dirname(__DIR__) . "/partials/header.php";
$total_for_product = 0;
$total_for_order = 0
?>
<section>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="card">
          <div class="card-header" style="background-color: #95A5A6">
            Order details
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table text-center align-middle">
                  <thead>
                    <tr>
                      <th>ID</th>
                    </tr>
                    <tr>
                      <th>ID</th>
                      <th>Product name</th>
                      <th>Unit price</th>
                      <th>Quantity</th>
                      <th>Date</th>
                      <th>Total price </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($order_item as $item) : ?>
                      <tr>
                        <td> <?php echo $item['id'] ?></td>
                        <td> <?php echo $item['product_name'] ?></td>
                        <td> <?php echo $item['unit_price'] ?></td>
                        <td> <?php echo $item['quantity'] ?></td>
                        <?php $total_for_product = $item['quantity'] * $item['unit_price'] ?>
                        <td> <?php echo $item['date'] ?></td>
                        <td> <?php echo $total_for_product ?></td>
                        <?php $total_for_order += $total_for_product ?>

                      </tr>
                    <?php endforeach ?>

                  </tbody>
                </table>
                <hr>
                <h4>Total price <span class="float-end"> <?php echo $total_for_order ?> </span> </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <button type="button" class="btn btn-outline-secondary">
      <a href="<?php echo ROOT_URL . '/user/viewOrder' ?>"><i class="fa-solid fa-arrow-left"></i></a>
    </button>
  </div>

</section>