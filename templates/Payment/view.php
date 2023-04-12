<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Payment'), ['action' => 'edit', $payment->payment_no], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Payment'), ['action' => 'delete', $payment->payment_no], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->payment_no), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Payment'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Payment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="payment view content">
            <h3><?= h($payment->payment_no) ?></h3>
            <table>
                <tr>
                    <th><?= __('Booking') ?></th>
                    <td><?= $payment->has('booking') ? $this->Html->link($payment->booking->booking_id, ['controller' => 'Booking', 'action' => 'view', $payment->booking->booking_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Payment No') ?></th>
                    <td><?= $this->Number->format($payment->payment_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Payment Amount') ?></th>
                    <td><?= $payment->payment_amount === null ? '' : $this->Number->format($payment->payment_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Payment Date') ?></th>
                    <td><?= h($payment->payment_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
