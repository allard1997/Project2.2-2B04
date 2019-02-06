<?php
/**
 * Created by PhpStorm.
 * User: jesse-gall
 * Date: 2/6/19
 * Time: 11:31 AM
 */

class StationExporter
{

    public static function generate($station, $from, $to) {
        $xml = [];

        $index = 0;
        for ($day = $from; $day < $to; $day++) {
            $stationData = $station->data(today($day));
            $count = $stationData['count'];
            for ($i = 0; $i < $count; $i++) {
                $xml[$index] = [];
                foreach ($stationData as $key => $entry) {
                    if ($key == 'count') {
                        continue;
                    }

                    $xml[$index][$key] = $entry[$i];
                    $xml[$index]['date'] = today($day);
                }
                $index++;
            }
        }

        return self::generateValidXmlFromArray($xml, 'WEATHERDATA', 'MEASUREMENT');
    }

    private static function generateValidXmlFromObj($obj, $node_block='nodes', $node_name='node') {
        $arr = get_object_vars($obj);
        return self::generateValidXmlFromArray($arr, $node_block, $node_name);
    }

    private static function generateValidXmlFromArray($array, $node_block='nodes', $node_name='node') {
        $xml = '<?xml version="1.0" encoding="UTF-8" ?>';

        $xml .= '<' . $node_block . '>';
        $xml .= self::generateXmlFromArray($array, $node_name);
        $xml .= '</' . $node_block . '>';

        return $xml;
    }

    private static function generateXmlFromArray($array, $node_name) {
        $xml = '';

        if (is_array($array) || is_object($array)) {
            foreach ($array as $key=>$value) {
                if (is_numeric($key)) {
                    $key = $node_name;
                }

                $xml .= '<' . $key . '>' . self::generateXmlFromArray($value, $node_name) . '</' . $key . '>';
            }
        } else {
            $xml = htmlspecialchars($array, ENT_QUOTES);
        }

        return $xml;
    }

}