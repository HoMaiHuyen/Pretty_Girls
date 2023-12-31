<?php

require_once dirname(__DIR__) . "/models/User.php";
// require_once dirname(__DIR__) . "/models/Model.php";
// require_once dirname(__DIR__) . "/core/Services/Mail/MailService.php";
require_once dirname(__DIR__) . "/core/Services/Mail/WelcomeMailService.php";
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
                $name_error = "The name contains only letters and numbers";
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
                $confirm_error = "Password do not match";
            }
        }
        if (empty($name_error) && empty($email_error) && empty($phone_error) && empty($address_error) && empty($password_error) && empty($confirm_error)) {
            //Insert vao database
            $user = new User();
            $user->createUser($name, $phone, $password, $email, $address, $confirm);
            // echo "Sucssess";

            // Send Email
            $mailService = new WelcomeMailService();
            $sendEmail = [
                'email' => $email,
                'name' => $name,
            ];
            $mailService->setBodyEmail();
            $mailService->sendMail($sendEmail);
            header("Location: " . $_ENV['ROOT_URL'] . "/auth/login");
        } else {
            view("form/register", compact('name_error', 'email_error', 'phone_error', 'address_error', 'password_error', 'confirm_error'));
        }
    }


    public function login()
    {
        view("form/login");
    }
    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? "";
            $password = $_POST['password'] ?? "";

            if (!empty($email) && !empty($password)) {
                $user = new User();
                $data = $user->getOne($email);
                // Xác thực thông tin đăng nhập
                if ($data) {
 
                    $hashedPassword = $data['password'];
                    if (password_verify($password, $hashedPassword)) {
                        // Bắt đầu session
                    
                        $_SESSION['user_id'] = $data['id'];
                        // Chuyển hướng người dùng đến trang sau khi đăng nhập thành công
                        header("Location: " . $_ENV['ROOT_URL'] . "/Home/AboutUs");
                        exit();
                    } else {
                        $password_error = "Wrong password";
                        view("form/login", compact("password_error"));
                    }
                } else {
                    $email_error = "Email does not exist";
                    view("form/login", compact("email_error"));
                }
            } else {
                echo "<script>alert('Please fill in your login information completely');</script>";
                view("form/login");
            }
        }
    }
}
