<?php
session_start();
if (!$_SESSION['user']) {
    header("Location: index.php");
}
require './vendor/show_comments.php';
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="/message_wall/styles/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="/message_wall/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <title>Стена сообщений</title>
</head>
<header class="header">
    <div class="overlay"></div>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="profile.php">Стена сообщений</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-2">
                <!-- <li class="nav-item">
                    <a class="nav-link" data-value="about" href="#">About</a> </li> -->
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
            <a href="#table"> <button href="" class="btn btn-outline-secondary btn-lg">Перейти к стене сообщений</button></a>

        </div>
    </div>
</header>

<body>
    <div id="table">
        <table class="table table-hover">
            <?php if (isset($_SESSION['tmessage'])) { ?> <div class="alert alert-success" role="alert"><?php echo htmlspecialchars($_SESSION['tmessage']);
                                                                                                        unset($_SESSION['tmessage']); ?></div> <?php } ?>
            <?php if (isset($_SESSION['fmessage'])) { ?> <div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($_SESSION['fmessage']);
                                                                                                        unset($_SESSION['fmessage']); ?></div> <?php } ?>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Сообщение</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>

            <tbody>
                <?php if (isset($result)) {
                    foreach ($result as $person) { ?>
                        <tr>
                            <td><?= $person['id'] ?></td>
                            <td><?= $person['username'] ?></td>
                            <td><?= $person['text'] ?></td>
                            <td><?= $person['date'] ?></td>
                            <td>
                                <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?= $person['id'] ?>"><i class="fa fa-edit"></i></a>

                                <a href="./vendor/delete.php?id=<?= $person['id'] ?>&date=<?= $person['date'] ?>&user_id=<?= $person['user_id'] ?>" class=" btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                <?php require './vendor/modal.php'; ?>
                            </td>
                        </tr>
                        </tr> <?php }
                        } ?>
            </tbody>
        </table>
        <div class="container">
            <form method="POST" action="/message_wall/vendor/log_comment.php">
                <div class="form-group">
                    <?php if (isset($_SESSION['tmessage'])) { ?> <div class="alert alert-success" role="alert"><?php echo htmlspecialchars($_SESSION['tmessage']);
                                                                                                                unset($_SESSION['tmessage']); ?></div> <?php } ?>
                    <?php if (isset($_SESSION['fmessage'])) { ?> <div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($_SESSION['fmessage']);
                                                                                                                unset($_SESSION['fmessage']); ?></div> <?php } ?>
                    <label for="exampleFormControlTextarea1">Оставьте свой комментарий!</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text_comment"></textarea>
                    <input type="hidden" name="page_id" value="150">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src='js/main.js'></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>


</html>