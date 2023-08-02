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
                        <div class="col-sm-4">
                        
                        <div class="block block-rounded">

                          <?php
                            require_once "../controllers/controllers_parceiros.php";

                            $selecionar_parceiros_id = new controllers_parceiros();
                            $idDescriptografado = base64_decode($_GET['view_parceiros']); 
                            foreach($selecionar_parceiros_id->selecionar_parceiros_id($idDescriptografado) as $row_parceiros_id){ ?>

                            <div class="block-header block-header-default">
                              <h3 class="block-title">Razão Social: <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['razaosocial']); ?></h3>
                            </div>

                            <div class="block-content">
                              <div class="fs-4 mb-1">CNPJ: <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['cnpj']); ?></span></div>
                              <address class="fs-sm">
                                  Nome Fantasia: <?php echo addslashes($row_parceiros_id['nomefantasia']); ?><br>
                                  Complemento	: <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['complemento']); ?></span><br>
                                  Cidade: <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['cidade']); ?></span><br>                                
                                  Endereço: <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['endreco']); ?></span><br>
                                  <i class="fa fa-envelope-o"></i><?php echo addslashes($row_parceiros_id['email']); ?>
                              </address>
                            </div>
                            <?php } ?>
                        </div>
                        
                        </div>
                        <div class="col-sm-4">
                          <div class="block block-rounded">
                            <?php
                              require_once "../controllers/controllers_parceiros.php";

                              $selecionar_parceiros_id = new controllers_parceiros();
                              $idDescriptografado = base64_decode($_GET['view_parceiros']); 

                              foreach($selecionar_parceiros_id->selecionar_parceiros_id($idDescriptografado) as $row_parceiros_id_id){ ?>
                              <div class="block-header block-header-default">
                                <h3 class="block-title">Bairro: <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['bairro']); ?></span></h3>
                              </div>
                              <div class="block-content">
                              <div class="fs-4 mb-1">CEP: <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['cep']); ?></span></div>
                              <address class="fs-sm">
                              Instagram: <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['instagram']); ?></span><br>
                                  Facebook: <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['facebook']); ?></span><br>
                                  UF: <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['uf']); ?></span><br>
                                  IE: <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['ie']); ?></span><br>
                                  <i class="fa fa-phone"></i> Número: <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['numero']); ?></span><br>
                                  <i class="fa fa-phone"></i> Telefone: <span class="fs-sm text-muted"><?php echo addslashes($row_parceiros_id['telefone']); ?></span>
                              </address>
                              </div>
                              <?php } ?>
                          </div>
                        </div>

                        <div class="col-sm-4">
                          <div class="block block-rounded">
                            <?php
                              require_once "../controllers/controllers_parceiros.php";

                              $selecionar_parceiros_id = new controllers_parceiros();
                              $idDescriptografado = base64_decode($_GET['view_parceiros']); 

                              foreach($selecionar_parceiros_id->selecionar_parceiros_id($idDescriptografado) as $row_parceiros_id_id){ ?>
                              <div class="block-header block-header-default">
                                <h3 class="block-title text-center">Imagem:</h3>
                              </div>

                              <div style="margin: auto; margin-top: 5%; display: flex; align-items: center; justify-content: center;">
                                <?php if($row_parceiros_id_id['imagem'] == ""){ ?>
                                  <img style="width: 150px; height: 150px; border-radius: 150px; border: 1px solid black; display: block; margin: auto;" src="../assets/img/avatars/avatar10.jpg" alt="Avatar">
                                <?php  } else { ?>
                                  <img style="width: 150px; height: 150px; border-radius: 150px; border: 1px solid black; display: block; margin: auto;" src="<?php echo $row_parceiros_id_id['imagem']; ?>" alt="">
                                <?php }?>
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
