<!DOCTYPE html>
<body>


<link rel="stylesheet" type="text/css" href="leaflet/leaflet.css" />
<script type="text/javascript" src="leaflet/leaflet.js"></script>
<script type="text/javascript" src="leaflet/leafletembed.js"></script>
<script src="dist/leaflet.markercluster-src.js"></script>

<div id="map">

    <style type = "text/css">
        #map{height:800px; }
    </style>

    <script>

        function httpGet(theUrl)
        {
            let xmlHttp = new XMLHttpRequest();
            xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
            xmlHttp.send( null );
            return xmlHttp.responseText;
        }

        let stationsmap = L.map('map').setView([0,0],3);

        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiaGRqcmlqbmRlcnMiLCJhIjoiY2pybHoxaXBxMDJ3ZjQzdXdyY3FjNHY0aSJ9.2tBBcsjliUoQgxwlUhmgtA', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.streets',
            accessToken: 'your.mapbox.access.token'
        }).addTo(stationsmap);

        const stations = JSON.parse(httpGet('/api/stations.php'));

        const markers = L.markerClusterGroup();
        let c = 0;
        stations.forEach(station => {
            markers.addLayer(
                L.marker([station.latitude, station.longitude])
                    .bindPopup( `<h4>${station.name}</h4> <br> <a href="/station_view.php?station_id=${station.id}">view</a>` )
            )
        });

        stationsmap.addLayer(markers);
    </script>

</div>

</body>

<?php include "../footer.php"; ?>

</html>