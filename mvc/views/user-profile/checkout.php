<?php
require_once dirname(__DIR__) . "/partials/header.php";

$total_price = 0;
$product = [];
if (isset($_SESSION['cart'])) :
    if (!empty($message)) :

?>
        <section>
            <div class="container-fluid">
                <form onsubmit="return confirm('Xác nhận đặt hàng ')" action="<?php echo ROOT_URL . '/Checkout/index' ?>" method="post">
                    <div class="row mt-5 checkout-page">
                        <div class="col-md-7" id="checkout-infor-user">
                            <h2 class="checkout-infor-user-title">Billing Information</h2>

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
                            <h2 class="checkout-infor-order-title">Information line</h2>
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
                                        <?php foreach ($_SESSION['cart'] as $key => $item) : ?>
                                            <tr>
                                                <th scope="row"><?php echo  $item['product_name'];; ?></th>
                                                <td><?php echo $item['quantity']; ?></td>
                                                <td><?php echo $item['price'] ?></td>
                                                <?php
                                                $total_price += $item['price'] * $item['quantity'];
                                                $product = array('product_id' => $item['product_id'], 'quantity' => $item['quantity']);

                                                ?>
                                                <input type="hidden" name="product_name" value="<?php echo  $item['product_name'];; ?>">
                                                <input type="hidden" name="product_name" value="<?php echo $item['quantity']; ?>">
                                                <input type="hidden" name="product_name" value="<?php echo  $item['product_name'];; ?>">
                                                <input type="hidden" name="product_name" value="<?php echo  $item['product_name'];; ?>">
                                            </tr>

                                        <?php endforeach;
                                        ?>

                                        <tr>
                                            <th colspan="2">Tổng cộng</th>
                                            <td><?php echo  $total_price ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="form-group">

                                    <input type="hidden" name="total_price" value="<?= $total_price  ?>">
                                    <input type="hidden" name="order_status_id" value="1">
                                </div>
                            </div>
                            <div class="payment-options pl-4">
                                <label for="payment">Payment by : </label>
                                   
                                    <label class="form-check-label" for="card">
                                        Momo
                                    </label>
                                  
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" name="payUrl" on style="width: 100%;" class="btn btn-outline-success">Place order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

<?php endif;
endif ?>
</body>

</html>