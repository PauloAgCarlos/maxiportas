<?php

    include "../database.php";

class controllers_ordem_producao extends database
{

    public function inserir($id_uniq, $cliente, $consumidor, $modo, $qtd, $op, $altura, $largura, $imagem_perfil, $perfil_lado_esquerdo, $usinagem_para_esquerdo, $puxador_esquerdo, $perfil_lado_direito, $usinagem_para_direito, $puxador_direito, $perfil_lado_superior, $usinagem_para_superior, $puxador_superior, $perfil_lado_inferior, $usinagem_para_inferior, $puxador_inferior, $vidro, $tv, $servicos, $travessa, $portas_pares, $reforco, $desempenador, $esquadreta, $ponteira, $kit, $portas_valor_item_cliente, $porcento_desconto, $desconto, $produto, $prod_qtd, $prod_usinagem_puxador, $prod_valor_item_cliente, $prod_porcento_desconto, $prod_desconto, $val_forma_pagamento, $val_condicao_pagamento, $val_situacao_financeira, $val_qtd_portas, $val_qtd_vidros, $val_qtd_quadros, $val_qtd_total, $val_total_consumidor, $val_valor_itens_clientes, $val_porcento_desconto, $val_desconto, $val_frete, $val_total_cliente, $out_valor_itens_parceiro, $out_porcento_desconto, $out_desconto, $out_total_parceiro, $out_markup_parceiro, $out_total_fabrica, $out_markup_fabrica, $obs_observacao_op, $ap_cli_aprovacao_cliente, $ap_cli_aprovacao_cliente_data, $ap_cli_cliente_retira, $ap_cli_pedido_parceiro, $ap_parc_aprovacao_parceiro, $ap_parc_andamento_parceiro, $ap_parc_entregue_data, $ap_parc_vendedor_interno, $ap_parc_vendedor_externo, $ap_parc_vendedor_pedido, $ap_fab_aprovacao_fabrica, $ap_fab_pedido_fabrica_data, $ap_fab_andamento, $ap_fab_entrou_producao_data, $ap_fab_produzido, $ap_fab_entregue)
    {

        $insert = $this->conn->prepare("INSERT INTO tbl_ordem_producao (id_uniq, cliente, name_consumidor, modo, qtd, op, altura, largura, imagem_perfil, perfil_lado_esquerdo, usinagem_para_esquerdo, puxador_esquerdo, perfil_lado_direito, usinagem_para_direito, puxador_direito, perfil_lado_superior, usinagem_para_superior, puxador_superior, perfil_lado_inferior, usinagem_para_inferior, puxador_inferior, vidro, tv, servicos, travessa, portas_pares, reforco, desempenador,esquadreta, ponteira, kit, valor_item_cliente, porcento_desconto, desconto, produto, prod_qtd, prod_usinagem_puxador, prod_valor_item_cliente, prod_porcento_desconto, prod_desconto, val_forma_pagamento, val_condicao_pagamento, val_situacao_financeira, val_qtd_portas, val_qtd_vidros, val_qtd_quadros, val_qtd_total, val_total_consumidor, val_valor_itens_clientes, val_porcento_desconto, val_desconto, val_frete, val_total_cliente, out_valor_itens_parceiro, out_porcento_desconto, out_desconto, out_total_parceiro, out_markup_parceiro, out_total_fabrica, out_markup_fabrica, obs_observacao_op, ap_cli_aprovacao_cliente, ap_cli_aprovacao_cliente_data, ap_cli_cliente_retira, ap_cli_pedido_parceiro, ap_parc_aprovacao_parceiro, ap_parc_andamento_parceiro, ap_parc_entregue_data, ap_parc_vendedor_interno, ap_parc_vendedor_externo, ap_parc_vendedor_pedido, ap_fab_aprovacao_fabrica, ap_fab_pedido_fabrica_data, ap_fab_andamento, ap_fab_entrou_producao_data, ap_fab_produzido, ap_fab_entregue) VALUES (:id_uniq, :cliente, :name_consumidor, :modo, :qtd, :op, :altura, :largura, :imagem_perfil, :perfil_lado_esquerdo, :usinagem_para_esquerdo, :puxador_esquerdo, :perfil_lado_direito, :usinagem_para_direito, :puxador_direito, :perfil_lado_superior, :usinagem_para_superior, :puxador_superior, :perfil_lado_inferior, :usinagem_para_inferior, :puxador_inferior, :vidro, :tv, :servicos, :travessa, :portas_pares, :reforco, :desempenador, :esquadreta, :ponteira, :kit, :valor_item_cliente, :porcento_desconto, :desconto, :produto, :prod_qtd, :prod_usinagem_puxador, :prod_valor_item_cliente, :prod_porcento_desconto, :prod_desconto, :val_forma_pagamento, :val_condicao_pagamento, :val_situacao_financeira, :val_qtd_portas, :val_qtd_vidros, :val_qtd_quadros, :val_qtd_total, :val_total_consumidor, :val_valor_itens_clientes, :val_porcento_desconto, :val_desconto, :val_frete, :val_total_cliente, :out_valor_itens_parceiro, :out_porcento_desconto, :out_desconto, :out_total_parceiro, :out_markup_parceiro, :out_total_fabrica, :out_markup_fabrica, :obs_observacao_op, :ap_cli_aprovacao_cliente, :ap_cli_aprovacao_cliente_data, :ap_cli_cliente_retira, :ap_cli_pedido_parceiro, :ap_parc_aprovacao_parceiro, :ap_parc_andamento_parceiro, :ap_parc_entregue_data, :ap_parc_vendedor_interno, :ap_parc_vendedor_externo, :ap_parc_vendedor_pedido, :ap_fab_aprovacao_fabrica, :ap_fab_pedido_fabrica_data, :ap_fab_andamento, :ap_fab_entrou_producao_data, :ap_fab_produzido, :ap_fab_entregue)");
        $insert->bindParam(':id_uniq', $id_uniq);
        $insert->bindParam(':cliente', $cliente);
        $insert->bindParam(':name_consumidor', $consumidor);
        $insert->bindParam(':modo', $modo);
        $insert->bindParam('qtd', $qtd);   
        $insert->bindParam(':op', $op);         
        $insert->bindParam(':altura', $altura);
        $insert->bindParam(':largura', $largura);
        $insert->bindParam(':imagem_perfil', $imagem_perfil);
        $insert->bindParam(':perfil_lado_esquerdo', $perfil_lado_esquerdo); 
        $insert->bindParam(':usinagem_para_esquerdo', $usinagem_para_esquerdo);   
        $insert->bindParam(':puxador_esquerdo', $puxador_esquerdo);
        $insert->bindParam(':perfil_lado_direito', $perfil_lado_direito);  
        $insert->bindParam(':usinagem_para_direito', $usinagem_para_direito);
        $insert->bindParam(':puxador_direito', $puxador_direito);
        $insert->bindParam(':perfil_lado_superior', $perfil_lado_superior);
        $insert->bindParam(':usinagem_para_superior', $usinagem_para_superior);
        $insert->bindParam(':puxador_superior', $puxador_superior);
        $insert->bindParam(':perfil_lado_inferior', $perfil_lado_inferior);
        $insert->bindParam(':usinagem_para_inferior', $usinagem_para_inferior);
        $insert->bindParam(':puxador_inferior', $puxador_inferior);
        $insert->bindParam(':vidro', $vidro);
        $insert->bindParam(':tv', $tv);
        $insert->bindParam(':servicos', $servicos);
        $insert->bindParam(':travessa', $travessa);
        $insert->bindParam(':portas_pares', $portas_pares);
        $insert->bindParam(':reforco', $reforco);
        $insert->bindParam(':desempenador', $desempenador);
        $insert->bindParam(':esquadreta', $esquadreta);
        $insert->bindParam(':ponteira', $ponteira);
        $insert->bindParam(':kit', $kit);
        $insert->bindParam(':valor_item_cliente', $portas_valor_item_cliente);
        $insert->bindParam(':porcento_desconto', $porcento_desconto);
        $insert->bindParam(':desconto', $desconto);
        $insert->bindParam(':produto', $produto);
        $insert->bindParam(':prod_qtd', $prod_qtd);
        $insert->bindParam(':prod_usinagem_puxador', $prod_usinagem_puxador);
        $insert->bindParam(':prod_valor_item_cliente', $prod_valor_item_cliente);
        $insert->bindParam(':prod_porcento_desconto', $prod_porcento_desconto);
        $insert->bindParam(':prod_desconto', $prod_desconto);
        $insert->bindParam(':val_forma_pagamento', $val_forma_pagamento);
        $insert->bindParam(':val_condicao_pagamento', $val_condicao_pagamento);
        $insert->bindParam(':val_situacao_financeira', $val_situacao_financeira);
        $insert->bindParam(':val_qtd_portas', $val_qtd_portas);
        $insert->bindParam(':val_qtd_vidros', $val_qtd_vidros);
        $insert->bindParam(':val_qtd_quadros', $val_qtd_quadros);
        $insert->bindParam(':val_qtd_total', $val_qtd_total);
        $insert->bindParam(':val_total_consumidor', $val_total_consumidor);
        $insert->bindParam(':val_valor_itens_clientes', $val_valor_itens_clientes);
        $insert->bindParam(':val_porcento_desconto', $val_porcento_desconto);
        $insert->bindParam(':val_desconto', $val_desconto);
        $insert->bindParam(':val_frete', $val_frete);
        $insert->bindParam(':val_total_cliente', $val_total_cliente);
        $insert->bindParam(':out_valor_itens_parceiro', $out_valor_itens_parceiro);
        $insert->bindParam(':out_porcento_desconto', $out_porcento_desconto);
        $insert->bindParam(':out_desconto', $out_desconto);
        $insert->bindParam(':out_total_parceiro', $out_total_parceiro);
        $insert->bindParam(':out_markup_parceiro', $out_markup_parceiro);
        $insert->bindParam(':out_total_fabrica', $out_total_fabrica);
        $insert->bindParam(':out_markup_fabrica', $out_markup_fabrica);
        $insert->bindParam(':obs_observacao_op', $obs_observacao_op);
        $insert->bindParam(':ap_cli_aprovacao_cliente', $ap_cli_aprovacao_cliente);
        $insert->bindParam(':ap_cli_aprovacao_cliente_data', $ap_cli_aprovacao_cliente_data);
        $insert->bindParam(':ap_cli_cliente_retira', $ap_cli_cliente_retira);
        $insert->bindParam(':ap_cli_pedido_parceiro', $ap_cli_pedido_parceiro);
        $insert->bindParam(':ap_parc_aprovacao_parceiro', $ap_parc_aprovacao_parceiro);
        $insert->bindParam(':ap_parc_andamento_parceiro', $ap_parc_andamento_parceiro);
        $insert->bindParam(':ap_parc_entregue_data', $ap_parc_entregue_data);
        $insert->bindParam(':ap_parc_vendedor_interno', $ap_parc_vendedor_interno);
        $insert->bindParam(':ap_parc_vendedor_externo', $ap_parc_vendedor_externo);
        $insert->bindParam(':ap_parc_vendedor_pedido', $ap_parc_vendedor_pedido);
        $insert->bindParam(':ap_fab_aprovacao_fabrica', $ap_fab_aprovacao_fabrica);
        $insert->bindParam(':ap_fab_pedido_fabrica_data', $ap_fab_pedido_fabrica_data);
        $insert->bindParam(':ap_fab_andamento', $ap_fab_andamento);
        $insert->bindParam(':ap_fab_entrou_producao_data', $ap_fab_entrou_producao_data);
        $insert->bindParam(':ap_fab_produzido', $ap_fab_produzido);
        $insert->bindParam(':ap_fab_entregue', $ap_fab_entregue);
        return $insert->execute();

    }

