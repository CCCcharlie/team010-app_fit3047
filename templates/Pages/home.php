<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Holistic Healings
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet" type="text/css" />


    <?= $this->Html->css(['cake','normalize.min', 'milligram.min', 'bootstrap']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#page-top"><img src="img\holistichealinglogofull.png" alt="Holistic Healing" /> Holistic Healing </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="#services">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#Gallery">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<!--Welcome Page Goes Here-->
<header class="masthead">
    <div class="container">
        <div class="masthead-heading">Welcome to Holistic Healing</div>
        <div class="masthead-heading text-uppercase">Journey to discover your inner self</div>
        <a class="btn btn-primary btn-l text-uppercase" href="#services">Book now</a>
    </div>

</header>
<!--End Welcome Page-->

<!--ABout Page Goes Here-->

<!--End about Page-->
<!--Section for the Gallery-->
<section class="page-section bg-gradient" id="Gallery">
    <div id="wrap" class="container my-5">
        <div class="text-center"><h2 class="section-heading text-uppercase">Gallery</h2></div>
        <div class="row">
            <div class="col-12">

                <!-- Upper Carousel -->
                <div id="carousel" class="carousel slide gallery" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-slide-number="0" data-toggle="lightbox" data-gallery="gallery">
                            <img src="img\gallery\LIFEBECOMINGAMOUNTAINPROMO.png" class="mx-auto d-block " style="max-height: 35vw;"  alt="Promotional Poster Showcasing Holistic Healing">

                            <div class="caption"><p>Life Feel Like a Mountain? Holistic Healing is here to help. Come in store for a new promotion.</p></div>
                        </div>
                        <div class="carousel-item" data-slide-number="1" data-toggle="lightbox" data-gallery="gallery">
                            <img src="img\gallery\BECOMEGLOWINGPROMO.png" class="mx-auto d-block" style="max-height: 35vw;" alt="A showcase poster for Holistic Healing">
                            <div class="caption"><p>GLOW UP, WITH OUR GLOWING PROMO. TRY THE NEW "GLOW" HOLISTIC SESSION!</p> </div>
                        </div>
                        <div class="carousel-item" data-slide-number="2" data-toggle="lightbox" data-gallery="gallery" >
                            <img src="img\gallery\GENERICPOSTER2.png" class="mx-auto d-block" style="max-height: 35vw;" alt="Generic Dummy Holistic Healing POster">
                            <div class="caption"><p></p> </div>
                        </div>
                        <div class="carousel-item" data-slide-number="3" data-toggle="lightbox" data-gallery="gallery">
                            <img src="img\gallery\HolisticHealingsStorefront.jpg" class="mx-auto d-block" style="max-height: 35vw;" alt="AI Image of a storefront">
                            <div class="caption"><p></p> </div>
                        </div>
                        <div class="carousel-item" data-slide-number="4" data-toggle="lightbox" data-gallery="gallery">
                            <img src="img\gallery\GENERICPOSTER.png" class="mx-auto d-block" style="max-height: 35vw;" alt="Generic Dummy Holistic Healing Poster">
                            <div class="caption"><p></p> </div>
                        </div>
                        <div class="carousel-item" data-slide-number="5" data-toggle="lightbox" data-gallery="gallery">
                            <img src="img\gallery\MEETOURNEWTEAMMEMBER.png" class="mx-auto d-block" style="max-height: 35vw;" alt="Team Member showcase doc">
                            <div class="caption"><p></p> </div>
                        </div>
                        <div class="carousel-item" data-slide-number="6" data-toggle="lightbox" data-gallery="gallery">
                            <img src="img\gallery\Showcasephoto1.jpg" class="mx-auto d-block" style="max-height: 35vw;" alt="Red Leaves on tree. ">
                            <div class="caption"><p></p> </div>
                        </div>
                        <div class="carousel-item" data-slide-number="7" data-toggle="lightbox" data-gallery="gallery">
                            <img src="img\gallery\Showcasephoto2.jpg" class="mx-auto d-block" style="max-height: 35vw;" alt="Image of green leaves">
                            <div class="caption"><p></p> </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <!-- Carousel Navigation-->
                <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                    <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->

<!--Gallery/LightboxJS-->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js'></script>
<script src='https://kit.fontawesome.com/ad153db3f4.js'></script><script src="js/scripts.js"></script>


</body>
</html>

