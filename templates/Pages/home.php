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

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
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
        <a class="navbar-brand" href="#page-top"><img src="img\holistichealinglogofull.png" alt="Holistic Healing" /> Holistic Healing</a>
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

<section class="page-section bg-light" id="Gallery">
    <div id="wrap" class="container my-5">
        <div class="row">
            <div class="col-12">

                <!-- Carousel -->
                <div id="carousel" class="carousel slide gallery" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-slide-number="0" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/vbNTwfO9we0/1600x900.jpg">
                            <img src="https://source.unsplash.com/vbNTwfO9we0/1600x900.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-slide-number="1" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/DEhwkPYevhE/1600x900.jpg">
                            <img src="https://source.unsplash.com/DEhwkPYevhE/1600x900.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-slide-number="2" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/-RV5PjUDq9U/1600x900.jpg">
                            <img src="https://source.unsplash.com/-RV5PjUDq9U/1600x900.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-slide-number="3" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/sd0rPap7Uus/1600x900.jpg">
                            <img src="https://source.unsplash.com/sd0rPap7Uus/1600x900.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-slide-number="4" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/kmRZFcZEMY8/1600x900.jpg">
                            <img src="https://source.unsplash.com/kmRZFcZEMY8/1600x900.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-slide-number="5" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/HJDdrWtlkIY/1600x900.jpg">
                            <img src="https://source.unsplash.com/HJDdrWtlkIY/1600x900.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-slide-number="6" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/VfuJpt81JZo/1600x900.jpg">
                            <img src="https://source.unsplash.com/VfuJpt81JZo/1600x900.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-slide-number="7" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/NLkXZQ7kHzI/1600x900.jpg">
                            <img src="https://source.unsplash.com/NLkXZQ7kHzI/1600x900.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-slide-number="8" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/bl4WNYGe2KE/1600x900.jpg">
                            <img src="https://source.unsplash.com/bl4WNYGe2KE/1600x900.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-slide-number="9" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/_8zfgT9kS2g/1600x900.jpg">
                            <img src="https://source.unsplash.com/_8zfgT9kS2g/1600x900.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-slide-number="10" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/enuCEimS1p4/1600x900.jpg">
                            <img src="https://source.unsplash.com/enuCEimS1p4/1600x900.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-slide-number="11" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/hZDtZkdXtek/1600x900.jpg">
                            <img src="https://source.unsplash.com/hZDtZkdXtek/1600x900.jpg" class="d-block w-100" alt="...">
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
                        <div class="carousel-item active" data-slide-number="0">
                            <div class="row mx-0">
                                <div id="carousel-selector-0" class="thumb col-3 px-1 py-2 selected" data-target="#carousel" data-slide-to="0">
                                    <img src="https://source.unsplash.com/vbNTwfO9we0/1600x900.jpg" class="img-fluid" alt="...">
                                </div>
                                <div id="carousel-selector-1" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="1">
                                    <img src="https://source.unsplash.com/DEhwkPYevhE/1600x900.jpg" class="img-fluid" alt="...">
                                </div>
                                <div id="carousel-selector-2" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="2">
                                    <img src="https://source.unsplash.com/-RV5PjUDq9U/1600x900.jpg" class="img-fluid" alt="...">
                                </div>
                                <div id="carousel-selector-3" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="3">
                                    <img src="https://source.unsplash.com/sd0rPap7Uus/1600x900.jpg" class="img-fluid" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item " data-slide-number="1">
                            <div class="row mx-0">
                                <div id="carousel-selector-4" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="4">
                                    <img src="https://source.unsplash.com/kmRZFcZEMY8/1600x900.jpg" class="img-fluid" alt="...">
                                </div>
                                <div id="carousel-selector-5" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="5">
                                    <img src="https://source.unsplash.com/HJDdrWtlkIY/1600x900.jpg" class="img-fluid" alt="...">
                                </div>
                                <div id="carousel-selector-6" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="6">
                                    <img src="https://source.unsplash.com/VfuJpt81JZo/1600x900.jpg" class="img-fluid" alt="...">
                                </div>
                                <div id="carousel-selector-7" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="7">
                                    <img src="https://source.unsplash.com/NLkXZQ7kHzI/1600x900.jpg" class="img-fluid" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" data-slide-number="2">
                            <div class="row mx-0">
                                <div id="carousel-selector-8" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="8">
                                    <img src="https://source.unsplash.com/bl4WNYGe2KE/1600x900.jpg" class="img-fluid" alt="...">
                                </div>
                                <div id="carousel-selector-9" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="9">
                                    <img src="https://source.unsplash.com/_8zfgT9kS2g/1600x900.jpg" class="img-fluid" alt="...">
                                </div>
                                <div id="carousel-selector-10" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="10">
                                    <img src="https://source.unsplash.com/enuCEimS1p4/1600x900.jpg" class="img-fluid" alt="...">
                                </div>
                                <div id="carousel-selector-11" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="11">
                                    <img src="https://source.unsplash.com/hZDtZkdXtek/1600x900.jpg" class="img-fluid" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
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

