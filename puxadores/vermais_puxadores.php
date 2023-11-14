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
                    <a href="visualizar_puxadores.php">
                        <i class="fa fa-arrow-left ms-1"></i>
                        Visualizar Puxadores
                    </a>
                  </h3>
                </div>
                <div class="container  bg-dark text-center" style="margin-top: 5%;">
                  <div class="py-2">
                    <h1 class="fw-bold text-white  ">

                      <?php
                      require_once "../controllers/controllers_puxadores.php";

                      $selecionar_puxadores_id = new controllers_puxadores();
                      $idDescriptografado = base64_decode($_GET['view_puxadores']); 
              
                      foreach($selecionar_puxadores_id->selecionar_puxadores_id($idDescriptografado) as $row_puxadores_id){ 
                      echo addslashes($row_puxadores_id['agregar']); } ?>
                    </h1>
                  </div>
                  <div style=" margin-left:73%; margin-top: -5%;">
                    <a class="btn btn-hero btn-primary" href="./atualizar_puxadores.php?atualizar_puxadores=<?php $idCriptografado = base64_encode($row_puxadores_id['id']); echo $idCriptografado; ?>" data-toggle="click-ripple">
                      <i class="fa fa-pencil-alt"></i>
                    </a>
                    <a class="btn  btn-hero btn-primary my-2" href="./visualizar_puxadores.php">
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
                            require_once "../controllers/controllers_puxadores.php";

                            $selecionar_puxadores_id = new controllers_puxadores();
                            $idDescriptografado = base64_decode($_GET['view_puxadores']); 
                            foreach($selecionar_puxadores_id->selecionar_puxadores_id($idDescriptografado) as $row_puxadores_id){ ?>

                            <div class="block-header block-header-default">
                              <h3 class="block-title">Unidade: <span class="fs-sm text-muted"><?php echo addslashes($row_puxadores_id['unidade']); ?></h3>
                            </div>

                            <div class="block-content">
                              <div class="fs-4 mb-1">Custo (metro): <span class="fs-sm text-muted"><?php echo addslashes($row_puxadores_id['custo_metro']); ?></span></div>
                              <address class="fs-sm"> 
                                  Valor: <span class="fs-sm text-muted"><?php echo addslashes($row_puxadores_id['valor']); ?></span><br> 
                                  Desconto Corte: <span class="fs-sm text-muted"><?php echo addslashes($row_puxadores_id['desconto_corte']); ?></span><br> 
                                  Perda: <span class="fs-sm text-muted"><?php echo addslashes($row_puxadores_id['perda']); ?></span><br> 
                                  Perda Bordas: <span class="fs-sm text-muted"><?php echo addslashes($row_puxadores_id['perda_bordas']); ?></span><br>  
                                  Perda Corte (mm): <span class="fs-sm text-muted"><?php echo addslashes($row_puxadores_id['perda_corte']); ?></span><br>
                                  <div class="fs-4 mb-1">
                                  Dimensão (mm): <span class="fs-sm text-muted"><?php echo addslashes($row_puxadores_id['dimensao']); ?></span>
                                  </div>
                                  Perda Bordas Retalho (mm): <span class="fs-sm text-muted"> <?php echo addslashes($row_puxadores_id['perda_bordas_retalho']); ?> </span><br>   
                                  Perda Corte Retalho (mm): <span class="fs-sm text-muted"> <?php echo addslashes($row_puxadores_id['perda_corte_retalho']); ?></span><br>                           
                                  
                                  <div class="fs-4 mb-1">
                                  Código da Fábrica: <span class="fs-sm text-muted"><?php echo addslashes($row_puxadores_id['codigo_da_fabrica']); ?></span>
                                  </div>
                              </address>
                            </div>
                            <?php } ?>
                        </div>
                        
                        </div>
                        <div class="col-sm-4">
                          <div class="block block-rounded">
                            <?php
                              require_once "../controllers/controllers_puxadores.php";

                              $selecionar_puxadores_id = new controllers_puxadores();
                              $idDescriptografado = base64_decode($_GET['view_puxadores']); 

                              foreach($selecionar_puxadores_id->selecionar_puxadores_id($idDescriptografado) as $row_puxadores_id_id){ ?>
                              <div class="block-header block-header-default">
                                <h3 class="block-title">Agregar: <span class="fs-sm text-muted"><?php echo addslashes($row_puxadores_id['agregar']); ?></span></h3>
                              </div>
                              <div class="block-content">
                                  Ponteira Obrigatória: <span class="fs-sm text-muted"><?php echo addslashes($row_puxadores_id['ponteira_obrigatoria']); ?></span><br>
                                  Markup: <span class="fs-sm text-muted"><?php echo addslashes($row_puxadores_id['markup']); ?></span><br>
                                  Metragem Minima: <span class="fs-sm text-muted"><?php echo addslashes($row_puxadores_id['metragem_minima']); ?></span><br> 
                                  Usinagem: <span class="fs-sm text-muted"><?php echo addslashes($row_puxadores_id['usinagem_box_tres']); ?></span><br>
                                  Medida Maxima Para Uninagem: <span class="fs-sm text-muted"><?php echo addslashes($row_puxadores_id['medida_maxima_para_usinagem']); ?></span><br>
                                  Código do Produto: <span class="fs-sm text-muted"><?php echo addslashes($row_puxadores_id['codigo_produto']); ?></span><br>
                                  Quantidade do Produto: <span class="fs-sm text-muted"><?php echo addslashes($row_puxadores_id['quantidade']); ?></span><br>
                                  Última Alteração: <span class="fs-sm text-muted"><?php echo addslashes($row_puxadores_id['ultima_alteracao']); ?></span><br>
                              </address>
                              </div>
                              <?php } ?>
                          </div>
                        </div>

                        <div class="col-sm-4">
                          <div class="block block-rounded">
                            <?php
                              require_once "../controllers/controllers_puxadores.php";

                              $selecionar_puxadores_id = new controllers_puxadores();
                              $idDescriptografado = base64_decode($_GET['view_puxadores']); 

                              foreach($selecionar_puxadores_id->selecionar_puxadores_id($idDescriptografado) as $row_puxadores_id_id){ ?>
                              <div class="block-header block-header-default">
                                <h3 class="block-title text-center">Imagem:</h3>
                              </div>

                              <div style="margin: auto; margin-top: 5%; display: flex; align-items: center; justify-content: center;">
                                <?php if($row_puxadores_id_id['imagem'] == ""){ ?>
                                  <img style="width: 150px; height: 150px; border-radius: 150px; border: 1px solid black; display: block; margin: auto;" src="../assets/img/avatars/avatar10.jpg" alt="Avatar">
                                <?php  } else { ?>
                                  <img style="width: 150px; height: 150px; border-radius: 150px; border: 1px solid black; display: block; margin: auto;" src="<?php echo $row_puxadores_id_id['imagem']; ?>" alt="">
                                <?php }?>
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
                              require_once "../controllers/controllers_puxadores.php";

                              $selecionar_puxadores_id = new controllers_puxadores();
                              $idDescriptografado = base64_decode($_GET['view_puxadores']); 

                              foreach($selecionar_puxadores_id->selecionar_puxadores_id($idDescriptografado) as $row_puxadores_id_id){ ?>
                          <h3 class="block-title">Referências do Mercado: <span class="fs-sm text-muted"><?php echo addslashes($row_puxadores_id['referencias_do_mercado']); ?></h3>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="block-header block-header-default">
                          <?php
                              require_once "../controllers/controllers_puxadores.php";

                              $selecionar_puxadores_id = new controllers_puxadores();
                              $idDescriptografado = base64_decode($_GET['view_puxadores']); 

                              foreach($selecionar_puxadores_id->selecionar_puxadores_id($idDescriptografado) as $row_puxadores_id_id){ ?>
                          <h3 class="block-title">Descrição: <span class="fs-sm text-muted"><?php echo addslashes($row_puxadores_id['descricao']); ?></h3>
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
