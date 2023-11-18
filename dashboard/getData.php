<?php
require_once "../config.php";
$conn = new mysqli($DBHOST, $DBUSER, $DBPASS, $DBNAME);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta SQL para obter todos os dados do banco de dados (substitua pela sua consulta real)
$sql = "SELECT * FROM tbl_clientes_system";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row['nome']; // Substitua 'nome_coluna' pelo nome da coluna que deseja exibir
    }
}

$conn->close();

// Retorna os dados em formato JSON
echo json_encode($data);
?>
