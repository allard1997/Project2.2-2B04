<!DOCTYPE html>
<html>

<!-- Include header -->
<?php include "header.php"; ?>

  <body>
    <!--- Tekstjes Mijn Makker  -->

    <div class="main">

        <!-- Begin Container weerstation 1 -->
      <div class="container">
        <h2>Weerstation</h2>
          <div id="chart_div">
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">

              <!-- Insert hier script voor het ophalen van data -->

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
                  ['06:00', -20],
                  ['07:00', -15],
                  ['08:00', -10],
                  ['09:00', -5],
                  ['10:00', -4],
                  ['11:00', -2],
                  ['12:00', -1],
                  ['13:00', 1],
                  ['14:00', 2],
                  ['15:00', 3],
                  ['16:00', 8],
                  ['17:00', 10],


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
                  ['06:00', -20],
                  ['07:00', -15],
                  ['08:00', -10],
                  ['09:00', -5],
                  ['10:00', -4],
                  ['11:00', -2],
                  ['12:00', -1],
                  ['13:00', 1],
                  ['14:00', 2],
                  ['15:00', 3],
                  ['16:00', 8],
                  ['17:00', 10],

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
          </script>

         <!-- Einde div grafiek-->
          </div>

     <!-- Einde div Container-->
      </div>

    <!-- Begin div lijst -->
    <div class="container">
      <table class="columns">
          <tr>
            <tr><div id="Temperature_chart_div" style="border: 1px solid #ccc"></div></tr>
            <h1>Weerstation</h1>
            <tr><div id="Rainfall_chart_div" style="border: 1px solid #ccc"></div></tr>
          </tr>
        </table>

        <ol type="I">
            <li>Ree</li>
            <li>waarom geen</li>
            <li>B O O T S T R A P</li>
        </ol>
    </div>

    <!-- Einde Main div -->
    </div>

  <!-- Einde body -->
  </body>

    <!-- Include footer -->
    <?php include "footer.php"; ?>

</html>
