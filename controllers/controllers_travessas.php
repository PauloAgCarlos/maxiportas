<?php

    include "../database.php";

class controllers_travessas extends database
{

    public function inserir($descricao, $agregar, $unidade, $esquadreta, $oculto, $referencias_do_mercado, $custo_metro, $markup, $valor, $desconto_corte_vidro, $perda, $perda_bordas, $perda_corte, $dimensao, $perda_bordas_retalho, $perda_corte_retalho, $path_image, $ultima_alteracao, $ativo)
    {

        $insert = $this->conn->prepare("INSERT INTO `travessas` (`descricao`, `agregar`,`unidade`, `esquadreta`, `oculto`, `referencias_do_mercado`, `custo_metro`, `markup`, `valor`, `desconto_corte_vidro`, `perda`, `perda_bordas`, `perda_corte`, `dimensao`, `perda_bordas_retalho`, `perda_corte_retalho`, `imagem`, `ultima_alteracao`, `ativo`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert->bindParam(1, $descricao);
        $insert->bindParam(2, $agregar);
        $insert->bindParam(3, $unidade);            
        $insert->bindParam(4, $esquadreta);
        $insert->bindParam(5, $oculto);
        $insert->bindParam(6, $referencias_do_mercado);
        $insert->bindParam(7, $custo_metro);
        $insert->bindParam(8, $markup);
        $insert->bindParam(9, $valor);   
        $insert->bindParam(10, $desconto_corte_vidro);         
        $insert->bindParam(11, $perda);            
        $insert->bindParam(12, $perda_bordas);           
        $insert->bindParam(13, $perda_corte);
        $insert->bindParam(14, $dimensao);
        $insert->bindParam(15, $perda_bordas_retalho);
        $insert->bindParam(16, $perda_corte_retalho);
        $insert->bindParam(17, $path_image);
        $insert->bindParam(18, $ultima_alteracao);
        $insert->bindParam(19, $ativo);
        $insert->execute();
    }

    public function selecionar_travessas()
    {
        $selecionar_travessas = $this->conn->prepare("SELECT * FROM travessas ORDER BY id DESC");
        $selecionar_travessas->execute();

        $resultravessas = $selecionar_travessas->fetchAll(PDO::FETCH_ASSOC);
        return $resultravessas;
        
    }

    public function selecionar_travessas_id($id)
    {
        $selecionar_travessas_id = $this->conn->prepare("SELECT * FROM travessas WHERE id = ? ORDER BY id DESC");
        $selecionar_travessas_id->bindParam(1, $id);
        $selecionar_travessas_id->execute();

        $resultravessasID = $selecionar_travessas_id->fetchAll(PDO::FETCH_ASSOC);
        return $resultravessasID;
        
    }

    public function atualizar_travessas($descricao, $agregar, $unidade, $esquadreta, $oculto, $referencias_do_mercado, $custo_metro, $markup, $valor, $desconto_corte_vidro, $perda, $perda_bordas, $perda_corte, $dimensao, $perda_bordas_retalho, $perda_corte_retalho, $ultima_alteracao, $ativo,$id_atualizar)
    {

        $atualizar_travessas = $this->conn->prepare("UPDATE travessas SET descricao = ? , agregar = ?, unidade = ? , esquadreta = ? , oculto = ? , referencias_do_mercado = ? , custo_metro = ? , markup = ? , valor = ? , desconto_corte_vidro = ? , perda = ? , perda_bordas = ? , perda_corte = ? ,dimensao = ? , perda_bordas_retalho = ? , perda_corte_retalho = ?, ultima_alteracao = ? ,ativo = ?   WHERE id = ?");
        $atualizar_travessas->bindParam(1, $descricao);
        $atualizar_travessas->bindParam(2, $agregar);
        $atualizar_travessas->bindParam(3, $unidade);            
        $atualizar_travessas->bindParam(4, $esquadreta);
        $atualizar_travessas->bindParam(5, $oculto);
        $atualizar_travessas->bindParam(6, $referencias_do_mercado);
        $atualizar_travessas->bindParam(7, $custo_metro);
        $atualizar_travessas->bindParam(8, $markup);
        $atualizar_travessas->bindParam(9, $valor);   
        $atualizar_travessas->bindParam(10, $desconto_corte_vidro);         
        $atualizar_travessas->bindParam(11, $perda);            
        $atualizar_travessas->bindParam(12, $perda_bordas);           
        $atualizar_travessas->bindParam(13, $perda_corte);
        $atualizar_travessas->bindParam(14, $dimensao);
        $atualizar_travessas->bindParam(15, $perda_bordas_retalho);
        $atualizar_travessas->bindParam(16, $perda_corte_retalho);
        $atualizar_travessas->bindParam(17, $ultima_alteracao);
        $atualizar_travessas->bindParam(18, $ativo);
        $atualizar_travessas->bindParam(19, $id_atualizar);

        return $atualizar_travessas->execute();
        
    }

    public function atualizar_imagem_travessas($path_image, $id_atualizar)
    {

        $atualizar_imagem_travessas = $this->conn->prepare("UPDATE travessas SET imagem = ?  WHERE id = ?");
        $atualizar_imagem_travessas->bindParam(1, $path_image);
        $atualizar_imagem_travessas->bindParam(2, $id_atualizar);

        return $atualizar_imagem_travessas->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM travessas WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>