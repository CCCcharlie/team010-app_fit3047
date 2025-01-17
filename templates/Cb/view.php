<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cb $cb
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Change this content'), ['action' => 'edit', $cb->id], ['class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Form->postLink(__('Delete Cb'), ['action' => 'delete', $cb->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cb->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Return to List view'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Html->link(__('New Cb'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cb view content">
            <h3><?= h($cb->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($cb->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Hint') ?></th>
                    <td><?= h($cb->hint) ?></td>
                </tr>
                <tr>
                    <th><?= __('Content Type') ?></th>
                    <td><?= h($cb->content_type) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Content Value') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($cb->content_value)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Previous Value') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($cb->previous_value)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
