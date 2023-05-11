<?php
$data = [];
foreach ($booking as $booking) {
    $service_name = $booking->service->service_name;
    $customer_name = substr($booking->cust_fname, 0, 1) . '. ' . $booking->cust_lname;
    $staff_name = substr($booking->staff->staff_fname, 0,1) . '. ' . $booking->staff->staff_lname;
    $title = $service_name . ' - ' . $customer_name . ' served by ' . $staff_name;
    $service_duration = $booking->service->service_duration; // fetch service duration


    $eventStart = new DateTime($booking->eventstart, new DateTimeZone('UTC'));
    $eventEnd = clone $eventStart;
    $eventEnd->add(new DateInterval('PT' . $service_duration . 'M')); // add service duration to event end time

    $item = [
        'title' => $title,
        'start' => $eventStart->format('Y-m-d\TH:i:s'),
        'end' => $eventEnd->format('Y-m-d\TH:i:s'),
        'timeZone' => 'UTC', // Specify the time zone explicitly prevents fullcalender from converting
        'className' => 'event-title',
    ];
    $data[] = $item;
}
echo json_encode($data);
