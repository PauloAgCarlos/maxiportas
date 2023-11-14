<?php
    require_once "../controllers/controllers_puxadores.php";

    if(isset($_POST['btn_atualizar_puxadores'])):

        $descricao = addslashes($_POST['descricao']);
        $usinagem_box_tres = addslashes($_POST['usinagem_box_tres']);
        $medida_maxima_para_usinagem = addslashes($_POST['medida_maxima_para_usinagem']);
        $agregar = addslashes($_POST['agregar']);
        $unidade = addslashes($_POST['unidade']);        
        $codigo_da_fabrica = addslashes($_POST['codigo_da_fabrica']);
        $codigo_produto = addslashes($_POST['codigo_produto']);
        $quantidade = addslashes($_POST['quantidade']);
        $ponteira_obrigatoria = addslashes($_POST['ponteira_obrigatoria']);
        $referencias_do_mercado = addslashes($_POST['referencias_do_mercado']);
        $custo_metro = addslashes($_POST['custo_metro']);
        $markup = addslashes($_POST['markup']);
        $metragem_minima = addslashes($_POST['metragem_minima']);
        $valor = addslashes($_POST['valor']);
        $desconto_corte = addslashes($_POST['desconto_corte']);
        $perda = addslashes($_POST['perda']);
        $perda_bordas = addslashes($_POST['perda_bordas']);
        $perda_corte = addslashes($_POST['perda_corte']);
        $dimensao = addslashes($_POST['dimensao']);
        $perda_bordas_retalho = addslashes($_POST['perda_bordas_retalho']);
        $perda_corte_retalho = addslashes($_POST['perda_corte_retalho']);
        $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
        $ativo = addslashes($_POST['ativo']);
        $id_atualizar = $_POST['id_atualizar'];

        $controllers_puxadores = new controllers_puxadores();
        $atualizar = $controllers_puxadores->atualizar_puxadores($descricao, $usinagem_box_tres, $medida_maxima_para_usinagem, $agregar, $unidade, $codigo_da_fabrica, $codigo_produto, $quantidade, $ponteira_obrigatoria, $referencias_do_mercado, $custo_metro, $markup, $metragem_minima, $valor, $desconto_corte, $perda, $perda_bordas, $perda_corte, $dimensao, $perda_bordas_retalho, $perda_corte_retalho, $ultima_alteracao, $ativo, $id_atualizar);
        if($atualizar)
        {
            header('Location: visualizar_puxadores.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_puxadores.php?nao-atualizado');
        }
    endif;
?>