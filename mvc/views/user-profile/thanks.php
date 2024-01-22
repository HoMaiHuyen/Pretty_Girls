<?php require_once dirname(__DIR__) . "/partials/header.php"; 
?>
    <style>* {
    box-sizing: border-box;
    font-size: 20px;
    font-family: "Barlow", sans-serif;
}

:root {
    --main-color: #ff5800;
    --white-color: #fff;
    --black-color: #111;
    --gray-color: #ddd;
    --light-gray-color: #eee;
}

body {
    background-color: var(--light-gray-color);
}

.container {
    margin: 40px auto;
    width: 75%;
    height: 50vh;
    position: relative;
    margin-bottom: 7%;
}


.container img {
    width: calc(100% / 4);
    height: 60%;
    background-color: var(--white-color);
    margin: 6% 15%; 
    position: absolute;
    padding: 50px;
}

.container header {
    font-size: 40px;
    font-weight: bold;
    margin-bottom: 25px;
}

div.about-the-purchase {
    display: inline-block;
    margin-top: 60px;
    margin-left: 450px;
}

div.about-the-purchase strong {
    color: rgb(87, 77, 77);
}

div.first-detail {
    margin-bottom: 10px;
}

div.second-detail {
    margin-bottom: 25px;
}

button {
    padding: 10px;
    text-align: center;
    font-size: 15px;
    min-width: 150px;
    cursor: pointer;
}

button.home-button {
    background-color: var(--main-color);
    color: var(--white-color);
}

button.order-status-button {
    background-color: var(--black-color);    
    color: var(--white-color);
    width: 200px;
}


    </style>
        <div class="container">
            <img src="https://th.bing.com/th/id/OIP.JaJr2YVsxBPQYs2KPgadowHaEZ?pid=ImgDet&rs=1" alt="Successfully added to your cart">

            <div class="about-the-purchase">
                <header>
                    Order Made Successfully
                </header>
                <div class="first-detail">
                    <strong>Order ID :</strong>  <br>
                </div>
                <div class="second-detail">
                    <strong>Payment Method:</strong> CNB <br>
                </div>
               <a href="<?php echo ROOT_URL.'/Home/index' ?>"><button class="home-button">Return Home</button></a> 
                 <a href="<?php echo ROOT_URL.'/user/viewOrder' ?>"><button class="order-status-button">Check Order Status</button></a> 
            </div>
        </div>

    </body>

    </html>
