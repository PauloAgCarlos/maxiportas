<?php
    require_once "../controllers/controllers_perfil.php";

    if(isset($_POST['btn_atualizar_perfil'])):

        $descricao = addslashes($_POST['descricao']);
        $puxadoracoplado = addslashes($_POST['puxadoracoplado']);
        $ponteira_acoplado = addslashes($_POST['ponteira_acoplado']);
        $ponteira_obrigatoria = addslashes($_POST['ponteira_obrigatoria']);
        $exige_pinturano_vidro = addslashes($_POST['exige_pinturano_vidro']);
        $agregar = addslashes($_POST['agregar']);
        $unidade = addslashes($_POST['unidade']);
        $vidro = addslashes($_POST['vidro']);
        $esquadreta = addslashes($_POST['esquadreta']);
        $esquadreta_reforcada_a = addslashes($_POST['esquadreta_reforcada_a']);
        $esquadreta_reforcada_b = addslashes($_POST['esquadreta_reforcada_b']);
        $esquadreta_dupla = addslashes($_POST['esquadreta_dupla']);
        $custo_metro = addslashes($_POST['custo_metro']);        
        $desconto_corte_perfil = addslashes($_POST['desconto_corte_perfil']);
        $desconto_corte_vidro = addslashes($_POST['desconto_corte_vidro']);
        $desconto_corte_travessa = addslashes($_POST['desconto_corte_travessa']);
        $desconto_corte_travessa_oculta = addslashes($_POST['desconto_corte_travessa_oculta']);
        $perda_bordas = addslashes($_POST['perda_bordas']);
        $perda_corte = addslashes($_POST['perda_corte']);
        $dimensao = addslashes($_POST['dimensao']);
        $perda_bordas_retalho = addslashes($_POST['perda_bordas_retalho']);
        $perda_corte_retalho = addslashes($_POST['perda_corte_retalho']);
        $codigo_produto = addslashes($_POST['codigo_produto']);
        $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
        $largura_da_mascara = addslashes($_POST['largura_da_mascara']);
        $codigo_da_fabrica = addslashes($_POST['codigo_da_fabrica']);
        $referencias_do_mercado = addslashes($_POST['referencias_do_mercado']);
        $detalhes = addslashes($_POST['detalhes']);
        $ativo = addslashes($_POST['ativo']);
        $id_atualizar = $_POST['id_atualizar'];

        $controllers_perfil = new controllers_perfil();
        $atualizar = $controllers_perfil->atualizar_perfil($descricao, $puxadoracoplado, $ponteira_acoplado, $ponteira_obrigatoria, $exige_pinturano_vidro, $agregar, $unidade, $vidro, $esquadreta, $esquadreta_reforcada_a, $esquadreta_reforcada_b, $esquadreta_dupla, $custo_metro, $desconto_corte_perfil, $desconto_corte_vidro, $desconto_corte_travessa, $desconto_corte_travessa_oculta, $perda_bordas, $perda_corte, $dimensao, $perda_bordas_retalho, $perda_corte_retalho, $codigo_produto, $ultima_alteracao, $largura_da_mascara, $codigo_da_fabrica, $referencias_do_mercado, $detalhes, $ativo, $id_atualizar);        

        if($atualizar)
        {
            header('Location: visualizar_perfil.php');
        }
        else 
        {
            header('Location: visualizar_perfil.php?error');
        }
    endif;
?>