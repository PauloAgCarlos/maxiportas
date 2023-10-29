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

    <!-- Modal View -->
    <!-- <link href="myfilesEdVwCd/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="../assets/css/dashmix.min.css">

  </head>
  <body>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
    <?php require_once "../template/sidebar.php" ?>

    <?php require_once "../template/header.php" ?>

      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="content content-full content-boxed">
          <!-- Latest Orders + Stats -->
          <div class="row">
            <div class="col-md-12">
              <!--  Latest Orders -->
              <div class="block block-rounded block-mode-loading-refresh">
                <div class="block-header block-header-default">
                  <h3 class="block-title">
                    <a href="dashboard.php">
                        <i class="fa fa-arrow-left ms-1"></i>
                        Visualizar Pedidos
                    </a>
                  </h3>
                </div>
                <div class="container  bg-dark text-center" style="margin-top: 5%;">
                  <div class="py-2">
                    <h1 class="fw-bold text-white  ">

                      <?php
                      require_once "../controllers/controllers_ordem_producao.php";

                      $selecionar_tbl_ordem_producao_id = new controllers_ordem_producao();
                      $idDescriptografado = base64_decode($_GET['view_pedidos']);
                      $id = $idDescriptografado;
                      foreach($selecionar_tbl_ordem_producao_id->selecionar_tbl_ordem_producao_id($id) as $row_clientes_id){ 
                      echo addslashes($row_clientes_id['cliente']); } ?>
                    </h1>
                  </div>
                  <div style=" margin-left:73%; margin-top: -5%;">
                    <!-- <a class="btn btn-hero btn-primary" href="eliminar_clientes.php?eliminar_clientes=<php echo $row_clientes_id['id']; ?>" data-toggle="click-ripple">
                      <i class="fa fa-trash" ></i>
                    </a> -->
                    <!-- <form action="eliminar_clientes.php" method="post">
                      <input type="hidden" name="eliminar_clientes" value="<?php echo $row_clientes_id['id']; ?>">
                      <button type="submit" class="btn btn-hero btn-primary" style="color: blue;">
                        <i class="fa fa-trash" ></i>
                      </button>
                    </form> -->
                    <a class="btn  btn-hero btn-primary my-2" href="./dashboard.php">
                      <i class="fa fa-reply" aria-hidden="true"></i>
                      <span class="d-none d-sm-inline ms-1"></span>
                    </a>
                  </div>
                </div>
                <div class="block-content">
                    
                    <!-- Customer -->
                    <div class="row">
                        <div class="col-sm-6">
                        
                        <div class="block block-rounded">

                          <?php
                            require_once "../controllers/controllers_ordem_producao.php";

                            $selecionar_tbl_ordem_producao_id = new controllers_ordem_producao();
                            $idDescriptografado = base64_decode($_GET['view_pedidos']);
                            $id = $idDescriptografado;
                            foreach($selecionar_tbl_ordem_producao_id->selecionar_tbl_ordem_producao_id($id) as $row_clientes_id){ ?>

                            <div class="block-header block-header-default">
                              <h3 class="block-title">Cliente: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['cliente']); ?></h3>
                            </div>

                            <div class="block-content">
                              <div class="fs-4 mb-1">Modo: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['modo']); ?></span></div>
                              <address class="fs-sm">
                                  Quantidade: <?php echo addslashes($row_clientes_id['qtd']); ?><br>
                                  Altura: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['altura']); ?></span><br>
                                  Largura: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['largura']); ?></span><br>                                
                                  
                                  Perfil Lado Esquerdo: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['perfil_lado_esquerdo']); ?></span><br>
                                  Usinagem Esquerdo: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['usinagem_esquerdo']); ?></span><br>
                                  Puxador Esquerdo: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['puxador_esquerdo']); ?></span><br>
                                  
                                  Perfil Lado Direito: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['perfil_lado_direito']); ?></span><br>
                                  Usinagem Direito: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['usinagem_direito']); ?></span><br>
                                  Puxador Direito: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['puxador_direito']); ?></span><br>
                                  
                                  Perfil Lado Superior: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['perfil_lado_superior']); ?></span><br>
                                  Usinagem Superior: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['usinagem_superior']); ?></span><br>
                                  Puxador Superior: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['puxador_superior']); ?></span><br>

                                  Perfil Lado Inferior: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['perfil_lado_inferior']); ?></span><br>
                                  Usinagem Inferior: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['usinagem_inferior']); ?></span><br>
                                  Puxador Inferior: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['puxador_inferior']); ?></span>
                              </address>
                              <div class="fs-4 mb-1">Vidro: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['vidro']); ?></span></div>
                              <address class="fs-sm">
                                  TV: <?php echo addslashes($row_clientes_id['tv']); ?><br>
                                  Serviços: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['servicos']); ?></span><br>
                                  Travessa: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['travessa']); ?></span><br>                                
                                  
                                  Portas Pares: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['portas_pares']); ?></span><br>
                                  Reforço: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['reforco']); ?></span><br>
                                  Desempenador: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['desempenador']); ?></span><br>
                                  
                                  Esquadreta: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['esquadreta']); ?></span><br>
                                  Ponteira: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['ponteira']); ?></span><br>
                                  Kit: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['kit']); ?></span><br>
                                  
                                  Valor Item Cliente: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['valor_item_cliente']); ?></span><br>
                                  Porcento Desconto: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['porcento_desconto']); ?></span><br>
                                  Desconto: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['desconto']); ?></span><br>

                                  Produto: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['produto']); ?></span><br>
                                  Quantidade Produto: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['prod_qtd']); ?></span><br>
                                  Usinagem Puxador do Produto: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['prod_usinagem_puxador']); ?></span><br>


                                  Valor do Item Cliente Produto: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['prod_valor_item_cliente']); ?></span><br>
                                  Porcento Desconto Produto: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['prod_porcento_desconto']); ?></span><br>
                                  Desconto Produto: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['prod_desconto']); ?></span><br>

                                                                    
                              </address>
                            </div>
                            <?php } ?>
                        </div>
                        
                        </div>
                        <div class="col-sm-6">
                        <!-- Shipping Address -->
                        <div class="block block-rounded">
                          <?php
                            require_once "../controllers/controllers_ordem_producao.php";

                            $selecionar_tbl_ordem_producao_id = new controllers_ordem_producao();
                            $idDescriptografado = base64_decode($_GET['view_pedidos']);
                            $id = $idDescriptografado;
                            foreach($selecionar_tbl_ordem_producao_id->selecionar_tbl_ordem_producao_id($id) as $row_clientes_id_id){ ?>
                            <div class="block-header block-header-default">
                              <h3 class="block-title">Produto: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['produto']); ?></span></h3>
                            </div>
                            <div class="block-content">
                            <address class="fs-sm">
                            Forma de Pagamento do Valor: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['val_forma_pagamento']); ?></span><br>
                                  Condição de Pagamento do Valor: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['val_condicao_pagamento']); ?></span><br>
                                  Situação Financeira do Valor: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['val_situacao_financeira']); ?></span><br>


                                  Qtd de Portas do Valor: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['val_qtd_portas']); ?></span><br>
                                  Qtd de Vidros do Valor: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['val_qtd_vidros']); ?></span><br>
                                  Qtd de Quadros do Valor: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['val_qtd_quadros']); ?></span><br>

                                  Qtd Total do Valor: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['val_qtd_total']); ?></span><br>
                                  Valor Total Consumidor: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['val_total_consumidor']); ?></span><br>
                                  Valor dos Itens dos Clientes: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['val_valor_itens_clientes']); ?></span><br>

                                  Valor Porcento Desconto: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['val_porcento_desconto']); ?></span><br>
                                  Desconto do Valor: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['val_desconto']); ?></span><br>
                                  Valor do Frete: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['val_frete']); ?></span><br>
                                Valor Total Cliente: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['val_total_cliente']); ?></span><br>
                                  Outro Valor dos Itens do Parceiro: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['out_valor_itens_parceiro']); ?></span><br>
                                  Outro Porcento Desconto: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['out_porcento_desconto']); ?></span><br>

                                  Outro Desconto: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['out_desconto']); ?></span><br>
                                  Outro Total Parceiro: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['out_total_parceiro']); ?></span><br>
                                  Outro Markup Parceiro: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['out_markup_parceiro']); ?></span><br>

                                  Outro Total Fábrica: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['out_total_fabrica']); ?></span><br>
                                  Outro Markup Fábrica: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['out_markup_fabrica']); ?></span><br>
                                  Observação OP: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['obs_observacao_op']); ?></span><br>

                                  Aprovação Cliente: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['ap_cli_aprovacao_cliente']); ?></span><br>
                                  Aprovação Cliente Data: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['ap_cli_aprovacao_cliente_data']); ?></span><br>
                                  Cliente Retira: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['ap_cli_cliente_retira']); ?></span><br>

                                  Aprovação Cliente Pedido Parceiro: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['ap_cli_pedido_parceiro']); ?></span><br>
                                  Aprovação Parceiro: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['ap_parc_aprovacao_parceiro']); ?></span><br>
                                  Aprovação Andamento Parceiro: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['ap_parc_andamento_parceiro']); ?></span><br>

                                  Aprovação Parceiro Entregue Data: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['ap_parc_entregue_data']); ?></span><br>
                                  Aprovação Parceiro Vendedor Interno: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['ap_parc_vendedor_interno']); ?></span><br>
                                  Aprovação Parceiro Vendedor Externo: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['ap_parc_vendedor_externo']); ?></span><br>

                                  Aprovação Parceiro Vendedor Pedido: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['ap_parc_vendedor_pedido']); ?></span><br>
                                  Aprovação Parceiro Fábrica: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['ap_fab_aprovacao_fabrica']); ?></span><br>
                                  Aprovação Parceiro Fábrica Data: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['ap_fab_pedido_fabrica_data']); ?></span><br>

                                  Aprovação Fábrica Andamento: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['ap_fab_andamento']); ?></span><br>
                                  Data de Aprovação da Fábrica Entrou em Podução: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['ap_fab_entrou_producao_data']); ?></span><br>
                                  Aprovação Fábrica Produzido: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['ap_fab_produzido']); ?></span><br>
                                  Aprovação Fábrica Entregue: <span class="fs-sm text-muted"><?php echo addslashes($row_clientes_id['ap_fab_entregue']); ?></span><br>
                            </address>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- END Shipping Address -->
                        </div>
                    </div>
                    <!-- END Customer --> 
                                     
                </div>
                </div>
              </div>
              <!-- END Latest Orders -->
            
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
