<?php require_once dirname(__DIR__) . "/partials/header.php";
if ($orders) {
?>
  <div class="d-flex justify-content-center mt-4 mb-2">
    <h3>Your orders</h3>
  </div>
  <div id="order" class="container" style="margin-bottom:100px ;">
    <table class="table table-sm text-center table-bordered ml-5" style="width: 90%;">
      <thead class="thead-table-purchase">
        <th>Code</th>
        <th>Date</th>
        <th>Total price</th>
        <th>Order status</th>
        <th>Action</th>
        <th>View more</th>
      </thead>
      <tbody>
        <?php foreach ($orders as $order) : ?>
          <tr>
            <td><?php echo $order['orderId'] ?></td>
            <td><?php echo $order['Dates'] ?></td>
            <td><?php echo  $order['total_price'] ?></td>
            <td><?php if ($order['status'] == 'Ordered ') {
                  echo "<button class=btn btn-success'>" . $order['status'] . "</button>";
                } elseif ($order['status'] == 'Paid') {
                  echo "<button class=btn btn-danger'>" . $order['status'] . "</button>";
                } else {
                  echo "<button class=btn btn-primary'>" . $order['status']  . "</button>";
                } ?></td>
            <td>
              <button type="button" class="btn btn-outline-success">
                <a href="<?php echo ROOT_URL . '/checkout/createOrderDetail&id=' . $order['orderId'] ?>"><i class="fa-solid fa-pencil"></i></a>
              </button>
              <button type="button" class="btn btn-outline-success" <?php $order['orderId'] ?> data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa-solid fa-trash"></i>
              </button>
            </td>
            <td>
              <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                <a target="_self" href="<?php echo ROOT_URL . '/user/viewOrderItem&id=' . $order['orderId'] ?>">Detail</a>
              </button>
            </td>
          </tr>
        <?php endforeach;  ?>
      </tbody>
    </table>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h5>Do you want delete your order</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-info" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-outline-danger">
              <a class="ml-3" href="<?php echo ROOT_URL . '/user/deleteOrder&id=' . $order['orderId'] ?>">Yes</a>
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h5>Information detai for your order</h5>
            <div>
              <h6>Product name : <?php echo $item['product_name'] ?> </h6>
              <p class="card-text">Unit price : <?php echo $item['unit_price'] ?></p>
              <?php $total_for_product = $item['quantity'] * $item['unit_price'] ?>
              <p class="card-text">Total : <?php echo $total_for_product ?></p>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-info" data-bs-dismiss="modal">OK</button>

          </div>
        </div>
      </div>
    </div>

  </div>
<?php  } else { ?>
  <div class="container-fluid">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="col-md-8 text-center">

        <div>
          <img src="https://vitatree.com.vn/tp/T0269/img/tmp/shopping-cart.svg" style="width: 320px; height: 300px;" alt="">
        </div>
        <h4 class="hover-effect">Currently your shopping cart is empty, please click the button to continue shopping</h4>
        <button type="button" class="btn btn-outline-success mt-4"><a href="<?php echo ROOT_URL . '/Product/index' ?>">Shopping</a></button>
      </div>
    </div>
  </div>
<?php } ?>
<?php require_once dirname(__DIR__) . "/partials/footer.php"; ?>