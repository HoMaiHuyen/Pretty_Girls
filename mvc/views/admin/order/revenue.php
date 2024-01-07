 <?php require_once dirname(__DIR__) . '/partials/header.php';

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
                   <th>Expense</th>
                   <th>Total order</th>
                   <th>Quantity of Product</th>
                   <th>Revenue</th>
                 </tr>
               </thead>
               <tbody>
                 <?php $i = 1;
                 $sum = 0;
                  foreach ($revenue as $order) : ?>
                   <tr>
                     <td>
                       <input type="checkbox" />
                     </td>
                     <td><?php echo  isset($order['orderId']) ? $order['orderId'] : ''  ?></td>
                     <td><?php echo isset($order['total_order']) ? $order['total_order']  : '' ?></td>
                     <td><?php echo isset($order['quantity']) ? $order['quantity'] : '' ?></td>
                     <td><?php echo isset($order['total_revenue']) ? $order['total_revenue'] : ''  ?></td>
                        <?php $sum = $sum +$order['total_revenue'] ; ?>
                     <?php $i++; ?>
                   </tr>
                 <?php endforeach; ?>
                
               </tbody>
             </table>
           </div>
         </div>
       </div>
<?php require_once dirname(__DIR__) . '/partials/footer.php' ?>