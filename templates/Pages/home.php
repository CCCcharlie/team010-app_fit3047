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
 * @var \App\Model\Entity\Enquiry $enquiry

=======
 * @var string[] $globalContentBlocks
 * @var string[] $homePageContentBlocks
 * @var iterable<\App\Model\Entity\Service> $services
 * @var iterable<\App\Model\Entity\Cb> $cb
  * @var \App\Model\Entity\Booking $Booking
 * @var \Cake\Collection\CollectionInterface|string[] $customer
 * @var \Cake\Collection\CollectionInterface|string[] $staff
 * @var \Cake\Collection\CollectionInterface|string[] $services
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



    <?= $this->Html->css(['cake','normalize.min', 'milligram.min', 'bootstrap','home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script.js') ?>




</head>

<body>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#page-top"><img src="img\gallery\<?=$homePageContentBlocks['nav_logo']?>" alt="Holistic Healing Logo"/> <?= $homePageContentBlocks['nav_heading'] ?> </a>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#Gallery">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
        </div>
        <!-- Honestly, I dont know why echo "<br>" doesnt work here nor why the font size is so small.
         so I resorted on using invisible character "ㅤ" for spaces instead of a break line-->

        <?php if ($this->Identity->isLoggedIn()){
            echo "ㅤㅤ";
            echo $this->Html->link(__('Logout'), ['controller' => 'Staff', 'action' => 'logout']);
            echo "ㅤ";
            echo $this->Html->link(__('Admindex'), ['controller' => 'Services', 'action' => 'admindex']);
        } else {
            echo "ㅤ";
            echo $this->Html->link(__('Login'), ['controller' => 'Staff', 'action' => 'login']);
        }
        ?>

    </div>
</nav>
<!--Welcome Page Goes Here-->
<header class="masthead" style="background-image: url(<?= $this->Html->image('gallery/' . $homePageContentBlocks['welcome_image']) ?>">
    <div class="container">
        <div class="masthead-heading"><?= $homePageContentBlocks['welcome_header'] ?></div>
        <div class="masthead-heading-desc"> <?= $homePageContentBlocks['welcome_description'] ?></div>
        <a class=" btn btn-primary btn-l text-uppercase btn-sizing-hp" onclick="openForm()">Book now</a>
<!--        <button class="open-button btn btn-primary btn-l text-uppercase btn-sizing-hp" onclick="openForm()">Open Form</button>-->

    </div>


    <div class="form-popup" class="booking form content" id="myForm">
        <form  method="post" class="form-container">
            <button type="button" id="closeBtn" style="background-color: #ffc800; color: #fff; padding: 1px 10px; border: 1px solid #ffc800; border-radius: 9px; font-size: 20px; cursor: pointer;">X</button>
            <?= $this->Form->create($Booking) ?>
        <fieldset class="fieldfont">
            <legend><?= __('Add Booking') ?></legend>

            <?php
            echo $this->Form->control('booking_date',['class'=> 'fieldfont']);
            echo $this->Form->control('booking_time',['class'=> 'fieldfont']);
            echo $this->Form->control('cust_id', ['options' => $customer,'class' => 'fieldfont']);
            echo $this->Form->control('staff_id', ['options' => $staff,'class' => 'fieldfont']);
            echo $this->Form->control('service_id', ['options' => $services,'class' => 'fieldfont']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), [
            'style' => 'background-color: #ffc800; color: #fff; padding: 1px 10px; border: 1px solid #ffc800; border-radius: 9px; font-size: 20px; cursor: pointer;',
        ]) ?>
        <?= $this->Form->end() ?>
    </div>
</header>


<!--End Welcome Page-->

<!--About Page Goes Here-->

<section class="page-section1 about-heading bg-gradient-reverse" id="about">

    <div class="container">
        <!-- For cakephp, need to use $this->html->image instead of src to display the image-->
        <img class="img-fluid1 about-heading-img mb-3 mb-lg-0" src="img\gallery\<?=$homePageContentBlocks['about_image']?>" alt="About Background Image" />
        <div class="about-heading-content">
            <div class="row1">
                <div class="col-xl-9 col-lg-10 mx-auto">
                    <div class="bg-faded rounded p-5 "> <!--find p-5,mb-4. I've done a few temporary fixes here.-->
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper"><?= $homePageContentBlocks['about_header'] ?></span>
                        </h2>
                        <span class="aboutbody" ><?= $homePageContentBlocks['about_description'] ?>
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--End about Page-->

