<?php

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
$sql = "SELECT descricao_produto_pedido, SUM(qtd_produto_pedido) as total_qtd FROM painel_pedidos_orcamentos WHERE qtd_produto_pedido > 0 AND status = 'Finalizado' GROUP BY descricao_produto_pedido";

$result = $conn->query($sql);

// if ($result->num_rows > 0) {
    $descricaoProduto = [];
    $totalQuantidade = [];
    // Loop através dos resultados da consulta
    while ($row = $result->fetch_assoc()) {
        $descricaoProduto[] = "'{$row['descricao_produto_pedido']}'";
        $totalQuantidade[] = $row["total_qtd"];
    }

    $descricaoProduto = implode(',', $descricaoProduto);
    $totalQuantidade = implode(',', $totalQuantidade);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="Chart.min.js"></script>

    <style> .apexcharts-toolbar { display:none !important; } </style>
</head>
<body>
<canvas id="myChartV" style="width:180%;"></canvas>

<script>
    var xValues = ['Atrazados','Dentro do Prazo','Produzido'];

    new Chart("myChartV", {
    type: "line",
    // with: 900,
    // height: 1000,
    data: {
        labels: xValues,
        datasets: [{ 
        data: [],
        borderColor: "red",
        fill: false
        }, { 
        data: [],
        borderColor: "green",
        fill: false
        }, { 
        data: [],
        borderColor: "blue",
        fill: false
        }]
        // datasets: [{ 
        // data: [860,7830,2478],
        // borderColor: "red",
        // fill: false
        // }, { 
        // data: [1600,6000,7000],
        // borderColor: "green",
        // fill: false
        // }, { 
        // data: [300,700,2000],
        // borderColor: "blue",
        // fill: false
        // }]
    },
    options: {
        legend: {display: false}
    }
    });
</script>
</body>
</html>