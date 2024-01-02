
<?php require_once dirname(dirname(dirname(__DIR__))) . "/config/app.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/home.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/footer.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/product-detail.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/form.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/product.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/user-profile.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/about-us.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/checkout-page.css' ?>">
    <title>Blue Cosmetic</title>
     <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
    <header class="head" id="myTopnav">
        <div class="logo-container">
            <img src="<?php loadImage('Logo (1).png') ?>" style="width: 80px; height: 80px;">
        </div>
        <nav class="main-menu" id="myTopnav">
            <a href="<?php echo ROOT_URL . '/Home/index' ?>">Home</a>
            <a href="<?php echo ROOT_URL . '/Product/index' ?>">Product</a>
            <a href="<?php echo ROOT_URL . '/Home/AboutUs' ?>">About Us</a>
            <a href="#">Contact Us</a>
        </nav>
        <div class="search-container">
            <form action="<?php echo ROOT_URL . '/product/search' ?>" method="post">
                <input type="text" placeholder="Search <?php echo isset($search_key) ? $search_key : ""  ?>" name='key'>
                <i class="fa-solid fa-magnifying-glass"></i>
                <!-- <button type="submit" name="submit" value="submit"><i class="fa-solid fa-magnifying-glass"></i></button> -->
                <button class="burger-menu" type="button" onclick="toggleMenu()">&#9776;</button>
            </form>
        </div>
        <div class="icon-nav">
            <div class="item1">
             
                <a href="<?php echo ROOT_URL .'/user/shoppingCart'?>"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
         
            <a class="dropdown" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <?php isset($_SESSION['user_id'])?>
                    <a class="dropdown" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-circle-user fa-xl" style="color: gray; margin-right: 50px;font-size: 25px;"></i>
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
<main  style="min-height: 550px;">