<!--Section for the services-->
<section class="page-section about-heading bg-gradient" id="services">
    <div class="container">
        <div class="gallery">
            <div class="text-center"><h3 class="section-heading2 text-uppercase-headers"><?= $homePageContentBlocks['service_header'] ?></h3></div>

            <div class="content">
                <div class="container">
                    <div class="row">
                        <!-- align items stretch aligns the item to "--bs-card-height: 350px;"-->
                        <!-- LOOP HERE -->
                        <!-- Removed the 3 iteration -->
                        <!-- $i = 0; foreach ($services as $service): $i++; if($i==4){break;}  -->

                        <?php foreach ($services as $service):?>
                            <div class="col-xs-3 col-sm-4 d-flex align-items-stretch">
                                <div class="card">
                                    <!-- $viewURL acts as a temporary variable to store the path of each created card so it can redirect
                                    when clicked-->
                                    <!-- <?php $viewURL = "#contact"?> -->

                                    <!-- Image section -->
                                    <a class="service-img" href="<?= $this->Url->build($viewURL) ?>" style="object-fill: fill">
                                        <?= @$this->Html->image($service->image_name) ?>
                                    </a>
                                    <div class="card-content">
                                        <!-- Title section -->
                                        <h4 class="card-title">
                                            <a href="<?= $this->Url->build($viewURL) ?>">
                                                <?= h($service->service_name) ?>
                                            </a>
                                        </h4>
                                        <!-- Description section -->
                                        <p class="card-subtitle"><?= h($service->service_desc) ?> <br>
                                            Duration:  <?= h($service->service_duration) ?> Minutes |
                                            Cost: $ <?= h($service->service_price) ?> |
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <a class="btn btn-primary btn-l text-uppercase btn-sizing" href="services">See All Services</a>
                </div>
            </div>
<!--            --><?php /*debug($homePageContentBlocks)*/?>
        </div>
    </div>
</section>
<!--End about Page-->

<!--Section for the Gallery-->
<section class="page-section bg-gradient-reverse" id="Gallery">
    <div id="wrap" class="container my-5">
        <div class="text-center"><h3 class="section-heading2 text-uppercase-headers" ><?= $homePageContentBlocks['gallery_header'] ?></h3></div>
        <div class="row">
            <div class="col-12">

                <!-- Upper Carousel -->
                <div id="carousel" class="carousel slide gallery" data-ride="carousel">
                    <div class="carousel-inner">

                        <div class="carousel-item active" data-slide-number="0" data-toggle="lightbox" data-gallery="gallery">
                            <img src="img\gallery\<?=$homePageContentBlocks['gallery_image_1']?>" class="mx-auto d-block " style="max-height: 35vw;" >
                                <div class="caption"><p><?= $homePageContentBlocks['gallery_caption_1'] ?></p></div>
                        </div>
                        <div class="carousel-item" data-slide-number="1" data-toggle="lightbox" data-gallery="gallery">
                            <img src="img\gallery\<?=$homePageContentBlocks['gallery_image_2']?>" class="mx-auto d-block" style="max-height: 35vw;" alt="A showcase poster for Holistic Healing">
                            <div class="caption"><p><?= $homePageContentBlocks['gallery_caption_2'] ?></p> </div>
                        </div>
                        <div class="carousel-item" data-slide-number="2" data-toggle="lightbox" data-gallery="gallery" >
                            <img src="img\gallery\<?=$homePageContentBlocks['gallery_image_3']?>" class="mx-auto d-block" style="max-height: 35vw;" alt="Generic Dummy Holistic Healing POster">
                            <div class="caption"><p><?= $homePageContentBlocks['gallery_caption_3'] ?></p> </div>
                        </div>
                        <div class="carousel-item" data-slide-number="3" data-toggle="lightbox" data-gallery="gallery">
                            <img src="img\gallery\<?=$homePageContentBlocks['gallery_image_4']?>" class="mx-auto d-block" style="max-height: 35vw;" alt="AI Image of a storefront">
                            <div class="caption"><p><?= $homePageContentBlocks['gallery_caption_4'] ?></p> </div>
                        </div>
                        <div class="carousel-item" data-slide-number="4" data-toggle="lightbox" data-gallery="gallery">
                            <img src="img\gallery\<?=$homePageContentBlocks['gallery_image_5']?>" class="mx-auto d-block" style="max-height: 35vw;" alt="Generic Dummy Holistic Healing Poster">
                            <div class="caption"><p><?= $homePageContentBlocks['gallery_caption_5'] ?></p> </div>
                        </div>
                        <div class="carousel-item" data-slide-number="5" data-toggle="lightbox" data-gallery="gallery">
                            <img src="img\gallery\<?=$homePageContentBlocks['gallery_image_6']?>" class="mx-auto d-block" style="max-height: 35vw;" alt="Team Member showcase doc">
                            <div class="caption"><p><?= $homePageContentBlocks['gallery_caption_6'] ?></p> </div>
                        </div>
                        <div class="carousel-item" data-slide-number="6" data-toggle="lightbox" data-gallery="gallery">
                            <img src="img\gallery\<?=$homePageContentBlocks['gallery_image_7']?>" class="mx-auto d-block" style="max-height: 35vw;" alt="Red Leaves on tree. ">
                            <div class="caption"><p><?= $homePageContentBlocks['gallery_caption_7'] ?></p> </div>
                        </div>
                        <div class="carousel-item" data-slide-number="7" data-toggle="lightbox" data-gallery="gallery">
                            <img src="img\gallery\<?=$homePageContentBlocks['gallery_image_8']?>" class="mx-auto d-block" style="max-height: 35vw;" alt="Image of green leaves">
                            <div class="caption"><p><?= $homePageContentBlocks['gallery_caption_8'] ?></p> </div>
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
<section class="page-section bg-gradient" id="contact">

    <?= $this->Form->create($enquiry, ['url' => '#contact']) ?>
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase-headers"><?= $homePageContentBlocks['contact_header'] ?></h2>
            <h3 class="section-subheading"> <?= $homePageContentBlocks['contact_description'] ?>
            <br> <?= $homePageContentBlocks['contact_email'] ?>
            <br> <?= $homePageContentBlocks['contact_phone'] ?>
            <br> <?= $homePageContentBlocks['contact_social'] ?> </h3>
        </div>

        <!-- * * SB Forms Contact Form * *-->

        <!-- This form is pre-integrated with SB Forms.-->

        <form id="contactForm" data-sb-form-api-token="API_TOKEN">

            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Name input-->
