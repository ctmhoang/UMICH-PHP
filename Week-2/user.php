<?php
require_once "pdo.php";

if (isset($_POST['name'], $_POST['email'], $_POST['pass'])) {
    $sql = 'insert into users (name,email,password) values (:name, :email, :password)';
    echo "<pre>$sql</pre>";
    $stm = $pdo->prepare($sql);
    $stm->execute([':name' => $_POST['name'], ':email' => $_POST['email'], ':password' => $_POST['pass']]);
    echo 'Add successfully';
} else if (isset($_POST['delete'], $_POST['u_id'])) {
    $sql = 'delete from users where user_id = :uid';
    echo "<pre>$sql</pre>";
    $stm = $pdo->prepare($sql);
    $stm->execute(['uid' => $_POST['u_id']]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users CRUD</title>
    <style>
        label {
            display: block
        }

        ;
    </style>
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
    <form method="post">
        <p>Add a new users</p>
        <label for="name">Name: <input type="text" name="name"></label>
        <label for="email">Email: <input type="email" name="email"></label>
        <label for="pass">Passwords: <input type="password" name="pass"></label>
        <button>Add</button>
    </form>
</body>

</html>