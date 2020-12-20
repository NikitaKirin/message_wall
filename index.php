<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
    <title>Стена сообщений</title>
</head>
<?php
require('connect.php');
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $query = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
    $STH = $DBH->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $STH->execute(array(':username' => $username, 'password' => $password, 'email' => $email));
    if ($STH) {
        $tmsg = "Регистрация прошла успешно";
    } else {
        $fmsg = "Ошибка регистрации";
    }
}
?>

<body>
    <div class="container">
        <form class="form-signin" method="POST">
            <h2>Регистрация</h2>
            <?php if (isset($tmsg)) { ?> <div class="alert alert-success" role="alert"><?php echo $tmsg; ?></div> <?php } ?>
            <?php if (isset($fmsg)) { ?> <div class="alert alert-success" role="alert"><?php echo $ftmsg; ?></div> <?php } ?>
            <input type="text" name="username" class="form-control" placeholder="username" required>
            <input type="text" name="email" class="form-control" placeholder="e-mail" required>
            <input type="text" name="password" class="form-control" placeholder="password" required>
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>
    </div>
</body>

</html>