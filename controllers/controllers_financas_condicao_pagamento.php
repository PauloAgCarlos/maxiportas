<?php

    include "../database.php";

class controllers_financas_condicao_pagamento extends database
{

    public function inserir($descricao, $codigo_produto, $tipo, $ultima_alteracao, $ativo, $numero_de_parcelas, $markup, $prazo_primeira_parcela_dias, $prazo_segunda_parcela_dias, $intervalo_entre_parcelas_dias, $entrada)
    {

        $insert = $this->conn->prepare("INSERT INTO financas_condicao_pagamento (descricao, codigo_produto, tipo, ultima_alteracao, ativo, numero_de_parcelas, markup, prazo_primeira_parcela_dias, prazo_segunda_parcela_dias, intervalo_entre_parcelas_dias, entrada) VALUES (:descricao, :codigo_produto, :tipo, :ultima_alteracao, :ativo, :numero_de_parcelas, :markup, :prazo_primeira_parcela_dias, :prazo_segunda_parcela_dias, :intervalo_entre_parcelas_dias, :entrada)");
        $insert->bindParam(":descricao", $descricao);
        $insert->bindParam(":codigo_produto", $codigo_produto);  
        $insert->bindParam(":tipo", $tipo);        
        $insert->bindParam(":ultima_alteracao", $ultima_alteracao);
        $insert->bindParam(":ativo", $ativo);
        $insert->bindParam(":numero_de_parcelas", $numero_de_parcelas);
        $insert->bindParam(":markup", $markup);            
        $insert->bindParam(":prazo_primeira_parcela_dias", $prazo_primeira_parcela_dias);
        $insert->bindParam(":prazo_segunda_parcela_dias", $prazo_segunda_parcela_dias);
        $insert->bindParam(":intervalo_entre_parcelas_dias", $intervalo_entre_parcelas_dias);
        $insert->bindParam(":entrada", $entrada);
        $insert->execute();
    }

    public function selecionar_financas_condicao_pagamento()
    {
        $selecionar_financas_condicao_pagamento = $this->conn->prepare("SELECT * FROM financas_condicao_pagamento ORDER BY id DESC");
        $selecionar_financas_condicao_pagamento->execute();

        $resulfinancas_condicao_pagamento = $selecionar_financas_condicao_pagamento->fetchAll(PDO::FETCH_ASSOC);
        return $resulfinancas_condicao_pagamento;
        
    }

    public function selecionar_financas_condicao_pagamento_id($id)
    {
        $selecionar_financas_condicao_pagamento_id = $this->conn->prepare("SELECT * FROM financas_condicao_pagamento WHERE id = ? ORDER BY id DESC");
        $selecionar_financas_condicao_pagamento_id->bindParam(1, $id);
        $selecionar_financas_condicao_pagamento_id->execute();

        $resulfinancas_condicao_pagamentoID = $selecionar_financas_condicao_pagamento_id->fetchAll(PDO::FETCH_ASSOC);
        return $resulfinancas_condicao_pagamentoID;
        
    }

    public function atualizar_financas_condicao_pagamento($descricao, $codigo_produto, $tipo, $ultima_alteracao, $ativo, $numero_de_parcelas, $markup, $prazo_primeira_parcela_dias, $prazo_segunda_parcela_dias, $intervalo_entre_parcelas_dias, $entrada, $id_atualizar)
    {

        $atualizar_financas_condicao_pagamento = $this->conn->prepare("UPDATE financas_condicao_pagamento SET descricao = ?, codigo_produto = ?, tipo = ?, ultima_alteracao = ?, ativo = ?, numero_de_parcelas = ?, markup = ?, prazo_primeira_parcela_dias = ?, prazo_segunda_parcela_dias = ?, intervalo_entre_parcelas_dias = ?, entrada = ? WHERE id = ?");
        $atualizar_financas_condicao_pagamento->bindParam(1, $descricao);
        $atualizar_financas_condicao_pagamento->bindParam(2, $codigo_produto);  
        $atualizar_financas_condicao_pagamento->bindParam(3, $tipo);        
        $atualizar_financas_condicao_pagamento->bindParam(4, $ultima_alteracao);
        $atualizar_financas_condicao_pagamento->bindParam(5, $ativo);
        $atualizar_financas_condicao_pagamento->bindParam(6, $numero_de_parcelas);
        $atualizar_financas_condicao_pagamento->bindParam(7, $markup);            
        $atualizar_financas_condicao_pagamento->bindParam(8, $prazo_primeira_parcela_dias);
        $atualizar_financas_condicao_pagamento->bindParam(9, $prazo_segunda_parcela_dias);
        $atualizar_financas_condicao_pagamento->bindParam(10, $intervalo_entre_parcelas_dias);
        $atualizar_financas_condicao_pagamento->bindParam(11, $entrada);
        $atualizar_financas_condicao_pagamento->bindParam(12, $id_atualizar);

        return $atualizar_financas_condicao_pagamento->execute();
        
    }

    public function atualizar_imagem_financas_condicao_pagamento($path_image, $id_atualizar)
    {

        $atualizar_imagem_financas_condicao_pagamento = $this->conn->prepare("UPDATE financas_condicao_pagamento SET imagem = ?  WHERE id = ?");
        $atualizar_imagem_financas_condicao_pagamento->bindParam(1, $path_image);
        $atualizar_imagem_financas_condicao_pagamento->bindParam(2, $id_atualizar);

        return $atualizar_imagem_financas_condicao_pagamento->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM financas_condicao_pagamento WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>