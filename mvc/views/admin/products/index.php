 <?php require_once dirname(__DIR__) . '/partials/header.php';  ?>

 <div id="layoutSidenav_content">
     <main>
         <div class="container-fluid px-4">
             <h1 class="mt-4">Products</h1>
             <div class="card mb-4">
                 <div class="card-header">
                     <i class="fas fa-table me-1"></i>
                     <th><a href="<?php echo ROOT_URL . '/admin/ProductAdmin/insertProduct' ?>"><button type="button" class="btn btn-light btn-light" style="background-color:blue">Add Product</button></a></th>
                 </div>
                 <div class="card-body">

                     <table id="datatablesSimple" class="table table-bordered">
                         <thead>
                             <tr>
                                 <th>ID Produt</th>
                                 <th>Product Name</th>
                                 <th>Image</th>
                                 <th>Quantity</th>
                                 <th>Price</th>
                                 <th colspan="2"><button type="button" class="btn btn-light btn-light-action" style="background-color:blue">Action</button></th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                                foreach ($resultProduct as $product) {
                                ?>
                                 <tr>
                                     <td><?php echo $product['id'] ?></td>
                                     <td><?php echo $product['product_name'] ?></td>
                                     <td><img src='<?php  echo  $product['image_url'] ?>' alt='<?php echo $product['image_name'] ?>' style="width:50px;height:40px;"></td>
                                     <td><?php echo $product['quantity'] ?></td>
                                     <td><?php echo $product['price'] ?></td>
                                     <th><a class="btn btn-outline-danger" href="<?php echo ROOT_URL . '/admin/Product/deleteProduct&id=' . $product['id'] ?>"><i class='fa-solid fa-trash'></i>Delete</a></th>
                                     <th><a class="btn btn-outline-success" href="<?php echo ROOT_URL . '/admin/Product/updateProduct&id=' . $product['id'] ?>"><i class="fa fa-pencil-square" aria-hidden="true" name=""></i>Update</a></th>
                                 </tr>

                             <?php } ?>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
         <?php require_once dirname(__DIR__) . '/partials/footer.php' ?>