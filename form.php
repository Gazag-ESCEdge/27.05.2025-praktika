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
            <a href="./index.php">Главная</a>
            <a href="./my_orders.php">Мои заказы</a>
            <a href="./about.html">О компании</a>
        </nav>
    </header>

    <main class="center">
        <h1>Оформление заказа</h1>
        <form id="form" action="#" method="post">

            <input id="img" type="text" name="img">
            <input id="art" type="text" name="art">
            <input id="name" type="text" name="name">

            <input type="number" name="tel" placeholder="Телефон" required><br>
            <input type="text" name="adress" placeholder="Адрес" required><br>
            <input type="email" name="email" placeholder="e-mail" required><br>
            <button type="submit">Заказать</button>
        </form>
    </main>

    <?php
    $conn = new mysqli('localhost', 'root', '', 'radio33');

    if (isset($_POST['email'])) {
        $stmt = $conn->prepare("INSERT INTO radio33_orders (photo,
                                                        name,
                                                        tel,
                                                        adress,
                                                        email,
                                                        art
            ) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param(
            "ssssss",
            $photo,
            $name,
            $tel,
            $adress,
            $email,
            $art
        );

        $name = $_POST['name'];
        $photo = $_POST['img'];
        $tel = $_POST['tel'];
        $adress = $_POST['adress'];
        $email = $_POST['email'];
        $art = $_POST['art'];

        $stmt->execute();

        $stmt->close();
        $conn->close();
        header("Location: " . $_SERVER['PHP_SELF']);
    }
    ?>

    <footer>
        <div>
            <nav>
                <a href="./index.php">Главная</a><br>
                <a href="./my_orders.php">Мои заказы</a><br>
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

    <script>
        let form = document.getElementById("form")
        form.insertAdjacentHTML("beforebegin", localStorage.getItem("img"))
        form.insertAdjacentHTML("beforebegin", localStorage.getItem("name"))
        form.insertAdjacentHTML("beforebegin", "Артикул: " + localStorage.getItem("art").replaceAll('<span>', ''))

        document.getElementById("img").value = localStorage.getItem("img")
        document.getElementById("art").value = localStorage.getItem("art")
        document.getElementById("name").value = localStorage.getItem("name")
    </script>
</body>

</html>