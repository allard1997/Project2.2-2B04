<?php

include 'src/helper.php';

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

foreach (stations() as $station) {
    /** @var Station $station */
    $stationData = $station->data(today());

    $maxTemp = max($stationData['TEMP']);
    $maxRainfall = max($stationData['PRCP']);

    if ($maxTemp > 28) {
        continue;
    }

    if ($maxRainfall > 1)	{
        continue;
    }

    $data[] = [
        'stationID' => $station->getId(),
        'maxTemperature' => $maxTemp,
        'maxRain' => $maxRainfall,
    ];
}

usort($data, function($a , $b) {
    $_a = $a['maxTemperature'];
    $_b = $b['maxTemperature'];

    if ($_a > $_b) {
        return -1;
    }

    if ($_a < $_b) {
        return 1;
    }

    return 0;
});

$resortData = [];

for ($i = 0; $i < 5; $i++) {
    $resortData[] = $data[$i];
}

usort($resortData, function($a, $b) {
    $_a = $a['maxRain'];
    $_b = $b['maxRain'];

    if ($_a < $_b) {
        return -1;
    }

    if ($_a > $_b) {
        return 1;
    }

    return 0;
});

echo '<pre>';

print_r($resortData);

echo '</pre>';