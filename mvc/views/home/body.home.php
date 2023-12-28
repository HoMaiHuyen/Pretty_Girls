<div id="banner">
    <div class="left-section">
        <div>
            <h1>Pretty Girls</h1>
            <h2 class="fw-bold">
                <span>In the past, beauty was given by God</span>
                <br>
                <span>Nowadays beauty is made by people</span>
            </h2>
            <br>
            <h5 class="fw-bold">Beauty is a gift from heaven. But how long it lasts is up to you to take care of</h5>
        </div>
    </div>
    <div class="right-section">
        <img src="https://res.cloudinary.com/di9iwkkrc/image/upload/v1701007081/Prety_Girls/ybbf7561bxtuutopksth.jpg" alt="Background Image">
    </div>
</div>

<section>
    <div class="container-fluid body-homepage">
        <div class="row">
            <h1 class="title-body">Popular</h1>
            <div class="card mb-3 card-body-padding" style="max-width: 1058px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= $resultPopular[0]['image_url'] ?>" class="rounded-circle texture-spray" alt="<?= $resultPopular[0]['image_name'] ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body card-body-margin">
                            <h5 class="card-title-large"><b>Love yourself. Because no one in this world can do it better than you. No one</b></h5>
                            <p class="card-text">Nothing makes a woman more beautiful than the belief that she is beautiful. Come shine with us</p>
                            <a href="#!" class="btn btn-light">View more</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-4 mb-5 hover-effect">
                <a href="#">
                    <img src="<?= $resultPopular[1]['image_url'] ?>" alt="<?= $resultPopular[1]['image_name'] ?>" class="image-popular-product img-fluid" />
                </a>
            </div>
            <div class="col-md-4 mb-5 hover-effect">
                <a href="#">
                    <img src="<?= $resultPopular[2]['image_url'] ?>" alt="<?= $resultPopular[2]['image_name'] ?>" class="image-popular-product img-fluid" />
                </a>
            </div>
            <div class="col-md-4 mb-5 hover-effect">
                <a href="#">
                    <img src="<?= $resultPopular[3]['image_url'] ?>" alt="<?= $resultPopular[3]['image_name'] ?>" class="image-popular-product img-fluid" />
                </a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4 mb-5 hover-effect">
                <a href="#">
                    <img src="<?= $resultPopular[4]['image_url'] ?>" alt="<?= $resultPopular[4]['image_name'] ?>" class="image-popular-product img-fluid" />
                </a>
            </div>
            <div class="col-md-4 mb-5 hover-effect">
                <a href="#">
                    <img src="<?= $resultPopular[5]['image_url'] ?>" alt="<?= $resultPopular[5]['image_name'] ?>" class="image-popular-product img-fluid" />
                </a>
            </div>
            <div class="col-md-4 mb-5 hover-effect">
                <a href="#">
                    <img src="<?= $resultPopular[6]['image_url'] ?>" alt="<?= $resultPopular[6]['image_name'] ?>" class="image-popular-product img-fluid" />
                </a>
            </div>
        </div>
        <div class="row">
            <div class="card mb-3 card-item-trial">
                <div class="row g-0 ">
                    <div class="col-md-4">
                        <img src="<?= $resultPopular[7]['image_url'] ?>" class="img-fluid rounded-start Mliglanics-herbal" alt="<?= $resultPopular[7]['image_name'] ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body-trial">
                            <p class="card-text text-animation">First, try the 7-day trial sample!</p>
                            <p class="card-text text-animation">TRIAL SAMPLE</p>
                            <p class="card-text text-animation"><b><?= $resultPopular[7]['price'] ?></b></p>
                            <a href="#!" class="btn btn-light">View more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>