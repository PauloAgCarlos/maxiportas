<?php
    require_once "../controllers/controllers_dobradicas.php";

    if(isset($_POST['btn_atualizar_dobradicas'])):

        $descricao = addslashes($_POST['descricao']);
        $codigo_produto_digitado = addslashes($_POST['codigo_produto']);
        $codigo_produto = "CDobHJ-". $codigo_produto_digitado;
        $medida_inicial = addslashes($_POST['medida_inicial']); 
        $medida_final = addslashes($_POST['medida_final']); 
        $quantidade_de_furos = addslashes($_POST['quantidade_de_furos']);      
        $distancia_primeiro_furo = addslashes($_POST['distancia_primeiro_furo']);
        $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
        $ativo = addslashes($_POST['ativo']);
        $id_atualizar = $_POST['id_atualizar'];        

        $controllers_dobradicas = new controllers_dobradicas();
        $atualizar = $controllers_dobradicas->atualizar_dobradicas($descricao, $codigo_produto, $medida_inicial, $medida_final, $quantidade_de_furos, $distancia_primeiro_furo, $ultima_alteracao, $ativo, $id_atualizar);
        if($atualizar)
        {
            header('Location: visualizar_dobradicas.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_dobradicas.php?nao-atualizado');
        }
    endif;
?>