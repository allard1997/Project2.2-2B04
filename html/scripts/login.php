<?php
session_start();
$user = "Admin";
$pass = "Paashaas";
if(isset($_SESSION['username']))	{
	header("location:../index.php");
}
if(isset($_POST['submit']))	{
	$username = $_POST['username'];
	$password = $_POST['password'];
	if($username == $user and $password == $pass)	{
		$_SESSION['username'] = $username;
		header("location:../index.php");
	}
else{
	echo "<script>alert('Invalid login details');</script>";
	}
}
?>