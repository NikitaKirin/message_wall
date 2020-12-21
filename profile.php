<?php
session_start();
if (!$_SESSION['user']){
    header("Location: index.php");
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
        <form class="form-signin">
            <h2><?= $_SESSION['user']['name']?></h2>
            <p><?=$_SESSION['user']['email']?></p>
            <a href="/message_wall/vendor/logout.php" class="btn btn-primary">Выход</a>
        </form>
    </div>
</body>


</html>