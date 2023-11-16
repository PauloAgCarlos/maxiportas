<?php 

    session_start();
    require_once "../conexao-bd.php";
    if(!isset($_SESSION['email'])){
        header('location: ../index.php');
    }

require_once "../config.php";

//Criar a conexão
$conn = mysqli_connect($DBHOST, $DBUSER, $DBPASS, $DBNAME);
//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

//Selecionar todos os clientes da tabela
$result_clientes = "SELECT * FROM clientes";
$resultado_clientes = mysqli_query($conn, $result_clientes);

//Contar o total de clientes
$total_clientes = mysqli_num_rows($resultado_clientes);

//Seta a quantidade de clientes por pagina
$quantidade_pg = 10;

//calcular o número de pagina necessárias para apresentar os clientes
$num_pagina = ceil($total_clientes/$quantidade_pg);

//Calcular o inicio da visualizacao
$incio = ($quantidade_pg*$pagina)-$quantidade_pg;

//Selecionar os clientes a serem apresentado na página
$result_clientes = "SELECT * FROM clientes limit $incio, $quantidade_pg";
$resultado_clientes = mysqli_query($conn, $result_clientes);
$total_clientes = mysqli_num_rows($resultado_clientes);

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

    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" id="css-main" href="../assets/css/dashmix.min.css">

    <!--Pagination-->
    <link rel="stylesheet" href="../assets/css/pagination.css">

    <!--SwitAlert Success ao Cadastrar-->
    <script src="../assets/js/cdn.jsdelivr.net_npm_sweetalert2@11.0.18_dist_sweetalert2.all.min.js"></script>

  </head>
  <body>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
      
    <?php require_once "../template/sidebar.php" ?>

        <!-- Header -->
<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
    <!-- Left Section -->
    <div class="space-x-1">
        <!-- Toggle Sidebar -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
        <button type="button" class="btn btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
        <i class="fa fa-fw fa-bars"></i>
        </button>
         <!-- Open Search Section -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-alt-secondary" data-toggle="layout" data-action="header_search_on">
              <i class="fa fa-fw opacity-50 fa-search"></i> <span class="ms-1 d-none d-sm-inline-block">Pesquisar</span>
            </button>
            <!-- END Open Search Section -->
        
        <!-- END Toggle Sidebar -->
    </div>
    <!-- END Left Section -->

    <!-- Right Section -->
    <?php require_once "../template/btn_logout.php"; ?>

    <!-- Header Search -->
    <div id="page-header-search" class="overlay-header bg-header-dark">
          <div class="bg-white-10">
            <div class="content-header">
              <form class="w-100" action="pesquisar_clientes.php" method="GET">
                <div class="input-group">
                  <button type="button" class="btn btn-alt-primary" data-toggle="layout" data-action="header_search_off">
                    <i class="fa fa-fw fa-times-circle"></i>
                  </button>
                  <input type="text" class="form-control border-0" placeholder="Pesquisar por: CNPF" id="page-header-search-input" name="pesquisar">
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- END Header Search -->
    <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Loader -->
    <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-header-dark">
    <div class="bg-white-10">
        <div class="content-header">
        <div class="w-100 text-center">
            <i class="fa fa-fw fa-sun fa-spin text-white"></i>
        </div>
        </div>
    </div>
    </div>
    <!-- END Header Loader -->
