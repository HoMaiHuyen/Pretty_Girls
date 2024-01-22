 <?php require_once dirname(__DIR__) . '/partials/header.php';  ?>

 <div id="layoutSidenav_content">
     <main>
         <div class="container-fluid px-4">
             <h1 class="mt-4">Products</h1>
             <div class="card mb-4">
                 <div class="card-header">
                     <div style="display: flex;">
                         <div >
                             <th><a href="<?php echo ROOT_URL . '/AdminProduct/insertProduct' ?>"><button type="button" class="btn btn-light btn-light" style="background-color:blue">Add Product</button></a></th>
                         </div>
                         <div style="padding-left: 800px;">
                             <form action="<?php echo ROOT_URL . '/AdminProduct/search' ?>" method="post">
                                 <input type="text" placeholder="Search <?php echo isset($search_key) ? $search_key : ""  ?>" name='key'>
                             </form>
                         </div>
                     </div>
                 </div>
                 <div class="card-body">

                     <table id="datatablesSimple" class="table table-bordered text-center">
                         <thead class="text-center">
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
                                     <td><img src='<?php echo  $product['image_url'] ?>' alt='<?php echo $product['image_name'] ?>' style="width:50px;height:40px;"></td>
                                     <td><?php echo $product['quantity'] ?></td>
                                     <td><?php echo $product['price'] ?></td>
                                     <th><a  href="<?php echo ROOT_URL . '/AdminProduct/deleteProduct&id=' . $product['id'] ?>"><span class="badge rounded-pill  bg-danger text-dark">Delete</span></a></th>
                                     <th><a href="<?php echo ROOT_URL . '/AdminProduct/updateProduct&id=' . $product['id'] ?>"><span class="badge rounded-pill bg-success text-text-success">Update</span></a></th>
                                 </tr>

                             <?php } ?>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
         <?php require_once dirname(__DIR__) . '/partials/footer.php' ?>