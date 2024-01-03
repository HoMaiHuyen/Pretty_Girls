<?php
require_once  dirname(__DIR__) . "/core/Middlewares/AuthMiddleware.php";
require_once dirname(__DIR__) . "/models/User.php";
require_once dirname(__DIR__) . "/core/functions.php";
require_once dirname(__DIR__) . "/models/Order.php";
require_once dirname(__DIR__) . "/models/OrderItem.php";
require_once dirname(__DIR__) . "/models/OrderStatus.php";

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

        $user_id = $_SESSION['user_id'];


        $user = new User();
        $result = $user->getOneUser($user_id);


        if ($result) {
            view(
                'user-profile/index',
                compact(
                    'result'
                )
            );
        }
    }

    public function updateUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $nameClear = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');

            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $emailClear = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

            $address = isset($_POST['address']) ? $_POST['address'] : '';
            $addressClear = htmlspecialchars($address, ENT_QUOTES, 'UTF-8');

            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $passwordClear = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

            $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
            $phoneClear = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
            $user = new User();
            $result = $user->updateUser($id, $nameClear, $phoneClear, $emailClear, $addressClear, $passwordClear);
            if ($result !== false) {
                header("Location:/project1/User/show/$id");
                exit();
            }
        }
    }
    public function shoppingCart()
    {
        if (isset($_POST['addcart']) && ($_POST['addcart'])) {
            $id = $_POST['PId'];
            $name = $_POST['PName'];
            $image = $_POST['Image'];
            $price = $_POST['PPrice'];
            if (isset($_POST['PQuantity']) && $_POST['PQuantity'] > 0) {
                $qty = $_POST['PQuantity'];
            } else {
                $qty = 1;
            }
            $flag = 0;

            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['product_id'] == $id) {
                    $newqty = $qty + $item['quantity'];
                    $_SESSION['cart'][$key]['quantity'] = $newqty;
                    $flag = 1;
                    break;
                }
            }
            if ($flag == 0) {
                $item = array('product_id' => $id, 'product_name' => $name, 'image_url' => $image, 'price' => $price, 'quantity' => $qty);
                $_SESSION['cart'][] = $item;
            }
            header('Location:' . $_ENV['ROOT_URL'] . '/Product/index');
        }
        view('user-profile/shoppingcart');
    }

    public function deleteItem()
    {
        if (isset($_GET['id']) && ($_GET['id'] >= 0)) {
            array_splice($_SESSION['cart'], $_GET['id'], 1);
            view('user-profile/shoppingcart');
        }
    }

    public function viewOrder($user_id)
    {

        $user_id = $_SESSION['user_id'];

        $user = new User();
        $result = $user->getOneUser($user_id);
        $orders = $user->getOrders($user_id);
        
        $order_id = $orders['id'];
        view('user-profile/order-page', compact('orders'));

    }
     public function viewOrderItem()
    {
        $order_itemModal = new OrderItem();
        $order_id = $_GET['id'];
        $message_error = '';
        $order_item = $order_itemModal->inforOrderItem($order_id);
        view('user-profile/order-page', compact('order_item'));
    }

    public function checkout()
    {
        $_SESSION['cart'];
        $user_id = $_SESSION['user_id'];
        $userModel = new User();
        $user = $userModel->getOneUser($user_id);
        $message = 'success';
        if (!$user) {
            $message = 'failed';
            view('user-profile/checkout-page', compact('user', 'message'));
        }
        view('user-profile/checkout-page', compact('user', 'message'));
    }

    public function checkouted()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $email = $_POST['email'] ?? '';
            $address = $_POST['address'] ?? '';

            $order_status_id = $_POST['order_status_id'] ?? '';
            $user_id = $_SESSION['user_id'] ?? '';
            $payment = $_POST['payment'] ?? '';
            $total_price = $_POST['total_price'] ?? '';

            $current = new DateTime();
            $currentFormated = $current->format('Y-m-d');

            $_SESSION['user'][] = array('user_id' => $user_id, 'user_name' => $name, 'phone' => $phone, 'email' => $email, 'address' => $address);

            $order = new Order();
            $order_id = $order->createOrder($user_id, $order_status_id, $currentFormated, $total_price, $payment);

            if ($order_id) {
                $order_item = new OrderItem();
                $products = $_SESSION['cart'];
                $product = new Product();
                foreach ($products as $product) {
                    $product_id = $product['product_id'];
                    $product_image = $product['image_url'];
                    $unit_price = $product['price'];
                    $quantity = $product['quantity'];

                    $order_item->createOrderItem($order_id, $product_id, $quantity, $unit_price, $product_image);
                }
            }

            if (empty($result)) {
                header('Location:' . $_ENV['ROOT_URL'] . '/User/show');
                exit();
            }
            header('Location:' . $_ENV['ROOT_URL'] . '/User/show');
        }
    }

   
    public function deleteOrder($order_id)
    {
        $order_id = $_GET['id'];
        $orrder = new Order();
        $orrder->getOrderInfo($order_id);
        $date = new DateTime();
        if($orrder['created_at'] ){

        }

        $result = $orrder->delete($order_id);
        header('Location: ' . $_ENV['ROOT_URL'] . '/user/viewOrder');
        view('user-profile/order-page');
    }
}
