<?php

include 'src/DataHandler.php';

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

$data = $_POST['json'];
$handler = new DataHandler($data);
$handler->storeData();