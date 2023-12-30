<?php
session_start();
$session_id = session_id();
// Output the session ID
// echo "The current session ID is: " . $session_id;
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>