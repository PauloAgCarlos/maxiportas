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
          <!-- Overview -->
          <!-- <div class="row items-push">
            <div class="col-sm-6 col-xl-3">
              <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1">
                  <div class="item rounded-3 bg-body mx-auto my-3">
                    <i class="fa fa-users fa-lg text-primary"></i>
                  </div>
                  <div class="fs-1 fw-bold">2,388</div>
                  <div class="text-muted mb-3">Registered Users</div>
                  <div class="d-inline-block px-3 py-1 rounded-pill fs-sm fw-semibold text-success bg-success-light">
                    <i class="fa fa-caret-up me-1"></i>
                    19.2%
                  </div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                  <a class="fw-medium" href="javascript:void(0)">
                    View all users
                    <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1">
                  <div class="item rounded-3 bg-body mx-auto my-3">
                    <i class="fa fa-level-up-alt fa-lg text-primary"></i>
                  </div>
                  <div class="fs-1 fw-bold">14.6%</div>
                  <div class="text-muted mb-3">Bounce Rate</div>
                  <div class="d-inline-block px-3 py-1 rounded-pill fs-sm fw-semibold text-danger bg-danger-light">
                    <i class="fa fa-caret-down me-1"></i>
                    2.3%
                  </div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                  <a class="fw-medium" href="javascript:void(0)">
                    Explore analytics
                    <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1">
                  <div class="item rounded-3 bg-body mx-auto my-3">
                    <i class="fa fa-chart-line fa-lg text-primary"></i>
                  </div>
                  <div class="fs-1 fw-bold">386</div>
                  <div class="text-muted mb-3">Confirmed Sales</div>
                  <div class="d-inline-block px-3 py-1 rounded-pill fs-sm fw-semibold text-success bg-success-light">
                    <i class="fa fa-caret-up me-1"></i>
                    7.9%
                  </div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                  <a class="fw-medium" href="javascript:void(0)">
                    View all sales
                    <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full">
                  <div class="item rounded-3 bg-body mx-auto my-3">
                    <i class="fa fa-wallet fa-lg text-primary"></i>
                  </div>
                  <div class="fs-1 fw-bold">$4,920</div>
                  <div class="text-muted mb-3">Total Earnings</div>
                  <div class="d-inline-block px-3 py-1 rounded-pill fs-sm fw-semibold text-danger bg-danger-light">
                    <i class="fa fa-caret-down me-1"></i>
                    0.3%
                  </div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                  <a class="fw-medium" href="javascript:void(0)">
                    Withdrawal options
                    <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          END Overview -->

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
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                      <i class="si si-refresh"></i>
                    </button>
                  </div>
                </div>
                <div class="table-responsive">
                    <!-- <div>
                        <th>Novo</th>
                        <th>Pesquisar</th>
                        <th>Quebras</th>
                        <th>Resumo</th>
                        <th>Colunas</th>
                        <th>Imprimir</th>
                        <th>Produção</th>
                        <th>Etiquetas</th>
                        <th>Andamento</th>
                        <th>Legenda</th>
                    </div> -->
                  <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                    <thead style="text-align: center; font-size: 0.8em; background-color: #2ab759; color: #fff;">
                      <tr class="text-uppercase">
                        <!-- <th>
                            <button type="button" class="btn btn-alt-secondary" data-toggle="layout" data-action="header_search_on">
                                <i class="fa fa-fw opacity-50 fa-search"></i> <span class="ms-1 d-none d-sm-inline-block">Busca Rápida</span>
                            </button>
                        </th> -->
                        <th><input type="checkbox" name="" id=""></th>
                        <th>Ed</th>
                        <th>XML <br> Cliente</th>
                        <th>Ficha <br> de <br> Corte</th>
                        <th>Produção <br> Programada</th>
                        <th>Situação</th>
                        <th>Parceiro</th>
                        <th>OP</th>
                        <th>Pedido <br> Fábrica</th>
                        <th>Pedido <br> Parceiro</th>
                        <th>Razão <br> Social</th>
                        <th>Fantasia</th>
                        <th>Nome <br> Consumidor</th>
                        <th>Data <br> Orçamento</th>
                        <th>Data <br> Pedido</th>
                        <th>Última <br> Alteraão</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <input type="checkbox" name="" id="">
                        </td>
                        <td class="d-none d-xl-table-cell" style="color: blue;">
                            <i class="fa fa-pencil-alt"></i>
                        </td>
                        <td>
                          <img style="margin: auto; display: block;" src="../assets/img/xml.gif" alt="XML">
                        </td>
                        <td class="text-end fw-medium">
                          conteúdo
                        </td>
                        <td class="text-end fw-medium">
                          conteúdo
                        </td>
                        <td class="text-end fw-medium">
                          conteúdo
                        </td>
                        <td class="text-end fw-medium">
                          conteúdo
                        </td>
                        <td class="text-end fw-medium">
                          conteúdo
                        </td>
                        <td class="text-end fw-medium">
                          conteúdo
                        </td>
                        <td class="text-end fw-medium">
                          conteúdo
                        </td>
                        <td class="text-end fw-medium">
                          conteúdo
                        </td>
                        <td class="text-end fw-medium">
                          conteúdo
                        </td>
                        <td class="text-end fw-medium">
                          conteúdo
                        </td>
                        <td class="text-end fw-medium">
                          conteúdo
                        </td>
                        <td class="text-end fw-medium">
                          conteúdo
                        </td>
                        <td class="text-end fw-medium">
                          conteúdo
                        </td>
                      </tr>
                      
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
