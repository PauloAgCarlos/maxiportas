<?php

    include "../database.php";

class controllers_indicadores extends database
{

    public function inserir($ano_mes)
    {

        $insert = $this->conn->prepare("INSERT INTO indicadores (ano_mes) VALUES (?)");
        $insert->bindParam(1, $ano_mes);
        return $insert->execute();

    }

    public function selecionar_indicadores()
    {
        $selecionar_indicadores = $this->conn->prepare("SELECT * FROM indicadores ORDER BY id DESC");
        $selecionar_indicadores->execute();

        $resulindicadores = $selecionar_indicadores->fetchAll(PDO::FETCH_ASSOC);
        return $resulindicadores;
        
    }

    public function selecionar_indicadores_id($id)
    {
        $selecionar_indicadores_id = $this->conn->prepare("SELECT * FROM indicadores WHERE id = ? ORDER BY id DESC");
        $selecionar_indicadores_id->bindParam(1, $id);
        $selecionar_indicadores_id->execute();

        $resulindicadoresID = $selecionar_indicadores_id->fetchAll(PDO::FETCH_ASSOC);
        return $resulindicadoresID;
        
    }

    public function atualizar_indicadores($ano_mes, $id_atualizar)
    {

        $atualizar_indicadores = $this->conn->prepare("UPDATE indicadores SET ano_mes = ? WHERE id = ?");
        $atualizar_indicadores->bindParam(1, $ano_mes);
        $atualizar_indicadores->bindParam(2, $id_atualizar);
        return $atualizar_indicadores->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM indicadores WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>