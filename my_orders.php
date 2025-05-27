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
            <b><a href="./my_orders.php">Мои заказы</a></b>
            <a href="./about.html">О компании</a>
        </nav>
    </header>

    <main class="center">
        <h1>Мои заказы</h1>
        <p>Введите свою электронную почту и номер телефона, чтобы найти ваши заказы</p>
        <form class="line-form" action="#" method="post">
            <input type="number" name="tel" placeholder="Телефон" required>
            <input type="email" name="email" placeholder="e-mail" required>
            <button type="submit">Найти</button>
        </form>
    </main>

    <main>
        <?php
            if (isset($_POST['tel']) and isset($_POST['email'])){
                $conn = new mysqli('localhost', 'root', '', 'radio33');

                $sql = "SELECT * FROM radio33_orders WHERE tel=" . $_POST['tel'] . " AND email='" . $_POST['email'] . "'";
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
                                "<form class='button' action='./assets/php/delete_user_order.php' method='post'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <input class='button' type='submit' value='Отменить заказ'>
                                </form>" .
                            "</div>" .
                        "</section>";
                    }
                } else {
                    echo "<h2>Нет заказов с номером телефона " . $_POST['tel'] . " и адресом " . $_POST['email'] . ".</h2>";
                }
        
                $conn->close();
            }
        ?>
    </main>

    <footer>
        <div>
            <nav>
                <a href="./index.php">Главная</a><br>
                <b><a href="./my_orders.php">Мои заказы</a></b><br>
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