<?php

require_once "../config.php";

// Cria a conexão
$conn = new mysqli($DBHOST, $DBUSER, $DBPASS, $DBNAME);

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
    <!-- <style>
        #myChart 
        {
            height: 299px !important;
        }
        @media screen and (min-width: 600px) 
        {
            #myChart 
            {
                height: 515px !important; 
            }
        }
    </style> -->
  
    <!-- <style>
        .apexcharts-toolbar
        {
            display:none !important;
        }
    </style>
      <div style="width: 100%; margin: auto;">
        <canvas id="myChart" style="width: 100%; height: 515px;"></canvas>
      </div>       -->
      
  <canvas id="myChart" style="width:150%; max-width:600px"></canvas>

  <script>
    var xValues = [<?php echo $descricaoProduto; ?>];
    var yValues = [<?=  $totalQuantidade ?>];
    var barColors = [
      "#6699cc",
      "#9999cc",
      "#ff9966"
    ];

    new Chart("myChart", {
      type: "pie",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      }
    });
  </script>

</body>
</html>