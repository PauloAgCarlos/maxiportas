<?php
    // session_start();
    require_once "../conexao-bd.php";
    // ob_start();
    // session_destroy();
    if(!isset($_SESSION['email'])){
        header('location: ../login.php');
    }
    $email = $_SESSION['email'];
    $selecinarUserLogado = $conn->prepare("SELECT * FROM logado WHERE email = :email");
    $selecinarUserLogado->bindValue(':email', $email);
    $selecinarUserLogado->execute();
    $row = $selecinarUserLogado->fetch(PDO::FETCH_ASSOC);

?>
<!-- Header -->
<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
    <!-- Left Section -->
    <div class="space-x-1">
        <!-- Toggle Sidebar -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
        <button type="button" class="btn btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
        <i class="fa fa-fw fa-bars"></i>
        </button>
        <span class="d-sm-inline-block">Bem vindo(a), <?php echo $row['nome']; ?></span>
         <!-- Open Search Section -->
            <!-- END Open Search Section -->
        
        <!-- END Toggle Sidebar -->
    </div>
    <!-- END Left Section -->

    
    <div style="display: flex; justify-content: space-between;">
        
            <!-- Notifications Dropdown -->
            <div class="dropdown d-inline-block">
              <button type="button" class="btn btn-alt-secondary" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php
                    //Começa AQui        
                    require_once "../config.php";
                    try
                    {
                        $conn = new PDO("mysql:host=$DBHOST;dbname=" . $DBNAME, $DBUSER, $DBPASS);
                    }
                    catch(PDOException $error)
                    {
                        die("Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado: " . $error->getMessage());
                    }

                    //produtos
                    $stock_seguranca = 5;
                    $result_produtos = $conn->prepare("SELECT quantidade_stock FROM produtos WHERE quantidade_stock <= 5");
                    // $result_produtos->bindParam(":quantidade_stock", $stock_seguranca);
                    $result_produtos->execute();
                    $row_prod = $result_produtos->fetchAll(PDO::FETCH_ASSOC); ?>
                    
                    <span style="color: #f00; font-size: 0.9em; position: relative; margin-top: -13px; margin-right: -8px !important; float: right;"><?php echo count($row_prod); ?></span>
                
                <i class="fa fa-fw fa-bell"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                <div class="bg-primary-dark rounded-top fw-semibold text-white text-center p-3">
                  Notificações
                </div>
                <ul class="nav-items my-2">
                  <?php
                    //Começa AQui        
                    try
                    {
                        $conn = new PDO("mysql:host=$DBHOST;dbname=" . $DBNAME, $DBUSER, $DBPASS);
                    }
                    catch(PDOException $error)
                    {
                        die("Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado: " . $error->getMessage());
                    }

                    //produtos
                    $result_produtos = $conn->prepare("SELECT descricao_do_produto, quantidade_stock FROM produtos WHERE quantidade_stock <= 5 ORDER BY id DESC");
                    // $result_produtos->bindValue(":quantidade_stock", 5);
                    $result_produtos->execute();
                    $row_produtos = $result_produtos->fetchAll(PDO::FETCH_ASSOC);
                    // echo "<pre>";
                    // var_dump($row_produtos);

                    if(count($row_produtos) > 0)
                    {
                      // for($i = 0; $i < count($row_produtos); $i++){

                        if($row_produtos[0]['quantidade_stock'] <= 5)
                        {   
                        
                          foreach($row_produtos as $ro){ ?>
                            <li>
                              <a class="d-flex text-dark py-2" href="">
                                <div class="flex-shrink-0 mx-3">
                                  <i class="fa fa-fw fa-exclamation-circle text-warning"></i>
                                </div>
                                <div class="flex-grow-1 fs-sm pe-1">
                                  <div class="fw-semibold">
                                      <?php
                                        echo "<p style='color: #343a40d6'>Produto: <span>". $ro['descricao_do_produto'] . "</span> está com Stock mínimo de <span style='color: #f00;'> " . $ro['quantidade_stock'] . " Quantidade(s).<span><br></p>";                                      
                                      ?>
                                  </div>
                                </div>
                              </a>
                            </li>
                    <?php } } } else{ ?>
                  <li>
                    <a class="d-flex text-dark py-2" href="">
                      <div class="flex-shrink-0 mx-3">
                        <i class="fa fa-fw fa-times-circle text-success"></i>
                      </div>
                      <div class="flex-grow-1 fs-sm pe-2">
                        <div class="fw-semibold">
                            Sem Stock Mínimo
                        </div>
                      </div>
                    </a>
                  </li>
                  <?php }?>
                </ul>
              </div>
            </div>
            <!-- END Notifications Dropdown -->


        <!-- Right Section -->
        <div class="space-x-1 ms-1">
            <!-- User Dropdown -->
            <div class="dropdown d-inline-block" style="display: none !important;">
                <span class="d-sm-inline-block">Bem vindo(a), <?php echo $row['nome']; ?></span>
            </div>  
            <div class="dropdown d-inline-block">
            <button type="button" class="btn btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-fw fa-user"></i>
                <i class="fa fa-fw fa-angle-down opacity-50 ms-1 d-none d-sm-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
                
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
    <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Loader -->
    <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-header-dark">
    <div class="bg-white-10">
        <div class="content-header">
        <div class="w-100 text-center">
            <i class="fa fa-fw fa-sun fa-spin text-white"></i>
        </div>
        </div>
    </div>
    </div>
    <!-- END Header Loader -->
</header>
<!-- END Header -->