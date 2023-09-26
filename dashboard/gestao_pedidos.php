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
                    Pedidos / Orçamentos
                  </h3>
                  <div class="block-options">
                    <button type="button" class="btn-block-option">
                      <a href="dashboard.php" style="font-weight: bold;">Voltar</a>
                    </button>
                  </div>
                </div>

                
        <!-- Page Content -->
        <div class="content">

<!-- Latest Orders + Stats -->
<div class="row">
  <div class="col-md-12">
    <!--  Latest Orders -->

    <div class="block block-rounded block-mode-loading-refresh">
      <!-- <div class="block-header block-header-default">
        <h3 class="block-title">
          Pedidos / Orçamentos
        </h3>
        <div class="block-options">
          <button type="button" class="btn-block-option">
            <a href="dashboard.php">Voltar</a>
          </button>
        </div>
      </div> -->
      <div class="table-responsive">

        <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
          <thead style="text-align: center; font-size: 0.8em; background-color: #2ab759; color: #fff;">
            <tr class="text-uppercase">
              <th>Nome do <br> Cliente</th>
              <th>Data Inicial</th>
              <th>Data Final</th>
              <!-- <th>Ed</th> -->
            </tr>
          </thead>
          <tbody>
            <?php
              require_once "../controllers/controllers_pedidos_dos_clientes.php";
              $pedidos_dos_clientes = new controllers_pedidos_dos_clientes();
              $id_descripitografado = base64_decode($_POST['view']); 
              // $idDescriptografado = base64_decode($_POST['view']);
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
              <!-- <td class="text-center d-xl-table-cell" style="color: blue;">
                <form action="gestao_pedidos.php" method="post">
                  <input type="hidden" name="view" value="<php $idCriptografado = base64_encode($row_pedidos['id']); echo $idCriptografado;?>">
                  <button type="submit" style="cursor: pointer; border: none; background-color: transparent;">
                    <i class="fa fa-pencil-alt" style="color: blue;"></i>
                  </button>
                </form>
              </td> -->
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
            $idDescriptografado = base64_decode($_POST['view']); 
            $result_pedidos = $pedidos_dos_clientes->selecionar_pedidos_dos_clientes_id($idDescriptografado);

            foreach($result_pedidos as $row_pedidos_id){ ?>
        <h3 class="block-title">Descrição Produto/Serviço: <span class="fs-sm text-muted"><?php echo addslashes($row_pedidos_id['descricao_pedido']); ?></h3>
        <?php } die(); ?>
      </div>
      </div>
      </div>
    </div>
    <!-- END Latest Orders -->
  </div>
