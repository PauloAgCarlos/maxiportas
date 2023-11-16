<?php

    include "../database.php";

class controllers_parametros extends database
{

    public function inserir($descricao, $codigo_produto, $valor, $observacao)
    {
        $insert = $this->conn->prepare("INSERT INTO parametros (descricao, codigo_produto, valor, observacao) VALUES (:descricao, :codigo_produto, :valor, :observacao)");
        $insert->bindParam(":descricao", $descricao);
        $insert->bindParam(":codigo_produto", $codigo_produto);  
        $insert->bindParam(":valor", $valor);        
        $insert->bindParam(":observacao", $observacao);
        $insert->execute();
    }

    public function selecionar_parametros()
    {
        $selecionar_parametros = $this->conn->prepare("SELECT * FROM parametros ORDER BY id DESC");
        $selecionar_parametros->execute();

        $resulparametros = $selecionar_parametros->fetchAll(PDO::FETCH_ASSOC);
        return $resulparametros;        
    }

    public function selecionar_parametros_id($id)
    {
        $selecionar_parametros_id = $this->conn->prepare("SELECT * FROM parametros WHERE id = ? ORDER BY id DESC");
        $selecionar_parametros_id->bindParam(1, $id);
        $selecionar_parametros_id->execute();

        $resulparametrosID = $selecionar_parametros_id->fetchAll(PDO::FETCH_ASSOC);
        return $resulparametrosID;        
    }

    public function atualizar_parametros($descricao, $codigo_produto, $valor, $observacao, $id_atualizar)
    {
        $atualizar_parametros = $this->conn->prepare("UPDATE parametros SET descricao = ?, codigo_produto = ?, valor = ?, observacao = ? WHERE id = ?");
        $atualizar_parametros->bindParam(1, $descricao);
        $atualizar_parametros->bindParam(2, $codigo_produto);  
        $atualizar_parametros->bindParam(3, $valor);        
        $atualizar_parametros->bindParam(4, $observacao);
        $atualizar_parametros->bindParam(5, $id_atualizar);

        return $atualizar_parametros->execute();        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM parametros WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>