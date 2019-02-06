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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
<?php include 'src/header.php'; ?>
<div class="jumbotron">
<div class="container">
    <h1>Top 5 for inefficient solar panel locations</h1>
    <h4>Sri Lanka and India</h4>
</div>
</div>
<div class="container">
    <div class="dropdown">
        <form action="solar_top5.php" method="post">
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
    <br>
    <div>
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
        <table class="table table-striped table-bordered"><thead class="thead-light"><tr><th>StationID</th><th>StationName</th><th>Temp</th><th>Rainfall</th></tr></thead>
        <?php
            $i=0;
            foreach ($data as $data) {
                echo "<tr><td>".$data['stationID']."</td><td>".ucfirst(strtolower($data['stationName']))."</td><td>".number_format($data['avarageTemperature'],1)." °C</td><td>".number_format($data['avarageRainfall']*10,2)." mm</td></tr>";
                if ($i++ == 4) break;
            }
        ?>
        </tbody></table>
    </div>
<?php include 'src/footer.php'; ?>
</body>
</html>