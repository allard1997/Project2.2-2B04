<?php
    session_start();
    session_destroy();
    header("location:../pages/frm_login.php");
?>