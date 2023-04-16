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
        Holistic Healing
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet" type="text/css" />


    <?= $this->Html->css(['cake','normalize.min', 'milligram.min', 'bootstrap']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script.js') ?>
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
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#Gallery">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<!--Welcome Page Goes Here-->
<header class="masthead">
    <div class="container">
        <div class="masthead-heading">Welcome to Holistic Healing</div>
        <div class="masthead-heading text-uppercase"> A Journey to discover your inner self</div>
        <a class="btn btn-primary btn-l text-uppercase" href="services">Book now</a>
    </div>

</header>
<!--End Welcome Page-->

<!--ABout Page Goes Here-->

<section class="page-section1 about-heading bg-gradient" id="about">

    <div class="container">
        <!-- For cakephp, need to use $this->html->image instead of src to display the image-->
        <img class="img-fluid1 about-heading-img mb-3 mb-lg-0" <?= $this->Html->image('aboutbg.jpg', ['alt' => 'About Background']); ?> />
        <div class="about-heading-content">
            <div class="row1">
                <div class="col-xl-9 col-lg-10 mx-auto">
                    <div class="bg-faded rounded p-5"> <!--find p-5,mb-4-->
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper">About us</span>
                        </h2>
                        <span class="aboutbody" >At Holistic Healing, we aim to provide our beloved customers a personal space in Melbourne and online for
                            Spiral practices and facilitating life transformation by removing blocks and limiting beliefs.
                             Through life improvement sessions, customers can learn, process and transmute stagnant energy into art
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--End about Page-->

<!--Section for the services-->
<section class="page-section about-heading bg-gradient-reverse" id="services">
    <div class="container">
        <div class="gallery">
            <div class="text-center"><h3 class="section-heading2 text-uppercase">Services</h3></div>

            <a href="img1.jpg">
                <img src="img1-thumb.jpg" alt="Image 1">
            </a>
            <a href="img2.jpg">
                <img src="img2-thumb.jpg" alt="Image 2">
            </a>
            <a href="img3.jpg">
                <img src="img3-thumb.jpg" alt="Image 3">
            </a>
            <!-- 这里可以添加更多图片 -->
        </div>
    </div>
</section>
<!--End about Page-->

<!--Section for the Gallery-->
<section class="page-section bg-gradient" id="Gallery">
    <div id="wrap" class="container my-5">
        <div class="text-center"><h3 class="section-heading2 text-uppercase" >Gallery</h3></div>
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

<!-- Contact-->
<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
            <h3 class="section-subheading text-muted"> We can be contacted through our social media, phone number and email.

            <br>
                Else you can send us the enquiry ,and we will get back to you as soon as possible.
            <br>Email: test@gmail.com
            <br> Tel: 012345678
            <br> IG: /testAccount </h3>
        </div>

        <!-- * * SB Forms Contact Form * *-->

        <!-- This form is pre-integrated with SB Forms.-->

        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Name input-->
                        <input class="form-control" id="name" type="text" placeholder="Your Name *" data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <input class="form-control" id="email" type="email" placeholder="Your Email *" data-sb-validations="required,email" />
                        <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- Message input-->
                        <textarea class="form-control" id="message" placeholder="Your Message *" data-sb-validations="required"></textarea>
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                    </div>
                </div>
            </div>
            <!-- Submit success message-->
            <!---->
            <!-- This is what your users will see when the form-->
            <!-- has successfully submitted-->
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center text-white mb-3">
                    <div class="fw-bolder">Form submission successful!</div>
                    To activate this form, sign up at
                    <br />

                </div>
            </div>
            <!-- Submit error message-->
            <!---->

            <!-- This is what your users will see when there is-->
            <!-- an error submitting the form-->
            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
            <!-- Submit Button-->
            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Send Message</button></div>
        </form>
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

<!--contact form-->
</body>
</html>

