<!DOCTYPE html>
<html>

<!-- Include header -->
<?php include "header.php"; ?>

  <body>
    <!--- Tekstjes Mijn Makker  -->
    <div class="main">
    <!-- Begin div -->
      <div class="container" style="text-align:center;">
        <table class="columns" >
          <button class="button" onclick="displayOrHideGraphTemperature()">Temperature Graph</button>
          <button class="button" onclick="displayOrHideGraphRainfall()">Rainfall Graph</button>
          <style>
            .button {
              background-color: #4CAF50;
              border: none;
              color: white;
              padding: 15px 32px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 16px;
              margin: 4px 2px;
              cursor: pointer;
              }
          </style>
          <tr>
            <?php include "scripts/charts.php"; ?>
            <h2>Weather station - Example graph: Temperature</h2>
            <tr><div id="Temperature_chart_div" style="border: 1px solid #ccc"></div></tr><br>
            <h2>Weather station - Example graph: Rainfall</h2>
            <tr><div id="Rainfall_chart_div" style="border: 1px solid #ccc"></div></tr>
          </tr>
        </table>
        <br></br>
        <h2>List</h2>
        <ol type="I">
          <li>REEE</li>
          <li>WHY NO</li>
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
