<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Service> $services
 */

$this->disableAutoLayout();
$cakeDescription = 'Holistic Healing - All Services';

?>


<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
<nav class="top-nav">
    <div class="top-nav-title">
        <!--  In order to show the image from webroot/img/cake.icon.png,
        we must use $this->html->image instead of <img src=""> in this case for it to work -->

        <!-- <?php /*= "$this->Url->build('/')" */?> <- this line of code is for redirection, "/" is the root path-->
        <a href="<?= $this->Url->build('/') ?>"> <?= $this->Html->image('holistichealinglogofull.png', ['alt' => 'Holistic healing logo', 'class' => 'logo']); ?>
            <a href="<?= $this->Url->build('/') ?>">Holistic<span> Healings</a>

    </div>
    <div class="top-nav-links">
        <a target="_self" href="<?= $this->Url->build('/booking/add') ?>">Make a Bookings</a>
        <a target="_self" href="<?= $this->Url->build('/') ?>">To Home Page!</a>
    </div>
    </div>
</nav>
<main class="main">
    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>

<div class="services index content">
    <h1> <?php echo ' All Services '?> </h1>
    <?php if ($this->Identity->isLoggedIn()) {
        //postButton is for standalone buttons
        echo $this->Form->postButton('To Services - Admin side', ['type' => 'button', 'controller' => 'Services', 'action' => 'admindex']);
    }
    ?>
<!-- Essentially tells index.php to use bootstrap.css -->
<?= $this->Html->css(['cake','bootstrap'])?>

    <?= $this->Html->script('windowresizer.js') ?>



<div class="content">
    <div class="container">
        <div class="row">
            <!-- align items stretch aligns the item to "--bs-card-height: 350px;"-->
            <!-- LOOP HERE -->
            <?php foreach ($services as $service): ?>
            <div class="col-xs-3 col-sm-4 d-flex align-items-stretch">
                <div class="card">
                    <!-- $viewURL acts as a temporary variable to store the path of each created card so it can redirect
                    when clicked-->
                    <?php $viewURL = "services/view/" . $service->service_id?>

                    <!-- Image section -->
                    <a class="card-img" href="<?= $this->Url->build($viewURL) ?>" style="object-fit: fill">
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
                        <p class="card-subtitle">
                            <?= h($service->service_desc) ?> <br>
                            Duration:  <?= h($service->service_duration) ?> Minutes |
                            Cost: $<?= h($service->service_price) ?> |
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</main>
<footer>
</footer>
</body>
</html>
