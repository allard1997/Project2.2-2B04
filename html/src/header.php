<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/index.php">
    <img src="https://material.io/tools/icons/static/icons/baseline-wb_sunny-24px.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    Weather information
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/index.php">Home</a>
      </li>
        <?php if(isset($_SESSION['username'])){ ?>
      <li class="nav-item">
        <a class="nav-link" href="/station_overview.php">Search station</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/map/stationmaps.php">Potential resort map</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Top 5's
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/solar_top5.php">Inefficient solar locations</a>
          <a class="dropdown-item" href="/top5_resort.php">Potential resort locations</a>
        </div>
      </li>
    </ul>
      <a class="nav-link disabled" href="#">Hello <?php echo $_SESSION['username'];?>!</a>
      <a href="/src/scripts/logout.php" class="btn btn-outline-dark my-2 my-sm-0">Logout</a>
      <?php }elseif(!isset($_SESSION['username'])){?>
     </ul>
     <a href="/src/form_login.php" class="btn btn-outline-dark my-2 my-sm-0">Login</a>
      <?php }; ?>
  </div>
</nav>