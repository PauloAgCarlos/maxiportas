<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>HJ Alúminio</title>

    <meta name="description" content="HJ Alúminio">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="HJ Alúminio">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="HJ Alúminio">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <link rel="stylesheet" id="css-main" href="assets/css/dashmix.min.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css">
    <!-- END Stylesheets -->
    



    
    <!-- Last CEP -->
    <!-- Adicionando Javascript -->
    <script>
    
      function limpa_formulário_cep() {
              //Limpa valores do formulário de cep.
              document.getElementById('rua').value=("");
              document.getElementById('bairro').value=("");
              document.getElementById('cidade').value=("");
              document.getElementById('uf').value=("");
              document.getElementById('ibge').value=("");
      }

      function meu_callback(conteudo) {
          if (!("erro" in conteudo)) {
              //Atualiza os campos com os valores.
              document.getElementById('rua').value=(conteudo.logradouro);
              document.getElementById('bairro').value=(conteudo.bairro);
              document.getElementById('cidade').value=(conteudo.localidade);
              document.getElementById('uf').value=(conteudo.uf);
              document.getElementById('ibge').value=(conteudo.ibge);
          } //end if.
          else {
              //CEP não Encontrado.
              limpa_formulário_cep();
              alert("CEP não encontrado.");
          }
      }
        
      function pesquisacep(valor) {

          //Nova variável "cep" somente com dígitos.
          var cep = valor.replace(/\D/g, '');

          //Verifica se campo cep possui valor informado.
          if (cep != "") {

              //Expressão regular para validar o CEP.
              var validacep = /^[0-9]{8}$/;

              //Valida o formato do CEP.
              if(validacep.test(cep)) {

                  //Preenche os campos com "..." enquanto consulta webservice.
                  document.getElementById('rua').value="...";
                  document.getElementById('bairro').value="...";
                  document.getElementById('cidade').value="...";
                  document.getElementById('uf').value="...";
                  document.getElementById('ibge').value="...";

                  //Cria um elemento javascript.
                  var script = document.createElement('script');

                  //Sincroniza com o callback.
                  script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                  //Insere script no documento e carrega o conteúdo.
                  document.body.appendChild(script);

              } //end if.
              else {
                  //cep é inválido.
                  limpa_formulário_cep();
                  alert("Formato de CEP inválido.");
              }
          } //end if.
          else {
              //cep sem valor, limpa formulário.
              limpa_formulário_cep();
          }
      };

    </script>
    <!-- Last CEP -->



    <!--SwitAlert Success ao Cadastrar-->
    <script src="assets/js/cdn.jsdelivr.net_npm_sweetalert2@11.0.18_dist_sweetalert2.all.min.js"></script>
  </head>
  <body>
    <div id="page-container">

      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="bg-image" style="background-image: url('assets/img/background.jpg');">
          <div class="row g-0 justify-content-center bg-black-15">
            <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
              <!-- Sign Up Block -->
              <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                <div class="block-content block-content-full px-xl-12 bg-body-extra-light">
                  <!-- Header -->
                  <div class="mb-2 text-center">
                    <a class="link-fx fw-bold fs-1" href="criar-conta.php">
                      <img src="assets/img/logoHJ-Aluminio.jpg" alt="logotipo-hj">
                    </a>
                  </div>
                  <form class="js-validation-signup " action="" method="GET">
                    <div class="input-group mb-3">
                      <span style="color: red;">*</span>
                      <input type="text" class="form-control input-sm" id="signup-username" name="nome" style="font-size: 0.9em;" placeholder="Nome" required>
                      
                      <span class="ms-3" style="color: red;">*</span>
                      <input type="password" class="form-control" id="signup-username" name="password" required style="font-size: 0.9em;" placeholder="Senha" style="font-size: 0.9em;">
                    </div>

                    <div class="input-group mb-3">
                      <span style="color: red;">*</span>
                      <input type="email" class="form-control" id="signup-username" name="email" required style="font-size: 0.9em;" placeholder="Login (e-mail)" style="font-size: 0.9em;">
                      
                      <span class="ms-3" style="color: red;">*</span>
                      <select name="parceiro_colaborador" required class="form-control" id="">
                        <option value="Parceiro">Parceiro</option>
                        <option value="Colaborador">Colaborador</option>
                      </select>
                    </div>

                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="cpf" name="cpf" style="font-size: 0.9em;" placeholder="CPF">
                      
                      <input type="text" class="form-control ms-3" id="signup-password-confirm" name="rg" style="font-size: 0.9em;" placeholder="RG">
                    </div>

                    <div class="input-group mb-3">
                      <input name="cep" type="text" id="cep" class="form-control" placeholder="CEP" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);" />
                      <!-- <input type="text" class="form-control" name="cep" type="text" id="cep" value="" size="10" maxlength="9"
                        onblur="pesquisacep(this.value);" style="font-size: 0.9em;" placeholder="CEP"> -->
                      
                      <input type="text" class="form-control ms-3" id="endereco" name="endereco" style="font-size: 0.9em;" placeholder="Endereço">
                    </div>

                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="telefone" name="telefone" style="font-size: 0.9em;" placeholder="Número">
                      
                      <input type="text" class="form-control ms-3" id="complemento" name="complemento" style="font-size: 0.9em;" placeholder="Complemento">
                    </div>

                    <div class="input-group mb-3">
                      <input name="bairro" placeholder="Bairro" type="text" id="bairro" class="form-control" size="40" />
                      <!-- <input type="text" class="form-control" name="bairro" type="text" id="bairro" size="40" style="font-size: 0.9em;" placeholder="Bairro"> -->
                    </div>

                    <div class="input-group mb-3">
                      <input name="cidade" type="text" id="cidade" placeholder="Cidade" class="form-control" size="40" />
                      <!-- <input type="text" class="form-control ms-3" name="cidade" type="text" id="cidade" style="font-size: 0.9em;" placeholder="Cidade"> -->
                    </div>

                    <div class="input-group mb-3">
                      <input name="uf" type="text" placeholder="UF" class="form-control" id="uf" size="2" />
                    </div>

                    <div class="input-group mb-3">
                      <input name="ibge" type="text" placeholder="IBGE" class="form-control" id="ibge" size="8" />
                      <input name="rua" type="text" placeholder="Rua" class="form-control ms-3" id="rua" size="60" />
                    </div>

                    <div class="input-group mb-3">
                      <input name="rua" type="text" placeholder="Rua" class="form-control" id="rua" size="60" />
                    </div>

                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="uf" name="uf" style="font-size: 0.9em;" placeholder="UF">
                      
                      <input type="text" class="form-control ms-3" id="nascimento" name="nascimento" style="font-size: 0.9em;" placeholder="Nascimento">
                    </div>
                      
                    <input type="hidden" class="form-control ms-3" id="nivel" name="nivel" style="font-size: 0.9em;" placeholder="nivel" value="user">
                    
                    <div class="text-center mb-4">
                      <button type="submit" name="btn_cadastrar" class="btn btn-hero btn-primary">
                        <i class="fa fa-fw fa-plus opacity-50 me-1"></i>Cadastrar-se
                      </button>
                    </div>
                    <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                        <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="index.php">
                        <i class="fa fa-exclamation-triangle opacity-50 me-1"></i> Voltar
                        </a>
                    </p>
                    
                  </form>
                    <div style="display: flex; justify-content: right;">
                      <a href="http://devaholic.ao" target="_blank" rel="noopener noreferrer" style="font-weight: bolder;">Devaholic</a>
                    </div>
                  <!-- END Sign Up Form -->
                </div>
              </div>
            </div>
            <!-- END Sign Up Block -->
          </div>         
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->
    </div>

    <!--Mascara no input-->
      <script>
        $("#telefone").mask("(99) 99999-99999");
        $("#cpf").mask("999.999.999-99")
        // $("#cep").mask("99999-999");
        // $("#cnpj").mask("99.999.999/9999-99")
        $("#nascimento").mask("99/99/9999")
      </script>

    <script src="assets/js/dashmix.app.min.js"></script>

    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src="assets/js/lib/jquery.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

    <!-- Page JS Code -->
    <script src="assets/js/pages/op_auth_signup.min.js"></script>

    <!--Evitar Reenvio de Form-->
    <script src="assets/js/evitar_reenvio_form.js"></script>
  </body>
