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
          <form action="processar_atualizacao_parceiro.php" method="POST" enctype="multipart/form-data">
            <div class="block">
              <div class="block-header block-header-default">
                <a class="btn btn-alt-secondary" href="./visualizar_parceiros.php">
                  <i class="fa fa-arrow-left me-1"></i> Visualizar Parceiros
                </a>
              </div>
              <div class="block-content" >
                <div class="row justify-content-center push">
                  <div class="col-md-4">
                  <?php
                      require_once "../controllers/controllers_parceiros.php";
                      $selecionar_parceiros_id = new controllers_parceiros();
                      $idDescriptografado = base64_decode($_GET['atualizar_parceiros']); 
                      
                      $id_update = $idDescriptografado;
                      $update = $selecionar_parceiros_id->selecionar_parceiros_id($id_update);                   
                      foreach($update as $row_update){
                    ?>
                    <div class="mb-1">
                      <label class="form-label" for="razaosocial" style="font-size: 0.9em;">Razão Social</label> <span style="color: red;">*</span>
                      <div  style="display: flex;">
                        <input type="text" class="form-control" id="razaosocial" name="razaosocial" value="<?php echo $row_update['razaosocial']; ?>" style="font-size: 0.9em;" required>
                      </div>
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="nomefantasia">Nome Fantasia Social <span style="color: red;">*</span> </label>
                      <input type="text" class="form-control" id="nomefantasia" name="nomefantasia" value="<?php echo $row_update['nomefantasia']; ?>" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="complemento">Complemento</label>
                      <input type="text" class="form-control" id="complemento" name="complemento" value="<?php echo $row_update['complemento']; ?>" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="cidade">Cidade </label>
                      <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $row_update['cidade']; ?>" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="endreco">Endreço </label>
                      <input type="text" class="form-control" id="endreco" name="endreco" value="<?php echo $row_update['endreco']; ?>" style="font-size: 0.9em;">
                    </div>   
                    <?php }?>               
                  </div>

                  <div class="col-md-4">
                    <?php
                      require_once "../controllers/controllers_parceiros.php";
                      $selecionar_parceiros_id = new controllers_parceiros();
                      $idDescriptografado = base64_decode($_GET['atualizar_parceiros']); 
                      
                      $id_update = $idDescriptografado;
                      $update = $selecionar_parceiros_id->selecionar_parceiros_id($id_update);                   
                      foreach($update as $row_update){
                    ?>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="email">Email </label>
                      <input type="email" class="form-control" id="email" name="email" value="<?php echo $row_update['email']; ?>" style="font-size: 0.9em;">
                    </div>                    
                    <div class="mb-1">
                      <label class="form-label" style="font-size: 0.9em;" for="instagram">Instagram </label>
                      <input type="text" class="form-control" id="instagram" name="instagram" value="<?php echo $row_update['instagram']; ?>" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="facebook">Facebook </label>
                      <input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo $row_update['facebook']; ?>" style="font-size: 0.9em;">
                    </div> 
                    
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="codigointerno">Código Interno </label>
                      <input type="text" class="form-control" id="codigointerno" name="codigointerno" value="<?php echo $row_update['codigointerno']; ?>" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="bairro">Bairro </label>
                      <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $row_update['bairro']; ?>" style="font-size: 0.9em;">
                    </div> 
                    <?php } ?>
                  </div>

                  <div class="col-md-4">
                    <?php
                      require_once "../controllers/controllers_parceiros.php";
                      $selecionar_parceiros_id = new controllers_parceiros();
                      $idDescriptografado = base64_decode($_GET['atualizar_parceiros']); 
                      
                      $id_update = $idDescriptografado;
                      $update = $selecionar_parceiros_id->selecionar_parceiros_id($id_update);                   
                      foreach($update as $row_update){
                    ?>
                    <div class="input-groupA" style="display: flex; width: 98%; align-items: center; justify-content: center;">
                      <div>
                        <label class="form-label" style="font-size: 0.9em;" for="cnpj">CNPJ </label>
                        <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?php echo $row_update['cnpj']; ?>" style="font-size: 0.9em;">
                      </div>
                      
                      <div>
                        <label class="form-label"  style="font-size: 0.9em;" for="cep">CEP </label>
                        <input type="text" class="form-control ms-2" id="cep" name="cep" value="<?php echo $row_update['cep']; ?>" style="font-size: 0.9em;">
                      </div>
                    </div>
                    
                    <div class="mb-1">
                    <label class="form-label"  style="font-size: 0.9em;" for="uf">UF </label>
                     <input type="text" class="form-control" id="uf" name="uf" value="<?php echo $row_update['uf']; ?>" tyle="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="ie">IE </label>
                      <input type="text" class="form-control" id="ie" name="ie" value="<?php echo $row_update['ie']; ?>" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="numero">Número </label>
                      <input type="text" class="form-control" id="numero" name="numero" value="<?php echo $row_update['numero']; ?>" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="telefone">Telefone</label>
                      <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $row_update['telefone']; ?>" style="font-size: 0.9em;">
                    </div>
                    <input type="hidden" name="id_atualizar" value="<?php $idDescriptografado = base64_decode($_GET['atualizar_parceiros']); $id_update = $idDescriptografado; echo $id_update; ?>">
                    <?php }?>                             
                  </div>
                </div>
              </div>
              <div class="block-content bg-body-light">
                <div class="row justify-content-center push">
                  <div class="col-md-10">
                    <button type="submit" name="btn_atualizar_parceiros" class="btn btn-alt-primary">
                      <i class="fa fa-fw fa-check opacity-50 me-1"></i> Atualizar Parceiro
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <div class="block-content bg-body-light">
            <style>
              /* .upload 
              {
                  position: relative;
                  width: 100px;
                  margin: auto;
              } */
              /* .upload .round 
              {
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  position: absolute;
                  bottom: 0;
                  top: 45px;
                  right: -15px;
                  background-color: #6236ff;
                  width: 30px;
                  height: 30px;
                  border-radius: 50%;
                  text-align: center;
                  margin: auto;
                  overflow: hidden;
              } */
              .round 
              {                      
                  cursor: pointer;
                  margin-left: -20px;
              }
              /* .round  input[type='file']
              {
                  position: absolute;
                  transform: scale(2);
                  opacity: 0; 
              } */
            </style>
            <form action="processar_atualizacao_imagem.php" enctype="multipart/form-data" method="post" class="uploadA">
              <div class="row justify-content-center push">
                <div class="mb-4 col-md-12" style="display: flex; align-items: center; justify-content: center;">
                  <?php
                    require_once "../controllers/controllers_parceiros.php";
                    $selecionar_parceiros_id = new controllers_parceiros();
                    $idDescriptografado = base64_decode($_GET['atualizar_parceiros']); 
                    
                    $id_update = $idDescriptografado;
                    $update = $selecionar_parceiros_id->selecionar_parceiros_id($id_update);                   
                    foreach($update as $row_update){
                  ?>
                  <div>
                    <?php if($row_update['imagem'] == ""){ ?>
                        <img style="width: 150px; height: 150px; border-radius: 150px; border: 1px solid black; display: block; margin: auto;" src="../assets/img/avatars/avatar10.jpg" alt="Avatar">
                      <?php  } else { ?>
                        <img style="width: 150px; height: 150px; border-radius: 150px; border: 1px solid black; display: block; margin: auto;" id="profileDisplay" onclick="triggerClick()" src="<?php echo $row_update['imagem']; ?>" alt="">
                      <?php }?>
                  </div>
                  <input type="hidden" name="id_atualizar" value="<?php $idDescriptografado = base64_decode($_GET['atualizar_parceiros']); $id_update = $idDescriptografado; echo $id_update; ?>">
                  <?php }?>
                  <div class="round">
                    <input class="form-control" type="file" id="profileImage" name="imagem" style="display: none;" onchange="displayImage(this)" type="images/">
                    <img src="../assets/img/cameraa.png" alt="avatar" onclick="triggerClick()" width="40px" style="border-radius: 1000px;">
                  </div>
                  <div class="row justify-content-center push">
                    <div class="col-md-12">
                      <button type="submit" name="btn_atualizar_imagem" class="btn btn-alt-primary">
                        <i class="fa fa-fw fa-check opacity-50 me-1"></i> Atualizar Imagem
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              
            </form>
          </div>
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
<!--Mascara no input-->
<script>
    $("#telefone").mask("(99) 99999-99999");
    $("#cpf").mask("999.999.999-99")
    $("#cep").mask("99999-999");
    // $("#cnpj").mask("99.999.999/9999-99")
    $("#nascimento").mask("99/99/9999")

  </script>

  <!--Preview Image-->
  <script src="../assets//js/preview.js"></script>