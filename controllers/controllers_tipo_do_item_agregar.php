<?php

    include "../database.php";

class controllers_tipo_do_item_agregar extends database
{

    public function inserir($descricao, $codigo_produto)
    {

        $insert = $this->conn->prepare("INSERT INTO tipo_do_item_agregar (descricao, codigo_produto) VALUES (?, ?)");
        $insert->bindParam(1, $descricao);
        $insert->bindParam(2, $codigo_produto);
        return $insert->execute();

    }

    public function selecionar_tipo_do_item_agregar()
    {
        $selecionar_tipo_do_item_agregar = $this->conn->prepare("SELECT * FROM tipo_do_item_agregar ORDER BY id DESC");
        $selecionar_tipo_do_item_agregar->execute();

        $resultipo_do_item_agregar = $selecionar_tipo_do_item_agregar->fetchAll(PDO::FETCH_ASSOC);
        return $resultipo_do_item_agregar;
        
    }

    public function selecionar_tipo_do_item_agregar_id($id)
    {
        $selecionar_tipo_do_item_agregar_id = $this->conn->prepare("SELECT * FROM tipo_do_item_agregar WHERE id = ? ORDER BY id DESC");
        $selecionar_tipo_do_item_agregar_id->bindParam(1, $id);
        $selecionar_tipo_do_item_agregar_id->execute();

        $resultipo_do_item_agregarID = $selecionar_tipo_do_item_agregar_id->fetchAll(PDO::FETCH_ASSOC);
        return $resultipo_do_item_agregarID;
        
    }

    public function atualizar_tipo_do_item_agregar($descricao, $codigo_produto, $id_atualizar)
    {

        $atualizar_tipo_do_item_agregar = $this->conn->prepare("UPDATE tipo_do_item_agregar SET descricao = ?, codigo_produto = ?  WHERE id = ?");
        $atualizar_tipo_do_item_agregar->bindParam(1, $descricao);
        $atualizar_tipo_do_item_agregar->bindParam(2, $codigo_produto);
        $atualizar_tipo_do_item_agregar->bindParam(3, $id_atualizar);
        return $atualizar_tipo_do_item_agregar->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM tipo_do_item_agregar WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>