<?php

    include "../database.php";

class controllers_agregar extends database
{

    public function inserir($descricao, $observacao, $ultima_alteracao, $ativo)
    {

        $insert = $this->conn->prepare("INSERT INTO agregar (descricao, observacao, ultima_alteracao, ativo) VALUES (?, ?, ?, ?)");
        $insert->bindParam(1, $descricao);
        $insert->bindParam(2, $observacao);
        $insert->bindParam(3, $ultima_alteracao);  
        $insert->bindParam(4, $ativo);
        return $insert->execute();

    }

    public function selecionar_agregar()
    {
        $selecionar_agregar = $this->conn->prepare("SELECT * FROM agregar ORDER BY id DESC");
        $selecionar_agregar->execute();

        $resulagregar = $selecionar_agregar->fetchAll(PDO::FETCH_ASSOC);
        return $resulagregar;
        
    }

    public function selecionar_agregar_id($id)
    {
        $selecionar_agregar_id = $this->conn->prepare("SELECT * FROM agregar WHERE id = ? ORDER BY id DESC");
        $selecionar_agregar_id->bindParam(1, $id);
        $selecionar_agregar_id->execute();

        $resulagregarID = $selecionar_agregar_id->fetchAll(PDO::FETCH_ASSOC);
        return $resulagregarID;
        
    }

    public function atualizar_agregar($descricao, $observacao, $ultima_alteracao, $ativo, $id_atualizar)
    {

        $atualizar_agregar = $this->conn->prepare("UPDATE agregar SET descricao = ?, observacao = ?, ultima_alteracao = ?, ativo = ?  WHERE id = ?");
        $atualizar_agregar->bindParam(1, $descricao);
        $atualizar_agregar->bindParam(2, $observacao);
        $atualizar_agregar->bindParam(3, $ultima_alteracao);  
        $atualizar_agregar->bindParam(4, $ativo);
        $atualizar_agregar->bindParam(5, $id_atualizar);
        return $atualizar_agregar->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM agregar WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>