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

              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {
                  var data = google.visualization.arrayToDataTable([
                      ['Time', 'Degrees'],
                      ['05:00', -18],
                      ['06:00', -20],
                      ['07:00', -12],
                      ['08:00', -10],
                      ['09:00', -5],
                      ['10:00', -4],
                      ['11:00', -2],
                      ['12:00', -1],
                      ['13:00', 1],
                      ['14:00', 2],
                      ['15:00', 3],
                      ['16:00', 8],
                      ['17:00', 20],
                      ['18:00', 6],
                      ['19:00', 7],
                      ['20:00', 8],
                      ['21:00', 9],
                      ['22:00', 10],
                      ['23:00', 11],


                  ]);
                  // we moeten straks de tijd en de temp even veranderen door een variabele
                  var options = {
                      title: 'Temperature Weather station # 1337',
                      hAxis: {title: 'Temperature in Celcius',  titleTextStyle: {color: '#333'}},
                      vAxis: {minValue: 0},
                      backgroundColor: { fill:'#FFFFFF', fillOpacity: .5 }
                  };

                  var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
                  chart.draw(data, options);
              }
          </script>

         <!-- Einde div grafiek-->
          </div>

     <!-- Einde div Container-->
      </div>

    <!-- Begin div lijst -->
    <div class="container">
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
