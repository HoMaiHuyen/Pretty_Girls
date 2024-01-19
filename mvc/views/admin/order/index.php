 <?php require_once dirname(__DIR__) . '/partials/header.php';
 $orderTemp=[];
 if(isset($_GET['message'])){
  if($_GET['message']=='success'){
  ?>
    <script>
    alert("Cập nhật thành công")
    </script>
   <?php  
 }
 }

  if (isset($orderss)) {
  ?>
   <div id="layoutSidenav_content">
     <main>
       <div class="container-fluid px-4">
         <h1 class="mt-4">Orders</h1>
         <div class="card mb-4">
           <div class="card-header">
             <i class="fas fa-table me-1"></i>
             <th>Information for order </th>
           </div>
           <div class="card-body">

             <table id="datatablesSimple" class="table table-bordered">
               <thead>
                 <tr>
                   <th></th>
                   <th>Code</th>
                   <th>Customer</th>
                   <th>Phone</th>
                   <th>Date</th>
                   <th>Quantity</th>
                   <th>Status</th>
                   <th>Total price</th>
                 </tr>
               </thead>
               <tbody>
                 <?php $i = 1;
                  foreach ($orderss as $order) { ?>
                   <tr>
                     <td>
                       <input type="checkbox" class="order-checkbox" id='box' <?php echo htmlspecialchars($order['orderId']); ?>">
                     </td>
                     <td><?php echo htmlspecialchars($order['orderId']) ?></td>
                     <td><?php echo  htmlspecialchars(($order['created_at'])) ?></td>
                     <td><?php echo  htmlspecialchars($order['total_price'])  ?></td>
                     <td><?php echo  htmlspecialchars($order['Dates']) ?></td>
                     <td><?php echo  htmlspecialchars($order['payment']) ?></td>
                     <td><button type="button" id="btnUpdateStatus" class="btn btn-light" onclick="(event, <?php $order['orderId'] ?> )" <?php $order['orderId'] ?> >
                       <a href="<?php echo ROOT_URL.'/AdminOrder/viewToUpdate&order_id='.$order['orderId']  ?>"><?php if ($order['status'] == 'Ordered') {
                            echo '<span  class="badge rounded-pill bg-warning text-dark">' . htmlspecialchars($order['status']) . '</span>';
                          } elseif ($order['status'] == 'Delivery') {
                            echo '<span class="badge rounded-pill bg-light text-dark">' . htmlspecialchars($order['status']) . '</span>';
                          } elseif ($order['status'] == 'Received') {
                            echo '<span  class="badge rounded-pill bg-success text-dark">' . htmlspecialchars($order['status']) . '</span>';
                          } else {
                            echo '<span  class="badge rounded-pill  bg-danger text-dark">' . htmlspecialchars($order['status']) . '</span>';
                          }
                          ?></a> </button>
                     </td>

                     <td><?php echo  htmlspecialchars($order['total_price']) ?></td>
                     <?php $i++; 
                     $orderTemp= [
                      'order_id'=>$order['orderId'],
                      'total_price'=>$order['total_price'],
                      'created_at'=>$order['created_at'],
                      'payment'=>$order['payment'],
                      'customer_name'
                     ]?>
                   </tr>
                 <?php } ?>
               </tbody>
             </table>
           </div>
         </div>
       </div>


       <div class="modal fade" id="model_update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
           <div class="modal-content">
             <form id="updateStatusForm" action="<?php echo ROOT_URL . '/AdminOrder/changStatus'; ?>" method="post">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Change order status</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <input type="hidden" id="order_id_input" name="order_id" value="">
                 <select class="form-select" name="order_status" aria-label="Default select example">
                   <option selected>Select status name</option>
                   <option class="mb-2" value="1">Ordered</option>
                   <option class="mb-2" value="2">Delivery</option>
                   <option class="mb-2" value="3">Received</option>
                   <option class="mb-2" value="4">Failed</option>
                 </select>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Save changes</button>
               </div>
             </form>
           </div>
         </div>
       </div>

     <?php  }
      ?>

     <script>
      
     </script>
     <?php require_once dirname(__DIR__) . '/partials/footer.php'; ?>