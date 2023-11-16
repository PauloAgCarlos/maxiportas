<!doctype html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Language" content="pt-BR">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HJ Alúminio</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
<meta name="description" content="HJ Alúminio">
<meta name="msapplication-tap-highlight" content="no">

    <link rel="shortcut icon" href="../assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/media/favicons/apple-touch-icon-180x180.png">
    <link rel="stylesheet" id="css-main" href="../assets/css/dashmix.min.css">
    <script src="../assets/js/cdn.jsdelivr.net_npm_sweetalert2@11.0.18_dist_sweetalert2.all.min.js"></script>

<link href="main.d810cf0ae7f39f28f336.css" rel="stylesheet"></head>

<!--Trumbowig-->
<link rel="stylesheet" href="dist/ui/trumbowyg.min.css">
<link rel="stylesheet" href="dist/plugins/emoji/ui/trumbowyg.emoji.min.css">

<!--SwitAlert Success ao Cadastrar-->
<script src="../assets/js/cdn.jsdelivr.net_npm_sweetalert2@11.0.18_dist_sweetalert2.all.min.js"></script>

<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
<div class="app-header header-shadow">
<div class="app-header__logo">
<!-- <div class="logo-src"></div> -->
<div>
    <div class="content-header bg-white-5">
    <!-- Logo -->
    <a class="fw-semibold text-white tracking-wide">
        <span class="smini-visible">
        M<span class="opacity-75">P</span>
        </span>
        <span class="smini-hidden">
        <img style="margin-left: -15px; height: 55px; width: 132%;" src="../assets/img/logoHJ-Aluminio-Sidebarr.jpg" alt="logoHJ-Alumínio">
        </span>
    </a>
    <!-- END Logo -->
    </div>
</div>
<div class="header__pane ml-auto">
<div>
<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
<span class="hamburger-box">
<span class="hamburger-inner"></span>
</span>
</button>
</div>
</div>
</div>
<div class="app-header__mobile-menu">
<div>
<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
<span class="hamburger-box">
<span class="hamburger-inner"></span>
</span>
</button>
</div>
</div>
<div class="app-header__menu">

<div class="space-x-1">  
  <div class="dropdown d-inline-block">
      <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <a href="../logout.php">
            <i class="far fa-fw fa-arrow-alt-circle-left me-1"></i>
        </a>
      </button>
  </div>
</div> 
</div> 


<div class="app-header__content">
<div class="app-header-right">
<div class="header-btn-lg pr-0">
<div class="widget-content p-0">
<div class="widget-content-wrapper">
<div class="widget-content-left">
<div class="btn-group">

<?php
    session_start();
    require_once "../conexao-bd.php";

    if(!isset($_SESSION['email'])){
        header('location: ../login.php');
    }
    $email = $_SESSION['email'];
    $selecinarUserLogado = $conn->prepare("SELECT * FROM logado WHERE email = :email");
    $selecinarUserLogado->bindValue(':email', $email);
    $selecinarUserLogado->execute();
    $row = $selecinarUserLogado->fetch(PDO::FETCH_ASSOC);

?>
  <div class="space-x-1">
     <!-- User Dropdown -->
     <div class="dropdown d-inline-block">
        <span class="d-sm-inline-block">Bem vindo(a), <?php echo $row['nome']; ?></span>
    </div>  
    <div class="dropdown d-inline-block">
        <button type="button" class="btn btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-user"></i>
            <i class="fa fa-fw fa-angle-down opacity-50 ms-1 d-none d-sm-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end p-0 " aria-labelledby="page-header-user-dropdown">
            
            <div class="p-2">
                <div role="separator" class="dropdown-divider"></div>
                <a class="dropdown-item" href="../logout.php">
                    <i class="far fa-fw fa-arrow-alt-circle-left me-1"></i> Terminar Sessão
                </a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
 </div>
</div>
</div>


<div class="app-main">
<div class="app-sidebar sidebar-shadow">
<div class="app-header__logo">
<div class="logo-src"></div>
<div class="header__pane ml-auto">
</div>
</div>
<div class="app-header__menu">
<span>
<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
<span class="btn-icon-wrapper">
<i class="fa fa-ellipsis-v fa-w-6"></i>
</span>
</button>
</span>
</div> 

<div class="scrollbar-sidebar" style="background-color: rgb(0, 0, 50) !important;">
<div class="app-sidebar__inner">
<ul class="vertical-nav-menu">
<li class="app-sidebar__heading">Menu</li>
<li class="mm-active">
<a href="index.php" class="mm-active">
<i class="nav-main-link-icon fa fa-location-arrow"></i>
<span class="nav-main-link-name">Página Inicial</span>
</a>
<ul>
<li>
<a href="solicitar_orcamento.php" class="Amm-active">
<i class="nav-main-link-icon fa fa-rocket text-white"></i>
<span class="nav-main-link-name text-white">Solicitar Orçamento</span>
</a>
</li>

<li>
<a href="index.php" class="Amm-active">
<i class="nav-main-link-icon fa fa-rocket text-white"></i>
<span class="nav-main-link-name text-white">Ordens de Serviço</span>
</a>
</li>

