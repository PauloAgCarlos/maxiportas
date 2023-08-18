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
          <div class="row items-push">
            <div class="col-sm-6 col-xl-3">
              <div style="background-color: #9999ff;" class="block block-rounded text-center d-flex flex-column mb-0">
                <div class="block-content block-content-fullA flex-grow-1" style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                  <div class="item rounded-3 bg-body mx-auto mb-3">
                    <i class="fa fa-wallet fa-lg text-primary"></i>
                  </div>
                  <div class="mb-3" style="color: #000000; font-weight: 600;">Ordens de Serviço</div>
                </div> 
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div style="background-color: #ff9966;" class="block block-rounded text-center d-flex flex-column mb-0">
                <div class="block-content block-content-fullA flex-grow-1" style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                  <div class="item rounded-3 bg-body mx-auto mb-3">
                    <i class="fa fa-level-up-alt fa-lg text-primary"></i>
                  </div>
                  <div class="mb-3" style="color: #000000; font-weight: 600;">Compras</div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div style="background-color: #33cccc;" class="block block-rounded text-center d-flex flex-column mb-0">
                <div class="block-content block-content-fullA flex-grow-1" style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                  <div class="item rounded-3 bg-body mx-auto mb-3">
                    <i class="fa fa-chart-line fa-lg text-primary"></i>
                  </div>
                  <div class="mb-3" style="color: #000000; font-weight: 600;">Minha Conta</div>
                </div>
              </div>
            </div>
          </div>
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

<!--Preview Image-->
<script src="../assets/js/preview.js"></script>
<!--Evitar Reenvio de Form-->
<script src="../assets/js/evitar_reenvio_form.js"></script>
  </body>
</html>
