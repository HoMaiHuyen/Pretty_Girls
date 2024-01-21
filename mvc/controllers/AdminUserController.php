<?php
require_once dirname(__DIR__) . "/models/User.php";
require_once  dirname(__DIR__) . "/core/Middlewares/AuthMiddleware.php";
class AdminUserController{
    
    public function __construct()
    {
        $authMiddleware = new AuthMiddleware();
    }
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