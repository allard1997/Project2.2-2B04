<?php

include_once '../src/helper.php';

$stations = stations();

$data = [];

foreach ($stations as $station) {
    $data[] = $station;
}

header('Content-Type: application/json');

echo json_encode($data);