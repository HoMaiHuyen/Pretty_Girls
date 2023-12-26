<?php
require_once dirname(__DIR__) . "/partials/header.php";
require_once dirname(dirname(__DIR__)) . "/models/User.php";
require_once dirname(dirname(__DIR__)) . "/controllers/AuthController.php";
session_start();

$email_error = $password_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['passwords'])) {
        $loginController = new AuthController();
        $loginController->postLogin();
    } else {
        echo 'Vui lòng điền đầy đủ thông tin đăng nhập';
    }
}
?>

<div class="background-container">
    <form class="login-form" action="#" method="post">
        <h2>LOGIN FORM</h2>
        <div class="mb-3">
            <input class="form-input" type="email" name="email" placeholder="Your Email">
            <small class="form-text text-danger"> <?php echo isset($email_error) ? $email_error : ""  ?></small>
        </div>
        <div class="mb-3">
            <input class="form-input" type="password" name="passwords" placeholder="Your Password">
            <small class="form-text text-danger"><?php echo isset($password_error) ? $password_error : ""  ?></small>
        </div>
        <button type="submit" class="btn-primary">LOGIN</button>
        <div class="additional-links">
            <a href="#" class="forgot-password">Forgot password</a>
            <p>Create account?<a href="<?= $_ENV['ROOT_URL'] ?>/auth/register" class="register-link">Register</a></p>
        </div>
    </form>
</div>