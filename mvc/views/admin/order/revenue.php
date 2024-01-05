 <?php require_once dirname(__DIR__) . '/partials/header.php';
    ?>
 <div id="layoutSidenav_content">
     <main>
         <div class="container-fluid px-4">
             <h1 class="mt-4">Orders</h1>

             <div class="card mb-4">
                 <div class="card-header">
                     <i class="fas fa-table me-1"></i>
                     <th> User have many order</th>
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
                                     <td><?php echo $userHasOrder['orderId'] ?></td>
                                     <td><?php echo $userHasOrder['user_name'] ?></td>
                                     <td><?php echo $userHasOrder['phone'] ?></td>
                                     <td><?php echo $userHasOrder['date'] ?></td>
                                     <td><?php echo $userHasOrder['order_count'] ?></td>
                                     <td><?php echo $oruserHasOrderder['total_price'] ?></td>
                                     <?php $i++; ?>
                                 </tr>
                             <?php endforeach; ?>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>

         <?php require_once dirname(__DIR__) . '/partials/footer.php' ?>