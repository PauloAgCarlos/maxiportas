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
          <form action="cadastrar_vidros.php" method="POST" enctype="multipart/form-data">
            <div class="block">
              <div class="block-header block-header-default">
                <a class="btn btn-alt-secondary" href="vidros.php">
                  Cadastro de Vidros
                </a>
                <a class="btn btn-alt-secondary" href="visualizar_vidros.php">
                  Visualizar Vidros
                </a>
              </div>
              <div class="block-content" >
                <div class="row justify-content-center push">
                  <div class="col-md-6">
                    <div class="mb-1">
                      <label class="form-label" for="descricao" style="font-size: 0.8em;">Descrição</label> <span style="color: red;">*</span>
                      <div style="display: flex;">
                        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Decrição" style="font-size: 0.8em;" required>
                      </div>
                    </div>  

                    <div class="mb-3" style="display: flex; align-items: center; justify-content: space-between;">
                      <div class="mb-1">
                        <label class="form-label" style="font-size: 0.8em;" for="agregar">Agregar </label>
                        <select name="agregar" class="form-control" style="font-size: 0.8em;" id="agregar">
                          <option value="Agregar Simples">Agregar Simples</option>
                          <option value="Agregar Simples1">Agregar Simples1</option>
                          <option value="Agregar Simples2">Agregar Simples2</option>
                          <option value="Agregar Simples3">Agregar Simples3</option>
                        </select>
                      </div>

                      <div class="mb-1">
                        <label class="form-label"  style="font-size: 0.8em;" for="unidade">Unidade </label>
                        <select name="unidade" class="form-control" style="font-size: 0.8em;" id="unidade">
                          <option value="Metro">Metro Quadrado</option>
                          <option value="Metro1">Metro1 Quadrado</option>
                          <option value="Metro2">Metro2 Quadrado</option>
                          <option value="Metro3">Metro3 Quadrado</option>
                        </select>
                      </div>

                      <div class="mb-1">
                        <label class="form-label"  style="font-size: 0.8em;" for="liberado_para">Liberado Para </label>
                        <select name="liberado_para" class="form-control" style="font-size: 0.8em;" id="liberado_para">
                          <option value="Portas">Portas</option>
                          <option value="Vidros">Vidros</option>
                        </select>
                      </div>
                    </div>

                    <div class="mb-1">                      
                      <input type="checkbox" name="permite_pintura" id="permite_pintura">
                      <label class="form-label"  style="font-size: 0.8em;" for="permite_pintura">Permite Pintura </label>
                    </div> 

                    <div class="row justify-content-around">
                      <div class="mb-1 ms-2" style="width: 150px;">  
                        <label class="form-label"  style="font-size: 0.8em;" for="codigo_da_fabrica">Código da Fábrica </label>                    
                        <input type="text" class="form-control" style="font-size: 0.8em;" placeholder="0" name="codigo_da_fabrica" id="codigo_da_fabrica">
                      </div>
                    </div>

                    <div class="mb-1 col-md-12">
                      <label class="form-label" style="font-size: 0.8em;" for="observacao">Observação <span style="color: red;">*</span> </label>
                      <textarea name="observacao" id="observacao" class="form-control" cols="10" rows="4" style="font-size: 0.8em;"></textarea>
                    </div>                     
                  </div>
                  
                  <div class="col-md-6">

                    <div style="display: flex; align-items: center; justify-content: space-between;">
                      <div class="mb-1">
                        <label class="form-label"  style="font-size: 0.8em;" for="custo_metro">Custo (m^2) </label>
                        <input type="text" class="form-control" id="custo_metro" name="custo_metro" placeholder="0,00" style="font-size: 0.8em;">
                      </div>
                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="markup">Markup (%) </label>
                        <input type="text" class="form-control" id="markup" name="markup" placeholder="0,00" style="font-size: 0.8em;">
                      </div>
                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="markup_avulso">Markup Avulso (%) </label>
                        <input type="text" class="form-control" id="markup_avulso" name="markup_avulso" placeholder="0,00" style="font-size: 0.8em;">
                      </div>
                      <div class="mb-1 ms-3">
                        <label class="form-label"  style="font-size: 0.8em;" for="metragem_minima">Metragem Mínima </label>
                        <input type="text" class="form-control" id="metragem_minima" name="metragem_minima" placeholder="0(m^2)" style="font-size: 0.8em;">
                      </div>
                      
                    </div>

                    <div style="display: flex; align-items: center; justify-content: space-between;">
                     
                      <div class="mb-1 ms-4">
                        <label class="form-label"  style="font-size: 0.8em;" for="valor">Valor (m^2) </label>
                        <input type="text" class="form-control" id="valor" name="valor" placeholder="0,00" style="font-size: 0.8em;">
                      </div>
                      <div class="mb-1 ms-4">
                        <label class="form-label"  style="font-size: 0.8em;" for="valor_avulso">Valor Avulso (m^2) </label>
                        <input type="text" class="form-control" id="valor_avulso" name="valor_avulso" placeholder="0,00" style="font-size: 0.8em;">
                      </div>
                      <div class="mb-1 ms-4">
                        <label class="form-label"  style="font-size: 0.8em;" for="valor_com_perda">Valor com Perda</label>
                        <input type="text" class="form-control" id="valor_com_perda" name="valor_com_perda" placeholder="0,00" style="font-size: 0.8em;">
                      </div>
                    </div>

                    <div style="display: flex; align-items: center; justify-content: space-between;">
                      
                      <div class="mb-1">
                        <label class="form-label ms-2" style="font-size: 0.8em;" for="perda">Perda </label>
                        <input type="text" class="form-control ms-2" id="perda" name="perda" placeholder="0,00(%)" style="font-size: 0.8em;">
                      </div>
                      <div class="mb-1 ms-5">
                        <label class="form-label" style="font-size: 0.8em;" for="perda_avulso">Perda Avulso </label>
                        <input type="text" class="form-control" id="perda_avulso" name="perda_avulso" placeholder="0,00(%)" style="font-size: 0.8em;">
                      </div>
                      <div class="mb-1 ms-5">
                        <label class="form-label" style="font-size: 0.8em;" for="perda_bordas"> Perda Bordas<span style="color: red;">*</span> </label>
                        <input type="text" class="form-control" id="perda_bordas" name="perda_bordas" placeholder="0" style="font-size: 0.8em;">
                      </div>
                      <div class="mb-1 ms-5">
                        <label class="form-label" style="font-size: 0.8em;" for="perda_corte">Perda Corte  </label>
                        <input type="text" style="width: 100px; font-size: 0.8em;" class="form-control" id="perda_corte" name="perda_corte" placeholder="0(mm)">
                      </div>
                  
                    </div>

                    <div style="display: flex; align-items: center; justify-content: space-between;">
                      
                      <div class="mb-1">
                        <label class="form-label" style="font-size: 0.8em;" for="perda_bordas_retalho">Perda Bordas Retalho</label>
                        <input type="text"  style="width: 100px; font-size: 0.8em;" class="form-control ms-3" id="perda_bordas_retalho" name="perda_bordas_retalho" placeholder="0(mm)">
                      </div>
                      <div class="mb-1">
                        <label class="form-label" style="font-size: 0.8em;" for="perda_corte_retalho">Perda Corte Retalho</label>
                        <input type="text" style="width: 100px; font-size: 0.8em;" class="form-control ms-2" id="perda_corte_retalho" name="perda_corte_retalho" placeholder="0(mm)">
                      </div>

                      <div class="mb-1">
                        <label class="form-label" style="font-size: 0.8em;" for="dimensao">Dimensão </label>
                        <input type="number" class="form-control ms-2" id="dimensao" name="dimensao" placeholder="0(mm)" style="width: 100px; font-size: 0.8em;">
                      </div>

                    </div>

                    <div class="mt-5" style="display: flex; align-items: center; justify-content: space-between;">  

                      <div style="display: flex; align-items: center; justify-content: center;">
                        <div>
                          <img class="img-avatar" style="width: 100px; height: 100px; cursor: pointer;" src="../assets/img/avatars/avatar10.jpg" alt="Avatar User" id="profileDisplay" onclick="triggerClick()">
                        </div>
                        <div>
                          <input class="form-control" required type="file" name="imagem" style="display: none;" id="profileImage" onchange="displayImage(this)" type="images/">
                          <img src="../assets/img/cameraa.png" alt="avatar" onclick="triggerClick()" width="35px" style="border-radius: 1000px; margin-left: -20px; cursor: pointer;">
                        </div>
                      </div>

                      <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div class="mb-1">
                          <label class="form-label" style="font-size: 0.8em;" for="ultima_alteracao">Última Alteração <span style="color: red;">*</span> </label>
                          <input type="date" class="form-control" id="ultima_alteracao" name="ultima_alteracao"  style="font-size: 0.8em;">
                        </div>
                  
                        <div class="mb-1 ms-5">                      
                          <input type="checkbox" name="ativo" id="ativo">
                          <label class="form-label" checkad style="font-size: 0.8em;" for="ativo">Ativo </label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6" style="display: flex; align-items: center; justify-content: space-around;">
                  </div>

                  </div>
                </div>
                <div style="display: flex; align-items: center; justify-content: center;">

                  <div class="mb-4 push" style="display: flex; align-items: center; justify-content: center;">
                    <div class="block-content bg-body-light push pb-4">
                      <div>
                        <div class="col-md-12">
                          <button type="submit" name="btn_cadastrar_vidros" class="btn btn-alt-primary">
                            <i class="fa fa-fw fa-check opacity-50 me-1"></i> Cadastrar vidros
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


<!-- Exibir mensagem de sucesso -->
<?php if (isset($_GET['success']) && $_GET['success'] == '1'): ?>
  <script>
      const Toast = Swal.mixin({
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

      Toast.fire({
      icon: 'success',
      title: 'Cadastrado Com Sucesso!'
      })
  </script>
  <?php endif; ?>