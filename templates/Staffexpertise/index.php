<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Staffexpertise> $staffexpertise
 */
?>
<div class="staffexpertise index content">
    <?= $this->Html->link(__('New Staffexpertise'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Staffexpertise') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('staff_exp_id') ?></th>
                    <th><?= $this->Paginator->sort('staff_id') ?></th>
                    <th><?= $this->Paginator->sort('expertise_title') ?></th>
                    <th><?= $this->Paginator->sort('staffexpert_date_completed') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($staffexpertise as $staffexpertise): ?>
                <tr>
                    <td><?= $this->Number->format($staffexpertise->staff_exp_id) ?></td>
                    <td><?= $staffexpertise->has('staff') ? $this->Html->link($staffexpertise->staff->staff_id, ['controller' => 'Staff', 'action' => 'view', $staffexpertise->staff->staff_id]) : '' ?></td>
                    <td><?= h($staffexpertise->expertise_title) ?></td>
                    <td><?= h($staffexpertise->staffexpert_date_completed) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $staffexpertise->staff_exp_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $staffexpertise->staff_exp_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $staffexpertise->staff_exp_id], ['confirm' => __('Are you sure you want to delete # {0}?', $staffexpertise->staff_exp_id)]) ?>
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
