<?php
session_start();
if (isset($_POST['acc'], $_POST['pwd'])) {
    unset($_SESSION['acc']);
    if ($_POST['pwd'] == 'art')
        $_SESSION['acc'] = $_POST['acc'];
    $_SESSION['message'] = isset($_SESSION['acc']) ? 'Logged in' : 'Incorrect Password';
    header('Location: login.php');
    return;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blah</title>
</head>

<body>
    <h1>Please Login</h1>
    <?php
    if (isset($_SESSION['message']))
        echo "<p><strong>$_SESSION[message]</strong></p>";
    unset($_SESSION['message']);
    ?>
    <form method="post">
        <label for="acc"><input type="text" name="acc"></label>
        <label for="pwd"><input type="password" name="pwd"></label>
        <button>Log in</button>
    </form>
    <a href="app.php">Cancel</a>
</body>

</html>