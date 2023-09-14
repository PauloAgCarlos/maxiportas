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
          <form action="produtos.php" method="POST" enctype="multipart/form-data">
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
                    <div class="mb-1">
                      <label class="form-label" for="descricao_do_produto" style="font-size: 0.8em;">Descrição do Produto</label> <span style="color: red;">*</span>
                      <div style="display: flex;">
                        <input type="text" class="form-control" id="descricao_do_produto" name="descricao_do_produto" placeholder="Decrição" style="font-size: 0.8em;" required>
                      </div>
                    </div>  

                    <div style="display: flex;">
                      <div style="display: flex; align-items: center; justify-content: space-between;"> 
                        <div class="mb-1" style="width: 80%;">
                          <label class="form-label" for="codigo_produto" style="font-size: 0.9em;">Código Produto</label> <span style="color: red;">*</span>
                          <div>
                            <input type="text" class="form-control" id="codigo_produto" name="codigo_produto" maxlength="20" minlength="2" placeholder="Código Produto" style="font-size: 0.9em;" required>
                          </div>
                        </div>

                        <div class="mb-1 ms-1">
                          <label class="form-label" for="quantidade" style="font-size: 0.9em;">Quantidade</label> <span style="color: red;">*</span>
                          <div>
                            <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade" style="font-size: 0.9em;" required>
                          </div>
                        </div>
                      </div>

                      <div class="mb-1 ms-1" style="width: 150px;">  
                        <label class="form-label"  style="font-size: 0.8em;" for="codigo_da_fabrica">Código da Fábrica </label>                    
                        <input type="text" class="form-control" style="font-size: 0.8em;" placeholder="0" name="codigo_da_fabrica" id="codigo_da_fabrica">
                      </div>
                    </div>

                    <div class="mb-1">
                      <label class="form-label" for="referencia" style="font-size: 0.8em;">Referência</label> <span style="color: red;">*</span>
                      <div style="display: flex;">
                        <input type="text" class="form-control" id="referencia" name="referencia" placeholder="Decrição" style="font-size: 0.8em;" required>
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
                        <input type="number" class="form-control" id="embalagem_fornecedor" name="embalagem_fornecedor" placeholder="0,00" style="font-size: 0.8em;">
                      </div>

                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="consumo_medio">Consumo Médio (Por Dia)</label>
                        <input type="number" class="form-control" id="consumo_medio" name="consumo_medio" placeholder="0,00" style="font-size: 0.8em;">
                      </div>

                      
                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="massa">Massa (kg)</label>
                        <input type="number" class="form-control" id="massa" name="massa" placeholder="0,00" style="font-size: 0.8em;">
                      </div>
                    
                    </div>
                    <div style="display: flex; align-items: center; justify-content: space-between;">  
                  
                      <div class="mb-1 ms-4">
                        <label class="form-label" style="font-size: 0.8em;" for="ultima_alteracao">Última Alteração <span style="color: red;">*</span> </label>
                        <input type="date" class="form-control" id="ultima_alteracao" name="ultima_alteracao"  style="font-size: 0.8em;">
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
                        <input type="text" class="form-control" id="custo_atual" name="custo_atual" placeholder="0,00" style="font-size: 0.8em;">
                      </div>
                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="markup">Markup (%) </label>
                        <input type="text" class="form-control" id="markup" name="markup" placeholder="0,00" style="font-size: 0.8em;">
                      </div>
                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="venda">Venda (R$)</label>
                        <input type="text" class="form-control" id="venda" name="venda" placeholder="0,00" style="font-size: 0.8em;">
                      </div>

                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="ipi">IPI (%)</label>
                        <input type="number" class="form-control" id="ipi" name="ipi" placeholder="0,00" style="font-size: 0.8em;">
                      </div>

                      
                    </div>

                    <div class="mb-1 ms-2">
                      <label class="form-label" style="font-size: 0.8em;" for="unidade_basica">Unidade Básica</label>
                      <select name="unidade_basica" class="form-control" style="font-size: 0.8em;" id="unidade_basica">
                        <option value="Unidade">Unidade</option>
                        <option value="Unidade1">Unidade1</option>
                        <option value="Unidade2">Unidade2</option>
                        <option value="Unidade3">Unidade3</option>
                      </select>
                    </div>

                    <div class="mb-3" style="display: flex; align-items: center; justify-content: space-between">

                        <div class="mb-1 ms-3 mt-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="estoque">Estoque</label>
                        <input type="number" class="form-control" id="estoque" name="estoque" placeholder="0,00" style="font-size: 0.8em;">
                      </div>

                      <div class="mb-1 ms-3 mt-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="estoque_minimo">Estoque Mínimo</label>
                        <input type="number" class="form-control" id="estoque_minimo" name="estoque_minimo" placeholder="0,00" style="font-size: 0.8em;">
                      </div>

                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="estoque_de_seguranca">Estoque de Segurança (Dias)</label>
                        <input type="number" class="form-control" id="estoque_de_seguranca" name="estoque_de_seguranca" placeholder="0,00" style="font-size: 0.8em;">
                      </div>

                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="tempo_de_reposicao">Tempo de Reposição (Dias)</label>
                        <input type="number" class="form-control" id="tempo_de_reposicao" name="tempo_de_reposicao" placeholder="0,00" style="font-size: 0.8em;">
                      </div>
                    </div>

                    <div class="mb-1 ms-3">
                      <label class="form-label" style="font-size: 0.8em;" for="linha">Linha</label>
                      <select name="linha" class="form-control" style="font-size: 0.8em;" id="linha">
                        <option value="Linha">Linha</option>
                        <option value="Linha1">Linha1</option>
                        <option value="Linha2">Linha2</option>
                        <option value="Linha3">Linha3</option>
                      </select>
                    </div>
                    
                    <div class="mb-3" style="display: flex; align-items: center; justify-content: space-between;">

                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="embalagem">Embalagem</label>
                        <input type="number" class="form-control" id="embalagem" name="embalagem" placeholder="0,00" style="font-size: 0.8em;">
                      </div>

                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="localizador">Localizador</label>
                        <input type="text" class="form-control" id="localizador" name="localizador" style="font-size: 0.8em;">
                      </div>
                    
                      
                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="classificacao_fiscal">Classificação Fiscal</label>
                        <input type="number" class="form-control" id="classificacao_fiscal" name="classificacao_fiscal" placeholder="0,00" style="font-size: 0.8em;">
                      </div>

                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="volume">Volume(m^3)</label>
                        <input type="number" class="form-control" id="volume" name="volume" placeholder="0,00" style="font-size: 0.8em;">
                      </div>

                    </div>                    

                  </div>
                </div>
                <div style="display: flex; align-items: center; justify-content: center;">

                  <div class="mb-4 push" style="display: flex; align-items: center; justify-content: center;">
                    <div class="block-content bg-body-light push pb-4">
                      <div>
                        <div class="col-md-12">
                          <button type="submit" name="btn_cadastrar_produtos" class="btn btn-alt-primary">
                            <i class="fa fa-fw fa-check opacity-50 me-1"></i> Cadastrar produtos
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

<!--Preview Image-->
<script src="../assets/js/preview.js"></script>
<!--Evitar Reenvio de Form-->
<script src="../assets/js/evitar_reenvio_form.js"></script>
  </body>
</html>

<?php include_once "cadastrar_produtos.php"; ?>