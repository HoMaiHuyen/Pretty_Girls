<?php
require_once dirname(__DIR__) . "/models/User.php";
class AuthController
{

    public function register()
    {
        view("form/register");
    }

    public function postRegister()
    {
        $name = "";
        $email = "";
        $phone = "";
        $address = "";
        $password = "";
        $confirm = "";

        $name_error = "";
        $email_error = "";
        $phone_error = "";
        $address_error = "";
        $password_error = "";
        $confirm_error = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = isset($_POST['name']) ? ($_POST['name']) : "";
            if (empty($name)) {
                $name_error = "Please enter your name";
            } elseif (validate_username($name) == false) {
                $name_error = "Ten chi chua chu cai va chu so";
            }

            $email = isset($_POST['email']) ? $_POST['email'] : "";
            if (empty($email)) {
                $email_error = "Please enter an email";
            } elseif (validate_email($email) == false) {
                $email_error = "Invalid email format";
            }

            $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
            if (empty($phone)) {
                $phone_error = "Please enter a phone phone";
            } elseif (!validate_phone($phone)) {
                $phone_error = "Invalid phone phone format";
            }

            $address = isset($_POST['address']) ? $_POST['address'] : "";
            if (empty($address)) {
                $address_error = "Please enter an address";
            } elseif (validate_address($address) == false) {
                $address_error = "Address is invalid";
            }

            $password = isset($_POST['password']) ? $_POST['password'] : "";
            if (empty($password)) {
                $password_error = "Please enter a password";
            } elseif (validate_password($password) == false) {
                $password_error = "Password is not valid";
            }

            $confirm = isset($_POST['confirm']) ? $_POST['confirm'] : "";
            if (empty($confirm)) {
                $confirm_error = "Please confirm your password";
            } elseif (validate_confirm_password($password, $confirm) == false) {
                $confirm_error = "Passwords do not match";
            }
        }
        if (empty($name_error) && empty($email_error) && empty($phone_error) && empty($address_error) && empty($password_error) && empty($confirm_error)) {
            //Insert vao database
            $user = new User();
            $user->createUser($name, $email, $phone, $address, $password, $confirm);
            echo "Success";
        } else {
            view("form/register", compact('name_error', 'email_error', 'phone_error', 'address_error', 'password_error', 'confirm_error'));
        }
    }
}
