<!-- <php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "maxportas";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $sql = "SELECT valor, descricao_produto_pedido, SUM(valor) as total_valor FROM painel_pedidos_orcamentos WHERE valor > 0 GROUP BY descricao_produto_pedido";
    $result = $conn->query($sql);

    $totalValor = [];
    $descricao_produto_pedido = [];
    
    while ($row = $result->fetch_assoc()) {
        $totalValor[] = "'{$row['total_valor']}'";
        $descricao_produto_pedido[] = $row['descricao_produto_pedido'];
    }

    $totalValor = implode(',', $totalValor);
    $descricao_produto_pedido = implode(',', $descricao_produto_pedido);

?>

<!DOCTYPE html>
<html lang="pt-BR">
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
                    data: [<= $totalValor;?>],
                    backgrounColor: barColor
                }
            ],
            xaxis: {
                categories: [<= $descricao_produto_pedido;?>],
            }
        };
        let chart = new ApexCharts(el, options);
        chart.render();
    </script>
</body>
</html> -->

<?php
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
?>

<!DOCTYPE html>
<html lang="pt-BR">
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
                categories: [<?= $descricao_produto_pedido;?>],
            }
        };
        let chart = new ApexCharts(el, options);
        chart.render();
    </script>
</body>
</html>