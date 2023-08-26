<?php
    require_once "../controllers/controllers_tipo_do_item_agregar.php";

    if(isset($_POST['btn_atualizar_tipo_do_item_agregar'])):

        $descricao = addslashes($_POST['descricao']);
        $codigo_produto_digitado = addslashes($_POST['codigo_produto']);
        $codigo_produto = "CItemAgHJ-". $codigo_produto_digitado;
        $id_atualizar = $_POST['id_atualizar'];        

        $controllers_tipo_do_item_agregar = new controllers_tipo_do_item_agregar();
        $atualizar = $controllers_tipo_do_item_agregar->atualizar_tipo_do_item_agregar($descricao, $codigo_produto, $id_atualizar);
        if($atualizar)
        {
            header('Location: visualizar_tipo_do_item_agregar.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_tipo_do_item_agregar.php?nao-atualizado');
        }
    endif;
?>