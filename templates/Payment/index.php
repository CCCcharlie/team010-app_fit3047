<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Payment> $payment
 */
?>
<div class="payment index content">
    <?= $this->Html->link(__('New Payment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Payment') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('payment_no') ?></th>
                    <th><?= $this->Paginator->sort('booking_id') ?></th>
                    <th><?= $this->Paginator->sort('payment_amount') ?></th>
                    <th><?= $this->Paginator->sort('payment_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payment as $payment): ?>
                <tr>
                    <td><?= $this->Number->format($payment->payment_no) ?></td>
                    <td><?= $payment->has('booking') ? $this->Html->link($payment->booking->booking_id, ['controller' => 'Booking', 'action' => 'view', $payment->booking->booking_id]) : '' ?></td>
                    <td><?= $this->Number->format($payment->payment_amount) ?></td>
                    <td><?= h($payment->payment_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $payment->payment_no]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payment->payment_no]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payment->payment_no], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->payment_no)]) ?>
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
