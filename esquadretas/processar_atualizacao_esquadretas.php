<?php
    require_once "../controllers/controllers_esquadretas.php";

    if(isset($_POST['btn_atualizar_esquadretas'])):

        $descricao = addslashes($_POST['descricao']);
        $observacao = addslashes($_POST['observacao']);
        $custo_metro = addslashes($_POST['custo_metro']);
        $markup = addslashes($_POST['markup']);  
        $valor_unitario = addslashes($_POST['valor_unitario']);      
        $agregar = addslashes($_POST['agregar']);
        $unidade = addslashes($_POST['unidade']);
        $imagem = $_FILES['imagem'];
        $codigo_da_fabrica = addslashes($_POST['codigo_da_fabrica']);
        $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
        $ativo = addslashes($_POST['ativo']);
        $id_atualizar = $_POST['id_atualizar'];        

        $controllers_esquadretas = new controllers_esquadretas();
        $atualizar = $controllers_esquadretas->atualizar_esquadretas($descricao, $observacao, $custo_metro, $markup, $valor_unitario, $agregar, $unidade, $codigo_da_fabrica, $ultima_alteracao, $ativo, $id_atualizar);
        if($atualizar)
        {
            header('Location: visualizar_esquadretas.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_esquadretas.php?nao-atualizado');
        }
    endif;
?>