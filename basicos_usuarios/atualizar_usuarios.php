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
          <form action="processar_atualizacao_usuarios.php" method="POST" enctype="multipart/form-data">
            <div class="block">
              <div class="block-header block-header-default">
                <a class="btn btn-alt-secondary" href="usuarios.php">
                  Cadastro de Usuários
                </a>
                <a class="btn btn-alt-secondary" href="visualizar_usuarios.php">
                  <i class="fa fa-arrow-left me-1"></i> Visualizar Usuários
                </a>
              </div>
              <div class="block-content" >
                <div class="row justify-content-center push">
                  <div class="col-md-6">
                  <?php
                    require_once "../controllers/controllers_basicos_usuarios.php";
                    $selecionar_basicos_usuarios_id = new controllers_basicos_usuarios();
                    $idDescriptografado = base64_decode($_GET['atualizar_usuarios']); 
                    
                    $id_update = $idDescriptografado;
                    $update = $selecionar_basicos_usuarios_id->selecionar_basicos_usuarios_id($id_update);                   
                    foreach($update as $row_update){
                  ?>
                    <div style="display: flex;">
                      <div class="mb-1" style="width: 60%">
                        <label class="form-label" for="nome_ususario" style="font-size: 0.9em;">Nome do Usuário</label> <span style="color: red;">*</span>
                        <div style="display: flex;">
                          <input type="text" class="form-control" id="nome_ususario" name="nome_ususario" value="<?php echo
                          $row_update['nome_ususario']; ?>" style="font-size: 0.9em;" required>
                        </div>
                      </div>
                      <div class="mb-1 ms-3">
                        <label class="form-label" for="libera_xml_pedido" style="font-size: 0.9em;">Senha</label>
                        <div style="display: flex;">
                          <input type="text" class="form-control" id="libera_xml_pedido" name="libera_xml_pedido" value="<?php echo
                          $row_update['libera_xml_pedido']; ?>" style="font-size: 0.9em;">
                        </div>
                      </div> 
                    </div> 
                    <div class="mb-1">
                      <label class="form-label" for="telefone_usuario" style="font-size: 0.9em;">Telefone Usuário</label> 
                      <div>
                        <input type="text" class="form-control" id="telefone_usuario" name="telefone_usuario" value="<?php echo
                         $row_update['telefone_usuario']; ?>" style="font-size: 0.9em;">
                      </div>
                    </div>

                    <div class="mb-1">
                      <label class="form-label" for="email_login" style="font-size: 0.9em;">E-Mail (Login)</label> 
                      <div>
                        <input type="email" class="form-control" id="email_login" name="email_login" value="<?php echo
                         $row_update['email_login']; ?>" style="font-size: 0.9em;">
                      </div>
                    </div>

                    <div style="display: flex; align-items: center; justify-content: space-between;">

                      <div class="mb-1">                      
                        <input type="checkbox" name="libera_xml_pedido" id="libera_xml_pedido">
                        <label class="form-label"  style="font-size: 0.9em;" for="libera_xml_pedido">Libera XML Pedido </label>
                      </div>

                      <div class="mb-1">                      
                        <input type="checkbox" name="libera_painel_producao" id="libera_painel_producao">
                        <label class="form-label"  style="font-size: 0.9em;" for="libera_painel_producao">Libera Painel Produção </label>
                      </div> 
                    </div>
                     
                  </div>
                  
                  <div class="col-md-6">

                    <div style="display: flex; align-items: center; justify-content: space-between;">
                      <div class="mb-1">
                        <label class="form-label"  style="font-size: 0.9em;" for="desconto_maximo">Desconto Máximo (%) </label>
                        <input type="text" class="form-control" id="desconto_maximo" name="desconto_maximo" value="<?php echo
                         $row_update['desconto_maximo']; ?>" style="font-size: 0.9em;">
                      </div>

                      <div class="mb-1">
                        <label class="form-label" style="font-size: 0.9em;" for="grupo_de_usuarios">Grupo de Usuários </label>
                        <select name="grupo_de_usuarios" class="form-control" id="grupo_de_usuarios">
                          <option value="<?php echo $row_update['grupo_de_usuarios']; ?>"><?php echo $row_update['grupo_de_usuarios']; ?></option>
                          <option value="Administradores da Empresa">Administradores da Empresa</option>
                          <option value="Administradores da Empresa1">Administradores da Empresa1</option>
                          <option value="Administradores da Empresa2">Administradores da Empresa2</option>
                          <option value="Administradores da Empresa3">Administradores da Empresa3</option>
                        </select>
                      </div>

                    </div>

                    <div class="mb-3" style="display: flex; align-items: center; justify-content: space-between;">

                      <div class="mb-1 col-md-12">
                        <label class="form-label" style="font-size: 0.8em;" for="observacao">Observação</label>
                        <textarea name="observacao" id="observacao" class="form-control" cols="10" rows="4" style="font-size: 0.9em;"><?php echo $row_update['observacao']; ?></textarea>
                      </div>

                    </div>

                    <div class="col-md-12" style="display: flex; align-items: center; justify-content: space-between;">
                      <div class="mb-1">
                        <label class="form-label" style="font-size: 0.8em;" for="ultima_alteracao">Última Alteração</label>
                        <input type="date" class="form-control" id="ultima_alteracao" name="ultima_alteracao" value="<?php echo$row_update['ultima_alteracao']; ?>" style="font-size: 0.8em;">
                      </div>
                    
                      <div class="mb-1">                      
                        <input type="checkbox" checked name="ativo" id="ativo">
                        <label class="form-label" style="font-size: 0.9em;" for="ativo">Ativo </label>
                      </div>
                    </div>

                    <input type="hidden" name="id_atualizar" value="<?php $idDescriptografado = base64_decode($_GET['atualizar_usuarios']); $id_update = $idDescriptografado; echo $id_update; ?>">
                  <?php }?>
                  </div>
                </div>
                <div class="row justify-content-center push">

                  <div class="mb-4 col-md-6" style="display: flex; align-items: center; justify-content: center;">
                    <div class="block-content Abg-body-light">
                      <div class="row justify-content-center push">
                        <div class="col-md-12">
                          <button type="submit" name="btn_atualizar_basicos_usuarios" class="btn btn-alt-primary">
                            <i class="fa fa-fw fa-check opacity-50 me-1"></i> Atualizar Usuários
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