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
    <table class="table table-hover">
        <thead>
            <tr>
                <!-- <th scope="col">#</th> -->
                <th scope="col">Имя</th>
                <th scope="col">Сообщение</th>
                <th scope="col">Дата</th>
                <!-- <th scope="col">Действия</th> -->
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($_SESSION['comments'] as $person) { ?>
                <tr>
                    <th><?= $person['username'] ?></th>
                    <th><?= $person['text'] ?></th>
                    <th><?= $person['date'] ?></th>
                </tr> <?php } ?>

            <!-- <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr> -->
        </tbody>
    </table>
    <div class="container">
        <form method="POST" action="/message_wall/vendor/log_comment.php">
            <div class="form-group">
                <?php if (isset($_SESSION['message'])) { ?> <div class="alert alert-success" role="alert"><?php echo htmlspecialchars($_SESSION['message']);
                                                                                                            unset($_SESSION['message']); ?></div> <?php } ?>
                <label for="exampleFormControlTextarea1">Оставьте свой комментарий!</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text_comment"></textarea>
                <input type="hidden" name="page_id" value="150">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </form>
    </div>
    <script type="text/javascript" src='js/main.js'></script>
</body>


</html>