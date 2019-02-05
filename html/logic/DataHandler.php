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
            $stationId = $data['stationId'];

            unset($data['data']);

            if (!file_exists(self::STATION_INFO_FOLDER . $stationId . '.json')) {
                $file = fopen(self::STATION_INFO_FOLDER . $stationId . '.json', 'w');
                fwrite($file, json_encode($data));
                fclose($file);
            }

            ksort($measurementData);

            if (count($measurementData) == 0) {
                continue;
            }

            $string = '';
            foreach ($measurementData as $key => $value) {
                $string .= $value . ',';
            }

            $date = date('d-m-Y');

            if (!file_exists(self::STATION_DATA_FOLDER . '/' . $date)) {
                mkdir(self::STATION_DATA_FOLDER . '/' . $date);
            }

            $file = fopen(self::STATION_DATA_FOLDER . '/' . $date . '/' . $stationId . ".csv","a");

            fputcsv($file,explode(',',$string));

            fclose($file);
        }
    }

}