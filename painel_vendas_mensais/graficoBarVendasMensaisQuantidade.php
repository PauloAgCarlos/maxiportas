<?php
    
    require_once "../config.php";
    $conn = mysqli_connect($DBHOST, $DBUSER, $DBPASS, $DBNAME);

    $selectdados = mysqli_query($conn, "SELECT qtd_produto_pedido, ano, SUM(qtd_produto_pedido) as total_qtd FROM painel_pedidos_orcamentos WHERE status = 'Finalizado' GROUP BY ano ORDER BY ano ASC");
    $ano = [];
    $total_qtd = [];

    while($linha = mysqli_fetch_array($selectdados, MYSQLI_ASSOC)){
        $ano[] = "'{$linha['ano']}'";
        $total_qtd[] = $linha['total_qtd'];
    }

    $ano = implode(',', $ano);
    $total_qtd = implode(',', $total_qtd);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="apexcharts.min.js"></script>
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
  
    <style>
        .apexcharts-toolbar
        {
            display:none !important;
        }
    </style>
      <div style="width: 100%; margin: auto;">
        <canvas id="myChart" style="width: 100%; height: 515px;"></canvas>
      </div>      
      
      <script src="chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');
  
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [<?= $ano;?>],
        datasets: [{
          label: '',
          backgroundColor: ['darkblue', 'red', 'blue', 'yellow', 'orange', 'darkblue'],
          data: [<?= $total_qtd;?>],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
        y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
  
      
</body>
</html>
</body>
</html>