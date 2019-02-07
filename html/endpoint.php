<?php

include 'src/DataHandler.php';

$data = $_POST['json'];
$handler = new DataHandler($data);
$handler->storeData();