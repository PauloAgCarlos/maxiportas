<?php
    require_once "../controllers/controllers_produtos.php";

    if(isset($_POST['btn_atualizar_produtos'])):

        $descricao_do_produto = addslashes($_POST['descricao_do_produto']);
        $codigo_produto_digitado = addslashes($_POST['codigo_produto']);
        $codigo_produto = "CProdHJ-". $codigo_produto_digitado;
        $codigo_da_fabrica = addslashes($_POST['codigo_da_fabrica']);
        $referencia = addslashes($_POST['referencia']);
        $libera_para_venda = addslashes($_POST['libera_para_venda']); 
        $bloqueia_estoque_negativo = addslashes($_POST['bloqueia_estoque_negativo']); 
        $embalagem_fornecedor = addslashes($_POST['embalagem_fornecedor']);      
        $consumo_medio = addslashes($_POST['consumo_medio']);
        $massa = addslashes($_POST['massa']);
        $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
        $ativo = addslashes($_POST['ativo']);
        $custo_atual = addslashes($_POST['custo_atual']);
        $markup = addslashes($_POST['markup']);
        $venda = addslashes($_POST['venda']);
        $ipi = addslashes($_POST['ipi']);
        $unidade_basica = addslashes($_POST['unidade_basica']);
        $estoque = addslashes($_POST['estoque']);
        $estoque_minimo = addslashes($_POST['estoque_minimo']);
        $estoque_de_seguranca = addslashes($_POST['estoque_de_seguranca']);
        $tempo_de_reposicao = addslashes($_POST['tempo_de_reposicao']);
        $linha = addslashes($_POST['linha']);
        $embalagem = addslashes($_POST['embalagem']);
        $localizador = addslashes($_POST['localizador']);
        $classificacao_fiscal = addslashes($_POST['classificacao_fiscal']);
        $volume = addslashes($_POST['volume']);
        $id_atualizar = $_POST['id_atualizar'];        

        $controllers_produtos = new controllers_produtos();
        $atualizar = $controllers_produtos->atualizar_produtos($descricao_do_produto, $codigo_produto, $codigo_da_fabrica, $referencia, $libera_para_venda, $bloqueia_estoque_negativo, $embalagem_fornecedor, $consumo_medio, $massa, $ultima_alteracao, $ativo, $custo_atual, $markup, $venda, $ipi, $unidade_basica, $estoque, $estoque_minimo, $estoque_de_seguranca, $tempo_de_reposicao, $linha, $embalagem, $localizador, $classificacao_fiscal, $volume, $id_atualizar);
        if($atualizar)
        {
            header('Location: visualizar_produtos.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_produtos.php?nao-atualizado');
        }
    endif;
?>