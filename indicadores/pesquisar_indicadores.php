<?php 

    session_start();
    require_once "../conexao-bd.php";
    if(!isset($_SESSION['email'])){
        header('location: ../index.php');
    }

require_once "../config.php";

//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
if(!isset($_GET['pesquisar'])){
	header("Location: visualizar_indicadores.php");
}else{
	$valor_pesquisar = $_GET['pesquisar'];
}

//Criar a conexão
$conn = mysqli_connect($DBHOST, $DBUSER, $DBPASS, $DBNAME);

//Selecionar todos os indicadores da tabela
$result_curso = "SELECT * FROM indicadores WHERE ano_mes LIKE '%$valor_pesquisar%'";
$resultado_curso = mysqli_query($conn, $result_curso);

//Contar o total de indicadores
$total_indicadores = mysqli_num_rows($resultado_curso);

//Seta a quantidade de indicadores por pagina
$quantidade_pg = 1;

//calcular o número de pagina necessárias para apresentar os indicadores
$num_pagina = ceil($total_indicadores/$quantidade_pg);

//Calcular o inicio da visualizacao
$incio = ($quantidade_pg*$pagina)-$quantidade_pg;

//Selecionar os indicadores a serem apresentado na página
$result_indicadores = "SELECT * FROM indicadores WHERE ano_mes LIKE '%$valor_pesquisar%' limit $incio, $quantidade_pg";
$resultado_indicadores = mysqli_query($conn, $result_indicadores);
$total_indicadores = mysqli_num_rows($resultado_indicadores);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>HJ Alumínio</title>

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
              <form class="w-100" action="pesquisar_indicadores.php" method="GET">
                <div class="input-group">
                  <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                  <button type="button" class="btn btn-alt-primary" data-toggle="layout" data-action="header_search_off">
                    <i class="fa fa-fw fa-times-circle"></i>
                  </button>
                  <input type="text" class="form-control border-0" placeholder="Pesquisar por: Ano/Mês" id="page-header-search-input" name="pesquisar">
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- END Header Search -->
    <!-- END Right Section -->
    </div> 

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
                    Resultado do Indicadores
                  </h3>
                  <a class="btn btn-alt-secondary" href="visualizar_indicadores.php">
                    <i class="fa fa-arrow-left me-1"></i> Visualizar Indicadores
                  </a>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                  <?php
                    require_once "../controllers/controllers_indicadores.php";

                    $selecionar_indicadores = new controllers_indicadores();
                    $result_indicadores = $selecionar_indicadores->selecionar_indicadores();
                    if(count($result_indicadores) > 0)
                    { ?>
                    <thead style="text-align: center;">
                      <tr class="text-uppercase">
                        <th>Ano/Mês</th>
                        <th>Ver Mais</th>
                      </tr>
                    </thead>
                    <?php }?>
                    <tbody style="text-align: center;">
                        <?php
                            require_once "../controllers/controllers_indicadores.php";

                            $selecionar_indicadores = new controllers_indicadores();
                            $result_indicadores = $selecionar_indicadores->selecionar_indicadores();
                            if(count($result_indicadores) > 0)
                            {
                              while($row_indicadores = mysqli_fetch_assoc($resultado_indicadores)){ ?>
                                <tr style="text-align: center;">
                                  <td>
                                      <span class="fw-semibold"><?php echo $row_indicadores['ano_mes']; ?></span>
                                  </td>
                                  <td class="text-center text-nowrap fw-medium" style="display: flex; justify-content: center; align-items: center;">

                                    <a href="./atualizar_indicadores.php?atualizar_agregar=<?php $idCriptografado = base64_encode($row_indicadores['id']); echo $idCriptografado;?>">
                                        <i class="fa fa-pencil-alt me-1 opacity-100"></i>
                                    </a>

                                    <?php
                                       echo "<button class='btn' onclick='abrirModal(".$row_indicadores['id'].")'><i class='fa fa-fw fa-times text-danger'></i></button>";
                                    ?>
                                  </td>
                                </tr>

                          <?php } } else { echo "<h1>Nenhum registo encontrado!</h1>"; } ?>                      
                    </tbody>
                  </table>
                </div>
                </div>
                <?php
				//Verificar a pagina anterior e posterior
				$pagina_anterior = $pagina - 1;
				$pagina_posterior = $pagina + 1;
                ?>
                <nav class="text-center">
                    <ul class="pagination">
                        <li>
                            <?php
                            if($pagina_anterior != 0){ ?>
                                <a href="pesquisar_indicadores.php?pagina=<?php echo $pagina_anterior; ?>&pesquisar=<?php echo $valor_pesquisar; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            <?php }else{ ?>
                                <span aria-hidden="true">&laquo;</span>
                        <?php }  ?>
                        </li>
                        <?php 
                        //Apresentar a paginacao
                        for($i = 1; $i < $num_pagina + 1; $i++){ ?>
                            <li><a href="pesquisar_indicadores.php?pagina=<?php echo $i; ?>&pesquisar=<?php echo $valor_pesquisar; ?>"><?php echo $i; ?></a></li>
                        <?php } ?>
                        <li>
                            <?php
                            if($pagina_posterior <= $num_pagina){ ?>
                                <a href="pesquisar_indicadores.php?pagina=<?php echo $pagina_posterior; ?>&pesquisar=<?php echo $valor_pesquisar; ?>" aria-label="Previous">
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
                                Tem certeza de que deseja eliminar este Indicadores?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger" id="btnConfirmarExclusao">Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Last Modal-->


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
    
    <script>
      let idProdutoParaExcluir;

      function abrirModal(idProduto) {
          idProdutoParaExcluir = idProduto;
          const modal = new bootstrap.Modal(document.getElementById('modalConfirmacao'), {});
          modal.show();
      }

      document.getElementById('btnConfirmarExclusao').addEventListener('click', function() {
          window.location.href = `eliminar_indicadores.php?id=${idProdutoParaExcluir}`;
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
<?php } ?>
