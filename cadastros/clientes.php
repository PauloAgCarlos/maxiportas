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

    <title>MaxPortas</title>

    <meta name="description" content="MaxPortas">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="MaxPortas">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="MaxPortas">
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
    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" id="css-main" href="../assets/css/dashmix.min.css">

    <!--SwitAlert Success ao Cadastrar-->
    <script src="../assets/js/cdn.jsdelivr.net_npm_sweetalert2@11.0.18_dist_sweetalert2.all.min.js"></script>

    <!-- Last CEP -->

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
          <form action="clientes.php" method="POST" enctype="multipart/form-data">
            <div class="block">
              <div class="block-header block-header-default">
                <a class="btn btn-alt-secondary" href="clientes.php">
                  Cadastro de Cliente
                </a>
                <a class="btn btn-alt-secondary" href="visualizar_clientes.php">
                  <i class="fa fa-arrow-left me-1"></i> Visualizar Clientes
                </a>
              </div>
              <div class="block-content" >
                <div class="row justify-content-center push">
                  <div class="col-md-6">
                    
                    <div class="mb-3">
                      <label class="form-label" for="cpfcnpj" style="font-size: 0.9em;">CPF/CNPJ</label> 
                      <span style="color: red;">*</span>
                      <div  style="display: flex;">
                        <input type="text" id="cnpj" placeholder="CPF/CNPJ" class="form-control" name="cnpj" pattern="\d{14}" title="Digite um CNPJ com 14 dígitos numéricos" required>
                        <button type="button" class="btn btn-alt-primary" style="width: 200px; margin-left: 0.5em;" onclick="buscarCNPJ()">Buscar (CNPJ)</button>  
                      </div>                   
                    </div>
                    
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="nomerazaosocial">Nome<span style="color: red;">*</span> </label>
                      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome/Razão social" style="font-size: 0.9em;" required>
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="contato">Contato</label>
                      <input type="text" class="form-control" id="contato" name="contato" placeholder="Contato" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="telefone">Telefone </label>
                      <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="celular">Celular </label>
                      <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="email">Email </label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="senha">Senha </label>
                      <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" style="font-size: 0.9em;">
                    </div>                   
                  </div>

                  <div class="col-md-6">
                    <div class="mb-4">
                      <label>CEP (apenas números)</label>
                      <input type="text" name="cep" id="cep" class="form-control" placeholder="" required size="10" maxlength="8" onblur="pesquisacep(this.value);">
                    </div>

                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="rua">Rua </label>
                      <input type="text" name="rua" id="rua" class="form-control" placeholder="" required>
                    </div>

                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="complemento">Complemento </label>
                      <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento" style="font-size: 0.9em;">
                    </div>

                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="bairro">Bairro </label>
                      <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" style="font-size: 0.9em;">
                    </div>

                    <div class="mb-1">
                      <label>Estado</label>
                      <input type="text" name="uf" id="uf" class="form-control" placeholder="" required>
                    </div>

                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="cidade">Cidade </label>
                      <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" style="font-size: 0.9em;">
                    </div>
                    <div class="mb-1">
                      <label class="form-label"  style="font-size: 0.9em;" for="estado">Estado </label>
                      <select name="estado" id="estado" class="form-control" style="font-size: 0.9em;">
                        <option placeholder="Selecione...">Selecione...</option>
                        <option placeholder="Selecione...">Estado 1</option>
                        <option placeholder="Selecione...">Estado 2</option>
                        <option placeholder="Selecione...">Estado 3</option>
                        <option placeholder="Selecione...">Estado 4</option>
                      </select>
                    </div>                   
                  </div>
                </div>
              </div>
              <div class="block-content bg-body-light">
                <div class="row justify-content-center push">
                  <div class="col-md-10">
                    <button type="submit" name="btn_cadastrar_clientes" class="btn btn-alt-primary">
                      <i class="fa fa-fw fa-check opacity-50 me-1"></i> Cadastrar Cliente
                    </button>
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

      <?php require_once "../template/footer.php"; ?>
    </div>
    <!-- END Page Container -->

    <!--Evitar Reenvio de Form-->
    <script src="../assets/js/evitar_reenvio_form.js"></script>


    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


  <script>

    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('complemento').value=("");
    }

    function meu_callback(conteudo) {
      console.log(conteudo)
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('complemento').value=(conteudo.complemento);
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
                document.getElementById('complemento').value="...";

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

  </body>
</html>

<?php include_once "cadastrar_clientes.php"; ?>