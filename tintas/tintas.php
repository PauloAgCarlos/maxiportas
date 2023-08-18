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

    <title>HJ Alumínio</title>

    <meta name="description" content="HJ Alumínio">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="HJ Alumínio">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="HJ Alumínio">
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
          <form action="tintas.php" method="POST" enctype="multipart/form-data">
            <div class="block">
              <div class="block-header block-header-default">
                <a class="btn btn-alt-secondary" href="tintas.php">
                  Cadastro de Tintas
                </a>
                <a class="btn btn-alt-secondary" href="visualizar_tintas.php">
                  <i class="fa fa-arrow-left me-1"></i> Visualizar Tintas
                </a>
              </div>
              <div class="block-content" >
                <div class="row justify-content-center push">
                  <div class="col-md-6">
                    <div class="mb-1">
                      <label class="form-label" for="descricao" style="font-size: 0.9em;">Decrição</label> <span style="color: red;">*</span>
                      <div style="display: flex;">
                        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Decrição" style="font-size: 0.9em;" required>
                      </div>
                    </div>  
                    <div class="mb-1">
                      <label class="form-label" for="codigo_produto" style="font-size: 0.9em;">Código Produto</label> <span style="color: red;">*</span>
                      <div>
                        <input type="text" class="form-control" id="codigo_produto" name="codigo_produto" maxlength="20" minlength="2" placeholder="Código Produto" style="font-size: 0.9em;" required>
                      </div>
                    </div>

                  </div>
                  
                  <div class="col-md-6">

                    <div style="display: flex; align-items: center; justify-content: space-between;">
                     
                      <div class="mb-1">
                        <label class="form-label"  style="font-size: 0.9em;" for="custo">Custo (R$ / grama) <span style="color: red;">*</span> </label>
                        <input type="text" class="form-control" id="custo" name="custo" placeholder="0,00" style="font-size: 0.9em;">
                      </div>

                      <div class="mb-1">
                        <label class="form-label" for="codigo_da_fabrica" style="font-size: 0.9em;">Código da Fabrica</label> <span style="color: red;">*</span>
                      <div>
                        <input type="text" class="form-control" id="codigo_da_fabrica" name="codigo_da_fabrica" maxlength="6" minlength="2" placeholder="Código Produto" style="font-size: 0.9em;" required>
                      </div>
                    </div>

                      <div class="mb-1">
                        <label class="form-label"  style="font-size: 0.9em;" for="unidade">Unidade </label>
                        <select name="unidade" class="form-control" id="unidade">
                          <option value="Grama">Grama</option>
                          <option value="Grama1">Grama1</option>
                          <option value="Grama2">Grama2</option>
                          <option value="Grama3">Grama3</option>
                        </select>
                      </div>
                      
                    </div>
                    <div class="mb-3" style="display: flex; align-items: center; justify-content: space-around;">
                    
                      <div class="mb-1">
                        <label class="form-label" style="font-size: 0.8em;" for="ultima_alteracao">Última Alteração <span style="color: red;">*</span> </label>
                        <input type="date" class="form-control" id="ultima_alteracao" name="ultima_alteracao"  style="font-size: 0.8em;">
                      </div>

                      <div class="mb-1 mt-4">                      
                        <input type="checkbox" checked name="ativo" id="ativo">
                        <label class="form-label" style="font-size: 0.9em;" for="ativo">Ativo </label>
                      </div>

                    </div>

                  </div>
                </div>
                <div class="row justify-content-center push">

                  <div class="mb-4 col-md-6" style="display: flex; align-items: center; justify-content: center;">
                    <div class="block-content bg-body-light">
                      <div class="row justify-content-center push">
                        <div class="col-md-12">
                          <button type="submit" name="btn_cadastrar_tintas" class="btn btn-alt-primary">
                            <i class="fa fa-fw fa-check opacity-50 me-1"></i> Cadastrar Tintas
                          </button>
                        </div>
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

<!--Evitar Reenvio de Form-->
<script src="../assets/js/evitar_reenvio_form.js"></script>

<?php include_once "cadastrar_tintas.php"; ?>