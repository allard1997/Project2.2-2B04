<?php

include_once '../src/helper.php';

$station = station(11160);
$data['station'] = $station;
$data['data'] = $station->data(today(-1));

header('Content-Type: application/json');

echo json_encode($data);