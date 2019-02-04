<?php
//Functie readCSV: leeft een bestand in.
function readCSV($file) 
        {
            $row = 0;
            $csvArray = array();
            if( ( $handle = fopen($file, "r") ) !== FALSE ) {
                while( ( $data = fgetcsv($handle, 1000, ",") ) !== FALSE ) {
                $num = count($data);
                for( $c = 0; $c < $num; $c++ ) {
                    $csvArray[$row][] = $data[$c];
                }
                $row++;
                }
            }
            if( !empty( $csvArray ) ) {
                return $csvArray;
                fclose($handle);
            } else {
                return false;
                fclose($handle);
            }
        }
		
//Functie writeCSV: schrijft het ingelezen bestand in subbestandjes
function writeCSV($file)
		{
			$date = date('Y-m-d');
            if (!file_exists("../../data/" . $date)) {
                    mkdir("../../data/" . $date, 0777, true);
                }
                foreach ($file as $csvSplitContents) {
                    print_r($csvSplitContents);
                    if (!file_exists($csvSplitContents[0])) {
                        fopen("../../data/" . $date . "/" . $csvSplitContents[0] . ".csv", "a");
                        {
                            $file1 = fopen("../../data/" . $date . "/" . $csvSplitContents[0] . ".csv", "a");
                            fputcsv($file1, $csvSplitContents);
                        }
                    }
                }
            }
?>