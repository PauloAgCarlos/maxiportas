<?php
    require_once "../controllers/controllers_cores.php";

    if(isset($_POST['btn_atualizar_cores'])):

        $descricao = addslashes($_POST['descricao']);
        $codigo_produto_digitado = addslashes($_POST['codigo_produto']);
        $codigo_produto = "CCorHJ-". $codigo_produto_digitado;
        $observacao = addslashes($_POST['observacao']);
        $custo = addslashes($_POST['custo']); 
        $markup = addslashes($_POST['markup']); 
        $valor = addslashes($_POST['valor']);  
        $rendimento = addslashes($_POST['rendimento']);    
        $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
        $ativo = addslashes($_POST['ativo']);
        $id_atualizar = $_POST['id_atualizar'];        

        $controllers_cores = new controllers_cores();
        $atualizar = $controllers_cores->atualizar_cores($descricao, $codigo_produto, $observacao, $custo, $markup, $valor, $rendimento, $ultima_alteracao, $ativo, $id_atualizar);
        if($atualizar)
        {
            header('Location: visualizar_cores.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_cores.php?nao-atualizado');
        }
    endif;
?>