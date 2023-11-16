<?php
    require_once "../controllers/controllers_parceiros.php";

    if(isset($_POST['btn_atualizar_parceiros'])):

        $cnpj = addslashes($_POST['cnpj']);
        $nome = addslashes($_POST['nome']);
        $password = addslashes($_POST['password']);
        $email = addslashes($_POST['email']);
        $atividade_principal = addslashes($_POST['atividade_principal']);
        $endereco = addslashes($_POST['endereco']);
        $abertura = addslashes($_POST['abertura']);
        $porte = addslashes($_POST['porte']);
        $situacao = addslashes($_POST['situacao']);
        $tipo = addslashes($_POST['tipo']);
        $fantasia = addslashes($_POST['fantasia']);
        $natureza_juridica = addslashes($_POST['natureza_juridica']);
        $nivel = addslashes($_POST['nivel']);
        $id_atualizar = $_POST['id_atualizar'];         

        $controllers_parceiros = new controllers_parceiros();
        $atualizar = $controllers_parceiros->atualizar_parceiros($cnpj, $nome, $password, $email, $atividade_principal, $endereco, $abertura, $porte, $situacao, $tipo, $fantasia, $natureza_juridica, $nivel, $id_atualizar);

        if($atualizar)
        {
            header('Location: visualizar_parceiros.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_parceiros.php?nao-atualizado');
        }
    endif;
?>