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
            <a href="<?php echo ROOT_URL . '/checkout/createOrderDetail?id=' . $order['orderId'] ?>"><i class="fa-solid fa-pencil"></i></a>

            <a class="ml-3" href="<?php echo ROOT_URL . '/user/delete&id=' . $order['orderId'] ?>"><i class="fa-solid fa-trash"></i></a>
          </td>
          <td>
                <a href="<?php echo ROOT_URL . '/user/viewOrderItem&id=' . $order['orderId'] ?>">"></a>
          </td>

        </tr>
      <?php endforeach;  ?>
    </tbody>
  </table>

</div>
<?php require_once dirname(__DIR__) . "/partials/footer.php"; ?>