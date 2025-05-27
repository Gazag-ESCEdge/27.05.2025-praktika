<?php
if(isset($_POST["id"]))
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=radio33", "root", '');
        $sql = "DELETE FROM radio33_orders WHERE id = :radio33_ordersid";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":radio33_ordersid", $_POST["id"]);
        $stmt->execute();
        header("Location: ./../../orders807234578746.php");
    }
    catch (PDOException $e) {
        echo "Ошибка базы данных: " . $e->getMessage();
    }
}
?>
