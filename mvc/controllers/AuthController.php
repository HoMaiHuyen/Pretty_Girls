<?php
require_once dirname(__DIR__) . "/models/User.php";
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
            $name = isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8') : "";
            if (empty($name)) {
                $name_error = "Please enter your name";
            } elseif (!validate_username($name)) {
                $name_error = "The name contains only letters and numbers";
            }

            $email = isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8') : "";
            if (empty($email)) {
                $email_error = "Please enter an email";
            } elseif (!validate_email($email)) {
                $email_error = "Invalid email format";
            }

            $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8') : "";
            if (empty($phone)) {
                $phone_error = "Please enter a phone phone";
            } elseif (!validate_phone($phone)) {
                $phone_error = "Invalid phone phone format";
            }

            $address = isset($_POST['address']) ? htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8') : "";
            if (empty($address)) {
                $address_error = "Please enter an address";
            } elseif (!validate_address($address)) {
                $address_error = "Address is invalid";
            }

            $password = isset($_POST['password']) ? htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8') : "";
            if (empty($password)) {
                $password_error = "Please enter a password";
            } elseif (!validate_password($password)) {
                $password_error = "Password is not valid";
            }

            $confirm = isset($_POST['confirm']) ? htmlspecialchars($_POST['confirm'], ENT_QUOTES, 'UTF-8') : "";
            if (empty($confirm)) {
                $confirm_error = "Please confirm your password";
            } elseif (!validate_confirm_password($password, $confirm)) {
                $confirm_error = "Password do not match";
            }
        }

        if (empty($name_error) && empty($email_error) && empty($phone_error) && empty($address_error) && empty($password_error) && empty($confirm_error)) {
            // Insert vao database
            $user = new User();
            $user->createUser($name, $phone, $password, $email, $address, $confirm);

            $mailService = new WelcomeMailService();
            $sendEmail = [
                'email' => $email,
                'name' => $name,
            ];

            $mailService->setBodyEmail();
            $mailService->sendMail($sendEmail);

            header("Location: " . htmlspecialchars($_ENV['ROOT_URL'] . "/auth/login", ENT_QUOTES, 'UTF-8'));
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
            $email = isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8') : "";
            $password = isset($_POST['password']) ? htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8') : "";

            if (!empty($email) && !empty($password)) {
                $user = new User();
                $data = $user->getOne($email);

                if ($data) {
                    $hashedPassword = $data['password'];

                    if (password_verify($password, $hashedPassword)) {
                        $_SESSION['user']['user_id'] = $data['id'];

                        if ($data['role'] == 'admin') {
                            header("Location: " . htmlspecialchars($_ENV['ROOT_URL'] . "/Home/admin", ENT_QUOTES, 'UTF-8'));
                            exit();
                        } else {
                            header("Location: " . htmlspecialchars($_ENV['ROOT_URL'] . "/Home/index", ENT_QUOTES, 'UTF-8'));
                            exit();
                        }
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

    public function logout()
    {
        $message = "success";
        unset($_SESSION['user']['user_id']);
        $redirectUrl = htmlspecialchars($_ENV['ROOT_URL'] . "/auth/login&message=" . $message, ENT_QUOTES, 'UTF-8');
        header("Location: " . $redirectUrl);
    }

}