    public function selecionar_tbl_ordem_producao()
    {
        $selecionar_tbl_ordem_producao = $this->conn->prepare("SELECT * FROM tbl_ordem_producao ORDER BY id DESC");
        $selecionar_tbl_ordem_producao->execute();

        $resultbl_ordem_producao_all = $selecionar_tbl_ordem_producao->fetchAll(PDO::FETCH_ASSOC);
        return $resultbl_ordem_producao_all;        
    }

    public function selecionar_tbl_ordem_producao_id($id)
    {
        $selecionar_tbl_ordem_producao_id = $this->conn->prepare("SELECT * FROM tbl_ordem_producao WHERE id = ? ORDER BY id DESC");
        $selecionar_tbl_ordem_producao_id->bindParam(1, $id);
        $selecionar_tbl_ordem_producao_id->execute();

        $resultbl_ordem_producaoID = $selecionar_tbl_ordem_producao_id->fetchAll(PDO::FETCH_ASSOC);
        return $resultbl_ordem_producaoID;        
    }

    /*public function atualizar_tbl_ordem_producao($id_uniq, $cliente, $modo, $qtd, $altura, $largura, $perfil_lado_esquerdo, $usinagem_para_esquerdo, $puxador_esquerdo, $perfil_lado_direito, $usinagem_para_direito, $puxador_direito, $perfil_lado_superior, $usinagem_para_superior, $puxador_superior, $perfil_lado_inferior, $usinagem_para_inferior, $puxador_inferior, $vidro, $tv, $servicos, $travessa, $portas_pares, $reforco, $desempenador, $esquadreta, $ponteira, $kit, $valor_item_cliente, $porcento_desconto, $desconto, $produto, $prod_qtd, $prod_usinagem_puxador, $prod_valor_item_cliente, $prod_porcento_desconto, $prod_desconto, $val_forma_pagamento, $val_condicao_pagamento, $val_situacao_financeira, $val_qtd_portas, $val_qtd_vidros, $val_qtd_quadros, $val_qtd_total, $val_total_consumidor, $val_valor_itens_clientes, $val_porcento_desconto, $val_desconto, $val_frete, $val_total_cliente, $out_valor_itens_parceiro, $out_porcento_desconto, $out_desconto, $out_total_parceiro, $out_markup_parceiro, $out_total_fabrica, $out_markup_fabrica, $obs_observacao_op, $ap_cli_aprovacao_cliente, $ap_cli_aprovacao_cliente_data, $ap_cli_cliente_retira, $ap_cli_pedido_parceiro, $ap_parc_aprovacao_parceiro, $ap_parc_andamento_parceiro, $ap_parc_entregue_data, $ap_parc_vendedor_interno, $ap_parc_vendedor_externo, $ap_parc_vendedor_pedido, $ap_fab_aprovacao_fabrica, $ap_fab_pedido_fabrica_data, $ap_fab_andamento, $ap_fab_entrou_producao_data, $ap_fab_produzido, $ap_fab_entregue, $id_atualizar)
    {

        $atualizar_tbl_ordem_producao = $this->conn->prepare("UPDATE tbl_ordem_producao SET id_uniq = ?,cliente = ?, modo = ?, qtd = ?, altura = ?, largura = ?, perfil_lado_esquerdo = ?, usinagem_para_esquerdo = ?, puxador_esquerdo = ?, perfil_lado_direito = ?, usinagem_para_direito = ?, puxador_direito = ?, perfil_lado_superior = ?, usinagem_para_superior = ?, puxador_superior = ?, perfil_lado_inferior = ?, usinagem_para_inferior = ?, puxador_inferior = ?, vidro = ?, tv = ?, servicos = ?, travessa = ?, portas_pares = ?, reforco = ?, desempenador = ?, esquadreta = ?, ponteira = ?, kit = ?, valor_item_cliente = ?, porcento_desconto = ?, desconto = ?, produto = ?, prod_qtd = ?, prod_usinagem_puxador = ?, prod_valor_item_cliente = ?, prod_porcento_desconto = ?, prod_desconto = ?, val_forma_pagamento = ?, val_condicao_pagamento = ?, val_situacao_financeira = ?, val_qtd_portas = ?, val_qtd_vidros = ?, val_qtd_quadros = ?, val_qtd_total = ?, val_total_consumidor = ?, val_valor_itens_clientes = ?, val_porcento_desconto = ?, val_desconto = ?, val_frete = ?, val_total_cliente = ?, out_valor_itens_parceiro = ?, out_porcento_desconto = ?, out_desconto = ?, out_total_parceiro = ?, out_markup_parceiro = ?, out_total_fabrica = ?, out_markup_fabrica = ?, obs_observacao_op = ?, ap_cli_aprovacao_cliente = ?,ap_cli_aprovacao_cliente_data = ?, ap_cli_cliente_retira = ?, ap_cli_pedido_parceiro = ?,ap_parc_aprovacao_parceiro = ?,ap_parc_andamento_parceiro = ?, ap_parc_entregue_data = ?,ap_parc_vendedor_interno = ?,ap_parc_vendedor_externo = ?,ap_parc_vendedor_pedido = ?, ap_fab_aprovacao_fabrica = ?,ap_fab_pedido_fabrica_data = ?,ap_fab_andamento = ?,ap_fab_entrou_producao_data = ?, ap_fab_produzido = ?,ap_fab_entregue = ? WHERE id = ?");
        $atualizar_tbl_ordem_producao->bindParam(1, $id_uniq);
        $atualizar_tbl_ordem_producao->bindParam(2, $cliente);
        $atualizar_tbl_ordem_producao->bindParam(3, $modo);
        $atualizar_tbl_ordem_producao->bindParam(4, $qtd);            
        $atualizar_tbl_ordem_producao->bindParam(5, $altura);
        $atualizar_tbl_ordem_producao->bindParam(6, $largura);
        $atualizar_tbl_ordem_producao->bindParam(7, $perfil_lado_esquerdo); 
        $atualizar_tbl_ordem_producao->bindParam(8, $usinagem_para_esquerdo);   
        $atualizar_tbl_ordem_producao->bindParam(9, $puxador_esquerdo);
        $atualizar_tbl_ordem_producao->bindParam(10, $perfil_lado_direito);  
        $atualizar_tbl_ordem_producao->bindParam(11, $usinagem_para_direito);
        $atualizar_tbl_ordem_producao->bindParam(12, $puxador_direito);
        $atualizar_tbl_ordem_producao->bindParam(13, $perfil_lado_superior);
        $atualizar_tbl_ordem_producao->bindParam(14, $usinagem_para_superior);
        $atualizar_tbl_ordem_producao->bindParam(15, $puxador_superior);
        $atualizar_tbl_ordem_producao->bindParam(16, $perfil_lado_inferior);
        $atualizar_tbl_ordem_producao->bindParam(17, $usinagem_para_inferior);
        $atualizar_tbl_ordem_producao->bindParam(18, $puxador_inferior);
        $atualizar_tbl_ordem_producao->bindParam(19, $vidro);
        $atualizar_tbl_ordem_producao->bindParam(20, $tv);
        $atualizar_tbl_ordem_producao->bindParam(21, $servicos);
        $atualizar_tbl_ordem_producao->bindParam(22, $travessa);
        $atualizar_tbl_ordem_producao->bindParam(23, $portas_pares);
        $atualizar_tbl_ordem_producao->bindParam(24, $reforco);
        $atualizar_tbl_ordem_producao->bindParam(25, $desempenador);
        $atualizar_tbl_ordem_producao->bindParam(26, $esquadreta);
        $atualizar_tbl_ordem_producao->bindParam(27, $ponteira);
        $atualizar_tbl_ordem_producao->bindParam(28, $kit);
        $atualizar_tbl_ordem_producao->bindParam(29, $valor_item_cliente);
        $atualizar_tbl_ordem_producao->bindParam(30, $porcento_desconto);
        $atualizar_tbl_ordem_producao->bindParam(31, $desconto);
        $atualizar_tbl_ordem_producao->bindParam(32, $produto);
        $atualizar_tbl_ordem_producao->bindParam(33, $prod_qtd);
        $atualizar_tbl_ordem_producao->bindParam(34, $prod_usinagem_puxador);
        $atualizar_tbl_ordem_producao->bindParam(35, $prod_valor_item_cliente);
        $atualizar_tbl_ordem_producao->bindParam(36, $prod_porcento_desconto);
        $atualizar_tbl_ordem_producao->bindParam(37, $prod_desconto);
        $atualizar_tbl_ordem_producao->bindParam(38, $val_forma_pagamento);
        $atualizar_tbl_ordem_producao->bindParam(39, $val_condicao_pagamento);
        $atualizar_tbl_ordem_producao->bindParam(40, $val_situacao_financeira);
        $atualizar_tbl_ordem_producao->bindParam(41, $val_qtd_portas);
        $atualizar_tbl_ordem_producao->bindParam(42, $val_qtd_vidros);
        $atualizar_tbl_ordem_producao->bindParam(43, $val_qtd_quadros);
        $atualizar_tbl_ordem_producao->bindParam(44, $val_qtd_total);
        $atualizar_tbl_ordem_producao->bindParam(45, $val_total_consumidor);
        $atualizar_tbl_ordem_producao->bindParam(46, $val_valor_itens_clientes);
        $atualizar_tbl_ordem_producao->bindParam(47, $val_porcento_desconto);
        $atualizar_tbl_ordem_producao->bindParam(48, $val_desconto);
        $atualizar_tbl_ordem_producao->bindParam(49, $val_frete);
        $atualizar_tbl_ordem_producao->bindParam(50, $val_total_cliente);
        $atualizar_tbl_ordem_producao->bindParam(51, $out_valor_itens_parceiro);
        $atualizar_tbl_ordem_producao->bindParam(52, $out_porcento_desconto);
        $atualizar_tbl_ordem_producao->bindParam(53, $out_desconto);
        $atualizar_tbl_ordem_producao->bindParam(54, $out_total_parceiro);
        $atualizar_tbl_ordem_producao->bindParam(55, $out_markup_parceiro);
        $atualizar_tbl_ordem_producao->bindParam(56, $out_total_fabrica);
        $atualizar_tbl_ordem_producao->bindParam(57, $out_markup_fabrica);
        $atualizar_tbl_ordem_producao->bindParam(58, $obs_observacao_op);
        $atualizar_tbl_ordem_producao->bindParam(59, $ap_cli_aprovacao_cliente);
        $atualizar_tbl_ordem_producao->bindParam(60, $ap_cli_aprovacao_cliente_data);
        $atualizar_tbl_ordem_producao->bindParam(61, $ap_cli_cliente_retira);
        $atualizar_tbl_ordem_producao->bindParam(62, $ap_cli_pedido_parceiro);
        $atualizar_tbl_ordem_producao->bindParam(63, $ap_parc_aprovacao_parceiro);
        $atualizar_tbl_ordem_producao->bindParam(64, $ap_parc_andamento_parceiro);
        $atualizar_tbl_ordem_producao->bindParam(65, $ap_parc_entregue_data);
        $atualizar_tbl_ordem_producao->bindParam(66, $ap_parc_vendedor_interno);
        $atualizar_tbl_ordem_producao->bindParam(67, $ap_parc_vendedor_externo);
        $atualizar_tbl_ordem_producao->bindParam(68, $ap_parc_vendedor_pedido);
        $atualizar_tbl_ordem_producao->bindParam(69, $ap_fab_aprovacao_fabrica);
        $atualizar_tbl_ordem_producao->bindParam(70, $ap_fab_pedido_fabrica_data);
        $atualizar_tbl_ordem_producao->bindParam(71, $ap_fab_andamento);
        $atualizar_tbl_ordem_producao->bindParam(72, $ap_fab_entrou_producao_data);
        $atualizar_tbl_ordem_producao->bindParam(73, $ap_fab_produzido);
        $atualizar_tbl_ordem_producao->bindParam(74, $ap_fab_entregue);
        $atualizar_tbl_ordem_producao->bindParam(75, $id_atualizar);
        return $atualizar_tbl_ordem_producao->execute();        
    }

    public function atualizar_imagem_tbl_ordem_producao($path_image, $id_atualizar)
    {

        $atualizar_imagem_tbl_ordem_producao = $this->conn->prepare("UPDATE tbl_ordem_producao SET imagem = ?  WHERE id = ?");
        $atualizar_imagem_tbl_ordem_producao->bindParam(1, $path_image);
        $atualizar_imagem_tbl_ordem_producao->bindParam(2, $id_atualizar);

        return $atualizar_imagem_tbl_ordem_producao->execute();
        
    }*/

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM tbl_ordem_producao WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>