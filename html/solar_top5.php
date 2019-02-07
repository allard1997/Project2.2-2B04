<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inefficient locations</title>
    <?php
        session_start();
        if(!isset($_SESSION['username']))	{
            header("location:src/form_login.php"); }
        include 'src/helper.php';
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
        <h1 class="display-4">Top 5 for inefficient solar panel locations</h1>
        <p class="lead">Sri Lanka and India</p>
    </div>
</div>
<div class="container">
    <div class="dropdown">
        <form action="solar_top5.php" method="post">
            Select a date:
            <select class="btn btn-outline-secondary btn-sm dropdown-toggle" name="setDate">
            <?php
                for ($i=0; $i<7; $i++){
                    if ($setDate == $i) {
                        echo "<option value=".$setDate." selected>".today(-$i)."</option>";
                    } else {
                        echo "<option value=".$i.">".today(-$i)."</option>";
                    }
                };
            ?>
            <input class="btn btn-sm btn-outline-primary" style="margin:5px" type="submit" value="Select">
            </select>
        </form>
    </div>
    </br>
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
                    'stationName' => $station->getName(),
                    'stationCountry' => $station->getCountry(),
                ];
            }
            if (isset($stationData['TEMP'])) {
            array_multisort(array_column($data, 'avarageTemperature'), SORT_DESC, array_column($data, 'avarageRainfall'), SORT_DESC, $data);
        ?>
            <table class="table table-striped table-bordered"><thead class="thead-light"><tr><th>Country</th><th>Name</th><th>Temp</th><th>Rainfall</th><th>Info</th></tr></thead>
        <?php
            $i=0;
            foreach ($data as $data) {
                echo "<tr><td>".ucfirst(strtolower($data['stationCountry']))."</td><td>".ucfirst(strtolower($data['stationName']))."</td><td>".number_format($data['avarageTemperature'],1)." °C</td><td>".number_format($data['avarageRainfall']*10,2)." mm</td><td>
                <a href='/station_view.php?station_id=".$data['stationID']."' class='btn btn-outline-primary btn-sm' role='button' aria-pressed='true'>Open</a></td></tr>";
                if ($i++ == 4) break;
            }
        ?>
        </tbody></table>
        <?php } else { 
            echo "<h1>No data available for this date.</h1><h4>Please choose another date from the select menu.</h4></br>"; } ?>
    </div>
</div>
<?php include 'src/footer.php'; ?>
</body>
</html>