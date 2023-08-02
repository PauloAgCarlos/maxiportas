<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Dashmix - Bootstrap 5 Admin Template &amp; UI Framework</title>

    <meta name="description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!--Mascara no input cpf-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script> -->
    <!-- <script>
      function formatarCPF(campo) {
        campo.value = campo.value.replace(/\D/g, '');
        campo.value = campo.value.replace(/(\d{3})(\d)/, '$1.$2');
        campo.value = campo.value.replace(/(\d{3})(\d)/, '$1.$2');        
        campo.value = campo.value.replace(/(\d{3})(\d)/, '$1.$2');
        campo.value = campo.value.replace(/(\d{3})(\d{1,2,3})$/, '$1-$2');
      }
    </script> -->
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
                    <a class="link-fx fw-bold fs-1" href="index.html">
                      <img src="assets/img/logoHJ-Aluminio.jpg" alt="logotipo-hj">
                    </a>
                  </div>
                  <form class="js-validation-signup " action="" method="POST">
                    <div class="input-group mb-3">
                      <span style="color: red;">*</span>
                      <input type="text" class="form-control input-sm" id="signup-username" name="nome" style="font-size: 0.9em;" placeholder="Nome" required>
                      
                      <span class="ms-3" style="color: red;">*</span>
                      <input type="password" class="form-control" id="signup-username" name="password" required style="font-size: 0.9em;" placeholder="Senha" style="font-size: 0.9em;">
                    </div>

                    <div class="mb-4">
                      <div class="input-group input-group-lg">
                        <span style="color: red;">*</span>
                        <input type="email" class="form-control" id="signup-username" name="email" required style="font-size: 0.9em;" placeholder="Login (e-mail)" style="font-size: 0.9em;">
                      </div>
                    </div>

                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="cpf" name="cpf" style="font-size: 0.9em;" placeholder="CPF">
                      
                      <input type="text" class="form-control ms-3" id="signup-password-confirm" name="rg" style="font-size: 0.9em;" placeholder="RG">
                    </div>

                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="cep" name="cep" style="font-size: 0.9em;" placeholder="CEP">
                      
                      <input type="text" class="form-control ms-3" id="endereco" name="endereco" style="font-size: 0.9em;" placeholder="Endereço">
                    </div>

                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="telefone" name="telefone" style="font-size: 0.9em;" placeholder="Número">
                      
                      <input type="text" class="form-control ms-3" id="complemento" name="complemento" style="font-size: 0.9em;" placeholder="Complemento">
                    </div>

                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="bairro" name="bairro" style="font-size: 0.9em;" placeholder="Bairro">
                      
                      <input type="text" class="form-control ms-3" id="cidade" name="cidade" style="font-size: 0.9em;" placeholder="Cidade">
                    </div>

                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="uf" name="uf" style="font-size: 0.9em;" placeholder="UF">
                      
                      <input type="text" class="form-control ms-3" id="nascimento" name="nascimento" style="font-size: 0.9em;" placeholder="Nascimento">
                    </div>
                      
                    <input type="hidden" class="form-control ms-3" id="nivel" name="nivel" style="font-size: 0.9em;" placeholder="nivel" value="adm">
                    
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
        $("#cep").mask("99999-999");
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
  </body>
</html>


<?php
include_once "conexao-bd.php";

if(isset($_POST['btn_cadastrar'])) :
    $username = $_POST['nome'];
    //$nome = filter_var($nome, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $senha = $_POST['password'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $nascimento = $_POST['nascimento'];
    $nivel = $_POST['nivel'];
    

    $stmt = $conn->prepare("INSERT INTO logado (nome, email, senha, cpf, rg, cep, endereco, telefone, complemento, bairro, cidade, uf, nascimento, nivel) VALUES (:nome, :email, :senha, :cpf, :rg, :cep, :endereco, :telefone, :complemento, :bairro, :cidade, :uf, :nascimento, :nivel)");
    $stmt->bindParam(':nome', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
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
    // if($stmt->execute()) {
    //     header('Location: criar-conta.php?sucefull');
    // } else {
    //     header('Location: criar-conta.php.php?error');
    // }
endif;
?>
