<!DOCTYPE html>
<html lang="en">
<head>
    <title>Top 5's - Weather stations</title>
</head>
<?php include "../header.php"; ?>
<body>
    <div class=main>
        <div class=container>
        <h2>Top 5 list - Example</h2>
        <?php
            $row = 1;
            if (($handle = fopen("../../data/2019-01-24_21.csv", "r")) !== FALSE) {
                echo '<table border="1"><tbody>';
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    if ($row == 1) {
                        echo '<thead><tr><th>'.$data[0].': Station nr</th><th>'.$data[1].': Date</th><th>'.$data[2].': Tijd</th><th>'.$data[3].': Temp</th><th>'.$data[7].': Cloud cover</th><th>'.$data[9].': Rainfall</th></tr></thead>';
                        $row++;
                    }else{
                        echo '<tr><td>'.$data[0].'</td><td>'.$data[1].'</td><td>'.$data[2].'</td><td>'.$data[3].'</td><td>'.$data[7].'</td><td>'.$data[9].'</td></tr>';
                    }
                }
                echo '</tbody></table>';
                fclose($handle);
            }
        ?>
        </div>
    </div>
</body>
<?php include "../footer.php"; ?>
</html>