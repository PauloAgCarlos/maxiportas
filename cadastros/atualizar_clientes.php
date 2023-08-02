<?php 

    session_start();
    require_once "../conexao-bd.php";
    if(!isset($_SESSION['email'])){
        header('location: ../login.php');
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="../assets/css/dashmix.min.css">

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
                      // if((!isset($_GET['atualizar_clientes'])) AND ($_GET['atualizar_clientes'] != $idCriptografado))
                      // {                        
                      foreach($update as $row_update){
                    ?>
                    
                    <div class="mb-1">
                      <label class="form-label" for="cpfcnpj" style="font-size: 0.9em;">CPF/CNPJ</label> <span style="color: red;">*</span>
                      <div  style="display: flex;">
                        <input type="text" class="form-control" id="cpfcnpj" name="cpfcnpj" value="<?php echo $row_update['cpf_cnpj']; ?>" style="font-size: 0.9em;" required>
                      </div>
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="nomerazaosocial">Nome/Razão Social <span style="color: red;">*</span> </label>
                      <input type="text" class="form-control" id="nomerazaosocial" name="nomerazaosocial" value="<?php echo $row_update['nome_razao_socil']; ?>" style="font-size: 0.9em;" required>
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="contato">Contato</label>
                      <input type="text" class="form-control" id="contato" name="contato" value="<?php echo $row_update['contato']; ?>" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="telefone">Telefone </label>
                      <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $row_update['telefone']; ?>" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="celular">Celular </label>
                      <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $row_update['celular']; ?>" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="email">Email </label>
                      <input type="email" class="form-control" id="email" name="email" value="<?php echo $row_update['email']; ?>" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="senha">Senha </label>
                      <input type="text" class="form-control" id="senha" name="senha" value="<?php echo $row_update['senha']; ?>" style="font-size: 0.9em;">
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
                    <div class="mb-1">
                      <label class="form-label" for="cep" style="font-size: 0.9em;">CEP</label>
                      <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $row_update['cep']; ?>" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="rua">Rua </label>
                      <input type="text" class="form-control" id="rua" name="rua" value="<?php echo $row_update['rua']; ?>" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="numero">Número</label>
                      <input type="text" class="form-control" id="numero" name="numero" value="<?php echo $row_update['numero']; ?>" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="complemento">Complemento </label>
                      <input type="text" class="form-control" id="complemento" name="complemento" value="<?php echo $row_update['complemento']; ?>" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="bairro">Bairro </label>
                      <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $row_update['bairro']; ?>" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="cidade">Cidade </label>
                      <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $row_update['cidade']; ?>" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="estado">Estado </label>
                      <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $row_update['estado']; ?>" style="font-size: 0.9em;">
                    </div>  
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