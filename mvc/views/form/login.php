<?php
require_once dirname(__DIR__) . "/partials/header.php";
require_once dirname(dirname(dirname(__DIR__))) . "/mvc/controllers/Authentication.php";
?>
<div class="background-container">
    <form class="login-form" action="#" method="post">
        <h2>LOGIN FORM</h2>
        <div class="mb-3">
            <input class="form-input" type="email" name="email" placeholder="Your Email">
            <small class="form-text text-danger"> <?php echo $email_error ?></small>
        </div>
        <div class="mb-3">
            <input class="form-input" type="password" name="password" placeholder="Your Password">
            <small class="form-text text-danger"><?php echo $password_error ?></small>
        </div>
        <button type="submit" class="btn-primary">LOGIN</button>
        <div class="additional-links">
            <a href="#" class="forgot-password">Forgot password</a>
            <p>Create account?<a href="#" class="register-link">Register</a></p>
        </div>
    </form>
</div>