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

    <!-- Stylesheets -->
    <link rel="stylesheet" id="css-main" href="../assets/css/dashmix.min.css">

    <!--SwitAlert Success ao Cadastrar-->
    <script src="../assets/js/cdn.jsdelivr.net_npm_sweetalert2@11.0.18_dist_sweetalert2.all.min.js"></script>

    <!--Mascara nos Inputs-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

  </head>
  <body>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
    <?php require_once "../template/sidebar.php" ?>

    <?php require_once "../template/header.php" ?>

      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="content content-full content-boxed">
          <!-- New Post -->
          <form action="calendario.php" method="POST" enctype="multipart/form-data">
            <div class="block">
              <div class="block-header block-header-default">
                <a class="btn btn-alt-secondary" href="calendario.php">
                  Cadastro do Calendário
                </a>
                <a class="btn btn-alt-secondary" href="visualizar_calendario.php">
                  Visualizar Calendário
                </a>
              </div>
              <div class="block-content" >
                <div class="row justify-content-center push">
                  <div class="col-md-12">
                    <div class="mb-1">
                      <label class="form-label" for="ano_mes" style="font-size: 0.8em;">Ano/Mês</label> <span style="color: red;">*</span>
                      <div style="display: flex;">
                        <input type="text" class="form-control" id="ano_mes" name="ano_mes" placeholder="Ano/Mês" style="font-size: 0.8em;" required>
                      </div>
                    </div>  

                    <div class="mb-1">
                      <label class="form-label" for="dias_uteis" style="font-size: 0.9em;">Dias Úteis</label> <span style="color: red;">*</span>
                      <div>
                        <input type="text" class="form-control" id="dias_uteis" name="dias_uteis" placeholder="Dias Úteis" style="font-size: 0.9em;" required>
                      </div>
                    </div>                
                  </div>
                
                </div>
                <div style="display: flex; align-items: center; justify-content: center;">

                  <div class="mb-4 push" style="display: flex; align-items: center; justify-content: center;">
                    <div class="block-content bg-body-light push pb-4">
                      <div>
                        <div class="col-md-12">
                          <button type="submit" name="btn_cadastrar_calendario" class="btn btn-alt-primary">
                            <i class="fa fa-fw fa-check opacity-50 me-1"></i> Cadastrar Calendário
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
              
            </div>
          </form>
          <!-- END New Post -->
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->

      <!-- Footer -->
      <?php require_once "../template/footer.php" ?>
      <!-- END Footer -->
    </div>
    <!-- END Page Container -->

<!--Mascara no input Ano/Mês-->
<script>
    $("#ano_mes").mask("9999/99")
</script>
<!--Preview Image-->
<script src="../assets/js/preview.js"></script>
<!--Evitar Reenvio de Form-->
<script src="../assets/js/evitar_reenvio_form.js"></script>
  </body>
</html>

<?php include_once "cadastrar_calendario.php"; ?>