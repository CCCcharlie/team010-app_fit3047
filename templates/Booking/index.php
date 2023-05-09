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
            <a target="_self" href="<?= $this->Url->build('/booking') ?>">Bookings</a>
            <br>
            <a target="_self" href="<?= $this->Url->build('/staff') ?>">Staff Overview</a>
            <a target="_self" href="<?= $this->Url->build('/') ?>">Home Page</a>
            <?= "|" ?>
            <!-- To obtain the identity, use $identity = $this->request->getAttribute('authentication')->getIdentity(); to find the currently logged in entity
    to get the name or any value in the staff table, use the get and then the name of the attribute $identity->get('staff_fname')-->
            <?php $identity = $this->request->getAttribute('authentication')->getIdentity();
            //debug($identity->get('staff_fname'));
            //exit();
            ?>
            <a target ="_self" title="Hi there">Hi <?php echo $identity->get('staff_fname')?> :)</a> <?= "|" ?>
            <a target="_self" href="<?= $this->Url->build('/staff/logout') ?>">Logout</a>

            <!-- <a target="_self" rel="next" href="<?php /*= $this->Url->build('/staff') */?>>staffexpertise</a>  hide this for now because it breaks-->
        </div>
    </nav>

    <h2>BOOKINGS VIEWER</h2>
    <?= $this->Html->link(__('New Booking'), ['action' => 'add'], ['class' => 'button float-right']) ?> <br><br>

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
                events:  '<?= $this->Url->build(['controller' => 'Booking', 'action' => 'calendar', '_ext' => 'json'])?>',
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
                    titleLabel.textContent = 'Event Title:';
                    titleLabel.setAttribute('for', 'eventTitle');
                    titleLabel.setAttribute('required', '');
                    form.appendChild(titleLabel);

                    var titleInput = document.createElement('input');
                    titleInput.setAttribute('type', 'text');
                    titleInput.setAttribute('id', 'eventTitle');
                    titleInput.setAttribute('name', 'eventTitle');
                    titleInput.setAttribute('value', info.event.title);
                    titleInput.setAttribute('required', ''); // Should make field mandatory, not sure why it doesnt work.
                    form.appendChild(titleInput);

                    var startLabel = document.createElement('label');
                    startLabel.textContent = 'Event Start*:';
                    form.appendChild(startLabel);

                    var startInput = document.createElement('input');
                    startInput.setAttribute('type', 'datetime-local');
                    startInput.setAttribute('id', 'eventStart');
                    startInput.setAttribute('name', 'eventStart');
                    startInput.setAttribute('required', '');
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
                    endInput.setAttribute('required', '');
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

                        // Check if the event falls outside of business hours.
                        if (start.getHours() < 9 || end.getHours() > 17 || start.getDay() === 6 || start.getDay() === 0) {
                            // Display a warning message
                            alert('Warning: This event falls outside of business hours or on a weekend. Are you sure you want to save it?');
                        }

                        $.ajax({
                            url: '/bookings/createOrUpdateBooking',
                            type: 'POST',
                            dataType: 'json',
                            data: {event: event},
                            success: function(response) {
                                dialog.remove();
                                calendar.refetchEvents();
                            },
                            error: function(xhr, status, error) {
                                alert('Error saving event: ' + error);
                            }
                        });

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

// attach event listener to the "Add Event" button
                    var addButton = dialog.querySelector('#add-event');
                    addButton.addEventListener('click', function () {
                        addButton.style.display = 'none';

                        // load the add.php form into the dialog using AJAX
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', 'add.php');
                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                // replace the dialog content with the form HTML
                                dialog.innerHTML = xhr.responseText;

                                // attach event listener to the form submit button
                                var submitButton = dialog.querySelector('button[type="submit"]');
                                submitButton.addEventListener('click', function (event) {
                                    event.preventDefault();

                                    // submit the form using AJAX
                                    var formData = new FormData(dialog.querySelector('form'));
                                    var xhr = new XMLHttpRequest();
                                    xhr.open('POST', 'add.php');
                                    xhr.onload = function() {
                                        if (xhr.status === 200) {
                                            // add the new event to the calendar
                                            var newEvent = JSON.parse(xhr.responseText);
                                            calendar.addEvent(newEvent);
                                            dialog.remove();
                                        } else {
                                            alert('Error adding event');
                                        }
                                    };
                                    xhr.send(formData);
                                });
                            } else {
                                alert('Error loading form');
                            }
                        };
                        xhr.send();
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



<div class="booking index content">
    <h2><?= __('Booking - List View') ?></h2>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('service_name', 'Booked Service') ?></th>
                <th><?= $this->Paginator->sort('eventstart', 'Event Start Time') ?></th>
                <th><?= $this->Paginator->sort('service_duration', 'Booking Duration') ?></th>
                <th><?= $this->Paginator->sort('booking_end_time', 'Event End Time') ?></th>
                <th><?= $this->Paginator->sort('cust_fname', 'Booked Customer') ?></th>
                <th><?= $this->Paginator->sort('staff_fname', 'Assigned Staff') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($booking as $booking): ?>
                <tr>
                    <td><?= h($booking->service->service_name) ?></td>
                    <td><?= h($booking->eventstart) ?></td>
                    <td><?= h($booking->service->service_duration . ' minutes') ?></td>
                    <td><?= h(date('n/j/y, g:i A', strtotime($booking->eventstart . ' +' . $booking->service->service_duration . ' minutes'))) ?></td>
                    <td><?= h($booking->cust_fname . ' ' . $booking->cust_lname) ?></td>
                    <td><?= h($booking->staff->staff_fname . ' ' . $booking->staff->staff_lname) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $booking->booking_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $booking->booking_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $booking->booking_id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->booking_id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

</body>
</html>
