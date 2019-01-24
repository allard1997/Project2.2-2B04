<?php
/**
 * Created by PhpStorm.
 * User: hylbr
 * Date: 23-1-2019
 * Time: 09:42
 */
$user = "Admin";
$pass = "Admin";
if(isset($_SESSION['username']))	{
	header("location:../index.php");
}
if(isset($_POST['submit']))	{
	$username = $_POST['username'];
	$password = $_POST['password'];
	if($username == $user and $password == $pass)	{
		session_start();
		$_SESSION['username'] == $username;
		header("location:../index.php");
	}
else{
	echo "<script>alert('Invalid login details');</script>";
	}
}


?>