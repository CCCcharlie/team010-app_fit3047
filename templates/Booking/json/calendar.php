<?php
$data = [];
foreach ($booking as $booking){
$item = [
    'title' => $booking->title,
    'start' => $booking->eventstart,
    'end' => $booking->eventend,
];
   $data[] = $item;
}
echo json_encode($data);

