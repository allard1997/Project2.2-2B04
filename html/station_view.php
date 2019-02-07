<?php include_once 'src/helper.php';
session_start();
if(!isset($_SESSION['username']))	{
    header("location:src/form_login.php"); } ?>
<?php
    $station = station($_GET['station_id']);
    $data    = $station->data(today());;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Station: <?php echo ucfirst(strtolower($station->getName())); ?></title>
    </head>
    <style>
        .card {
            min-width: 400px;
        }
    </style>
    <script>
        function convert() {
            const from = document.getElementById('from').value;
            const to = document.getElementById('to').value;

            console.log(from);
            console.log(to);

            if (from >= to || from === 'From date' || to === 'To date') {
                alert("from date must BEFORE to date");
                return;
            }

            window.location=`xml_export.php?station_id=<?php echo $station->getId()?>&from=${from}&to=${to}`;
        }

        function httpGet(theUrl)
        {
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
            xmlHttp.send( null );
            return xmlHttp.responseText;
        }

    </script>

    <body>
    <?php include 'src/header.php' ?>
        <div class="container">
            <div class="row py-3">
                <div class="col-12 justify-content-center">
                    <div class="card">
                        <div class="card-header px-4">
                            <h4 class="card-title">Station: <?php echo ucfirst(strtolower($station->getName())) ; ?></h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>Country:</strong>
                                    <?php echo ucfirst(strtolower($station->getCountry())); ?>
                                </li>
                                <li class="list-group-item">
                                    <strong>Current temperature:</strong>
                                    <?php echo round($data['TEMP'][count($data['TEMP']) -1], 2) ?>
                                </li>
                                <li class="list-group-item">
                                    <strong>Average temperature (Today):</strong>
                                    <?php echo round(array_sum($data['TEMP']) / count($data['TEMP']), 2) ?>
                                </li>
                                <li class="list-group-item">
                                    <strong>Average temperature (Week):</strong>
                                    TODO
                                </li>
                                <!--<li class="list-group-item">
                                    <strong>Average temperature (Month):</strong>
                                    TODO
                                </li>
                                <li class="list-group-item">
                                    <strong>Average temperature (Year):</strong>
                                    TODO
                                </li>-->
                            </ul>
                        </div>
                        <div class="card-footer">
                            <div class="form-group w-25 float-left px-3">
                                <select id="from" class="form-control">
                                    <option disabled selected>From date</option>
                                    <?php for ($i = 0; $i < 7; $i++): ?>
                                        <option value="<?php echo -$i?>"><?php echo today(-$i) ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="form-group w-25 float-left px-3">
                                <select id="to" class="form-control">
                                    <option disabled selected>To date</option>
                                    <?php for ($i = 0; $i < 7; $i++): ?>
                                        <option value="<?php echo -$i?>"><?php echo today(-$i) ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="form-group float-left px-3">
                                <button type="button" class="btn btn-success" onclick="convert()">Export to XML</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            const station = JSON.parse(httpGet('/api/station.php?type=day&day=0&station_id=<?php echo $station->getId() ?>'));

                            let graph = [
                                ['Time', 'Temperature']
                            ];

                            station.data.forEach(entry => {
                                graph.push([new Date(entry.time * 1000), entry.TEMP]);
                            });

                            const data = google.visualization.arrayToDataTable(graph);

                            let options = {
                                title: "Temperature today",
                                curveType: 'function',
                                legend: { position: 'bottom' }
                            };

                            let chart = new google.visualization.LineChart(document.getElementById('chart_today'));

                            chart.draw(data, options);
                        }
                    </script>

                    <div id="chart_today" style="width: 100%; height: 500px"></div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            const station = JSON.parse(httpGet('/api/station.php?type=week&station_id=<?php echo $station->getId() ?>'));

                            let graph = [
                                ['Time', 'Temperature']
                            ];

                            station.data.forEach(entry => {
                                graph.push([new Date(entry.time * 1000), entry.TEMP]);
                            });

                            const data = google.visualization.arrayToDataTable(graph);

                            let options = {
                                title: "Temperature last 7 days",
                                curveType: 'function',
                                legend: { position: 'bottom' }
                            };

                            let chart = new google.visualization.LineChart(document.getElementById('chart_week'));

                            chart.draw(data, options);
                        }
                    </script>

                    <div id="chart_week" style="width: 100%; height: 500px"></div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            const station = JSON.parse(httpGet('/api/station.php?type=day&day=0&station_id=<?php echo $station->getId() ?>'));

                            let graph = [
                                ['Time', 'Rainfall']
                            ];

                            station.data.forEach(entry => {
                                graph.push([new Date(entry.time * 1000), entry.PRCP]);
                            });

                            const data = google.visualization.arrayToDataTable(graph);

                            let options = {
                                title: "Rainfall today",
                                curveType: 'function',
                                legend: { position: 'bottom' }
                            };

                            let chart = new google.visualization.LineChart(document.getElementById('chart_rain_today'));

                            chart.draw(data, options);
                        }
                    </script>

                    <div id="chart_rain_today" style="width: 100%; height: 500px"></div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            const station = JSON.parse(httpGet('/api/station.php?type=week&station_id=<?php echo $station->getId() ?>'));

                            let graph = [
                                ['Time', 'Rainfall']
                            ];

                            station.data.forEach(entry => {
                                graph.push([new Date(entry.time * 1000), entry.PRCP]);
                            });

                            const data = google.visualization.arrayToDataTable(graph);

                            let options = {
                                title: "Rainfall last 7 days",
                                curveType: 'function',
                                legend: { position: 'bottom' }
                            };

                            let chart = new google.visualization.LineChart(document.getElementById('chart_rain_week'));

                            chart.draw(data, options);
                        }
                    </script>

                    <div id="chart_rain_week" style="width: 100%; height: 500px"></div>
                </div>
            </div>
        </div>
    <?php include 'src/footer.php' ?>
    </body>
</html>