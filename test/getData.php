<?php
// Conexão com o banco de dados (substitua pelos seus dados reais)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maxportas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Parâmetro de pesquisa
$searchTerm = $_GET['searchTerm'];

// Consulta SQL para obter dados do banco de dados com base no campo específico (substitua pela sua consulta real)
$sql = "SELECT * FROM tbl_clientes_system WHERE nome LIKE '%$searchTerm%' OR cep LIKE '%$searchTerm%'"; // Substitua 'campo' pelo nome do campo que deseja pesquisar
$result = $conn->query($sql);

$databaseNames = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $databaseNames[] = "Nome: ". $row['nome'] . " CEP: " . $row['cep'];
    }
}

$conn->close();

// Retorna os nomes do banco de dados em formato JSON
echo json_encode($databaseNames);
?>