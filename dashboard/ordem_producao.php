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
    <link rel="shortcut icon" href="../assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <link rel="stylesheet" id="css-main" href="../assets/css/dashmix.min.css">

    
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
                    <form action="" method="post">
                  <div style="margin: 5px; display: flex; justify-content: space-between;">
                    <button style="border-radius: 5px; border: 1px solid #ccc; background-color: transparent; padding: 5px 16px;"><a href="dashboard.php" style="color: #1d1d1d; font-size: 0.9em;">Voltar</a></button>

                    <div>
                    
                        <button style="border-radius: 20px; border: 1px solid #ccc; background-color: transparent; padding: 5px 16px;"><a href="ordem_producao.php" style="color: #1d1d1d; font-size: 0.9em;">Incluir</a></button>
                        
                        <form action="pdf_ordemProducao.php" method="post">
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 20px; border: 1px solid #ccc; background-color: transparent; padding: 5px 0 5px 16px;">
                                <a style="color: #1d1d1d; font-size: 0.9em;"  style="text-decoration: none;"  href="#" role="button" aria-expanded="false">Imprimir <img src="../assets/img/icons8-ordem-descendente-24.png" width="16px" alt=""></a>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <button class="dropdown-item" type="submit" name="btn_submit" value="Primeiro BTN">Sintético - Cliente</button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" type="button" name="btn_submit" value="Segundo BTN">Sintético 3 - Cliente</button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" type="button" name="btn_submit" value="Terceiro BTN">Sintético 3 - Sem Valor</button>
                                    </li>
                                    <li style="width: 100%;"><hr class="dropdown-divider" style="color: black; padding: 1px;"></li>
                                    <li>
                                        <button class="dropdown-item" type="button" name="btn_submit" value="Terceiro BTN">Relátorio de Vendas (OP)</button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" type="button" name="btn_submit" value="Terceiro BTN">Relátorio para Entrega Por Cliente</button>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                    <!-- <div>
                        <button style="border-radius: 20px; border: 1px solid #ccc; background-color: transparent; padding: 5px 16px;"><a href="ordem_producao.php" style="color: #1d1d1d; font-size: 0.9em;">Incluir</a></button>
                        
                        <button style="border-radius: 20px; border: 1px solid #ccc; background-color: transparent; padding: 1px 6px;">
                            <li class="nav-item dropdown" style="list-style-type: none; ">
                                <a style="color: #1d1d1d; font-size: 0.9em;" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="text-decoration: none;" href="#" role="button" aria-expanded="false">Imprimir</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <button type="submit" name="btn_submit" value="Primeiro BTN">
                                            Primeiro
                                        </button>
                                    <li>
                                    <li><a class="dropdown-item" href="#">Sintético - Cliente</a></li>
                                    <li><a class="dropdown-item" href="#">Sintético 3 - Cliente</a></li>
                                    <li><a class="dropdown-item" href="#">Sintético 3 - Sem Valor</a></li>
                                    <li style="width: 100%;"><hr class="dropdown-divider" style="color: black; padding: 1px;"></li>
                                    <li><a class="dropdown-item" href="#">Relátorio de Vendas (OP)</a></li>
                                    <li><a class="dropdown-item" href="#">Relátorio para Entrega Por Cliente</a></li>
                                </ul>
                            </li>
                        </button>
                    </div> -->
                  </div>

                  <section style="padding-bottom: 10px;">
                    <hr style="width: 99%; margin: auto; margin-bottom: 10px;">
                    <div class="row" style="font-size: 0.9em; border: 1px solid #ddd; border-radius: 5px; width: 99%; margin: auto;">
                        <div class="col-md-2">OP
                            <p>22.111</p>
                        </div>
                        <div class="col-md-2">Parceiro <span style="color: #f00;">*</span>
                            <!-- <form action="" method="post"> -->
                                <select name="" id="" class="form-control" required style="font-size: 1em;">
                                    <option value="">HJ Alúminios</option>
                                </select>
                            <!-- </form> -->
                        </div>
                        <div class="col-md-2">Cliente
                            <div  style="display: flex; justify-content: space-between">
                                <input type="text" readonly class="form-control mb-2" id="id_clienteinput" name="cliente" style="border: none; background-color: white; width: 100%;">
                                <?php
                                    echo "
                                        <button class='btn' class='ms-1' style='Amargin-right: 15px; border: none; background-color: transparent; border-radius: 1000px; width: 5px;' onclick='abrirModalCliente(2)' data-toggle='modal' data-target='#myModalCliente'>
                                            <img src='../assets/svg/icons8-pesquisar.svg' width='25px' alt=''>
                                        </button>"
                                    ;
                                ?>
                            </div>
                        </div>
                        <!-- Modal Cliente -->
                        <div class="modal fade" id="myModalCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header" style="background-color: #33cc66;">
                                    <h5 class="modal-title" id="exampleModalLabel">Clientes Registados no Sistema</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        <?php
                                            $conn = new mysqli('localhost', 'root', '', 'maxportas');
                                            $query = 'SELECT id, nome_razao_socil FROM clientes';
                                            $result = $conn->query($query);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                echo '<li  style="color: #000; font-size: 1.1em;" data-bs-dismiss="modal"><a href="#" style="text-decoration: none; color: black;" class="select-data" data-id="' . $row['id'] . '">ID: ' .$row['id']. ' | Nome: ' . $row['nome_razao_socil'] . '</a></li>';
                                                }
                                            }
                                        ?>
                                    </ul>
                                </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function abrirModalCliente(idProduto) {
                                idProdutoParaExcluir = idProduto;
                                const modal = new bootstrap.Modal(document.getElementById('myModalCliente'), {});
                                modal.show();
                            }
                            document.querySelectorAll('.select-data').forEach(item => {
                            item.addEventListener('click', event => {
                                event.preventDefault();
                                const selectedData = item.innerText;
                                const input = document.getElementById('id_clienteinput');
                                input.value = selectedData;
                                $('#myModalCliente').modal('hide');
                                });
                            });
                            </script>
                        <!-- Last Modal Cliente -->

                        <div class="col-md-4">Nome Consumidor
                            <form action="" method="post">
                                <input type="text" class="form-control" style="font-size: 1em;" name="name_consumidor">
                            </form>
                        </div>
                        <div class="col-md-2">Orçamento
                            <form action="" method="post">
                                <select name="" id="" class="form-control" style="font-size: 1em;">
                                    <option value="">Orçamento</option>
                                </select>
                            </form>
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
                                                    <input type="number" name="" id="" placeholder="1" class="form-control">
                                                </div>

                                                <div class="col-md-3">Altura (mm)
                                                    <input type="number" name="" id="" placeholder="1" class="form-control">
                                                </div>

                                                <div class="col-md-3">Largura (mm)
                                                    <input type="number" name="" id="" placeholder="1" class="form-control">
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
                                                            <input type="text" id="id_perfilAdd" readonly class="form-control mb-2" name="perfil" placeholder="0">
                                                            <?php
                                                                echo "
                                                                    <button class='btn' class='ms-1' style='margin-right: 15px; border: none; background-color: transparent; border-radius: 1000px; width: 5px;' onclick='abrirModalPerfil(2)' data-toggle='modal' data-target='#myModalPerfil'>
                                                                        <img src='../assets/svg/icons8-pesquisar.svg' width='25px' alt=''>
                                                                    </button>"
                                                                ;
                                                            ?>
                                                        </div>
                                                        <div>
                                                            <?php
                                                                if(!empty($_GET['id_filtroImage'])){
                                                                    // var_dump($_GET['id_filtroImage']);
                                                                    $id_getFilter = $_GET['id_filtroImage'];
                                                                    // $id = INPUT_POST['name'];
                                                                    $host = "localhost";
                                                                    $user = "root";
                                                                    $pass = "";
                                                                    $bd = "maxportas";
                                                                    $conn = new PDO ("mysql:host=$host; dbname=".$bd, $user, $pass);
                                                                    
                                                                    $select = $conn->prepare("SELECT * FROM perfil WHERE id = :id");
                                                                    $select->bindParam(':id', $id_getFilter);
                                                                    $select->execute();
                                                                    $row_filterImageGet = $select->fetch(PDO::FETCH_ASSOC);
                                                                    ?>
                                                                        <img src="../perfil/<?php echo $row_filterImageGet['imagem'] ?>" width="100px" height="100px" alt="">
                                                                <?php  
                                                                        // }
                                                                    // } 
                                                                }
                                                            ?>
                                                            <!-- <img src="../assets/svg/icons8-pesquisar.svg" width='25px' alt=""> -->
                                                        </div>
                                                    </div>
                                                    <!-- Modal Perfil -->
                                                    <div class="modal fade" id="myModalPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                            <div class="modal-header" style="background-color: #33cc66;">
                                                                <h5 class="modal-title" id="exampleModalLabel">Perfies Registados no Sistema</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table>
                                                                    <thead style="background-color: #33cc66; width: 100%;">
                                                                        <tr>
                                                                            <th>Selecionar</th>
                                                                            <th>Código</th>
                                                                            <th>Descrição</th>
                                                                            <th>Observação</th>
                                                                            <th>Detalhes</th>
                                                                            <th>Foto</th>
                                                                        </tr>
                                                                    </thead>
                                                                <!-- <ul> -->
                                                                    <?php
                                                                        $conn = new mysqli('localhost', 'root', '', 'maxportas');
                                                                        $query = 'SELECT * FROM perfil';
                                                                        $result = $conn->query($query);

                                                                        if ($result->num_rows > 0) {
                                                                            while ($row = $result->fetch_assoc()) {
                                                                            // echo '<li  style="color: #000; font-size: 1.1em;" data-bs-dismiss="modal"> '. $row['custo_metro'] .' 
                                                                            //     <a href="#" style="text-decoration: none; color: black;" class="select-dataPerfil" data-id="' . $row['id'] . '">'.$row['id'] .'</a>
                                                                            // </li>';
                                                                            ?>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <?php 
                                                                                            echo '
                                                                                        <td>
                                                                                            <button data-bs-dismiss="modal">
                                                                                            <a href="#" style="text-decoration: none; color: black;">Selecionar</a>
                                                                                            </button>
                                                                                        </td>
                                                                                        ';
                                                                                        ?>
                                                                                        <td data-bs-dismiss="modal">
                                                                                            <a class="select-dataPerfil" data-id="<?php $row['id'] ?>" href="ordem_producao.php?id_filtroImage=<?php echo $row['id']; ?>">
                                                                                                <?php echo $row['id']; ?>
                                                                                            </a>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $row['descricao']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $row['detalhes']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <img src="../perfil/<?php echo $row['imagem'] ?>" width="100px" height="100px" alt="">
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            <!-- <img width="150px" height="90px" src="../perfil/<php echo $row['imagem'] ?>" alt=''> -->
                                                                        <?php    
                                                                            }
                                                                        }
                                                                    ?>
                                                                </table>
                                                                <!-- </ul> -->
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        function abrirModalPerfil(idProdutoPerfil) {
                                                            idProdutoPerfilParaExcluir = idProdutoPerfil;
                                                            const modal = new bootstrap.Modal(document.getElementById('myModalPerfil'), {});
                                                            modal.show();
                                                        }
                                                        document.querySelectorAll('.select-dataPerfil').forEach(item => {
                                                        item.addEventListener('click', event => {
                                                            event.preventDefault();
                                                            const selectedData = item.innerText;
                                                            const input = document.getElementById('id_perfilAdd');
                                                            input.value = selectedData;
                                                            $('#myModalPerfil').modal('hide');
                                                            

                                                            });
                                                        });
                                                        </script>
                                                    <!-- Last Modal Perfil -->

                                                    <!-- Modal de confirmação -->
                                                    <!-- <div class="modal fade" id="modalConfirmacao" tabindex="-1" aria-labelledby="modalConfirmacaoLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-danger">
                                                                    <h5 class="modal-title text-white" id="modalConfirmacaoLabel">Confirmar Eliminação</h5>
                                                                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Tem certeza de que deseja eliminar este Perfil?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                    <button type="button" class="btn btn-danger" id="btnConfirmarExclusao">Confirmar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <!--Last Modal-->

                                                    <div class="p-2">
                                                        <label for="">Usinagem Para <span style="color: #f000;">*</span></label>
                                                        <select class="form-control mb-2" name="usinagem" id="">
                                                            <option value="Sem Usinagem">Sem Usinagem</option>
                                                        </select>
                                                    </div>

                                                    <div class="p-2">
                                                        <label for="">Puxador</label>
                                                        <select class="form-control mb-2" name="puxador" id="">
                                                            <option value="">Selecione</option>
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
                                                            <input type="text" id="id_perfilAddA" readonly class="form-control mb-2" name="perfil" placeholder="0">
                                                            <?php
                                                                echo "
                                                                    <button class='btn' class='ms-1' style='margin-right: 15px; border: none; background-color: transparent; border-radius: 1000px; width: 5px;' onclick='abrirModalPerfil(2)' data-toggle='modal' data-target='#myModalPerfil'>
                                                                        <img src='../assets/svg/icons8-pesquisar.svg' width='25px' alt=''>
                                                                    </button>"
                                                                ;
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="p-2">
                                                        <label for="">Perfil <span style="color: #f000;">*</span></label>
                                                        <input type="number" readonly class="form-control mb-2" name="perfil" placeholder="0">
                                                    </div> -->

                                                    <div class="p-2">
                                                        <label for="">Usinagem Para <span style="color: #f000;">*</span></label>
                                                        <select class="form-control mb-2" name="usinagem" id="">
                                                            <option value="Sem Usinagem">Sem Usinagem</option>
                                                        </select>
                                                    </div>

                                                    <div class="p-2">
                                                        <label for="">Puxador</label>
                                                        <select class="form-control mb-2" name="puxador" id="">
                                                            <option value="">Selecione</option>
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
                                                        <input type="number" readonly class="form-control mb-2" name="perfil" placeholder="0">
                                                    </div>

                                                    <div class="p-2">
                                                        <label for="">Usinagem Para <span style="color: #f000;">*</span></label>
                                                        <select class="form-control mb-2" name="usinagem" id="">
                                                            <option value="Sem Usinagem">Sem Usinagem</option>
                                                        </select>
                                                    </div>

                                                    <div class="p-2">
                                                        <label for="">Puxador</label>
                                                        <select class="form-control mb-2" name="puxador" id="">
                                                            <option value="">Selecione</option>
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
                                                        <input type="number" readonly class="form-control mb-2" name="perfil" placeholder="0">

                                                    </div>

                                                    <div class="p-2">
                                                        <label for="">Usinagem Para <span style="color: #f000;">*</span></label>
                                                        <select class="form-control mb-2" name="usinagem" id="">
                                                            <option value="Sem Usinagem">Sem Usinagem</option>
                                                        </select>
                                                    </div>

                                                    <div class="p-2">
                                                        <label for="">Puxador</label>
                                                        <select class="form-control mb-2" name="puxador" id="">
                                                            <option value="">Selecione</option>
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
                                                        <select class="form-control mb-2" name="vidro" id="">
                                                            <option value="">Escolha um Vidro</option>
                                                        </select>
                                                    </div>
                                                </div>                                                
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 form-check form-switch" style="padding-left: 70px; margin-top: 5px;">
                                                    <input class="form-check-input" type="checkbox" value="" id="tv" name="tv">
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
                                                        <!-- <label for="">Vidro</label> -->
                                                        <select class="form-control mb-2" name="vidro" id="">
                                                            <option value="Rebaixo">Rebaixo</option>
                                                            <option value="Usinagem Puxador">Usinagem Puxador</option>
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
                                                        <select class="form-control mb-2" name="vidro" id="">
                                                            <option value="">Sem Travessa</option>
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
                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="">Portas Pares</label>
                                                        <select class="form-control mb-2" name="portas-pares" id="">
                                                            <option value="">Selecione</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="">Reforço</label>
                                                        <select class="form-control mb-2" name="reforco" id="">
                                                            <option value="">Sem Selecione</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-2 form-check form-switch" style="padding-left: 70px; margin-top: 19px;">
                                                    <input class="form-check-input" type="checkbox" value="" id="desempenador" name="desempenador">
                                                    <label class="form-check-label" for="desempenador">Desempenador</label>
                                                </div> 

                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="">Esquadreta</label>
                                                        <select class="form-control mb-2" name="esquadreta" id="">
                                                            <option value="">Selecione</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="">Ponteira</label>
                                                        <select class="form-control mb-2" name="ponteira" id="">
                                                            <option value="">Selecione uma Ponteira</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="kit">Kit</label>
                                                        <select class="form-control mb-2" name="kit" id="">
                                                            <option value="">Escolha um kit</option>
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
                                            </div> -->
                                        </div>

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
                                            </div> -->
                                        </div>
                                        
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
                                                    <select class="form-control" name="modo" id="">
                                                        <option value="">Selecione</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-3">Qtd <span style="color: #f000;">*</span>
                                                    <input type="number" name="" id="" placeholder="1,000" class="form-control">
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
                                                        <select name="produto_servicos" id="" class="form-control mb-2 ms-2 mt-2">
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
                                                        <input type="number" class="form-control mb-2" name="valoritem-cliente" id="" placeholder="0,00">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <label for="produto_desconto">% Desconto</label>
                                                        <input type="number" class="form-control mb-2" name="produto_desconto" id="" placeholder="0,00">
                                                    </div>
                                                </div><div class="col-md-4">
                                                    <div>
                                                        <label for="produto_desconto2">Desconto</label>
                                                        <input type="number" class="form-control mb-2" name="produto_desconto2" id="" placeholder="0,00">
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
                                        <select class="form-control" name="" id="">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">Condição de Pagamento
                                        <select class="form-control" name="" id="">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">Situação Financeira
                                        <select class="form-control" name="" id="">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-3" style="font-size: 0.9em;">Qtd Portas
                                        <input type="text" name="" id="" style="font-size: 1em;" placeholder="0" class="form-control">
                                    </div>
                                    <div class="col-md-3" style="font-size: 0.9em;">Qtd Vidros
                                        <input type="text" name="" id="" placeholder="0" style="font-size: 1em;" class="form-control">
                                    </div>
                                    <div class="col-md-3" style="font-size: 0.9em;">Qtd Quadros
                                        <input type="text" name="" id="" placeholder="0" style="font-size: 1em;" class="form-control">
                                    </div>
                                    <div class="col-md-3" style="font-size: 0.9em;">Qtd Total
                                        <input type="text" name="" id="" style="font-size: 1em;" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-2" style="font-size: 0.9em;">Total(Consumidor)
                                        <input type="text" name="" id="" style="font-size: 1em;" placeholder="0" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4" style="font-size: 0.9em;">Valor dos Itens (Clientes)
                                        <input type="text" name="" id="" style="font-size: 1em;" placeholder="0,00" class="form-control">
                                    </div>
                                    <div class="col-md-2" style="font-size: 0.9em;">% Desconto
                                        <input type="text" name="" id="" placeholder="0,0000" style="font-size: 1em;" class="form-control">
                                    </div>
                                    <div class="col-md-2" style="font-size: 0.9em;">Desconto
                                        <input type="text" name="" id="" placeholder="0,00" style="font-size: 1em;" class="form-control">
                                    </div>
                                    <div class="col-md-2" style="font-size: 0.9em;">Frete
                                        <input type="text" name="" id="" placeholder="0,00" style="font-size: 1em;" class="form-control">
                                    </div>
                                    <div class="col-md-2" style="font-size: 0.9em;">Total(Cliente)
                                        <input type="text" name="" id="" placeholder="0,00" style="font-size: 1em;" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="outros-valores" role="tabpanel" aria-labelledby="outros-valores-tab" style="padding: 10px;">
                            <div style="border: 1px solid #ddd; padding: 10px;">
                                <div class="row mt-4">
                                    <div class="col-md-4" style="font-size: 0.9em;">Valor dos Itens (Parceiro)
                                        <input type="text" name="" id="" style="font-size: 1em;" placeholder="0,00" class="form-control">
                                    </div>
                                    <div class="col-md-2" style="font-size: 0.9em;">% Desconto
                                        <input type="text" name="" id="" placeholder="0,0000" style="font-size: 1em;" class="form-control">
                                    </div>
                                    <div class="col-md-2" style="font-size: 0.9em;">Desconto
                                        <input type="text" name="" id="" placeholder="0,00" style="font-size: 1em;" class="form-control">
                                    </div>
                                    <div class="col-md-2" style="font-size: 0.9em;">Total(Parceiro)
                                        <input type="text" name="" id="" placeholder="0,00" style="font-size: 1em;" class="form-control">
                                    </div>
                                    <div class="col-md-2" style="font-size: 0.9em;">MArkup % (Parceiro)
                                        <input type="text" name="" id="" placeholder="0,00" style="font-size: 1em;" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4" style="font-size: 0.9em;">Total (Fábrica)
                                        <input type="text" name="" id="" style="font-size: 1em;" placeholder="0,00" class="form-control">
                                    </div>
                                    <div class="col-md-2" style="font-size: 0.9em;">Markup % (Fábrica)
                                        <input type="text" name="" id="" placeholder="0,0000" style="font-size: 1em;" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="observacoes" role="tabpanel" aria-labelledby="observacoes-tab" style="padding: 10px;">
                            <div style="border: 1px solid #ddd; padding: 10px;">
                                <div class="row mt-4">
                                    <div class="col-md-8" style="font-size: 0.9em;">Obeservação
                                        <textarea name="" id="" cols="10" rows="5" style="font-size: 1em;" class="form-control"></textarea>
                                    </div>                                    
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="aprocacoes-clientes" role="tabpanel" aria-labelledby="aprocacoes-clientes-tab" style="padding: 10px;">
                            <div style="border: 1px solid #ddd; padding: 10px;">
                                <div class="row mt-4">
                                    <div class="col-md-3" style="font-size: 0.9em;">Aprovação do Cliente
                                        <select name="" id="" style="font-size: 1em;" class="form-control">
                                            <option value="">Aguardando Aprovação</option>
                                        </select>
                                    </div> 
                                    <div class="col-md-3" style="font-size: 0.9em;">Aprovação do Cliente
                                        <input type="date" name="" id="" style="font-size: 1em;" class="form-control">
                                    </div> 
                                    <div class="col-md-3 form-check form-switch" style="padding-left: 120px; margin-top: 15px;">
                                        <input class="form-check-input" type="checkbox" value="" id="cliente-retira" name="cliente-retira" checked>
                                        <label class="form-check-label" for="cliente-retira">Cliente Retira</label>
                                    </div> 
                                    <div class="col-md-3" style="font-size: 0.9em;">Pedido Parceiro
                                        <input type="text" name="" id="" style="font-size: 1em;" class="form-control">
                                    </div>                                    
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="aprovacoes-parceiro" role="tabpanel" aria-labelledby="aprovacoes-parceiro-tab" style="padding: 10px;">

                            <div style="border: 1px solid #ddd; padding: 10px;">
                                <div class="row mt-4">
                                    <div class="col-md-4" style="font-size: 0.9em;">Aprovação do Parceiro
                                        <select name="" id="" style="font-size: 1em;" class="form-control">
                                            <option value="">Em Conferencia</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4" style="font-size: 0.9em;">Andamento Parceiro
                                        <select name="" id="" style="font-size: 1em;" class="form-control">
                                            <option value="">Aguardando Aprovação</option>
                                        </select>
                                    </div> 
                                    <div class="col-md-4" style="font-size: 0.9em;">Entregue
                                        <input type="date" name="" id="" style="font-size: 1em;" class="form-control">
                                    </div>                                    
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4" style="font-size: 0.9em;">Vendedor Interno
                                        <input type="text" name="" id="" style="font-size: 1em;" placeholder="0" class="form-control">
                                    </div> 
                                    <div class="col-md-4" style="font-size: 0.9em;">Vendedor Externo
                                        <input type="text" name="" id="" style="font-size: 1em;" placeholder="0" class="form-control">
                                    </div>  
                                    <div class="col-md-4" style="font-size: 0.9em;">Vendedor Pedido
                                        <select name="" id="" style="font-size: 1em;" class="form-control">
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
                                        <select name="" id="" style="font-size: 1em;" class="form-control">
                                            <option value="">Em Conferencia</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3" style="font-size: 0.9em;">Pedido Fábrica
                                        <input type="date" name="" id="" style="font-size: 1em;" class="form-control">
                                    </div>                                    
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-3" style="font-size: 0.9em;">Andamento
                                        <select name="" id="" style="font-size: 1em;" class="form-control">
                                            <option value="">Aguardando Aprovações</option>
                                        </select>
                                    </div> 
                                    <div class="col-md-3" style="font-size: 0.9em;">Entrou em Produção
                                        <input type="date" name="" id="" style="font-size: 1em;" class="form-control">
                                    </div> 
                                    <div class="col-md-3" style="font-size: 0.9em;">Produzido
                                        <input type="text" name="" id="" style="font-size: 1em;" placeholder="0" class="form-control">
                                    </div> 
                                    <div class="col-md-3" style="font-size: 0.9em;">Entregue
                                        <input type="text" name="" id="" style="font-size: 1em;" placeholder="0" class="form-control">
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
    
    </div>
    <!-- END Page Container -->
  </body>
</html>

<?php 

  if(isset($_GET['atualizado'])){ ?>
    <script>
      const Atualizado = Swal.mixin({
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

      Atualizado.fire({
      icon: 'success',
      title: 'Pedido Finalizado com Sucesso!'
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

<?php } ?>

