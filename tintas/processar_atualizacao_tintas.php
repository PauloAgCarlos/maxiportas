<?php
    require_once "../controllers/controllers_tintas.php";

    if(isset($_POST['btn_atualizar_tintas'])):

        $descricao = addslashes($_POST['descricao']);
        $codigo_produto = addslashes($_POST['codigo_produto']);
        $unidade = addslashes($_POST['unidade']);
        $codigo_da_fabrica = addslashes($_POST['codigo_da_fabrica']);      
        $custo_grama = addslashes($_POST['custo']);
        $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
        $ativo = addslashes($_POST['ativo']);
        $id_atualizar = $_POST['id_atualizar'];      

        $controllers_tintas = new controllers_tintas();
        $atualizar = $controllers_tintas->atualizar_tintas($descricao, $codigo_produto, $unidade, $custo_grama, $codigo_da_fabrica, $ultima_alteracao, $ativo, $id_atualizar);     

        if($atualizar)
        {
            header('Location: visualizar_tintas.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_tintas.php?nao-atualizado');
        }
    endif;
?>