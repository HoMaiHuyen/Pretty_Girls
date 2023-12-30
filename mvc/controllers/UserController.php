<?php
require_once  dirname(__DIR__) . "/core/Middlewares/AuthMiddleware.php";
require_once dirname(__DIR__) . "/models/User.php";
require_once dirname(__DIR__) . "/core/functions.php";
class UserController
{   
    public function __construct()
    {
        $authMiddleware= new AuthMiddleware();

    }
    public function index()
    {
        view('user-profile/profile', null);
    }
   

    public function show()
    {
  
        $user_id = $_SESSION['user_id'];

  
            $user = new User();
            $result = $user->getOneUser($user_id);
            $orders = $user->getOrders($user_id);

            if ($result) {
                view(
                    'user-profile/profile',
                    compact(
                        'result',
                        'orders'
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
            if(isset($_POST['PQuantity']) && $_POST['PQuantity']>0 ){
                $qty=$_POST['PQuantity'];
            }
            else{
                $qty=1;
            }
            $flag = 0;
            $i = 0;
            foreach ($_SESSION['cart'] as $item) {
                if ($item[0] == $id) {
                    $newqty = $qty + $item[4];
                    $_SESSION['cart'][$i][4] = $newqty;
                    $flag = 1;
                    break;
                }
                $i++;
            }
            if ($flag == 0) {
                $item = array($id, $name, $image, $price, $qty);
                $_SESSION['cart'][] = $item;
            }
        }
        view('user-profile/shoppingcart');
    }
    public function deleteItem()
    {
        if (isset($_GET['id']) && ($_GET['id'] >= 0)) {
            array_splice($_SESSION['cart'], $_GET['id'],1);
            view('user-profile/shoppingcart');
        }
    }
}
