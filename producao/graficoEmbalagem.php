<!-- <php
    $conn = mysqli_connect("localhost", "root", "", "maxportas");

    $selectdados = mysqli_query($conn, "SELECT valor, descricao_produto_pedido, SUM(valor) as total_valor FROM painel_pedidos_orcamentos WHERE valor > 0 AND status = 'Finalizado' GROUP BY descricao_produto_pedido");
    $descricao_produto_pedido = [];
    $valor = [];

    while($linha = mysqli_fetch_array($selectdados, MYSQLI_ASSOC)){
        $descricao_produto_pedido[] = "'{$linha['descricao_produto_pedido']}'";
        $valor[] = $linha['valor'];
    }

    $descricao_produto_pedido = implode(',', $descricao_produto_pedido);
    $valor = implode(',', $valor);
?> -->

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
    
    <canvas id="myChartE" style="width:180%;"></canvas>

    <script>
        var xValues = ['Atrazados','Dentro do Prazo','Produzido'];

        new Chart("myChartE", {
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
        },
        options: {
            legend: {display: false}
        }
        });
    </script>
</body>
</html>