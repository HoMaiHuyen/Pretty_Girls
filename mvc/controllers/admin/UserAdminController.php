<?php
require_once dirname(dirname(__DIR__)) . "/models/User.php";

class UserAdmin{
    public function showUser()
    {
        $user = new User();
        $users = $user->getAll();
        view('admin/user/index', compact('users'));
    }

    public function deleteUser()
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

?>