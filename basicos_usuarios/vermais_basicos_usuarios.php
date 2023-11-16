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
                    <a href="visualizar_usuarios.php">
                        <i class="fa fa-arrow-left ms-1"></i>
                        Visualizar Usuários
                    </a>
                  </h3>
                </div>
                <div class="container  bg-dark text-center" style="margin-top: 5%;">
                  <div class="py-2">
                    <h1 class="fw-bold text-white  ">

                      <?php
                      require_once "../controllers/controllers_basicos_usuarios.php";

                      $selecionar_basicos_usuarios_id = new controllers_basicos_usuarios();
                      $idDescriptografado = base64_decode($_GET['view_basicos_usuarios']); 
              
                      foreach($selecionar_basicos_usuarios_id->selecionar_basicos_usuarios_id($idDescriptografado) as $row_usuarios_id){ 
                      echo addslashes($row_usuarios_id['nome_ususario']); } ?>
                    </h1>
                  </div>
                  <div style=" margin-left:73%; margin-top: -5%;">
                    <a class="btn btn-hero btn-primary" href="./atualizar_usuarios.php?atualizar_usuarios=<?php $idCriptografado = base64_encode($row_usuarios_id['id']); echo $idCriptografado; ?>" data-toggle="click-ripple">
                      <i class="fa fa-pencil-alt"></i>
                    </a>
                    <a class="btn  btn-hero btn-primary my-2" href="./visualizar_usuarios.php">
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
                            require_once "../controllers/controllers_basicos_usuarios.php";

                            $selecionar_basicos_usuarios_id = new controllers_basicos_usuarios();
                            $idDescriptografado = base64_decode($_GET['view_basicos_usuarios']); 
                            foreach($selecionar_basicos_usuarios_id->selecionar_basicos_usuarios_id($idDescriptografado) as $row_usuarios_id){ ?>

                            <div class="block-header block-header-default">
                              <h3 class="block-title">Nome Usuário: <span class="fs-sm text-muted"><?php echo addslashes($row_usuarios_id['nome_ususario']); ?></h3>
                            </div>

                            <div class="block-content">
                              <div class="fs-4 mb-1">E-Mail (Login): <span class="fs-sm text-muted"><?php echo addslashes($row_usuarios_id['email_login']); ?></span></div>
                              <address class="fs-sm">
                                  Senha: <?php echo addslashes($row_usuarios_id['libera_xml_pedido']); ?><br>
                                  Telefone: <?php echo addslashes($row_usuarios_id['telefone_usuario']); ?><br>
                                  Libera XML Pedido: <span class="fs-sm text-muted"><?php echo addslashes($row_usuarios_id['libera_xml_pedido']); ?></span><br>
                                  Libera Painel Produção: <span class="fs-sm text-muted"><?php echo addslashes($row_usuarios_id['libera_painel_producao']); ?></span><br>                           
                                  
                              </address>
                            </div>
                            <?php } ?>
                        </div>
                        
                        </div>
                        <div class="col-sm-4">
                          <div class="block block-rounded">
                            <?php
                              require_once "../controllers/controllers_basicos_usuarios.php";

                              $selecionar_basicos_usuarios_id = new controllers_basicos_usuarios();
                              $idDescriptografado = base64_decode($_GET['view_basicos_usuarios']); 

                              foreach($selecionar_basicos_usuarios_id->selecionar_basicos_usuarios_id($idDescriptografado) as $row_usuarios_id_id){ ?>
                              <div class="block-header block-header-default">
                                <h3 class="block-title"> Grupo de Usuários:: <span class="fs-sm text-muted"><?php echo addslashes($row_usuarios_id['grupo_de_usuarios']); ?></span></h3>
                              </div>
                              <div class="block-content">
                                <address class="fs-sm">
                                    Ativo: <span class="fs-sm text-muted"><?php echo addslashes($row_usuarios_id['ativo']); ?></span><br> 
                                    Última Alteração: <span class="fs-sm text-muted"><?php echo addslashes($row_usuarios_id['ultima_alteracao']); ?></span><br>
                                    Desconto Maximo: <span class="fs-sm text-muted"><?php echo addslashes($row_usuarios_id['desconto_maximo']); ?></span><br>  
                                </address>
                              </div>
                              <?php } ?>
                          </div>
                        </div>
                    </div>
                    <!-- END Customer --> 
                    <div class="row">
                      <div class="col-md-12">
                        <div class="block-header block-header-default">
                          <?php
                            require_once "../controllers/controllers_basicos_usuarios.php";

                            $selecionar_basicos_usuarios_id = new controllers_basicos_usuarios();
                            $idDescriptografado = base64_decode($_GET['view_basicos_usuarios']); 

                            foreach($selecionar_basicos_usuarios_id->selecionar_basicos_usuarios_id($idDescriptografado) as $row_usuarios_id_id){ ?>
                            <h3 class="block-title">Observação: <span class="fs-sm text-muted"><?php echo addslashes($row_usuarios_id['observacao']); ?></h3>
                          <?php } ?>
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
