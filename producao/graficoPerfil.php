<?php
    
    require_once "../config.php";
    $conn = mysqli_connect($DBHOST, $DBUSER, $DBPASS, $DBNAME);

    $selectdados = mysqli_query($conn, "SELECT valor, descricao_produto_pedido, SUM(valor) as total_valor FROM painel_pedidos_orcamentos WHERE valor > 0 AND status = 'Finalizado' GROUP BY descricao_produto_pedido");
    $descricao_produto_pedido = [];
    $valor = [];

    while($linha = mysqli_fetch_array($selectdados, MYSQLI_ASSOC)){
        $descricao_produto_pedido[] = "'{$linha['descricao_produto_pedido']}'";
        $valor[] = $linha['valor'];
    }

    $descricao_produto_pedido = implode(',', $descricao_produto_pedido);
    $valor = implode(',', $valor);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="Chart.min.js"></script>

    <style>
        .apexcharts-toolbar
        {
            display:none !important;
        }
    </style>
</head>
<body>
<canvas id="myChartP" style="width:180%;"></canvas>

<script>
    var xValues = ['Atrazados','Dentro do Prazo','Produzido'];
    // var xValues = ['Atrazados','Dentro do Prazo','Produzido', 'Atrazados','Dentro do Prazo','Produzido', 'Atrazados','Dentro do Prazo','Produzido', 'Atrazados'];

    new Chart("myChartP", {
    type: "line",
    // with: 900,
    // height: 1000,
    data: {
        labels: xValues,
        // datasets: [
        //     { 
        //     data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
        //     borderColor: "red",
        //     fill: false
        //     }, 
        //     { 
        //     data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
        //     borderColor: "green",
        //     fill: false
        //     }, 
        //     { 
        //     data: [300,700,2000,3000,4000,6000,7000,6900,9000,10000],
        //     borderColor: "blue",
        //     fill: false
        //     }
        // ]
        datasets: [
            { 
            data: [],
            borderColor: "red",
            fill: false
            }, 
            { 
            data: [],
            borderColor: "green",
            fill: false
            }, 
            { 
            data: [],
            borderColor: "blue",
            fill: false
            }
        ]
    },
    options: {
        legend: {display: false}
    }
    });
</script>
</body>
</html>