<?php require_once dirname(__DIR__) . "/partials/header.php";
?>
<div>
  <h4>Your order </h4>
</div>
<div id="order" class="container" style="margin-bottom:100px ;">
  <table class="table table-hover ml-5" style="width: 100%;">
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
            <a href="<?php echo ROOT_URL . '/checkout/createOrderDetail&id=' . $order['orderId'] ?>"><i class="fa-solid fa-pencil"></i></a>

            <a class="ml-3" href="<?php echo ROOT_URL . '/user/deleteOrder&id=' . $order['orderId'] ?>"><i class="fa-solid fa-trash"></i></a>
          </td>
          <td>
<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                <a href="<?php echo ROOT_URL . '/user/viewOrderItem&id=' . $order['orderId'] ?>">"></a>
                </button>
          </td>

        </tr>
      <?php endforeach;  ?>
    </tbody>
  </table>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
</div>
<?php require_once dirname(__DIR__) . "/partials/footer.php"; ?>