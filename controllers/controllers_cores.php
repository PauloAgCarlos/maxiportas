<?php

    include "../database.php";

class controllers_cores extends database
{

    public function inserir($descricao, $codigo_produto, $observacao, $custo, $markup, $valor, $rendimento, $ultima_alteracao, $ativo)
    {

        $insert = $this->conn->prepare("INSERT INTO cores (descricao, codigo_produto, observacao, custo, markup, valor, rendimento, ultima_alteracao, ativo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert->bindParam(1, $descricao);
        $insert->bindParam(2, $codigo_produto);
        $insert->bindParam(3, $observacao);
        $insert->bindParam(4, $custo);            
        $insert->bindParam(5, $markup);
        $insert->bindParam(6, $valor);
        $insert->bindParam(7, $rendimento); 
        $insert->bindParam(8, $ultima_alteracao);  
        $insert->bindParam(9, $ativo);
        return $insert->execute();

    }

    public function selecionar_cores()
    {
        $selecionar_cores = $this->conn->prepare("SELECT * FROM cores ORDER BY id DESC");
        $selecionar_cores->execute();

        $resulcores = $selecionar_cores->fetchAll(PDO::FETCH_ASSOC);
        return $resulcores;
        
    }

    public function selecionar_cores_id($id)
    {
        $selecionar_cores_id = $this->conn->prepare("SELECT * FROM cores WHERE id = ? ORDER BY id DESC");
        $selecionar_cores_id->bindParam(1, $id);
        $selecionar_cores_id->execute();

        $resulcoresID = $selecionar_cores_id->fetchAll(PDO::FETCH_ASSOC);
        return $resulcoresID;
        
    }

    public function atualizar_cores($descricao, $codigo_produto, $observacao, $custo, $markup, $valor, $rendimento, $ultima_alteracao, $ativo, $id_atualizar)
    {

        $atualizar_cores = $this->conn->prepare("UPDATE cores SET descricao = ?, codigo_produto = ?, observacao = ?, custo = ?, markup = ?, valor = ?, rendimento = ?, ultima_alteracao = ?, ativo = ?  WHERE id = ?");
        $atualizar_cores->bindParam(1, $descricao);
        $atualizar_cores->bindParam(2, $codigo_produto);
        $atualizar_cores->bindParam(3, $observacao);
        $atualizar_cores->bindParam(4, $custo);            
        $atualizar_cores->bindParam(5, $markup);
        $atualizar_cores->bindParam(6, $valor);
        $atualizar_cores->bindParam(7, $rendimento); 
        $atualizar_cores->bindParam(8, $ultima_alteracao);  
        $atualizar_cores->bindParam(9, $ativo);
        $atualizar_cores->bindParam(10, $id_atualizar);
        return $atualizar_cores->execute();
        
    }

    // public function atualizar_imagem_cores($path_image, $id_atualizar)
    // {

    //     $atualizar_imagem_cores = $this->conn->prepare("UPDATE cores SET imagem = ?  WHERE id = ?");
    //     $atualizar_imagem_cores->bindParam(1, $path_image);
    //     $atualizar_imagem_cores->bindParam(2, $id_atualizar);

    //     return $atualizar_imagem_cores->execute();
        
    // }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM cores WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>