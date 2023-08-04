<?php
    require_once "../controllers/controllers_travessas.php";

    if(isset($_POST['btn_atualizar_travessas'])):

        $descricao = addslashes($_POST['descricao']);
        $agregar = addslashes($_POST['agregar']);
        $unidade = addslashes($_POST['unidade']);
        $esquadreta = addslashes($_POST['esquadreta']);
        $oculto = addslashes($_POST['oculto']);
        $referencias_do_mercado = addslashes($_POST['referencias_do_mercado']);        
        $custo_metro = addslashes($_POST['custo_metro']);
        $markup = addslashes($_POST['markup']);
        $valor = addslashes($_POST['valor']);
        $desconto_corte_vidro = addslashes($_POST['desconto_corte_vidro']);
        $perda = addslashes($_POST['perda']);
        $perda_bordas = addslashes($_POST['perda_bordas']);
        $perda_corte = addslashes($_POST['perda_corte']);
        $dimensao = addslashes($_POST['dimensao']);
        $perda_bordas_retalho = addslashes($_POST['perda_bordas_retalho']);
        $perda_corte_retalho = addslashes($_POST['perda_corte_retalho']);
        $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
        $ativo = addslashes($_POST['ativo']);
        $id_atualizar = $_POST['id_atualizar'];      

        $controllers_travessas = new controllers_travessas();
        $atualizar = $controllers_travessas->atualizar_travessas($descricao, $agregar, $unidade, $esquadreta, $oculto, $referencias_do_mercado, $custo_metro, $markup, $valor, $desconto_corte_vidro, $perda, $perda_bordas, $perda_corte, $dimensao, $perda_bordas_retalho, $perda_corte_retalho, $ultima_alteracao, $ativo, $id_atualizar);     

        if($atualizar)
        {
            header('Location: visualizar_travessas.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_travessas.php?nao-atualizado');
        }
    endif;
?>