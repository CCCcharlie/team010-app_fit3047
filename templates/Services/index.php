<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Service> $services
 */
?>


<div class="services index content">
    <?= $this->Html->link(__('New Service'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Services') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('service_id') ?></th>
                    <th><?= $this->Paginator->sort('service_name') ?></th>
                    <th><?= $this->Paginator->sort('service_duration') ?></th>
                    <th><?= $this->Paginator->sort('service_desc') ?></th>
                    <th><?= $this->Paginator->sort('service_price') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $service): ?>
                <tr>
                    <td><?= $this->Number->format($service->service_id) ?></td>
                    <td><?= h($service->service_name) ?></td>
                    <td><?= $this->Number->format($service->service_duration)  ?> Minutes </td>
                    <td><?= h($service->service_desc) ?></td>
                    <td><?= $this->Number->format($service->service_price) ?></td>
                    <!-- Use the cakephp this->html->image to display the image.
                     an @ is used to fit in one screen-->
                    <td><?= @$this->Html->image($service->image_name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $service->service_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $service->service_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $service->service_id], ['confirm' => __('Are you sure you want to delete # {0}?', $service->service_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>


<!-- Essentially tells index.php to use bootstrap.css -->
<?= $this->Html->css('bootstrap.css')?>


<div class="content">
    <div class="container">
        <div class="row">
            <!-- align items stretch aligns the item to "--bs-card-height: 350px;"-->
            <!-- LOOP HERE -->
            <?php foreach ($services as $service): ?>
            <div class="col-xs-12 col-sm-4 d-flex align-items-stretch">
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
                        <p>
                            <?= h($service->service_desc) ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
