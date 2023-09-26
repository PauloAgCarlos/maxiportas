<?php
// Conexão com o banco de dados (substitua com suas próprias informações)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maxportas";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta SQL para calcular a soma de qtd_produto_pedido
$sql = "SELECT descricao_produto_pedido, SUM(qtd_produto_pedido) as total_qtd FROM painel_pedidos_orcamentos WHERE qtd_produto_pedido > 0 GROUP BY descricao_produto_pedido";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop através dos resultados da consulta
    while ($row = $result->fetch_assoc()) {
        $descricaoProduto = $row["descricao_produto_pedido"];
        $totalQuantidade = $row["total_qtd"];
        
        // Use $descricaoProduto e $totalQuantidade conforme necessário
        echo "Descrição do Produto: " . $descricaoProduto . "<br>";
        echo "Total Quantidade: " . $totalQuantidade . "<br>";
    }
} else {
    echo "Nenhum resultado encontrado.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
