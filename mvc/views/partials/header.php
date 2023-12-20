<?php require_once dirname(dirname(dirname(__DIR__))) . "/config/app.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./userProfile.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/home.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/footer.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/products.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/product-detail.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT_URL . '/public/css/form.css' ?>">
    <title>User Profile</title>
</head>

<body>
  <section>
    <div id="header">
      <div class="logo">
          <img src="<?php loadImage('Logo (1).png') ?>" style="width: 80px; height: 80px;" />
      </div>
      </div>
      <div id="menu">
          <div class="item">
              <a href="#">Home</a>
          </div>
          <div class="item">
              <a href="#">Product</a>
              <div class="sub-menu">
                <div class="sub-menu-item">
                  <a href="#">Skincare</a>
                </div>
                <div class="sub-menu-item">
                  <a href="#">Haircare</a>
                </div>
              </div>
          </div>
          <div class="item">
              <a href="#">About Us</a>
          </div>
          <div class="item">
              <a href="#">Contact Us</a>
          </div>
      </div>
      <div class="search-container">
          <input type="text" placeholder="Search...">
          <i class="fa-solid fa-magnifying-glass"></i>
      </div>
      <div id="icon">
          <div class="item">
              <a href="#"><i class="fa-solid fa-cart-shopping fa-xl"></i></a>
          </div>
          <div class="item">
              <a href="#"><i class="fa-solid fa-circle-user fa-xl"></i></a>
          </div>
      </div>
  </div>
  </section>