</div>
<!-- END Latest Orders + Stats -->

          
                <form action="teste.php" method="POST" enctype="multipart/form-data">
                  <div class="blockA" id="formulario">
                      <input type="hidden" name="qnt_campo" id="qnt_campo">
                      <div class="block-header">
                        <?php
                          $host = "localhost";
                          $user = "root";
                          $password = "";
                          $bd_name = "maxportas";
                          try
                          {
                              $conn = new PDO("mysql:host=$host;dbname=" . $bd_name, $user, $password);
                          }
                          catch(PDOException $error)
                          {
                              die("Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado: " . $error->getMessage());
                          }
                          $id_user_get = base64_decode($_POST['view']);
                          $result_travessas = $conn->prepare("SELECT nome_cliente, data_final, status, nome_responsavel	 FROM pedidos_dos_clientes WHERE id = :id");
                          $result_travessas->bindParam(":id", $id_user_get);
                          $result_travessas->execute();
                          $row = $result_travessas->fetch(PDO::FETCH_ASSOC);
                          if($row['status'] == 'Finalizado'){
                        ?> 

                        <h3 class="block-title mt-3 text-center p-2 mb-1" style="background-color: #ddd; color:blue;">Solicitação de Pedido do Cliente <span style="font-weight: bolder; font-size: 1.2em"><?php echo addslashes($row['nome_cliente']); ?></span> Finalizado por:</h3>
                        <?php } else { ?>

                          <h3 class="block-title text-center p-2 mb-1" style="background-color: #97e125; color:blue;">Finalizar a Solicitação de Pedido do Cliente <span style="font-weight: bolder; font-size: 1.2em"><?php echo addslashes($row['nome_cliente']); ?></span></h3>

                        <?php }?>  
                      </div>
                  
                    <div class="block-content" >
                      
                      <?php if($row['status'] == 'Finalizado'){ ?>
                      
                        <div class="row justify-content-center">
                          <div class="col-md-12">
                            <?php
                              require_once "../controllers/controllers_pedidos_dos_clientes.php";
                              $pedidos_dos_clientes = new controllers_pedidos_dos_clientes();
                              $idDescriptografado = base64_decode($_POST['view']); 
                              $update = $pedidos_dos_clientes->selecionar_pedidos_dos_clientes_id($idDescriptografado);

                              foreach($update as $row_update){
                            ?>
                            <input type="hidden" name="responsavel" value="<?= $row['nome']; ?>">
                            <input type="hidden" name="data_final" value="<?= date("d/m/Y") ?>" >

                            <div class="mb-1">
                              <p class="form-label text-center" style="font-size: 1.5em;"><?php echo addslashes($row['nome_responsavel']); ?> <span style="font-size: 0.7em; font-weight: 400;"><?php echo addslashes($row['data_final']); ?></span></p>
                            </div>  

                          </div>                                           
                              <?php } ?>
                        </div>
                      <?php } else { ?>

                        <!--Finalizado-->
                        <div class="row justify-content-center push">
                          <div class="col-md-12">
                            <?php
                              require_once "../controllers/controllers_pedidos_dos_clientes.php";
                              $pedidos_dos_clientes = new controllers_pedidos_dos_clientes();
                              $idDescriptografado = base64_decode($_POST['view']); 
                              $update = $pedidos_dos_clientes->selecionar_pedidos_dos_clientes_id($idDescriptografado);

                              foreach($update as $row_update){
                            ?>
                            <!-- <input type="hidden" name="responsavel" value="<= $row['nome']; ?>"> -->
                            <input type="hidden" name="data_final" value="<?= date("d/m/Y") ?>" >

                            <div class="mb-1">
                              <label class="form-label" for="codigo_produto" style="font-size: 0.9em;">Status</label> <span style="color: red;">*</span>
                              <div>
                                <select name="status" class="form-control">
                                  <option value="<?php echo addslashes($row_update['status']); ?>"><?php echo addslashes($row_update['status']); ?></option>
                                  <?php if($row_update['status'] == 'Finalizado') { ?>
                                    <option value="Em Andamento">Em Andamento</option>
                                  <?php } else { ?>
                                    <option value="Finalizado">Finalizado</option>
                                  <?php }?>
                                </select>
                              </div>
                            </div>  
                          
                            <div style="display: flex;">
                              <div class="mb-1" style="width: 80%;">
                                <label class="form-label" for="produto_servico" style="font-size: 0.9em;">Produto</label> 
                                <span style="color: red;">*</span>
                                <div>
                                  <input type="text" name="produto_servico[]" placeholder="Produto" class="form-control">
                                </div>
                              </div><!--Last Produto-->

                              <div class="mb-1 ms-2">
                                <label class="form-label" for="quantidade_produto_servico" style="font-size: 0.9em;">Quantidade</label> <span style="color: red;">*</span>
                                <div>
                                  <input type="text" id="quantity" name="quantidade_produto_servico[]" placeholder="Quantidade" maxlength="20" class="form-control">
                                </div>
                                <div id="result"></div>
                              </div><!--Last Quantidade-->

                              <div class="mb-1 ms-2" style="margin-top: 30px;">
                                <div>
                                  <button type="button" class="form-control" onclick="adicionarCampo()">+</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-4 mt-5">                          
                      <input type="hidden" name="id_atualizar" value="<?php $idDescriptografado = base64_decode($_POST['view']); $id_update = $idDescriptografado; echo $id_update; ?>">
                      <?php } ?>
                      <button type="submit" name="btn_validar_pedido" class="btn btn-alt-primary">
                        <i class="fa fa-fw fa-check opacity-50 me-1"></i> Validar Pedido
                      </button>
                    </div>
                  </div>
                </form>
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

      <!-- input AJAX -->
      <script src="ajax.googleapis.com_ajax_libs_jquery_3.5.1_jquery.min.js"></script>
      <script src="script.js"></script>
      <!-- last input AJAX -->

      <script src="adicionar_campos.js"></script>
      <?php require_once "../template/footer.php"; ?>
    </div>
    <!-- END Page Container -->
  </body>
</html>

<!-- <php require_once __DIR__ . "processar_gestao_validar.php"; ?> -->
<!-- <php if(isset($_GET['stock_baixo'])) { ?>

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

<php }?>   -->