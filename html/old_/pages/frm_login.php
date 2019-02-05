<html>
<?php session_start();?>
<?php include '../header.php'; ?>
<body>
<div align="center"><form id="frm_login"></form>
<h2>Login</h2>
  <table><form method="post" action="../scripts/login.php">
  <tr><td></td><td><br><input id="username" name="username" type="text" size="20" placeholder="Username"></td></tr>
  <tr><td></td><td><input id="password" name="password" type="password" size="20" maxlength="100" placeholder="Password"></td></tr>
  <hr><tr><td></td><td><br><input id="input_field_btn_small" type="submit" name="submit" value="Login"></td></tr></hr>
  </table> 
  </form></br></div>
</body>
<?php include '../footer.php'; ?>
</html>







