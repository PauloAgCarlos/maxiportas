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
    <meta property="og:site_name" content="HH Alumínio">
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
        <div class="content content-full content-boxed">
          <!-- New Post -->
          <form action="processar_atualizacao_classificacao_de_clientes.php" method="POST" enctype="multipart/form-data">
            <div class="block">
              <div class="block-header block-header-default">
                <a class="btn btn-alt-secondary">
                  Atualizar Classificação de Cliente
                </a>
                <a class="btn btn-alt-secondary" href="classificacao_de_clientes.php">
                  Cadastrar Classificação de Cliente
                </a>
              </div>
              <div class="block-content" >
                <div class="row justify-content-center push">
                  <div class="col-md-12">
                  <?php
                    require_once "../controllers/controllers_classificacao_de_clientes.php";
                    $selecionar_classificacao_de_clientes_id = new controllers_classificacao_de_clientes();
                    $idDescriptografado = base64_decode($_GET['atualizar_agregar']); 
                    
                    $id_update = $idDescriptografado;
                    $update = $selecionar_classificacao_de_clientes_id->selecionar_classificacao_de_clientes_id($id_update);                   
                    foreach($update as $row_update){
                  ?>
                    <div class="mb-1">
                      <label class="form-label" for="descricao" style="font-size: 0.8em;">Descrição</label> <span style="color: red;">*</span>
                      <div style="display: flex;">
                        <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo addslashes($row_update['descricao']); ?>" style="font-size: 0.8em;" required>
                      </div>
                    </div>  

                    <div class="mb-1">
                      <label class="form-label" for="codigo_produto" style="font-size: 0.9em;">Código Produto</label> <span style="color: red;">*</span>
                      <div>
                        <input type="text" class="form-control" id="codigo_produto" name="codigo_produto" maxlength="20" minlength="2" value="<?php $codigo = substr($row_update['codigo_produto'], 12); echo addslashes($codigo); ?>" style="font-size: 0.9em;" required>
                      </div>
                    </div>
              
                    <div style="display: flex; align-items: center; justify-content: space-between;">  

                      <div style="display: flex; align-items: center; justify-content: space-between;">
                        <input type="hidden" name="id_atualizar" value="<?php $idDescriptografado = base64_decode($_GET['atualizar_agregar']); $id_update = $idDescriptografado; echo $id_update; ?>">
                      </div>
                      <?php } ?>
                    </div>

                  </div>
                </div>
                <div style="display: flex; align-items: center; justify-content: center;">

                  <div class="mb-4 push" style="display: flex; align-items: center; justify-content: center;">
                    <div class="block-content bg-body-light push pb-4">
                      <div>
                        <div class="col-md-12">
                          <button type="submit" name="btn_atualizar_classificacao_de_clientes" class="btn btn-alt-primary">
                            <i class="fa fa-fw fa-check opacity-50 me-1"></i> Atualizar Classificação de Cliente
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
  <script src="../assets//js/preview.js"></script>

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