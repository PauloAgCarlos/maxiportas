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

    <title>HJAlúminio</title>

    <meta name="description" content="HJAlúminio">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="HJAlúminio">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="HJAlúminio">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <link rel="shortcut icon" href="../assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <link rel="stylesheet" id="css-main" href="../assets/css/dashmix.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!--script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script-->

    
    <!--SwitAlert Success ao Atualizar-->
    <script src="../assets/js/cdn.jsdelivr.net_npm_sweetalert2@11.0.18_dist_sweetalert2.all.min.js"></script>

  </head>
  <body>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">

      <?php require_once "../template/sidebar.php" ?>

      <?php require_once "../template/header.php" ?>
      

      <!-- Main Container -->
      <main id="container" style="margin-top: 100px;">

        <!-- Page Content -->
        <div class="content">

          <!-- Latest Orders + Stats -->
          <div class="row">
            <div class="col-md-12">
              <!--  Latest Orders -->

              <div class="block block-rounded block-mode-loading-refresh">
                <div class="block-header block-header-default">
                  <h3 class="block-title">
                    Ordem de Produção
                  </h3>
                </div>
                <div class="table-responsiveA">
                <!-- <form action="recebe_ordem.php" method="post"> -->
                  <div style="margin: 5px; display: flex; justify-content: space-between;">
                    <button style="border-radius: 5px; border: 1px solid #ccc; background-color: transparent; padding: 5px 16px;"><a href="dashboard.php" style="color: #1d1d1d; font-size: 0.9em;">Voltar</a></button>

                    <div>                    
                        <!-- <button type="submit" name="btn_incluir" style="border-radius: 20px; border: 1px solid #ccc; background-color: transparent; padding: 5px 16px;">    <a href="ordem_producao.php" style="color: #1d1d1d; font-size: 0.9em;">Incluir</a>
                        </button> -->                        
                        <form action="pdf_ordemProducao.php" target="_blank" method="post">
                            <!-- <php $id_unik = uniqid(); ?> -->
                                <?php $name_admin = $row['nome']; ?>
                            <input type="hidden" name="admin" value="<?php echo $row['nome']; ?>">
                            <input type="hidden" name="id_ordemProducao" id="idDoForm1" value="<?php if(!empty($_GET['id_filter'])){ echo $_GET['id_filter'];} ?>" >
                            <div class="btn-group"> 
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 20px; border: 1px solid #ccc; background-color: transparent; padding: 5px 0 5px 16px;">
                                <a style="color: #1d1d1d; font-size: 0.9em;"  style="text-decoration: none;"  href="#" role="button" aria-expanded="false">Imprimir <img src="../assets/img/icons8-ordem-descendente-24.png" width="16px" alt=""></a>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <button class="dropdown-item" type="submit" name="btn_submit" value="Ficha de Corte">Ficha de Corte (Vidro)</button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" type="submit" name="btn_submit" value="Sintético - Cliente">Sintético - Cliente</button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" type="submit" name="btn_submit" value="Sintético 3 - Cliente">Sintético 3 - Cliente</button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" type="submit" name="btn_submit" value="Sintético 3 - Sem Valor">Sintético 3 - Sem Valor</button>
                                    </li>
                                    <li style="width: 100%;"><hr class="dropdown-divider" style="color: black; padding: 1px;"></li>
                                    <li>
                                        <button class="dropdown-item" type="submit" name="btn_submit" value="Relátorio de Vendas (OP)">Relátorio de Vendas (OP)</button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" type="submit" name="btn_submit" value="Relátorio para Entrega Por Cliente">Relátorio para Entrega Por Cliente</button>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                    <form action="recebe_ordem.php" method="post">
                    <?php $id_unik = uniqid(); ?>
                    <input type="hidden" name="id_unik" value="<?php echo $id_unik; ?>">
                    <input type="hidden" name="imagem_perfil" value="">
                    <button type="submit" name="btn_incluir" style="border-radius: 20px; border: 1px solid #ccc; background-color: transparent; padding: 5px 16px;">    
                        <span style="color: #1d1d1d; font-size: 0.9em;">Incluir</span>
                    </button>
                  </div>
                  <section style="padding-bottom: 10px;">

                    <hr style="width: 99%; margin: auto; margin-bottom: 10px;">
                    <div class="row" style="font-size: 0.9em; border: 1px solid #ddd; border-radius: 5px; width: 99%; margin: auto;">
                        <div class="col-md-2">OP
                            <?php

                                require_once "../config.php";
                                $conn = new mysqli($DBHOST, $DBUSER, $DBPASS, $DBNAME);
                                
                                $sql_select = "SELECT * FROM tbl_ordem_producao ORDER BY ABS(op) DESC LIMIT 1";
                                $result = $conn->query($sql_select);
                                if ($result->num_rows > 0) {
                                
                                    $row = $result->fetch_assoc();
                                    $novo_valor = $row['op'] + 1;                            

                                    echo '<br><input name="op" style="border: none;" type="text" value="' . $novo_valor . '" />';
                                } else {
                                    echo  "<br>"."Nenhum registro encontrado na tabela.";
                                }
                            
                            ?>
                        </div>
                        <div class="col-md-2">Parceiro <span style="color: #f00;">*</span>
                            <!-- <form action="" method="post"> -->
                                <select name="" id="" class="form-control" required style="font-size: 1em;">
                                    <option value="">Selecione um parceiro</option>
                                    <option value="Alúminios">HJ Alúminios</option>
                                </select>
                            <!-- </form> -->
                        </div>
                        <div class="col-md-3">Cliente
                            <div  style="display: flex; justify-content: space-between">
                                <input type="text" readonly class="form-control mb-2" id="selectedNameInput" name="cliente" style="border: none; background-color: white; width: 100%;">
                                <?php
                                    echo "
                                        <button class='btn' type='button' class='ms-1' id='openModalBtn' style='Amargin-right: 15px; border: none; background-color: transparent; border-radius: 1000px; width: 5px;'>
                                            <img src='../assets/svg/icons8-pesquisar.svg' width='25px' alt=''>
                                        </button>"
                                    ;
                                ?>
                            </div>
                        </div>

                        <!-- O modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Clientes Registados no Sistema</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Campo de pesquisa com autocompletar >
                                <label for="searchInput" class="form-label">Pesquisar:</label-->
                                <input type="text" id="searchInput" class="form-control" placeholder="Digite para pesquisar...">
                                <ul id="databaseNamesList" class="list-group mt-2">
                                <!-- Lista de nomes do banco de dados será exibida aqui -->
                                </ul>
                            </div>
                            </div>
                        </div>
                        </div>

                        <script src="scriptAutoComplet.js"></script>



                        <div class="col-md-3">Nome Consumidor
                            <!-- <form action="" method="post"> -->
                                <input type="text" class="form-control" style="font-size: 1em;" name="name_consumidor">
                            <!-- </form> -->
                        </div>
                        <div class="col-md-2">Orçamento
                            <!-- <form action="" method="post"> -->
                                <select name="" id="" class="form-control" style="font-size: 1em;">
                                    <option selected>Selecione</option>
                                    <option value="Orçamento">Orçamento</option>
                                    <option value="Pedido">Pedido</option>
                                </select>
                            <!-- </form> -->
                        </div>
                    </div>
                  </section>

                  <section>
                    <ul class="nav nav-tabs" id="myTab" role="tablist" style="font-size: 0.9em;">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Portas/Vidros</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Produtos</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Valores</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="outros-valores-tab" data-bs-toggle="tab" data-bs-target="#outros-valores" type="button" role="tab" aria-controls="outros-valores" aria-selected="true">Outros/Valores</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="observacoes-tab" data-bs-toggle="tab" data-bs-target="#observacoes" type="button" role="tab" aria-controls="observacoes" aria-selected="false">Observações da OP</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="aprocacoes-clientes-tab" data-bs-toggle="tab" data-bs-target="#aprocacoes-clientes" type="button" role="tab" aria-controls="aprocacoes-clientes" aria-selected="false">Aprovações Clientes</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="aprovacoes-parceiro-tab" data-bs-toggle="tab" data-bs-target="#aprovacoes-parceiro" type="button" role="tab" aria-controls="aprovacoes-parceiro" aria-selected="false">Aprovações Parceiro</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="aprovacoes-fabrica-tab" data-bs-toggle="tab" data-bs-target="#aprovacoes-fabrica" type="button" role="tab" aria-controls="aprovacoes-fabrica" aria-selected="false">Aprovações Fábrica</button>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">
                                    Portas/Vidros
                                </h3>
                            </div>

                            <section>
                                <ul class="nav nav-tabs" id="myTab" role="tablist" style="font-size: 0.9em;">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="dadostecnicos-tab" data-bs-toggle="tab" data-bs-target="#dadostecnicos" type="button" role="tab" aria-controls="dadostecnicos" aria-selected="true">Dados Técnicos</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="outrasinformacoes-tab" data-bs-toggle="tab" data-bs-target="#outrasinformacoes" type="button" role="tab" aria-controls="outrasinformacoes" aria-selected="false">Outras Informações</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="dadostecnicos" role="tabpanel" aria-labelledby="dadostecnicos-tab" style="padding: 10px; ">
                                        <div style="border: 1px solid #ddd; padding: 10px;">
                                            <div class="row">
                                                <div class="col-md-3">Modo <span style="color: #f000;">*</span>
                                                    <select class="form-control" name="modo" id="">
                                                        <option value="Porta">Porta</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-3">Qtd <span style="color: #f000;">*</span>
                                                    <input type="number" name="qtd" id="" required value="1" class="form-control">
                                                </div>

                                                <div class="col-md-3">Altura (mm)
                                                    <input type="number" name="altura" required value="0" class="form-control">
                                                </div>

                                                <div class="col-md-3">Largura (mm)
                                                    <input type="number" required name="largura" id="" value="0" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-2" style="border: 1px solid #ddd;">
                                            
                                            <div class="row">
                                                <div class="col-md-3" style="padding: 0 0 0 14px; border-right: 1px solid #ddd;">
                                                    <div class="block-headerA Ablock-header-default mb-1" style="background-color: #33cc66;">
                                                        <h3 class="block-title">
                                                            Lado Esquerdo
                                                        </h3>
                                                    </div>
                                                    <div class="p-2">
                                                        <label for="">Perfil <span style="color: #f000;">*</span></label>
                                                        <div style="display: flex; justify-content: space-around">
                                                            <input type="text" id="id_perfilAdd" readonly class="form-control mb-2 descriptionInput" name="perfil_lado_esquerdo" placeholder="0" oninput="verificarValor()">
                                                            <?php
                                                                echo "
                                                                    <button class='btn' id='openModalButton' type='button' class='ms-1' style='margin-right: 15px; border: none; background-color: transparent; border-radius: 1000px; width: 5px;' onclick='abrirModalPerfil(2)' data-toggle='modal' data-target='#myModalPerfil'>
                                                                        <img src='../assets/svg/icons8-pesquisar.svg' width='25px' alt=''>
                                                                    </button>"
                                                                ;
                                                            ?>

                                                        </div>
                                                        <div>
                                                            <img class="responseImage" alt="Imagem" id="minhaImagem" style="display: none; width: 150px; margin: auto; height: 135px;" >
                                                            <script>
                                                                function verificarValor() {
                                                                    const input = document.getElementById('meuInput');
                                                                    const imagem = document.getElementById('minhaImagem');

                                                                    if (input.value !== '') {
                                                                        imagem.style.display = 'block'; // Se houver valor, mostra a imagem
                                                                    } else {
                                                                        imagem.style.display = 'none'; // Se não houver valor, esconde a imagem
                                                                    }
                                                                }
                                                            </script>
                                                        </div>
                                                    </div>


                                                  <!-- Modal Perfil -->
                                                    <div class="modal fade" id="myModalPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                            <div class="modal-header" style="background-color: #33cc66;">
                                                                <h5 class="modal-title" id="exampleModalLabel">Perfies Registados no Sistema</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModalButton"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table style="width: 100%;">
                                                                    <thead style="background-color: #33cc66; width: 100%;">
                                                                        <tr>
                                                                            <th>ID</th>
                                                                            <th>Descrição</th>
                                                                            <th>Foto</th>
                                                                        </tr>
                                                                    </thead>

                                                                    <tbody>                                                                        
                                                                        <?php
                                                                            $conn = new mysqli($DBHOST, $DBUSER, $DBPASS, $DBNAME);
                                                                            $query = 'SELECT * FROM perfil';
                                                                            $result = $conn->query($query);

                                                                            if ($result->num_rows > 0) {
                                                                                while ($row = $result->fetch_assoc()) {
                                                                        ?>
                                                                        
                                                                            <tr id="numberList">
                                                                                <td>
                                                                                    <a data-bs-dismiss="modal"  href="javascript:void(0);" data-number="<?php echo $row['id']; ?>"><?php echo $row['id'] ?></a>
                                                                                </td>
                                                                                <td>
                                                                                    <a data-bs-dismiss="modal"  href="javascript:void(0);" data-number="<?php echo $row['id']; ?>"><?php echo $row['descricao'] ?></a>
                                                                                </td>
                                                                                <td>
                                                                                    <img style="float: right;" src="../perfil/<?php echo $row['imagem'] ?>" width="90px" height="90px" alt="">
                                                                                </td>
                                                                            </tr>
                                                                            <?php    
                                                                                }
                                                                            }
                                                                        ?>
                                                                        </tbody>
                                                                </table>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <script>
                                                        let activeInputs = null;
                                                        let activeImages = null;

                                                        // Função para fazer a requisição AJAX
                                                        function fetchData(id) {
                                                            const url = `https://hjaluminio.com.br/sistema/api/public_html/api/user/${id}`;

                                                            fetch(url)
                                                                .then(response => response.json())
                                                                .then(data => {
                                                                    console.log(data)
                                                                    data = data.data;
                                                                    const { descricao, imagem } = data;

                                                                    activeInputs.forEach(input => {
                                                                        input.value = descricao;
                                                                    });

                                                                    activeImages.forEach(image => {
                                                                        image.src = `https://hjaluminio.com.br/sistema/perfil/${imagem}`;
                                                                        image.style.display = "block";
                                                                    });

                                                                    // Atualiza o campo de input do formulário com a URL da imagem
                                                                    document.querySelector('input[name="imagem_perfil"]').value = `https://hjaluminio.com.br/sistema/perfil/${imagem}`;

                                                                    document.getElementById("modal").style.display = "none";
                                                                })
                                                                .catch(error => {
                                                                    console.error("Erro na requisição:", error);
                                                                });
                                                        }


                                                        // Abrir o modal quando o botão é clicado
                                                        document.getElementById("openModalButton").addEventListener("click", function() {
                                                            activeInputs = document.querySelectorAll(".descriptionInput");
                                                            activeImages = document.querySelectorAll(".responseImage");
                                                            document.getElementById("modal").style.display = "block";
                                                        });

                                                        // Fechar o modal quando o botão "Fechar Modal" é clicado
                                                        document.getElementById("closeModalButton").addEventListener("click", function() {
                                                            activeInputs = null;
                                                            activeImages = null;
                                                            document.getElementById("modal").style.display = "none";
                                                        });

                                                        // Adicionar um evento de clique a cada link na lista
                                                        const numberLinks = document.querySelectorAll("#numberList a");
                                                        numberLinks.forEach(link => {
                                                            link.addEventListener("click", function(event) {
                                                                event.preventDefault();
                                                                const number = link.getAttribute("data-number");
                                                                fetchData(number);
                                                            });
                                                        });
                                                    </script>






                                                    <script>
                                                        function abrirModalPerfil(idProdutoPerfil) {
                                                            idProdutoPerfilParaExcluir = idProdutoPerfil;
                                                            const modal = new bootstrap.Modal(document.getElementById('myModalPerfil'), {});
                                                            modal.show();
                                                        }
                                                        </script>
                                                    
                                                    <div class="p-2">
                                                        <label for="">Usinagem Para<span style="color: #f000;">*</span></label>
                                                        <select class="form-control mb-2" name="usinagem_para_esquerdo" id="">
                                                            <option selected value="">Selecione</option>
                                                            <option value="Dobradiça">Dobradiça</option>
                                                            <option value="Sem Usinagem">Sem Usinagem</option>
                                                        </select>
                                                    </div>

                                                    <div class="p-2">
                                                        <label for="">Puxador</label>
                                                        <select class="form-control mb-2" name="puxador_esquerdo" id="">
                                                            <option selected value="">Selecione</option>
                                                            <?php
                                                                require_once "../config.php";
                                                                $pdo = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
                                                                
                                                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                                $selecionar_servicos = $pdo->prepare("SELECT descricao FROM puxadores");
                                                                $selecionar_servicos->execute();
                                                                while($row_servicos = $selecionar_servicos->fetch()){
                                                            ?>
                                                                <option value="<?php echo $row_servicos['descricao'] ?>"><?php echo $row_servicos['descricao'] ?></option>

                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-3" style="padding: 0; border-right: 1px solid #ddd;">
                                                    <div class="mb-1" style="background-color: #33cc66;">
                                                        <h3 class="block-title">
                                                            Lado Direito
                                                        </h3>
                                                    </div>
                                                    <div class="p-2">
                                                        <label for="">Perfil <span style="color: #f000;">*</span></label>
                                                        <div style="display: flex; justify-content: space-around">
                                                            <input type="text" readonly id="id_perfilAddA" class="form-control mb-2 descriptionInput" name="perfil_lado_direito" placeholder="0">
                                                        </div>

                                                        <div>
                                                            <img class="responseImage" alt="Imagem" id="minhaImagem" style="display: none; width: 150px; margin: auto; height: 135px;" >
                                                            <script>
                                                                function verificarValor() {
                                                                    const input = document.getElementById('meuInput');
                                                                    const imagem = document.getElementById('minhaImagem');

                                                                    if (input.value !== '') {
                                                                        imagem.style.display = 'block'; // Se houver valor, mostra a imagem
                                                                    } else {
                                                                        imagem.style.display = 'none'; // Se não houver valor, esconde a imagem
                                                                    }
                                                                }
                                                            </script>
                                                        </div>
                                                        
                                                    </div>

                                                    <div class="p-2">
                                                        <label for="">Usinagem Para <span style="color: #f000;">*</span></label>
                                                        <select class="form-control mb-2" name="usinagem_para_direito" id="">
                                                            <option selected value="">Selecione</option>
                                                            <option value="Dobradiça">Dobradiça</option>
                                                            <option value="Sem Usinagem">Sem Usinagem</option>
                                                        </select>
                                                    </div>

                                                    <div class="p-2">
                                                        <label for="">Puxador</label>
                                                        <select class="form-control mb-2" name="puxador_direito" id="">
                                                        <option selected value="">Selecione</option>
                                                            <?php
                                                                require_once "../config.php";
                                                                $pdo = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
                                                                
                                                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                                $selecionar_servicos = $pdo->prepare("SELECT descricao FROM puxadores");
                                                                $selecionar_servicos->execute();
                                                                while($row_servicos = $selecionar_servicos->fetch()){
                                                            ?>
                                                                <option value="<?php echo $row_servicos['descricao'] ?>"><?php echo $row_servicos['descricao'] ?></option>

                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-3" style="padding: 0; border-right: 1px solid #ddd;">
                                                    <div class="block-headerA Ablock-header-default mb-1" style="background-color: #33cc66;">
                                                        <h3 class="block-title">
                                                            Lado Superior
                                                        </h3>
                                                    </div>
                                                    <div class="p-2">
                                                        <label for="">Perfil <span style="color: #f000;">*</span></label>
                                                        <input type="text" readonly class="form-control mb-2 descriptionInput" name="perfil_lado_superior" placeholder="0">
                                                    </div>
                                                    <div>
                                                            <img class="responseImage" alt="Imagem" id="minhaImagem" style="display: none; width: 150px; margin: auto; height: 135px;" >
                                                            <script>
                                                                function verificarValor() {
                                                                    const input = document.getElementById('meuInput');
                                                                    const imagem = document.getElementById('minhaImagem');

                                                                    if (input.value !== '') {
                                                                        imagem.style.display = 'block'; // Se houver valor, mostra a imagem
                                                                    } else {
                                                                        imagem.style.display = 'none'; // Se não houver valor, esconde a imagem
                                                                    }
                                                                }
                                                            </script>
                                                        </div>

                                                    <div class="p-2">
                                                        <label for="">Usinagem Para <span style="color: #f000;">*</span></label>
                                                        <select class="form-control mb-2" name="usinagem_para_superior" id="">
                                                            <option selected value="">Selecione</option>
                                                            <option value="Dobradiça">Dobradiça</option>
                                                            <option value="Sem Usinagem">Sem Usinagem</option>
                                                        </select>
                                                    </div>

                                                    <div class="p-2">
                                                        <label for="">Puxador</label>
                                                        <select class="form-control mb-2" name="puxador_superior" id="">
                                                        <option selected value="">Selecione</option>
                                                            <?php
                                                                require_once "../config.php";
                                                                $pdo = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
                                                                
                                                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                                $selecionar_servicos = $pdo->prepare("SELECT descricao FROM puxadores");
                                                                $selecionar_servicos->execute();
                                                                while($row_servicos = $selecionar_servicos->fetch()){
                                                            ?>
                                                                <option value="<?php echo $row_servicos['descricao'] ?>"><?php echo $row_servicos['descricao'] ?></option>

                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-3" style="padding: 0 12px 0 0; border-right: 1px solid #ddd;">
                                                    <div class="block-headerA Ablock-header-default mb-1" style="background-color: #33cc66;">
                                                        <h3 class="block-title">
                                                            Lado Inferior
                                                        </h3>
                                                    </div>
                                                    <div class="p-2">
                                                        <label for="">Perfil <span style="color: #f000;">*</span></label>
                                                        <input type="text" readonly class="form-control mb-2 descriptionInput" name="perfil_lado_inferior" placeholder="0">

                                                    </div>
                                                    <div>
                                                            <img class="responseImage" alt="Imagem" id="minhaImagem" style="display: none; width: 150px; margin: auto; height: 135px;" >
                                                            <script>
                                                                function verificarValor() {
                                                                    const input = document.getElementById('meuInput');
                                                                    const imagem = document.getElementById('minhaImagem');

                                                                    if (input.value !== '') {
                                                                        imagem.style.display = 'block'; // Se houver valor, mostra a imagem
                                                                    } else {
                                                                        imagem.style.display = 'none'; // Se não houver valor, esconde a imagem
                                                                    }
                                                                }
                                                            </script>
                                                        </div>

                                                    <div class="p-2">
                                                        <label for="">Usinagem Para <span style="color: #f000;">*</span></label>
                                                        <select class="form-control mb-2" name="usinagem_para_inferior" id="">
                                                            <option selected value="">Selecione</option>
                                                            <option value="Dobradiça">Dobradiça</option>
                                                            <option value="Sem Usinagem">Sem Usinagem</option>
                                                        </select>
                                                    </div>

                                                    <div class="p-2">
                                                        <label for="">Puxador</label>
                                                        <select class="form-control mb-2" name="puxador_inferior" id="">
                                                        <option selected value="">Selecione</option>
                                                            <?php
                                                                require_once "../config.php";
                                                                $pdo = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
                                                                
                                                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                                $selecionar_servicos = $pdo->prepare("SELECT descricao FROM puxadores");
                                                                $selecionar_servicos->execute();
                                                                while($row_servicos = $selecionar_servicos->fetch()){
                                                            ?>
                                                                <option value="<?php echo $row_servicos['descricao'] ?>"><?php echo $row_servicos['descricao'] ?></option>

                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-2" style="border: 1px solid #ddd;">
                                            
                                            <div class="row">
                                                <div class="col-md-12" style="padding: 0 12px 0 12px; border-right: 1px solid #ddd;">
                                                    <div class="ps-4 mb-1" style="background-color: #33cc66;">
                                                        <h3 class="block-title">
                                                            Vidros
                                                        </h3>
                                                    </div>
                                                    <div class="p-2" style="width: 280px;">
                                                        <label for="">Vidro</label>
                                                        <select name="vidro" class="form-control" id="vidro">
                                                            <option selected value="">Selecione</option>
                                                            <?php
                                                                require_once "../config.php";
                                                                $pdo = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
                                                                
                                                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                                $selecionar_vidros = $pdo->prepare("SELECT descricao FROM vidros");
                                                                $selecionar_vidros->execute();
                                                                while($row_vidros = $selecionar_vidros->fetch()){
                                                            ?>
                                                                <option value="<?php echo $row_vidros['descricao'] ?>"><?php echo $row_vidros['descricao'] ?></option>

                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>                                                
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-3 form-check form-switch" style="padding-left: 70px; margin-top: 5px;">
                                                    <input class="form-check-input" type="checkbox" value="1" id="tv" name="tv">
                                                    <label class="form-check-label" for="tv">TV</label>
                                                </div> 
                                            </div>
                                        </div>

                                        <div class="mt-2" style="border: 1px solid #ddd;">
                                            <div class="row">
                                                <div class="col-md-12" style="padding: 0 12px 0 12px; border-right: 1px solid #ddd;">
                                                    <div class="ps-4 mb-1" style="background-color: #33cc66;">
                                                        <h3 class="block-title">
                                                            Serviços
                                                        </h3>
                                                    </div>
                                                    <div class="p-2" style="width: 280px;">
                                                        <select name="servicos" class="form-control" id="servicos">
                                                            <option selected value="">Selecione</option>
                                                            <?php
                                                                require_once "../config.php";
                                                                $pdo = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
                                                                
                                                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                                $selecionar_servicos = $pdo->prepare("SELECT descricao FROM servicos");
                                                                $selecionar_servicos->execute();
                                                                while($row_servicos = $selecionar_servicos->fetch()){
                                                            ?>
                                                                <option value="<?php echo $row_servicos['descricao'] ?>"><?php echo $row_servicos['descricao'] ?></option>

                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>                                                
                                            </div>
                                        </div>

                                        <div class="mt-2" style="border: 1px solid #ddd;">
                                            <div class="row">
                                                <div class="col-md-12" style="padding: 0 12px 0 12px; border-right: 1px solid #ddd;">
                                                    <div class="ps-4 mb-1" style="background-color: #33cc66;">
                                                        <h3 class="block-title">
                                                            Travessa
                                                        </h3>
                                                    </div>
                                                    <div class="p-2" style="width: 280px;">
                                                        <label for="">Sentido da Travessa</label>
                                                        <select name="travessa" class="form-control" id="travessa">
                                                            <option selected value="">Selecione</option>
                                                            <?php
                                                                require_once "../config.php";
                                                                $pdo = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
                                                                
                                                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                                $selecionar_travessas = $pdo->prepare("SELECT descricao FROM travessas");
                                                                $selecionar_travessas->execute();
                                                                while($row_travessas = $selecionar_travessas->fetch()){
                                                            ?>
                                                                <option value="<?php echo $row_travessas['descricao'] ?>"><?php echo $row_travessas['descricao'] ?></option>

                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>                                                
                                            </div>
                                        </div>

                                        <div class="mt-2" style="border: 1px solid #ddd;">
                                            
                                            <div class="ps-4 mb-1" style="background-color: #33cc66;">
                                                <h3 class="block-title">
                                                    Outros
                                                </h3>
                                            </div>
                                            <div class="row">
                                                <!--div class="col-md-2">
                                                    <div>
                                                        <label for="">Portas Pares</label>
                                                        <select class="form-control mb-2" name="portas_pares" id="">
                                                            <option value="">Selecione</option>
                                                        </select>
                                                    </div>
                                                </div-->
                                                
                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="">Reforço</label>
                                                        <select class="form-control mb-2" name="reforco" id="">
                                                            <option selected value="">Selecione</option>
                                                            <option value="Superior">Superior</option>
                                                            <option value="Inferior">Inferior</option>
                                                            <option value="Centralizado">Centralizado</option>
                                                            <option value="Direito">Direito</option>
                                                            <option value="Esquerdo">Esquerdo</option>
                                                            <option value="Superior e Inferior">Superior e Inferior</option>
                                                            <option value="Direito e Esquerdo">Direito e Esquerdo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-2 form-check form-switch" style="padding-left: 70px; margin-top: 19px;">
                                                    <input class="form-check-input" type="checkbox" value="1" id="desempenador" name="desempenador">
                                                    <label class="form-check-label" for="desempenador">Desempenador</label>
                                                </div> 

                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="">Esquadreta</label>
                                                        <select name="esquadreta" class="form-control" id="esquadreta">
                                                            <option selected value="">Selecione</option>
                                                            <?php
                                                                require_once "../config.php";
                                                                $pdo = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
                                                                
                                                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                                $selecionar_esquadretas = $pdo->prepare("SELECT descricao FROM esquadretas");
                                                                $selecionar_esquadretas->execute();
                                                                while($row_esquadretas = $selecionar_esquadretas->fetch()){
                                                            ?>
                                                                <option value="<?php echo $row_esquadretas['descricao'] ?>"><?php echo $row_esquadretas['descricao'] ?></option>

                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="">Ponteira</label>
                                                        <select class="form-control mb-2" name="ponteira" id="">
                                                            <option selected value="">Selecione uma Ponteira</option>
                                                            <?php
                                                                require_once "../config.php";
                                                                $pdo = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
                                                                
                                                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                                $selecionar_esquadretas = $pdo->prepare("SELECT descricao FROM acessorios");
                                                                $selecionar_esquadretas->execute();
                                                                while($row_esquadretas = $selecionar_esquadretas->fetch()){
                                                            ?>
                                                                <option value="<?php echo $row_esquadretas['descricao'] ?>"><?php echo $row_esquadretas['descricao'] ?></option>

                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="kit">Kit</label>
                                                        <select class="form-control mb-2" name="kit" id="">
                                                            <option selected value="">Escolha um kit</option>
                                                            <?php
                                                                require_once "../config.php";
                                                                $pdo = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
                                                                
                                                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                                $selecionar_esquadretas = $pdo->prepare("SELECT descricao FROM acessorios");
                                                                $selecionar_esquadretas->execute();
                                                                while($row_esquadretas = $selecionar_esquadretas->fetch()){
                                                            ?>
                                                                <option value="<?php echo $row_esquadretas['descricao'] ?>"><?php echo $row_esquadretas['descricao'] ?></option>

                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--div class="mt-2" style="border: 1px solid #ddd;">
                                            <div class="ps-4 mb-1" style="background-color: #33cc66;">
                                                <h3 class="block-title">
                                                    Valores Consumidor
                                                </h3>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div>
                                                        <label for="valoritem-cliente">Valor Item - Cliente</label>
                                                        <input type="number" class="form-control mb-2" name="valoritem-cliente" id="" placeholder="0,00">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div>
                                                        <label for="desconto">% Desconto</label>
                                                        <input type="number" class="form-control mb-2" name="desconto" id="" placeholder="0,00">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div>
                                                        <label for="desconto2">Desconto</label>
                                                        <input type="number" class="form-control mb-2" name="desconto2" id="" placeholder="0,00">
                                                    </div>
                                                </div>
                                            </div> >
                                        </div-->

                                        <div class="mt-2" style="border: 1px solid #ddd;">
                                            <div class="ps-4 mb-1" style="background-color: #33cc66;">
                                                <h3 class="block-title">
                                                    Valores Cliente
                                                </h3>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div>
                                                        <label for="valoritem-cliente">Valor Item - Cliente</label>
                                                        <input type="number" class="form-control mb-2" name="portas_valor_item_cliente" id="" placeholder="0,00">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div>
                                                        <label for="desconto">% Desconto</label>
                                                        <input type="number" class="form-control mb-2" name="porcento_desconto" id="" placeholder="0,00">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div>
                                                        <label for="desconto2">Desconto</label>
                                                        <input type="number" class="form-control mb-2" name="desconto" id="" placeholder="0,00">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--div class="mt-2" style="border: 1px solid #ddd;">
                                            <div class="ps-4 mb-1" style="background-color: #33cc66;">
                                                <h3 class="block-title">
                                                    Valores Parceiro
                                                </h3>
                                            </div>
                                            <-- <div class="row">
                                                <div class="col-md-4">
                                                    <div>
                                                        <label for="valoritem-cliente">Valor Item - Cliente</label>
                                                        <input type="number" class="form-control mb-2" name="valoritem-cliente" id="" placeholder="0,00">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div>
                                                        <label for="desconto">% Desconto</label>
                                                        <input type="number" class="form-control mb-2" name="desconto" id="" placeholder="0,00">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div>
                                                        <label for="desconto2">Desconto</label>
                                                        <input type="number" class="form-control mb-2" name="desconto2" id="" placeholder="0,00">
                                                    </div>
                                                </div>
                                            </div> 
                                        </div--

                                        <div class="mt-2" style="border: 1px solid #ddd;">
                                            <div class="ps-4 mb-1" style="background-color: #33cc66;">
                                                <h3 class="block-title">
                                                    Valores Fábrica
                                                </h3>
                                            </div>
                                            <-- <div class="row">
                                                <div class="col-md-4">
                                                    <div>
                                                        <label for="valoritem-cliente">Valor Item - Cliente</label>
                                                        <input type="number" class="form-control mb-2" name="valoritem-cliente" id="" placeholder="0,00">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div>
                                                        <label for="desconto">% Desconto</label>
                                                        <input type="number" class="form-control mb-2" name="desconto" id="" placeholder="0,00">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div>
                                                        <label for="desconto2">Desconto</label>
                                                        <input type="number" class="form-control mb-2" name="desconto2" id="" placeholder="0,00">
                                                    </div>
                                                </div>
                                            </div> ->
                                        </div-->
                                        
                                    </div>

                                    <div class="tab-pane fade" id="outrasinformacoes" role="tabpanel" aria-labelledby="outrasinformacoes-tab">...</div>
                                    
                                </div>
                            </section>
                        </div>

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="padding: 10px;">

                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">
                                    Item
                                </h3>
                            </div>

                            <section>
                                <ul class="nav nav-tabs" id="myTab" role="tablist" style="font-size: 0.9em;">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="dadostecnicos-tab" data-bs-toggle="tab" data-bs-target="#dadostecnicos" type="button" role="tab" aria-controls="dadostecnicos" aria-selected="true">Dados Técnicos</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="outrasinformacoes-tab" data-bs-toggle="tab" data-bs-target="#outrasinformacoes" type="button" role="tab" aria-controls="outrasinformacoes" aria-selected="false">Outras Informações</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="dadostecnicos" role="tabpanel" aria-labelledby="dadostecnicos-tab" style="padding: 10px; ">
                                        <div style="border: 1px solid #ddd; padding: 10px;">
                                            <div class="row">
                                                <div class="col-md-3">Produto
                                                    <select class="form-control" name="produto" id="">
                                                        <option selected value="">Selecione</option>
                                                        <?php
                                                            require_once "../config.php";
                                                            $pdo = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
                                                            
                                                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                            $selecionar_servicos = $pdo->prepare("SELECT descricao_do_produto FROM produtos");
                                                            $selecionar_servicos->execute();
                                                            while($row_servicos = $selecionar_servicos->fetch()){
                                                        ?>
                                                            <option value="<?php echo $row_servicos['descricao_do_produto'] ?>"><?php echo $row_servicos['descricao_do_produto'] ?></option>

                                                        <?php }?>
                                                    </select>
                                                </div>

                                                <div class="col-md-3">Qtd <span style="color: #f000;">*</span>
                                                    <input type="number" name="prod_qtd" id="" placeholder="1,000" class="form-control">
                                                </div>
                                            </div>
                                       </div>

                                        <div class="mt-2" style="border: 1px solid #ddd;">
                                            <div class="ps-4 mb-1" style="background-color: #33cc66;">
                                                <h3 class="block-title">
                                                    Serviços
                                                </h3>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div>
                                                        <select name="prod_usinagem_puxador" id="" class="form-control mb-2 ms-2 mt-2">
                                                            <option selected value="">Selecione</option>
                                                            <option value="Usinagem Puxador">Usinagem Puxador</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-2" style="border: 1px solid #ddd;">
                                            <div class="ps-4 mb-1" style="background-color: #33cc66;">
                                                <h3 class="block-title">
                                                    Valores Consumidor
                                                </h3>
                                            </div>
                                            <!-- <div class="row">
                                                <div class="col-md-4">
                                                    <div>
                                                        <label for="valoritem-cliente">Valor Item - Cliente</label>
                                                        <input type="number" class="form-control mb-2" name="valoritem-cliente" id="" placeholder="0,00">
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>

                                        <div class="mt-2" style="border: 1px solid #ddd;">
                                            <div class="ps-4 mb-1" style="background-color: #33cc66;">
                                                <h3 class="block-title">
                                                    Valores Cliente
                                                </h3>
                                            </div>
                                            <div class="row m-1">
                                                <div class="col-md-4">
                                                    <div>
                                                        <label for="valoritem-cliente">Valor Item - Cliente</label>
                                                        <input type="number" class="form-control mb-2" name="prod_valor_item_cliente" id="" placeholder="0,00">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <label for="produto_desconto">% Desconto</label>
                                                        <input type="number" class="form-control mb-2" name="prod_porcento_desconto" id="" placeholder="0,00">
                                                    </div>
                                                </div><div class="col-md-4">
                                                    <div>
                                                        <label for="produto_desconto2">Desconto</label>
                                                        <input type="number" class="form-control mb-2" name="prod_desconto" id="" placeholder="0,00">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-2" style="border: 1px solid #ddd;">
                                            <div class="ps-4 mb-1" style="background-color: #33cc66;">
                                                <h3 class="block-title">
                                                    Valores Parceiro
                                                </h3>
                                            </div>
                                            <!-- <div class="row">
                                                <div class="col-md-4">
                                                    <div>
                                                        <label for="valoritem-cliente">Valor Item - Cliente</label>
                                                        <input type="number" class="form-control mb-2" name="valoritem-cliente" id="" placeholder="0,00">
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>

                                        <div class="mt-2" style="border: 1px solid #ddd;">
                                            <div class="ps-4 mb-1" style="background-color: #33cc66;">
                                                <h3 class="block-title">
                                                    Valores Fábrica
                                                </h3>
                                            </div>
                                            <!-- <div class="row">
                                                <div class="col-md-4">
                                                    <div>
                                                        <label for="valoritem-cliente">Valor Item - Cliente</label>
                                                        <input type="number" class="form-control mb-2" name="valoritem-cliente" id="" placeholder="0,00">
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                        
                                    </div>

                                    <div class="tab-pane fade" id="outrasinformacoes" role="tabpanel" aria-labelledby="outrasinformacoes-tab">...</div>
                                    
                                </div>
                            </section>
                        </div>

                        </div>


                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab" style="padding: 10px; ">
                            <div style="border: 1px solid #ddd; padding: 10px;">
                                <div class="row">
                                    <div class="col-md-4">Forma de Pagamento
                                        <select class="form-control" name="val_forma_pagamento" id="">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">Condição de Pagamento
                                        <select class="form-control" name="val_condicao_pagamento" id="">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">Situação Financeira
                                        <select class="form-control" name="val_situacao_financeira" id="">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-3" style="font-size: 0.9em;">Qtd Portas
                                        <input type="text" name="val_qtd_portas" id="" style="font-size: 1em;" placeholder="0" class="form-control">
                                    </div>
                                    <div class="col-md-3" style="font-size: 0.9em;">Qtd Vidros
                                        <input type="text" name="val_qtd_vidros" id="" placeholder="0" style="font-size: 1em;" class="form-control">
                                    </div>
                                    <div class="col-md-3" style="font-size: 0.9em;">Qtd Quadros
                                        <input type="text" name="val_qtd_quadros" id="" placeholder="0" style="font-size: 1em;" class="form-control">
                                    </div>
                                    <div class="col-md-3" style="font-size: 0.9em;">Qtd Total
                                        <input type="text" name="val_qtd_total" id="" style="font-size: 1em;" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-2" style="font-size: 0.9em;">Total(Consumidor)
                                        <input type="text" name="val_total_consumidor" id="" style="font-size: 1em;" placeholder="0" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4" style="font-size: 0.9em;">Valor dos Itens (Clientes)
                                        <input type="text" name="val_valor_itens_clientes" id="" style="font-size: 1em;" placeholder="0,00" class="form-control">
                                    </div>
                                    <div class="col-md-2" style="font-size: 0.9em;">% Desconto
                                        <input type="text" name="val_porcento_desconto" id="" placeholder="0,0000" style="font-size: 1em;" class="form-control">
                                    </div>
                                    <div class="col-md-2" style="font-size: 0.9em;">Desconto
                                        <input type="text" name="val_desconto" id="" placeholder="0,00" style="font-size: 1em;" class="form-control">
                                    </div>
                                    <div class="col-md-2" style="font-size: 0.9em;">Frete
                                        <input type="text" name="val_frete" id="" placeholder="0,00" style="font-size: 1em;" class="form-control">
                                    </div>
                                    <div class="col-md-2" style="font-size: 0.9em;">Total(Cliente)
                                        <input type="text" name="val_total_cliente" id="" placeholder="0,00" style="font-size: 1em;" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="outros-valores" role="tabpanel" aria-labelledby="outros-valores-tab" style="padding: 10px;">
                            <div style="border: 1px solid #ddd; padding: 10px;">
                                <div class="row mt-4">
                                    <div class="col-md-4" style="font-size: 0.9em;">Valor dos Itens (Parceiro)
                                        <input type="text" name="out_valor_itens_parceiro" id="" style="font-size: 1em;" placeholder="0,00" class="form-control">
                                    </div>
                                    <div class="col-md-2" style="font-size: 0.9em;">% Desconto
                                        <input type="text" name="out_porcento_desconto" id="" placeholder="0,0000" style="font-size: 1em;" class="form-control">
                                    </div>
                                    <div class="col-md-2" style="font-size: 0.9em;">Desconto
                                        <input type="text" name="out_desconto" id="" placeholder="0,00" style="font-size: 1em;" class="form-control">
                                    </div>
                                    <div class="col-md-2" style="font-size: 0.9em;">Total(Parceiro)
                                        <input type="text" name="out_total_parceiro" id="" placeholder="0,00" style="font-size: 1em;" class="form-control">
                                    </div>
                                    <div class="col-md-2" style="font-size: 0.9em;">MArkup % (Parceiro)
                                        <input type="text" name="out_markup_parceiro" id="" placeholder="0,00" style="font-size: 1em;" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4" style="font-size: 0.9em;">Total (Fábrica)
                                        <input type="text" name="out_total_fabrica" id="" style="font-size: 1em;" placeholder="0,00" class="form-control">
                                    </div>
                                    <div class="col-md-2" style="font-size: 0.9em;">Markup % (Fábrica)
                                        <input type="text" name="out_markup_fabrica" id="" placeholder="0,0000" style="font-size: 1em;" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="observacoes" role="tabpanel" aria-labelledby="observacoes-tab" style="padding: 10px;">
                            <div style="border: 1px solid #ddd; padding: 10px;">
                                <div class="row mt-4">
                                    <div class="col-md-8" style="font-size: 0.9em;">Obeservação
                                        <textarea name="obs_observacao_op" id="" cols="10" rows="5" style="font-size: 1em;" class="form-control"></textarea>
                                    </div>                                    
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="aprocacoes-clientes" role="tabpanel" aria-labelledby="aprocacoes-clientes-tab" style="padding: 10px;">
                            <div style="border: 1px solid #ddd; padding: 10px;">
                                <div class="row mt-4">
                                    <div class="col-md-3" style="font-size: 0.9em;">Aprovação do Cliente
                                        <select name="ap_cli_aprovacao_cliente" id="" style="font-size: 1em;" class="form-control">
                                            <option value="">Aguardando Aprovação</option>
                                        </select>
                                    </div> 
                                    <div class="col-md-3" style="font-size: 0.9em;">Aprovação do Cliente
                                        <input type="date" name="ap_cli_aprovacao_cliente_data" id="" style="font-size: 1em;" class="form-control">
                                    </div> 
                                    <div class="col-md-3 form-check form-switch" style="padding-left: 120px; margin-top: 15px;">
                                        <input class="form-check-input" type="checkbox" value="" id="cliente-retira" name="ap_cli_cliente_retira" checked>
                                        <label class="form-check-label" for="cliente-retira">Cliente Retira</label>
                                    </div> 
                                    <div class="col-md-3" style="font-size: 0.9em;">Pedido Parceiro
                                        <input type="text" name="ap_cli_pedido_parceiro" id="" style="font-size: 1em;" class="form-control">
                                    </div>                                    
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="aprovacoes-parceiro" role="tabpanel" aria-labelledby="aprovacoes-parceiro-tab" style="padding: 10px;">

                            <div style="border: 1px solid #ddd; padding: 10px;">
                                <div class="row mt-4">
                                    <div class="col-md-4" style="font-size: 0.9em;">Aprovação do Parceiro
                                        <select name="ap_parc_aprovacao_parceiro" id="" style="font-size: 1em;" class="form-control">
                                            <option value="">Em Conferencia</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4" style="font-size: 0.9em;">Andamento Parceiro
                                        <select name="ap_parc_andamento_parceiro" id="" style="font-size: 1em;" class="form-control">
                                            <option value="">Aguardando Aprovação</option>
                                        </select>
                                    </div> 
                                    <div class="col-md-4" style="font-size: 0.9em;">Entregue
                                        <input type="date" name="ap_parc_entregue_data" id="" style="font-size: 1em;" class="form-control">
                                    </div>                                    
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4" style="font-size: 0.9em;">Vendedor Interno
                                        <input type="text" name="ap_parc_vendedor_interno" id="" style="font-size: 1em;" placeholder="0" class="form-control">
                                    </div> 
                                    <div class="col-md-4" style="font-size: 0.9em;">Vendedor Externo
                                        <input type="text" name="ap_parc_vendedor_externo" id="" style="font-size: 1em;" placeholder="0" class="form-control">
                                    </div>  
                                    <div class="col-md-4" style="font-size: 0.9em;">Vendedor Pedido
                                        <select name="ap_parc_vendedor_pedido" id="" style="font-size: 1em;" class="form-control">
                                            <option value="">Marciele Ap. Grosso Vicentini</option>
                                        </select>
                                    </div>                                    
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="aprovacoes-fabrica" role="tabpanel" aria-labelledby="aprovacoes-fabrica-tab" style="padding: 10px;">
                            <div style="border: 1px solid #ddd; padding: 10px;">
                                <div class="row mt-4">
                                    <div class="col-md-3" style="font-size: 0.9em;">Aprovação Fábrica
                                        <select name="ap_fab_aprovacao_fabrica" id="" style="font-size: 1em;" class="form-control">
                                            <option value="">Em Conferencia</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3" style="font-size: 0.9em;">Pedido Fábrica
                                        <input type="date" name="ap_fab_pedido_fabrica_data" id="" style="font-size: 1em;" class="form-control">
                                    </div>                                    
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-3" style="font-size: 0.9em;">Andamento
                                        <select name="ap_fab_andamento" id="" style="font-size: 1em;" class="form-control">
                                            <option value="">Aguardando Aprovações</option>
                                        </select>
                                    </div> 
                                    <div class="col-md-3" style="font-size: 0.9em;">Entrou em Produção
                                        <input type="date" name="ap_fab_entrou_producao_data" id="" style="font-size: 1em;" class="form-control">
                                    </div> 
                                    <div class="col-md-3" style="font-size: 0.9em;">Produzido
                                        <input type="text" name="ap_fab_produzido" id="" style="font-size: 1em;" placeholder="0" class="form-control">
                                    </div> 
                                    <div class="col-md-3" style="font-size: 0.9em;">Entregue
                                        <input type="text" name="ap_fab_entregue" id="" style="font-size: 1em;" placeholder="0" class="form-control">
                                    </div>                                  
                                </div>
                            </div>
                        </div>

                    </div>
                  </section>
          
                  </form>
                </div>
                </div>
              </div>
              <!-- END Latest Orders -->
            </div>
          </div>
          <!-- END Latest Orders + Stats -->
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->

      <?php require_once "../template/footer.php"; ?>

      <!--Modal-->
      <script>
      let idProdutoParaExcluir;

      function abrirModal(idProduto) {
          idProdutoParaExcluir = idProduto;
          const modal = new bootstrap.Modal(document.getElementById('modalConfirmacao'), {});
          modal.show();
      }

      document.getElementById('btnConfirmarExclusao').addEventListener('click', function() {
          window.location.href = `eliminar_perfil.php?id=${idProdutoParaExcluir}`;
      });
    </script>
    
    <script>
        function enviarForm1(id_parm) {
            // Simulando o envio e obtenção de um ID
            const idDoForm1 = id_parm;  // Substitua isso pela lógica real para obter o ID

            // Define o ID do Formulário 1 no campo correspondente no Formulário 2
            document.getElementById("idDoForm1").value = idDoForm1;
        }
    </script>
    </div>
    <!-- END Page Container -->
  </body>
</html>

<?php
    if(isset($_POST['btn_incluir']))
    {
        $id_unik = $_POST['id_unik'];
        if($id_unik)
        {
            header('Location: ordem_producao.php');
        }
        // $modo = $_POST['modo'];
        // $qtd = $_POST['qtd'];
        // $altura = $_POST['altura'];
        // $largura = $_POST['largura'];
        // $perfil_lado_esquerdo = $_POST['perfil_lado_esquerdo'];

        // echo $id_unik;
        // .'__'. $qtd .'__'. $altura .'__'. $largura .'__'. $perfil_lado_esquerdo;
    }
?>

<?php 

  if(isset($_GET['vazio'])){ ?>
    <script>
      const Atualizado = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000,
      timerProgressBar: true,
      didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
      })

      Atualizado.fire({
      icon: 'warning',
      title: 'Preencha alguns dados para Incluir!'
      })
    </script>
<?php } elseif(isset($_GET['nao-atualizado'])){ ?>

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
    title: 'Erro ao Finalizar Pedido!'
    })
  </script>

<?php } elseif(isset($_GET['stock_baixo'])){ ?>

<script>
  const Toastsb = Swal.mixin({
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

  Toastsb.fire({
  icon: 'error',
  title: 'Stock Baixo!'
  })
</script>

<?php } elseif(isset($_GET['campos_vasio'])){ ?>

<script>
  const Toastvasio = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 5000,
  timerProgressBar: true,
  didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
  })

  Toastvasio.fire({
  icon: 'error',
  title: 'Preencha Produto e Quantidade!'
  })
</script>

<?php } elseif(isset($_GET['produto_vazio'])){ ?>

<script>
  const Toastvq = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 5000,
  timerProgressBar: true,
  didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
  })

  Toastvq.fire({
  icon: 'error',
  title: 'Preencha o Produto/Serviço!'
  })
</script>

<?php } elseif(isset($_GET['id_filter'])){ ?>

<script>
  const Sucesso = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true,
  didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
  })

  Sucesso.fire({
  icon: 'success',
  title: 'Incluido com Sucesso!'
  })
</script>

<?php } elseif(isset($_GET['produto_vazio'])){ ?>

<script>
  const Sucessoe = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true,
  didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
  })

  Sucessoe.fire({
  icon: 'error',
  title: 'Não Incluido com Sucesso!'
  })
</script>

<?php } ?>

