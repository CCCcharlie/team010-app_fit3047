<?php
$data = [];
foreach ($booking as $booking) {
    $eventStart = new DateTime($booking->eventstart, new DateTimeZone('UTC'));
    $eventEnd = new DateTime($booking->eventend, new DateTimeZone('UTC'));
    $item = [
        'title' => $booking->title,
        'start' => $eventStart->format('Y-m-d\TH:i:s'),
        'end' => $eventEnd->format('Y-m-d\TH:i:s'),
        'timeZone' => 'UTC', // Specify the time zone explicitly. Stops it from converting over.
    ];
    $data[] = $item;
}
echo json_encode($data);

