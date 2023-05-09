<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Customer> $customer
 */
?>
<div class="customer index content">
    <?= $this->Html->link(__('New Customer'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Customer') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('cust_id') ?></th>
                    <th><?= $this->Paginator->sort('cust_fname') ?></th>
                    <th><?= $this->Paginator->sort('cust_lname') ?></th>
                    <th><?= $this->Paginator->sort('cust_phone') ?></th>
                    <th><?= $this->Paginator->sort('cust_email') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customer as $customer): ?>
                <tr>
                    <td><?= $this->Number->format($customer->cust_id) ?></td>
                    <td><?= h($customer->cust_fname) ?></td>
                    <td><?= h($customer->cust_lname) ?></td>
                    <td><?= $this->Number->format($customer->cust_phone) ?></td>
                    <td><?= h($customer->cust_startdate) ?></td>
                    <td><?= h($customer->cust_email) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $customer->cust_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->cust_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->cust_id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->cust_id)]) ?>
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
