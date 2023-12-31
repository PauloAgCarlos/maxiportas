<?php

    // require_once "../controllers/controllers_clientes.php";
    
    // $id_delete = $_POST['eliminar_clientes'];
    // $delete = new controllers_clientes();

    // if($delete->delete($id_delete)):
    //     header('Location: visualizar_clientes.php');
    // endif;

    
// Substitua essas informações pelas suas configurações de conexão com o banco de dados
require_once "../config.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $idProduto = $_GET['id'];

    try {
        $pdo = new PDO("mysql:host=$DBHOST;dbname=$DBNAME;charset=utf8", $DBUSER, $DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("DELETE FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $idProduto);
        $stmt->execute();
        header("Location: visualizar_clientes.php?eliminado");
        exit;
    } catch (PDOException $e) {
        // echo "Erro de conexão com o banco de dados: " . $e->getMessage();
        header("Location: visualizar_clientes.php?error");

    }
}

?>