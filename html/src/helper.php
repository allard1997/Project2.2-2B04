<?php

include_once 'DataHandler.php';
include_once 'model/Station.php';

date_default_timezone_set('Europe/Amsterdam');

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

        $data['count'] = count($data['time']);

        return $data;
    }
}

if (!function_exists('stationDataLastWeek')) {
    function stationDataLastWeek($stationId) {
        $ret = [];
        $index = 0;

        for ($day = -7; $day <= 0; $day++) {
            $stationData = station_data(today($day), $stationId);

            if (is_null($stationData)) {
                continue;
            }

            foreach($stationData as $key => $data) {

                if ($key === 'count') {
                    continue;
                }

                foreach ($data as $value) {
                    $ret[$key][] = $value;
                }
            }
        }

        $ret['count'] = count($ret['time']);

        return $ret;
    }
}

if (!function_exists('format_data')) {
    function format_data($data) {
        $ret = [];
        $count = $data['count'];
        for ($i = 0; $i < $count; $i++) {
            $section = [];
            foreach ($data as $key => $values) {
                $section[$key] = $values[$i];
            }
            $ret[] = $section;
        }

        return $ret;
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