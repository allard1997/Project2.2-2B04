<?php

include 'src/helper.php';

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

// foreach (stations(['INDIA']) as $station) {
//     /** @var Station $station */
//     echo '<pre>';

//     $data = $station->data(today(), time() - 3600, time());
//     print_r(array_sum($data['TEMP']) / count($data));
//     print_r($station->getID());
//     print_r($station->getCountry());
//     print_r($station->data(today()));

//     echo '</pre>';
//     break;
// };

for ($i = 0; $i < 7; $i++ ){
    echo today(-$i)."</br>";
};

$data = [];
foreach (stations(['SRI LANKA', 'INDIA']) as $station) {
    /** @var Station $station */
    $stationData = $station->data(today());

    $data[] = [
        'stationID' => $station->getId(),
        'avarageTemperature' => array_sum($stationData['TEMP']) / count($stationData['TEMP']),
        'avarageRainfall' => array_sum($stationData['PRCP']) / count($stationData['PRCP']),
        'stationName' => $station->getName(),
    ];
}

// usort($data, function($a , $b) {
//     $_a = $a['avarageRainfall'];
//     $_b = $b['avarageRainfall'];

//     if ($_a > $_b) {
//         return -1;
//     }

//     if ($_a < $_b) {
//         return 1;
//     }

//     return 0;
// });

// usort($data, function($a , $b) {
//     $_a = $a['avarageTemperature'];
//     $_b = $b['avarageTemperature'];

//     if ($_a > $_b) {
//         return -1;
//     }

//     if ($_a < $_b) {
//         return 1;
//     }

//     return 0;
// });

array_multisort(array_column($data, 'avarageRainfall'), SORT_DESC, array_column($data, 'avarageTemperature'), SORT_DESC, $data);

foreach ($data as $data) {
    echo "ID: ".$data['stationID']." - Name: ".ucfirst(strtolower($data['stationName']))." - Temp: ".number_format($data['avarageTemperature'],2)." °C - Rainfall: ".number_format($data['avarageRainfall'],2)." mm</br>";
}