<?php include_once 'src/helper.php';
session_start();
if(!isset($_SESSION['username']))	{
    header("location:src/form_login.php"); } ?>
<?php
if (isset($_GET['countries'])) {
    $countries = $_GET['countries'];
    $arr = explode(',', $countries);
    $arr = array_map('strtoupper', $arr);
    $arr = array_map('trim', $arr);
    $stations = stations($arr);
} else {
    $countries = '';
    $stations = stations();
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Station overview</title>
</head>
<script>
    function onSearch() {
        const string = document.getElementById("countries").value;
        const countries = string.split(',');

        countries.forEach(country => {
            country = $.trim(country);
        });

        window.location = 'station_overview.php?countries=' + countries;
    }
</script>
<body>
<?php include 'src/header.php' ?>
<div class="container">
    <div class="row py-3">
        <div class="col-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        Country
                    </span>
                </div>
                <input id="countries" type="text" value="<?php echo $countries ?>" class="form-control" placeholder="e.g: india,netherlands,sri lanka">
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-primary" onclick="onSearch()">
                Search
            </button>
        </div>
    </div>
    <div class="row justify-content-center table-responsive py-3">
        <div class="col-12">
            <table class="table table-striped table-hover table-sm">
                <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Info</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($stations as $station) : ?>
                    <tr>
                        <td><?php echo ucfirst(strtolower($station->getName())); ?></td>
                        <td><?php echo ucfirst(strtolower($station->getCountry())); ?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary"
                                    onclick="window.location='station_view.php?station_id=<?php echo $station->getID()?>'">
                                Open
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'src/footer.php' ?>
</body>
</html>