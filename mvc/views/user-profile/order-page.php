<?php require_once dirname(__DIR__) . "/partials/header.php";

if ($orders) {
?>
  <div class="d-flex justify-content-center ">
  </div>
  <div class="py-5">
    <div class="container" id="order-page">
      <div class="">
        <div class="row">
          <div class="col-md-12">
            <table class="table">
              <thead class="table-header">
                <tr>
                  <th>ID</th>
                  <th>Tatol price</th>
                  <th>Quantity</th>
                  <th>Order status</th>
                  <th>Action</th>
                  <th>View</th>
                </tr>
              </thead>
              <tbody class="table-group-divider table-divider-color">
                <?php foreach ($orders as $order) : ?>
                  <tr>
                    <th scope="row"><?php echo $order['orderId'] ?></th>

                    <td><?php echo $order['Dates'] ?></td>
                    <td><?php echo  $order['total_price'] ?></td>
                    <td><?php if ($order['status'] == 'Ordered ') { ?>
                        <span class="badge badge-warning rounded-pill d-inline">Onboarding</span>
                      <?php
                        } elseif ($order['status'] == 'Paid') {
                      ?>
                        <span class="badge badge-warning rounded-pill d-inline">Onboarding</span>

                      <?php
                        } else {
                      ?>
                        <span class="badge badge-warning rounded-pill d-inline">Onboarding</span>
                      <?php  } ?>
                    </td>
                    <td>
                      <button type="button" class="btn  <?php $order['orderId'] ?>  btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                        <i class="fa-solid fa-pencil"></i>
                      </button>
                      <button type="button" class="btn btn-outline-success" <?php $order['orderId'] ?> data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-trash"></i>
                      </button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-outline-secondary">
                        <a  href="<?php echo ROOT_URL . '/user/viewOrderItem&id=' . $order['orderId'] ?>">Detail</a>
                      </button>
                    </td>
                  </tr>
                <?php endforeach;  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


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
        <form method="POST" action="<?php echo ROOT_URL.'/User/updateInforOrder' ?>">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Update information order</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="body-modal">
            <div class="col mb-3">
              <input type="text" class="form-control" name="user_name" placeholder="First name" value="<?php echo isset($_SESSION['user']['user_name']) ? $_SESSION['user']['user_name'] :""; ?>" aria-label="First name">
            </div>
            <div class="col mb-3">
              <input type="text" class="form-control" name="phone" placeholder="Last name" value="<?php echo isset($_SESSION['user']['phone']) ? $_SESSION['user']['phone'] :""; ?>" aria-label="Last name">
            </div>
            <div class="col mb-3">
              <input type="text" class="form-control" name="email" value="<?php echo isset($_SESSION['user']['email']) ? $_SESSION['user']['email'] :""; ?>" placeholder="Email" aria-label="Email">
            </div> 
             <div class="col mb-3">
              <input type="text" class="form-control" name="address" value="<?php echo isset($_SESSION['user']['address']) ? $_SESSION['user']['address'] :""; ?>" placeholder="Email" aria-label="Email">
            </div>
            <div class="col mb-3">
              <textarea class="form-control" value="" placeholder="Comments" aria-label="Comments"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-info" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-outline-danger">Save</button>
          </div>
        </form>
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