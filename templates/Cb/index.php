<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Cb> $cb
 */
?>
<div class="cb index content">
    <?= $this->Html->link(__('New Cb'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cb') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('hint') ?></th>
                    <th><?= $this->Paginator->sort('content_type') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cb as $cb): ?>
                <tr>
                    <td><?= h($cb->id) ?></td>
                    <td><?= h($cb->hint) ?></td>
                    <td><?= h($cb->content_type) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cb->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cb->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cb->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cb->id)]) ?>
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
