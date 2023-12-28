<?php
session_start();
require_once dirname(__DIR__) . "/partials/header.php";
?>
<div class="background-container">
    <form class="login-form <?php echo isset($email_error) || isset($password_error) ? 'error' : ''; ?>" action="<?php echo ROOT_URL . "/auth/postLogin" ?>" method="post">
        <h2>LOGIN FORM</h2>
        <div class="mb-3">
            <input class="form-input" type="email" name="email" placeholder="Your Email">
            <small class="form-text text-danger"> <?php echo isset($email_error) ? $email_error : ""  ?></small>
        </div>
        <div class="mb-3">
            <input class="form-input" type="password" name="password" placeholder="Your Password">
            <small class="form-text text-danger"><?php echo isset($password_error) ? $password_error : ""  ?></small>
        </div>
        <button type="submit" class="btn-primary">LOGIN</button>
        <div class="additional-links">
            <a href="#" class="forgot-password">Forgot password</a>
            <p>Create account?<a href="<?= $_ENV['ROOT_URL'] ?>/auth/register" class="register-link">Register</a></p>
        </div>
    </form>
</div>