<?php

    include "../database.php";

class controllers_linha_de_produto extends database
{

    public function inserir($descricao, $codigo_produto, $codigo_interno, $ultima_alteracao, $ativo)
    {

        $insert = $this->conn->prepare("INSERT INTO linha_de_produto (descricao, codigo_produto, codigo_interno, ultima_alteracao, ativo) VALUES (?, ?, ?, ?, ?)");
        $insert->bindParam(1, $descricao);
        $insert->bindParam(2, $codigo_produto);
        $insert->bindParam(3, $codigo_interno);
        $insert->bindParam(4, $ultima_alteracao);  
        $insert->bindParam(5, $ativo);
        return $insert->execute();

    }

    public function selecionar_linha_de_produto()
    {
        $selecionar_linha_de_produto = $this->conn->prepare("SELECT * FROM linha_de_produto ORDER BY id DESC");
        $selecionar_linha_de_produto->execute();

        $resullinha_de_produto = $selecionar_linha_de_produto->fetchAll(PDO::FETCH_ASSOC);
        return $resullinha_de_produto;
        
    }

    public function selecionar_linha_de_produto_id($id)
    {
        $selecionar_linha_de_produto_id = $this->conn->prepare("SELECT * FROM linha_de_produto WHERE id = ? ORDER BY id DESC");
        $selecionar_linha_de_produto_id->bindParam(1, $id);
        $selecionar_linha_de_produto_id->execute();

        $resullinha_de_produtoID = $selecionar_linha_de_produto_id->fetchAll(PDO::FETCH_ASSOC);
        return $resullinha_de_produtoID;
        
    }

    public function atualizar_linha_de_produto($descricao, $codigo_produto, $codigo_interno, $ultima_alteracao, $ativo, $id_atualizar)
    {

        $atualizar_linha_de_produto = $this->conn->prepare("UPDATE linha_de_produto SET descricao = ?, codigo_produto = ?, codigo_interno = ?, ultima_alteracao = ?, ativo = ?  WHERE id = ?");
        $atualizar_linha_de_produto->bindParam(1, $descricao);
        $atualizar_linha_de_produto->bindParam(2, $codigo_produto);
        $atualizar_linha_de_produto->bindParam(3, $codigo_interno);
        $atualizar_linha_de_produto->bindParam(4, $ultima_alteracao);  
        $atualizar_linha_de_produto->bindParam(5, $ativo);
        $atualizar_linha_de_produto->bindParam(6, $id_atualizar);
        return $atualizar_linha_de_produto->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM linha_de_produto WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>