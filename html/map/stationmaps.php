<?php session_start();
if(!isset($_SESSION['username']))	{
    header("location:../src/form_login.php"); } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dynamic stations map</title>
    <link rel="stylesheet" type="text/css" href="leaflet/leaflet.css" />
    <script type="text/javascript" src="leaflet/leaflet.js"></script>
    <script type="text/javascript" src="leaflet/leafletembed.js"></script>
    <script src="dist/leaflet.markercluster-src.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
<?php include '../src/header.php' ?>
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
<?php include "../src/footer.php"; ?>
</body>
</html>