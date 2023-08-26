<?php 

    session_start();
    require_once "../conexao-bd.php";
    if(!isset($_SESSION['email'])){
        header('location: ../index.php');
    }

$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "maxportas";

//Criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

//Selecionar todos os indicadores da tabela
$result_indicadores = "SELECT * FROM indicadores ORDER BY id DESC";
$resultado_indicadores = mysqli_query($conn, $result_indicadores);

//Contar o total de indicadores
$total_indicadores = mysqli_num_rows($resultado_indicadores);

//Seta a valor de indicadores por pagina
$valor_pg = 10;

//calcular o número de pagina necessárias para apresentar os indicadores
$num_pagina = ceil($total_indicadores/$valor_pg);

//Calcular o inicio da visualizacao
$incio = ($valor_pg*$pagina)-$valor_pg;

//Selecionar os indicadores a serem apresentado na página
$result_indicadores = "SELECT * FROM indicadores ORDER BY id DESC limit $incio, $valor_pg";
$resultado_indicadores = mysqli_query($conn, $result_indicadores);
$total_indicadores = mysqli_num_rows($resultado_indicadores);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>HJ Alumínio</title>

    <meta name="description" content="MaxPortas">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="MaxPortas">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="MaxPortas">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="../assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" id="css-main" href="../assets/css/dashmix.min.css">
    
    
    <!--Pagination-->
    <link rel="stylesheet" href="../assets/css/pagination.css">
    
    <!--SwitAlert Success ao Cadastrar-->
    <script src="../assets/js/cdn.jsdelivr.net_npm_sweetalert2@11.0.18_dist_sweetalert2.all.min.js"></script>

  </head>
  <body>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
    <?php require_once "../template/sidebar.php" ?>

    <!-- Header -->
<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
    <!-- Left Section -->
    <div class="space-x-1">
        <!-- Toggle Sidebar -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
        <button type="button" class="btn btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
        <i class="fa fa-fw fa-bars"></i>
        </button>
        
        <!-- END Toggle Sidebar -->
    </div>
    <!-- END Left Section -->
    <?php require_once "../template/btn_logout.php"; ?>

    <!-- Header Search -->
    <div id="page-header-search" class="overlay-header bg-header-dark">
          <div class="bg-white-10">
            <div class="content-header">
              <form class="w-100" action="pesquisar_indicadores.php" method="GET">
                <div class="input-group">
                  <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                  <button type="button" class="btn btn-alt-primary" data-toggle="layout" data-action="header_search_off">
                    <i class="fa fa-fw fa-times-circle"></i>
                  </button>
                  <input type="text" class="form-control border-0" placeholder="Pesquisar por: Ano/Mês" id="page-header-search-input" name="pesquisar">
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- END Header Search -->
    <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Loader -->
    <div id="page-header-loader" class="overlay-header bg-header-dark">
    <div class="bg-white-10">
        <div class="content-header">
        <div class="w-100 text-center">
            <i class="fa fa-fw fa-sun fa-spin text-white"></i>
        </div>
        </div>
    </div>
    </div>
    <!-- END Header Loader -->
</header>
<!-- END Header -->

      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="content content-full content-boxed">
          <!-- Latest Orders + Stats -->
          <div class="row">
            <div class="col-md-6">
              <!--  Latest Orders -->
              <div class="block block-rounded block-mode-loading-refresh">
                <div class="block-header block-header-default">
                  <h3 class="block-title text-center">
                    Comparativo Pedido/Orçamento (Mês Corrente) <br>
                    Valor (R$)
                  </h3>                  
                </div>

                <div>
                  <style>
                    #main_grafico 
                    {
                      z-index: 0 !important;
                      display: flex;
                      justify-content: space-around;
                      align-items: center;
                      flex-wrap: wrap;
                      width: 100%;
                      border: 1px solid #ddd;
                      margin: auto !important;
                    }

                      .child_grafico 
                      {
                        margin: auto !important;
                        background-color: #fff;
                        border-radius: 10px;
                      }
                  </style>
                   <main id="main_grafico">
                      <section class="child_grafico"><?php include "graficoBarOrcamentoValor.php"; ?></section> 
                  </main>
                </div>
                
              </div>
               
            </div>
              <!-- END Latest Orders -->

              <div class="col-md-6">
              <!--  Latest Orders -->
              <div class="block block-rounded block-mode-loading-refresh">
                <div class="block-header block-header-default">
                  <h3 class="block-title text-center" style="font-size: 1em;">
                    Comparativo Pedido/Orçamento (Mês Corrente) <br>
                    <span style="font-size: 0.9em;">Quantidade de Quadros, Quantidade de Portas, Quantidade de Vidros</span>
                  </h3>
                </div>

                <div>
                  <style>
                    #main_grafico_quantidade 
                    {
                      z-index: 0 !important;
                      display: flex;
                      justify-content: space-around;
                      align-items: stretch;
                      flex-wrap: wrap;
                      width: 100%;
                      height: 500px;
                      border: 1px solid #ddd;
                      margin: auto !important;
                    }

                      .child_grafico_quantidade 
                      {
                        margin: auto !important;
                        background-color: #fff;
                        border-radius: 1px;
                      }
                  </style>
                   <main id="main_grafico_quantidade">
                      <section class="child_grafico_quantidade"><?php include "graficoBarOrcamentoQuantidade.php"; ?></section> 
                  </main>
                </div>

              </div>
               
            </div>
            
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->

      <!-- Footer -->
      <?php require_once "../template/footer.php" ?>
      <!-- END Footer -->
    </div>
    <!-- END Page Container -->
  </body>
</html>
