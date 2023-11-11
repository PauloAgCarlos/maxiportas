<?php

    include "../database.php";

class controllers_puxadores extends database
{

    public function inserir($descricao, $usinagem_box_tres, $medida_maxima_para_usinagem, $agregar, $unidade, $codigo_da_fabrica, $codigo_produto, $ponteira_obrigatoria, $referencias_do_mercado, $custo_metro, $markup, $metragem_minima, $valor, $desconto_corte, $perda, $perda_bordas, $perda_corte, $dimensao, $perda_bordas_retalho, $path_image, $ultima_alteracao, $ativo)
    {

        $insert = $this->conn->prepare("INSERT INTO `puxadores` (`descricao`, `usinagem_box_tres`,`medida_maxima_para_usinagem`, `agregar`, `unidade`, `codigo_da_fabrica`, `codigo_produto`, `ponteira_obrigatoria`, `referencias_do_mercado`, `custo_metro`, `markup`, `metragem_minima`, `valor`, `desconto_corte`, `perda`, `perda_bordas`, `perda_corte`, `dimensao`, `perda_bordas_retalho`, `perda_corte_retalho`, `imagem`, `ultima_alteracao`, `ativo`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert->bindParam(1, $descricao);
        $insert->bindParam(2, $usinagem_box_tres);
        $insert->bindParam(3, $medida_maxima_para_usinagem);            
        $insert->bindParam(4, $agregar);
        $insert->bindParam(5, $unidade);
        $insert->bindParam(6, $codigo_da_fabrica);
        $insert->bindParam(7, $codigo_produto);
        $insert->bindParam(8, $ponteira_obrigatoria);
        $insert->bindParam(9, $referencias_do_mercado);   
        $insert->bindParam(10, $custo_metro);         
        $insert->bindParam(11, $markup);            
        $insert->bindParam(12, $metragem_minima);           
        $insert->bindParam(13, $valor);
        $insert->bindParam(14, $desconto_corte);
        $insert->bindParam(15, $perda);
        $insert->bindParam(16, $perda_bordas);
        $insert->bindParam(17, $perda_corte);
        $insert->bindParam(18, $dimensao);
        $insert->bindParam(19, $perda_bordas_retalho);
        $insert->bindParam(19, $perda_corte_retalho);
        $insert->bindParam(20, $path_image);
        $insert->bindParam(21, $ultima_alteracao);
        $insert->bindParam(22, $ativo);
        $insert->execute();
    }

    public function selecionar_puxadores()
    {
        $selecionar_puxadores = $this->conn->prepare("SELECT * FROM puxadores ORDER BY id DESC");
        $selecionar_puxadores->execute();

        $resulpuxadores = $selecionar_puxadores->fetchAll(PDO::FETCH_ASSOC);
        return $resulpuxadores;
        
    }

    public function selecionar_puxadores_id($id)
    {
        $selecionar_puxadores_id = $this->conn->prepare("SELECT * FROM puxadores WHERE id = ? ORDER BY id DESC");
        $selecionar_puxadores_id->bindParam(1, $id);
        $selecionar_puxadores_id->execute();

        $resulpuxadoresID = $selecionar_puxadores_id->fetchAll(PDO::FETCH_ASSOC);
        return $resulpuxadoresID;
        
    }

    public function atualizar_puxadores($descricao, $usinagem_box_tres, $medida_maxima_para_usinagem, $agregar, $unidade, $codigo_da_fabrica, $codigo_produto, $ponteira_obrigatoria, $referencias_do_mercado, $custo_metro, $markup, $metragem_minima, $valor, $desconto_corte, $perda, $perda_bordas, $perda_corte, $dimensao, $perda_bordas_retalho, $perda_corte_retalho, $ultima_alteracao, $ativo, $id_atualizar)
    {

        $atualizar_puxadores = $this->conn->prepare("UPDATE puxadores SET descricao = ?, usinagem_box_tres = ?,medida_maxima_para_usinagem = ?, agregar = ?, unidade = ?, codigo_da_fabrica = ?, codigo_produto = ?, ponteira_obrigatoria = ?, referencias_do_mercado = ?, custo_metro = ?, markup = ?, metragem_minima = ?, valor = ?, desconto_corte = ?, perda = ?, perda_bordas = ?, perda_corte = ?, dimensao = ?, perda_bordas_retalho = ?, perda_corte_retalho = ?, ultima_alteracao = ?, ativo = ?  WHERE id = ?");
        $atualizar_puxadores->bindParam(1, $descricao);
        $atualizar_puxadores->bindParam(2, $usinagem_box_tres);
        $atualizar_puxadores->bindParam(3, $medida_maxima_para_usinagem);            
        $atualizar_puxadores->bindParam(4, $agregar);
        $atualizar_puxadores->bindParam(5, $unidade);
        $atualizar_puxadores->bindParam(6, $codigo_da_fabrica);
        $atualizar_puxadores->bindParam(7, $codigo_produto);
        $atualizar_puxadores->bindParam(8, $ponteira_obrigatoria);
        $atualizar_puxadores->bindParam(9, $referencias_do_mercado);   
        $atualizar_puxadores->bindParam(10, $custo_metro);         
        $atualizar_puxadores->bindParam(11, $markup);            
        $atualizar_puxadores->bindParam(12, $metragem_minima);           
        $atualizar_puxadores->bindParam(13, $valor);
        $atualizar_puxadores->bindParam(14, $desconto_corte);
        $atualizar_puxadores->bindParam(15, $perda);
        $atualizar_puxadores->bindParam(16, $perda_bordas);
        $atualizar_puxadores->bindParam(17, $perda_corte);
        $atualizar_puxadores->bindParam(18, $dimensao);
        $atualizar_puxadores->bindParam(19, $perda_bordas_retalho);
        $atualizar_puxadores->bindParam(20, $perda_corte_retalho);
        $atualizar_puxadores->bindParam(21, $ultima_alteracao);
        $atualizar_puxadores->bindParam(22, $ativo);
        $atualizar_puxadores->bindParam(23, $id_atualizar);

        return $atualizar_puxadores->execute();
        
    }

    public function atualizar_imagem_puxadores($path_image, $id_atualizar)
    {

        $atualizar_imagem_puxadores = $this->conn->prepare("UPDATE puxadores SET imagem = ?  WHERE id = ?");
        $atualizar_imagem_puxadores->bindParam(1, $path_image);
        $atualizar_imagem_puxadores->bindParam(2, $id_atualizar);

        return $atualizar_imagem_puxadores->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM puxadores WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>