<?php
require_once  dirname(__DIR__) . "/core/Middlewares/AuthMiddleware.php";
require_once dirname(__DIR__) . "/models/User.php";
require_once dirname(__DIR__) . "/core/functions.php";
require_once dirname(__DIR__) . "/models/Order.php";
require_once dirname(__DIR__) . "/models/OrderItem.php";
require_once dirname(__DIR__) . "/models/OrderStatus.php";
require_once dirname(__DIR__) . "/models/Product.php";
require_once dirname(__DIR__) . "/models/Shop.php";
class UserController
{
    public function __construct()
    {
        $authMiddleware = new AuthMiddleware();
    }
    public function index()
    {
        view('user-profile/index', null);
    }

    public function show()
    {
        $user_id = $_SESSION['user']['id'];
        $user = new User();
        $user = $user->getOneUser($user_id);

        if ($user) {
            view(
                'user-profile/index',
                compact(
                    'user'
                )
            );
        }
    }

    public function updateUser()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['buton-save'])) {
            $id = $_POST['id'];
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $nameClear = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');

            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $emailClear = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

            $address = isset($_POST['address']) ? $_POST['address'] : '';
            $addressClear = htmlspecialchars($address, ENT_QUOTES, 'UTF-8');

            $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
            $phoneClear = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');

            $user = new User();
            $result = $user->updateUser($id, $nameClear, $phoneClear, $emailClear, $addressClear);

                if ($result !== false) {
                    header("Location:" . $_ENV['ROOT_URL'] . "/User/show");
                    exit();
                }
            }
        }
    }
      
    public function updateImage()
    {
        $image_url = "";
        $image_url_error = "";
        if (isset($_POST['updateProfile'])) {
            $image_url = isset($_POST['PImage_url']) ? htmlspecialchars($_POST['PImage_url']) : "";
            $id = $_POST['id'];
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
        if (empty($image_url_error)) {
            $user = new User();
            $updateProfile = $user->UpdateImage($id, $image_url);
            if ($updateProfile == true) {
                header("Location:" . $_ENV['ROOT_URL'] . "/User/show");
                exit();
            }
        } else {
            $user_id = $_SESSION['user']['id'];
            $user = new User();
            $user = $user->getOneUser($user_id);
            view("user-profile/index", compact('image_url_error','user'));
            // header("Location:" . $_ENV['ROOT_URL'] . "/User/show");
        }
    }


    public function deleteItem()
    {
        if (isset($_GET['id']) && ($_GET['id'] >= 0)) {
            array_splice($_SESSION['cart'], $_GET['id'], 1);
            view('user-profile/shoppingcart');
        }
    }

    public function viewOrderItem()
    {
        $order_itemModal = new OrderItem();
        $order_id = $_GET['id'];
        $message_error = '';
        $order_item = $order_itemModal->inforOrderItem($order_id);
        view('user-profile/order-detail', compact('order_item'));
    }

    public function viewOrder($user_id)
    {

        $user_id = $_SESSION['user']['id'];

        $userModel = new User();
        $userInfor = $userModel->getOneUser($user_id);
        $orderModel = new Order();

        $orders = $orderModel->getOrdersByUserId($user_id);

        view('user-profile/order-page', compact('orders', 'userInfor'));
    }

    public function deleteOrder($order_id)
    {
        $order_id = $_GET['id'];
        $order_id = filter_var($order_id, FILTER_VALIDATE_INT);
        $message = '';
        if (!$order_id) {
            $message = 'failed';
            header('Location: ' . $_ENV['ROOT_URL'] . '/user/viewOrder?message=' . $message);
            exit();
        }

        $order = new Order();
        $result = $order->getOrderInfo($order_id);

        if ($result) {
            try {
                $created_at = new DateTime($result['created_at']);
                $currentDateTime = new DateTime();
                $interval = $created_at->diff($currentDateTime);
                $timeThreshold = new DateInterval('PT12H');
                if ($interval->format('%s') > $timeThreshold->format('%s')) {
                    $message = 'failed';
                    header('Location: ' . $_ENV['ROOT_URL'] . '/user/viewOrder?message=' . $message);
                    exit();
                } else {
                    $orde = $order->delete($order_id);
                    if ($orde) {
                        $message = 'success';

                        header('Location: ' . $_ENV['ROOT_URL'] . '/user/viewOrder?message=' . $message);
                        setcookie("success", "Added order successful!", time() + 1, "/", "", 0);
                        exit();
                    }
                }
            } catch (Exception $e) {
                die("Error: " . $e->getMessage());
            }
        } else {
            die("Order not found");
        }
    }

    public function updateInforOrder()
    {
        $message = '';
        $name = $_POST['user_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $user_id = $_SESSION['user']['id'];
        $order = new Order();
        $orderDetails = $order->getOrdersByUserId($user_id);
        print_r($orderDetails);

        if ($orderDetails) {
           
                $_SESSION['user'] = array(
                    'id' => $user_id,
                    'user_name' => $name,
                    'phone' => $phone,
                    'email' => $email,
                    'address' => $address,
                );

                $message = 'success';
                header('Location: ' . $_ENV['ROOT_URL'] . '/user/viewOrder?message=' . $message);
            }else{
                header('Location: ' . $_ENV['ROOT_URL'] . '/user/viewOrder?message=' . $message);
                
            }
           
        } 
        
    }

