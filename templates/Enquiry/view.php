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
            <?= $this->Html->link(__('Edit Enquiry [If you have noticed a mistake].'), ['action' => 'edit', $enquiry->enquiry_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Enquiry [Use me if error enquiry or resolved].'), ['action' => 'delete', $enquiry->enquiry_id], ['confirm' => __('Are you sure you want to delete # {0}?', $enquiry->enquiry_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Return to Enquiry List'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="enquiry view content">
            <h3><?= h($enquiry->enquiry_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Client Name') ?></th>
                    <td><?= h($enquiry->Name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client E-mail') ?></th>
                    <td><?= h($enquiry->Email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client Message') ?></th>
                    <td><?= $this->Text->autoParagraph(h($enquiry->Name)); ?></td>
                </tr>
                <tr>
                    <th><?= __('Client Phone') ?></th>
                    <td><?= h($enquiry->Phone)?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('The Clients Message') ?></strong>
                <blockquote>
                   <?= h($enquiry->Message) ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
