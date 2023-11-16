<?php

    include "../database.php";

class controllers_classificacao_de_clientes extends database
{

    public function inserir($descricao, $codigo_produto)
    {

        $insert = $this->conn->prepare("INSERT INTO classificacao_de_clientes (descricao, codigo_produto) VALUES (?, ?)");
        $insert->bindParam(1, $descricao);
        $insert->bindParam(2, $codigo_produto);
        return $insert->execute();

    }

    public function selecionar_classificacao_de_clientes()
    {
        $selecionar_classificacao_de_clientes = $this->conn->prepare("SELECT * FROM classificacao_de_clientes ORDER BY id DESC");
        $selecionar_classificacao_de_clientes->execute();

        $resulclassificacao_de_clientes = $selecionar_classificacao_de_clientes->fetchAll(PDO::FETCH_ASSOC);
        return $resulclassificacao_de_clientes;
        
    }

    public function selecionar_classificacao_de_clientes_id($id)
    {
        $selecionar_classificacao_de_clientes_id = $this->conn->prepare("SELECT * FROM classificacao_de_clientes WHERE id = ? ORDER BY id DESC");
        $selecionar_classificacao_de_clientes_id->bindParam(1, $id);
        $selecionar_classificacao_de_clientes_id->execute();

        $resulclassificacao_de_clientesID = $selecionar_classificacao_de_clientes_id->fetchAll(PDO::FETCH_ASSOC);
        return $resulclassificacao_de_clientesID;
        
    }

    public function atualizar_classificacao_de_clientes($descricao, $codigo_produto, $id_atualizar)
    {

        $atualizar_classificacao_de_clientes = $this->conn->prepare("UPDATE classificacao_de_clientes SET descricao = ?, codigo_produto = ?  WHERE id = ?");
        $atualizar_classificacao_de_clientes->bindParam(1, $descricao);
        $atualizar_classificacao_de_clientes->bindParam(2, $codigo_produto);
        $atualizar_classificacao_de_clientes->bindParam(3, $id_atualizar);
        return $atualizar_classificacao_de_clientes->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM classificacao_de_clientes WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>