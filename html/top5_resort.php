<?php
include 'src/model/Station.php';
include 'src/helper.php';


foreach (stations() as $station) {
    /** @var Station $station */
    $stationData = stationDataLastWeek($station->getId());
	$tempc = round(array_sum($stationData['TEMP']) / count($stationData['TEMP']), 2);
	$dew = round(array_sum($stationData['DEWP']) / count($stationData['DEWP']), 2);
    $maxTemp = round(max($stationData['TEMP']),1);
    $maxRainfall = round(10 * max($stationData['PRCP']), 2);
	
	//Heatindex calculation
	$F = $tempc * 9 / 5 + 32;
	$RH = 100*((112-0.1*$tempc + $dew)/(112+0.9*$tempc))**8;
	$HIF = -42.379 + (2.04901523*$F) + (10.14333127*$RH) - (0.22475541*$F*$RH) - (6.83783*(10**-3)*($F**2)) - (5.481717*(10**-2)*($RH**2)) + (1.22874*(10**-3)*($F**2)*$RH) + (8.5282*(10**-4)*$F*($RH**2)) - (1.99*(10**-6)*($F**2)*($RH**2));
	$HIC = ($HIF-32)/1.8;
	
    if ($maxTemp > 27.999999) {
        continue;
    }

    if ($maxRainfall > 1)	{
        continue;
    }
	
	//Put data in array
    $data[] = [
        'stationID' => $station->getId(),
        'maxTemperature' => $maxTemp,
        'maxRain' => $maxRainfall,
		'Heatindex' => $HIC,
    ];
}


//Sort temperature 
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

//Sort rainfall
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

//Sort heatindex
usort($resortData, function($a, $b) {
    $_a = $a['Heatindex'];
    $_b = $b['Heatindex'];

    if ($_a < $_b) {
        return 1;
    }

    if ($_a > $_b) {
        return -1;
    }

    return 0;
});

?>

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
<?php include 'src/header.php'; ?>
<div class="container">
    <div class="dropdown">
        <form action="top5_resort.php" method="post">
            Select a date:
            <select class="btn btn-secondary btn-sm dropdown-toggle" name="setDate">
            <?php
                for ($i=0; $i<7; $i++){
                    if ($setDate == $i) {
                        echo "<option value=".$setDate." selected>".today(-$i)."_$i</option>";
                    } else {
                        echo "<option value=".$i.">".today(-$i)."_$i</option>";
                    }
                };
            ?>
            <input class="btn btn-sm btn-primary" style="margin:5px" type="submit" value="Select">
            </select>
        </form>
    </div>
	<div>
     
        <table class="table table-striped table-bordered"><thead class="thead-light"><tr><th>StationID</th><th>maximum Temperature C</th><th>maximum rainfall mm</th><th>Heatindex</th></tr></thead>
        <?php
           foreach ($resortData as $a => $b)	{
					echo "<tr><td>".$b['stationID']."</td><td>".$b['maxTemperature']."</td><td>".$b['maxRain']."</td><td>".round($b['Heatindex'],1)."</td></tr>";
				}
        ?>
        </tbody></table>
    </div>

<?php include 'src/footer.php'; ?>

</body>
</html> 