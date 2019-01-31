<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Graph scripts</title>
</head>
<body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">

            // Insert hier script voor het ophalen van data

            // Load the right charts and the coherent packages from google
              google.charts.load('current', {'packages':['corechart']});

            // Draw the chart for the temperature
              google.charts.setOnLoadCallback(drawTemperatureChart);

            // Draw the chart for the rainfall
              google.charts.setOnLoadCallback(drawRainfallChart);

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
    </script>
</body>
</html>
