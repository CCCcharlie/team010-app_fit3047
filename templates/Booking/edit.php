<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 * @var string[]|\Cake\Collection\CollectionInterface $staff
 * @var string[]|\Cake\Collection\CollectionInterface $services
 */
?>
<div class="row">
    <!--        datepicker-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_green.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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
                    echo $this->Form->control('eventstart', ['label' => 'Starting date & time','id'=>'datepicker']);
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

    <script>

        //disable time period
        var disabledTimeSlots =<?=$toJson?>,
            disabledTimes = [];

        // Convert string to array and create objects with 'from' and 'to' properties
        disabledTimeSlots.forEach(function(timeSlot) {
            disabledTimes.push({
                from: timeSlot,
                to: timeSlot
            });
        });

        var datepicker = flatpickr("#datepicker", {
            enableTime: true, // enable time picker
            dateFormat: "Y-m-d H:i", // set date and time format
            minDate: "today", // set minimum date to today
            maxDate: new Date().fp_incr(30), // set maximum date to 30 days from today
            minTime: "9:00",
            maxTime: "22:00",//timepicker


        });


    </script>

</div>
