<?php
session_start();
if ($_SESSION['user']) {
    header("Location: profile.php");
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="/message_wall/styles/styles.css" rel="stylesheet">
    <title>Стена сообщений</title>
</head>


<body>
    <div class="container">
        <form class="form-signin" method="POST" action="/message_wall/vendor/signin.php">
            <h2>Войти</h2>
            <?php if (isset($_SESSION['message'])) { ?> <div class="alert alert-success" role="alert"><?php echo htmlspecialchars($_SESSION['message']);
                                                                                                        unset($_SESSION['message']); ?></div> <?php } ?>
            <input type="text" name="username" class="form-control" placeholder="username" required>
            <input type="text" name="password" class="form-control" placeholder="password" required>
            <button type="submit" class="btn btn-primary">Войти</button>
            <a href="register.php" class="btn btn-primary">Зарегистрироваться</a>
        </form>
    </div>
</body>


</html>