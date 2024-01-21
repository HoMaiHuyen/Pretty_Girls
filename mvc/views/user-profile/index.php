<?php
require_once dirname(__DIR__) . "/partials/header.php";

?>
<section>
    <div id="profile" class="tabcontent">
        <div class="row">
            <div class="col-md-3 mb-3 main-profile">
                <form action="<?php echo ROOT_URL . '/User/updateImage' ?>" method="post" enctype="multipart/form-data">
                    <div class="d-flex flex-column align-items-center text-center" id="image-profile">
                        <img src='<?php echo  $user['image_url'] ?>' alt="" id="output" class="rounded-circle">
                        <div class="mt-3">
                            <h4><?php echo $user['user_name'] ?></h4>
                            <div class="mb-3">
                                <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                                <input type="file" class="form-control" id="PImage_url" name="PImage_url" value="<?php echo $user['image_url'] ?>">
                                <p style="color: red;"><?php echo empty($image_url_error)? "" : $image_url_error ?></p>
                                <button type="submit" class="btn btn-primary" name="updateProfile" >Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
       

<script>
    function previewImage() {
        var input = document.getElementById('image');
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(input.files[0]);
    }
</script>

            <div class="col-md-7">
                <div class="card card-profile" style="height: 95%;">
                    <div class="card-body">
                        <form action="<?php echo ROOT_URL . '/User/updateUser' ?>" method="post">
                            <input type="hidden" value="<?php echo  $user['id'] ?>" name="id">
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
                                    <button type="submit" name="buton-save" class="btn button-item-save px-4">Save information</a></button>
                                    <button type="button" class="btn button-item-back px-4 ml-2"> Back</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-around flex-start text-center mt-4 mb-2 p-5">
        <a href="<?php echo ROOT_URL . '/user/viewOrder' ?>" class="h-100 w-250" style="border: 1px solid #ccc; border-radius: 15px; width: 200px;">
            <div class="p-4">
                <p class="mb-2 h5"><i class="fa-brands fa-shopify" style="font-size:35px; color: #ED4D2D;"></i></p>
                <p class="text-muted mb-0">Your orders</p>
            </div>
        </a>
        <a href="#!" class="h-100 w-150" style="border: 1px solid #ccc; border-radius: 15px;width: 200px;">
            <div class="px-3 p-4">
                <p class="mb-2 h5"><i class="fa-solid fa-comment" style="font-size:35px; "></i></p>
                <p class="text-muted mb-0">Comments</p>

            </div>
        </a>
        <a href="#!" class="h-100 w-150" style="border: 1px solid #ccc; border-radius: 15px;width: 200px;   ">
            <div class="p-4">
                <p class="mb-2 h5"><i class="fa-solid fa-bell" style="font-size: 35px; color: rgb(189, 189, 31);"></i></p>
                <p class="text-muted mb-0">News</p>
            </div>
        </a>
    </div>

</section>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>