<?php
require_once dirname(__DIR__) . "/models/User.php";

class AdminController
{
    public function index()
    {
        // Tạo đối tượng model
        $user = new User();

        // Gọi phương thức getAll() trong model
        $users = $user->getAll();
        view("crudUser/index", compact('users'));
    }

    public function delete()
    {
        $data = [];

        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $userModel = new User();
            $user = $userModel->getOneUser($id);

            if ($user) {
                $result = $userModel->deleteUser($id);
                if ($result) {
                    $data['success'] = 'User has been deleted';
                } else {
                    $data['error'] = 'Failed to delete user';
                }
            }
        }

        // Lấy lại danh sách người dùng sau khi xóa
        $users = $userModel->getAll();
        $data['users'] = $users;
        view('crudUser/index', compact($data));
    }

    // public function update()
    // {
    //     $userModel = new User();
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $id = $_POST['id'];
    //         $user_name = $_POST['user_name'];
    //         $phone = $_POST['phone'];
    //         $email = $_POST['email'];
    //         $address = $_POST['address'];
    //         $password = $_POST['password'];

    //         $result = $userModel->updateUser($id, $user_name, $phone, $email, $address, $password);

    //         if ($result) {
    //             $success = "User updated successfully.";
    //             // Redirect or show success message
    //         } else {
    //             $error = "Failed to update user.";
    //             // Show error message
    //         }
    //     }
    //     view('crudUser/update', compact('result'));
    // }

    public function update()
    {
        $userModel = new User();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $user_name = $_POST['user_name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $password = $_POST['password'];

            $result = $userModel->updateUser(
                $id,
                $user_name,
                $phone,
                $email,
                $address,
                $password
            );

            if ($result) {
                $success = "User updated successfully.";
                // Redirect or show success message
            } else {
                $error = "Failed to update user.";
                // Show error message
            }
        }
        view('crudUser/update', compact($result));
    }
}
