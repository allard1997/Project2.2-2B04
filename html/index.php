<?php
/**
 * Created by PhpStorm.
 * User: hylbr
 * Date: 6-2-2019
 * Time: 11:23
 */

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


