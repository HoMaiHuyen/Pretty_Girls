<?php
require_once dirname(__DIR__) . "/models/Comment.php";

class AdminCommentController{
    public function showComments()
    {
        $comment = new Comment();
        $comments = $comment->getAllComments();
        view('admin/comment/index', compact('comments'));
    }

    function deleteComment()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $commentModel = new Comment();
            $comment = $commentModel->getCommentById($id);
            if ($comment) {
                $result = $commentModel->deleteCommentById($id);
            }
        }
        $comments = $commentModel->getAllComments();
        view('admin/comment/index', compact('comments'));
    }
}

?>