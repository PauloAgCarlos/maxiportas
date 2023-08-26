<?php
    $conn = mysqli_connect("localhost", "root", "", "maxportas");

    $selectdados = mysqli_query($conn, "SELECT ano_mes, quantidade FROM painel_vendas_mensais ORDER BY ano_mes ASC");
    $ano_mes = [];
    $quantidade = [];

    while($linha = mysqli_fetch_array($selectdados, MYSQLI_ASSOC)){
        $ano_mes[] = "'{$linha['ano_mes']}'";
        $quantidade[] = $linha['quantidade'];
    }

    $ano_mes = implode(',', $ano_mes);
    $quantidade = implode(',', $quantidade);
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
        labels: [<?= $ano_mes;?>],
        datasets: [{
          label: '',
          backgroundColor: ['darkblue', 'red', 'blue', 'yellow', 'orange', 'darkblue'],
          data: [<?= $quantidade;?>],
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