<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->cust_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->cust_id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->cust_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Customer'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Customer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="customer view content">
            <h3><?= h($customer->cust_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cust Fname') ?></th>
                    <td><?= h($customer->cust_fname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cust Lname') ?></th>
                    <td><?= h($customer->cust_lname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cust Email') ?></th>
                    <td><?= h($customer->cust_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cust Password') ?></th>
                    <td><?= h($customer->cust_password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cust Id') ?></th>
                    <td><?= $this->Number->format($customer->cust_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cust Phone') ?></th>
                    <td><?= $this->Number->format($customer->cust_phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cust Startdate') ?></th>
                    <td><?= h($customer->cust_startdate) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
