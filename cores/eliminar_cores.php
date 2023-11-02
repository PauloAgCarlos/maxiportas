<?php

require_once "../config.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $idProduto = $_GET['id'];

    $conection_bd = mysqli_connect($DBHOST, $DBUSER, $DBPASS, $DBNAME);
    // $resul = $conection_bd->query("SELECT * FROM cores WHERE id = $idProduto");
    // $row_image = $resul->fetch_array();
    // unlink($row_image['imagem']);


    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("DELETE FROM cores WHERE id = :id");
        $stmt->bindParam(':id', $idProduto);
        $stmt->execute();
        header("Location: visualizar_cores.php?eliminado");
        exit;
    } catch (PDOException $e) {
        // echo "Erro de conexão com o banco de dados: " . $e->getMessage();
        header("Location: visualizar_cores.php?error");

    }
}


?>