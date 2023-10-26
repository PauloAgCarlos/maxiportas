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
                    <a href="dashboard.php">
                        <i class="fa fa-arrow-left ms-1"></i>
                        Visualizar Pedidos
                    </a>
                  </h3>
                </div>
                <div class="container  bg-dark text-center" style="margin-top: 5%;">
                  <div class="py-2">
                    <h1 class="fw-bold text-white  ">

                      <?php
                      require_once "../controllers/controllers_clientes.php";

                      $selecionar_clientes_id = new controllers_clientes();
                      $idDescriptografado = base64_decode($_GET['view_pedidos']);
                      $id = $idDescriptografado;
                      foreach($selecionar_clientes_id->selecionar_clientes_id($id) as $row_clientes_id){ 
                      echo addslashes($row_clientes_id['nome_razao_socil']); } ?>
                    </h1>
                  </div>
                  <div style=" margin-left:73%; margin-top: -5%;">
                    <a class="btn btn-hero btn-primary" href="./atualizar_clientes.php?atualizar_clientes=<?php $idCriptografado = base64_encode($row_clientes_id['id']); echo $idCriptografado; ?>" data-toggle="click-ripple">
                      <i class="fa fa-pencil-alt"></i>
                    </a>
                    <!-- <a class="btn btn-hero btn-primary" href="eliminar_clientes.php?eliminar_clientes=<php echo $row_clientes_id['id']; ?>" data-toggle="click-ripple">
                      <i class="fa fa-trash" ></i>
                    </a> -->
                    <!-- <form action="eliminar_clientes.php" method="post">
                      <input type="hidden" name="eliminar_clientes" value="<?php echo $row_clientes_id['id']; ?>">
                      <button type="submit" class="btn btn-hero btn-primary" style="color: blue;">
                        <i class="fa fa-trash" ></i>
                      </button>
                    </form> -->
                    <a class="btn  btn-hero btn-primary my-2" href="./dashboard.php">
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
                            require_once "../controllers/controllers_clientes.php";

                            $selecionar_clientes_id = new controllers_clientes();
                            $idDescriptografado = base64_decode($_GET['view_pedidos']);
                            $id = $idDescriptografado;
                            foreach($selecionar_clientes_id->selecionar_clientes_id($id) as $row_clientes_id){ ?>

                            <div class="block-header block-header-default">
                              <h3 class="block-title">Nome: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['nome_razao_socil']); ?></h3>
                            </div>

                            <div class="block-content">
                              <div class="fs-4 mb-1">CPF/CNPJ: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['cpf_cnpj']); ?></span></div>
                              <address class="fs-sm">
                                  Senha: <?php echo addslashes($row_clientes_id['senha']); ?><br>
                                  <i class="fa fa-phone"></i> Contato: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['contato']); ?></span><br>
                                  <i class="fa fa-phone"></i> Telefone: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['telefone']); ?></span><br>                                
                                  <i class="fa fa-phone"></i> Celular: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['celular']); ?></span><br>
                                  <i class="fa fa-envelope-o"></i><?php echo addslashes($row_clientes_id['email']); ?>
                              </address>
                            </div>
                            <?php } ?>
                        </div>
                        
                        </div>
                        <div class="col-sm-6">
                        <!-- Shipping Address -->
                        <div class="block block-rounded">
                          <?php
                            require_once "../controllers/controllers_clientes.php";

                            $selecionar_clientes_id = new controllers_clientes();
                            $idDescriptografado = base64_decode($_GET['view_pedidos']);
                            $id = $idDescriptografado;
                            foreach($selecionar_clientes_id->selecionar_clientes_id($id) as $row_clientes_id_id){ ?>
                            <div class="block-header block-header-default">
                              <h3 class="block-title">Rua: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['rua']); ?></span></h3>
                            </div>
                            <div class="block-content">
                            <div class="fs-4 mb-1">CEP: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['cep']); ?></span></div>
                            <address class="fs-sm">
                            Complemento: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['complemento']); ?></span><br>
                                Bairro: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['bairro']); ?></span><br>
                                Cidade: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['cidade']); ?></span><br>
                                Estado: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['estado']); ?></span><br>
                                <i class="fa fa-phone"></i> Número: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['numero']); ?></span>
                            </address>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- END Shipping Address -->
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
