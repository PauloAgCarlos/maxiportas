<?php

    include "../database.php";

class controllers_calendario extends database
{

    public function inserir($ano_mes, $dias_uteis)
    {

        $insert = $this->conn->prepare("INSERT INTO calendario (ano_mes, dias_uteis) VALUES (?, ?)");
        $insert->bindParam(1, $ano_mes);
        $insert->bindParam(2, $dias_uteis);
        return $insert->execute();

    }

    public function selecionar_calendario()
    {
        $selecionar_calendario = $this->conn->prepare("SELECT * FROM calendario ORDER BY id DESC");
        $selecionar_calendario->execute();

        $resulcalendario = $selecionar_calendario->fetchAll(PDO::FETCH_ASSOC);
        return $resulcalendario;
        
    }

    public function selecionar_calendario_id($id)
    {
        $selecionar_calendario_id = $this->conn->prepare("SELECT * FROM calendario WHERE id = ? ORDER BY id DESC");
        $selecionar_calendario_id->bindParam(1, $id);
        $selecionar_calendario_id->execute();

        $resulcalendarioID = $selecionar_calendario_id->fetchAll(PDO::FETCH_ASSOC);
        return $resulcalendarioID;
        
    }

    public function atualizar_calendario($ano_mes, $dias_uteis, $id_atualizar)
    {

        $atualizar_calendario = $this->conn->prepare("UPDATE calendario SET ano_mes = ?, dias_uteis = ?  WHERE id = ?");
        $atualizar_calendario->bindParam(1, $ano_mes);
        $atualizar_calendario->bindParam(2, $dias_uteis);
        $atualizar_calendario->bindParam(3, $id_atualizar);
        return $atualizar_calendario->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM calendario WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>