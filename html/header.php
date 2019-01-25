<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ITV2B-04 - Weather stations</title>
  <meta charset="utf-8">
  <meta http-equiv="Content-Language" content="en">
  <meta name="language" content="en">
  <link href="../weerstation_style.css" type="text/css" rel="stylesheet">


<!-- include login.php-->
    <div class="header">

        <div class="active" style="float:left;">
<button class="dropbtn"> 
  <?php 
  if(isset($_SESSION['username'])){ 
  echo "Logged in as: ".$_SESSION['username'];
  }
  ?>
  </button>
        </div>

<div class="dropdown" style="float:right;">
  <button class="dropbtn">Menu</button>
  <div class="dropdown-content">
  <?php
  if(isset($_SESSION['username']))	{
    echo '<a href="../scripts/logout.php">Logout</a>';
	} else {
    echo '<a href="../pages/frm_login.php">Login</a>';
   }
   ?>
    <a href='../pages/'>Placeholder 1</a>
    <a href='../pages/top5.php'>Top 5's</a>
  </div>
</div>

  <div class="container">
    <p ALIGN="center"></p>
  </div>
</div>
<div class="startpage">
  <div class="container">
      <p>
      <h1> <a href="../index.php">Weather Stations</a></h1>
      </p>
  </div>
</div>

</head>