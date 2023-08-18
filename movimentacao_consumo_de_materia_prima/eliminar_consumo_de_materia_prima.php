<?php

    $host = 'localhost';
$dbname = 'maxportas';
$username = 'root';
$password = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $idProduto = $_GET['id'];

    $servername = "localhost";
    $user = "root";
    $senha = "";
    $bdn = "maxportas";
    $conection_bd = mysqli_connect($servername, $user, $senha, $bdn);
    $resul = $conection_bd->query("SELECT * FROM movimentacao_consumo_de_materia_prima WHERE id = $idProduto");
    $row_image = $resul->fetch_array();
    unlink($row_image['imagem']);

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("DELETE FROM movimentacao_consumo_de_materia_prima WHERE id = :id");
        $stmt->bindParam(':id', $idProduto);
        $stmt->execute();
        header("Location: visualizar_consumo_de_materia_prima.php?eliminado");
        exit;
    } catch (PDOException $e) {
        // echo "Erro de conexão com o banco de dados: " . $e->getMessage();
        header("Location: visualizar_consumo_de_materia_prima.php?error");

    }
}

?>