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
        function formatDate(date) {
            var year = date.getFullYear();
            var month = (date.getMonth() + 1).toString().padStart(2, '0');
            var day = date.getDate().toString().padStart(2, '0');
            var hours = date.getHours().toString().padStart(2, '0');
            var minutes = date.getMinutes().toString().padStart(2, '0');
            return `${year}-${month}-${day}T${hours}:${minutes}`;
        }

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var dialog;

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                businessHours: {
                    daysOfWeek: [1, 2, 3, 4, 5], // Monday - Friday
                    startTime: '09:00', // 9am
                    endTime: '17:00' // 5pm
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
                ],
                eventClick: function(info) {
                    var dialog = document.createElement('div');
                    dialog.classList.add('dialog');
                    dialog.style.position = 'absolute';
                    dialog.style.top = info.jsEvent.clientY + 'px';
                    dialog.style.left = info.jsEvent.clientX + 'px';
                    dialog.style.background = 'white';
                    dialog.style.padding = '10px';
                    dialog.style.border = '1px solid black';
                    document.body.appendChild(dialog);

                    var dialogTitle = document.createElement('h2');
                    dialogTitle.textContent = 'Edit/Delete Event';
                    dialog.appendChild(dialogTitle);

                    // Add exit button
                    var exitButton = document.createElement('button');
                    exitButton.setAttribute('type', 'button');
                    exitButton.textContent = 'X';
                    exitButton.style.float = 'right';
                    exitButton.addEventListener('click', function() {
                        dialog.remove();
                    });
                    dialogTitle.appendChild(exitButton);

                    var form = document.createElement('form');
                    dialog.appendChild(form);

                    var titleLabel = document.createElement('label');
                    titleLabel.textContent = 'Event Title*:';
                    form.appendChild(titleLabel);

                    var titleInput = document.createElement('input');
                    titleInput.setAttribute('type', 'text');
                    titleInput.setAttribute('id', 'eventTitle');
                    titleInput.setAttribute('name', 'eventTitle');
                    titleInput.setAttribute('value', info.event.title);
                    form.appendChild(titleInput);

                    var startLabel = document.createElement('label');
                    startLabel.textContent = 'Event Start*:';
                    form.appendChild(startLabel);

                    var startInput = document.createElement('input');
                    startInput.setAttribute('type', 'datetime-local');
                    startInput.setAttribute('id', 'eventStart');
                    startInput.setAttribute('name', 'eventStart');
                    startInput.value = formatDate(info.event.start);

                    form.appendChild(startInput);

                    var endLabel = document.createElement('label');
                    endLabel.textContent = 'Event End*:';
                    form.appendChild(endLabel);

                    var endInput = document.createElement('input');
                    endInput.setAttribute('type', 'datetime-local');
                    endInput.setAttribute('id', 'eventEnd');
                    endInput.setAttribute('name', 'eventEnd');
                    endInput.value = formatDate(info.event.end);
                    form.appendChild(endInput);

                    var urlLabel = document.createElement('label');
                    urlLabel.textContent = 'Event URL:';
                    form.appendChild(urlLabel);

                    var urlInput = document.createElement('input');
                    urlInput.setAttribute('type', 'url');
                    urlInput.setAttribute('id', 'eventUrl');
                    urlInput.setAttribute('name', 'eventUrl');
                    urlInput.setAttribute('value', info.event.url || '');
                    form.appendChild(urlInput);

                    var editButton = document.createElement('button');
                    editButton.setAttribute('type', 'button');
                    editButton.textContent = 'Edit Event';
                    form.appendChild(editButton);

                    var deleteButton = document.createElement('button');
                    deleteButton.setAttribute('type', 'button');
                    deleteButton.textContent = 'Delete Event';
                    form.appendChild(deleteButton);

                    editButton.addEventListener('click', function() {
                        var title = titleInput.value;
                        var start = new Date(startInput.value);
                        var end = new Date(endInput.value);
                        var url = urlInput.value;
                        info.event.setProp('title', title);
                        info.event.setStart(start);
                        info.event.setEnd(end);
                        info.event.setProp('url', url);
                        dialog.remove();
                    });

                    deleteButton.addEventListener('click', function() {
                        info.event.remove();
                        dialog.remove();
                    });


                },
                dateClick: function(info) {
                    // removes any existing dialog boxes
                    if (dialog) {
                        dialog.remove();
                    }


                    // create a new dialog box
                    dialog = document.createElement('div');
                    dialog.classList.add('dialog');
                    dialog.innerHTML = `
        <p>Select an action for the date/time: ${info.dateStr}</p>
        <button id="add-event">Add Event</button>
      `;
                    dialog.style.position = 'absolute';
                    dialog.style.top = info.jsEvent.clientY + 'px';
                    dialog.style.left = info.jsEvent.clientX + 'px';
                    dialog.style.background = 'white';
                    dialog.style.padding = '10px';
                    dialog.style.border = '1px solid black';
                    document.body.appendChild(dialog);

                    // attach event listeners to the dialog buttons
                    var addButton = dialog.querySelector('#add-event');
                    addButton.addEventListener('click', function () {
                        // handle add event logic here
                        var form = document.createElement('form');
                        form.innerHTML = `
    <label for="eventTitle">Event Title*:</label>
    <input type="text" id="eventTitle" name="eventTitle"><br>
    <label for="eventStart">Event Start*:</label>
    <input type="datetime-local" id="eventStart" name="eventStart" value="${info.dateStr}T12:00"><br>
    <label for="eventEnd">Event End*:</label>
    <input type="datetime-local" id="eventEnd" name="eventEnd" value="${info.dateStr}T13:00"><br>
    <label for="eventUrl">Event URL:</label>
    <input type="url" id="eventUrl" name="eventUrl"><br>
    <button type="submit">Add Event</button>
  `;
                        form.addEventListener('submit', function(event) {
                            event.preventDefault();
                            var eventTitle = document.getElementById('eventTitle').value;
                            var eventStart = document.getElementById('eventStart').value;
                            var eventEnd = document.getElementById('eventEnd').value;
                            var eventUrl = document.getElementById('eventUrl').value;
                            var newEvent = {
                                title: eventTitle,
                                start: eventStart,
                                end: eventEnd,
                                url: eventUrl
                            };
                            calendar.addEvent(newEvent);
                            dialog.remove();
                        });
                        dialog.childNodes.forEach(function(child) {
                            dialog.removeChild(child);
                        });
                        dialog.appendChild(form);
                    });
                }
            });

            // add click event listener to document to close dialog box on outside click
            document.addEventListener('click', function(e) {
                if (dialog && !dialog.contains(e.target)) {
                    dialog.remove();
                }
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
