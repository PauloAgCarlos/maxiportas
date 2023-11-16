<?php
    require_once "../controllers/controllers_financas_condicao_pagamento.php";

    if(isset($_POST['btn_atualizar_financas_condicao_pagamento'])):

        $descricao = addslashes($_POST['descricao']);
        $codigo_produto_digitado = addslashes($_POST['codigo_produto']);
        $codigo_produto = "CFinHJ-" . $codigo_produto_digitado;
        $tipo = addslashes($_POST['tipo']);
        $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
        $ativo = addslashes($_POST['ativo']);
        $numero_de_parcelas = addslashes($_POST['numero_de_parcelas']);
        $markup = addslashes($_POST['markup']);
        $prazo_primeira_parcela_dias = addslashes($_POST['prazo_primeira_parcela_dias']);
        $prazo_segunda_parcela_dias = addslashes($_POST['prazo_segunda_parcela_dias']);        
        $intervalo_entre_parcelas_dias = addslashes($_POST['intervalo_entre_parcelas_dias']);
        $entrada = addslashes($_POST['entrada']);
        $id_atualizar = $_POST['id_atualizar'];      

        $controllers_financas_condicao_pagamento = new controllers_financas_condicao_pagamento();
        $atualizar = $controllers_financas_condicao_pagamento->atualizar_financas_condicao_pagamento($descricao, $codigo_produto, $tipo, $ultima_alteracao, $ativo, $numero_de_parcelas, $markup, $prazo_primeira_parcela_dias, $prazo_segunda_parcela_dias, $intervalo_entre_parcelas_dias, $entrada, $id_atualizar);     

        if($atualizar)
        {
            header('Location: visualizar_financas_condicao_pagamento.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_financas_condicao_pagamento.php?nao-atualizado');
        }
    endif;
?>