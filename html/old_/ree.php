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

$t = ;
$r = $calc;
$c1	= -42.379;
$c2	= -2.04901523;
$c3	= -10.14333127;
$c4	= -0.22475541;
$c5	= -6.83783 * 10-3;
$c6	= -5.481717 * 10-2;
$c7	= -1.22874 *10-3;
$c8	= 8.5282 * 10-4;
$c9	= -1.99 * 10-6;

$HI = ($c1 + ($c2*$t) + ($c3+*$r) + ($c4*$t*$r) + ($c5*($t**2)) + ($c6*($t**2)) + ($c7*($t**2)*$r) + ($c8*$t*($r**2))+($c9*($t**2)* $r**2));

?>