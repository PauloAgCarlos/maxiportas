<?php
    require_once "../controllers/controllers_acessorios.php";

    if(isset($_POST['btn_atualizar_acessorios'])):

        $descricao = addslashes($_POST['descricao']);
        $codigo_produto = addslashes($_POST['codigo_produto']);
        $quantidade = addslashes($_POST['quantidade']);
        $observacao = addslashes($_POST['observacao']);
        $custo_unitario = addslashes($_POST['custo_unitario']); 
        $markup = addslashes($_POST['markup']); 
        $valor_unitario = addslashes($_POST['valor_unitario']);      
        $unidade = addslashes($_POST['unidade']);
        $tipo_do_acessorio = addslashes($_POST['tipo_do_acessorio']);
        $desconto_corte = addslashes($_POST['desconto_corte']);
        $codigo_da_fabrica = addslashes($_POST['codigo_da_fabrica']);
        $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
        $ativo = addslashes($_POST['ativo']);
        $id_atualizar = $_POST['id_atualizar'];        

        $controllers_acessorios = new controllers_acessorios();
        $atualizar = $controllers_acessorios->atualizar_acessorios($descricao, $codigo_produto, $quantidade, $observacao, $custo_unitario, $markup, $valor_unitario, $unidade, $tipo_do_acessorio, $desconto_corte, $codigo_da_fabrica, $ultima_alteracao, $ativo, $id_atualizar);
        if($atualizar)
        {
            header('Location: visualizar_acessorios.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_acessorios.php?nao-atualizado');
        }
    endif;
?>