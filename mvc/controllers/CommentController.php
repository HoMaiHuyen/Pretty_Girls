<?php
require_once dirname(__DIR__) . "/models/Comment.php";
require_once dirname(__DIR__) . "/models/Product.php";
require_once  dirname(__DIR__) . "/core/Middlewares/AuthMiddleware.php";
require_once dirname(__DIR__) . "/models/User.php";
class CommentController
{
     public function __construct()
    {
        $authMiddleware = new AuthMiddleware();
    }

    public function comment()
    {
        $commentModel = new Comment();
        $product_id = $_POST['PId'];
        if (isset($_SESSION['user']['id'])) {
            $userid = $_SESSION['user']['id'];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $user_id = $userid;
                $message = $_POST["comment"];

                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $comment_time = new DateTime();
                $currentFormatted = $comment_time->format('Y-m-d H:i:s');

                $commentModel->createComment($user_id, $product_id, $message, $currentFormatted);

                $allComments = $commentModel->getComments($product_id);

                if ($allComments) {
                    header('Location:' . $_ENV['ROOT_URL'] . '/Product/details&id=' . $product_id);
                    setcookie("success", "Added order successful!", time() + 1, "/", "", 0);
                    exit();
                } else {
                    header('Location:' . $_ENV['ROOT_URL'] . '/Product/details&id=' . $product_id);
                      setcookie("failed", "Added order successful!", time() + 1, "/", "", 0);
                }
            } 
        }
        else{
         header('Location:' . $_ENV['ROOT_URL'] . '/Product/details&id=' . $product_id);
        setcookie("unlogin", "Added order successful!", time() + 1, "/", "", 0);
        }
       
    }

    public function deleteComment()
    {
        $id = $_GET['id'];
        $user_id = $_GET['user_id'];
        $product_id = $_GET['product_id'];
        if (isset($id)) {
            $commentModel = new Comment();
            $deleteResult = $commentModel->deleteComment($id, $user_id, $product_id);
            if ($deleteResult) {

                header('Location:' .  $_ENV['ROOT_URL'] . '/Product/details&id=' . $product_id);
                exit();
            }
        }
        header('Location: /Product/details&id=' . $id);
        exit();
    }

    public function updateComment()
    {
        $id = $_GET['id'];
        $user_id = $_GET['user_id'];
        $product_id = $_GET['product_id'];
        $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

        if (isset($id)) {
            $commentModel = new Comment();
            $updateResult = $commentModel->updateComment($id, $user_id, $product_id, $message);

        if ($updateResult) {
        header('Location:' .  $_ENV['ROOT_URL'] . '/Product/show&id=' . $product_id);
        exit();
            }
        }
    }
}
