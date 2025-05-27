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
            <a href="./admin89798654236598741479956121.php">Товары</a>
            <a href="add898754562324654069.php">Добавить товар</a>
            <b><a href="./orders807234578746.php">Заказы</a></b>
        </nav>
    </header>

    <main>
    <?php
        $conn = new mysqli('localhost', 'root', '', 'radio33');

        $sql = "SELECT * FROM radio33_orders";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo
                "<section>" .
                    $row["photo"] .
                    "<div>" .
                        "<h3>" . $row["name"] . "</h3>" .
                        "<p>Артикул: " . $row["art"] . "<br>" .
                        "Телефон: " . $row["tel"] . "<br>" .
                        "e-mail: " . $row["email"] . "<br>" .
                        "Адрес: " . $row["adress"] . "<br>" .
                        "</p>" .
                        "<form class='button' action='./assets/php/delete_order.php' method='post'>
                            <input type='hidden' name='id' value='" . $row["id"] . "' />
                            <input class='button' type='submit' value='Отменить заказ'>
                        </form>" .
                    "</div>" .
                "</section>";
            }
        } else {
            echo "<h2>Пока что нет заказов.</h2>";
        }

        $conn->close();
        ?>
    </main>

    <footer>
        <div>
            <nav>
                <a href="./admin89798654236598741479956121.php">Товары</a><br>
                <a href="add898754562324654069.php">Добавить товар</a><br>
                <b><a href="./orders807234578746.php">Заказы</a></b><br>
            </nav>
        </div>
        <div>
            <nav>
                <span>+7(900)888-95-65</span><br>
                <a href="mailto:radio33@mail.ru">radio33@mail.ru</a><br>
                <a class="a_admin" href="./index.php">Выйти</a>
            </nav>
        </div>
    </footer>
</body>

</html>