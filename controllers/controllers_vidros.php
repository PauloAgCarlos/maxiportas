<?php

    include "../database.php";

class controllers_vidros extends database
{

    public function inserir($descricao, $agregar, $unidade, $liberado_para, $permite_pintura, $codigo_da_fabrica, $codigo_produto, $observacao, $custo_metro, $markup, $markup_avulso, $metragem_minima, $valor, $valor_avulso, $valor_com_perda, $perda, $perda_avulso, $perda_bordas, $perda_corte, $perda_bordas_retalho, $perda_corte_retalho, $dimensao, $path_image, $ultima_alteracao, $ativo)
    {

        $insert = $this->conn->prepare("INSERT INTO `vidros` (`descricao`, `agregar`, `unidade`, `liberado_para`, `permite_pintura`, `codigo_da_fabrica`, `codigo_produto`, `observacao`, `custo_metro`, `markup`, `markup_avulso`, `metragem_minima`, `valor`, `valor_avulso`, `valor_com_perda`, `perda`, `perda_avulso`, `perda_bordas`, `perda_corte`, `perda_bordas_retalho`, `perda_corte_retalho`, `dimensao`, `imagem`, `ultima_alteracao`, `ativo`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert->bindParam(1, $descricao);
        $insert->bindParam(2, $agregar);
        $insert->bindParam(3, $unidade);            
        $insert->bindParam(4, $liberado_para);
        $insert->bindParam(5, $permite_pintura);
        $insert->bindParam(6, $codigo_da_fabrica);
        $insert->bindParam(7, $codigo_produto);
        $insert->bindParam(8, $observacao);
        $insert->bindParam(9, $custo_metro);   
        $insert->bindParam(10, $markup);         
        $insert->bindParam(11, $markup_avulso);            
        $insert->bindParam(12, $metragem_minima);           
        $insert->bindParam(13, $valor);
        $insert->bindParam(14, $valor_avulso);
        $insert->bindParam(15, $valor_com_perda);
        $insert->bindParam(16, $perda);
        $insert->bindParam(17, $perda_avulso);
        $insert->bindParam(18, $perda_bordas);
        $insert->bindParam(19, $perda_corte);
        $insert->bindParam(20, $perda_bordas_retalho);
        $insert->bindParam(21, $perda_corte_retalho);
        $insert->bindParam(22, $dimensao);
        $insert->bindParam(23, $path_image);
        $insert->bindParam(24, $ultima_alteracao);
        $insert->bindParam(25, $ativo);
        return $insert->execute();

    }

    public function selecionar_vidros()
    {
        $selecionar_vidros = $this->conn->prepare("SELECT * FROM vidros ORDER BY id DESC");
        $selecionar_vidros->execute();

        $resulvidros = $selecionar_vidros->fetchAll(PDO::FETCH_ASSOC);
        return $resulvidros;
        
    }

    public function selecionar_vidros_id($id)
    {
        $selecionar_vidros_id = $this->conn->prepare("SELECT * FROM vidros WHERE id = ? ORDER BY id DESC");
        $selecionar_vidros_id->bindParam(1, $id);
        $selecionar_vidros_id->execute();

        $resulvidrosID = $selecionar_vidros_id->fetchAll(PDO::FETCH_ASSOC);
        return $resulvidrosID;
        
    }

    public function atualizar_vidros($descricao, $agregar, $unidade, $liberado_para, $permite_pintura, $codigo_da_fabrica, $codigo_produto, $observacao, $custo_metro, $markup, $markup_avulso, $metragem_minima, $valor, $valor_avulso, $valor_com_perda, $perda, $perda_avulso, $perda_bordas, $perda_corte, $perda_bordas_retalho, $perda_corte_retalho, $dimensao, $ultima_alteracao, $ativo, $id_atualizar)
    {

        $atualizar_vidros = $this->conn->prepare("UPDATE vidros SET descricao = ?, agregar = ?, unidade = ?, liberado_para = ?, permite_pintura = ?, codigo_da_fabrica = ?, codigo_produto = ?, observacao = ?, custo_metro = ?, markup = ?, markup_avulso = ?, metragem_minima = ?, valor = ?, valor_avulso = ?, valor_com_perda = ?, perda = ?, perda_avulso = ?, perda_bordas = ?, perda_corte = ?, perda_bordas_retalho = ?, perda_corte_retalho = ?, dimensao = ?, ultima_alteracao = ?, ativo = ?  WHERE id = ?");
        $atualizar_vidros->bindParam(1, $descricao);
        $atualizar_vidros->bindParam(2, $agregar);
        $atualizar_vidros->bindParam(3, $unidade);            
        $atualizar_vidros->bindParam(4, $liberado_para);
        $atualizar_vidros->bindParam(5, $permite_pintura);
        $atualizar_vidros->bindParam(6, $codigo_da_fabrica);
        $atualizar_vidros->bindParam(7, $codigo_produto);
        $atualizar_vidros->bindParam(8, $observacao);
        $atualizar_vidros->bindParam(9, $custo_metro);   
        $atualizar_vidros->bindParam(10, $markup);         
        $atualizar_vidros->bindParam(11, $markup_avulso);            
        $atualizar_vidros->bindParam(12, $metragem_minima);           
        $atualizar_vidros->bindParam(13, $valor);
        $atualizar_vidros->bindParam(14, $valor_avulso);
        $atualizar_vidros->bindParam(15, $valor_com_perda);
        $atualizar_vidros->bindParam(16, $perda);
        $atualizar_vidros->bindParam(17, $perda_avulso);
        $atualizar_vidros->bindParam(18, $perda_bordas);
        $atualizar_vidros->bindParam(19, $perda_corte);
        $atualizar_vidros->bindParam(20, $perda_bordas_retalho);
        $atualizar_vidros->bindParam(21, $perda_corte_retalho);
        $atualizar_vidros->bindParam(22, $dimensao);
        $atualizar_vidros->bindParam(23, $ultima_alteracao);
        $atualizar_vidros->bindParam(24, $ativo);
        $atualizar_vidros->bindParam(25, $id_atualizar);
        return $atualizar_vidros->execute();
        
    }

    public function atualizar_imagem_vidros($path_image, $id_atualizar)
    {

        $atualizar_imagem_vidros = $this->conn->prepare("UPDATE vidros SET imagem = ?  WHERE id = ?");
        $atualizar_imagem_vidros->bindParam(1, $path_image);
        $atualizar_imagem_vidros->bindParam(2, $id_atualizar);

        return $atualizar_imagem_vidros->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM vidros WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>