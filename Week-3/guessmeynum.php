<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (isset($_POST['old_guess'])) $_SESSION['old_guess'] = $_POST['old_guess'];

if (isset($_SESSION['res'], $_SESSION['old_guess'])) {

    $old_guess = $_SESSION['old_guess'];
    unset($_SESSION['old_guess']);

    $_SESSION['guesses']--;

    if ($_SESSION['guesses'] == 0) {
        $message = "Sorry you ran out of guesses.";
        unset($_SESSION['res']);
    } else {
        $res = (int)$_SESSION['res'];
        if ($res == $old_guess) {
            $message = "Congrats, secret number was: $res";
            unset($_SESSION['res']);
        } else if ($old_guess > $res)
            $message = "Too High";
        else $message = "Too Low";
    }
    $_SESSION['message'] = $message;
    print_r($_POST);
    print_r($_SESSION);
    header('Location: guessmeynum.php');
    return;
} else if(!isset($_SESSION['res'])) {
    $_SESSION['message'] = "Type a value and start the game";
    $_SESSION['res'] = rand(0, 100);
    $_SESSION['guesses'] = 10;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess Mey Num</title>
</head>

<body>
    <h1>Guessing Number</h1>
    <p><strong>You have <?= $_SESSION['guesses'] ?> guesses</strong></p>
    <p>
        <emp><?= $_SESSION['message'] ?></emp>
    </p>
    <form method="post">
        <label for="old_guess"><input type="number" name="old_guess" min=0 max=100></label>
        <button>Submit</button>
    </form>
</body>

</html>