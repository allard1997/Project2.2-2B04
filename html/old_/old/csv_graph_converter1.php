<?php
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
    return array_splice($csvArray, 1);
    fclose($handle);
} else {
    return false;
    fclose($handle);
}
}

$csvData = readCSV("2019-01-24_21.csv");

foreach ($csvData as $key => $row) {
    $temp[$key]  = $row[3];
    $visib[$key] = $row[7];
    $prcp[$key] = $row[9];
}

array_multisort($temp, SORT_DESC, $visib, SORT_ASC, $prcp, SORT_ASC, $csvData);

echo "Top 5 - Temp";
$count=0;
echo "<table border='1'><thead><tr><th>Station nr</th><th>Date</th><th>Time</th><th>Temp</th><th>Cloud Cover</th><th>Rainfall</th></tr></thead>";
foreach ($csvData as $csvData) {
    if ($count < 100) {
        echo "<tr><td>".$csvData[0]."</td><td>".$csvData[1]."</td><td>".$csvData[2]."</td><td>".$csvData[3]."</td><td>".$csvData[7]."</td><td>".$csvData[9]."</td></tr>";
    $count++;
    } else {
        echo "</tbody></table>";
    }
}
// Shameless Copy van Allard (;O)


// Deze functie hieronder schrijft de inhoud van de array naar een csv bestand toe, om dit te testen moet je even de comment weghalen
// functie is gecomment omdat hij dit elke keer doet

/*
$datas = array(
        'aaa,bbb,ccc,dddd',
        '123,456,789',
        '"aaa","bbb"',
);

$fp = fopen('testing.csv', 'a');
foreach ( $datas as $line )
 {
    fputcsv($fp,explode(',', $line));
   }
fclose($fp);
*/







//https://stackoverflow.com/questions/11399197/add-a-new-line-to-a-csv-file

/*
//Zorg ervoor dat $inputfile goed is anders krijg je net als mij een stuk of 4000 lege cvs files :O
//Bij een foutmelding dus gelijk de pagina laten stoppen met laden
$inputFile = '2019-01-24_21.csv'; // the source file to split
$outputFile = 'users_split';  // this will be appended with a number and .csv e.g. users_split1.csv

$splitSize = 10; // how many rows per split file you want

$in = fopen($inputFile, 'r');
$headers = fgets($in); // get the headers of the original file for insert into split files
// No need to touch below this line..
    $rowCount = 0;
    $fileCount = 1;
    while (!feof($in)) {
        if (($rowCount % $splitSize) == 0) {
            if ($rowCount > 0) {
                fclose($out);
            }
            $out = fopen($outputFile . $fileCount++ . '.csv', 'w');
            fputcsv($out, explode(',', $headers));
        }
        $data = fgetcsv($in);
        if ($data)
            fputcsv($out, $data);
        $rowCount++;
    }

    fclose($out);

    */
?>
