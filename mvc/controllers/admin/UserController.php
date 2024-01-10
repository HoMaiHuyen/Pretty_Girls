<?php
require_once dirname(dirname(__DIR__)) . "/models/Product.php";
require_once dirname(dirname(__DIR__)) . "/models/User.php";
require_once dirname(dirname(__DIR__)) . '/core/functions.php';
require_once dirname(dirname(__DIR__)) . "/models/Comment.php";
class UserController
{

    public function show()
    {
        $user = new User();
        $users = $user->getAll();
        view('admin/user/index', compact('users'));
    }

    public function delete()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $userModel = new User();
            $user = $userModel->getOneUser($id);
            if ($user) {
                $result = $userModel->deleteUser($id);
            }
        }
        $users = $userModel->getAll();
        view('admin/user/index', compact('users'));
    }
}
