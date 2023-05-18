<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
$this->disableAutoLayout();
$cakeDescription = 'Holistic Healing - Service Showcase View';
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
        <a href="<?= $this->Url->build('/staff') ?>"> <?= $this->Html->image('holistichealinglogofull.png', ['alt' => 'Holistic healing logo', 'class' => 'logo']); ?>
            <a href="<?= $this->Url->build('/staff') ?>"> Holistic Healings - Staff Page<span></a>
    </div>



    <div class="top-nav-links">
        <!--  target acts as where I want to display the href, _self is the default so it will update itself
         If _blank then it will appear as a new page when clicked, there are others like _parent and _top it does not seem
         to do anything substantial  more info here: https://www.w3schools.com/tags/att_a_target.asp -->


        <!--        https://www.w3schools.com/howto/howto_css_dropdown.asp-->
        <a target="_self" href="<?= $this->Url->build('/') ?>">Home Page</a> |
        <a target="_self"  href="<?= $this->Url->build('/booking') ?>">Bookings</a> |
        <div class="dropdown ">
            <button class="dropbtn"> ☰ <i class="arrow down"></i>

            </button>
            <div class="dropdown-content">

                <a target="_self"  href="<?= $this->Url->build('/enquiry') ?>">Customer Enquiries</a>
                <a target="_self"  href="<?= $this->Url->build('/services/admindex') ?>">Service List</a>
                <a target="_self"  href="<?= $this->Url->build('/staff') ?>">Staff Overview</a>
                <a target="_self" href="<?= $this->Url->build('/cb') ?>">Site Editor</a>
            </div>
        </div>

        <br>


        <!-- To obtain the identity, use $identity = $this->request->getAttribute('authentication')->getIdentity(); to find the currently logged in entity
to get the name or any value in the staff table, use the get and then the name of the attribute $identity->get('staff_fname')-->
        <?php $identity = $this->request->getAttribute('authentication')->getIdentity();
        //debug($identity->get('staff_fname'));
        //exit();
        ?>
        > Hi <?php echo $identity->get('staff_fname')?> <  <?= "|" ?>
        <a target="_self" href="<?= $this->Url->build('/staff/logout') ?>">Logout</a>

        <!-- <a target="_self" rel="next" href="<?php /*= $this->Url->build('/staff') */?>>staffexpertise</a>  hide this for now because it breaks-->
    </div>




</nav>

<main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>


    <div class="Collumn">
<!--        <aside class="column">-->
<!--            <div class="side-nav">-->
<!--                <h4 class="heading">--><?php //= __('Actions') ?><!--</h4>-->
<!--                --><?php //= $this->Html->link(__('Edit Service'), ['action' => 'edit', $service->service_id], ['class' => 'side-nav-item']) ?>
<!--                --><?php //= $this->Form->postLink(__('Delete Service'), ['action' => 'delete', $service->service_id], ['confirm' => __('Are you sure you want to delete # {0}?', $service->service_id), 'class' => 'side-nav-item']) ?>
<!--                --><?php //= $this->Html->link(__('List Services'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
<!--                --><?php //= $this->Html->link(__('New Service'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
<!--            </div>-->
<!--        </aside>-->
        <div class="column-responsive column-80">
            <div class="services view content">
                <a class="btn float-right" href="<?= $this->Url->build('/services') ?>">See all services</a>
                <h2><?= h($service->service_name) ?></h2>
                <table>
                    <tr>
                        <th><?= __('Service Name') ?></th>
                        <td><?= h($service->service_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Service Description') ?></th>
                        <td style="word-break: break-all"><?= h($service->service_desc) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Service Price') ?></th>
                        <td><?= $this->Number->format($service->service_price)." $" ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Service Duration') ?></th>
                        <td><?= h($service->service_duration). " Minutes" ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Image: ') ?></th>
                        <td><?= @$this->Html->image($service->image_name) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
        </div>
</main>
<footer>
</footer>
</body>
</html>
