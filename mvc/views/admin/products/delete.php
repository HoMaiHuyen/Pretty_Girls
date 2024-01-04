 <?php require_once dirname(__DIR__) . '/partials/header.php';  ?>

 <div id="layoutSidenav_content">
     <main>
         <div class="container">
             <form action="<?php echo ROOT_URL . '/admin/deleteProduct1' ?>" method="post">
                 <div class="container" style="width:500px;height:400px; background-color:aqua;">
                     <div>
                         <div class="float-start">Product</div>
                         <div class="float-end"><i class="fa fa-times" aria-hidden="true"></i></div>
                     </div>
                     </br>
                     <hr>
                     <p>Are you want to Delete ?</p>
                     <hr>
                     <input type="hidden" class="form-control" id="id"  name="id" value="<?php echo $productOne['id']?>">
                     <button ><a href="<?php echo ROOT_URL . '/admin/showProduct' ?>"></a>No</button>
                     <button> <a href="<?php echo ROOT_URL . '/admin/deleteProduct1' ?>"></a>Yes</button>
                 </div>
                 <div>
                    
                 </div>
             </form>
         </div>
     </main>
 </div>
 <?php require_once dirname(__DIR__) . '/partials/footer.php' ?>