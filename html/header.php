<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ITV2B-04 - Weather stations</title>
  <meta charset="utf-8">
  <meta http-equiv="Content-Language" content="en">
  <meta name="language" content="en">
  <link href="../weerstation_style.css" type="text/css" rel="stylesheet">
</head>
<!-- include login.php-->
<?php include'scripts/login.php';?>

<div class="dropdown" style="float:right;">
  <button class="dropbtn">Menu</button>
  <div class="dropdown-content">
	<?php if(isset($_SESSION['username']))	{
		?>
		<a href="../pages/logout">Logout</a>
	<?php } else { ?>
		<a href="../pages/frm_login.php">Login </a>
	<?php } ?>
    <a href='../pages/'>Placeholder 1</a>
    <a href='../pages/'>Placeholder 2</a>
  </div>
</div>
<div class="header">
  <div class="container">
    <p ALIGN="center">
        <a href="../index.php">ITV2B-04 - Weather stations</a>
    </p>
  </div>
</div>
<div class="startpage">
  <div class="container">
    <h1>Weather stations</h1>
  </div>
</div>