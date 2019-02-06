<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
<?php
include('src/header.php');
?>
    <body>
    <main role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Weather Information</h1>
                <p>Webinterface for the Weather Information project for Aitken Space</p>

                <? //als niet logged in: laat login zien ?>
                <p><a class="btn btn-primary btn-lg" href="/src/login.php" role="button">Login &raquo;</a></p>
                <? //als wel logged in: laat user zien ?>

            </div>
        </div>

        <? //als wel logged in?>
        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-4">
                    <h2>Map</h2>
                    <p>A map with toggable markers.</p>
                    <a class="btn btn-secondary" href="pages/stationmaps.php" role="button">View map &raquo;</a></p>
                </div>
                <div class="col-md-4">
                    <h2>Charts</h2>
                    <p>Various charts with data</p>
                    <a class="btn btn-secondary" href="charts.php" role="button">View charts &raquo;</a></p>
                </div>
                <div class="col-md-4">
                    <h2>Top 5</h2>
                    <p>Shows the top 5 as specified by Aitken Space</p>
                    <a class="btn btn-secondary" href="solar_top5.php" role="button">View top 5 &raquo;</a></p>
                </div>
            </div>

            <hr>

        </div> <!-- /container -->

    </main>

    <?php
    include('src/footer.php');
    ?>
</body>
</html>