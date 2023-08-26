<?php
    require_once "../controllers/controllers_parametros.php";

    if(isset($_POST['btn_atualizar_parametros'])):

        $descricao = addslashes($_POST['descricao']);
        $codigo_produto_digitado = addslashes($_POST['codigo_produto']);
        $codigo_produto = "CParnHJ-" . $codigo_produto_digitado;
        $valor = addslashes($_POST['valor']);
        $observacao = addslashes($_POST['observacao']);
        $id_atualizar = $_POST['id_atualizar'];      

        $controllers_parametros = new controllers_parametros();
        $atualizar = $controllers_parametros->atualizar_parametros($descricao, $codigo_produto, $valor, $observacao, $id_atualizar);     

        if($atualizar)
        {
            header('Location: visualizar_parametros.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_parametros.php?nao-atualizado');
        }
    endif;
?>