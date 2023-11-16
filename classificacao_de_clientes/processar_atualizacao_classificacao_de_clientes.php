<?php
    require_once "../controllers/controllers_classificacao_de_clientes.php";

    if(isset($_POST['btn_atualizar_classificacao_de_clientes'])):

        $descricao = addslashes($_POST['descricao']);
        $codigo_produto_digitado = addslashes($_POST['codigo_produto']);
        $codigo_produto = "CItemAg-". $codigo_produto_digitado;
        $id_atualizar = $_POST['id_atualizar'];        

        $controllers_classificacao_de_clientes = new controllers_classificacao_de_clientes();
        $atualizar = $controllers_classificacao_de_clientes->atualizar_classificacao_de_clientes($descricao, $codigo_produto, $id_atualizar);
        if($atualizar)
        {
            header('Location: visualizar_classificacao_de_clientes.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_classificacao_de_clientes.php?nao-atualizado');
        }
    endif;
?>