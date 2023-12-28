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
                </div>
                <div class="table-responsive">

                  <div style="margin: 5px; display: flex; justify-content: right;">
                    <div>   
                        <form action="pdf_solicitacaocliente.php" target="_blank" method="post" id="resultForm">
                            <input type="hidden" id="selectedIds" name="selectedIds">
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 20px; border: 1px solid #ccc; background-color: transparent; padding: 5px 0 5px 16px;">
                                  <a style="color: #1d1d1d; font-size: 0.9em;"  style="text-decoration: none;"  href="#" role="button" aria-expanded="false">Imprimir <img src="../assets/img/icons8-ordem-descendente-24.png" width="16px" alt=""></a>
                                </button>
                                <ul class="dropdown-menu">
                                    <li> 
                                        <button class="dropdown-item" type="submit" name="btn_submit" value="PDF Cliente">Gerar</button>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                  </div>
          
                  <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                    <thead style="text-align: center; font-size: 0.8em; background-color: #2ab759; color: #fff;">
                      <tr class="text-uppercase">
                        <th>ID</th>
                        <th class="text-center d-xl-table-cell"><input type="checkbox" name="" id=""></th>
                        <th><i class="fa fa-eye me-1 opacity-50" style="color: blue;"></i></th>
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
                        <td style="text-align: center;"><?php echo $row_pedidos['id']; ?></td>
                        <td style="color: blue; text-align: center;">
                          <form id="selectForm">
                              <?php
                              $items = array(1, 2, 3, 4, 5);
                                echo '<input type="checkbox" name="selectedItems[]" value="' . $row_pedidos['id'] . '">';
                              ?>
                          </form>
                        </td>

                        <td class="text-center d-xl-table-cell" style="color: blue; margin: auto; text-align: center;">
                          <form action="gestao_pedidos.php" method="post">
                            <input type="hidden" name="view" value="<?php $idCriptografado = base64_encode($row_pedidos['id']); echo $idCriptografado;?>">
                            <button type="submit" style="cursor: pointer; border: none; background-color: transparent;">
                              <i class="fa fa-eye me-1 opacity-50" style="color: blue;"></i>
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
                    <script>
                        const checkboxes = document.querySelectorAll("#selectForm input[type='checkbox']");
                        const selectedIdsInput = document.getElementById("selectedIds");

                        checkboxes.forEach((checkbox) => {
                            checkbox.addEventListener("change", updateSelectedIds);
                        });

                        function updateSelectedIds() {
                            const selectedCheckboxes = Array.from(checkboxes).filter((checkbox) => checkbox.checked);
                            const selectedIds = selectedCheckboxes.map((checkbox) => checkbox.value);

                            selectedIdsInput.value = JSON.stringify(selectedIds);
                        }
                    </script>
                  </table>
                </div>
                </div>


          <!-- Latest Orders + Stats -->
          <div class="row">
            <div class="col-md-12">
              <!--  Latest Orders -->

              <div class="block block-rounded block-mode-loading-refresh">
                <div class="block-header block-header-default">
                  <h3 class="block-title">
                    Pedidos
                  </h3>
                </div>
                <div class="table-responsive">   
                  
                
                <div style="margin: 5px; display: flex; justify-content: space-between;">
                    <button style="border-radius: 20px; border: 1px solid #ccc; background-color: transparent; padding: 5px 16px;"><a href="ordem_producao.php" style="color: #1d1d1d; font-size: 0.9em;">Novo</a></button>

                    <div>    
                        <form action="testids.php" method="post" target="_blank" id="resultFormPedidos">
                            <input type="hidden" id="selectedIdsPedidos" name="selectedIdsPedidos">
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 20px; border: 1px solid #ccc; background-color: transparent; padding: 5px 0 5px 16px;">
                                  <a style="color: #1d1d1d; font-size: 0.9em;"  style="text-decoration: none;"  href="#" role="button" aria-expanded="false">Imprimir <img src="../assets/img/icons8-ordem-descendente-24.png" width="16px" alt=""></a>
                                </button>
                                <ul class="dropdown-menu">
                                    <li> 
                                        <button class="dropdown-item" type="submit" name="btn_submit" value="Ficha de Corte">Ficha de Corte (Vidro)</button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" type="submit" name="btn_submit" value="Sintético - Cliente">Sintético - Cliente</button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" type="submit" name="btn_submit" value="Sintético 3 - Cliente">Sintético 3 - Cliente</button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" type="button" name="btn_submit" value="Sintético 3 - Sem Valor">Sintético 3 - Sem Valor</button>
                                    </li>
                                    <li style="width: 100%;"><hr class="dropdown-divider" style="color: black; padding: 1px;"></li>
                                    <li>
                                        <button class="dropdown-item" type="button" name="btn_submit" value="Relátorio de Vendas (OP)">Relátorio de Vendas (OP)</button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" type="button" name="btn_submit" value="Relátorio para Entrega Por Cliente">Relátorio para Entrega Por Cliente</button>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                  </div>


                  <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                    <thead style="text-align: center; font-size: 0.8em; background-color: #2ab759; color: #fff;">
                      <tr class="text-uppercase">
                        <th>ID</th>
                        <th><input type="checkbox"></th>
                        <th>Cliente</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Ver Mais</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        require_once '../controllers/controllers_pedidos_dos_clientes.php';
                        $pedidos_p = new controllers_pedidos_dos_clientes();
                        $result_p = $pedidos_p->selecionar_tbl_ordem_producao();
                        if(count($result_p) > 0)
                        {
                          foreach($result_p as $row_p){
                      ?>
                      <tr>
                        <td class="text-center text-end fw-medium">
                          <?= $row_p['id']; ?>
                        </td>
                        <td class="text-center text-end fw-medium">
                          <form id="selectFormPedidos">
                              <?php
                              $items = array(1, 2, 3, 4, 5);
                                echo '<input type="checkbox" name="selectedItemsPedidos[]" value="' . $row_p['id'] . '">';
                              ?>
                          </form>
                        </td>
                        <td class="text-center text-end fw-medium">
                          <?= $row_p['cliente']; ?>
                        </td>
                        <td class="text-center text-end fw-medium">
                          <?= $row_p['produto']; ?>
                        </td>
                        <td class="text-center text-end fw-medium">
                          <?= $row_p['qtd']; ?>
                        </td>
                        <td class="text-center text-nowrap fw-medium" style="display: flex; justify-content: center; align-items: center;">

                          <a href="vermais_pedidos.php?view_pedidos=<?php $idCriptografado = base64_encode($row_p['id']); echo $idCriptografado;?>">
                              <i class="fa fa-eye me-1 opacity-50"></i>
                          </a>

                        </td>
                        
                      </tr>
                      <?php 
                        } } else 
                        {
                          echo "<h1>Nenhum registo encontrado!</h1>";
                        }
                      ?>
                      
                    </tbody>
                     <script>
                        const checkboxesPedidos = document.querySelectorAll("#selectFormPedidos input[type='checkbox']");
                        const selectedIdsPedidosInput = document.getElementById("selectedIdsPedidos");

                        checkboxesPedidos.forEach((checkbox) => {
                            checkbox.addEventListener("change", updateSelectedIdsPedidos);
                        });

                        function updateSelectedIdsPedidos() {
                            const selectedCheckboxesPedidos = Array.from(checkboxesPedidos).filter((checkbox) => checkbox.checked);
                            const selectedIdsPedidos = selectedCheckboxesPedidos.map((checkbox) => checkbox.value);

                            selectedIdsPedidosInput.value = JSON.stringify(selectedIdsPedidos);
                        }
                    </script>
                  </table>
                </div>
                </div>
              </div>
              <!-- END Latest Orders -->
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

<?php } elseif(isset($_GET['vazio'])){ ?>

<script>
  const Toastvazio = Swal.mixin({
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

  Toastvazio.fire({
  icon: 'error',
  title: 'Selecione um Registo!'
  })
</script>

<?php } ?>

