<?php

    include "../database.php";

class controllers_acessorios extends database
{

    public function inserir($descricao, $codigo_produto, $observacao, $custo_unitario, $markup, $valor_unitario, $unidade, $tipo_do_acessorio, $desconto_corte, $path_image, $codigo_da_fabrica, $ultima_alteracao, $ativo)
    {

        $insert = $this->conn->prepare("INSERT INTO acessorios (descricao, codigo_produto, observacao, custo_unitario, markup, valor_unitario, unidade, tipo_do_acessorio, desconto_corte, imagem, codigo_da_fabrica, ultima_alteracao, ativo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert->bindParam(1, $descricao);
        $insert->bindParam(2, $codigo_produto);
        $insert->bindParam(3, $observacao);
        $insert->bindParam(4, $custo_unitario);            
        $insert->bindParam(5, $markup);
        $insert->bindParam(6, $valor_unitario);
        $insert->bindParam(7, $unidade);
        $insert->bindParam(8, $tipo_do_acessorio);
        $insert->bindParam(9, $desconto_corte);
        $insert->bindParam(10, $path_image);   
        $insert->bindParam(11, $codigo_da_fabrica);   
        $insert->bindParam(12, $ultima_alteracao);
        $insert->bindParam(13, $ativo);
        return $insert->execute();

    }

    public function selecionar_acessorios()
    {
        $selecionar_acessorios = $this->conn->prepare("SELECT * FROM acessorios ORDER BY id DESC");
        $selecionar_acessorios->execute();

        $resulacessorios = $selecionar_acessorios->fetchAll(PDO::FETCH_ASSOC);
        return $resulacessorios;
        
    }

    public function selecionar_acessorios_id($id)
    {
        $selecionar_acessorios_id = $this->conn->prepare("SELECT * FROM acessorios WHERE id = ? ORDER BY id DESC");
        $selecionar_acessorios_id->bindParam(1, $id);
        $selecionar_acessorios_id->execute();

        $resulacessoriosID = $selecionar_acessorios_id->fetchAll(PDO::FETCH_ASSOC);
        return $resulacessoriosID;
        
    }

    public function atualizar_acessorios($descricao, $codigo_produto, $observacao, $custo_unitario, $markup, $valor_unitario, $unidade, $tipo_do_acessorio, $desconto_corte, $codigo_da_fabrica, $ultima_alteracao, $ativo, $id_atualizar)
    {

        $atualizar_acessorios = $this->conn->prepare("UPDATE acessorios SET descricao = ? , codigo_produto = ? , observacao = ? , custo_unitario = ? , markup = ? , valor_unitario = ? , unidade = ? , tipo_do_acessorio = ? , desconto_corte = ? ,codigo_da_fabrica = ?, ultima_alteracao = ?, ativo = ?  WHERE id = ?");
        $atualizar_acessorios->bindParam(1, $descricao);
        $atualizar_acessorios->bindParam(2, $codigo_produto);
        $atualizar_acessorios->bindParam(3, $observacao);
        $atualizar_acessorios->bindParam(4, $custo_unitario);            
        $atualizar_acessorios->bindParam(5, $markup);
        $atualizar_acessorios->bindParam(6, $valor_unitario);
        $atualizar_acessorios->bindParam(7, $unidade);
        $atualizar_acessorios->bindParam(8, $tipo_do_acessorio);
        $atualizar_acessorios->bindParam(9, $desconto_corte); 
        $atualizar_acessorios->bindParam(10, $codigo_da_fabrica);   
        $atualizar_acessorios->bindParam(11, $ultima_alteracao);
        $atualizar_acessorios->bindParam(12, $ativo);
        $atualizar_acessorios->bindParam(13, $id_atualizar);
        return $atualizar_acessorios->execute();
        
    }

    public function atualizar_imagem_acessorios($path_image, $id_atualizar)
    {

        $atualizar_imagem_acessorios = $this->conn->prepare("UPDATE acessorios SET imagem = ?  WHERE id = ?");
        $atualizar_imagem_acessorios->bindParam(1, $path_image);
        $atualizar_imagem_acessorios->bindParam(2, $id_atualizar);

        return $atualizar_imagem_acessorios->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM acessorios WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>