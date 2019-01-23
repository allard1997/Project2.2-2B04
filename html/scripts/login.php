<?php
/**
 * Created by PhpStorm.
 * User: hylbr
 * Date: 23-1-2019
 * Time: 09:42
 */

session_start();
if(isset($_SESSION['Username']))
{
    header("Location:index.php");
}
if(!empty(isset($_POST['Submit']))){
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    if ($Username == 'Admin' && $Password == ',x9D#3P-E]w5AetZT7Tu'){
        $_SESSION['Username'] = $Username;
        header("Location:index.php");
        exit;
    } else {
        header("Location:frm_login.php");
    }
}
?>