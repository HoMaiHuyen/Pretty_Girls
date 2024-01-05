 <?php require_once dirname(__DIR__) . '/partials/header.php';
    ?>
 <div id="layoutSidenav_content">
     <main>
         <div class="container-fluid px-4">
            <h1 class="mt-4">Orders</h1>
                <form id="formId" action="<?php echo ROOT_URL .'/Admin/searchUserHasMaxOrder'?>" method="post">
                    <input type="submit" value="<?php echo "Tìm user có " ?>"> 
                </form>
             <div class="card mb-4">
                 <div class="card-header">
                     <i class="fas fa-table me-1"></i>
                     <th>Information for order </th>
                 </div>
                 <div class="card-body">

                     <table id="datatablesSimple" class="table table-bordered">
                         <thead>
                             <tr>
                                 <th>STT</th>
                                 <th>Code</th>
                                 <th>Customer</th>
                                 <th>Phone</th>
                                 <th>Date</th>
                                 <th>Quantity</th>
                                 <th>Total price</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $i = 1;
                                foreach ($orders as $order) : ?>
                                 <tr>
                                     <td><?php echo $i ?></td>
                                     <td><?php echo $order['orderId'] ?></td>
                                     <td><?php echo $order['user_name'] ?></td>
                                     <td><?php echo $order['phone'] ?></td>
                                     <td><?php echo $order['date'] ?></td>
                                     <td><?php echo $order['order_count'] ?></td>
                                     <td><?php echo $order['total_price'] ?></td>
                                     <?php $i++; ?>
                                 </tr>
                             <?php endforeach; ?>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>

    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel12" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="<?php echo ROOT_URL.'/User/updateInforOrder' ?>">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel2">Update information order</h5>
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


         <?php require_once dirname(__DIR__) . '/partials/footer.php' ?>