<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<?php include( 'header.php'); ?>
<body>

<div role="main">

    <div class="container">
        <div class="row">

            <form method="post" action="scripts/login.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="username" class="form-control" id="username" name="username"placeholder="Username">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                
                <button type="submit" name="submit" class="btn btn-primary" id="submit">Login</button>
            </form>
        </div>
    </div>
</div>

</main>

</body>
<?php include ('footer.php'); ?>
</html>