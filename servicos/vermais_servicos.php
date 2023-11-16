<?php 

    session_start();
    require_once "../conexao-bd.php";
    if(!isset($_SESSION['email'])){
        header('location: ../login.php');
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
                    <a href="visualizar_servicos.php">
                        <i class="fa fa-arrow-left ms-1"></i>
                        Visualizar Serviços
                    </a>
                  </h3>
                </div>
                <div class="container  bg-dark text-center" style="margin-top: 5%;">
                  <div class="py-2">
                    <h1 class="fw-bold text-white  ">

                      <?php
                      require_once "../controllers/controllers_servicos.php";

                      $selecionar_servicos_id = new controllers_servicos();
                      $idDescriptografado = base64_decode($_GET['view_servicos']); 
              
                      foreach($selecionar_servicos_id->selecionar_servicos_id($idDescriptografado) as $row_servicos_id){ 
                      echo addslashes($row_servicos_id['descricao']); } ?>
                    </h1>
                  </div>
                  <div style=" margin-left:73%; margin-top: -5%;">
                    <a class="btn btn-hero btn-primary" href="./atualizar_servicos.php?atualizar_servicos=<?php $idCriptografado = base64_encode($row_servicos_id['id']); echo $idCriptografado; ?>" data-toggle="click-ripple">
                      <i class="fa fa-pencil-alt"></i>
                    </a>
                    <a class="btn  btn-hero btn-primary my-2" href="./visualizar_servicos.php">
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
                            require_once "../controllers/controllers_servicos.php";

                            $selecionar_servicos_id = new controllers_servicos();
                            $idDescriptografado = base64_decode($_GET['view_servicos']); 
                            foreach($selecionar_servicos_id->selecionar_servicos_id($idDescriptografado) as $row_servicos_id){ ?>

                            <div class="block-header block-header-default">
                              <h3 class="block-title">Código Produto: <span class="fs-sm text-muted"><?php echo addslashes($row_servicos_id['codigo_produto']); ?></h3>
                            </div>

                            <div class="block-content">
                              <div class="fs-4 mb-1">Custo (metro): <span class="fs-sm text-muted"><?php echo addslashes($row_servicos_id['custo_metro']); ?></span></div>
                              <address class="fs-sm"> 
                                  Valor: <span class="fs-sm text-muted"><?php echo addslashes($row_servicos_id['valor']); ?></span><br>    
                                  Tipo de Serviço: <span class="fs-sm text-muted"><?php echo addslashes($row_servicos_id['tipo_de_servico']); ?></span><br>        
                                  Exibe no Orçamento: <span class="fs-sm text-muted"><?php echo addslashes($row_servicos_id['exibe_no_orcamento']); ?></span><br>  
                                  Exibe na Lista de Corte: <span class="fs-sm text-muted"><?php echo addslashes($row_servicos_id['exibe_na_lista_de_corte']); ?></span><br>                                            
                              </address>
                            </div>
                            <?php } ?>
                        </div>
                        
                        </div>
                        <div class="col-sm-4">
                          <div class="block block-rounded">
                            <?php
                              require_once "../controllers/controllers_servicos.php";

                              $selecionar_servicos_id = new controllers_servicos();
                              $idDescriptografado = base64_decode($_GET['view_servicos']); 

                              foreach($selecionar_servicos_id->selecionar_servicos_id($idDescriptografado) as $row_servicos_id_id){ ?>
                              <div class="block-header block-header-default">
                              <h3 class="block-title">Código da Fabrica: <span class="fs-sm text-muted"><?php echo addslashes($row_servicos_id['codigo_da_fabrica']); ?></h3>
                            </div>
                              <div class="block-content">
                                  Markup: <span class="fs-sm text-muted"><?php echo addslashes($row_servicos_id['markup']); ?></span><br>
                                  Última Alteração: <span class="fs-sm text-muted"><?php echo addslashes($row_servicos_id['ultima_alteracao']); ?></span><br>
                                  Adiciona para o Corte: <span class="fs-sm text-muted"><?php echo addslashes($row_servicos_id['adiciona_para_o_corte']); ?></span><br>
                                  Calculo: <span class="fs-sm text-muted"><?php echo addslashes($row_servicos_id['calculo']); ?></span>
                              </address>
                              </div>
                              <?php } ?>
                          </div>
                        </div>
                    </div>
                    <!-- END Customer --> 
                    <div class="row">
                      <div class="col-md-6">
                        <div class="block-header block-header-default">
                          <?php
                              require_once "../controllers/controllers_servicos.php";

                              $selecionar_servicos_id = new controllers_servicos();
                              $idDescriptografado = base64_decode($_GET['view_servicos']); 

                              foreach($selecionar_servicos_id->selecionar_servicos_id($idDescriptografado) as $row_servicos_id_id){ ?>
                          <h3 class="block-title">Descrição: <span class="fs-sm text-muted"><?php echo addslashes($row_servicos_id['descricao']); ?></h3>
                          <?php }?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="block-header block-header-default">
                          <?php
                              require_once "../controllers/controllers_servicos.php";

                              $selecionar_servicos_id = new controllers_servicos();
                              $idDescriptografado = base64_decode($_GET['view_servicos']); 

                              foreach($selecionar_servicos_id->selecionar_servicos_id($idDescriptografado) as $row_servicos_id_id){ ?>
                          <h3 class="block-title">Observação: <span class="fs-sm text-muted"><?php echo addslashes($row_servicos_id['observacao']); ?></h3>
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
