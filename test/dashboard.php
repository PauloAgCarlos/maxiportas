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

                    <div>                                    
                        <form action="testids.php" method="post" id="resultForm">
                            <input type="hidden" id="selectedIds" name="selectedIds">
                            <!-- <input type="hidden" name="id_ordemProducao" id="idDoForm1" value="<php echo $_GET['id_filter']; ?>" > -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 20px; border: 1px solid #ccc; background-color: transparent; padding: 5px 0 5px 16px;">
                                <a style="color: #1d1d1d; font-size: 0.9em;"  style="text-decoration: none;"  href="#" role="button" aria-expanded="false">Imprimir <img src="../assets/img/icons8-ordem-descendente-24.png" width="16px" alt=""></a>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <button type="submit" name="btn_enviar_ids">Enviar IDs</button>
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
                        <td><?php echo $row_pedidos['id']; ?></td>
                        <!--td style="display: flex; justify-content: center; align-items: center;">
                          <-- <form action="" method="get"> --
                            <input type="hidden" value="<php echo $row_pedidos['id']; ?>" name="" id="">
                            <-- <button type="submit" style="border: none; background-color: transparent;"> -->
                              <!-- <input type="checkbox" name="id_checkbox" onclick="enviarIdAJAX(123)" value="<php echo $row_pedidos['id']; ?>"> --
                              <php 
                              echo '<input type="checkbox" id="habilitarEnvio_' . $row_pedidos['id'] . '" onchange="atualizarCheckboxes(' . $row_pedidos['id'] . ', this)"> ';
                              // echo '
                              //       <button style="background-color: transparent; border: none;" onclick="enviarID(' . $row_pedidos['id'] . ')">
                              //         <input type="checkbox" id="habilitarEnvio_' . $row_pedidos['id'] . '" onchange="atualizarURL(' . $row_pedidos['id'] . ')">
                              //       </button>
                              //     ';
                              ?>
                              <-- <button style="background-color: transparent; border: none;" onclick="enviarID(12)">
                                <input type="checkbox" id="habilitarEnvio_'.<php echo $id;?>.'" onchange="atualizarURL(12)">
                              </button> -->
                              <!-- <button onclick="enviarID('<php echo $row_pedidos['id']; ?>')" style="background-color: transparent; border: none;">
                                <input type="checkbox" name="id_checkbox" value="<php echo $row_pedidos['id']; ?>">
                              </button> -->
                            <!-- </button>
                          </form> --
                          <script>
                            function atualizarCheckboxes(id, checkbox) {
                                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                                /*checkboxes.forEach(function(cb) {
                                    if (cb !== checkbox) {
                                        cb.checked = false;
                                    }
                                });*/
                                var campoOculto = document.getElementById('idOculto');
                                // Se este checkbox foi marcado
                                if (checkbox.checked) {
                                    // Atualize o campo oculto com o ID
                                    campoOculto.value = id;
                                } else {
                                    // Se este checkbox foi desmarcado, limpe o campo oculto
                                    campoOculto.value = '';
                                }
                            }
                            function enviarID(id) {
                                var campoOculto = document.getElementById('idOculto');

                                // Verifica se o campo oculto tem um ID
                                if (campoOculto.value) {
                                    // Aqui você pode usar o ID como quiser
                                    console.log('ID enviado:', campoOculto.value);
                                } else {
                                    console.log('Checkbox não está habilitado. Não enviando o ID.');
                                }
                            }
                        </script>
                          <-- <script>
                              function atualizarURL(id) {
                                  var checkbox = document.getElementById('habilitarEnvio_' + id);
                                  if (!checkbox.checked) {
                                      history.pushState({}, '', window.location.pathname);
                                  }
                              }
                              function enviarID(id) {
                                  var checkbox = document.getElementById('habilitarEnvio_' + id);
                                  if (checkbox.checked) {
                                      history.pushState({}, '', '?id_filter=' + id);
                                  } else {
                                      console.log('Checkbox não está habilitado. Não enviando o ID.');
                                  }
                              }
                          </script> -->
                          <!-- <script>
                              function enviarID(id) {
                                  // Aqui você pode usar o ID como quiser
                                  console.log('ID enviado:', id);

                                  // Atualize a URL sem recarregar a página
                                  history.pushState({}, '', '?id=' + id);

                                  // Agora você pode usar a variável 'id' em sua URL
                                  // Exemplo de como acessar o ID na URL: window.location.search
                              }
                          </script> -->
                          <!-- <script>
                            function enviarIdAJAX(id) {
                                // Cria um objeto XMLHttpRequest
                                var xhr = new XMLHttpRequest();
                                // Define a função a ser chamada quando a requisição for concluída
                                xhr.onreadystatechange = function() {
                                    if (xhr.readyState === XMLHttpRequest.DONE) {
                                        if (xhr.status === 200) {
                                            // A requisição foi bem-sucedida, faça o que quiser com a resposta
                                            console.log('Resposta do servidor:', xhr.responseText);
                                        } else {
                                            // Ocorreu um erro na requisição
                                            console.error('Erro na requisição:', xhr.status);
                                        }
                                    }
                                };
                                // Abre uma requisição GET assíncrona para sua_pagina.php, passando o ID como parâmetro
                                xhr.open('GET', 'dashboard.php?id=' + id, true);

                                // Envia a requisição
                                xhr.send();
                            }
                          </script> -->

                          <!-- <script>
                            function enviarIdParaUrl(id) {
                                // Redireciona para uma nova URL com o ID como parâmetro
                                window.location.href = 'dashboard.php?id=' + id;
                            }
                          </script> --
                        </td-->

                        <td style="display: flex; justify-content: center; align-items: center;">
                          <!--form id="selectForm">
                            <php echo '<input type="checkbox" name="selectedItems[]" value="' . $row_pedidos['id'] . '"> Item ' . $item . '<br>';?>
                            <--input type="checkbox" name="item[]" value="<php echo $row_pedidos['id']; ?>"--
                          </form-->
                          <form id="selectForm">
                              <?php
                              $items = array(1, 2, 3, 4, 5);
                              //foreach ($items as $item) {
                                  echo '<input type="checkbox" name="selectedItems[]" value="' . 1 . '">';
                              //}
                              ?>
                          </form>
                          <script>
                            const checkboxes = document.querySelectorAll("#selectForm input[type='checkbox']");
                            const selectedIdsField = document.getElementById("selectedIds");

                            checkboxes.forEach(checkbox => {
                            checkbox.addEventListener("change", function () {
                                // Selecionar todos os checkboxes marcados no primeiro formulário
                                const checkedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);
                                
                                // Extrair os IDs dos checkboxes selecionados
                                const selectedIds = checkedCheckboxes.map(checkbox => checkbox.value);
                                
                                // Definir o valor do campo de input no segundo formulário com os IDs selecionados como uma string JSON
                                selectedIdsField.value = JSON.stringify(selectedIds);
                            });
                            });
                          </script>
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


          <!-- Latest Orders + Stats -->
          <div class="row">
            <div class="col-md-12">
              <!--  Latest Orders -->

              <div class="block block-rounded block-mode-loading-refresh">
                <div class="block-header block-header-default">
                  <h3 class="block-title">
                    Pedidos
                  </h3>
                  <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                      <i class="si si-refresh"></i>
                    </button>
                  </div>
                </div>
                <div class="table-responsive">          
                  <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                    <thead style="text-align: center; font-size: 0.8em; background-color: #2ab759; color: #fff;">
                      <tr class="text-uppercase">
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

                          <!--php
                              echo "<button class='btn' onclick='abrirModal(".$row_p['id'].")'><i class='fa fa-fw fa-times text-danger'></i></button>";
                          ?-->
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

