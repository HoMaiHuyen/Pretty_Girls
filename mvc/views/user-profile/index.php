<?php 
require_once dirname(__DIR__) . "/partials/header.php";


?>
<section>
        <div id="profile" class="tabcontent">
            <div class="row">
                <div class="col-md-4 mb-3 main-profile">
                    <div class="d-flex flex-column align-items-center text-center" id="image-profile">
                        <img src="" alt="Avatar" id="output" class="rounded-circle">
                        <div class="mt-3">
                            <h4>Ten Admin</h4>
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
                    <div class="card card-profile">
                        <div class="card-body">
                            <form action="" method="post">
                                <input type="hidden" value="" name="id">
                                <div class="form-group row">
                                    <label for="fullname" class="col-sm-3 col-form-label">User name :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="fullname" name="name" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label">Password:</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="password" name="password" value="" onmousedown="this.type='text'" onmouseup="this.type='password'">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email:</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email" value="" placeholder="Example@example.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-3 col-form-label">Phone </label>
                                    <div class="col-sm-9">
                                        <input type="phone" class="form-control" id="phone" name="phone" value="" placeholder="xxxx-xx-xxx">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-3 col-form-label">Address:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="address" name="address" value="" placeholder="Address">
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
        <div class="container orther-page">
            <div class="row">
              <div class="col-sm-3 mx-auto my-links">
              
                <a href="link1.html" class="card text-center">
                  <h2>Block 1</h2>
                  <p>Content of Block 1</p>
                </a>
              </div>
          
              <div class="col-sm-3 mx-auto my-links">
              <div class="card">
                <a href="link2.html" class="card text-center">
                  <h2>Block 2</h2>
                  <p>Content of Block 2</p>
                </a>
                </div>
              </div>
          
              <div class="col-sm-3 mx-auto my-links">
                <a href="link3.html" class="card text-center">
                  <h2>Block 3</h2>
                  <p>Content of Block 3</p>
                </a>
              </div>
            </div>
          </div>

    </section>

</body>
</html>