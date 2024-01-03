<?php 
require_once dirname(__DIR__) . "/partials/header.php";
foreach($result as $user) :
?>
<section>
        <div id="profile" class="tabcontent">
            <div class="row">
                <div class="col-md-3 mb-3 main-profile">
                    <div class="d-flex flex-column align-items-center text-center" id="image-profile">
                        <img src="<?php echo isset($user['image_url']) ? $user['image_url'] : '' ?>" alt="<?php echo isset($user['image_name']) ? $user['image_name'] : '' ?>" id="output" class="rounded-circle">
                        <div class="mt-3">
                            <h4><?php echo $user['user_name'] ?></h4>
                            <div class="mb-3">
                                <input type="file" id="image" accept="image*/" onchange="loadFile(event)" name="image" class=" d-none">
                                <label for="image" class="btn btn-outline-secondary pt-2 " id="button-upload-image">
                                    <i class="fas fa-upload"></i> Avatar
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card card-profile" style="height: 95%;" >
                        <div class="card-body">
                            <form action="<?php echo ROOT_URL.'/User/updateUser' ?>" method="post">
                                <input type="hidden" value="" name="id">
                                <div class="form-group row">
                                    <label for="fullname" class="col-sm-3 col-form-label">User name :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="fullname" name="name" value="<?php echo $user['user_name'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email:</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email'] ?>" placeholder="Example@example.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-3 col-form-label">Phone </label>
                                    <div class="col-sm-9">
                                        <input type="phone" class="form-control" id="phone" name="phone" value="<?php echo $user['phone'] ?>" placeholder="xxxx-xx-xxx">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-3 col-form-label">Address:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $user['address'] ?>" placeholder="Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" class="btn button-item-save px-4">Save information</a></button>
                                        <button type="button" class="btn button-item-back px-4 ml-2"> Back</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;  ?>
        <div class="container-fluid orther-page">
            <div class="row">
              <div class="card col-md-3  mx-auto my-links">
              
                <a href="link1.html" class="text-center">
                  <h2>Block 1</h2>
                  <p>Shopping center</p>
                </a>
              </div>
          
              <div class="card col-md-3 mx-auto my-links">
                <a href="<?php echo ROOT_URL . '/user/viewOrder?id='.$_SESSION['user_id'] ?>" class="text-center">
                  <h2>Block 2</h2>
                  <p>View Order</p>
                </a>
            
              </div>
          
              <div class="card col-md-3 mx-auto my-links">
                <a href="link3.html" class="text-center">
                  <h2>Block 3</h2>
                  <p>Content of Block 3</p>
                </a>
              </div>
            </div>
          </div>

    </section>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>