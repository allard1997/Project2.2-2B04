<!DOCTYPE html>
<html>

<!-- Include header -->
<?php include "header.php"; ?>

  <body>
    <!--- Tekstjes Mijn Makker  -->
    <div class="main">
    <!-- Begin div -->
      <div class="container">
        <table class="columns">
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
