<?php
/**
 * Created by PhpStorm.
 * User: jesse-gall
 * Date: 2/2/19
 * Time: 3:15 PM
 */

class DataHandler
{

    const STATION_INFO_FOLDER = 'station_info/';
    const STATION_DATA_FOLDER = 'data/';

    private $data;

    public function __construct(String $json)
    {
        $this->data = json_decode($json, true);
    }

    public function storeData() {
        foreach ($this->data as $data) {
            $measurementData = $data['data'];
            $stationId = $data['id'];

            unset($data['data']);

            if (!file_exists(self::STATION_INFO_FOLDER . $stationId . '.json')) {
                $file = fopen(self::STATION_INFO_FOLDER . $stationId . '.json', 'w');
                fwrite($file, json_encode($data));
                fclose($file);
            }

            if (count($measurementData) == 0) {
                continue;
            }

            ksort($measurementData);

            $date = date('d-m-Y');

            if (!file_exists(self::STATION_DATA_FOLDER . $date)) {
                mkdir(self::STATION_DATA_FOLDER . $date);
            }

            $filePath = self::STATION_DATA_FOLDER . $date . '/' . $stationId . ".json";

            if (!file_exists($filePath)) {
                touch($filePath);
            }

            $file = fopen($filePath, 'r');
            $fileSize = filesize($filePath);
            $currentData = $fileSize > 0 ? json_decode(fread($file, $fileSize), true) : [];
            fclose($file);

            foreach ($measurementData as $key => $value) {
                if (!isset($currentData[$key])) {
                    $currentData[$key] = [];
                }

                $currentData[$key][] = $value;
            }

            if (!isset($currentData['time'])) {
                $currentData['time'] = [];
            }
            $currentData['time'][] = time();

            file_put_contents($filePath, json_encode($currentData));
        }
    }

}