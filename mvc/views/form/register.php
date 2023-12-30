<?php
require_once dirname(__DIR__) . "/partials/header.php";
?>
<div class="background-container">
    <form class="register-form" action="<?php echo ROOT_URL . '/auth/postRegister' ?>" . method="post">
        <h2>REGISTER FORM</h2>
        <div class="mb-3">
            <input class="form-input" name="name" type="text" placeholder="User Name">
            <small class="form-text text-danger"> <?php echo isset($name_error) ? $name_error : ""  ?></small>
        </div>
        <div class="mb-3">
            <input class="form-input" name="email" type="email" placeholder="Your Email">
            <small class="form-text text-danger"> <?php echo isset($email_error) ? $email_error : ""  ?></small>
        </div>
        <div class="mb-3">
            <input class="form-input" name="phone" type="phone" placeholder="Phone Number">
            <small class="form-text text-danger"> <?php echo isset($phone_error) ? $phone_error : ""  ?></small>
        </div>
        <div class="mb-3">
            <input class="form-input" name="address" type="text" placeholder="Your Address">
            <small class="form-text text-danger"> <?php echo isset($address_error) ? $address_error : ""  ?></small>
        </div>
        <div class="password-container">
            <div class="mb-3">
                <input class="form-input" name="password" type="password" placeholder="Your Password">
                <small class="form-text text-danger"> <?php echo isset($password_error) ? $password_error : ""  ?></small>
            </div>
            <div class="mb-3">
                <input class="form-input" id="confirm" name="confirm" type="password" placeholder="Confirm Password">
                <small class="form-text text-danger"> <?php echo isset($confirm_error) ? $confirm_error : ""  ?></small>
            </div>
        </div>
        <button type="submit" class="btn-primary">REGISTER</button>
        <div class="additional-links">
            <div class="link">Already have an account? <a href="<?= $_ENV['ROOT_URL'] ?>/auth/login" class="register-link">Login</a></div>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>