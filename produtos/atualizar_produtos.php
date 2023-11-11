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
          <form action="processar_atualizacao_produtos.php" method="POST" enctype="multipart/form-data">
            <div class="block">
              <div class="block-header block-header-default">
                <a class="btn btn-alt-secondary" href="produtos.php">
                  Cadastro de Produtos
                </a>
                <a class="btn btn-alt-secondary" href="visualizar_produtos.php">
                  Visualizar Produtos
                </a>
              </div>
              <div class="block-content" >
                <div class="row justify-content-center push">
                  <div class="col-md-6">
                  <?php
                    require_once "../controllers/controllers_produtos.php";
                    $selecionar_produtos_id = new controllers_produtos();
                    $idDescriptografado = base64_decode($_GET['atualizar_produtos']); 
                    
                    $id_update = $idDescriptografado;
                    $update = $selecionar_produtos_id->selecionar_produtos_id($id_update);                   
                    foreach($update as $row_update){
                  ?>
                    <div class="mb-1">
                      <label class="form-label" for="descricao_do_produto" style="font-size: 0.8em;">Descrição do Produto</label> <span style="color: red;">*</span>
                      <div style="display: flex;">
                        <input type="text" class="form-control" id="descricao_do_produto" name="descricao_do_produto" value="<?php echo $row_update['descricao_do_produto']; ?>" style="font-size: 0.8em;" required>
                      </div>
                    </div>  

                    <div style="display: flex;">
                      <div class="mb-1" style="width: 80%;">
                        <label class="form-label" for="codigo_produto" style="font-size: 0.9em;">Código Produto</label> <span style="color: red;">*</span>
                        <div>
                          <input type="text" class="form-control" id="codigo_produto" name="codigo_produto" maxlength="20" minlength="2" value="<?php echo $row_update['codigo_produto']; ?>" ? style="font-size: 0.9em;" required> 
                        </div>
                      </div>

                      <div class="mb-1 ms-2" style="width: 150px;">  
                        <label class="form-label"  style="font-size: 0.8em;" for="codigo_da_fabrica">Código da Fábrica </label>                    
                        <input type="text" class="form-control" style="font-size: 0.8em;" value="<?php echo $row_update['codigo_da_fabrica']; ?>" name="codigo_da_fabrica" id="codigo_da_fabrica">
                      </div>
                    </div>

                    <div class="mb-1">
                      <label class="form-label" for="referencia" style="font-size: 0.8em;">Referência</label>
                      <div style="display: flex;">
                        <input type="text" class="form-control" id="referencia" name="referencia" value="<?php echo addslashes($row_update['referencia']); ?>" style="font-size: 0.8em;">
                      </div>
                    </div> 
                  
                    
                    <div class="mb-3" style="display: flex; align-items: center; justify-content: space-between">

                      <div class="mb-1 ms-5">                      
                        <input type="checkbox" name="libera_para_venda" id="libera_para_venda">
                        <label class="form-label" style="font-size: 0.8em;" for="libera_para_venda">Libera Para Venda </label>
                      </div>

                      <div class="mb-1 ms-5">                      
                        <input type="checkbox" name="bloqueia_estoque_negativo" id="bloqueia_estoque_negativo">
                        <label class="form-label" style="font-size: 0.8em;" for="bloqueia_estoque_negativo">Bloqueia Estoque Negativo</label>
                      </div>
                    
                    </div>
                    <div class="mb-3" style="display: flex; align-items: center; justify-content: space-between">

                    
                      <div class="mb-1 ms-3">
                        <label class="form-label" style="font-size: 0.8em;" for="embalagem_fornecedor">Embalagem Fornecedor</label>
                        <input type="number" class="form-control" id="embalagem_fornecedor" name="embalagem_fornecedor" value="<?php echo addslashes($row_update['embalagem_fornecedor']); ?>" style="font-size: 0.8em;">
                      </div>

                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="consumo_medio">Consumo Médio (Por Dia)</label>
                        <input type="number" class="form-control" id="consumo_medio" name="consumo_medio" value="<?php echo addslashes($row_update['consumo_medio']); ?>" style="font-size: 0.8em;">
                      </div>

                      
                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="massa">Massa (kg)</label>
                        <input type="number" class="form-control" id="massa" name="massa" value="<?php echo addslashes($row_update['massa']); ?>" style="font-size: 0.8em;">
                      </div>
                    
                    </div>
                    <div style="display: flex; align-items: center; justify-content: space-between;">  
                  
                      <div class="mb-1 ms-4">
                        <label class="form-label" style="font-size: 0.8em;" for="ultima_alteracao">Última Alteração <span style="color: red;">*</span> </label>
                        <input type="date" class="form-control" id="ultima_alteracao" name="ultima_alteracao" value="<?php echo addslashes($row_update['ultima_alteracao']); ?>" style="font-size: 0.8em;">
                      </div>

                      <div class="mb-1 ms-5 mt-4">                      
                        <input type="checkbox" name="ativo" id="ativo">
                        <label class="form-label" style="font-size: 0.8em;" for="ativo">Ativo </label>
                      </div>

                    </div>

                    
                  </div>
                  
                  
                  <div class="col-md-6">

                    <div style="display: flex; align-items: center; justify-content: space-between;">
                      <div class="mb-1">
                        <label class="form-label"  style="font-size: 0.8em;" for="custo_atual">Custo Atual (R$)</label>
                        <input type="text" class="form-control" id="custo_atual" name="custo_atual" value="<?php echo $row_update['custo_atual']; ?>" style="font-size: 0.8em;">
                      </div>
                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="markup">Markup (%) </label>
                        <input type="text" class="form-control" id="markup" name="markup" value="<?php echo addslashes($row_update['markup']); ?>" style="font-size: 0.8em;">
                      </div>
                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="venda">Venda (R$)</label>
                        <input type="text" class="form-control" id="venda" name="venda" value="<?php echo addslashes($row_update['venda']); ?>" style="font-size: 0.8em;">
                      </div>

                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="ipi">IPI (%)</label>
                        <input type="number" class="form-control" id="ipi" name="ipi" value="<?php echo addslashes($row_update['ipi']); ?>" style="font-size: 0.8em;">
                      </div>

                      
                    </div>

                    <div class="mb-1 ms-2">
                      <label class="form-label" style="font-size: 0.8em;" for="unidade_basica">Unidade Básica</label>
                      <select name="unidade_basica" class="form-control" style="font-size: 0.8em;" id="unidade_basica">
                        <option value="<?php echo addslashes($row_update['unidade_basica']); ?>"><?php echo addslashes($row_update['unidade_basica']); ?></option>
                        <option value="Unidade">Unidade</option>
                        <option value="Unidade1">Unidade1</option>
                        <option value="Unidade2">Unidade2</option>
                        <option value="Unidade3">Unidade3</option>
                      </select>
                    </div>

                    <div class="mb-3" style="display: flex; align-items: center; justify-content: space-between">

                        <div class="mb-1 ms-3 mt-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="estoque">Estoque</label>
                        <input type="number" class="form-control" id="estoque" name="estoque" value="<?php echo addslashes($row_update['estoque']); ?>" style="font-size: 0.8em;">
                      </div>

                      <div class="mb-1 ms-3 mt-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="estoque_minimo">Estoque Mínimo</label>
                        <input type="number" class="form-control" id="estoque_minimo" name="estoque_minimo" value="<?php echo addslashes($row_update['estoque_minimo']); ?>" style="font-size: 0.8em;">
                      </div>

                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="estoque_de_seguranca">Estoque de Segurança (Dias)</label>
                        <input type="number" class="form-control" id="estoque_de_seguranca" name="estoque_de_seguranca" value="<?php echo addslashes($row_update['estoque_de_seguranca']); ?>" style="font-size: 0.8em;">
                      </div>

                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="tempo_de_reposicao">Tempo de Reposição (Dias)</label>
                        <input type="number" class="form-control" id="tempo_de_reposicao" name="tempo_de_reposicao" value="<?php echo addslashes($row_update['tempo_de_reposicao']); ?>" style="font-size: 0.8em;">
                      </div>
                    </div>

                    <div class="mb-1 ms-3">
                      <label class="form-label" style="font-size: 0.8em;" for="linha">Linha</label>
                      <select name="linha" class="form-control" style="font-size: 0.8em;" id="linha">
                        <option value="<?php echo addslashes($row_update['linha']); ?>"><?php echo addslashes($row_update['linha']); ?></option>
                        <option value="Linha">Linha</option>
                        <option value="Linha1">Linha1</option>
                        <option value="Linha2">Linha2</option>
                        <option value="Linha3">Linha3</option>
                      </select>
                    </div>
                    
                    <div class="mb-3" style="display: flex; align-items: center; justify-content: space-between;">

                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="embalagem">Embalagem</label>
                        <input type="number" class="form-control" id="embalagem" name="embalagem" value="<?php echo addslashes($row_update['embalagem']); ?>" style="font-size: 0.8em;">
                      </div>

                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="localizador">Localizador</label>
                        <input type="text" class="form-control" id="localizador" name="localizador" value="<?php echo addslashes($row_update['localizador']); ?>" style="font-size: 0.8em;">
                      </div>
                    
                      
                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="classificacao_fiscal">Classificação Fiscal</label>
                        <input type="number" class="form-control" id="classificacao_fiscal" name="classificacao_fiscal" value="<?php echo addslashes($row_update['classificacao_fiscal']); ?>" style="font-size: 0.8em;">
                      </div>

                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="volume">Volume(m^3)</label>
                        <input type="number" class="form-control" id="volume" name="volume" value="<?php echo addslashes($row_update['volume']); ?>" style="font-size: 0.8em;">
                      </div>
                      <input type="hidden" name="id_atualizar" value="<?php $idDescriptografado = base64_decode($_GET['atualizar_produtos']); $id_update = $idDescriptografado; echo $id_update; ?>">
                  <?php }?>
                    </div>                    

                  </div>
                </div>
                <div style="display: flex; align-items: center; justify-content: center;">

                  <div class="mb-4 push" style="display: flex; align-items: center; justify-content: center;">
                    <div class="block-content bg-body-light push pb-4">
                      <div>
                        <div class="col-md-12">
                          <button type="submit" name="btn_atualizar_produtos" class="btn btn-alt-primary">
                            <i class="fa fa-fw fa-check opacity-50 me-1"></i> Atualizar produtos
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