</header>
<!-- END Header -->


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
                    Visualizar Clientes
                  </h3>
                  <a class="btn btn-alt-secondary" href="clientes.php">
                    <i class="fa fa-arrow-left me-1"></i> Cadastrar Clientes
                  </a>
                </div>
                <div class="block-content">
                  <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                  <?php
                    require_once "../controllers/controllers_clientes.php";

                    $selecionar_clientes = new controllers_clientes();
                    $resul_clientes = $selecionar_clientes->selecionar_clientes();
                    
                    if(count($resul_clientes) > 0)
                    { ?>
                    <thead style="text-align: center;">
                      <tr class="text-uppercase">
                        <th>CNPJ</th>
                        <th class="d-none d-xl-table-cell">Nome</th>
                        <th>Email</th>
                        <th>Ver Mais</th>
                      </tr>
                    </thead>
                    <?php } ?>
                    <tbody style="text-align: center;">
                        <?php
                            require_once "../controllers/controllers_clientes.php";

                            $selecionar_clientes = new controllers_clientes();
                            $resul_clientes = $selecionar_clientes->selecionar_clientes();
                            
                            if(count($resul_clientes) > 0)
                            {

                              while($row_clientes = mysqli_fetch_assoc($resultado_clientes)){ ?>
                              <tr>
                                  <td>
                                      <span class="fw-semibold"><?php echo $row_clientes['cnpj']; ?></span>
                                  </td>
                                  <td class="d-none d-xl-table-cell">
                                      <span class="fs-sm text-muted"><?php echo $row_clientes['nome']; ?></span>
                                  </td>
                                  <td>
                                      <span class="fw-semibold"><?php echo $row_clientes['email']; ?></span>
                                  </td>
                                  <td class="text-center text-nowrap fw-medium" style="display: flex; justify-content: center; align-items: center;">

                                      <a href="vermais_clientes.php?view_clientes=<?php $idCriptografado = base64_encode($row_clientes['id']); echo $idCriptografado; ?>">
                                          <i class="fa fa-eye me-1 opacity-50"></i>
                                      </a>
                                      
                                      <?php
                                       echo "<button class='btn' onclick='abrirModal(".$row_clientes['id'].")'><i class='fa fa-fw fa-times text-danger'></i></button>";
                                      ?>
                                      
                                  </td>
                              </tr>

                        <?php } } else{ echo "<h1>Nenhum registo encontrado!</h1>"; } ?>
                                          
                    </tbody>
                  </table>
                  <?php
                    //Verificar a pagina anterior e posterior
                    $pagina_anterior = $pagina - 1;
                    $pagina_posterior = $pagina + 1;
                  ?>
                <nav class="text-center">
                  <ul class="pagination" style="display: flex; align-items: center; justify-content: space-between; width: 20%; margin: auto;">
                    <li>
                      <?php
                      if($pagina_anterior != 0){ ?>
                        <a href="visualizar_clientes.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                      <?php }else{ ?>
                        <span aria-hidden="true">&laquo;</span>
                      <?php }  ?>
                    </li>
                    <?php 
                    //Apresentar a paginacao
                    for($i = 1; $i < $num_pagina + 1; $i++){ ?>
                      <li><a href="visualizar_clientes.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                      </li>
                    <?php } ?>
                    <li>
                      <?php
                      if($pagina_posterior <= $num_pagina){ ?>
                        <a href="visualizar_clientes.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                      <?php }else{ ?>
                        <span aria-hidden="true">&raquo;</span>
                      <?php }  ?>
                    </li>
                  </ul>
                </nav>

                  <!-- Modal de confirmação -->
                  <div class="modal fade" id="modalConfirmacao" tabindex="-1" aria-labelledby="modalConfirmacaoLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header bg-danger">
                                  <h5 class="modal-title text-white" id="modalConfirmacaoLabel">Confirmar Eliminação</h5>
                                  <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  Tem certeza de que deseja eliminar este Cliente?
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                  <button type="button" class="btn btn-danger" id="btnConfirmarExclusao">Confirmar</button>
                              </div>
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
      <?php require_once "../template/footer.php"; ?>
      <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!-- <script src="../assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.0-alpha1_dist_js_bootstrap.bundle.min.js"></script> -->
    <script>
      let idProdutoParaExcluir;

      function abrirModal(idProduto) {
          idProdutoParaExcluir = idProduto;
          const modal = new bootstrap.Modal(document.getElementById('modalConfirmacao'), {});
          modal.show();
      }

      document.getElementById('btnConfirmarExclusao').addEventListener('click', function() {
          window.location.href = `eliminar_clientes.php?id=${idProdutoParaExcluir}`;
      });
    </script>
  </body>
</html>

<?php if(isset($_GET['eliminado'])){ ?>
  <script>
    const Toast = Swal.mixin({
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

    Toast.fire({
    icon: 'success',
    title: 'Eliminado Com Sucesso!'
    })
  </script>
<?php } elseif(isset($_GET['error'])){ ?>
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
    title: 'Erro ao Eliminar!'
    })
  </script>

<?php } elseif(isset($_GET['atualizado'])){ ?>
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
    title: 'Atualizado com Sucesso!'
    })
  </script>
<?php } ?>

