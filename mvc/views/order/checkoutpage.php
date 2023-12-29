<?php 
session_start();
require_once dirname(__DIR__) . "/partials/header.php";
$cart = array(
    array('name'=>'San pham 1', 'id'=> 1, 'price'=> 35000),
    array('name'=>'San pham 2', 'id'=> 2, 'price'=> 30000),
    array('name'=>'San pham 3', 'id'=> 3, 'price'=> 36000),
    array('name'=>'San pham 4', 'id'=> 4, 'price'=> 30000),
);
$_SESSION['cart']=$cart;
$_SESSION['id']=1;
$carts =$_SESSION['cart'];
$total_price=0;
if(isset($cart)) :
?>
<section>
    <div class="container-fluid">
        <form action="<?php echo ROOT_URL .'/Checkout/makeOrder'?>" method="post">
            <div class="row mt-5 checkout-page">
                <div class="col-md-7" id="checkout-infor-user">
                    <h2 class="checkout-infor-user-title">Thông tin thanh toán</h2>
                    <?php foreach($result as $user) ?>
                    <div class="checkout-form">
                        <div class="mb-3">
                            <label for="name" class="form-label"></label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($user['user_name']) ? $user['user_name'] : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo isset($user['phone']) ? $user['phone'] : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo isset($user['email']) ? $user['email'] : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo isset($user['address']) ? $user['address'] : '' ?>">
                        </div>
                    </div>
                    <?php T_ENDFOREACH ?>
                </div>
                <div class="col-md-5" id="checkout-infor-order">
                    <h2 class="checkout-infor-order-title">Thông tin đơn hàng</h2>
                    <div class="table-reponsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Product name</th>
                                    <th scope="col">quantity</th>
                                    <th scope="col">Total price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($carts as $cart) :  ?>
                                <tr>
                                    <th scope="row"><?php echo $cart['name'] ?></th>
                                    <td><?php echo $cart['name'] ?></td>
                                    <td><?php echo $cart['price'] ?></td>
                                    <?php
                                    $total_price += $cart['price'];
                                    ?>
                                </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <th colspan="2">Tổng cộng</th>
                                    <td><?php echo  $total_price ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <input type="hidden" name="total_price" value="<?= $total_price; ?>">
                        </div>
                    </div>
                    <div class="payment-options pl-4">
                        <label for="payment">Thanh toán</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="cash" name="payment" id="cash">
                            <label class="form-check-label" for="cash">
                                Thanh toán bằng tiền mặt
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" value="card" id="card" checked>
                            <label class="form-check-label" for="card">
                                Thanh toán bằng thẻ
                            </label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Thanh toán</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?php endif ?>
</body>
</html>

