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