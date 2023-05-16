<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 */
?>

<nav class="top-nav">
    <div class="top-nav-title">
        <!--  In order to show the image from webroot/img/cake.icon.png,
        we must use $this->html->image instead of <img src=""> in this case for it to work -->

        <!-- <?php /*= "$this->Url->build('/')" */?> <- this line of code is for redirection, "/" is the root path-->
        <a href="<?= $this->Url->build('/cb') ?>"> <?= $this->Html->image('holistichealinglogofull.png', ['alt' => 'Holistic healing logo', 'class' => 'logo']); ?>
            <a href="<?= $this->Url->build('/cb') ?>"> Holistic Healings<span></a>
    </div>
    <div class="top-nav-links">
        <!--  target acts as where I want to display the href, _self is the default so it will update itself
         If _blank then it will appear as a new page when clicked, there are others like _parent and _top it does not seem
         to do anything substantial  more info here: https://www.w3schools.com/tags/att_a_target.asp -->

        <a target="_self" href="<?= $this->Url->build('/') ?>">To Home Page!</a>

    </div>
</nav>

<div class="collumn">
    <div class="column-responsive column-80">
        <div class="booking view content" style="margin-top: 20px; margin-right: 20%; margin-left: 20%; margin-bottom: 20%;">
            <h1>Thank you!</h1>

            <p>Store the link below somewhere safe to re-access this page</p>
            <p><?= $this->Html->link($this->Url->build(['controller' => 'booking', 'action' => 'confirm', $booking->booking_id], ['fullBase' => true]), ['controller' => 'booking', 'action' => 'confirm', $booking->booking_id], ['fullBase' => true, 'style' => 'word-break:break-all']) ?></p>
            <br>
            <p>Please <b> note down your booking ID </b> below for future reference, we will get back to you shortly</p>
            <br>

            <table>
                <!--                <tr>-->
                <!--                    <th>--><?php //= __('Customer') ?><!--</th>-->
                <!--                    <td>--><?php //= $booking->has('customer') ? $this->Html->link($booking->customer->cust_id, ['controller' => 'Customer', 'action' => 'view', $booking->customer->cust_id]) : '' ?><!--</td>-->
                <!--                </tr>-->
                <!--                <tr>-->
                <!--                    <th>--><?php //= __('Staff') ?><!--</th>-->
                <!--                    <td>--><?php //= $booking->has('staff') ? $this->Html->link($booking->staff->staff_id, ['controller' => 'Staff', 'action' => 'view', $booking->staff->staff_id]) : '' ?><!--</td>-->
                <!--                </tr>-->
                <!--                <tr>-->
                <!--                    <th>--><?php //= __('Service') ?><!--</th>-->
                <!--                    <td>--><?php //= $booking->has('service') ? $this->Html->link($booking->service->service_id, ['controller' => 'Services', 'action' => 'view', $booking->service->service_id]) : '' ?><!--</td>-->
                <!--                </tr>-->
                <!--                <tr>-->
                <!--                    <th>--><?php //= __('Booking Id') ?><!--</th>-->
                <!--                    <td>--><?php //= $this->Number->format($booking->booking_id) ?><!--</td>-->
                <!--                </tr>-->
                <tr>
                    <th><?= __('Booking ID') ?></th>
                    <td><?= h($booking->booking_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($booking->cust_fname . ' ' . $booking->cust_lname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($booking->cust_phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($booking->cust_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Staff Name:') ?></th>
                    <td><?= h($booking->staff->staff_fname . ' ' . $booking->staff->staff_lname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Booking start:') ?></th>
                    <td><?= h(date('j/n/y g:i A', $booking->eventstart->toUnixString())) ?></td>
                </tr>
                <tr>
                    <th><?= __('Booking Duration:') ?></th>
                    <td><?= h($booking->service->service_duration . ' minutes') ?></td>
                </tr>
                <tr>
                    <th><?= __('Booking End Time:') ?></th>
                    <td><?= h(date('n/j/y, g:i A', strtotime($booking->eventstart . ' +' . $booking->service->service_duration . ' minutes'))) ?></td>
                </tr>
            </table>
            <br>
            <?php echo $this->Form->postButton('Make another booking', ['type' => 'button', 'controller' => 'Booking', 'action' => 'add']); ?>
        </div>
    </div>
</div>
