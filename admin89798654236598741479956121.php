<?php
$host = 'localhost';
$db_user = 'root';
$db_password = '';

try {
    $pdo = new PDO("mysql:host=$host", $db_user, $db_password);
    $sql = "CREATE DATABASE IF NOT EXISTS radio33";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}

$pdo = new PDO("mysql:host=$host;dbname=radio33", $db_user, $db_password);

$sql = "CREATE TABLE IF NOT EXISTS radio33_orders
            (id INT PRIMARY KEY AUTO_INCREMENT,
            photo VARCHAR(500),
            name VARCHAR(100),
            tel VARCHAR(50),
            adress VARCHAR(500),
            email VARCHAR(100),
            art VARCHAR(100))";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$sql = "CREATE TABLE IF NOT EXISTS radio33_products
            (id INT PRIMARY KEY AUTO_INCREMENT,
            photo VARCHAR(500),
            name VARCHAR(100),
            art VARCHAR(100),
            descr TEXT)";
$stmt = $pdo->prepare($sql);
$stmt->execute();
?>

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
            <b><a href="./admin89798654236598741479956121.php">Товары</a></b>
            <a href="add898754562324654069.php">Добавить товар</a>
            <a href="./orders807234578746.php">Заказы</a>
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
                        "<form class='button' action='./assets/php/delete_product.php' method='post'>
                            <input type='hidden' name='id' value='" . $row["id"] . "' />
                            <input class='button' type='submit' value='Удалить'>
                        </form>" .
                    "</div>" .
                "</section>";
            }
        } else {
            echo "<h2>Нет товаров! Для добавления перейдите на страницу 'Добавить товар'</h2>";
        }

        $conn->close();
        ?>
    </main>

    <footer>
        <div>
            <nav>
                <b><a href="./admin89798654236598741479956121.php">Товары</a></b><br>
                <a href="add898754562324654069.php">Добавить товар</a><br>
                <a href="./orders807234578746.php">Заказы</a><br>
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