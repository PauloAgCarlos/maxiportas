<?php
    $conn = mysqli_connect("localhost", "root", "", "maxportas");

    $selectdados = mysqli_query($conn, "SELECT pedidos, tipos_orcamento FROM painel_pedidos_orcamentos ORDER BY pedidos ASC");
    $pedidos = [];
    $tipos_orcamento = [];

    while($linha = mysqli_fetch_array($selectdados, MYSQLI_ASSOC)){
        $pedidos[] = "'{$linha['pedidos']}'";
        $tipos_orcamento[] = $linha['tipos_orcamento'];
    }

    $pedidos = implode(',', $pedidos);
    $tipos_orcamento = implode(',', $tipos_orcamento);
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
    var xValues = ['Quantidade de Quadros', 'Quantidade de Portas', 'Quantidade de Vidros'];
    var yValues = [<?=  $pedidos ?>];
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