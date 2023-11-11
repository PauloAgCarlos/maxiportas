<?php
    require_once "../controllers/controllers_servicos.php";

    if(isset($_POST['btn_atualizar_servicos'])):

        $descricao = addslashes($_POST['descricao']);
        $codigo_produto = addslashes($_POST['codigo_produto']);
        $tipo_de_servico = addslashes($_POST['tipo_de_servico']);
        $exibe_no_orcamento = addslashes($_POST['exibe_no_orcamento']);
        $exibe_na_lista_de_corte = addslashes($_POST['exibe_na_lista_de_corte']);  
        $observacao = addslashes($_POST['observacao']);      
        $custo_metro = addslashes($_POST['custo_metro']);
        $markup = addslashes($_POST['markup']);
        $valor = addslashes($_POST['valor']);
        $adiciona_para_o_corte = addslashes($_POST['adiciona_para_o_corte']);
        $calculo = addslashes($_POST['calculo']);
        $codigo_da_fabrica = addslashes($_POST['codigo_da_fabrica']);
        $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
        $ativo = addslashes($_POST['ativo']);
        $id_atualizar = $_POST['id_atualizar'];        

        $controllers_servicos = new controllers_servicos();
        $atualizar = $controllers_servicos->atualizar_servicos($descricao, $codigo_produto, $tipo_de_servico, $exibe_no_orcamento, $observacao, $custo_metro, $markup, $valor, $adiciona_para_o_corte, $calculo, $codigo_da_fabrica, $ultima_alteracao, $ativo, $id_atualizar);
        if($atualizar)
        {
            header('Location: visualizar_servicos.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_servicos.php?nao-atualizado');
        }
    endif;
?>