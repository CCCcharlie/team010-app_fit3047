<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContentBlock $contentBlock
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Content Block'), ['action' => 'edit', $contentBlock->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Content Block'), ['action' => 'delete', $contentBlock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contentBlock->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Content Blocks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Content Block'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="contentBlocks view content">
            <h3><?= h($contentBlock->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Hint') ?></th>
                    <td><?= h($contentBlock->hint) ?></td>
                </tr>
                <tr>
                    <th><?= __('Content Type') ?></th>
                    <td><?= h($contentBlock->content_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Content Value') ?></th>
                    <td><?= h($contentBlock->content_value) ?></td>
                </tr>
                <tr>
                    <th><?= __('Previous Value') ?></th>
                    <td><?= h($contentBlock->previous_value) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($contentBlock->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
