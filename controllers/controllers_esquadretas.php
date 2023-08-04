<?php

    include "../database.php";

class controllers_esquadretas extends database
{

    public function inserir($descricao, $observacao, $custo_metro, $markup, $valor_unitario, $agregar, $codigo_produto, $unidade, $path_image, $codigo_da_fabrica, $ultima_alteracao, $ativo)
    {

        $insert = $this->conn->prepare("INSERT INTO esquadretas (descricao, observacao, custo_metro, markup, valor_unitario, agregar, codigo_produto, unidade, imagem, codigo_da_fabrica, ultima_alteracao, ativo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert->bindParam(1, $descricao);
        $insert->bindParam(2, $observacao);
        $insert->bindParam(3, $custo_metro);            
        $insert->bindParam(4, $markup);
        $insert->bindParam(5, $valor_unitario);
        $insert->bindParam(6, $agregar);
        $insert->bindParam(7, $codigo_produto);
        $insert->bindParam(8, $unidade);
        $insert->bindParam(9, $path_image);   
        $insert->bindParam(10, $codigo_da_fabrica);   
        $insert->bindParam(11, $ultima_alteracao);
        $insert->bindParam(12, $ativo);
        return $insert->execute();

    }

    public function selecionar_esquadretas()
    {
        $selecionar_esquadretas = $this->conn->prepare("SELECT * FROM esquadretas ORDER BY id DESC");
        $selecionar_esquadretas->execute();

        $resulesquadretas = $selecionar_esquadretas->fetchAll(PDO::FETCH_ASSOC);
        return $resulesquadretas;
        
    }

    public function selecionar_esquadretas_id($id)
    {
        $selecionar_esquadretas_id = $this->conn->prepare("SELECT * FROM esquadretas WHERE id = ? ORDER BY id DESC");
        $selecionar_esquadretas_id->bindParam(1, $id);
        $selecionar_esquadretas_id->execute();

        $resulesquadretasID = $selecionar_esquadretas_id->fetchAll(PDO::FETCH_ASSOC);
        return $resulesquadretasID;
        
    }

    public function atualizar_esquadretas($descricao, $observacao, $custo_metro, $markup, $valor_unitario, $agregar, $unidade, $codigo_da_fabrica, $ultima_alteracao, $ativo, $id_atualizar)
    {

        $atualizar_esquadretas = $this->conn->prepare("UPDATE esquadretas SET descricao = ?, observacao = ?, custo_metro = ?, markup = ?, valor_unitario = ?, agregar = ?, unidade = ?, codigo_da_fabrica = ?, ultima_alteracao = ?, ativo = ?  WHERE id = ?");
        $atualizar_esquadretas->bindParam(1, $descricao);
        $atualizar_esquadretas->bindParam(2, $observacao);
        $atualizar_esquadretas->bindParam(3, $custo_metro);            
        $atualizar_esquadretas->bindParam(4, $markup);
        $atualizar_esquadretas->bindParam(5, $valor_unitario);
        $atualizar_esquadretas->bindParam(6, $agregar);
        $atualizar_esquadretas->bindParam(7, $unidade); 
        $atualizar_esquadretas->bindParam(8, $codigo_da_fabrica);   
        $atualizar_esquadretas->bindParam(9, $ultima_alteracao);
        $atualizar_esquadretas->bindParam(10, $ativo);
        $atualizar_esquadretas->bindParam(11, $id_atualizar);
        return $atualizar_esquadretas->execute();
        
    }

    public function atualizar_imagem_esquadretas($path_image, $id_atualizar)
    {

        $atualizar_imagem_esquadretas = $this->conn->prepare("UPDATE esquadretas SET imagem = ?  WHERE id = ?");
        $atualizar_imagem_esquadretas->bindParam(1, $path_image);
        $atualizar_imagem_esquadretas->bindParam(2, $id_atualizar);

        return $atualizar_imagem_esquadretas->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM esquadretas WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>