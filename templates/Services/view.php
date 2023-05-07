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
        <a href="<?= $this->Url->build('/') ?>"> <?= $this->Html->image('holistichealinglogo.png', ['alt' => 'Holistic healing logo']); ?>
            <a href="<?= $this->Url->build('/') ?>">Holistic<span> Healings</a>
    </div>
</nav>
<main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>


    <div class="row">
        <aside class="column">
            <div class="side-nav">
    <!--            <h4 class="heading">--><?php //= __('Actions') ?><!--</h4>-->
    <!--            --><?php //= $this->Html->link(__('Edit Service'), ['action' => 'edit', $service->service_id], ['class' => 'side-nav-item']) ?>
    <!--            --><?php //= $this->Form->postLink(__('Delete Service'), ['action' => 'delete', $service->service_id], ['confirm' => __('Are you sure you want to delete # {0}?', $service->service_id), 'class' => 'side-nav-item']) ?>
    <!--            --><?php //= $this->Html->link(__('List Services'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
    <!--            --><?php //= $this->Html->link(__('New Service'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column-responsive column-80">
            <div class="services view content">
                <a class="btn float-right" href="<?= $this->Url->build('/services/admindex') ?>">Return to services</a>
                <h3><?= h($service->service_id) ?></h3>
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
                        <th><?= __('Image: ') ?></th>
                        <td><?= @$this->Html->image($service->image_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Service Price') ?></th>
                        <td><?= $this->Number->format($service->service_price)." $" ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Service Duration') ?></th>
                        <td><?= h($service->service_duration). " Minutes" ?></td>
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
