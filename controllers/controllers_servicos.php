<?php

    include "../database.php";

class controllers_servicos extends database
{

    public function inserir($descricao, $tipo_de_servico, $exibe_no_orcamento, $observacao, $custo_metro, $codigo_produto, $markup, $valor, $adiciona_para_o_corte, $calculo, $codigo_da_fabrica, $ultima_alteracao, $ativo)
    {

        $insert = $this->conn->prepare("INSERT INTO servicos (descricao, tipo_de_servico, exibe_no_orcamento, exibe_na_lista_de_corte, observacao, custo_metro, codigo_produto, markup, valor, adiciona_para_o_corte, calculo, codigo_da_fabrica, ultima_alteracao, ativo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert->bindParam(1, $descricao);
        $insert->bindParam(2, $tipo_de_servico);
        $insert->bindParam(3, $exibe_no_orcamento);            
        $insert->bindParam(4, $exibe_na_lista_de_corte);
        $insert->bindParam(5, $observacao);
        $insert->bindParam(6, $custo_metro);
        $insert->bindParam(7, $codigo_produto);
        $insert->bindParam(8, $markup);
        $insert->bindParam(9, $valor);   
        $insert->bindParam(10, $adiciona_para_o_corte);         
        $insert->bindParam(11, $calculo);            
        $insert->bindParam(12, $codigo_da_fabrica);           
        $insert->bindParam(13, $ultima_alteracao);
        $insert->bindParam(14, $ativo);
        return $insert->execute();

    }

    public function selecionar_servicos()
    {
        $selecionar_servicos = $this->conn->prepare("SELECT * FROM servicos ORDER BY id DESC");
        $selecionar_servicos->execute();

        $resulservicos = $selecionar_servicos->fetchAll(PDO::FETCH_ASSOC);
        return $resulservicos;
        
    }

    public function selecionar_servicos_id($id)
    {
        $selecionar_servicos_id = $this->conn->prepare("SELECT * FROM servicos WHERE id = ? ORDER BY id DESC");
        $selecionar_servicos_id->bindParam(1, $id);
        $selecionar_servicos_id->execute();

        $resulservicosID = $selecionar_servicos_id->fetchAll(PDO::FETCH_ASSOC);
        return $resulservicosID;
        
    }

    public function atualizar_servicos($descricao, $codigo_produto, $tipo_de_servico, $exibe_no_orcamento, $observacao, $custo_metro, $markup, $valor, $adiciona_para_o_corte, $calculo, $codigo_da_fabrica, $ultima_alteracao, $ativo, $id_atualizar)
    {

        $atualizar_servicos = $this->conn->prepare("UPDATE servicos SET descricao = ?, codigo_produto = ?, tipo_de_servico = ?, exibe_no_orcamento = ?, exibe_na_lista_de_corte = ?, observacao = ?, custo_metro = ?, markup = ?, valor = ?, adiciona_para_o_corte = ?, calculo = ?, codigo_da_fabrica = ?, ultima_alteracao = ?, ativo = ?  WHERE id = ?");
        $atualizar_servicos->bindParam(1, $descricao);
        $atualizar_servicos->bindParam(2, $codigo_produto);
        $atualizar_servicos->bindParam(3, $tipo_de_servico);
        $atualizar_servicos->bindParam(4, $exibe_no_orcamento);            
        $atualizar_servicos->bindParam(5, $exibe_na_lista_de_corte);
        $atualizar_servicos->bindParam(6, $observacao);
        $atualizar_servicos->bindParam(7, $custo_metro);
        $atualizar_servicos->bindParam(8, $markup);
        $atualizar_servicos->bindParam(9, $valor);   
        $atualizar_servicos->bindParam(10, $adiciona_para_o_corte);         
        $atualizar_servicos->bindParam(11, $calculo);            
        $atualizar_servicos->bindParam(12, $codigo_da_fabrica);           
        $atualizar_servicos->bindParam(13, $ultima_alteracao);
        $atualizar_servicos->bindParam(14, $ativo);
        $atualizar_servicos->bindParam(15, $id_atualizar);
        return $atualizar_servicos->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM servicos WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>