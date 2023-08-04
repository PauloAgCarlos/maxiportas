<?php
    require_once "../controllers/controllers_vidros.php";

    if(isset($_POST['btn_atualizar_vidros'])):

        $descricao = addslashes($_POST['descricao']);
        $agregar = addslashes($_POST['agregar']);
        $unidade = addslashes($_POST['unidade']);
        $liberado_para = addslashes($_POST['liberado_para']);  
        $permite_pintura = addslashes($_POST['permite_pintura']);      
        $codigo_da_fabrica = addslashes($_POST['codigo_da_fabrica']);
        $codigo_unico = uniqid();
        $codigo_produto = "CVHJ-". substr($codigo_unico, 10);
        $observacao = addslashes($_POST['observacao']);
        $custo_metro = addslashes($_POST['custo_metro']);
        $markup = addslashes($_POST['markup']);
        $markup_avulso = addslashes($_POST['markup_avulso']);
        $metragem_minima = addslashes($_POST['metragem_minima']);
        $valor = addslashes($_POST['valor']);
        $valor_avulso = addslashes($_POST['valor_avulso']);
        $valor_com_perda = addslashes($_POST['valor_com_perda']);
        $perda = addslashes($_POST['perda']);
        $perda_avulso = addslashes($_POST['perda_avulso']);
        $perda_bordas = addslashes($_POST['perda_bordas']);
        $perda_corte = addslashes($_POST['perda_corte']);
        $perda_bordas_retalho = addslashes($_POST['perda_bordas_retalho']);
        $perda_corte_retalho = addslashes($_POST['perda_corte_retalho']);
        $dimensao = addslashes($_POST['dimensao']);
        $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
        $ativo = addslashes($_POST['ativo']);
        $id_atualizar = $_POST['id_atualizar'];        

        $controllers_vidros = new controllers_vidros();
        $atualizar = $controllers_vidros->atualizar_vidros($descricao, $agregar, $unidade, $liberado_para, $permite_pintura, $codigo_da_fabrica, $codigo_produto, $observacao, $custo_metro, $markup, $markup_avulso, $metragem_minima, $valor, $valor_avulso, $valor_com_perda, $perda, $perda_avulso, $perda_bordas, $perda_corte, $perda_bordas_retalho, $perda_corte_retalho, $dimensao, $ultima_alteracao, $ativo, $id_atualizar);
        if($atualizar)
        {
            header('Location: visualizar_vidros.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_vidros.php?nao-atualizado');
        }
    endif;
?>