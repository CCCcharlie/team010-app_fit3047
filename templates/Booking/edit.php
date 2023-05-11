<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 * @var string[]|\Cake\Collection\CollectionInterface $staff
 * @var string[]|\Cake\Collection\CollectionInterface $services
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $booking->booking_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $booking->booking_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Booking'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="booking form content">
            <?= $this->Form->create($booking) ?>
            <fieldset>
                <legend><?= __('Edit Booking') ?></legend>
                <?php
                    echo $this->Form->control('eventstart', ['label' => 'Starting date & time']);
                    echo $this->Form->control('staff_id', ['options' => $staff, 'label' => 'Staff Name']);
                    echo $this->Form->control('service_id', ['options' => $services]);
                    echo $this->Form->control('cust_fname', ['label' => 'Customer First Name'] );
                    echo $this->Form->control('cust_lname', ['label' => 'Customer Last Name']);
                    echo $this->Form->control('cust_phone', ['label' => 'Customer Phone']);
                    echo $this->Form->control('cust_email', ['label' => 'Customer Email']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
