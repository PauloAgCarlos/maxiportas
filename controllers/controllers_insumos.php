<?php

    include "../database.php";

class controllers_insumos extends database
{

    public function inserir($descricao, $codigo_produto, $quantidade, $observacao, $custo, $markup, $valor, $unidade, $codigo_da_fabrica, $ultima_alteracao, $path_image, $ativo)
    {

        $insert = $this->conn->prepare("INSERT INTO insumos (descricao, codigo_produto, quantidade, observacao, custo, markup, valor, unidade, codigo_da_fabrica, ultima_alteracao, imagem, ativo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert->bindParam(1, $descricao);
        $insert->bindParam(2, $codigo_produto);
        $insert->bindParam(3, $quantidade);
        $insert->bindParam(4, $observacao);
        $insert->bindParam(5, $custo);            
        $insert->bindParam(6, $markup);
        $insert->bindParam(7, $valor);
        $insert->bindParam(8, $unidade); 
        $insert->bindParam(9, $codigo_da_fabrica);   
        $insert->bindParam(10, $ultima_alteracao);
        $insert->bindParam(11, $path_image);  
        $insert->bindParam(12, $ativo);
        return $insert->execute();

    }

    public function selecionar_insumos()
    {
        $selecionar_insumos = $this->conn->prepare("SELECT * FROM insumos ORDER BY id DESC");
        $selecionar_insumos->execute();

        $resulinsumos = $selecionar_insumos->fetchAll(PDO::FETCH_ASSOC);
        return $resulinsumos;
        
    }

    public function selecionar_insumos_id($id)
    {
        $selecionar_insumos_id = $this->conn->prepare("SELECT * FROM insumos WHERE id = ? ORDER BY id DESC");
        $selecionar_insumos_id->bindParam(1, $id);
        $selecionar_insumos_id->execute();

        $resulinsumosID = $selecionar_insumos_id->fetchAll(PDO::FETCH_ASSOC);
        return $resulinsumosID;
        
    }

    public function atualizar_insumos($descricao, $codigo_produto, $quantidade, $observacao, $custo, $markup, $valor, $unidade, $codigo_da_fabrica, $ultima_alteracao, $ativo, $id_atualizar)
    {

        $atualizar_insumos = $this->conn->prepare("UPDATE insumos SET descricao = ?, codigo_produto = ?, quantidade = ?, observacao = ?, custo = ?, markup = ?, valor = ?, unidade = ?, codigo_da_fabrica = ?, ultima_alteracao = ?, ativo = ?  WHERE id = ?");
        $atualizar_insumos->bindParam(1, $descricao);
        $atualizar_insumos->bindParam(2, $codigo_produto);
        $atualizar_insumos->bindParam(3, $quantidade);
        $atualizar_insumos->bindParam(4, $observacao);
        $atualizar_insumos->bindParam(5, $custo);            
        $atualizar_insumos->bindParam(6, $markup);
        $atualizar_insumos->bindParam(7, $valor);
        $atualizar_insumos->bindParam(8, $unidade);
        $atualizar_insumos->bindParam(9, $codigo_da_fabrica);   
        $atualizar_insumos->bindParam(10, $ultima_alteracao);
        $atualizar_insumos->bindParam(11, $ativo);
        $atualizar_insumos->bindParam(12, $id_atualizar);
        return $atualizar_insumos->execute();
        
    }

    public function atualizar_imagem_insumos($path_image, $id_atualizar)
    {

        $atualizar_imagem_insumos = $this->conn->prepare("UPDATE insumos SET imagem = ?  WHERE id = ?");
        $atualizar_imagem_insumos->bindParam(1, $path_image);
        $atualizar_imagem_insumos->bindParam(2, $id_atualizar);

        return $atualizar_imagem_insumos->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM insumos WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>