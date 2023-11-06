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
    
    <!--CNPJ-->
    <script>
        function buscarCNPJ() {
            var cnpj = document.getElementById('cnpj').value;

            fetch(`https://www.receitaws.com.br/v1/cnpj/${cnpj}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'OK') {
                        console.log(data);
                        document.getElementById('nome').value = data.nome;
                        document.getElementById('atividade_principal').value = data.atividade_principal[0].text;
                        document.getElementById('endereco').value = data.logradouro + ', ' + data.numero + ', ' + data.bairro + ', ' + data.municipio + ' - ' + data.uf;
                        document.getElementById('abertura').value = data.abertura;
                        document.getElementById('situacao').value = data.situacao;
                        document.getElementById('tipo').value = data.tipo;
                        document.getElementById('fantasia').value = data.fantasia;
                        document.getElementById('porte').value = data.porte;
                        document.getElementById('natureza_juridica').value = data.natureza_juridica;
                        // ... e assim por diante para os outros campos
                    } else {
                        alert('Erro ao buscar dados do CNPJ: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Erro ao buscar dados do CNPJ:', error);
                });
        }
    </script>
    <!--LAST CNPJ-->



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
                    <div class="mb-3">
                      <label class="form-label" for="cpfcnpj" style="font-size: 0.9em;">CPF/CNPJ</label> 
                      <span style="color: red;">*</span>
                      <div  style="display: flex;">
                        <input type="text" id="cnpj" placeholder="CPF/CNPJ" class="form-control" name="cnpj" pattern="\d{14}" title="Digite um CNPJ com 14 dígitos numéricos" required>
                        <button type="button" class="btn btn-alt-primary" style="width: 200px; margin-left: 0.5em;" onclick="buscarCNPJ()">Buscar</button>  
                      </div>                   
                    </div>

                    <div class="mb-3 d-flex">
                      <span style="color: red;">*</span>
                      <input type="text" placeholder="Nome" class="form-control" id="nome" name="nome" readonly>
                      
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

                    <div class="mb-3">
                      <label class="form-label" for="atividade_principal">Atividade Principal:</label>
                      <input type="text" placeholder="Atividade Principal" class="form-control input-sm" id="atividade_principal" name="atividade_principal" readonly>
                    </div>

                    <div class="mb-3">
                      <label for="endereco">Endereço:</label>
                      <input type="text" placeholder="Endereço" class="form-control input-sm" id="endereco" name="endereco" readonly>
                    </div>

                    <div style="display: flex;">
                      <div class="mb-3" style="width: 50%;">
                        <label for="situcao" class="form-label">Data de Abertura</label>
                        <input type="text" placeholder="Data de Abertura" class="form-control input-sm" id="abertura" name="abertura" readonly>
                      </div>

                      <div class="mb-3" style="width: 50%; margin-right: 20px;">
                        <label for="situcao" class="form-label ms-3">Porte</label>
                        <input type="text" placeholder="Porte" class="form-control input-sm ms-3" id="porte" name="porte" readonly>
                      </div>
                    </div>

                    <div style="display: flex;">
                      <div class="mb-3" style="width: 50%;">
                        <label for="situcao" class="form-label">Situação</label>
                        <input type="text" placeholder="Situação" class="form-control input-sm" id="situacao" name="situacao" readonly>
                      </div>

                      <div class="mb-3" style="width: 50%; margin-right: 20px;">
                        <label for="tipo" class="form-label ms-3">Tipo</label>
                        <input type="text" placeholder="Tipo" class="form-control input-sm ms-3" id="tipo" name="tipo" readonly>
                      </div>
                    </div>
                    
                    <div class="mb-3">
                      <label for="fantasia" class="form-label">Nome Fantasia:</label>
                      <input type="text" placeholder="Nome Fantasia" class="form-control input-sm" id="fantasia" name="fantasia" readonly>
                    </div>

                    <div class="mb-3">
                      <label for="natureza_juridica">Natureza Jurídica:</label>
                      <input type="text" placeholder="Natureza Jurídica" class="form-control input-sm" id="natureza_juridica" name="natureza_juridica" readonly>
                    </div>

                    <!--div class="input-group mb-3">
                      <input type="text" class="form-control" id="telefone" name="telefone" style="font-size: 0.9em;" placeholder="Número">
                      
                      <input type="text" class="form-control ms-3" id="complemento" name="complemento" style="font-size: 0.9em;" placeholder="Complemento">
                    </div>

                    <div class="input-group mb-3">
                      <input name="bairro" placeholder="Bairro" type="text" id="bairro" class="form-control" size="40" />
                    </div>

                    <div style="display: flex; ">
                      <div class="input-group mb-3">
                        <input name="cidade" type="text" id="cidade" placeholder="Cidade" class="form-control" size="40" />
                      </div>

                      <div class="input-group mb-3">
                        <input name="uf" type="text" placeholder="UF" class="form-control ms-3" id="uf" size="2" />
                      </div>
                    </div>

                    <div class="input-group mb-3">
                      <input name="ibge" type="text" placeholder="IBGE" class="form-control" id="ibge" size="8" />
                    </div>

                    <div class="input-group mb-3">
                      <input name="rua" type="text" placeholder="Rua" class="form-control" id="rua" size="60" />
                    </div>

                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="uf" name="uf" style="font-size: 0.9em;" placeholder="UF">
                      
                      <input type="text" class="form-control ms-3" id="nascimento" name="nascimento" style="font-size: 0.9em;" placeholder="Nascimento">
                    </div>
                      
                    <input type="hidden" class="form-control ms-3" id="nivel" name="nivel" style="font-size: 0.9em;" placeholder="nivel" value="user"-->

                    <!--div class="input-group mb-3">
                      <input type="text" class="form-control" id="telefone" name="telefone" style="font-size: 0.9em;" placeholder="Número">
                      
                      <input type="text" class="form-control ms-3" id="complemento" name="complemento" style="font-size: 0.9em;" placeholder="Complemento">
                    </div>

                    <div class="input-group mb-3">
                      <input name="bairro" placeholder="Bairro" type="text" id="bairro" class="form-control" size="40" />
                    </div>

                    <div style="display: flex; ">
                      <div class="input-group mb-3">
                        <input name="cidade" type="text" id="cidade" placeholder="Cidade" class="form-control" size="40" />
                      </div>

                      <div class="input-group mb-3">
                        <input name="uf" type="text" placeholder="UF" class="form-control ms-3" id="uf" size="2" />
                      </div>
                    </div>

                    <div class="input-group mb-3">
                      <input name="ibge" type="text" placeholder="IBGE" class="form-control" id="ibge" size="8" />
                    </div>

                    <div class="input-group mb-3">
                      <input name="rua" type="text" placeholder="Rua" class="form-control" id="rua" size="60" />
                    </div>

                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="uf" name="uf" style="font-size: 0.9em;" placeholder="UF">
                      
                      <input type="text" class="form-control ms-3" id="nascimento" name="nascimento" style="font-size: 0.9em;" placeholder="Nascimento">
                    </div-->


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
    /*$cpf = addslashes($_POST['cpf']);
    $rg = addslashes($_POST['rg']);*/
    $cpfcnpj = addslashes($_POST['cpfcnpj']);
    $endereco = addslashes($_POST['endereco']);
    $telefone = addslashes($_POST['telefone']);
    $complemento = addslashes($_POST['complemento']);
    $bairro = addslashes($_POST['bairro']);
    $cidade = addslashes($_POST['cidade']);
    $uf = addslashes($_POST['uf']);
    $nascimento = addslashes($_POST['nascimento']);
    $nivel = addslashes($_POST['nivel']);
    

  try{
    $stmt = $conn->prepare("INSERT INTO logado (nome, email, senha, parceiro_colaborador, cpf, endereco, telefone, complemento, bairro, cidade, uf, nascimento, nivel) VALUES (:nome, :email, :senha, :parceiro_colaborador, :cpfcnpj, :endereco, :telefone, :complemento, :bairro, :cidade, :uf, :nascimento, :nivel)");
    $stmt->bindParam(':nome', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':parceiro_colaborador', $parceiro_colaborador);
    $stmt->bindParam(':cpfcnpj', $cpfcnpj);
    /*$stmt->bindParam(':rg', $rg);
    $stmt->bindParam('cep', $cep);*/
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
