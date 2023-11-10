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

    <title>MaxPortas</title>

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

    <!-- Modal View -->
    <!-- <link href="myfilesEdVwCd/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
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
                    <a href="visualizar_parceiros.php">
                        <i class="fa fa-arrow-left ms-1"></i>
                        Visualizar Parceiros
                    </a>
                  </h3>
                </div>
                <div class="container  bg-dark text-center" style="margin-top: 5%;">
                  <div class="py-2">
                    <h1 class="fw-bold text-white  ">

                      <?php
                      require_once "../controllers/controllers_parceiros.php";

                      $selecionar_parceiros_id = new controllers_parceiros();
                      $idDescriptografado = base64_decode($_GET['view_parceiros']); 
              
                      foreach($selecionar_parceiros_id->selecionar_parceiros_id($idDescriptografado) as $row_parceiros_id){ 
                      echo addslashes($row_parceiros_id['razaosocial']); } ?>
                    </h1>
                  </div>
                  <div style=" margin-left:73%; margin-top: -5%;">
                    <a class="btn btn-hero btn-primary" href="./atualizar_parceiros.php?atualizar_parceiros=<?php $idCriptografado = base64_encode($row_parceiros_id['id']); echo $idCriptografado; ?>" data-toggle="click-ripple">
                      <i class="fa fa-pencil-alt"></i>
                    </a>
                    <a class="btn  btn-hero btn-primary my-2" href="./visualizar_parceiros.php">
                      <i class="fa fa-reply" aria-hidden="true"></i>
                      <span class="d-none d-sm-inline ms-1"></span>
                    </a>
                  </div>
                </div>
                <div class="block-content">
                    
                    <!-- Customer -->
                    <div class="row">
                        <div class="col-sm-6">
                        
                        <div class="block block-rounded">

                          <?php
                            require_once "../controllers/controllers_parceiros.php";

                            $selecionar_parceiros_id = new controllers_parceiros();
                            $idDescriptografado = base64_decode($_GET['view_parceiros']); 
                            foreach($selecionar_parceiros_id->selecionar_parceiros_id($idDescriptografado) as $row_parceiros_id){ ?>

                            <div class="block-header block-header-default">
                              <h3 class="block-title">Nome: <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['nome']); ?></h3>
                            </div>

                            <div class="block-content">
                              <div class="fs-4 mb-1">CNPJ: 
                                <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['cnpj']); ?></span>
                              </div>
                              <address class="fs-sm">
                                  <span style="font-weight: bolder;">Senha:</span> <?php echo addslashes($row_parceiros_id['senha']); ?><br>
                                  <i class="fa fa-envelope-o"></i><span style="font-weight: bolder;">Email:<span> <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['email']); ?></span><br>
                                  <span style="font-weight: bolder;">Situacao:</span> <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['situacao']); ?></span><br>                                
                                  <span style="font-weight: bolder;">Tipo:</span> <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['tipo']); ?></span>
                              </address>
                            </div>
                            <?php } ?>
                        </div>
                        
                        </div>
                        <div class="col-sm-6">
                          <div class="block block-rounded">
                            <?php
                              require_once "../controllers/controllers_parceiros.php";

                              $selecionar_parceiros_id = new controllers_parceiros();
                              $idDescriptografado = base64_decode($_GET['view_parceiros']); 

                              foreach($selecionar_parceiros_id->selecionar_parceiros_id($idDescriptografado) as $row_parceiros_id_id){ ?>
                              <div class="block-header block-header-default">
                                <h3 class="block-title">Endereço: <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['endereco']); ?></span></h3>
                              </div>
                              
                              <div class="block-content">
                            
                                <div class="fs-4 mb-1">Atividade Principal: 
                                  <span class="fs-sm text-muted">
                                    <?php echo addslashes($row_parceiros_id['atividade_principal']); ?>
                                  </span>
                                </div>
                              
                                <address class="fs-sm">
                                  <span style="font-weight: bolder;">Data de Abertura:</span> <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['abertura']); ?></span><br>
                                  Porte: <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['porte']); ?></span><br>
                                  <span style="font-weight: bolder;"> Natureza Juridica: </span><span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['natureza_juridica']); ?></span><br>
                                  <span style="font-weight: bolder;">Fantasia:</span> <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['fantasia']); ?></span>
                                </address>
                              
                              </div>
                              <?php } ?>
                          </div>
                        </div>
                    </div>
                    <!-- END Customer -->                  
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
