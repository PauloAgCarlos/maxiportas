<?php
    require_once "../controllers/controllers_movimentacao_consumo_de_materia_prima.php";

    if(isset($_POST['btn_atualizar_consumo_de_materia_prima'])):

        $descricao = addslashes($_POST['descricao']);
        $codigo_produto_digitado = addslashes($_POST['codigo_produto']);
        $codigo_produto = "CConMatPriHJ-" . $codigo_produto_digitado;
        $codigo_da_fabrica = addslashes($_POST['codigo_da_fabrica']);
        $tipo = addslashes($_POST['tipo']);
        $unidade = addslashes($_POST['unidade']);
        $op = addslashes($_POST['op']);
        $consumo = addslashes($_POST['consumo']);        
        $perda = addslashes($_POST['perda']);
        $total = addslashes($_POST['total']);
        $data_pedido = addslashes($_POST['data_pedido']);
        $entrou_em_producao = addslashes($_POST['entrou_em_producao']);
        $produzido = addslashes($_POST['produzido']);
        $ativo = addslashes($_POST['ativo']);
        $id_atualizar = $_POST['id_atualizar'];      

        $controllers_movimentacao_consumo_de_materia_prima = new controllers_movimentacao_consumo_de_materia_prima();
        $atualizar = $controllers_movimentacao_consumo_de_materia_prima->atualizar_movimentacao_consumo_de_materia_prima($descricao, $codigo_produto, $codigo_da_fabrica, $tipo, $unidade, $op, $consumo, $perda, $total, $data_pedido, $entrou_em_producao, $produzido, $ativo, $id_atualizar);     

        if($atualizar)
        {
            header('Location: visualizar_consumo_de_materia_prima.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_consumo_de_materia_prima.php?nao-atualizado');
        }
    endif;
?>