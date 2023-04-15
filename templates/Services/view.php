<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Service'), ['action' => 'edit', $service->service_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Service'), ['action' => 'delete', $service->service_id], ['confirm' => __('Are you sure you want to delete # {0}?', $service->service_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Services'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Service'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="services view content">
            <h3><?= h($service->service_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Service Name') ?></th>
                    <td><?= h($service->service_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Service Desc') ?></th>
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
