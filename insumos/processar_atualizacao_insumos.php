<?php
    require_once "../controllers/controllers_insumos.php";

    if(isset($_POST['btn_atualizar_insumos'])):

        $descricao = addslashes($_POST['descricao']);
        $codigo_produto = addslashes($_POST['codigo_produto']);
        $observacao = addslashes($_POST['observacao']);
        $custo = addslashes($_POST['custo']); 
        $markup = addslashes($_POST['markup']); 
        $valor = addslashes($_POST['valor']);      
        $unidade = addslashes($_POST['unidade']);
        $codigo_da_fabrica = addslashes($_POST['codigo_da_fabrica']);
        $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
        $ativo = addslashes($_POST['ativo']);
        $id_atualizar = $_POST['id_atualizar'];        

        $controllers_insumos = new controllers_insumos();
        $atualizar = $controllers_insumos->atualizar_insumos($descricao, $codigo_produto, $observacao, $custo, $markup, $valor, $unidade, $codigo_da_fabrica, $ultima_alteracao, $ativo, $id_atualizar);
        if($atualizar)
        {
            header('Location: visualizar_insumos.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_insumos.php?nao-atualizado');
        }
    endif;
?>