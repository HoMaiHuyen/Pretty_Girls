<?php
require_once dirname(__DIR__) . "/models/Product.php";
require_once dirname(__DIR__) . "/models/User.php";
require_once dirname(__DIR__) . '/core/functions.php';
require_once dirname(__DIR__) . "/models/Comment.php";
class AdminController
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


    function showProduct()
    {
        $productModel = new Product();
        $resultProduct = $productModel->getAllProduct();
        view('admin/products/index', compact('resultProduct'));
    }

    function deleteProduct()
    {
        $productModel = new Product();
        $id = htmlspecialchars($_GET['id']);
        $productOne = $productModel->getOne($id);
        view('admin/products/delete', compact('productOne'));
    }
    function deleteProduct1()
    {
        $productModel = new Product();
        if (isset($_POST['id']) && $_POST['id']) {
            $id = htmlspecialchars($_POST['id']);
            $deleteProduct = $productModel->deleteProduct($id);
            if ($deleteProduct == true) {
                header('location: showProduct');
                exit();
            }
        }
    }
    function updateProduct()
    {
        $productModel = new Product();
        $id = $_GET['id'];
        $productOne = $productModel->getOne($id);
        view('admin/products/update', compact('productOne'));
    }
    function updateProduct1()
    {
        $productModel = new Product();
        if (isset($_POST['updateProduct'])) {
            $id = htmlspecialchars($_POST['id']);
            $name = htmlspecialchars($_POST['PName']);
            $description = htmlspecialchars($_POST['PDescription']);
            $categories = htmlspecialchars($_POST['PCategories']);
            $image_name = htmlspecialchars($_POST['PImage_name']);
            $qty = intval($_POST['PQty']);
            $price = floatval($_POST['PPrice']);
            $image_url = $_ENV['ROOT_URL'] . '/public/image/' . basename($_FILES["PImage_url"]["name"]);
            if (isset($_FILES["PImage_url"]["tmp_name"]) && !empty($_FILES["PImage_url"]["tmp_name"])) {

                $imageFileType = strtolower(pathinfo($_FILES["PImage_url"]["name"], PATHINFO_EXTENSION));

                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {

                    echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
                    return;
                }
                $target_dir = dirname(dirname(__DIR__)) . '/public/image/';
                $target_file = $target_dir . basename($_FILES["PImage_url"]["name"]);

                move_uploaded_file($_FILES["PImage_url"]["tmp_name"], $target_file);
            } else {

                echo "Please choose an image.";
                return;
            }
            $updateProduct = $productModel->updateProductQ($id, $name, $description, $categories, $image_name, $image_url, $qty, $price);
            if ($updateProduct == true) {
                header('location: showProduct');
                exit();
            }
        }
    }

    function insertProduct()
    {
        view('admin/products/insert');
    }

    function insertProduct1()
    {
        $filetypeError = "";

        if (isset($_POST['insertProduct1'])) {
            $productModel = new Product();
            $name = htmlspecialchars($_POST['PName']);
            $description = htmlspecialchars($_POST['PDescription']);
            $categories = htmlspecialchars($_POST['PCategories']);
            $image_name = htmlspecialchars($_POST['PImage_name']);
            $qty = intval($_POST['PQty']);
            $price = floatval($_POST['PPrice']);
            $image_url = $_ENV['ROOT_URL'] . '/public/image/' . basename($_FILES["PImage_url"]["name"]);

            if (isset($_FILES["PImage_url"]["tmp_name"]) && !empty($_FILES["PImage_url"]["tmp_name"])) {

                $imageFileType = strtolower(pathinfo($_FILES["PImage_url"]["name"], PATHINFO_EXTENSION));

                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {

                    $filetypeError = "you should choose photo";
                    return  $filetypeError;
                }

                $target_dir = dirname(dirname(__DIR__)) . '/public/image/';
                $target_file = $target_dir . basename($_FILES["PImage_url"]["name"]);


                move_uploaded_file($_FILES["PImage_url"]["tmp_name"], $target_file);
            } else {

                $filetypeError = "you should choose photo";
            }

            $insertProduct = $productModel->insertProduct($name, $description, $categories, $image_name, $image_url, $qty, $price);
            if ($insertProduct == true) {
                header('location: showProduct');
                exit();
            }
        }
    }

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