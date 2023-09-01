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
                <div class="content content-full content-boxed">
          
                <form action="processar_gestao_validar.php" method="POST" enctype="multipart/form-data">
                  <div class="blockA">
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

                          <h3 class="block-title mt-3 text-center p-2 mb-1" style="background-color: #97e125; color:blue;">Finalizar a Solicitação de Pedido do Cliente <span style="font-weight: bolder; font-size: 1.2em"><?php echo addslashes($row['nome_cliente']); ?></span></h3>

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
                            <input type="hidden" name="responsavel" value="<?= $row['nome']; ?>">
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
                                <label class="form-label" for="produto_servico" style="font-size: 0.9em;">Produto</label> <span style="color: red;">*</span>
                                <div>
                                  <select name="produto_servico" class="form-control">
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
                                      //Travessas
                                      $result_travessas = $conn->prepare("SELECT descricao FROM travessas ORDER BY id DESC");
                                      $result_travessas->execute();
                                      $row_travessa = $result_travessas->fetchAll(PDO::FETCH_ASSOC);
                                      //Last Travessas

                                      //Puxadores
                                      $result_puxadores = $conn->prepare("SELECT descricao FROM puxadores ORDER BY id DESC");
                                      $result_puxadores->execute();
                                      $row_puxador = $result_puxadores->fetchAll(PDO::FETCH_ASSOC);
                                      //Last Puxadores

                                    ?>                          
                                    <option value="">Selecione o tipo de Produto/Serviço</option> 

                                    <!--Travessas--> 
                                    <?php foreach($row_travessa as $row_travessas){ ?>                  
                                      <option value="<?php echo addslashes($row_travessas['descricao']); ?>"><?php echo addslashes($row_travessas['descricao']); ?></option>                
                                    <?php }?>
                                    <!--Last Travessas-->

                                    <!--Puxadores--> 
                                    <?php foreach($row_puxador as $row_puxadores){ ?>                  
                                      <option value="<?php echo addslashes($row_puxadores['descricao']); ?>"><?php echo addslashes($row_puxadores['descricao']); ?></option>                
                                    <?php }?>
                                    <!--Last Puxadores-->
                                  </select>
                                </div>
                              </div><!--Last Produto-->

                              <div class="mb-1 ms-2">
                                <label class="form-label" for="quantidade_produto_servico" style="font-size: 0.9em;">Quantidade</label> <span style="color: red;">*</span>
                                <div>
                                  <input type="text" name="quantidade_produto_servico" placeholder="Quantidade" class="form-control">
                                </div>
                              </div><!--Last Quantidade-->
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
                        </div>

                      <?php } ?>
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