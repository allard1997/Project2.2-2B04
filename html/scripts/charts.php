<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Graph scripts</title>
</head>
<body>

    <!-- Load the charts from google -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Load the jQuery CDN  -->
<!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Load the jQuery CSV library
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
        crossorigin="anonymous"></script>
    <script src="src/jquery.csv.js"></script>
-->


<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://prithwis.x10.bz/charts/jquery.csv-0.71.js"></script>
<!--   <script src="https://jquery-csv.googlecode.com/files/jquery.csv-0.71.js"></script>-->
<script type='text/javascript'>
            // Insert hier script voor het ophalen van data

            // Load the right charts and the coherent packages from google
              google.charts.load('current', {'packages':['corechart']});

            // Draw the chart for the temperature
              google.charts.setOnLoadCallback(drawTemperatureChart);

            // Draw the chart for the rainfall
              google.charts.setOnLoadCallback(drawRainfallChart);


              function drawTemperatureChart() {
                // grab the CSV
                $.get('testingthis.csv', function(csvString) {
                  // transform the CSV string into a 2-dimensional array
                  var arrayData = $.csv.toArrays(csvString, {onParseValue: $.csv.hooks.castToScalar});

                  // this new DataTable object holds all the data
                  var data = new google.visualization.arrayToDataTable(arrayData);

                  // this view can select a subset of the data at a time
                  var view = new google.visualization.DataView(data);
                  view.setColumns([2,3]);

                  // set chart options
                  var options = {
                    title: "Temperature",
                    hAxis: {title: data.getColumnLabel(2), minValue: data.getColumnRange(2).min, maxValue: data.getColumnRange(2).max},
                    vAxis: {title: data.getColumnLabel(3), minValue: data.getColumnRange(3).min, maxValue: data.getColumnRange(3).max},
                    backgroundColor: { fill:'#FFFFFF', fillOpacity: .5 },
                    legend: 'none'
                  };

                  // create the chart object and draw it
                  var chart = new google.visualization.AreaChart(document.getElementById('Temperature_chart_div'));
                  chart.draw(view, options);
                });
              }
/*
              function drawTemperatureChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Time');
                data.addColumn('number', 'Temperature');
                data.addRows([
                  ['06:00', -1],
                  ['07:00', -1],
                  ['08:00', -1],
                  ['09:00', -1],
                  ['10:00', -1],
                  ['11:00', -0.5],
                  ['12:00', 0.5],
                  ['13:00', 1],
                  ['14:00', 1],
                  ['15:00', 2],
                  ['16:00', 2],
                  ['17:00', 2],


                  ]);
            // we moeten straks de tijd en de temp even veranderen door een variabele
                  var options = {
                      title: 'Temperature',
                      hAxis: {title: 'Temperature in degrees',  titleTextStyle: {color: '#333'}},
                      vAxis: {minValue: 0},
                      backgroundColor: { fill:'#FFFFFF', fillOpacity: .5 }
                  };

                  var chart = new google.visualization.AreaChart(document.getElementById('Temperature_chart_div'));
                  chart.draw(data, options);
              }
*/
              function drawRainfallChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Time');
                data.addColumn('number', 'Rainfall');
                data.addRows([
                  ['06:00', 0],
                  ['07:00', 1],
                  ['08:00', 1.5],
                  ['09:00', 1],
                  ['10:00', 0],
                  ['11:00', 0],
                  ['12:00', 0],
                  ['13:00', 1],
                  ['14:00', 0.5],
                  ['15:00', 0],
                  ['16:00', 0],
                  ['17:00', 0],

                  ]);
            // we moeten straks de tijd en de temp even veranderen door een variabele
                  var options = {
                      title: 'Rainfall',
                      hAxis: {title: 'Rainfall in mm',  titleTextStyle: {color: '#333'}},
                      vAxis: {minValue: 0},
                      backgroundColor: { fill:'#FFFFFF', fillOpacity: .5 }
                  };

                  var chart = new google.visualization.AreaChart(document.getElementById('Rainfall_chart_div'));
                  chart.draw(data, options);
              }

              function displayOrHideGraphTemperature() {
                var x = document.getElementById("Temperature_chart_div");
                if (x.style.display === "none") {
                  x.style.display = "block";
                } else {
                  x.style.display = "none";
                }
              }

              function displayOrHideGraphRainfall() {
                var y = document.getElementById("Rainfall_chart_div");
                if (y.style.display === "none") {
                  y.style.display = "block";
                } else {
                  y.style.display = "none";
                }
              }
/*
              //Simpele test van mij om te kijken of de jQuery wel werkt
              $(function(){
                 alert("My First Jquery Test");
              });

              window.alert("sometext");
              */
    </script>
</body>
</html>
