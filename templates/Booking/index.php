<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Booking> $booking
 */
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8' />
    <script src='js/index.global.js' src='fcpackages/daygrid/index.global.js'></script>

    <nav class="top-nav">
        <div class="top-nav-title">
            <!--  In order to show the image from webroot/img/cake.icon.png,
            we must use $this->html->image instead of <img src=""> in this case for it to work -->

            <!-- <?php /*= "$this->Url->build('/')" */?> <- this line of code is for redirection, "/" is the root path-->
            <a href="<?= $this->Url->build('/cb') ?>"> <?= $this->Html->image('holistichealinglogofull.png', ['alt' => 'Holistic healing logo', 'class' => 'logo']); ?>
                <a href="<?= $this->Url->build('/cb') ?>"> Holistic Healings - Staff Page<span></a>
        </div>
        <div class="top-nav-links">
            <!--  target acts as where I want to display the href, _self is the default so it will update itself
             If _blank then it will appear as a new page when clicked, there are others like _parent and _top it does not seem
             to do anything substantial  more info here: https://www.w3schools.com/tags/att_a_target.asp -->

            <a target="_self" href="<?= $this->Url->build('/cb') ?>">Site Editor</a>
            <a target="_self" href="<?= $this->Url->build('/enquiry') ?>">Customer Enquiry</a>
            <a target="_self" href="<?= $this->Url->build('/services/admindex') ?>">Service List</a>
            <a target="_self" href="<?= $this->Url->build('/staff') ?>">Staff Overview</a>
            <a target="_self" href="<?= $this->Url->build('/staff/logout') ?>">Logout</a>

            <!-- <a target="_self" rel="next" href="<?php /*= $this->Url->build('/staff') */?>>staffexpertise</a>  hide this for now because it breaks-->
        </div>
    </nav>

    <h2>BOOKINGS VIEWER</h2>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                    {
                        title: 'Healing Sesson - D-Lewis',
                        start: '2023-05-12T12:00:00'
                    },
                    {
                        title: 'Healing Session - JBruh',
                        start: '2023-05-12T14:30:00'
                    },
                    {
                        title: 'Staff Meeting',
                        start: '2023-05-13T07:00:00'
                    },
                    {
                        title: 'Click for example hyperlink',
                        url: 'http://google.com/',
                        start: '2023-05-28'
                    }
                ]
            });

            calendar.render();
        });

    </script>
</head>
<body>
<div id='calendar'></div>
</body>
</html>

<!---->
<!--<div class="booking index content">-->
<!--    --><?php //= $this->Html->link(__('New Booking'), ['action' => 'add'], ['class' => 'button float-right']) ?>
<!--    <h3>--><?php //= __('Booking') ?><!--</h3>-->
<!--    <div class="table-responsive">-->
<!--        <table>-->
<!--            <thead>-->
<!--                <tr>-->
<!--                    <th>--><?php //= $this->Paginator->sort('booking_id') ?><!--</th>-->
<!--                    <th>--><?php //= $this->Paginator->sort('booking_date') ?><!--</th>-->
<!--                    <th>--><?php //= $this->Paginator->sort('booking_time') ?><!--</th>-->
<!--                    <th>--><?php //= $this->Paginator->sort('cust_id') ?><!--</th>-->
<!--                    <th>--><?php //= $this->Paginator->sort('staff_id') ?><!--</th>-->
<!--                    <th>--><?php //= $this->Paginator->sort('service_id') ?><!--</th>-->
<!--                    <th class="actions">--><?php //= __('Actions') ?><!--</th>-->
<!--                </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--                --><?php //foreach ($booking as $booking): ?>
<!--                <tr>-->
<!--                    <td>--><?php //= $this->Number->format($booking->booking_id) ?><!--</td>-->
<!--                    <td>--><?php //= h($booking->booking_date) ?><!--</td>-->
<!--                    <td>--><?php //= h($booking->booking_time) ?><!--</td>-->
<!--                    <td>--><?php //= $booking->has('customer') ? $this->Html->link($booking->customer->cust_id, ['controller' => 'Customer', 'action' => 'view', $booking->customer->cust_id]) : '' ?><!--</td>-->
<!--                    <td>--><?php //= $booking->has('staff') ? $this->Html->link($booking->staff->staff_id, ['controller' => 'Staff', 'action' => 'view', $booking->staff->staff_id]) : '' ?><!--</td>-->
<!--                    <td>--><?php //= $booking->has('service') ? $this->Html->link($booking->service->service_id, ['controller' => 'Services', 'action' => 'view', $booking->service->service_id]) : '' ?><!--</td>-->
<!--                    <td class="actions">-->
<!--                        --><?php //= $this->Html->link(__('View'), ['action' => 'view', $booking->booking_id]) ?>
<!--                        --><?php //= $this->Html->link(__('Edit'), ['action' => 'edit', $booking->booking_id]) ?>
<!--                        --><?php //= $this->Form->postLink(__('Delete'), ['action' => 'delete', $booking->booking_id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->booking_id)]) ?>
<!--                    </td>-->
<!--                </tr>-->
<!--                --><?php //endforeach; ?>
<!--            </tbody>-->
<!--        </table>-->
<!--    </div>-->
<!--    <div class="paginator">-->
<!--        <ul class="pagination">-->
<!--            --><?php //= $this->Paginator->first('<< ' . __('first')) ?>
<!--            --><?php //= $this->Paginator->prev('< ' . __('previous')) ?>
<!--            --><?php //= $this->Paginator->numbers() ?>
<!--            --><?php //= $this->Paginator->next(__('next') . ' >') ?>
<!--            --><?php //= $this->Paginator->last(__('last') . ' >>') ?>
<!--        </ul>-->
<!--        <p>--><?php //= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?><!--</p>-->
<!--    </div>-->
<!--</div>-->
