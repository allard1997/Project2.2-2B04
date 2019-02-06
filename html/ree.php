<?php
/**
 * Created by PhpStorm.
 * User: hylbr
 * Date: 5-2-2019
 * Time: 17:18
 */
$temp = 23;
$dew = 24;

function calculateRelativeHumidity($temp,$dew){
    $rf = 100 * ((112-0.1*$temp + $dew)/(112+0.9*$temp))**8;
    return $rf;
}

$calc = calculateRelativeHumidity(15,90);
echo($calc);
?>