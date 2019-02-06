<?php

include_once '../src/helper.php';

$station = station($_GET['station_id']);
$data['station'] = $station;
$data['data'] = format_data($_GET['type'] == 'day' ? $station->data(today($_GET['day'])) : stationDataLastWeek($_GET['station_id']));

header('Content-Type: application/json');

echo json_encode($data);