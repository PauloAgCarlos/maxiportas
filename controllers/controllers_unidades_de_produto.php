<?php

    include "../database.php";

class controllers_unidades_de_produto extends database
{

    public function inserir($descricao, $codigo_produto, $codigo_interno, $ultima_alteracao, $ativo)
    {

        $insert = $this->conn->prepare("INSERT INTO unidades_de_produto (descricao, codigo_produto, codigo_interno, ultima_alteracao, ativo) VALUES (?, ?, ?, ?, ?)");
        $insert->bindParam(1, $descricao);
        $insert->bindParam(2, $codigo_produto);
        $insert->bindParam(3, $codigo_interno);
        $insert->bindParam(4, $ultima_alteracao);  
        $insert->bindParam(5, $ativo);
        return $insert->execute();

    }

    public function selecionar_unidades_de_produto()
    {
        $selecionar_unidades_de_produto = $this->conn->prepare("SELECT * FROM unidades_de_produto ORDER BY id DESC");
        $selecionar_unidades_de_produto->execute();

        $resulunidades_de_produto = $selecionar_unidades_de_produto->fetchAll(PDO::FETCH_ASSOC);
        return $resulunidades_de_produto;
        
    }

    public function selecionar_unidades_de_produto_id($id)
    {
        $selecionar_unidades_de_produto_id = $this->conn->prepare("SELECT * FROM unidades_de_produto WHERE id = ? ORDER BY id DESC");
        $selecionar_unidades_de_produto_id->bindParam(1, $id);
        $selecionar_unidades_de_produto_id->execute();

        $resulunidades_de_produtoID = $selecionar_unidades_de_produto_id->fetchAll(PDO::FETCH_ASSOC);
        return $resulunidades_de_produtoID;
        
    }

    public function atualizar_unidades_de_produto($descricao, $codigo_produto, $unidade, $custo_grama, $codigo_da_fabrica, $ultima_alteracao, $ativo, $id_atualizar)
    {

        $atualizar_unidades_de_produto = $this->conn->prepare("UPDATE unidades_de_produto SET descricao = ?, codigo_produto = ?, codigo_interno = ?, ultima_alteracao = ?, ativo = ?  WHERE id = ?");
        $atualizar_unidades_de_produto->bindParam(1, $descricao);
        $atualizar_unidades_de_produto->bindParam(2, $codigo_produto);
        $atualizar_unidades_de_produto->bindParam(3, $codigo_interno);
        $atualizar_unidades_de_produto->bindParam(4, $ultima_alteracao);  
        $atualizar_unidades_de_produto->bindParam(5, $ativo);
        $atualizar_unidades_de_produto->bindParam(7, $id_atualizar);
        return $atualizar_unidades_de_produto->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM unidades_de_produto WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>