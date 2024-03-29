<?php require_once dirname(dirname(dirname(__DIR__))) . "/config/app.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/footer.css' ?>">
   
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/form.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/user-profile.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/about-us.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/checkout-page.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/order-page.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/product.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/pageloading.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/homepage.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/detail.css' ?>">
    <link rel="stylesheet" href=" https://www.w3schools.com/w3css/4/w3.css">



    <title>Blue Cosmetic</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
<?php 
if(isset($_COOKIE['unlogin'])) {
    if(!empty($_COOKIE['unlogin'])){
        ?>
        <script>
            alert("You unlogin so you have to register or login into system");
        </script>
        <?php 
    }
}
 ?>
    <header class="head" id="myTopnav">
        <div class="logo-container">
            <img src="<?php loadImage('Logo (1).png') ?>" style="width: 80px; height: 80px;">
        </div>
        <nav class="main-menu" id="myTopnav">
            <a href="<?php echo ROOT_URL . '/Home/index' ?>">Home</a>
            <a href="<?php echo ROOT_URL . '/Product/index' ?>">Product</a>
            <a href="<?php echo ROOT_URL . '/Home/AboutUs' ?>">About Us</a>
            <a href="./footer.php">Contact Us</a>
        </nav>
        <div class="search-container">
            <form action="<?php echo ROOT_URL . '/product/search' ?>" method="post">
                <input type="text" placeholder="Search <?php echo isset($search_key) ? $search_key : ""  ?>" name='key'>
                <i class="fa-solid fa-magnifying-glass"></i>
                <button class="burger-menu" type="button" onclick="toggleMenu()">&#9776;</button>
            </form>
        </div>
        <div class="icon-nav">
            <div class="item1">

                <a href="<?php echo ROOT_URL . '/Checkout/shoppingCart' ?>"><i class="fa-solid fa-cart-shopping" style="font: size 40px;color:lightblue;text-shadow:2px 2px 4px #000000;"></i></a>
            </div>

            <a class="dropdown" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <?php isset($_SESSION['user']['id']) ?>
                <a class="dropdown" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php
                    if (!empty($_SESSION['user']['image_url'])) {
                    ?>
                        <img src='<?php echo  $_SESSION['user']['image_url'] ?>' alt="" id="output" class="rounded-circle" style="width:28px;height:28px;margin-right: 50px;margin-top:0px">
                    <?php } else {
                    ?>
                        <i class="fa-solid fa-circle-user fa-xl" style="color: gray; margin-right: 50px;font-size: 25px;"></i>
                    <?php }
                    ?>
                </a>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="<?php echo ROOT_URL . '/auth/register' ?>">Register</a></li>
                <li><a class="dropdown-item" href="<?php echo ROOT_URL . '/auth/login' ?>">Login</a></li>
                <li><a class="dropdown-item" href="<?php echo ROOT_URL . '/auth/logout' ?>">Logout</a></li>
                <li><a class="dropdown-item" href="<?php echo ROOT_URL . '/User/show?session_id=' . 'session_id' ?>">Profile</a></li>
            </ul>
        </div>

    </header>
    <main style="min-height: 540px;">
