<html>
<head>
<link href="weerstation_style.css" type="text/css" rel="stylesheet">
</head>
<body>
<h2>Inloggen</h2>
  <table> <form method="post" action="">

  <tr><td></td><td><input id="input_field" name="Username" type="text" size="20" placeholder="Gebruikersnaam"></td></tr>
  <tr><td></td><td><input id="input_field" name="Password" type="password" size="20" maxlength="100" placeholder="Wachtwoord"></td></tr>
  </table> <hr>
  <input id="input_field_btn_small" type="submit" name="Submit" value="Inloggen">
</body>
</html>


<?php
session_start();
if(isset($_SESSION['use']))   
 {
    header("Location:index.php"); 
 }
if(!empty(isset($_POST['Submit']))){
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	if ($Username == 'Admin' && $Password == '123'){
		$_SESSION['Username'] = $Username;
		header("Location:index.php");
		exit;
	} else {
		header("Location:frm_login.php");
	}
}
?>

