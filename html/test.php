<?php

include 'src/helper.php';

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

echo '<pre>';

print_r(stationDataLastWeek(10010));

echo '</pre>';