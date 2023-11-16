<?php
    require_once "../controllers/controllers_unidades_de_produto.php";

    if(isset($_POST['btn_atualizar_unidades_de_produto'])):

        $descricao = addslashes($_POST['descricao']);
        $codigo_produto = addslashes($_POST['codigo_produto']);
        $codigo_interno = addslashes($_POST['codigo_interno']);
        $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
        $ativo = addslashes($_POST['ativo']);
        $id_atualizar = $_POST['id_atualizar'];      

        $controllers_unidades_de_produto = new controllers_unidades_de_produto();
        $atualizar = $controllers_unidades_de_produto->atualizar_unidades_de_produto($descricao, $codigo_produto, $unidade, $custo_grama, $codigo_da_fabrica, $ultima_alteracao, $ativo, $id_atualizar);     

        if($atualizar)
        {
            header('Location: visualizar_unidades_de_produto.php?atualizado');
        }
        else 
        {
            header('Location: visualizar_unidades_de_produto.php?nao-atualizado');
        }
    endif;
?>