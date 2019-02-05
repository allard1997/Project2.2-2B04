<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Top 5</title>
    <?php
        include 'src/helper.php';
        ini_set('display_startup_errors',1);
        ini_set('display_errors',1);
        error_reporting(-1);
        $setDate = $_POST["setDate"];
    ?>
</head>
<body>
<h1>Top 5 for inefficient solar panel locations</h1>
<form action="solar_top5.php" method="post">
    Select a date:
    <select name="setDate">
    <?php
        for ($i=0; $i<7; $i++){
            if ($setDate == $i) {
                echo "<option value=".$setDate." selected>".today(-$i)."_$i</option>";
            } else {
                echo "<option value=".$i.">".today(-$i)."_$i</option>";
            }
        };
    ?>
    <input style="margin:5px" type="submit" value="Select">
    </select>
</form>
<?php
    $data = [];
    foreach (stations(['SRI LANKA', 'INDIA']) as $station) {
        /** @var Station $station */
        if (isset($setDate)) {
            $stationData = $station->data(today(-$setDate));
        } else {
            $stationData = $station->data(today());
        }

        $data[] = [
            'stationID' => $station->getId(),
            'avarageTemperature' => array_sum($stationData['TEMP']) / count($stationData['TEMP']),
            'avarageRainfall' => array_sum($stationData['PRCP']) / count($stationData['PRCP']),
            'stationName' => $station->getName()
        ];
    }
    array_multisort(array_column($data, 'avarageTemperature'), SORT_DESC, array_column($data, 'avarageRainfall'), SORT_DESC, $data);
?>
<table border='1'><thead><tr><th>StationID</th><th>StationName</th><th>Temp</th><th>Rainfall</th></tr></thead>
<?php
    $i=0;
    foreach ($data as $data) {
        echo "<tr><td>".$data['stationID']."</td><td>".ucfirst(strtolower($data['stationName']))."</td><td>".number_format($data['avarageTemperature'],1)." °C</td><td>".number_format($data['avarageRainfall']*10,2)." mm</td></tr>";
        if ($i++ == 4) break;
    }
?>
</tbody></table>
</body>
</html>