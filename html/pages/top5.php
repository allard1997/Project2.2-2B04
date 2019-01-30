<!DOCTYPE html>
<?php session_start();?>
<?php if(!isset($_SESSION['username']))	{
	header("location:../pages/frm_login.php");
}?>
<html lang="en">
<head>
    <title>Top 5's - Weather stations</title>
</head>
<?php include "../header.php"; ?>
<body>
    <div class=main>
        <div class=container>
        <h2>Top 5 list - W.I.P.</h2>
        <?php
            // $row = 1;
            // if (($handle = fopen("../../data/2019-01-24_21.csv", "r")) !== FALSE) {
            //     echo '<table border="1"><tbody>';
            //     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            //         if ($row == 1) {
            //             echo '<thead><tr><th>'.$data[0].': Station nr</th><th>'.$data[1].': Date</th><th>'.$data[2].': Tijd</th><th>'.$data[3].': Temp</th><th>'.$data[7].': Cloud cover</th><th>'.$data[9].': Rainfall</th></tr></thead>';
            //             $row++;
            //         }else{
            //             echo '<tr><td>'.$data[0].'</td><td>'.$data[1].'</td><td>'.$data[2].'</td><td>'.$data[3].'</td><td>'.$data[7].'</td><td>'.$data[9].'</td></tr>';
            //         }
            //     }
            //     echo '</tbody></table>';
            //     fclose($handle);
            // }
        ?>

        <?php
            $SetDate = $_POST["SetDate"];
            $dir = '../../data';
            $scan_dir = array_diff(scandir($dir), array('..', '.'));
            rsort($scan_dir);
        ?>
        <form action="top5.php" method="post">
        Selecteer een datum:
        <select name="SetDate">
        <?php
            $x=0;
            foreach($scan_dir as $scan_dirs) {
                if ($SetDate == $scan_dir[$x]) {
                    echo "<option value=$scan_dir[$x] selected>$scan_dir[$x]</option>";
                    $x++;
                }
                elseif  ($x < 7) {
                    echo "<option value=$scan_dir[$x]>$scan_dir[$x]</option>";
                    $x++;
                } else {
                    break;
                }
            }
        ?>
        <input style="margin:5px" type="submit" value="Select">
        </select>
        </form>

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
            if (isset($SetDate)) {
                $csvData = readCSV("../../data/$SetDate/2019-01-24_21.csv");
            } else {
                $csvData = readCSV("../../data/$scan_dir[0]/2019-01-24_21.csv");
            }
            
            foreach ($csvData as $key => $row) {
                $temp[$key]  = $row[3];
                $visib[$key] = $row[7];
                $prcp[$key] = $row[9];
            }

            array_multisort($temp, SORT_DESC, $visib, SORT_ASC, $prcp, SORT_ASC, $csvData);

            $count=0;
            echo "<table border='1'><thead><tr><th>Station nr</th><th>Date</th><th>Time</th><th>Temp</th><th>Cloud Cover</th><th>Rainfall</th></tr></thead>";
            foreach ($csvData as $csvData) {
                if ($count < 5) {
                    echo "<tr><td>".$csvData[0]."</td><td>".$csvData[1]."</td><td>".$csvData[2]."</td><td>".$csvData[3]."</td><td>".$csvData[7]."</td><td>".$csvData[9]."</td></tr>";
                $count++;
                } else {
                    echo "</tbody></table>";
                }
            }
        ?>
        </div>
    </div>
</body>
<?php include "../footer.php"; ?>
</html>