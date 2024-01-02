<?php require_once dirname(__DIR__) . "/partials/header.php"; ?>
<section class="shoppingcart-page">
    <form action="" method=" ">
        <?php if (isset($_SESSION['cart'])) { ?>
            <div class="container">
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr class="h">
                            <th>STT</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                            <th><button type="button" class="btn btn-light btn-light-action">Action</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $stt = 0;
                        $totalAll = 0;
                        foreach ($_SESSION['cart'] as $key => $item) {
                            $total = $item['price'] * $item['quantity'];
                            $totalAll += $total;
                        ?>
                            <tr>
                                <td><?php echo $stt + 1 ?></td>
                                <td><?php echo isset($item['product_name']) ? $item['product_name'] : ""  ?> </td>
                                <td><img src='<?php echo $item['image_url'] ?>' alt='' style="width:150px;height:140px;"></td>
                                <td><?php echo $item['quantity'] ?></td>
                                <td><?php echo $item['price'] ?></td>
                                <td><?php echo $total ?></td>
                                <td><a href="<?php echo ROOT_URL . '/user/deleteItem&id=' . $stt ?>"><i class='fa-solid fa-trash'></i></a></td>
                            </tr>
                            <?php $stt++;     ?>
                        <?php
                        }

                        ?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    <svg xmlns="http://www.w3.org/2000/svg" width="400" height="13" viewBox="0 0 475 13" fill="none">
                        <path d="M0.666679 7.01152C0.673041 9.95703 3.06601 12.3397 6.01152 12.3333C8.95703 12.327 11.3397 9.93399 11.3333 6.98848C11.327 4.04297 8.93399 1.66032 5.98848 1.66668C3.04297 1.67304 0.660317 4.06601 0.666679 7.01152ZM463.667 6.01148C463.673 8.95699 466.066 11.3396 469.012 11.3333C471.957 11.3269 474.34 8.93395 474.333 5.98844C474.327 3.04293 471.934 0.660278 468.988 0.66664C466.043 0.673002 463.66 3.06597 463.667 6.01148ZM6.00216 8L469.002 6.99996L468.998 4.99996L5.99784 6L6.00216 8Z" fill="#505050" />
                    </svg>
                </div>
                <div>
                    <div class="d-flex justify-content-end">
                        <pre>Total:                             </pre>
                        <p><?php echo $totalAll ?></p>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary" href="<?php echo ROOT_URL . '/User/checkout' ?>" style="width: 100px;">Checkout</a>
                </div>
            </div>
        <?php } else { ?>

            <div class="container-fluid">
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-md-8 text-center">
                        
                        <div>
                            <img src="https://vitatree.com.vn/tp/T0269/img/tmp/shopping-cart.svg" style="width: 320px; height: 300px;" alt="">
                        </div>
                          <h4 class="hover-effect">Currently your shopping cart is empty, please click the button to continue shopping</h4>
                        <button type="button" class="btn btn-outline-success mt-4"><a href="#">Shopping</a></button>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </form>
</section>
<?php require_once dirname(__DIR__) . "/partials/footer.php"; ?>