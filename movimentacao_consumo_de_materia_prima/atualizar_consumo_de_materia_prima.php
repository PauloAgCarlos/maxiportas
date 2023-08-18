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
          <form action="processar_atualizacao_consumo_de_materia_prima.php" method="POST" enctype="multipart/form-data">
            <div class="block">
              <div class="block-header block-header-default">
                <a class="btn btn-alt-secondary" href="consumo_de_materia_prima.php">
                  Cadastro de Consumo de Materia Prima
                </a>
                <a class="btn btn-alt-secondary" href="visualizar_consumo_de_materia_prima.php">
                  <i class="fa fa-arrow-left me-1"></i> Visualizar Consumo de Materia Prima
                </a>
              </div>
              <div class="block-content" >
                <div class="row justify-content-center push">
                  <div class="col-md-6">
                  <?php
                    require_once "../controllers/controllers_movimentacao_consumo_de_materia_prima.php";
                    $selecionar_movimentacao_consumo_de_materia_prima_id = new controllers_movimentacao_consumo_de_materia_prima();
                    $idDescriptografado = base64_decode($_GET['atualizar_movimentacao_consumo_de_materia_prima']); 
                    
                    $id_update = $idDescriptografado;
                    $update = $selecionar_movimentacao_consumo_de_materia_prima_id->selecionar_movimentacao_consumo_de_materia_prima_id($id_update);                   
                    foreach($update as $row_update){
                  ?>
                    <div class="mb-1">
                      <label class="form-label" for="descricao" style="font-size: 0.9em;">Decrição do Produto</label> <span style="color: red;">*</span>
                      <div style="display: flex;">
                        <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $row_update['descricao']; ?>" style="font-size: 0.9em;" required>
                      </div>
                    </div>  

                    <div style="display: flex; align-items: center; justify-content: space-between;">
                      <div class="mb-1" style="width:80%;">
                        <label class="form-label" for="codigo_produto" style="font-size: 0.9em;">Código Produto</label> <span style="color: red;">*</span>
                        <div>
                          <input type="text" class="form-control" id="codigo_produto" name="codigo_produto" maxlength="20" minlength="2" value="<?php $codigo = substr($row_update['codigo_produto'], 13); echo addslashes($codigo); ?>" style="font-size: 0.9em;" required>
                        </div>
                      </div>

                      <div class="mb-1 ms-2">
                        <label class="form-label" for="codigo_da_fabrica" style="font-size: 0.9em;">Código da Fábrica</label> <span style="color: red;">*</span>
                        <div>
                          <input type="text" class="form-control" id="codigo_da_fabrica" name="codigo_da_fabrica" value="<?php echo $row_update['codigo_da_fabrica']; ?>" style="font-size: 0.9em;" required>
                        </div>
                      </div>
                    </div>
                    
                    <div class="mb-3" style="display: flex; align-items: center; justify-content: space-between;">
                      <div class="mb-1">
                        <label class="form-label" style="font-size: 0.9em;" for="tipo">Tipo </label>
                        <select name="tipo" class="form-control" id="tipo">
                          <option value="<?php echo $row_update['tipo']; ?>"><?php echo $row_update['tipo']; ?></option>
                          <option value="Tipo ">Tipo </option>
                          <option value="Tipo 1">Tipo 1</option>
                          <option value="Tipo 2">Tipo 2</option>
                          <option value="Tipo 3">Tipo 3</option>
                        </select>
                      </div>

                      <div class="mb-1">
                        <label class="form-label" style="font-size: 0.9em;" for="unidade">Unidade </label>
                        <select name="unidade" class="form-control" id="unidade">
                          <option value="<?php echo $row_update['unidade']; ?>"><?php echo $row_update['unidade']; ?></option>
                          <option value="Unidade ">Unidade </option>
                          <option value="Unidade 1">Unidade 1</option>
                          <option value="Unidade 2">Unidade 2</option>
                          <option value="Unidade 3">Unidade 3</option>
                        </select>
                      </div>

                      <div class="mb-1">
                        <label class="form-label"  style="font-size: 0.9em;" for="op">OP <span style="color: red;">*</span> </label>
                        <input type="text" class="form-control" id="op" name="op" value="<?php echo $row_update['op']; ?>" style="font-size: 0.9em;">
                      </div>
                    </div>                    
                  </div>
                  
                  <div class="col-md-6">

                    <div style="display: flex; align-items: center; justify-content: space-between;">
                      <div class="mb-1">
                        <label class="form-label"  style="font-size: 0.9em;" for="consumo">Consumo <span style="color: red;">*</span> </label>
                        <input type="text" class="form-control" id="consumo" name="consumo" value="<?php echo $row_update['consumo']; ?>" style="font-size: 0.9em;">
                      </div>
                      <div class="mb-1">
                        <label class="form-label"  style="font-size: 0.9em;" for="perda">Perda <span style="color: red;">*</span> </label>
                        <input type="text" class="form-control ms-2" id="perda" name="perda" value="<?php echo $row_update['perda']; ?>" style="font-size: 0.9em;">
                      </div>
                      <div class="mb-1">
                        <label class="form-label"  style="font-size: 0.9em;" for="total">Total <span style="color: red;">*</span> </label>
                        <input type="text" class="form-control ms-3" id="total" name="total" value="<?php echo $row_update['total']; ?>" style="font-size: 0.9em;">
                      </div>
                      
                    </div>

                    <div style="display: flex; align-items: center; justify-content: space-between;">
                     
                      <div class="mb-1 ms-2">
                        <label class="form-label"  style="font-size: 0.8em;" for="custo_total">Custo Total </label>
                        <input type="text" class="form-control" id="custo_total" name="custo_total" value="<?php echo $row_update['custo_total']; ?>" style="font-size: 0.9em;">
                      </div>

                      <div class="mb-1">
                        <label class="form-label" style="font-size: 0.8em;" for="data_pedido">Data Pedido <span style="color: red;">*</span> </label>
                        <input type="date" class="form-control" id="data_pedido" name="data_pedido" value="<?php echo $row_update['data_pedido']; ?>" style="font-size: 0.8em;">
                      </div>

                      <div class="mb-1">
                        <label class="form-label" style="font-size: 0.8em;" for="entrou_em_producao">Entrou em Produção <span style="color: red;">*</span> </label>
                        <input type="date" class="form-control" id="entrou_em_producao" name="entrou_em_producao" value="<?php echo $row_update['entrou_em_producao']; ?>" style="font-size: 0.8em;">
                      </div>
                    </div>

                    <div class="col-md-12" style="display: flex; align-items: center; justify-content: space-around;">

                      <div class="mb-1">
                        <label class="form-label" style="font-size: 0.8em;" for="produzido">Produzido <span style="color: red;">*</span> </label>
                        <input type="date" class="form-control" id="produzido" name="produzido" value="<?php echo $row_update['produzido']; ?>" style="font-size: 0.8em;">
                      </div>
                    
                      <div class="mb-1 mt-4">                      
                        <input type="checkbox" checked name="ativo" id="ativo">
                        <label class="form-label" style="font-size: 0.9em;" for="ativo">Ativo </label>
                      </div>
                    </div>
                    <input type="hidden" name="id_atualizar" value="<?php $idDescriptografado = base64_decode($_GET['atualizar_movimentacao_consumo_de_materia_prima']); $id_update = $idDescriptografado; echo $id_update; ?>">
                  <?php }?>
                  </div>
                </div>
                <div class="row justify-content-center push">

                  <div class="mb-4 col-md-6" style="display: flex; align-items: center; justify-content: center;">
                    <div class="block-content">
                      <div class="row justify-content-center push">
                        <div class="col-md-12">
                          <button type="submit" name="btn_atualizar_consumo_de_materia_prima" class="btn btn-alt-primary">
                            <i class="fa fa-fw fa-check opacity-50 me-1"></i> Atualizar Consumo de Materia Prima
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