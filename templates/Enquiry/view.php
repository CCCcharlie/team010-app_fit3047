<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Enquiry'), ['action' => 'edit', $enquiry->enquiry_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Enquiry'), ['action' => 'delete', $enquiry->enquiry_id], ['confirm' => __('Are you sure you want to delete # {0}?', $enquiry->enquiry_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Enquiry'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Enquiry'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="enquiry view content">
            <h3><?= h($enquiry->enquiry_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($enquiry->Email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Message') ?></th>
                    <td><?= h($enquiry->Message) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= $this->Number->format($enquiry->Phone, ['Phone' => 'AU','format' => 'international'])?></td>
                </tr>
                <tr>
                    <th><?= __('Enquiry Id') ?></th>
                    <td><?= $this->Number->format($enquiry->enquiry_id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($enquiry->Name)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
