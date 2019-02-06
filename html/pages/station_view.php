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
    </head>

    <style>
        .card {
            min-width: 400px;
        }
    </style>

    <body>
        <div class="container">
            <div class="row justify-content-center py-3">
                <div class="col-12 py-3">
                    <button type="button" class="btn btn-primary" onclick="window.location='/pages/station_overview.php'">Back to overview</button>
                </div>
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
                        <div class="card-footer">
                            <button type="button" class="btn btn-success" onclick="window.location='/pages/xml_export.php?station_id=<?php echo $station->getId()?>'">Export to XML</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>