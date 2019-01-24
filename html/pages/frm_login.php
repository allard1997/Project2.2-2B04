<html>

<?php include '../header.php'; ?>

<body>
<div align="center"><form id="frm_login"></form>
<h2>Login</h2>
  <table> <form method="post" action="../scripts/login.php">
  <tr><td></td><td><input id="input_field" name="username" type="text" size="20" placeholder="Username"></td></tr>
  <tr><td></td><td><input id="input_field" name="password" type="password" size="20" maxlength="100" placeholder="Password"></td></tr>
  <hr><tr><td></td><td><input id="input_field_btn_small" type="submit" name="submit" value="Login"></td></tr></hr>
  </table> 
  </form></div>
</body>

<?php include '../footer.php'; ?>

</html>







