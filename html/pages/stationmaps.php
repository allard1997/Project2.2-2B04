<!DOCTYPE html>
<?php
/**
 * Created by PhpStorm.
 * User: hylbr
 * Date: 1-2-2019
 * Time: 11:18
 */

include("../header.php");
?>
<body>


<link rel="stylesheet" type="text/css" href="leaflet/leaflet.css" />
<script type="text/javascript" src="leaflet/leaflet.js"></script>
<script type="text/javascript" src="leaflet/leafletembed.js"></script>

<div id="map">

    <style type = "text/css">
        #map{height:400px; }
    </style>

    <script>

        var stationsmap = L.map('map').setView([51.505, -0.09],13);
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.streets',
            accessToken: 'your.mapbox.access.token'
        }).addTo(mymap);

    </script>

</div>

</body>

<?php include "../footer.php"; ?>

</html>