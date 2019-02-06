<?php include_once '../src/helper.php' ?>

<?php
    $station = station($_GET['station_id']);
    $data    = $station->data(today());;
?>

<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                // const data = google.visualization.arrayToDataTable([
                //     ['Time', 'Temperature'],
                //     ['2004',  1000],
                //     ['2005',  1170],
                //     ['2006',  660],
                //     ['2007',  1030]
                // ]);

                <?php
                    $chartData = [
                        [
                                'Time', 'Temperature'
                        ]
                    ];

                    for ($i = 0; $i < $data['count']; $i++) {
                        $chartData[][] = $data['time'][$i];
                        $chartData[][] = $data['TEMP'][$i];
                    }

                    //print_r($chartData);
                ?>

                var data = google.visualization.arrayToDataTable(<?php echo json_encode($chartData)?>);

                console.log(data);

                const options = {
                    title: 'Temperature today',
                    curveType: 'function',
                    legend: { position: 'bottom' }
                };

                const chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                chart.draw(data, options);
            }
        </script>
    </head>

    <style>
        .card {
            min-width: 400px;
        }
    </style>

    <body>
        <div class="container">
            <div class="row justify-content-center py-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><?php echo $station->getName() ?></h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>Country:</strong>
                                    <?php echo $station->getCountry() ?>
                                </li>
                                <li class="list-group-item">
                                    <strong>Current temperature:</strong>
                                    <?php echo round($data['TEMP'][count($data['TEMP']) -1], 2) ?>
                                </li>
                                <li class="list-group-item">
                                    <strong>Average temperature (today):</strong>
                                    <?php echo round(array_sum($data['TEMP']) / count($data['TEMP']), 2) ?>
                                </li>
                                <li class="list-group-item">
                                    <strong>Average temperature (Month):</strong>
                                    TODO
                                </li>
                                <li class="list-group-item">
                                    <strong>Average temperature (Year):</strong>
                                    TODO
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div id="curve_chart" style="width: 100%; height: 500px"></div>
                </div>
            </div>
        </div>
    </body>
</html>