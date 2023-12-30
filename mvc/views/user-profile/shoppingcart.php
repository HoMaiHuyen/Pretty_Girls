<?php require_once dirname(__DIR__) . "/partials/header.php"; ?>
<form action="" method=" ">
    <?php if (count($_SESSION['cart']) > 0) { ?>
        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
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
                    foreach ($_SESSION['cart'] as  $item) {
                        $total = $item[4] * $item[3];
                        $totalAll += $total;
                    ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $item[1] ?> </td>
                            <td><img src='<?php echo $item[2] ?>' alt='' style="width:50px;height:40px;"></td>
                            <td><?php echo $item[4] ?></td>
                            <td><?php echo $item[3] ?></td>
                            <td><?php echo $total ?></td>
                            <td><a href="<?php echo ROOT_URL . '/user/deleteItem/&id=' . $stt ?>"><i class='fa-solid fa-trash'></i></a></td>
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
                <button type="submit" name="" class="btn btn-light btn-light-checkout">Checkout</button>
            </div>
        </div>
    <?php } else {
        header('Location:' . ROOT_URL. '/product/index');
    }
    ?>
</form>
<?php require_once dirname(__DIR__) . "/partials/footer.php"; ?>