<li>
<a href="index.php" class="Amm-active">
<i class="nav-main-link-icon fa fa-rocket text-white"></i>
<span class="nav-main-link-name text-white">Compras</span>
</a>
</li>

</ul>
</li>

<li class="app-sidebar__heading">Conta</li>
<li>
<a href="#">
<i class="fa fa-fw fa-user text-white"></i> 
<span class="nav-main-link-name text-white">Minha Conta</span>
</a>
</li>
 

</li>
</ul>
</div>
</div>
</div>
<div class="app-main__outer">
<div class="app-main__inner">

    


<div class="tabs-animation">
<div class="mb-3 card">

<div class="no-gutters row">

      <!-- Main Container -->
      <main id="main-container">
        
        <div class="block block-rounded mb-5">
            <div class="block-header block-header-default">
              <h3 class="block-title mt-3">Solicitar Orçamento</h3>
            </div>

            <div class="block-header block-header-default">
              <h3 class="block-title mt-3 text-center p-2 mb-1" style="background-color: #ccffff; color:blue;">Preencha os campos abaixo detalhando o que você precisa. Campos com asterisco são obrigatórios.</h3>
            </div>
            <!-- Reply -->
            <div class="block block-rounded">

            <form action="solicitar_orcamento.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="nome_cliente" value="<?= $row['nome']; ?>" id="">
              <input type="hidden" name="data_inicial" value="<?= date("d/m/Y") ?>" >
              <input type="hidden" name="data_final" value="<?= date("d/m/Y") ?>" >
              <input type="hidden" name="status" value="Em Andamento" >
              
              <!-- <div class="mb-1">
                <label class="form-label" for="codigo_produto" style="font-size: 0.9em;">Produto</label> <span style="color: red;">*</span>
                <div>
                  <select name="produto_servico" class="form-control">
                    <php

                      try
                      {
                          $conn = new PDO("mysql:host=$host;dbname=" . $bd_name, $user, $password);
                      }
                      catch(PDOException $error)
                      {
                          die("Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado: " . $error->getMessage());
                      }
                      $result_travessas = $conn->prepare("SELECT descricao FROM travessas ORDER BY id DESC");
                      $result_travessas->execute();
                      $row = $result_travessas->fetchAll(PDO::FETCH_ASSOC);

                    ?>
              
                    <option>Selecione o tipo de Produto/Serviço</option>  
                    <optgroup>
                      <php foreach($row as $row_travessas){ ?>                  
                        <option value="<php echo addslashes($row_travessas['descricao']); ?>"><php echo addslashes($row_travessas['descricao']); ?></option>                
                      <php }?> 
                    </optgroup>

                    <option value="Finalizado">Finalizado</option>
                  </select>
                </div>
              </div> -->
            <div class="block">
              <div class="block-header block-header-default" style="margin-bottom: -40px;">
                <a class="btn btn-alt-secondary" href="solicitar_orcamento.php">
                  Descrição Produto/Serviço
                </a>
              </div>
              <div class="block-content" >
                <div class="row justify-content-center push">
                  <div class="col-md-12">                   
                      <textarea name="descricao_pedido" id="trumbowyg-editor"  class="form-control" style="font-size: 0.8em;"></textarea>
                  </div>
                </div>
                <div style="display: flex; align-items: center; justify-content: center;">

                  <div class="mb-4" style="display: flex; align-items: center; justify-content: center;">
                    <div class="block-content">
                      <div>
                        <div class="col-md-12">
                          <button type="submit" name="btn_enviar_solicitacao" class="btn bg-primary text-white fs-6">
                            <i class="fa fa-fw fa-check opacity-50 me-1"></i> Enviar Solicitação
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
              
            </div>
          </form>
          <?php include "tb.php"; ?>
            </div>
            <!-- END Reply -->
          </div>
      </main>
</div>
</div>
</div>
</div>


<!-- Footer -->
<footer id="page-footer" class="bg-body-light">
  <div class="content py-0">
    <style>
      @media screen and (min-width: 550px) {
        #form_mobile
        {
          display: flex;
          justify-content: space-between;
        }
      }
    </style>
    <div id="form_mobile" class="Arow fs-sm">
      <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-end">
          Feito com <i class="fa fa-heart text-danger"></i> por <a class="fw-semibold" href="http://devaholic.ao/" target="_blank">Devaholic</a>
      </div>
      <div class="col-sm-6 order-sm-1 text-center text-sm-start">
          <a class="fw-semibold" href="https://devaholic.ao" target="_blank">Devaholic</a> &copy; <span>2023 | <?php echo Date('Y'); ?></span>
      </div>
    </div>
  </div>
</footer>
<script src="../assets/js/dashmix.app.min.js"></script>

<!-- Page JS Plugins -->
<script src="../assets/js/plugins/chart.js/chart.min.js"></script>

<!-- Page JS Code -->
<script src="../assets/js/pages/be_pages_dashboard.min.js"></script>
</div>
</div>
</div>
<div class="app-drawer-overlay d-none animated fadeIn">

</div>
<script type="text/javascript" src="assets/scripts/main.d810cf0ae7f39f28f336.js"></script>

</body>
</html>

<?php require_once "cadastrar_solicitacao.php"; ?>