<?php
session_start();
if ($_SESSION['user']) {
    header("Location: profile.php");
}
require('./templates/head.php');
?>

<body>
    <div class="container">
        <form class="form-signin" method="POST" action="/message_wall/vendor/signup.php">
            <h2>Регистрация</h2>
            <?php if (isset($_SESSION['tmessage'])) { ?> <div class="alert alert-success" role="alert"><?php echo $_SESSION['tmessage'];
                                                                                                        unset($_SESSION['tmessage']); ?></div> <?php } ?>
            <?php if (isset($_SESSION['fmessage'])) { ?> <div class="alert alert-success" role="alert"><?php echo $_SESSION['fmessage'];
                                                                                                        unset($_SESSION['fmessage']); ?></div> <?php } ?>
            <input type="text" name="username" class="form-control" placeholder="username" required>
            <input type="text" name="email" class="form-control" placeholder="e-mail" required>
            <input type="text" name="password" class="form-control" placeholder="password" required>
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
            <a href="index.php" class="btn btn-primary">Авторизироваться</a>
        </form>
    </div>
</body>

</html>