<?php
require_once dirname(__DIR__) . "/core/functions.php";
require_once dirname(__DIR__) . "/models/Order.php";
require_once dirname(__DIR__) . "/models/User.php";
require_once dirname(__DIR__) . "/models/OrderItem.php";
require_once dirname(__DIR__) . "/models/Product.php";

class CheckoutController
{
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($data)) // Chuyển đổi dữ liệu thành JSON
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
      
        $result = curl_exec($ch);
       
        curl_close($ch);
        return $result;
    }

    public function index()
    {
        if (isset($_POST['payUrl'])) {
            // Lấy thông tin từ form thanh toán
            $name = $_POST['name'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $email = $_POST['email'] ?? '';
            $address = $_POST['address'] ?? '';
            $order_status_id = $_POST['order_status_id'] ?? '';
            $user_id = $_SESSION['user']['user_id'] ?? '';
            $payment = $_POST['payment'] ?? '';
            $total_price = $_POST['total_price'] ?? '';

          
            $current = new DateTime();
            $currentFormated = $current->format('Y-m-d');
            $user_name_safe = htmlspecialchars($name, ENT_QUOTES);
            $phone_safe = htmlspecialchars($phone, ENT_QUOTES);
            $email_safe = htmlspecialchars($email, ENT_QUOTES);
            $address_safe = htmlspecialchars($address, ENT_QUOTES);

            $_SESSION['user'] = isset($_SESSION['user']) ? $_SESSION['user'] : array(
                'user_id' => $user_id,
                'user_name' => $user_name_safe,
                'phone' => $phone_safe,
                'email' =>  $email_safe,
                'address' => $address_safe,
            );

            $order = new Order();
            $order_id = $order->createOrder($user_id, $order_status_id, $currentFormated, $total_price, $payment);

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

         
            $endpoint = "";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderId = time() . "";
            $orderInfo = "Order of " . $user_name_safe.' '.$phone_safe .' '.$address_safe.' '. " - Code : " . $order_id. " - Tổng cộng: " . $total_price;


            $orderInfo = mb_substr($orderInfo, 0, 255); 
            $amount = $total_price;
         
            $redirectUrl = "http://localhost/php_project/Home/index";
            $ipnUrl = "http://localhost/php_project/Home/index";
            $extraData = "";
            $requestId = time() . "";
            $requestType = "payWithATM";

            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);

            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            unset($_SESSION['cart']);
            $result = $this->execPostRequest($endpoint, $data);
            $jsonResult = json_decode($result, true); 

            if (isset($jsonResult['payUrl'])) {
                $payUrl = $jsonResult['payUrl'];
                header('Location: ' . $payUrl);
            } else {                
                echo "Lỗi: Khóa 'payUrl' ";
            }
        }
        
        

}

}