<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Service> $services
 */

$cakeDescription = 'Holistic Healing - All Services';
$this->disableAutoLayout();
error_reporting(E_ALL ^ E_WARNING);
error_reporting(E_ALL & ~E_USER_DEPRECATED);
error_reporting(0);
/* TODO: REMOVE THIS AND FIX ERRORS IF POSSIBLE */
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

<nav class="top-nav">
    <div class="top-nav-title">
        <!--  In order to show the image from webroot/img/cake.icon.png,
        we must use $this->html->image instead of <img src=""> in this case for it to work -->

        <!-- <?php /*= "$this->Url->build('/')" */?> <- this line of code is for redirection, "/" is the root path-->
        <a href="<?= $this->Url->build('/staff') ?>"> <?= $this->Html->image('holistichealinglogofull.png', ['alt' => 'Holistic healing logo', 'class' => 'logo']); ?>
            <a href="<?= $this->Url->build('/staff') ?>"> Holistic Healings - Staff Page<span></a>
    </div>
    <div class="top-nav-links">
        <!--  target acts as where I want to display the href, _self is the default so it will update itself
         If _blank then it will appear as a new page when clicked, there are others like _parent and _top it does not seem
         to do anything substantial  more info here: https://www.w3schools.com/tags/att_a_target.asp -->

        <a target="_self" href="<?= $this->Url->build('/cb') ?>">Site Editor</a>
        <a target="_self" href="<?= $this->Url->build('/enquiry') ?>">Customer Enquiry</a>
        <a target="_self" href="<?= $this->Url->build('/services/admindex') ?>">Service List</a>
        <br>
        <a target="_self" href="<?= $this->Url->build('/staff') ?>">Staff Overview</a>
        <a target="_self" href="<?= $this->Url->build('/') ?>">Home Page</a>
        <?= "|" ?>
        <!-- To obtain the identity, use $identity = $this->request->getAttribute('authentication')->getIdentity(); to find the currently logged in entity
to get the name or any value in the staff table, use the get and then the name of the attribute $identity->get('staff_fname')-->
        <?php $identity = $this->request->getAttribute('authentication')->getIdentity();
        //debug($identity->get('staff_fname'));
        //exit();
        ?>
        <a target ="_self" title="Hi there">Hi <?php echo $identity->get('staff_fname')?> :)</a> <?= "|" ?>
        <a target="_self" href="<?= $this->Url->build('/staff/logout') ?>">Logout</a>

        <!-- <a target="_self" rel="next" href="<?php /*= $this->Url->build('/staff') */?>>staffexpertise</a>  hide this for now because it breaks-->
    </div>
</nav>
<body>
<main class="main">
    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>


<main class="main">
    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>

    <div class="services index content">
        <div>
            <h1><?= __(' All Services - Admin View') ?></h1>
        </div>

        <?= $this->Html->link(__('Add a New Service'), ['action' => 'add'], ['class' => 'button']) ?>
        <?= $this->Html->link(__('What customers see'), ['action' => 'index'], ['class' =>  'button']) ?>

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
                                <?php $viewURL = "/services/admindex" ?>

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
                                        Cost: $<?= h($service->service_price) ?> | <br>
                                        Shown in home page? <?= $service->home ? "✅" : "❌" ?>


                                    <br><br><p style="font-size:150%; color:darkred">Admin Controls:  </p>
                                    <p style="font-size:150%">
                                        <?php
                                        //if true means it that it is shown in home page, so show as hide in home page
                                        if ($service->home) {
                                            echo $this->Form->postLink(__('Hide in home page'), ['action' => 'update_home', $service->service_id], ['confirm' => __("Are you sure you want to show this service in the home page? \nService: {0} ", $service->service_name)]);
                                        } else {
                                            echo $this->Form->postLink(__('Show in home page'), ['action' => 'update_home', $service->service_id], ['confirm' => __("Are you sure you want to hide this service from home page? \nFrom: {0} {1} ", $service->service_name)]);
                                        }
                                        echo "<br>";
                                        echo "<hr>";
                                        ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $service->service_id], ['confirm' => __('Are you sure you want to delete this service: {0}? Changes are irreverisble.', $service->service_name)]) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $service->service_id]) ?></p>

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
