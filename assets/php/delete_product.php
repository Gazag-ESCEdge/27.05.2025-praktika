<?php
if(isset($_POST["id"]))
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=radio33", "root", '');
        $sql = "DELETE FROM radio33_products WHERE id = :radio33_productsid";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":radio33_productsid", $_POST["id"]);
        $stmt->execute();
        header("Location: ./../../admin89798654236598741479956121.php");
    }
    catch (PDOException $e) {
        echo "Ошибка базы данных: " . $e->getMessage();
    }
}
?>