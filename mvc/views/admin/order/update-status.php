<?php require_once dirname(__DIR__) . '/partials/header.php';

?>
<style>
    input {
        width: 300px;
    }
</style>
<div class="container" style="margin-top:100px; position: absolute; margin-left: 16%;">
    <div class="row ">
        <?php foreach ($orderid as $order) : ?>
            <div class="col-md-20">
                <form action="<?php echo ROOT_URL.'/AdminOrder/index'?>" method="post">
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="UserName" class="col-sm-2 col-form-label">Customer name</label>
                            <div class="col-sm-6">
                                <input type="text" value="<?php echo $order['user_name'] ?>"  name="username" readonly class="form-control" id="UserName">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="emaill" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-6">
                                <input type="email" value="<?php echo $order['email'] ?>"  name="email" readonly class="form-control" id="emaill">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Status name</label>
                            <div class="col-sm-6">
                                <input type="text" value="<?php echo $order['status'] ?>" name="status_name" class="form-control" readonly id="inputPassword">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="price" class="col-sm-2 col-form-label">Total price</label>
                            <div class="col-sm-2">
                                <input type="text" value="<?php echo $order['total_price'] ?>" class="form-control" name="price" readonly id="price">
                            </div>
                            <label for="date" class="col-sm-2 col-form-label">Code of order</label>
                            <div class="col-sm-2">
                                <input type="text" value="<?php echo $order['orderId'] ?>" name="orderID" readonly class="form-control" id="date">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Status name</label>
                            <div class="col-sm-6">
                                <input type="text" value="<?php echo $order['Dates'] ?>" class="form-control" name="date" readonly id="inputPassword">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="status" class="col-sm-2 col-form-label">Status name</label>
                            <div class="col-sm-6">
                                <select class="form-select" name="order_status" aria-label="Default select example" id="status">
                                    <option selected>Choose that you want to change status name</option>
                                    <option class="mb-4" value="1">Ordered</option>
                                    <option class="mb-4" value="2">Delivery</option>
                                    <option class="mb-4" value="3">Received</option>
                                    <option class="mb-4" value="4">Failed</option>
                                </select>
                            </div>
                        </div>
                         <div class="mb-3 row">
                            <label for="btn" class="col-sm-2 col-form-label">Status name</label>
                             <div class="col-sm-6">
                            <input type="submit" id="btn" class="form-control text-success">
                             </div>
                        </div>
                </form>
            </div>

        <?php endforeach ?>
    </div>
</div>