<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Expertise> $expertise
 */
?>
<div class="expertise index content">
    <?= $this->Html->link(__('New Expertise'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Expertise') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('expertise_title') ?></th>
                    <th><?= $this->Paginator->sort('expertise_desc') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($expertise as $expertise): ?>
                <tr>
                    <td><?= h($expertise->expertise_title) ?></td>
                    <td><?= h($expertise->expertise_desc) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $expertise->expertise_title]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $expertise->expertise_title]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $expertise->expertise_title], ['confirm' => __('Are you sure you want to delete # {0}?', $expertise->expertise_title)]) ?>
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
