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
                    <div class="d-flex flex-column align-items-center text-center" id="image-profile">
                        <img src="<?php loadImage('Anh-user.png') ?>" alt="Avatar" id="output" class="rounded-circle">
                        <div class="mt-3">
                            <h4><?php echo $result[0]['user_name']; ?></h4>
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
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($result[0]['email']) ? $result[0]['email'] : "" ?>" placeholder="Example@example.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-3 col-form-label">Phone </label>
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
                                        <button type="submit" class="btn button-item-save px-4" <?php $id = $result[0]['id'] ?>>Save information</a></button>
                                        <button type="button" class="btn button-item-back px-4 ml-2"> Back</button>
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
                    <th>Code</th>
                    <th>Date</th>
                    <th>Total price</th>
                    <th>Order status</th>
                    <th>Order details</th>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order) : ?>
                        <tr>
                            <td><?php echo $order['id'] ?></td>
                            <td><?php echo $order['user_id'] ?></td>
                            <td><?php echo  $order['date'] ?></td>
                            <td><?php echo  $order['total_price'] ?></td>
                            <td><?php if ($order['order_status'] == 'received') {
                                    echo "<button class=btn btn-success'>" . $order['order_status'] . "</button>";
                                } elseif ($order['order_status'] == 'not received') {
                                    echo "<button class=btn btn-danger'>" . $order['order_status'] . "</button>";
                                } else {
                                    echo "<button class=btn btn-primary'>" . $order['order_status'] . "</button>";
                                } ?></td>
                            <td><?php ?></td>

                        </tr>
                    <?php endforeach;  ?>
                </tbody>
            </table>
        </div>
    </section>


<?php
endif;
?>
<script src="<?php echo ROOT_URL . '/public/js/user-profile.js' ?>"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</html>