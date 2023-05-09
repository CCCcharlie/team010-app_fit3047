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
                <?php
                echo $this->Form->control('cust_email', ['label' => 'Customer Email']);
                echo $this->Form->control('cust_fname', ['label' => 'First Name']);
                echo $this->Form->control('cust_lname', ['label' => 'Last Name']);
                debug($staff);
                echo $this->Form->control('staff_id', [
                    'label' => 'Staff Member',
                    'options' => $staff->map(function ($staffMember) {
                        $name = $staffMember->staff_fname . ' ' . $staffMember->staff_lname;
                        return ['value' => $staffMember->id, 'text' => $name];
                    })->toArray(),
                ]);
                echo $this->Form->control('service_id', ['options' => $services]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
