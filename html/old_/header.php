<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ITV2B-04 - Weather stations</title>
  <meta charset="utf-8">
  <meta http-equiv="Content-Language" content="en">
  <meta name="language" content="en">
  <link href="../weerstation_style.css" type="text/css" rel="stylesheet">
</head>
<!-- include login.php-->

<div class="active" style="float:left;">
<button class="dropbtn"> 
  <?php 
  if(isset($_SESSION['username'])){ 
  echo "logged in as: ".$_SESSION['username'];
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
    echo '<a href="..frm_login.php">Login</a>';
   }
   ?>
    <a href='..'>Placeholder 1</a>
    <a href='..top5.php'>Top 5's</a>
  </div>
</div>
<div class="header">
  <div class="container">
  </div>
</div>
<div class="startpage">
  <div class="container">
    <h1><a style=color:#66cd00;line-height:100px;font-size:80px;margin-top:0;margin-bottom:0px;text-transform:uppercase;text-shadow:2px2px#006400; href="../index.php">Weather Stations</a></h1>
  </div>
</div>