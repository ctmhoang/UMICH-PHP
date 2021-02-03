<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blah App</title>
</head>

<body>
    <h1>Blah App</h1>
    <p><?php print_r($_SESSION)?></p>
    <p><strong><?= isset($_SESSION['acc']) ? 'Please <a href="logout.php">Log out</a> when you are done' : 'Please <a href="login.php">Log in</a> to start.' ?></strong></p>
</body>

</html>