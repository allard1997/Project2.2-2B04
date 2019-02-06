<!DOCTYPE html>
<?php
/**
 * Created by PhpStorm.
 * User: hylbr
 * Date: 1-2-2019
 * Time: 11:18
 */

include("../header.php");
include("../scripts/functions.php");
?>
<body>


<link rel="stylesheet" type="text/css" href="leaflet/leaflet.css" />
<script type="text/javascript" src="leaflet/leaflet.js"></script>
<script type="text/javascript" src="leaflet/leafletembed.js"></script>

<div id="map">

    <style type = "text/css">
        #map{height:800px; }
    </style>

    <script>



        /* var stationsmap = L.map('map').setView([0,0],3);

        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiaGRqcmlqbmRlcnMiLCJhIjoiY2pybHoxaXBxMDJ3ZjQzdXdyY3FjNHY0aSJ9.2tBBcsjliUoQgxwlUhmgtA', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.streets',
            accessToken: 'your.mapbox.access.token'
        }).addTo(stationsmap);

        for (var i = 0; i < statloc.length; i++) {
            marker = new L.marker([statloc[i][3], statloc[i][4]])
                .bindPopup("Station # : " + statloc[i][0] + "<br>" + "Name: " + statloc[i][1]  + "<br>"  )
                .addTo(stationsmap);
        }
                */
    </script>

</div>

</body>

<?php include "../footer.php"; ?>

</html>