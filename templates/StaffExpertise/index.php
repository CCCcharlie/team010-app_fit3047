<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\StaffExpertise> $staffExpertise
 */
?>
<div class="staffExpertise index content">
    <?= $this->Html->link(__('New Staff Expertise'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Staff Expertise') ?></h3>
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
                <?php foreach ($staffExpertise as $staffExpertise): ?>
                <tr>
                    <td><?= $this->Number->format($staffExpertise->staff_exp_id) ?></td>
                    <td><?= $staffExpertise->has('staff') ? $this->Html->link($staffExpertise->staff->staff_id, ['controller' => 'Staff', 'action' => 'view', $staffExpertise->staff->staff_id]) : '' ?></td>
                    <td><?= h($staffExpertise->expertise_title) ?></td>
                    <td><?= h($staffExpertise->staffexpert_date_completed) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $staffExpertise->staff_exp_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $staffExpertise->staff_exp_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $staffExpertise->staff_exp_id], ['confirm' => __('Are you sure you want to delete # {0}?', $staffExpertise->staff_exp_id)]) ?>
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
