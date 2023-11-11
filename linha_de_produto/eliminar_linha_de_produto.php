<?php

require_once "../config.php";
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $idProduto = $_GET['id'];

    $conection_bd = mysqli_connect($DBHOST, $DBUSER, $DBPASS, $DBNAME);
    $resul = $conection_bd->query("SELECT * FROM linha_de_produto WHERE id = $idProduto");
    $row_image = $resul->fetch_array();
    unlink($row_image['imagem']);

    try {
        $pdo = new PDO("mysql:host=$DBHOST;dbname=$DBNAME;charset=utf8", $DBUSER, $DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("DELETE FROM linha_de_produto WHERE id = :id");
        $stmt->bindParam(':id', $idProduto);
        $stmt->execute();
        header("Location: visualizar_linha_de_produto.php?eliminado");
        exit;
    } catch (PDOException $e) {
        // echo "Erro de conexão com o banco de dados: " . $e->getMessage();
        header("Location: visualizar_linha_de_produto.php?error");

    }
}

?>