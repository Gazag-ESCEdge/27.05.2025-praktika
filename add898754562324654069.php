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
            <b><a href="add898754562324654069.php">Добавить товар</a></b>
            <a href="./orders807234578746.php">Заказы</a>
        </nav>
    </header>

    <main class="center">
        <h1>Добавление товара</h1>
        <form id="form" action="#" method="post">
            <input type="text" name="photo" placeholder="Ссылка на фото" required><br>
            <input type="text" name="name" placeholder="Название" required><br>
            <input type="text" name="art" placeholder="Артикул" required><br>
            <textarea name="descr" placeholder="Описание в формате html. Пример: 
Ток: <b>3 А</b><br>Тип: транзистор<br>Напряжение: 40 в" required></textarea><br>
            <button type="submit" onclick="create_order()">Добавить</button>
        </form>
    </main>

    <footer>
        <div>
            <nav>
                <a href="./admin89798654236598741479956121.php">Товары</a><br>
                <b><a href="add898754562324654069.php">Добавить товар</a></b><br>
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

    <?php
    $conn = new mysqli('localhost', 'root', '', 'radio33');

    if (isset($_POST['photo']) and isset($_POST['name']) and isset($_POST['art']) and isset($_POST['descr'])) {
        $stmt = $conn->prepare("INSERT INTO radio33_products (photo,
                                                        name,
                                                        art,
                                                        descr
            ) VALUES (?,?,?,?)");
        
        $stmt->bind_param(
            "ssss",
            $photo,
            $name,
            $art,
            $descr
        );

        $name = $_POST['name'];
        $photo = $_POST['photo'];
        $art = $_POST['art'];
        $descr = $_POST['descr'];

        $stmt->execute();

        $stmt->close();
        $conn->close();
        header("Location: " . $_SERVER['PHP_SELF']);
    }
    ?>
</body>

</html>