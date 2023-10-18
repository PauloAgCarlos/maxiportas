<?php

    include "../database.php";

class controllers_ordem_producao extends database
{

    public function inserir($descricao, $codigo_produto, $observacao, $custo, $markup, $valor, $unidade, $codigo_da_fabrica, $ultima_alteracao, $path_image, $ativo)
    {

        $insert = $this->conn->prepare("INSERT INTO tbl_ordem_producao (id_uniq, cliente, modo, qtd, altura, largura, perfil_lado_esquerdo, usinagem_para_esquerdo, puxador_esquerdo, perfil_lado_direito, usinagem_para_direito, puxador_direito, perfil_lado_superior, usinagem_para_superior, puxador_superior, perfil_lado_inferior, usinagem_para_inferior, puxador_inferior, vidro, tv, servicos, travessa, portas_pares, reforco, desempenador, esquadreta, ponteira, kit, valor_item_cliente, porcento_desconto, desconto, produto, prod_qtd, prod_usinagem_puxador, prod_valor_item_cliente, prod_porcento_desconto, prod_desconto, val_forma_pagamento, val_condicao_pagamento, val_situacao_financeira, val_qtd_portas, val_qtd_vidros, val_qtd_quadros, val_qtd_total, val_total_consumidor, val_valor_itens_clientes, val_porcento_desconto, val_desconto, val_frete, val_total_cliente, out_valor_itens_parceiro, out_porcento_desconto, out_desconto, out_total_parceiro, out_markup_parceiro, out_total_fabrica, out_markup_fabrica, obs_observacao_op, ap_cli_aprovacao_cliente, ap_cli_aprovacao_cliente_data, ap_cli_cliente_retira, ap_cli_pedido_parceiro, ap_parc_aprovacao_parceiro, ap_parc_andamento_parceiro, ap_parc_entregue_data, ap_parc_vendedor_interno, ap_parc_vendedor_externo, ap_parc_vendedor_pedido, ap_fab_aprovacao_fabrica, ap_fab_pedido_fabrica_data, ap_fab_andamento, ap_fab_entrou_producao_data, ap_fab_produzido, ap_fab_entregue) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert->bindParam(1, $descricao);
        $insert->bindParam(2, $codigo_produto);
        $insert->bindParam(3, $observacao);
        $insert->bindParam(4, $custo);            
        $insert->bindParam(5, $markup);
        $insert->bindParam(6, $valor);
        $insert->bindParam(7, $unidade); 
        $insert->bindParam(11, $codigo_da_fabrica);   
        $insert->bindParam(12, $ultima_alteracao);
        $insert->bindParam(10, $path_image);  
        $insert->bindParam(13, $ativo);
        return $insert->execute();

    }

    public function selecionar_tbl_ordem_producao()
    {
        $selecionar_tbl_ordem_producao = $this->conn->prepare("SELECT * FROM tbl_ordem_producao ORDER BY id DESC");
        $selecionar_tbl_ordem_producao->execute();

        $resultbl_ordem_producao = $selecionar_tbl_ordem_producao->fetchAll(PDO::FETCH_ASSOC);
        return $resultbl_ordem_producao;
        
    }

    public function selecionar_tbl_ordem_producao_id($id)
    {
        $selecionar_tbl_ordem_producao_id = $this->conn->prepare("SELECT * FROM tbl_ordem_producao WHERE id = ? ORDER BY id DESC");
        $selecionar_tbl_ordem_producao_id->bindParam(1, $id);
        $selecionar_tbl_ordem_producao_id->execute();

        $resultbl_ordem_producaoID = $selecionar_tbl_ordem_producao_id->fetchAll(PDO::FETCH_ASSOC);
        return $resultbl_ordem_producaoID;
        
    }

    public function atualizar_tbl_ordem_producao($descricao, $codigo_produto, $observacao, $custo, $markup, $valor, $unidade, $codigo_da_fabrica, $ultima_alteracao, $ativo, $id_atualizar)
    {

        $atualizar_tbl_ordem_producao = $this->conn->prepare("UPDATE tbl_ordem_producao SET descricao = ?, codigo_produto = ?, observacao = ?, custo = ?, markup = ?, valor = ?, unidade = ?, codigo_da_fabrica = ?, ultima_alteracao = ?, ativo = ?  WHERE id = ?");
        $atualizar_tbl_ordem_producao->bindParam(1, $descricao);
        $atualizar_tbl_ordem_producao->bindParam(2, $codigo_produto);
        $atualizar_tbl_ordem_producao->bindParam(3, $observacao);
        $atualizar_tbl_ordem_producao->bindParam(4, $custo);            
        $atualizar_tbl_ordem_producao->bindParam(5, $markup);
        $atualizar_tbl_ordem_producao->bindParam(6, $valor);
        $atualizar_tbl_ordem_producao->bindParam(7, $unidade);
        $atualizar_tbl_ordem_producao->bindParam(8, $codigo_da_fabrica);   
        $atualizar_tbl_ordem_producao->bindParam(9, $ultima_alteracao);
        $atualizar_tbl_ordem_producao->bindParam(10, $ativo);
        $atualizar_tbl_ordem_producao->bindParam(11, $id_atualizar);
        return $atualizar_tbl_ordem_producao->execute();
        
    }

    public function atualizar_imagem_tbl_ordem_producao($path_image, $id_atualizar)
    {

        $atualizar_imagem_tbl_ordem_producao = $this->conn->prepare("UPDATE tbl_ordem_producao SET imagem = ?  WHERE id = ?");
        $atualizar_imagem_tbl_ordem_producao->bindParam(1, $path_image);
        $atualizar_imagem_tbl_ordem_producao->bindParam(2, $id_atualizar);

        return $atualizar_imagem_tbl_ordem_producao->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM tbl_ordem_producao WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>