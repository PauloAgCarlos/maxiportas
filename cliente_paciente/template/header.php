<?php
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
<header id="page-header">
    <div class="content-header">
    <div class="space-x-1">
        <button type="button" class="btn btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
        <i class="fa fa-fw fa-bars"></i>
        </button>
    </div>

    <div class="space-x-1">
        <div class="dropdown d-inline-block">
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

    <div id="page-header-loader" class="overlay-header bg-header-dark">
    <div class="bg-white-10">
        <div class="content-header">
        <div class="w-100 text-center">
            <i class="fa fa-fw fa-sun fa-spin text-white"></i>
        </div>
        </div>
    </div>
    </div>
</header>