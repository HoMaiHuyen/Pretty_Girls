<?php
function view($view, $data = [])
{
    extract($data);

    require_once dirname(__DIR__) . "/views/" . $view . ".php";
}
function loadImage($image)
{
    echo  ROOT_URL . '/public/image/' . $image;
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

function validate_phone($phone)
{
    return preg_match('/^[0-9]{10}$/', $phone);
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
    return true;
}
function validate_password($passwords)
{
    // Kiểm tra độ dài tối thiểu của mật khẩu
    if (strlen($passwords) < 8) {
        return false;
    }
    // Kiểm tra yêu cầu chữ hoa, chữ thường, số và các ký tự đặc biệt
    if (!preg_match('/[A-Z]/', $passwords) || !preg_match('/[a-z]/', $passwords) || !preg_match('/[0-9]/', $passwords) || !preg_match('/[^A-Za-z0-9]/', $passwords)) {
        return false;
    }
    return true;
}

function validate_confirm_password($passwords, $confirmPassword)
{
    // Kiểm tra xem mật khẩu và xác nhận mật khẩu có khớp nhau hay không
    if ($passwords !== $confirmPassword) {
        return false;
    }
    return true;
   
}

