<?php
$data = [];
foreach ($booking as $booking) {
    $serviceDuration = $booking->service->service_duration;
    $eventStart = new DateTime($booking->eventstart, new DateTimeZone('UTC'));
    $eventEnd = clone $eventStart;
    $eventEnd->add(new DateInterval('PT' . $serviceDuration . 'M'));

    $staffName = substr($booking->staff->fname, 0, 1) . '. ' . $booking->staff->lname;
    $customerName = $booking->customer->fname . ' ' . $booking->customer->lname;
    $serviceName = $booking->service->service_name;

    $item = [
        'title' => $serviceName . ' - ' . $customerName . ' with ' . $staffName,
        'start' => $eventStart->format('Y-m-d\TH:i:s'),
        'end' => $eventEnd->format('Y-m-d\TH:i:s'),
    ];
    $data[] = $item;
}
echo json_encode($data);
