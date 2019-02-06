<?php
    session_start();
    session_destroy();
    header("location:../pages/form_login.php");
?>