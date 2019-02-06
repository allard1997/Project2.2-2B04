<?php

include 'DataHandler.php';

if (!function_exists('stations')) {
    function stations($countries = null) {
        $stations = [];
        $dir = new DirectoryIterator(DataHandler::STATION_INFO_FOLDER);
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                $file = fopen($fileinfo->getRealPath(), 'r');
                $station = json_decode(fread($file, filesize($fileinfo->getRealPath())), true);

                if (!is_null($countries)) {
                    if (!in_array(strtoupper($station['stationCountry']), array_map('strtoupper', $countries))) {
                        continue;
                    }
                }

                $stations[] = $station;
            }
        }

        return $stations;
    }
}

if (!function_exists('data')) {
    function data($date, $stationId) {
        $csv = array_map('str_getcsv', file(DataHandler::STATION_DATA_FOLDER . $date . '/' . $stationId . '.csv'));
        return $csv;
    }
}

if (!function_exists('today')) {
    function today() {
        return $date = date('d-m-Y');
    }
}