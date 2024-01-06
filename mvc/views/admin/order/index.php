 <?php require_once dirname(__DIR__) . '/partials/header.php';
  if (isset($orders)) {
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
                   <th>Total price</th>
                 </tr>
               </thead>
               <tbody>
                 <?php $i = 1;
                  foreach ($orders as $order) : ?>
                   <tr>
                     <td>
                       <input type="checkbox" />
                     </td>
                     <td><?php echo isset($order['orderId']) ? $order['orderId'] : '' ?></td>
                     <td><?php echo isset($order['user_name']) ? $order['user_name']  : '' ?></td>
                     <td><?php echo isset($order['phone']) ? $order['phone'] : '' ?></td>
                     <td><?php echo isset($order['date']) ? $order['date'] : ''  ?></td>
                     <td><?php echo isset($order['order_count']) ? $order['order_count'] : '' ?></td>
                     <td><?php echo isset($order['total_price']) ? $order['total_price'] : '' ?></td>
                     <?php $i++; ?>
                   </tr>
                 <?php endforeach; ?>
               </tbody>
             </table>
           </div>
         </div>
       </div>
     <?php  } else {
    } ?>
     <script>
       $(document).ready(function() {
         // Khởi tạo DataTables với tùy chọn tìm kiếm dropdown
         $('#datatablesSimple').DataTable({
           initComplete: function() {
             this.api().columns().every(function() {
               var column = this;
               var select = $('<select><option value=""></option></select>')
                 .appendTo($(column.footer()).empty())
                 .on('change', function() {
                   var val = $.fn.dataTable.util.escapeRegex(
                     $(this).val()
                   );

                   column
                     .search(val ? '^' + val + '$' : '', true, false)
                     .draw();
                 });

               column.data().unique().sort().each(function(d, j) {
                 select.append('<option value="' + d + '">' + d + '</option>')
               });
             });
           }
         });
       });
     </script>
     <?php require_once dirname(__DIR__) . '/partials/footer.php' ?>