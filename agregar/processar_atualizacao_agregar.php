<?php
    require_once "../controllers/controllers_agregar.php";

    if(isset($_POST['btn_atualizar_agregar'])):

        $descricao = addslashes($_POST['descricao']);
        // $codigo_produto_digitado = addslashes($_POST['codigo_produto']);
        // $codigo_produto = "CInHJ-". $codigo_produto_digitado;
        $observacao = addslashes($_POST['observacao']);
        // $custo = addslashes($_POST['custo']); 
        // $markup = addslashes($_POST['markup']); 
        // $valor = addslashes($_POST['valor']);      
        // $unidade = addslashes($_POST['unidade']);
        // $codigo_da_fabrica = addslashes($_POST['codigo_da_fabrica']);
        $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
        $ativo = addslashes($_POST['ativo']);
        $id_atualizar = $_POST['id_atualizar'];        

        $controllers_agregar = new controllers_agregar();
        $atualizar = $controllers_agregar->atualizar_agregar($descricao, $observacao, $ultima_alteracao, $ativo, $id_atualizar);
        if($atualizar)
        {
            header('Location: visualizar_agregar.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_agregar.php?nao-atualizado');
        }
    endif;
?>