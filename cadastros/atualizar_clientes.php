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
          <form action="./processar_atualizacao_cliente.php" method="POST" enctype="multipart/form-data">
            <div class="block">
              <div class="block-header block-header-default">
                <a class="btn btn-alt-secondary" href="./visualizar_clientes.php">
                  <i class="fa fa-arrow-left me-1"></i> Voltar
                </a>
              </div>
              <div class="block-content" >
                <div class="row justify-content-center push">
                  <div class="col-md-6">
                    
                    <?php
                      require_once "../controllers/controllers_clientes.php";
                      $selecionar_clientes_id = new controllers_clientes();
                      $idCriptografado = base64_decode($_GET['atualizar_clientes']); 
                      
                      $id_update = $idCriptografado;
                      $update = $selecionar_clientes_id->selecionar_clientes_id($id_update);         
                      foreach($update as $row_update){
                    ?>
                    
                    <div class="mb-3">
                      <label class="form-label" for="cpfcnpj" style="font-size: 0.9em;">CPF/CNPJ</label> 
                      <span style="color: red;">*</span>
                      <div  style="display: flex;">
                        <input type="text" id="cnpj" value="<?php echo $row_update['cnpj']; ?>" placeholder="CPF/CNPJ" class="form-control" name="cnpj" pattern="\d{14}" title="Digite um CNPJ com 14 dígitos numéricos" required>
                        <button type="button" class="btn btn-alt-primary" style="width: 200px; margin-left: 0.5em;" onclick="buscarCNPJ()">Buscar</button>  
                      </div>                   
                    </div>
                    
                    <div class="mb-3 d-flex">
                      <span style="color: red;">*</span>
                      <input type="text" value="<?php echo $row_update['nome']; ?>" placeholder="Nome" class="form-control" id="nome" name="nome" readonly>
                      
                      <span class="ms-3" style="color: red;">*</span>
                      <input type="text" value="<?php echo $row_update['senha']; ?>" class="form-control" id="signup-username" name="password" required style="font-size: 0.9em;" placeholder="Senha" style="font-size: 0.9em;">
                    </div>

                    <div class="input-group mb-3">
                      <span style="color: red;">*</span>
                      <input type="email" value="<?php echo $row_update['email']; ?>" class="form-control" id="signup-username" name="email" required style="font-size: 0.9em;" placeholder="Login (e-mail)" style="font-size: 0.9em;">
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="atividade_principal">Atividade Principal:</label>
                      <input type="text" placeholder="Atividade Principal" value="<?php echo $row_update['atividade_principal']; ?>" class="form-control input-sm" id="atividade_principal" name="atividade_principal" readonly>
                    </div>

                    <div class="mb-3">
                      <label for="endereco">Endereço:</label>
                      <input type="text" value="<?php echo $row_update['endereco']; ?>" placeholder="Endereço" class="form-control input-sm" id="endereco" name="endereco" readonly>
                    </div> 
                    
                    <?php } ?>
                  </div>

                  <div class="col-md-6">
                    <?php
                      require_once "../controllers/controllers_clientes.php";
                      $selecionar_clientes_id = new controllers_clientes();
                      $idCriptografado = base64_decode($_GET['atualizar_clientes']); 
                      
                      $id_update = $idCriptografado;
                      $update = $selecionar_clientes_id->selecionar_clientes_id($id_update);
                      foreach($update as $row_update){
                    ?>
                    <div style="display: flex;">
                      <div class="mb-3" style="width: 50%;">
                        <label for="situcao" class="form-label">Data de Abertura</label>
                        <input type="text" value="<?php echo $row_update['abertura']; ?>" placeholder="Data de Abertura" class="form-control input-sm" id="abertura" name="abertura" readonly>
                      </div>

                      <div class="mb-3" style="width: 50%; margin-right: 20px;">
                        <label for="situcao" class="form-label ms-3">Porte</label>
                        <input type="text" value="<?php echo $row_update['porte']; ?>" placeholder="Porte" class="form-control input-sm ms-3" id="porte" name="porte" readonly>
                      </div>
                    </div> 

                    <div style="display: flex;">
                      <div class="mb-3" style="width: 50%;">
                        <label for="situcao" class="form-label">Situação</label>
                        <input type="text" value="<?php echo $row_update['situacao']; ?>" placeholder="Situação" class="form-control input-sm" id="situacao" name="situacao" readonly>
                      </div>

                      <div class="mb-3" style="width: 50%; margin-right: 20px;">
                        <label for="tipo" class="form-label ms-3">Tipo</label>
                        <input type="text" value="<?php echo $row_update['tipo']; ?>" placeholder="Tipo" class="form-control input-sm ms-3" id="tipo" name="tipo" readonly>
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="fantasia" class="form-label">Nome Fantasia:</label>
                      <input type="text" value="<?php echo $row_update['fantasia']; ?>" placeholder="Nome Fantasia" class="form-control input-sm" id="fantasia" name="fantasia" readonly>
                    </div>

                    <div class="mb-3 mt-4">
                      <label for="natureza_juridica">Natureza Jurídica:</label>
                      <input type="text" value="<?php echo $row_update['natureza_juridica']; ?>" placeholder="Natureza Jurídica" class="form-control input-sm" id="natureza_juridica" name="natureza_juridica" readonly>
                    </div>

                    <input type="hidden" name="nivel" value="user">

                    <input type="hidden" name="id_atualizar" value="<?php  $idCriptografado = base64_decode($_GET['atualizar_clientes']); $id_update = $idCriptografado; echo $id_update; ?>">
                    <?php } ?>                 
                  </div>
                </div>
              </div>
              <div class="block-content bg-body-light">
                <div class="row justify-content-center push">
                  <div class="col-md-10">
                    <button type="submit" name="btn_cadastrar_clientes" class="btn btn-alt-primary">
                      <i class="fa fa-fw fa-check opacity-50 me-1"></i> Atualizar Cliente
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
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
  </body>
</html>


<?php
  
  if(isset($_GET['nao-atualizado']))
  { ?>

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
    title: 'Não atualizado!'
    })
  </script>

<?php } ?>