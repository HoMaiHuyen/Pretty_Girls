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
            <?php foreach ($resultPopular as $result) : ?>
                <div class="card mb-3 card-body-padding" style="max-width: 1058px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= $result['image_url'] ?>" class="rounded-circle texture-spray" alt="<?= $result['image_name'] ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body card-body-margin">
                                <h5 class="card-title-large"><b>Love yourself. Because no one in this world can do it better than you. No one</b></h5>
                                <p class="card-text">Nothing makes a woman more beautiful than the belief that she is beautiful. Come shine with us</p>
                                <a href="<?php echo ROOT_URL . '/Product/show&id=' . $result['id'] ?>"  class="btn btn-light">View more </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php break; ?>
            <?php endforeach; ?>
        </div>
        <div class="row mb-4">
            <?php foreach (array_slice($resultPopular, 1, 3) as $result) : ?>
                <div class="col-md-4 mb-5 hover-effect">
                    <a href="<?php echo ROOT_URL . '/Product/show&id=' . $result['id'] ?>">
                        <img src="<?= $result['image_url'] ?>" alt="<?= $result['image_name'] ?>" class="image-popular-product img-fluid" />
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="row mt-4">
            <?php foreach (array_slice($resultPopular, 4, 3) as $result) : ?>
                <div class="col-md-4 mb-5 hover-effect">
                    <a href="<?php echo ROOT_URL . '/Product/show&id=' . $result['id'] ?>">
                        <img src="<?= $result['image_url'] ?>" alt="<?= $result['image_name'] ?>" class="image-popular-product img-fluid" />
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="row">
            <?php $result = end($resultPopular); ?>
            <div class="card mb-3 card-item-trial">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= $result['image_url'] ?>" class="img-fluid rounded-start Mliglanics-herbal" alt="<?= $result['image_name'] ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body-trial">
                            <p class="card-text text-animation">First, try the 7-day trial sample!</p>
                            <p class="card-text text-animation">TRIAL SAMPLE</p>
                            <p class="card-text text-animation"><b><?= $result['price'] ?></b></p>
                            <a href="<?php echo ROOT_URL . '/Product/show&id=' . $result['id'] ?>" class="btn btn-light">View more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>