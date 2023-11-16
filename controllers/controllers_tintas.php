<?php

    include "../database.php";

class controllers_tintas extends database
{

    public function inserir($descricao, $observacao, $ultima_alteracao, $ativo)
    {

        $insert = $this->conn->prepare("INSERT INTO tintas (descricao, observacao, ultima_alteracao, ativo) VALUES (?, ?, ?, ?)");
        $insert->bindParam(1, $descricao);
        $insert->bindParam(2, $observacao);
        $insert->bindParam(3, $ultima_alteracao);  
        $insert->bindParam(4, $ativo);
        return $insert->execute();

    }

    public function selecionar_tintas()
    {
        $selecionar_tintas = $this->conn->prepare("SELECT * FROM tintas ORDER BY id DESC");
        $selecionar_tintas->execute();

        $resultintas = $selecionar_tintas->fetchAll(PDO::FETCH_ASSOC);
        return $resultintas;
        
    }

    public function selecionar_tintas_id($id)
    {
        $selecionar_tintas_id = $this->conn->prepare("SELECT * FROM tintas WHERE id = ? ORDER BY id DESC");
        $selecionar_tintas_id->bindParam(1, $id);
        $selecionar_tintas_id->execute();

        $resultintasID = $selecionar_tintas_id->fetchAll(PDO::FETCH_ASSOC);
        return $resultintasID;
        
    }

    public function atualizar_tintas($descricao, $codigo_produto, $unidade, $custo_grama, $codigo_da_fabrica, $ultima_alteracao, $ativo, $id_atualizar)
    {

        $atualizar_tintas = $this->conn->prepare("UPDATE tintas SET descricao = ?, codigo_produto = ?, unidade = ?, custo = ?, codigo_da_fabrica = ?, ultima_alteracao = ?, ativo = ?  WHERE id = ?");
        $atualizar_tintas->bindParam(1, $descricao);
        $atualizar_tintas->bindParam(2, $codigo_produto);
        $atualizar_tintas->bindParam(3, $unidade);
        $atualizar_tintas->bindParam(4, $custo_grama);
        $atualizar_tintas->bindParam(5, $codigo_da_fabrica);
        $atualizar_tintas->bindParam(6, $ultima_alteracao);  
        $atualizar_tintas->bindParam(7, $ativo);
        $atualizar_tintas->bindParam(8, $id_atualizar);
        return $atualizar_tintas->execute();
        
    }

    // public function atualizar_imagem_tintas($path_image, $id_atualizar)
    // {

    //     $atualizar_imagem_tintas = $this->conn->prepare("UPDATE tintas SET imagem = ?  WHERE id = ?");
    //     $atualizar_imagem_tintas->bindParam(1, $path_image);
    //     $atualizar_imagem_tintas->bindParam(2, $id_atualizar);

    //     return $atualizar_imagem_tintas->execute();
        
    // }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM tintas WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>