<!--                        <input class="form-control" id="name" type="text" placeholder="Your Name *" data-sb-validations="required" />-->
                        <?= $this->Form->control('Name', ['required' => true, 'label' => 'Full Name*']) ?>
                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
<!--                        <input class="form-control" id="email" type="email" placeholder="Your Email *" data-sb-validations="required,email" />-->
                        <?= $this->Form->control('Email', ['required' => true, 'label' => 'Email*']) ?>

                        <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is invalid, please try again.</div>
                    </div>
                    <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <!--                        <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" data-sb-validations="required" />-->
                            <?= $this->Form->control('Phone', ['required' => true, 'label' => 'Phone Number*']) ?>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                    </div>

                    </div>
                    <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- Message input-->

                        <!--                        <textarea class="form-control" id="message" placeholder="Your Message *" data-sb-validations="required"></textarea>-->
                        <?= $this->Form->control('Message', ['required' => true, 'label' => 'Your Message*', 'type'=>'textarea', 'style' => 'height: 28.6rem;']) ?>

                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                    </div>
                    </div>

                </div>

            </div>
            <!-- Submit success message-->
            <!---->
            <!-- This is what your users will see when the form-->
            <!-- has successfully submitted-->
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center text-white mb-3">
                    <div class="fw-bolder">Enquiry submission successful!</div>
                    <br />

                </div>
            </div>
            <!-- Submit error message-->
            <!---->

            <!-- This is what your users will see when there is-->
            <!-- an error submitting the form-->
            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error! Message unable to send, please review form</div></div>
            <!-- Submit Button-->
 <!--           <div class = text-center <a class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">SUBMIT</a> </div>-->
<!--        Bandaid Style fix to stop the button from looking so pre-baked-->
    <?= $this->Form->button(__('SUBMIT'), [
        'style' => 'background-color: #ffc800; width:10%; color: #fff; padding: 2px 20px; border: 2px solid #ffc800; border-radius: 5px; font-size: 20px; cursor: pointer;',
        'href' => '#contact'
    ]) ?>
    </form>



    </div>
    <?= $this->Form->end() ?>
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


<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
        // console.log(document.getElementById("myForm"));


    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }

    var popup = document.getElementById("myForm");
    var closeBtn = document.getElementById("closeBtn");

    closeBtn.addEventListener("click", function() {
        console.log(document.getElementById("myForm"));
        popup.style.display = "none";
    });

</script>

</body>
</html>

