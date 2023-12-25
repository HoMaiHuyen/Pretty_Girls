<?php require_once dirname(__DIR__) . "/partials/header.php"; ?>

<section>
    <div class="container-fluid">
        <div class="row about-us-title">
            <div class="col-12">
                <h1 class="card-title-about-us animation">About us</h1>
            </div>
        </div>
        <div class="row about-us-title">
            <div class="col-10">
                <p class="card-text-about-us">
                    Embark on a beauty journey with us! Our mission extends beyond offering premium skincare and makeup – we're dedicated to empowering every consumer to feel confidently beautiful. By providing expert guidance and personalized recommendations, we aim to assist you in discovering products that enhance your unique beauty. At our store, authenticity is our commitment, ensuring that you receive only genuine, high-quality items that align with our stringent standards. We believe that beauty is an expression of individuality, and our curated selection reflects this philosophy. Join us in embracing self-expression and self-care, and let our products be the catalyst for your radiant confidence.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-7">
                <div class="card text-white" id="card-image">
                    <img src="https://www.revitalash.com/cdn/shop/files/Landscape_Image_2x_874863a5-6e29-431d-b4af-5f21f23fb69f.webp?crop=center&height=800&v=1689874697&width=1000" id="image1" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title-image-about-us-1">Blue Cosmetic</h5>
                        <p class="card-text">We aim to bring our customers high quality products. And we believe we're still doing that well.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="card text-white card-image2">
                    <img src="https://www.revitalash.com/cdn/shop/files/Landscape_Image_2x_874863a5-6e29-431d-b4af-5f21f23fb69f.webp?crop=center&height=800&v=1689874697&width=1000" class="card-img" id="image2" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title-image-about-us-2">Our mission</h5>
                    </div>
                </div>
                <div>
                    <a href=""></a>
                </div>
            </div>
        </div>

    </div>
    <div class="container mt-5" id="co-founder">
        <div class="row mb-5 ">
            <div class="col-12">
                <h2 class="title-co-founder  animation">Co-Founder</h2>
                <p class="card-text-co-founder">Blue Cosmetics was founded by three talented co-founders with a mission to enhance confidence through beauty for women. Jenny Nguyen, an experienced makeup artist, brings creativity and passion in creating unique cosmetic products. Brian Tran, an expert in research and product development, contributes innovative ideas and advanced technology for Blue Cosmetics' continuous innovation. Angela Le, the business manager, ensures efficient management and excellent customer relations.</p>
            </div>
        </div>
        <div class="row justify-content-center align-items-center" style="gap: 20px;">
            <div class="col-md mb-3 hover-effect">
                <div class="card h-100">
                    <img src="<?php loadImage('image-co-founder3.jpg') ?>" class="card-img-top about-image" alt="...">
                    <div class="card-body">
                        <h5 class="card-name-co-founder">Táo Nhỏ</h5>
                    </div>
                </div>
            </div>
            <div class="col-md mb-3 hover-effect">
                <div class="card h-100">
                    <img src="<?php loadImage('image-co-founder1.jpg') ?>" class="card-img-top about-image" alt="...">
                    <div class="card-body">
                        <h5 class="card-name-co-founder">Huyền Thin</h5>
                    </div>
                </div>
            </div>
            <div class="col-md mb-3 hover-effect">
                <div class="card h-100">
                    <img src="<?php loadImage('image-co-founder2.jpg') ?>" class="card-img-top about-image" alt="...">
                    <div class="card-body">
                        <h5 class="card-name-co-founder">Linh Lung Linh</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
<?php 
require_once dirname(__DIR__) . "/partials/footer.php";  
?>