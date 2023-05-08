<?php
$data = [];
foreach ($booking as $booking) {
    $service_name = $booking->service->service_name;
    $customer_name = substr($booking->customer->cust_fname, 0, 1) . '. ' . $booking->customer->cust_lname;
    $staff_name = substr($booking->staff->staff_fname, 0,1) . '. ' . $booking->staff->staff_lname;
    $title = $service_name . ' - ' . $customer_name . ' with ' . $staff_name;


    $eventStart = new DateTime($booking->eventstart, new DateTimeZone('UTC'));
    $eventEnd = new DateTime($booking->eventend, new DateTimeZone('UTC'));

    $item = [
        'title' => $title,
        'start' => $eventStart->format('Y-m-d\TH:i:s'),
        'end' => $eventEnd->format('Y-m-d\TH:i:s'),
        'timeZone' => 'UTC', // Specify the time zone explicitly
    ];
    $data[] = $item;
}
echo json_encode($data);
