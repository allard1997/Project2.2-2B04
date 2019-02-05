<?php

include_once 'DataHandler.php';
include_once 'model/Station.php';

date_default_timezone_set('Europe/Amsterdam');

if (!function_exists('stations')) {
    function stations($countries = null): array
    {
        $stations = [];
        $dir      = new DirectoryIterator(DataHandler::STATION_INFO_FOLDER);
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                $file = fopen($fileinfo->getRealPath(), 'r');

                $station = new Station(
                    json_decode(fread($file, filesize($fileinfo->getRealPath())), true)
                );

                if (!is_null($countries)) {
                    if (!in_array(strtoupper($station->getCountry()), array_map('strtoupper', $countries))) {
                        continue;
                    }
                }

                $stations[] = $station;
            }
        }

        return $stations;
    }
}

if (!function_exists('station_data')) {
    function station_data($date, $stationId, $from = null, $to = null)
    {
        $path = DataHandler::STATION_DATA_FOLDER . $date . '/' . $stationId . '.json';
        $file = fopen($path, 'r');
        $data = json_decode(fread($file, filesize($path)), true);

        if (!is_null($from) && !is_null($to)) {
            foreach ($data['time'] as $key => $time) {
                if ($time < $from || $time > $to) {
                    foreach ($data as &$entry) {
                        unset($entry[$key]);
                    }
                }
            }
        }

        return $data;
    }
}

if (!function_exists('today')) {
    function today(int $days = 0)
    {
        $date = date_create(date('d-m-Y'));
        date_sub($date, date_interval_create_from_date_string(($days < 0 ? '-' : '') . $days . " days"));
        return date_format($date, 'd-m-Y');
    }
}