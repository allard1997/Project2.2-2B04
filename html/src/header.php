<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../../index.php">
    <img src="https://material.io/tools/icons/static/icons/baseline-wb_sunny-24px.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    Weather information
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../../index.php">Home</a>
      </li>
        <?//php if(isset($_SESSION['username'])){ ?>
      <li class="nav-item">
        <a class="nav-link" href="station_overview.php">Search station</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="solar_top5.php">Inefficient locations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Potential location map</a>
      </li>
    </ul>
      <a href="src/scripts/logout.php" class="btn btn-outline-dark my-2 my-sm-0">Logout</a>
      <? //}else{?>
    <a href="src/pages/form_login.php" class="btn btn-outline-dark my-2 my-sm-0">Login</a>
      <? //}; ?>
  </div>
</nav>