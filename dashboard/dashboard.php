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
    <link rel="shortcut icon" href="../assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <link rel="stylesheet" id="css-main" href="../assets/css/dashmix.min.css">

    
    <!--SwitAlert Success ao Atualizar-->
    <script src="../assets/js/cdn.jsdelivr.net_npm_sweetalert2@11.0.18_dist_sweetalert2.all.min.js"></script>

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
                    Orçamentos
                  </h3>
                  <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                      <i class="si si-refresh"></i>
                    </button>
                  </div>
                </div>
                <div class="table-responsive">

                  <div style="margin: 5px; display: flex; justify-content: space-between;">
                    <button style="border-radius: 5px; border: 1px solid #ccc; background-color: transparent; width: 200px; padding: 5px 16px;"><a href="ordem_producao.php" style="color: #1d1d1d; font-size: 0.9em;">Busca rápida</a></button>

                    <button style="border-radius: 20px; border: 1px solid #ccc; background-color: transparent; padding: 5px 16px;"><a href="ordem_producao.php" style="color: #1d1d1d; font-size: 0.9em;">Novo</a></button>

                    <button style="border-radius: 20px; border: 1px solid #ccc; background-color: transparent; padding: 5px 16px;"><a href="ordem_producao.php" style="color: #1d1d1d; font-size: 0.9em;">Imprimir</a></button>
                  </div>
          
                  <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                    <thead style="text-align: center; font-size: 0.8em; background-color: #2ab759; color: #fff;">
                      <tr class="text-uppercase">
                        <th></th>
                        <th>Ed</th>
                        <th>Nome do <br> Cliente</th>
                        <th>Data Inicial</th>
                        <th>Data Final</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        require_once "../controllers/controllers_pedidos_dos_clientes.php";
                        $pedidos_dos_clientes = new controllers_pedidos_dos_clientes();
                        $result_pedidos = $pedidos_dos_clientes->selecionar_pedidos_dos_clientes();
                        if(count($result_pedidos) > 0)
                        {
                          foreach($result_pedidos as $row_pedidos){
                      ?>
                      <tr>
                        <td style="display: flex; justify-content: center; align-items: center;">
                          <input type="checkbox" name="" id="">
                        </td>
                        <td class="text-center d-xl-table-cell" style="color: blue;">
                          <form action="gestao_pedidos.php" method="post">
                            <input type="hidden" name="view" value="<?php $idCriptografado = base64_encode($row_pedidos['id']); echo $idCriptografado;?>">
                            <button type="submit" style="cursor: pointer; border: none; background-color: transparent;">
                              <i class="fa fa-pencil-alt" style="color: blue;"></i>
                            </button>
                          </form>
                        </td>
                        <td class="text-center text-end fw-medium">
                          <?= $row_pedidos['nome_cliente']; ?>
                        </td>
                        <td class="text-center text-end fw-medium">
                          <?= $row_pedidos['data_inicial']; ?>
                        </td>
                        <td class="text-center text-end fw-medium">
                          <?= $row_pedidos['data_final']; ?>
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

<?php 

  if(isset($_GET['atualizado'])){ ?>
    <script>
      const Atualizado = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
      })

      Atualizado.fire({
      icon: 'success',
      title: 'Pedido Finalizado com Sucesso!'
      })
    </script>
<?php } elseif(isset($_GET['nao-atualizado'])){ ?>

  <script>
    const Toaste = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })

    Toaste.fire({
    icon: 'error',
    title: 'Erro ao Finalizar Pedido!'
    })
  </script>

<?php } elseif(isset($_GET['stock_baixo'])){ ?>

<script>
  const Toastsb = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
  })

  Toastsb.fire({
  icon: 'error',
  title: 'Stock Baixo!'
  })
</script>

<?php } elseif(isset($_GET['campos_vasio'])){ ?>

<script>
  const Toastvasio = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 5000,
  timerProgressBar: true,
  didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
  })

  Toastvasio.fire({
  icon: 'error',
  title: 'Preencha Produto e Quantidade!'
  })
</script>

<?php } elseif(isset($_GET['produto_vazio'])){ ?>

<script>
  const Toastvq = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 5000,
  timerProgressBar: true,
  didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
  })

  Toastvq.fire({
  icon: 'error',
  title: 'Preencha o Produto/Serviço!'
  })
</script>

<?php } ?>

