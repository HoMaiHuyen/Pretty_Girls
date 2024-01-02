<?php
require_once dirname(__DIR__) . "/models/User.php";

class AdminController
{
    public function index()
    {
        // Tạo đối tượng model
        $user = new User();

        // Gọi phương thức getAllUsers() trong model
        $users = $user->getAllUsers();

        if ($users) {
            // Truyền dữ liệu $users vào view
            view("crudUser/index", ['users' => $users]);
        }
    }
    public function deleteUser($id)
    {
        // deleteUser.php
        // Kiểm tra xem đã truyền id vào hay chưa
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Tạo đối tượng model
            $userModel = new User();

            // Gọi phương thức deleteUser() trong model để xóa người dùng
            $result = $userModel->deleteUser($id);

            if ($result) {
                // Xử lý thành công
                // Ví dụ: chuyển hướng đến trang danh sách người dùng
                // header("Location: userList.php");
                view("crusUser/index");
                exit();
            } else {
                // Xử lý lỗi
                // Ví dụ: hiển thị thông báo lỗi
                echo "Failed to delete user.";
            }
        } else {
            // Xử lý lỗi nếu không có id được truyền vào
            echo "Invalid user id.";
        }
    }
}
