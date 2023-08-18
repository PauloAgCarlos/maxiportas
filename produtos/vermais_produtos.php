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
                    <a href="visualizar_produtos.php">
                        <i class="fa fa-arrow-left ms-1"></i>
                        Visualizar Produtos
                    </a>
                  </h3>
                </div>
                <div class="container  bg-dark text-center" style="margin-top: 5%;">
                  <div class="py-2">
                    <h1 class="fw-bold text-white  ">

                      <?php
                      require_once "../controllers/controllers_produtos.php";

                      $selecionar_produtos_id = new controllers_produtos();
                      $idDescriptografado = base64_decode($_GET['view_produtos']); 
              
                      foreach($selecionar_produtos_id->selecionar_produtos_id($idDescriptografado) as $row_produtos_id){ 
                      echo addslashes($row_produtos_id['descricao_do_produto']); } ?>
                    </h1>
                  </div>
                  <div style=" margin-left:73%; margin-top: -5%;">
                    <a class="btn btn-hero btn-primary" href="./atualizar_produtos.php?atualizar_produtos=<?php $idCriptografado = base64_encode($row_produtos_id['id']); echo $idCriptografado; ?>" data-toggle="click-ripple">
                      <i class="fa fa-pencil-alt"></i>
                    </a>
                    <a class="btn  btn-hero btn-primary my-2" href="./visualizar_produtos.php">
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
                            require_once "../controllers/controllers_produtos.php";

                            $selecionar_produtos_id = new controllers_produtos();
                            $idDescriptografado = base64_decode($_GET['view_produtos']); 
                            foreach($selecionar_produtos_id->selecionar_produtos_id($idDescriptografado) as $row_produtos_id){ ?>

                            <div class="block-header block-header-default">
                              <h3 class="block-title">Código Produto: <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['codigo_produto']); ?></h3>
                            </div>

                            <div class="block-content"> 
                                Venda (R$): <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['venda']); ?></span><br>
                                Consumo Medio: <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['consumo_medio']); ?></span><br>
                                Embalagem Fornecedor: <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['embalagem_fornecedor']); ?></span><br>
                                Massa: <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['massa']); ?></span><br>
                                Código da Fábrica: <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['codigo_da_fabrica']); ?></span><br>
                                Classificacao Fiscal: <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['classificacao_fiscal']); ?></span><br>  
                                Volume: <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['volume']); ?></span><br>
                                Embalagem: <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['embalagem']); ?></span><br>
                                Localizador: <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['localizador']); ?></span><br>  
                            </div>
                            <?php } ?>
                        </div>
                        
                        </div>
                        <div class="col-sm-4">
                          <div class="block block-rounded">
                            <?php
                              require_once "../controllers/controllers_produtos.php";

                              $selecionar_produtos_id = new controllers_produtos();
                              $idDescriptografado = base64_decode($_GET['view_produtos']); 

                              foreach($selecionar_produtos_id->selecionar_produtos_id($idDescriptografado) as $row_produtos_id_id){ ?>
                              <div class="block-header block-header-default">
                                <h3 class="block-title">Custo Atual: <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['custo_atual']); ?></span></h3>
                              </div>
                              <div class="block-content">
                                  Markup (%): <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['markup']); ?></span><br>
                                  IPI: <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['ipi']); ?></span><br>
                                  Unidade Básica: <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['unidade_basica']); ?></span><br>
                                  Estoque: <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['estoque']); ?></span><br>
                                  Estoque Minimo: <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['estoque_minimo']); ?></span><br>                                  
                                  Estoque de Segurança: <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['estoque_de_seguranca']); ?></span><br>
                                  Tempo de Reposição: <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['tempo_de_reposicao']); ?></span><br>
                                  Linha: <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['linha']); ?></span><br>
                                  Última Alteração: <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['ultima_alteracao']); ?></span><br>
                              </div>
                              <?php } ?>
                          </div>
                        </div>

                        <div class="col-sm-4">
                          <div class="block block-rounded">
                            
                          </div>
                        </div>
                    </div>
                    <!-- END Customer --> 
                    <div class="row">
                      <div class="col-md-6">
                        <div class="block-header block-header-default">
                          <?php
                              require_once "../controllers/controllers_produtos.php";

                              $selecionar_produtos_id = new controllers_produtos();
                              $idDescriptografado = base64_decode($_GET['view_produtos']); 

                              foreach($selecionar_produtos_id->selecionar_produtos_id($idDescriptografado) as $row_produtos_id_id){ ?>
                          <h3 class="block-title">Descrição: <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['descricao_do_produto']); ?></h3>
                          <?php }?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="block-header block-header-default">
                          <?php
                              require_once "../controllers/controllers_produtos.php";

                              $selecionar_produtos_id = new controllers_produtos();
                              $idDescriptografado = base64_decode($_GET['view_produtos']); 

                              foreach($selecionar_produtos_id->selecionar_produtos_id($idDescriptografado) as $row_produtos_id_id){ ?>
                          <h3 class="block-title">Referência: <span class="fs-sm text-muted"><?php echo addslashes($row_produtos_id['referencia']); ?></h3>
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
