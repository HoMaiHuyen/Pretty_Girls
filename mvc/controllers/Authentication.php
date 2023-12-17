<?php

function db()
{
    $host = "localhost";
    $database = "users";
    $user = "root";
    $password = "";

    try {
        $db =  new PDO("mysql:host=$host;dbname=$database", $user, $password);
        // set the PDO error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        // echo "Connection failed: " . $e->getMessage();
        return "";
    }
}

function validate_username($name)
{
    //'aaaa$" => false vì có chứa "$"
    //aaa111 => true
    return ctype_alnum($name);
}

function validate_email($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validate_number($number)
{
    return preg_match('/^[0-9]{10}$/', $number);
}

function validate_address($address)
{
    // Kiểm tra xem địa chỉ có rỗng hay không
    if (empty($address)) {
        return false;
    }

    // Kiểm tra độ dài tối thiểu của địa chỉ
    if (strlen($address) < 5) {
        return false;
    }

    // return true;
}

function validate_password($password)
{
    // Kiểm tra độ dài tối thiểu của mật khẩu
    if (strlen($password) < 8) {
        return false;
    }
    // Kiểm tra yêu cầu chữ hoa, chữ thường, số và các ký tự đặc biệt
    if (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[^A-Za-z0-9]/', $password)) {
        return false;
    }

    // return true;
}

function validate_confirm_password($password, $confirmPassword)
{
    // Kiểm tra xem mật khẩu và xác nhận mật khẩu có khớp nhau hay không
    if ($password !== $confirmPassword) {
        return false;
    }

    // return true;
}

$name = "";
$email = "";
$number = "";
$address = "";
$password = "";
$confirm = "";

$name_error = "";
$email_error = "";
$number_error = "";
$address_error = "";
$password_error = "";
$confirm_error = "";


// $email = isset($_POST['email']) ? ($_POST['email']) : "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = isset($_POST['name']) ? ($_POST['name']) : "";
    if (empty($name)){
        $name_error = "Please enter your name";
    }
    elseif (validate_username($name) == false){
        $name_error = "Ten chi chua chu cai va chu so";
    }

    $email = isset($_POST['email']) ? $_POST['email'] : "";
    if (empty($email)) {
        $email_error = "Please enter an email";
    } elseif (validate_email($email) == false) {
        $email_error = "Invalid email format";
    }

    $number = isset($_POST['number']) ? $_POST['number'] : "";
    if (empty($number)) {
        $number_error = "Please enter a phone number";
    } elseif (!validate_number($number)) {
        $number_error = "Invalid phone number format";
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
?>