<?php
    require_once "../controllers/controllers_linha_de_produto.php";

    if(isset($_POST['btn_atualizar_linha_de_produto'])):

        $descricao = addslashes($_POST['descricao']);
        $codigo_produto = addslashes($_POST['codigo_produto']);
        $codigo_interno = addslashes($_POST['codigo_interno']);
        $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
        $ativo = addslashes($_POST['ativo']);
        $id_atualizar = $_POST['id_atualizar'];      

        $controllers_linha_de_produto = new controllers_linha_de_produto();
        $atualizar = $controllers_linha_de_produto->atualizar_linha_de_produto($descricao, $codigo_produto, $codigo_interno, $ultima_alteracao, $ativo, $id_atualizar);     

        if($atualizar)
        {
            header('Location: visualizar_linha_de_produto.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_linha_de_produto.php?nao-atualizado');
        }
    endif;
?>