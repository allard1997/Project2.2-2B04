<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="favicon.ico" sizes="16x16" type="image/icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<?php
include('src/header.php');
?>
<body>
    <main role="main">
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Weather information</h1>
                <p>Web interface for the weather information for Aitken Spence.</p>
                <?php if(isset($_SESSION['username']))	{ ?>
                    <p><a class="btn btn-danger btn-lg" href="src/scripts/logout.php" role="button">Logout &raquo;</a></p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>Map</h2>

                    <p>A map with toggleable markers.</p>
                    <a class="btn btn-secondary" href="map/stationmaps.php" role="button">View map &raquo;</a>

                </div>
                <div class="col-md-4">
                    <h2>Weather stations</h2>
                    <p>Overview of all the weather stations by country.</p>
                    <p>Open a weather station for live information and more.</p>
                    <a class="btn btn-secondary" href="station_overview.php" role="button">View stations &raquo;</a>
                </div>
                <div class="col-md-4">
                    <h2>Top 5's</h2>
                    <p>Shows one of the top 5's as specified by Aitken Spence.</p>
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        View top 5's</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="solar_top5.php">Inefficient solar locations</a>
                        <a class="dropdown-item" href="top5_resort.php">Potential resort locations</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </body>
<?php } else { //als niet logged in: laat login zien ?>
<p><a class="btn btn-primary btn-lg" href="src/form_login.php" role="button">Login &raquo;</a></p>
</main>
<?php }; ?>
<?php include('src/footer.php'); ?>
</body>
</html>