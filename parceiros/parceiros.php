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
          <form action="parceiros.php" method="POST" enctype="multipart/form-data">
            <div class="block">
              <div class="block-header block-header-default">
                <a class="btn btn-alt-secondary" href="parceiros.php">
                  Cadastro de Parceiros
                </a>
                <a class="btn btn-alt-secondary" href="visualizar_parceiros.php">
                  <i class="fa fa-arrow-left me-1"></i> Visualizar Parceiros
                </a>
              </div>
              <div class="block-content" >
                <div class="row justify-content-center push">
                  <div class="col-md-4">
                    <div class="mb-1">
                      <label class="form-label" for="razaosocial" style="font-size: 0.9em;">Razão Social</label> <span style="color: red;">*</span>
                      <div  style="display: flex;">
                        <input type="text" class="form-control" id="razaosocial" name="razaosocial" placeholder="Razão Social" style="font-size: 0.9em;" required>
                      </div>
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="nomefantasia">Nome Fantasia Social <span style="color: red;">*</span> </label>
                      <input type="text" class="form-control" id="nomefantasia" name="nomefantasia" placeholder="Nome/Razão social" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="complemento">Complemento</label>
                      <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="cidade">Cidade </label>
                      <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="endreco">Endreço </label>
                      <input type="text" class="form-control" id="endreco" name="endreco" placeholder="Endreço" style="font-size: 0.9em;">
                    </div>                  
                  </div>

                  <div class="col-md-4">
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="email">Email </label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" style="font-size: 0.9em;">
                    </div>                    
                    <div class="mb-1">
                      <label class="form-label" style="font-size: 0.9em;" for="instagram">Instagram </label>
                      <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="facebook">Facebook </label>
                      <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook" style="font-size: 0.9em;">
                    </div> 
                    
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="codigointerno">Código Interno </label>
                      <input type="text" class="form-control" id="codigointerno" name="codigointerno" placeholder="Código Interno" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="bairro">Bairro </label>
                      <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" style="font-size: 0.9em;">
                    </div> 
                  </div>

                  <div class="col-md-4">
                    <div class="input-groupA" style="display: flex; width: 98%; align-items: center; justify-content: center;">
                      <div>
                        <label class="form-label" style="font-size: 0.9em;" for="cnpj">CNPJ </label>
                        <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ" style="font-size: 0.9em;">
                      </div>
                      
                      <div>
                        <label class="form-label"  style="font-size: 0.9em;" for="cep">CEP </label>
                        <input type="text" class="form-control ms-2" id="cep" name="cep" placeholder="CEP" style="font-size: 0.9em;">
                      </div>
                    </div>
                    
                    <div class="mb-1">
                    <label class="form-label"  style="font-size: 0.9em;" for="uf">UF </label>
                     <input type="text" class="form-control" id="uf" name="uf" placeholder="UF" tyle="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="ie">IE </label>
                      <input type="text" class="form-control" id="ie" name="ie" placeholder="IE" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="numero">Número </label>
                      <input type="text" class="form-control" id="numero" name="numero" placeholder="Número" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="telefone">Telefone</label>
                      <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" style="font-size: 0.9em;">
                    </div>                             
                  </div>
                </div>
                <div class="row justify-content-center pushA">
                  <div class="mb-4 col-md-12" style="display: flex; align-items: center; justify-content: center;">
                    <div>
                      <img class="img-avatar" style="width: 100px; height: 100px; cursor: pointer;" src="../assets/img/avatars/avatar10.jpg" alt="Avatar User" id="profileDisplay" onclick="triggerClick()">
                    </div>
                    <div>
                      <input class="form-control" required type="file" name="imagem" style="display: none;" id="profileImage" onchange="displayImage(this)" type="images/">
                      <img src="../assets/img/cameraa.png" alt="avatar" onclick="triggerClick()" width="35px" style="border-radius: 1000px; margin-left: -20px; cursor: pointer;">
                    </div>
                  </div>
                  <div class="block-content bg-body-light">
                    <div class="row justify-content-center push">
                      <div class="col-md-10">
                        <button type="submit" name="btn_cadastrar_parceiros" class="btn btn-alt-primary">
                          <i class="fa fa-fw fa-check opacity-50 me-1"></i> Cadastrar Parceiro
                        </button>
                      </div>
                    </div>
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
<!--Mascara no input-->
<script>
    $("#telefone").mask("(99) 99999-99999");
    $("#cpf").mask("999.999.999-99")
    $("#cep").mask("99999-999");
    // $("#cnpj").mask("99.999.999/9999-99")
    $("#nascimento").mask("99/99/9999")

</script>

<!--Preview Image-->
<script src="../assets/js/preview.js"></script>

<!--Reenvio de Formulário-->
<script src="../assets/js/evitar_reenvio_form.js"></script>


<?php require_once "cadastrar_parceiros.php"; ?>
