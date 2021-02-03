<?php
ini_set('session.use_cookies', '0');
ini_set('session.use_only_cookies', 0);
ini_set('session.use_trans_sid', 1);

session_start();
?>
<h1>Cookieless</h1>
<?php
if (!isset($_SESSION['val'])) {
    echo "<strong>Session is empty</strong><br>";
    $_SESSION['val'] = 0;
} else if ($_SESSION['val'] < 3) {
    $_SESSION['val']++;
    echo "<p>Update to $_SESSION[val]</p>";
} else {
    session_destroy();
    session_start();
    echo '<p>Restarted</p>';
}
?>
<p><a href="cookies.php">Check GET</a></p>

<form method="POST"><input type="submit" value="Check POST"></form>
<pre><code>ID : <?= session_id() ?> <br><?php print_r($_SESSION) ?></code></pre>