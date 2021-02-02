<?php
require_once "pdo.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users CRUD</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Passwords</th>
            <th>Action</th>
            <?php
            $stm = $pdo->query("select * from users");
            while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[password]</td>
                    <td>
                    <form method='POST'>
                    <input type='hidden' name='u_id' value='$row[user_id]'>
                    <button name='delete' value='true'>Delete</button>
                    </form>
                    </td>
                </tr>";
            }
            ?>
        </tr>
    </table>

</body>

</html>