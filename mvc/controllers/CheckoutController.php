<?php
require_once dirname(__DIR__) . "/core/functions.php";
require_once dirname(__DIR__) . "/models/Order.php";
require_once dirname(__DIR__) . "/models/User.php";
require_once dirname(__DIR__) . "/models/OrderItem.php";
require_once dirname(__DIR__) . "/models/Product.php";

class CheckoutController
{
    public function index()
    {
        $_SESSION['cart'];
        $user_id = $_SESSION['user']['id'];
        $userModel = new User();
        $user = $userModel->getOneUser($user_id);
        $message = 'success';
        if (!$user) {
            $message = 'failed';
            view('user-profile/checkout-page', compact('user', 'message'));
        }
        view('user-profile/checkout-page', compact('user', 'message'));
    }
     public function shoppingCart()
    {

        $shopModel = new Shop();
        $resultShop = $shopModel->getShop();
        if (isset($_POST['addcart']) && ($_POST['addcart'])) {
            $id = $_POST['PId'];
            $count  = 0;
            $name = $_POST['PName'];
            $image = $_POST['Image'];
            $price = $_POST['PPrice'];
            if (isset($_SESSION['cart']['product_id'])) {
                $_SESSION['cart']['product_id']['quantity']++;
            } elseif (isset($_POST['PQuantity']) && $_POST['PQuantity'] > 0) {
                $qty = $_POST['PQuantity'];
                $count = $qty;
            } else {
                $qty = 1;
                $count = $qty;
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
            setcookie("success", "Added order successful!", time() + 1, "/", "", 0);
        }
        view('user-profile/shoppingcart', compact('resultShop'));
    }

    public function deleteItem()
    {
        if (isset($_GET['id']) && ($_GET['id'] >= 0)) {
            array_splice($_SESSION['cart'], $_GET['id'], 1);
            view('user-profile/shoppingcart');
        }
    }

 public function checkoutOnline()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ((isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email'])) || !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone'])) {

                error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                date_default_timezone_set('Asia/Ho_Chi_Minh');

                $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                $vnp_Returnurl = "http://localhost/php_project/Checkout2/checkoutSuccess";
                $vnp_TmnCode = "X1WL3I2L"; //Mã website tại VNPAY 
                $vnp_HashSecret = "SFBDIRUMYOSNUZGWWYKVLQSKEDOSOXWY";

                $vnp_TxnRef = rand(00, 9999);

                $vnp_OrderInfo = "Noi dung thanh toan";
                $vnp_OrderType = "billpayment";
                $vnp_Amount = $_POST['total_price'] * 100;
                $vnp_Locale = "vn";
                $vnp_BankCode = "NCB";
                $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                $vnp_Bill_Mobile = $_POST['phone'];
                $vnp_Bill_Email = $_POST['email'];
                $fullName = trim($_POST['name']);
                $vnp_address = trim($_POST['address']);

                $inputData = array(
                    "vnp_Version" => "2.1.0",
                    "vnp_TmnCode" => $vnp_TmnCode,
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_OrderType" => $vnp_OrderType,
                    "vnp_ReturnUrl" => $vnp_Returnurl,
                    "vnp_TxnRef" => $vnp_TxnRef,

                );

                if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                    $inputData['vnp_BankCode'] = $vnp_BankCode;
                }
                if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                    $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                }

                //var_dump($inputData);
                ksort($inputData);
                $query = "";
                $i = 0;
                $hashdata = "";
                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                    } else {
                        $hashdata .= urlencode($key) . "=" . urlencode($value);
                        $i = 1;
                    }
                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                }

                $vnp_Url = $vnp_Url . "?" . $query;
                if (isset($vnp_HashSecret)) {
                    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                }
                $returnData = array(
                    'code' => '00', 'message' => 'success', 'data' => $vnp_Url
                );
                if (isset($_POST['redirect'])) {
                    header('Location: ' . $vnp_Url);
                    die();
                } else {
                    echo json_encode($returnData);
                }
            }
        }
    }
    public function checkoutSuccess()
    {

        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $urlComponents = parse_url($CurPageURL);
        $data = array();

        if (isset($urlComponents['query'])) {

            parse_str($urlComponents['query'], $queryParams);

            $user_id = $_SESSION['user']['id'];

            $current = new DateTime();
            $currentFormated = $current->format('Y-m-d');
            $data = [
                "user_id" => $user_id,
                "order_status_id" => 1,
                "date" => $currentFormated,
                "total_price" => $queryParams['vnp_Amount'],
                "payment_method" => $queryParams['vnp_BankCode'],
                "vnp_TransactionNo"=>  $queryParams['vnp_TransactionNo']
            ];
        }
        if ($data != []) {
            $orderModel = new Order();
            $order_id = $orderModel->createOrder($data['user_id'], $data['order_status_id'], $data['date'], $data['total_price'], $data['payment_method']);
            if ($order_id > 0) {
                $product = new Product();
                $productModel = $_SESSION['cart'];
                foreach ($productModel as $products) {
                    $quantityP = $products['quantity'];
                    $product_id = $products['product_id'];
                    $product->updateProductQ($product_id, $quantityP);
                }

                $order_item = new OrderItem();
                foreach ($productModel as $product) {
                    $product_id = $product['product_id'];
                    $product_image = $product['image_url'];
                    $unit_price = $product['price'];
                    $quantity = $product['quantity'];
                    $order_item->createOrderItem($order_id, $product_id, $quantity, $unit_price, $product_image);
                }
               
              
            }
             $_SESSION['cart']=[];
            view('user-profile/thanks', compact('data')); 
        }
            
    }

}