<?php

    include "../database.php";

class controllers_dobradicas extends database
{

    public function inserir($descricao, $codigo_produto, $quantidade, $medida_inicial, $medida_final, $quantidade_de_furos, $distancia_primeiro_furo, $ultima_alteracao, $ativo)
    {

        $insert = $this->conn->prepare("INSERT INTO dobradicas (descricao, codigo_produto, quantidade, medida_inicial, medida_final, quantidade_de_furos, distancia_primeiro_furo, ultima_alteracao, ativo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert->bindParam(1, $descricao);
        $insert->bindParam(2, $codigo_produto);
        $insert->bindParam(3, $quantidade);
        $insert->bindParam(4, $medida_inicial);            
        $insert->bindParam(5, $medida_final);
        $insert->bindParam(6, $quantidade_de_furos);
        $insert->bindParam(7, $distancia_primeiro_furo);   
        $insert->bindParam(8, $ultima_alteracao); 
        $insert->bindParam(9, $ativo);
        return $insert->execute();

    }

    public function selecionar_dobradicas()
    {
        $selecionar_dobradicas = $this->conn->prepare("SELECT * FROM dobradicas ORDER BY id DESC");
        $selecionar_dobradicas->execute();

        $resuldobradicas = $selecionar_dobradicas->fetchAll(PDO::FETCH_ASSOC);
        return $resuldobradicas;
        
    }

    public function selecionar_dobradicas_id($id)
    {
        $selecionar_dobradicas_id = $this->conn->prepare("SELECT * FROM dobradicas WHERE id = ? ORDER BY id DESC");
        $selecionar_dobradicas_id->bindParam(1, $id);
        $selecionar_dobradicas_id->execute();

        $resuldobradicasID = $selecionar_dobradicas_id->fetchAll(PDO::FETCH_ASSOC);
        return $resuldobradicasID;
        
    }

    public function atualizar_dobradicas($descricao, $codigo_produto, $quantidade, $medida_inicial, $medida_final, $quantidade_de_furos, $distancia_primeiro_furo, $ultima_alteracao, $ativo, $id_atualizar)
    {

        $atualizar_dobradicas = $this->conn->prepare("UPDATE dobradicas SET descricao = ?, codigo_produto = ?, quantidade = ?, medida_inicial = ?, medida_final = ?, quantidade_de_furos = ?, distancia_primeiro_furo = ?, ultima_alteracao = ?, ativo = ?  WHERE id = ?");
        $atualizar_dobradicas->bindParam(1, $descricao);
        $atualizar_dobradicas->bindParam(2, $codigo_produto);
        $atualizar_dobradicas->bindParam(3, $quantidade);
        $atualizar_dobradicas->bindParam(4, $medida_inicial);
        $atualizar_dobradicas->bindParam(5, $medida_final);            
        $atualizar_dobradicas->bindParam(6, $quantidade_de_furos);
        $atualizar_dobradicas->bindParam(7, $distancia_primeiro_furo); 
        $atualizar_dobradicas->bindParam(8, $ultima_alteracao);
        $atualizar_dobradicas->bindParam(9, $ativo);
        $atualizar_dobradicas->bindParam(10, $id_atualizar);
        return $atualizar_dobradicas->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM dobradicas WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>