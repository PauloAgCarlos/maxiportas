<?php 

    session_start();
    require_once "../conexao-bd.php";
    if(!isset($_SESSION['email'])){
        header('location: ../index.php');
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>HJ Alumínio</title>

    <meta name="description" content="HJ Alumínio">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="HJ Alumínio">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="HJ Alumínio">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="../assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->
    <link rel="stylesheet" id="css-main" href="../assets/css/dashmix.min.css">

  </head>
  <body>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
    <?php require_once "../template/sidebar.php" ?>

    <?php require_once "../template/header.php" ?>

      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="content content-full content-boxed">
          <!-- Latest Orders + Stats -->
          <div class="row">
            <div class="col-md-12">
              <!--  Latest Orders -->
              <div class="block block-rounded block-mode-loading-refresh">
                <div class="block-header block-header-default">
                  <h3 class="block-title">
                    <a href="visualizar_financas_condicao_pagamento.php">
                        <i class="fa fa-arrow-left ms-1"></i>
                        Finanças Visualizar Condição Pagamento
                    </a>
                  </h3>
                </div>
                <div class="container  bg-dark text-center" style="margin-top: 5%;">
                  <div class="py-2">
                    <h1 class="fw-bold text-white  ">

                      <?php
                      require_once "../controllers/controllers_financas_condicao_pagamento.php";

                      $selecionar_financas_condicao_pagamento_id = new controllers_financas_condicao_pagamento();
                      $idDescriptografado = base64_decode($_GET['view_financas_condicao_pagamento']); 
              
                      foreach($selecionar_financas_condicao_pagamento_id->selecionar_financas_condicao_pagamento_id($idDescriptografado) as $row_financas_condicao_pagamento_id){ 
                      echo addslashes($row_financas_condicao_pagamento_id['codigo_produto']); } ?>
                    </h1>
                  </div>
                  <div style=" margin-left:73%; margin-top: -5%;">
                    <a class="btn btn-hero btn-primary" href="./atualizar_financas_condicao_pagamento.php?atualizar_financas_condicao_pagamento=<?php $idCriptografado = base64_encode($row_financas_condicao_pagamento_id['id']); echo $idCriptografado; ?>" data-toggle="click-ripple">
                      <i class="fa fa-pencil-alt"></i>
                    </a>
                    <a class="btn  btn-hero btn-primary my-2" href="./visualizar_financas_condicao_pagamento.php">
                      <i class="fa fa-reply" aria-hidden="true"></i>
                      <span class="d-none d-sm-inline ms-1"></span>
                    </a>
                  </div>
                </div>
                <div class="block-content">
                    
                    <!-- Customer -->
                    <div class="row">
                        <div class="col-sm-4">
                        
                        <div class="block block-rounded">

                          <?php
                            require_once "../controllers/controllers_financas_condicao_pagamento.php";

                            $selecionar_financas_condicao_pagamento_id = new controllers_financas_condicao_pagamento();
                            $idDescriptografado = base64_decode($_GET['view_financas_condicao_pagamento']); 
                            foreach($selecionar_financas_condicao_pagamento_id->selecionar_financas_condicao_pagamento_id($idDescriptografado) as $row_financas_condicao_pagamento_id){ ?>

                            <div class="block-header block-header-default">
                              <h3 class="block-title">descricao: <span class="fs-sm text-muted"><?php echo addslashes($row_financas_condicao_pagamento_id['descricao']); ?></h3>
                            </div>

                            <div class="block-content">
                              <div class="fs-4 mb-1">Tipo: <span class="fs-sm text-muted"><?php echo addslashes($row_financas_condicao_pagamento_id['tipo']); ?></span></div>
                              <address class="fs-sm">
                                  Número de Parcelas: <?php echo addslashes($row_financas_condicao_pagamento_id['numero_de_parcelas']); ?><br>
                                  Prazo Primeira Parcela Dias: <span class="fs-sm text-muted"><?php echo addslashes($row_financas_condicao_pagamento_id['prazo_primeira_parcela_dias']); ?></span><br>
                                  Prazo Segunda Parcela Dias: <span class="fs-sm text-muted"><?php echo addslashes($row_financas_condicao_pagamento_id['prazo_segunda_parcela_dias']); ?></span><br>                              
                              </address>
                            </div>
                            <?php } ?>
                        </div>
                        
                        </div>
                        <div class="col-sm-4">
                          <div class="block block-rounded">
                            <?php
                              require_once "../controllers/controllers_financas_condicao_pagamento.php";

                              $selecionar_financas_condicao_pagamento_id = new controllers_financas_condicao_pagamento();
                              $idDescriptografado = base64_decode($_GET['view_financas_condicao_pagamento']); 

                              foreach($selecionar_financas_condicao_pagamento_id->selecionar_financas_condicao_pagamento_id($idDescriptografado) as $row_financas_condicao_pagamento_id_id){ ?>
                              <div class="block-header block-header-default">
                                <h3 class="block-title">Intervalo Entre Parcelas Dias: <span class="fs-sm text-muted"><?php echo addslashes($row_financas_condicao_pagamento_id['intervalo_entre_parcelas_dias']); ?></span></h3>
                              </div>
                              <div class="block-content">
                                <div class="fs-4 mb-1">Entrada: <span class="fs-sm text-muted"><?php echo addslashes($row_financas_condicao_pagamento_id['entrada']); ?></span></div>
                                <address class="fs-sm">
                                    Markup: <span class="fs-sm text-muted"><?php echo addslashes($row_financas_condicao_pagamento_id['markup']); ?></span><br>
                                    Ativo: <span class="fs-sm text-muted"><?php echo addslashes($row_financas_condicao_pagamento_id['ativo']); ?></span><br>   
                                    Última Alteração: <span class="fs-sm text-muted"><?php echo addslashes($row_financas_condicao_pagamento_id['ultima_alteracao']); ?></span><br>                               
                                </address>
                              <?php } ?>
                              </div>
                        </div>
                    </div>
                    <!-- END Customer --> 
                    <div class="row">
                      <div class="col-md-12">
                        <div class="block-header block-header-default">
                          <?php
                              require_once "../controllers/controllers_financas_condicao_pagamento.php";

                              $selecionar_financas_condicao_pagamento_id = new controllers_financas_condicao_pagamento();
                              $idDescriptografado = base64_decode($_GET['view_financas_condicao_pagamento']); 

                              foreach($selecionar_financas_condicao_pagamento_id->selecionar_financas_condicao_pagamento_id($idDescriptografado) as $row_financas_condicao_pagamento_id_id){ ?>
                          <h3 class="block-title">Descrição: <span class="fs-sm text-muted"><?php echo addslashes($row_financas_condicao_pagamento_id['descricao']); ?></h3>
                          <?php }?>
                        </div>
                      </div>
                    </div>                 
                </div>
                </div>
              </div>
              <!-- END Latest Orders -->
            
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
