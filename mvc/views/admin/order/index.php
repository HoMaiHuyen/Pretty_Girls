 <?php require_once dirname(__DIR__) . '/partials/header.php';
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
                       <input type="checkbox"/>
                     </td>
                     <td><?php echo htmlspecialchars($order['userId']) ?></td>
                     <td><?php echo  htmlspecialchars(($order['created_at'])) ?></td>
                     <td><?php echo  htmlspecialchars($order['total_price'])  ?></td>
                     <td><?php echo  htmlspecialchars($order['Dates']) ?></td>
                       <td><?php echo  htmlspecialchars($order['orderCount']) ?></td>
                     <td><button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal" data-order-id="<?php echo htmlspecialchars($order['userId']); ?>">
                          <?php if($order['status']=='Ordered'){
                              echo '<span  class="badge rounded-pill bg-warning text-dark">'. htmlspecialchars($order['status']) .'</span>' ;
                          }elseif($order['status']=='Delivery') {
                              echo '<span class="badge rounded-pill bg-light text-dark">'. htmlspecialchars($order['status']) .'</span>' ;
                          }elseif($order['status']=='Received'){
                               echo '<span  class="badge rounded-pill bg-success text-dark">'. htmlspecialchars($order['status']) .'</span>' ;
                          }else{
                             echo '<span  class="badge rounded-pill  bg-danger text-dark">'. htmlspecialchars($order['status']) .'</span>' ;
                          }
?></button>
                      </td>
                    
                     <td><?php echo  htmlspecialchars($order['total_price']) ?></td>
                     <?php $i++; ?>
                   </tr>
                 <?php } ?>
               </tbody>
             </table>
           </div>
         </div>
       </div>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <form action="<?php ROOT_URL.'/AdminOrder/changStatus?id_update='. $order['order_id']?>" method="post">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Change order status</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <select class="form-select" aria-label="Default select example">
                  <option selected>Status name</option>
                  <option class="mb-2" value="1">Ordered</option>
                  <option class="mb-2" value="2">Delivery</option>
                  <option class="mb-2" value="3">Received</option>
                  <option  value="3">Faild</option>
                </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          </form>
        </div>
      </div>

     <?php  }
      ?>
     <script>
       $(document).ready(function() {
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


        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const idUpdateParam = urlParams.get('id_update');
            if (idUpdateParam) {
                $('#exampleModal').modal('show');
            }
            $('#exampleModal').on('hidden.bs.modal', function(e) {
                window.location.href = 'VideoAdmin';
            });
        });
     
     function attachOrderButtonClickEvent() {
    var buttons = document.querySelectorAll('.order-status-btn');

    buttons.forEach(function (button) {
        button.addEventListener('click', function () {
            var orderId = this.getAttribute('data-order-id');
            console.log("Clicked on Order ID: " + orderId);

            // Thực hiện các thao tác khác với orderId nếu cần
        });
    });
}
  $('#exampleModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var orderId = button.data('order-id');

    console.log('Order ID:', orderId);

    var form = $(this).find('form');
    form.attr('action', '<?php echo ROOT_URL . '/AdminOrder/changStatus' ?>/' + orderId);
  });

document.addEventListener('DOMContentLoaded', attachOrderButtonClickEvent);

     $(document).ready(function () {
        $('.order-status-btn').on('click', function () {
            var orderId = $(this).data('order-id');
            console.log("Clicked on Order ID: " + orderId);

            // Thực hiện các thao tác khác với orderId nếu cần
        });
    });
     $(document).ready(function () {
        $('.btn-light').on('click', function () {
            var orderId = $(this).data('order-id');
            console.log("Clicked on Order ID: " + orderId);

            // Gửi yêu cầu AJAX tới server
            $.ajax({
                type: 'POST',
                url: 'path/to/your/controller/updateOrderStatus',
                data: { orderId: orderId },
                success: function (response) {
                    console.log(response); // In ra thông báo từ server
                    // Thực hiện các thao tác khác nếu cần
                },
                error: function () {
                    console.log('Error in AJAX request');
                }
            });
        });
    });
     </script>
  <?php require_once dirname(__DIR__) . '/partials/footer.php';?>
