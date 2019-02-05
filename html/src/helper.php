<?php

include_once 'DataHandler.php';
include_once 'model/Station.php';

date_default_timezone_set('Europe/Amsterdam');
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

if (!function_exists('stations')) {
    function stations($countries = null): array
    {
        $stations = [];
        $dir      = new DirectoryIterator(__DIR__ . '/../station_info');
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

if (!function_exists('station')) {
    function station(int $id) {
        $path = __DIR__ . '/../station_info/' . $id . '.json';

        if (!file_exists($path)) {
            return null;
        }

        $file = fopen($path, 'r');
        $data = json_decode(fread($file, filesize($path)), true);

        return new Station($data);
    }
}

if (!function_exists('station_data')) {
    function station_data($date, $stationId, $from = null, $to = null)
    {
        $path = __DIR__ . '/../data/' . $date . '/' . $stationId . '.json';

        if (!file_exists($path)) {
            return null;
        }

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

        if ($days >= 0) {
            date_add($date, date_interval_create_from_date_string($days . " days"));
        } else {
            date_sub($date, date_interval_create_from_date_string("-" . $days . " days"));
        }

        return date_format($date, 'd-m-Y');
    }
}