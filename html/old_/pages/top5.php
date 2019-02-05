<!DOCTYPE html>
<?php session_start();?>
<?php if(!isset($_SESSION['username']))	{
	header("location:../pages/frm_login.php");
}?>
<html lang="en">
<head>
    <title>Top 5's - Weather stations</title>
</head>
<?php include "../header.php"; 
	  include "../scripts/functions.php";
?>
<body>
    <div class=main>
        <div class=container>
        <h2>Top 5 - Inefficient places - W.I.P.</h2>
        <?php
            $SetDate = $_POST["SetDate"];
            $dir = '../../data';
            $scan_dir = array_diff(scandir($dir), array('..', '.'));
            rsort($scan_dir);
        ?>
        <form action="top5.php" method="post">
        Select a date:
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
            $csvData = array();
            $c = 0;
            foreach ($scan_dir as $scan_file) {
                $scan_file = array_diff(scandir("$dir/$scan_dir[$c]"), array('..', '.'));
                $files = $scan_file;
                echo "<div>";
                foreach($files as $file) {
                    if (isset($SetDate)) {
                        array_push($csvData, readCSV("../../data/$SetDate/$file"));
                    } else {
                        array_push($csvData, readCSV("../../data/$scan_dir[$c]/$file"));
                    }
                }
                
                $c++;
                echo "</div>";
            }
            
            foreach ($csvData as $key => $row) {
                $temp[$key]  = $row[0][3];
                $prcp[$key] = $row[0][9];
            }

            array_multisort($temp, SORT_DESC, $prcp, SORT_DESC, $csvData);

            $count=0;
            echo "<table border='1'><thead><tr><th>Station nr</th><th>City</th><th>Temp</th><th>Rainfall</th></tr></thead>";
            foreach ($csvData as $csvData) {
                if ($count < 5) {
                    echo "<tr><td>".$csvData[0][0]."</td><td>Placeholder</td><td>".$csvData[0][3]."</td><td>".$csvData[0][9]."</td></tr>";
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