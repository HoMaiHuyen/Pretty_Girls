<?php require_once dirname(__DIR__) . "/partials/header.php";

if ($result[0]['role'] != 'admin') :
?>
    <section>
        <div class="tab tab-user-profile">
            <button class="tablinks1" id="defaultOpen" onclick="openCity(event, 'profile')">Information</button>
            <button class="tablinks" id="order-hister" onclick="openCity(event, 'order')">Order</button>
        </div>
        <div id="profile" class="tabcontent">
            <div class="row">
                <div class="col-md-4 mb-3 main-profile">
                    <form action="/User/updateUser" method="post">
                        <div class="d-flex flex-column align-items-center text-center" id="image-profile">
                            <img src="<?php loadImage('Anh-user.png') ?>" alt="Avatar" id="output" class="rounded-circle">
                            <div class="mt-3">
                                <h4><?php echo $result[0]['user_name']; ?></h4>
                                <div class="mb-3">
                                    <input type="hidden" value="<?php echo $result[0]['id'] ?>" name="id">
                                    <input type="file" id="image" accept="image*/" onchange="loadFile(event)" name="image" class=" d-none">
                                    <label for="image" class="btn btn-outline-secondary pt-2 " id="button-upload-image">
                                        <i class="fas fa-upload"></i> Ảnh
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-7">
                    <div class="card card-profile">
                        <div class="card-body">
                            <form action="<?php echo ROOT_URL . '/User/updateUser' ?>" method="post">
                                <input type="hidden" value="<?php echo $result[0]['id'] ?>" name="id">
                                <div class="form-group row">
                                    <label for="fullname" class="col-sm-3 col-form-label">User name :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="fullname" name="name" value="<?php echo $result[0]['user_name']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label">Password:</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="password" name="password" value="<?php echo $result[0]['password'] ?>" onmousedown="this.type='text'" onmouseup="this.type='password'">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email:</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $result[0]['email'] ?>" placeholder="Example@example.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-3 col-form-label">Phone number</label>
                                    <div class="col-sm-9">
                                        <input type="phone" class="form-control" id="phone" name="phone" value="<?php echo $result[0]['phone'] ?>" placeholder="xxxx-xx-xxx">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-3 col-form-label">Address:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $result[0]['address'] ?>" placeholder="Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" class="btn button-item-save px-4" <?php $result[0]['id'] ?><a href="<?php echo  ROOT_URL . '/User/show?id=$id' ?>">Save information</a></button>
                                        <button type="button" class="btn button-item-back px-4 ml-2">Back</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="order" class="tabcontent" style="margin-bottom:100px ;">

            <table style="width: 100%;">
                <thead class="thead-table-purchase">
                    <th>STT</th>
                    <th>Product name</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total price</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    <tr>
                        <td><?php ?></td>
                        <td><?php ?></td>
                        <td><?php ?></td>
                        <td><?php ?></td>
                        <td><?php ?></td>
                        <td><?php ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>


<?php
endif;
?>
<script src="<?php echo ROOT_URL . '/public/js/user-profile.js' ?>"></script>
</body>

</html>