<?php
require_once dirname(__DIR__) . "/partials/header.php";
require_once dirname(dirname(dirname(__DIR__))) . "/mvc/controllers/Authentication.php";
?>
<div class="background-container">
    <form class="register-form" action="#" method="post">
        <h2>REGISTER FORM</h2>
        <div class="mb-3">
            <input class="form-input" name="name" type="text" placeholder="User Name">
            <small class="form-text text-danger"> <?php echo $name_error ?></small>
        </div>
        <div class="mb-3">
            <input class="form-input" name="email" type="email" placeholder="Your Email">
            <small class="form-text text-danger"> <?php echo $email_error ?></small>
        </div>
        <div class="mb-3">
            <input class="form-input" name="number" type="phone" placeholder="Phone Number">
            <small class="form-text text-danger"> <?php echo $number_error ?></small>
        </div>
        <div class="mb-3">
            <input class="form-input" name="address" type="text" placeholder="Your Address">
            <small class="form-text text-danger"> <?php echo $address_error ?></small>
        </div>
        <div class="password-container">
            <div class="mb-3">
                <input class="form-input" name="password" type="password" placeholder="Your Password">
                <small class="form-text text-danger"> <?php echo $password_error ?></small>
            </div>
            <div class="mb-3">
                <input class="form-input" name="confirm" type="password" placeholder="Confirm Password">
                <small class="form-text text-danger"> <?php echo $confirm_error ?></small>
            </div>
        </div>
        <button type="submit" class="btn-primary">REGISTER</button>
        <div class="additional-links">
            <div class="link">Already have an account? <a href="#" class="register-link">Login</a></div>
        </div>
    </form>
</div>