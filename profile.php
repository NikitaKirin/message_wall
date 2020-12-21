<?php
session_start();
if (!$_SESSION['user']) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="/message_wall/styles/styles.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <title>Стена сообщений</title>
</head>

<!-- navbar -->
<header class="header">
    <div class="overlay"></div>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="profile.php">Стена сообщений</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-2">
                <li class="nav-item">
                    <a class="nav-link" data-value="about" href="#">About</a> </li>
                <li class="nav-item">
                    <a href="/message_wall/vendor/logout.php" class="nav-link">Выход</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="description">
            <h2>Добро пожаловать, <?= htmlspecialchars($_SESSION['user']['name']) ?> !</h2>
            <p> Мы рады приветствовать вас на стене сообщений!
            </p>
            <button class="btn btn-outline-secondary btn-lg">Перейти к стене сообщений</button> 
        </div>
    </div>
</header>

<body>
    <div class="container">
        <form class="form-signin">
            <h2><?= $_SESSION['user']['name'] ?></h2>
            <p><?= $_SESSION['user']['email'] ?></p>
            <a href="/message_wall/vendor/logout.php" class="btn btn-primary">Выход</a>
        </form>
    </div>
    <script type="text/javascript" src='js/main.js'></script>
</body>


</html>