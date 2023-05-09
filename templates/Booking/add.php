<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 * @var \Cake\Collection\CollectionInterface|string[] $customer
 * @var \Cake\Collection\CollectionInterface|string[] $staff
 * @var \Cake\Collection\CollectionInterface|string[] $services
 */
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 * @var \Cake\Collection\CollectionInterface|string[] $staff
 * @var \Cake\Collection\CollectionInterface|string[] $services
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Booking'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="booking form content">
            <?= $this->Form->create($booking) ?>
            <fieldset>
                <legend><?= __('Add Booking') ?></legend>

                <!-- Customer Information -->
                <h4><?= __('Customer Information') ?></h4>
                <?php
                echo $this->Form->control('Customer.cust_fname', ['label' => 'Customer First Name']);
                echo $this->Form->control('Customer.cust_lname', ['label' => 'Customer Last Name']);
                echo $this->Form->control('Customer.cust_phone', ['label' => 'Customer Phone No']);
                echo $this->Form->control('Customer.cust_email', ['label' => 'Customer E-mail']);
                ?>

                <!-- Booking Information -->
                <h4><?= __('Booking Information') ?></h4>
                <?php
                echo $this->Form->control('staff_id', ['options' => $staff]);
                echo $this->Form->control('service_id', ['options' => $services]);
                echo $this->Form->control('eventstart');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
