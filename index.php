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
            <b><a href="./index.php">Главная</a></b>
            <a href="./my_orders.php">Мои заказы</a>
            <a href="./about.html">О компании</a>
        </nav>
    </header>

    <main>
        <?php
        $conn = new mysqli('localhost', 'root', '', 'radio33');

        $sql = "SELECT * FROM radio33_products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo
                "<section>" .
                    "<img src='" . $row["photo"] . "'>" .
                    "<div>" .
                        "<h3>" . $row["name"] . "</h3>" .
                        "<h4>Общие характеристики</h4>" .
                        "<p>Артикул: <span>" . $row["art"] . "</span><br>" .
                        $row["descr"] . "</b></p>" .
                        "<button onclick='add(this.parentNode.parentNode)'>Заказать</button>" .
                    "</div>" .
                "</section>";
            }
        } else {
            echo "<h2>Нет товаров! Пожалуйста, зайдите позже.</h2>";
        }

        $conn->close();
        ?>
    </main>

    <footer>
        <div>
            <nav>
                <b><a href="./index.php">Главная</a></b><br>
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
        function add(x){
            y=x
            localStorage.setItem('img', y.querySelector('img').outerHTML);
            localStorage.setItem('name', y.querySelector('h3').outerHTML);
            localStorage.setItem('art', y.querySelector('span').outerHTML);
            window.location.href = './form.php';
        }
    </script>
</body>

</html>