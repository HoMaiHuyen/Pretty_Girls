<?php
require_once dirname(__DIR__) . "/models/Product.php";



class AdminProductController
{
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
        $name = "";
        $description = "";
        $categories = "";
        $image_name = "";
        $qty = "";
        $price = "";
        $image_url = "";

        $name_error = "";
        $description_error = "";
        $categories_error = "";
        $image_name_error = "";
        $qty_error = "";
        $price_error = "";
        $image_url_error = "";

        if (isset($_POST['updateProduct'])) {
            $id = htmlspecialchars($_POST['id']);
            $name = isset($_POST['PName']) ? htmlspecialchars($_POST['PName']) : "";
            if (empty($name)) {
                $name_error = "Please enter product name";
            }
            $description = isset($_POST['PDescription']) ? htmlspecialchars($_POST['PDescription']) : "";
            if (empty($description)) {
                $description_error = "Please description";
            }
            $categories = isset($_POST['PCategories']) ? htmlspecialchars($_POST['PCategories']) : "";
            if (empty($categories)) {
                $categories_error = "Please enter categories";
            }
            $image_name = isset($_POST['PImage_name']) ? htmlspecialchars($_POST['PImage_name']) : "";
            if (empty($image_name)) {
                $image_name_error = "Please enter image name";
            }

            $qty = isset(($_POST['PQty'])) ? htmlspecialchars(intval($_POST['PQty'])) : "";
            if (empty($qty)) {
                $qty_error = "Please enter quantity";
            } elseif ($qty < 0) {
                $qty_error = "Invalid quantity";
            }
            $price = isset(($_POST['PPrice'])) ? htmlspecialchars(floatval($_POST['PPrice'])) : "";
            if (empty($price)) {
                $price_error = "Please enter price";
            } elseif ($price < 0) {
                $price_error = "Invalid price";
            }
            $image_url = isset($_POST['PImage_url']) ? htmlspecialchars($_POST['PImage_url']) : "";
            if (isset($_FILES["PImage_url"]["tmp_name"]) && !empty($_FILES["PImage_url"]["tmp_name"])) {

                $imageFileType = strtolower(pathinfo($_FILES["PImage_url"]["name"], PATHINFO_EXTENSION));

                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    $image_url_error = "Invalid photo";
                } else {

                    $target_dir = dirname(dirname(__DIR__)) . '/public/image/';
                    $target_file = $target_dir . basename($_FILES["PImage_url"]["name"]);
                    move_uploaded_file($_FILES["PImage_url"]["tmp_name"], $target_file);
                    if (!file_exists($target_file)) {
                        move_uploaded_file($_FILES["PImage_url"]["tmp_name"], $target_file);
                    }
                    $image_url = $_ENV['ROOT_URL'] . '/public/image/' . basename($_FILES["PImage_url"]["name"]);
                }
            }
        }

        if (empty($name_error) && empty($description_error) && empty($categories_error) && empty($image_name_error) && empty($qty_error) && empty($price_error) && empty($image_url_error)) {
            $productModel = new Product();

            $updateProduct = $productModel->updateProduct($id, $name, $description, $categories, $image_name, $image_url, $qty, $price);
            if ($updateProduct == true) {
                header('location: showProduct');
                exit();
            }
        } else {
            $productModel = new Product();
            $id = $_POST['id'];
            $productOne = $productModel->getOne($id);
            view("admin/products/update", compact('productOne', 'name_error', 'description_error', 'categories_error', 'image_name_error', 'image_url_error', 'qty_error', 'price_error'));
        }
    }

    function insertProduct()
    {
        view('admin/products/insert');
    }

    function insertProduct1()
    {
        $name = "";
        $description = "";
        $categories = "";
        $image_name = "";
        $qty = "";
        $price = "";
        $image_url = "";

        $name_error = "";
        $description_error = "";
        $categories_error = "";
        $image_name_error = "";
        $qty_error = "";
        $price_error = "";
        $image_url_error = "";
        if (isset($_POST['insertProduct1'])) {

            $name = isset($_POST['PName']) ? htmlspecialchars($_POST['PName']) : "";
            if (empty($name)) {
                $name_error = "Please enter product name";
            }
            $description = isset($_POST['PDescription']) ? htmlspecialchars($_POST['PDescription']) : "";
            if (empty($description)) {
                $description_error = "Please description";
            }
            $categories = isset($_POST['PCategories']) ? htmlspecialchars($_POST['PCategories']) : "";
            if (empty($categories)) {
                $categories_error = "Please enter categories";
            }
            $image_name = isset($_POST['PImage_name']) ? htmlspecialchars($_POST['PImage_name']) : "";
            if (empty($image_name)) {
                $image_name_error = "Please enter image name";
            }

            $qty = isset(($_POST['PQty'])) ? htmlspecialchars(intval($_POST['PQty'])) : "";
            if (empty($qty)) {
                $qty_error = "Please enter quantity";
            } elseif ($qty < 0) {
                $qty_error = "Invalid quantity";
            }
            $price = isset(($_POST['PPrice'])) ? htmlspecialchars(floatval($_POST['PPrice'])) : "";
            if (empty($price)) {
                $price_error = "Please enter price";
            } elseif ($price < 0) {
                $price_error = "Invalid price";
            }

            $image_url = $_ENV['ROOT_URL'] . '/public/image/' . basename($_FILES["PImage_url"]["name"]);

            if (isset($_FILES["PImage_url"]["tmp_name"]) && !empty($_FILES["PImage_url"]["tmp_name"])) {

                $imageFileType = strtolower(pathinfo($_FILES["PImage_url"]["name"], PATHINFO_EXTENSION));

                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {

                    $image_url_error = "Invalid photo";
                } else {

                    $target_dir = dirname(dirname(__DIR__)) . '/public/image/';
                    $target_file = $target_dir . basename($_FILES["PImage_url"]["name"]);
                    move_uploaded_file($_FILES["PImage_url"]["tmp_name"], $target_file);
                    if (!file_exists($target_file)) {
                        move_uploaded_file($_FILES["PImage_url"]["tmp_name"], $target_file);
                    }
                    $image_url = $_ENV['ROOT_URL'] . '/public/image/' . basename($_FILES["PImage_url"]["name"]);
                }
            } else {
                $image_url_error = "Please choose photo";
            }
        }

        if (empty($name_error) && empty($description_error) && empty($categories_error) && empty($image_name_error) && empty($qty_error) && empty($price_error) && empty($image_url_error)) {
            $productModel = new Product();
            $insertProduct = $productModel->insertProduct($name, $description, $categories, $image_name, $image_url, $qty, $price);
            if ($insertProduct == true) {
                header('location: showProduct');
                exit();
            }
        } else {
            view("admin/products/insert", compact('name_error', 'description_error', 'categories_error', 'image_name_error', 'image_url_error', 'qty_error', 'price_error'));
        }
    }
    public  function search($keyword)
    {
        $search_key = "";
        $keyword = isset($_POST['key']) ? htmlspecialchars($_POST['key']) : '';
        $productModel = new Product();
        $searchResult = $productModel->search($keyword);
        if (!empty($keyword)) {
            if (empty($searchResult)) {
                $search_key = "No results ";
                $search_key = "No results : " . htmlspecialchars($keyword);

            } else {
                $search_key =  htmlspecialchars($keyword);
            }
        }
        view('admin/products/search', compact('searchResult', 'keyword', 'search_key'));
    }
}
