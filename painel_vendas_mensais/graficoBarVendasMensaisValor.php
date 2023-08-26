<?php
    $conn = mysqli_connect("localhost", "root", "", "maxportas");

    $selectdados = mysqli_query($conn, "SELECT ano_mes, valor FROM painel_vendas_mensais ORDER BY ano_mes ASC");
    $ano_mes = [];
    $valor = [];

    while($linha = mysqli_fetch_array($selectdados, MYSQLI_ASSOC)){
        $ano_mes[] = "'{$linha['ano_mes']}'";
        $valor[] = $linha['valor'];
    }

    $ano_mes = implode(',', $ano_mes);
    $valor = implode(',', $valor);
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
                    data: [<?= $valor;?>],
                    backgrounColor: barColor
                }
            ],
            xaxis: {
                categories: [<?= $ano_mes;?>],
            }
        };
        let chart = new ApexCharts(el, options);
        chart.render();
    </script>
</body>
</html>