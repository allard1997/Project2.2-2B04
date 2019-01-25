<!DOCTYPE html>
<?php session_start();?>
<?php if(!isset($_SESSION['username']))	{
	header("location:../pages/frm_login.php");
}?>
<html lang="en">
<head>
    <title>Top 5's - Weather stations</title>
</head>
<?php include "../header.php"; ?>
<body>
    <div class=main>
        <div class=container>
            <h2>Top 5 list - Example</h2>
            <ol type=1>
            <li>Example</li>
            </ol>
        </div>
    </div>
</body>
<?php include "../footer.php"; ?>
</html>