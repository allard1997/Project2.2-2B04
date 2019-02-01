<!DOCTYPE html>
<?php
include "../scripts/functions.php";

//Test, maak hier het wel automatisch van

$testlees = readCSV("../../data/2019-01-24_21.csv");
$testwrite = writeCSV($testlees);
?>
        
        </div>
    </div>
</body>
<?php include "../footer.php"; ?>
</html>