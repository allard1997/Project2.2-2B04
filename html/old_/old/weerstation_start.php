<!DOCTYPE html>


<html>
  <head>

<link href="../weerstation_style.css" type="text/css" rel="stylesheet">

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Time', 'Degrees'],
        ['06:00', -20],
        ['07:00', -15],
        ['08:00', -10],
        ['09:00', -5],
        ['10:00', -4],
        ['11:00', -2],
        ['12:00', -1],
        ['13:00', 0],
        ['14:00', 2],
        ['15:00', 3],
        ['16:00', 5],
        ['17:00', 6],



    ]);
// we moeten straks de tijd en de temp even veranderen door een variabele
    var options = {
      title: 'Temperature',
      hAxis: {title: 'Temperature in Degrees',  titleTextStyle: {color: '#333'}},
      vAxis: {minValue: 0},
      backgroundColor: { fill:'#FFFFFF', fillOpacity: .5 }
    };

    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
</script>

  </head>
  <body>

    <div class="dropdown" style="float:right;">
      <button class="dropbtn">Menu</button>
      <div class="dropdown-content">
        <a href="http://localhost/frm_login.php">Inloggen</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
      </div><!DOCTYPE html>


      <html>
        <head>

      <link href="../weerstation_style.css" type="text/css" rel="stylesheet">

      <!-- begin van de code voor de grafiek -->
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Time', 'Degrees'],
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
            hAxis: {title: 'Temperature in Degrees',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0},
            backgroundColor: { fill:'#FFFFFF', fillOpacity: .5 }
          };

          var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
          chart.draw(data, options);
        }

      </script>
      <!-- einde van de code voor de grafiek -->

        </head>
        <body>

          <div class="dropdown" style="float:right;">
            <button class="dropbtn">Menu</button>
            <div class="dropdown-content">
              <a href="#">Inloggen</a>
              <a href="#">Link 2</a>
              <a href="#">Link 3</a>
            </div>
          </div>
      <!-- Code voor de menu knop -->


          <div class="header">
            <div class="container">
              <p ALIGN="center">
                <iframe src="http://free.timeanddate.com/clock/i6ln7u42/n1292/tluk/tct/pct/ta1" frameborder="0" width="89" height="18" allowTransparency="true"></iframe>
              </p>
            </div>
          </div>
      <!-- Header, bevat op dit moment ook een mooie klok :o -->


          <div class="startpage">
            <div class="container">
              <h1>Weerstation</h1>
                <div id="chart_div" style="width:400; height:300"></div>
              <p>Weerstation</p>
            </div>
          </div>
      <!--- Hier staat ons hele mooie plaatje ook op  -->

          <div class="main">
            <div class="container">
              <img src="">
              <h2>Weerstation</h2>
              <ol type="I">
              <li></li>
              <li></li>
              <li></li>
              </ol>
            </div>
          </div>
      <!-- begin van een list -->

      <div class="footer">
        <div class="container">
          <p>&copy; Website Weerstation</p>
        </div>
      </div>
      </body>
      </html>
      <!-- De footer van de website -->

    </div>

    <div class="header">
      <div class="container">
        <p ALIGN="center">
          Hallo
        </p>
      </div>
    </div>


    <div class="startpage">
      <div class="container">
        <h1>Weerstation</h1>
    <div id="chart_div" style="width:400; height:300"></div>
        <p>Weerstation</p>
      </div>
    </div>

    <!--- Tekstjes Mijn Makker  -->

    <div class="main">
      <div class="container">
        <img src="">
        <h2>Weerstation</h2>
        <ol type="I">
        <li></li>
        <li></li>
        <li></li>
        </ol>
      </div>
    </div>

<div class="footer">
  <div class="container">
    <p>&copy; Website Weerstation</p>
  </div>
</div>
</body>
</html>
