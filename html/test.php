<?php

include 'src/helper.php';

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

foreach (stations(['INDIA']) as $station) {
    /** @var Station $station */
    echo '<pre>';

    $data = $station->data(today(), time() - 3600, time());
    print_r(array_sum($data['TEMP']) / count($data));

    echo '</pre>';
    break;
}