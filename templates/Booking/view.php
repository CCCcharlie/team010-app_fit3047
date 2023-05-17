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
        <a href="<?= $this->Url->build('/staff') ?>"> <?= $this->Html->image('holistichealinglogofull.png', ['alt' => 'Holistic healing logo', 'class' => 'logo']); ?>
            <a href="<?= $this->Url->build('/staff') ?>"> Holistic Healings - Staff Page<span></a>
    </div>



    <div class="top-nav-links">
        <!--  target acts as where I want to display the href, _self is the default so it will update itself
         If _blank then it will appear as a new page when clicked, there are others like _parent and _top it does not seem
         to do anything substantial  more info here: https://www.w3schools.com/tags/att_a_target.asp -->


        <!--        https://www.w3schools.com/howto/howto_css_dropdown.asp-->
        <a target="_self" href="<?= $this->Url->build('/') ?>">Home Page</a> |
        <a target="_self" href="<?= $this->Url->build('/cb') ?>">Site Editor</a> |
        <div class="dropdown ">
            <button class="dropbtn"> ☰ <i class="arrow down"></i>

            </button>
            <div class="dropdown-content">

                <a target="_self"  href="<?= $this->Url->build('/enquiry') ?>">Customer Enquiries</a>
                <a target="_self"  href="<?= $this->Url->build('/services/admindex') ?>">Service List</a>
                <a target="_self"  href="<?= $this->Url->build('/booking') ?>">Bookings</a>
                <a target="_self"  href="<?= $this->Url->build('/staff') ?>">Staff Overview</a>
            </div>
        </div>

        <br>


        <!-- To obtain the identity, use $identity = $this->request->getAttribute('authentication')->getIdentity(); to find the currently logged in entity
to get the name or any value in the staff table, use the get and then the name of the attribute $identity->get('staff_fname')-->
        <?php $identity = $this->request->getAttribute('authentication')->getIdentity();
        //debug($identity->get('staff_fname'));
        //exit();
        ?>
        > Hi <?php echo $identity->get('staff_fname')?> <  <?= "|" ?>
        <a target="_self" href="<?= $this->Url->build('/staff/logout') ?>">Logout</a>

        <!-- <a target="_self" rel="next" href="<?php /*= $this->Url->build('/staff') */?>>staffexpertise</a>  hide this for now because it breaks-->
    </div>




</nav>


<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>

            <?= $this->Html->link(__('Return to Booking page'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Edit Associated Booking'), ['action' => 'edit', $booking->booking_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Associated Booking'), ['action' => 'delete', $booking->booking_id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->booking_id), 'class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Html->link(__('New Booking'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="booking view content">
            <h1><?= h($booking->cust_fname . ' ' . $booking->cust_lname) ?></h1>
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
        </div>
    </div>
</div>
