<?php
session_start();
if ($_SESSION['user']) {
    header("Location: profile.php");
}
require('./templates/head.php');
?>
<body>
    <div class="container">
        <form class="form-signin" method="POST" action="/message_wall/vendor/signin.php">
            <h2>Войти</h2>
            <?php if (isset($_SESSION['tmessage'])) { ?> <div class="alert alert-success" role="alert"><?php echo htmlspecialchars($_SESSION['tmessage']);
                                                                                                        unset($_SESSION['tmessage']); ?></div> <?php } ?>
            <?php if (isset($_SESSION['fmessage'])) { ?> <div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($_SESSION['fmessage']);
                                                                                                        unset($_SESSION['fmessage']); ?></div> <?php } ?>
            <input type="text" name="username" class="form-control" placeholder="username" required>
            <input type="text" name="password" class="form-control" placeholder="password" required>
            <button type="submit" class="btn btn-primary">Войти</button>
            <a href="register.php" class="btn btn-primary">Зарегистрироваться</a>
        </form>
    </div>
</body>


</html>