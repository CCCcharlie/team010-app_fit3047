<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Service> $services
 */
?>


<div class="services index content">
    <?= $this->Html->link(__('New Service'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <div>
    <h1><?= __('Services') ?></h1>
    </div>

<!-- Essentially tells index.php to use bootstrap.css -->
<?= $this->Html->css('bootstrap.css')?>


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
                    <?php $viewURL = "/services/view/".$service->service_id?>

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
                            <?= h($service->service_desc) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $service->service_id], ['confirm' => __('Are you sure you want to delete service: {0}?', $service->service_name)]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $service->service_id]) ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
