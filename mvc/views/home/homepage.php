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
<!-- About Section -->
<div class="w3-row w3-padding-64" id="about">
    <?php foreach ($resultPopular as $result) : ?>
        <div class="w3-col m6 w3-padding-large w3-hide-small">
            <img src="<?= $result['image_url'] ?>" class="w3-round w3-image w3-opacity-min" style="height: 500px; width: 550px;" alt="<?= $result['image_name'] ?>" width="600" height="750">
        </div>

        <div class="w3-col m6 w3-padding-large">
            <h1 class="w3-center" style="color: #ED4D2D;">Service</h1><br>

            <p class="w3-large">The Catering was founded in blabla by Mr. Smith in lorem ipsum dolor sit amet, consectetur adipiscing elit consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute iruredolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.We only use ingredients.</p>
            <p class="w3-large w3-text-grey w3-hide-medium">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod temporincididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <div> <a href="<?php echo ROOT_URL . '/Product/details&id=' . $result['id'] ?>" class="btn btn-success">View more </a></div>
        </div>
        <?php break; ?>
    <?php endforeach; ?>
</div>

<hr>

<!-- Menu Section -->
<div class="w3-row w3-padding-64" id="menu">
    <div class="w3-col w3-padding-large">
        <h1 class="w3-center" style="color: #ED4D2D;">Popular</h1><br>
    </div>
    <?php foreach (array_slice($resultPopular, 1, 2) as $result) : ?>
        <div class="w3-col l6 w3-padding-large">

            <h4><?= $result['product_name'] ?></h4>
            <p class="w3-text-grey"><?= $result['description'] ?></p><br>

            <h4>Honey Almond Granola with your skin</h4>
            <p class="w3-text-grey">Natural cereal of honey so cool</p><br>

            <h4></h4>
            <p class="w3-text-grey">Vanilla flavored batter with malted flour 7.50</p><br>
            <div> <a href="<?php echo ROOT_URL . '/Product/details&id=' . $result['id'] ?>" class="btn btn-success">View more </a></div>

        </div>

        <div class="w3-col l6 w3-padding-large">
            <img src="<?= $result['image_url'] ?>"  style="height: 500px; width: 550px;" class="w3-round w3-image w3-opacity-min" alt="Menu" style="width:100%">
        </div>
    <?php endforeach; ?>
</div>

<hr>
</div>
<div class="w3-row w3-padding-64" id="about">
    <?php foreach(array_slice($resultPopular, 1, 1) as $result) : ?>
        <div class="w3-col m6 w3-padding-large w3-hide-small">
            <img src="<?= $result['image_url'] ?>" class="w3-round w3-image w3-opacity-min" style="height: 500px; width: 550px;" alt="<?= $result['image_name'] ?>" width="600" height="750">
        </div>
        <div class="w3-col m6 w3-padding-large">
            <h1 class="w3-center" style="color: #ED4D2D;">Golden</h1><br>

            <p class="w3-large">The Catering was founded in blabla by Mr. Smith in lorem ipsum dolor sit amet, consectetur adipiscing elit consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute iruredolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.We only use ingredients.</p>
            <p class="w3-large w3-text-grey w3-hide-medium">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod temporincididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <div> <a href="<?php echo ROOT_URL . '/Product/details&id=' . $result['id'] ?>" class="btn btn-success">View more </a></div>
        </div>       

        <?php break; ?>
    <?php endforeach; ?>
</div>