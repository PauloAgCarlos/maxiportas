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

    <title>HJAlúminio</title>

    <meta name="description" content="HJAlúminio">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="HJAlúminio">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="HJAlúminio">
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
    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" id="css-main" href="../assets/css/dashmix.min.css">

  </head>
  <body>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">

      <?php require_once "../template/sidebar.php" ?>

      <?php require_once "../template/header.php" ?>
      

      <!-- Main Container -->
      <main id="main-container">

        <!-- Page Content -->
        <div class="content">

          <!-- Latest Orders + Stats -->
          <div class="row">
            <div class="col-md-12">
              <!--  Latest Orders -->

              <div class="block block-rounded block-mode-loading-refresh">
                <div class="block-header block-header-default">
                  <h3 class="block-title">
                    Pedidos / Orçamentos
                  </h3>
                  <div class="block-options">
                    <button type="button" class="btn-block-option">
                      <a href="dashboard.php">Voltar</a>
                    </button>
                  </div>
                </div>
                <div class="table-responsive">
          
                  <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                    <thead style="text-align: center; font-size: 0.8em; background-color: #2ab759; color: #fff;">
                      <tr class="text-uppercase">
                        <th>Nome do <br> Cliente</th>
                        <th>Data Inicial</th>
                        <th>Data Final</th>
                        <th>Ed</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        require_once "../controllers/controllers_pedidos_dos_clientes.php";
                        $pedidos_dos_clientes = new controllers_pedidos_dos_clientes();
                        $id_descripitografado = base64_decode($_GET['view']);
                        $result_pedidos = $pedidos_dos_clientes->selecionar_pedidos_dos_clientes_id($id_descripitografado);
                        if(count($result_pedidos) > 0)
                        {
                          foreach($result_pedidos as $row_pedidos){
                      ?>
                      <tr>
                        <td class="text-center text-end fw-medium">
                          <?= $row_pedidos['nome_cliente']; ?>
                        </td>
                        <td class="text-center text-end fw-medium">
                          <?= $row_pedidos['data_inicial']; ?>
                        </td>
                        <td class="text-center text-end fw-medium">
                          <?= $row_pedidos['data_final']; ?>
                        </td>
                        <td class="text-center d-xl-table-cell" style="color: blue;">
                          <form action="gestao_pedidos.php" method="post">
                            <input type="hidden" name="view" value="<?php $idCriptografado = base64_encode($row_pedidos['id']); echo $idCriptografado;?>">
                            <button type="submit" style="cursor: pointer; border: none; background-color: transparent;">
                              <i class="fa fa-pencil-alt" style="color: blue;"></i>
                            </button>
                          </form>
                        </td>
                      </tr>
                      <?php 
                        } } else 
                        {
                          echo "<h1>Nenhum registo encontrado!</h1>";
                        }
                      ?>
                      
                    </tbody>
                  </table>
                  <div class="block-header block-header-default">
                  <?php
                      require_once "../controllers/controllers_pedidos_dos_clientes.php";
                      $pedidos_dos_clientes = new controllers_pedidos_dos_clientes();
                      $idDescriptografado = base64_decode($_GET['view']); 
                      $result_pedidos = $pedidos_dos_clientes->selecionar_pedidos_dos_clientes_id($idDescriptografado);

                      foreach($result_pedidos as $row_pedidos_id){ ?>
                  <h3 class="block-title">Descrição Produto/Serviço: <span class="fs-sm text-muted"><?php echo addslashes($row_pedidos_id['descricao_pedido']); ?></h3>
                  <?php }?>
                </div>
                </div>
                </div>
              </div>
              <!-- END Latest Orders -->
            </div>
          </div>
          <!-- END Latest Orders + Stats -->
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->

      <?php require_once "../template/footer.php"; ?>
    </div>
    <!-- END Page Container -->

    
  </body>
</html>
