<?php
require_once dirname(__DIR__) . "/partials/header.php";
?>
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
            <?php if (isset($success)) : ?>
                <h3 class="alert alert-success text-center"><?php echo $success; ?></h3>
            <?php endif; ?>
            <?php if (isset($error)) : ?>
                <h3 class="alert alert-danger text-center"><?php echo $error; ?></h3>
            <?php endif; ?>
            <form class="p-5 border mb-5" method="POST" action="<?php ?>">
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" required value="<?php echo $row['user_name']; ?>" name="user-name" class="form-control" id="user-name">
                    <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                </div>
                <div class="form-group">
                    <label for="price">Phone</label>
                    <input type="text" required class="form-control" value="<?php echo $row['phone']; ?>" name="phone" id="phone">
                </div>
                <div class="form-group">
                    <label for="description">Address</label>
                    <input type="text" required class="form-control" value="<?php echo $row['address']; ?>" name="address" id="address">
                </div>
                <div class="form-group">
                    <label for="qty">Email</label>
                    <input type="number" required class="form-control" value="<?php echo $row['email']; ?>" name="email" id="email">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>