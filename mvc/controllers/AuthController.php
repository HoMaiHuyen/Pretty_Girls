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
        $passwords = "";
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

            $passwords = isset($_POST['passwords']) ? $_POST['passwords'] : "";
            if (empty($passwords)) {
                $password_error = "Please enter a password";
            } elseif (validate_password($passwords) == false) {
                $password_error = "Password is not valid";
            }

            $confirm = isset($_POST['confirm']) ? $_POST['confirm'] : "";
            if (empty($confirm)) {
                $confirm_error = "Please confirm your password";
            } elseif (validate_confirm_password($passwords, $confirm) == false) {
                $confirm_error = "Passwords do not match";
            }
        }
        if (empty($name_error) && empty($email_error) && empty($phone_error) && empty($address_error) && empty($password_error) && empty($confirm_error)) {
            //Insert vao database
            $user = new User();
            $user->createUser($name, $phone, $passwords, $email, $address, $confirm);
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
        $email = $_POST['email'] ?? '';
        $password = $_POST['passwords'] ?? '';

        if (empty($email) || empty($password)) {
            echo 'Vui lòng điền đầy đủ thông tin đăng nhập';
            return false;
        }

        // Tạo đối tượng User
        $user = new User();
        // Gọi phương thức getOne từ đối tượng User
        $data = $user->getOne($email);
        if ($data) {
            // Kiểm tra mật khẩu
            $hashedPassword = $data['passwords'];
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['user'] = $data;
                header("Location: " . $_ENV['ROOT_URL']);
                exit();
            } else {
                echo 'Sai mật khẩu';
            }
        } else {
            echo "Email không tồn tại";
        }
    }
}
