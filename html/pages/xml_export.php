<?php
include_once '../src/helper.php';
include_once '../src/StationExporter.php';

$exporter = new StationExporter();

header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=station.xml");

print $exporter->generate(station($_GET['station_id']), -10, 0);