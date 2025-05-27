<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>radio33</title>
    <link href="./assets/css/styles.css" rel="stylesheet">
</head>

<body>
    <header>
        <img src="./assets/img/logo.png" alt="Лого">
        <nav>
            <a href="./index.html">Главная</a>
            <a href="#">Мои заказы</a>
            <a href="./about.html">О компании</a>
        </nav>
    </header>

    <main class="center">
        <h1>Вход</h1>
        <form id="form" action="#" method="post">
            <input type="text" name="login" placeholder="Логин" required><br>
            <input type="password" name="password" placeholder="Пароль" required><br>
            <button type="submit">Войти</button>
        </form>
        <?php
        if (isset($_POST["login"]) and isset($_POST["password"])) {
            if ($_POST["login"] == "admin" and $_POST["password"] == "admin") {
                header("Location: ./admin89798654236598741479956121.php");
            } else {
                echo "<p>Неправильный логин или пароль</p>";
            }
        }
        ?>
    </main>

    <footer>
        <div>
            <nav>
                <a href="./index.html">Главная</a><br>
                <a href="#">Мои заказы</a><br>
                <a href="./about.html">О компании</a>
            </nav>
        </div>
        <div>
            <nav>
                <span>+7(900)888-95-65</span><br>
                <a href="mailto:radio33@mail.ru">radio33@mail.ru</a><br>
                <a class="a_admin" href="./login.php">Панель администратора</a>
            </nav>
        </div>
    </footer>
</body>

</html>