</html>


<?php
include_once "conexao-bd.php";

if(isset($_POST['btn_cadastrar'])) :
    $username = $_POST['nome'];
    //$nome = filter_var($nome, FILTER_SANITIZE_STRING);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['password']);
    $parceiro_colaborador = addslashes($_POST['parceiro_colaborador']);
    $cpf = addslashes($_POST['cpf']);
    $rg = addslashes($_POST['rg']);
    $cep = addslashes($_POST['cep']);
    $endereco = addslashes($_POST['endereco']);
    $telefone = addslashes($_POST['telefone']);
    $complemento = addslashes($_POST['complemento']);
    $bairro = addslashes($_POST['bairro']);
    $cidade = addslashes($_POST['cidade']);
    $uf = addslashes($_POST['uf']);
    $nascimento = addslashes($_POST['nascimento']);
    $nivel = addslashes($_POST['nivel']);
    

  try{
    $stmt = $conn->prepare("INSERT INTO logado (nome, email, senha, parceiro_colaborador, cpf, rg, cep, endereco, telefone, complemento, bairro, cidade, uf, nascimento, nivel) VALUES (:nome, :email, :senha, :parceiro_colaborador, :cpf, :rg, :cep, :endereco, :telefone, :complemento, :bairro, :cidade, :uf, :nascimento, :nivel)");
    $stmt->bindParam(':nome', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':parceiro_colaborador', $parceiro_colaborador);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':rg', $rg);
    $stmt->bindParam('cep', $cep);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':complemento', $complemento);
    $stmt->bindParam(':bairro', $bairro);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':uf', $uf);
    $stmt->bindParam(':nascimento', $nascimento);
    $stmt->bindParam(':nivel', $nivel);
    $stmt->execute();

    if($stmt)
    { 
      
      //Cadastrar tbl_clientes_system
      $tbl_clientes_system = $conn->prepare("INSERT INTO tbl_clientes_system (nome, endereco, bairro, cidade, fone, cep) VALUES (:nome, :endereco, :bairro, :cidade, :fone, :cep)");
      $tbl_clientes_system->bindParam(":nome", $username);
      $tbl_clientes_system->bindParam(":endereco", $endereco);
      $tbl_clientes_system->bindParam(":bairro", $bairro);
      $tbl_clientes_system->bindParam(":cidade", $cidade);
      $tbl_clientes_system->bindParam(":fone", $telefone);
      $tbl_clientes_system->bindParam(":cep", $cep);
      $tbl_clientes_system->execute();
    
    ?>

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

        <?php }
        exit();
        
        } catch (PDOException $e) {
            $erro = $e->getMessage(); ?>
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
              title: 'Erro ao Cadastradrar!'
              })
            </script>
      <?php  }



endif;
?>
