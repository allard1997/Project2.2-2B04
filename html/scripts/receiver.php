<!DOCTYPE html>
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
			
			$csvData = readCSV("../data/2019-01-24_21.csv");
			
			$date = date('Y-m-d');
			
			if (!file_exists("../data/".$date)) {
				mkdir("../data/".$date, 0777, true);
			}
			
			foreach ($csvData as $csvData) {
				echo $csvData[0], ',';
				if (!file_exists($csvData[0])) {
			fopen("../data/".$date."/".$csvData[0].".csv", "w");
			}
			}
			
			
			/*$file = fopen("../data/Book1.csv","w");
			
			foreach ($csvData as $row) {
				fputcsv($file, $row);
			}
		
			fclose($file);*/
			
?>
        
        </div>
    </div>
</body>
<?php include "../footer.php"; ?>
</html>