<?php
    require_once "../controllers/controllers_forma_de_pagamento.php";

    if(isset($_POST['btn_atualizar_forma_de_pagamento'])):

        $descricao = addslashes($_POST['descricao']);
        $codigo_produto_digitado = addslashes($_POST['codigo_produto']);
        $codigo_produto = "CItemAg-". $codigo_produto_digitado;
        $id_atualizar = $_POST['id_atualizar'];        

        $controllers_forma_de_pagamento = new controllers_forma_de_pagamento();
        $atualizar = $controllers_forma_de_pagamento->atualizar_forma_de_pagamento($descricao, $codigo_produto, $id_atualizar);
        if($atualizar)
        {
            header('Location: visualizar_forma_de_pagamento.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_forma_de_pagamento.php?nao-atualizado');
        }
    endif;
?>