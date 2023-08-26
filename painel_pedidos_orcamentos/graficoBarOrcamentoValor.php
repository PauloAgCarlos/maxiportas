<?php
    $conn = mysqli_connect("localhost", "root", "", "maxportas");

    $selectdados = mysqli_query($conn, "SELECT valor, orcamentos, pedidos FROM painel_pedidos_orcamentos ORDER BY orcamentos ASC");
    $orcamentos = [];
    $valor = [];
    $pedidos = [];

    while($linha = mysqli_fetch_array($selectdados, MYSQLI_ASSOC)){
        $orcamentos[] = "'{$linha['orcamentos']}'";
        $valor[] = $linha['valor'];
        $pedidos[] = $linha['pedidos'];
    }

    $orcamentos = implode(',', $orcamentos);
    $valor = implode(',', $valor);
    $pedidos = implode(',', $pedidos);
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
                    name: "HJ Alúminio - Orçamentos/Pedidos",
                    data: [<?= $orcamentos;?>, <?= $pedidos;?>],
                    backgrounColor: barColor
                }
            ],
            xaxis: {
                categories: ['Orcamentos', 'Pedidos'],
            }
        };
        let chart = new ApexCharts(el, options);
        chart.render();
    </script>
</body>
</html>