<?php

require_once "../config.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $idProduto = $_GET['id'];

    require_once "../config.php";
    $conection_bd = mysqli_connect($DBHOST, $DBUSER, $DBPASS, $DBNAME);
    // $resul = $conection_bd->query("SELECT * FROM agregar WHERE id = $idProduto");
    // $row_image = $resul->fetch_array();
    // unlink($row_image['imagem']);


    try {
        $pdo = new PDO("mysql:host=$DBHOST;dbname=$DBNAME;charset=utf8", $DBUSER, $DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("DELETE FROM agregar WHERE id = :id");
        $stmt->bindParam(':id', $idProduto);
        $stmt->execute();
        header("Location: visualizar_agregar.php?eliminado");
        exit;
    } catch (PDOException $e) {
        // echo "Erro de conexão com o banco de dados: " . $e->getMessage();
        header("Location: visualizar_agregar.php?error");

    }
}


?>