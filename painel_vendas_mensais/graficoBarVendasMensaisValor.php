<?php
    
    require_once "../config.php";
    $conn = mysqli_connect($DBHOST, $DBUSER, $DBPASS, $DBNAME);

    $selectdados = mysqli_query($conn, "SELECT valor, descricao_produto_pedido, ano, SUM(valor) as total_valor FROM painel_pedidos_orcamentos WHERE status = 'Finalizado' GROUP BY ano ORDER BY ano ASC");
    $ano = [];
    $total_valor = [];

    while($linha = mysqli_fetch_array($selectdados, MYSQLI_ASSOC)){
        $ano[] = "'{$linha['ano']}'";
        $total_valor[] = $linha['total_valor'];
    }

    $ano = implode(',', $ano);
    $total_valor = implode(',', $total_valor);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="apexcharts.min.js"></script>

    <style>
        .apexcharts-toolbar
        {
            display:none !important;
        }
    </style>
</head>
<body>
    <div id="grafico" style="z-index: 0 !important;">
    </div>

    <script>
        let el = document.getElementById('grafico');
        let barColor = [
            "#b91d47",
            "#e8c3b9",
            "#f00",
            "#000",
            "fff"
            ];
        let options = {
            chart: {
                type: 'bar',
                width: 400,
                height: 500
            },
            series: [
                {
                    name: "HJ Alúminio - Valor (R$)",
                    data: [<?= $total_valor;?>],
                    backgrounColor: barColor
                }
            ],
            xaxis: {
                categories: [<?= $ano;?>],
            }
        };
        let chart = new ApexCharts(el, options);
        chart.render();
    </script>
</body>
</html>