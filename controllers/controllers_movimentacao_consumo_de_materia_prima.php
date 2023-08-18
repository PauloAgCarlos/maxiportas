<?php

    include "../database.php";

class controllers_movimentacao_consumo_de_materia_prima extends database
{

    public function inserir($descricao, $codigo_produto, $codigo_da_fabrica, $tipo, $unidade, $op, $consumo, $perda, $total, $data_pedido, $entrou_em_producao, $produzido, $ativo)
    {

        $insert = $this->conn->prepare("INSERT INTO movimentacao_consumo_de_materia_prima (descricao, codigo_produto, codigo_da_fabrica, tipo, unidade, op, consumo, perda, total, data_pedido, entrou_em_producao, produzido, ativo) VALUES (:descricao, :codigo_produto, :codigo_da_fabrica, :tipo, :unidade, :op, :consumo, :perda, :total, :data_pedido, :entrou_em_producao, :produzido, :ativo)");
        $insert->bindParam(":descricao", $descricao);
        $insert->bindParam(":codigo_produto", $codigo_produto);
        $insert->bindParam(":codigo_da_fabrica", $codigo_da_fabrica);
        $insert->bindParam(":tipo", $tipo);            
        $insert->bindParam(":unidade", $unidade);
        $insert->bindParam(":op", $op);
        $insert->bindParam(":consumo", $consumo);
        $insert->bindParam(":perda", $perda);
        $insert->bindParam(":total", $total);
        $insert->bindParam(":data_pedido", $data_pedido);   
        $insert->bindParam(":entrou_em_producao", $entrou_em_producao);
        $insert->bindParam(":produzido", $produzido);
        $insert->bindParam(":ativo", $ativo);
        $insert->execute();
    }

    public function selecionar_movimentacao_consumo_de_materia_prima()
    {
        $selecionar_movimentacao_consumo_de_materia_prima = $this->conn->prepare("SELECT * FROM movimentacao_consumo_de_materia_prima ORDER BY id DESC");
        $selecionar_movimentacao_consumo_de_materia_prima->execute();

        $resulmovimentacao_consumo_de_materia_prima = $selecionar_movimentacao_consumo_de_materia_prima->fetchAll(PDO::FETCH_ASSOC);
        return $resulmovimentacao_consumo_de_materia_prima;
        
    }

    public function selecionar_movimentacao_consumo_de_materia_prima_id($id)
    {
        $selecionar_movimentacao_consumo_de_materia_prima_id = $this->conn->prepare("SELECT * FROM movimentacao_consumo_de_materia_prima WHERE id = ? ORDER BY id DESC");
        $selecionar_movimentacao_consumo_de_materia_prima_id->bindParam(1, $id);
        $selecionar_movimentacao_consumo_de_materia_prima_id->execute();

        $resulmovimentacao_consumo_de_materia_primaID = $selecionar_movimentacao_consumo_de_materia_prima_id->fetchAll(PDO::FETCH_ASSOC);
        return $resulmovimentacao_consumo_de_materia_primaID;
        
    }

    public function atualizar_movimentacao_consumo_de_materia_prima($descricao, $codigo_produto, $codigo_da_fabrica, $tipo, $unidade, $op, $consumo, $perda, $total, $data_pedido, $entrou_em_producao, $produzido, $ativo, $id_atualizar)
    {

        $atualizar_movimentacao_consumo_de_materia_prima = $this->conn->prepare("UPDATE movimentacao_consumo_de_materia_prima SET descricao = ?, codigo_produto = ?, codigo_da_fabrica = ?, tipo = ?, unidade = ?, op = ?, consumo = ?, perda = ?, total = ?, data_pedido = ?, entrou_em_producao = ?, produzido = ?, ativo = ? WHERE id = ?");
        $atualizar_movimentacao_consumo_de_materia_prima->bindParam(1, $descricao);
        $atualizar_movimentacao_consumo_de_materia_prima->bindParam(2, $codigo_produto);
        $atualizar_movimentacao_consumo_de_materia_prima->bindParam(3, $codigo_da_fabrica);
        $atualizar_movimentacao_consumo_de_materia_prima->bindParam(4, $tipo);            
        $atualizar_movimentacao_consumo_de_materia_prima->bindParam(5, $unidade);
        $atualizar_movimentacao_consumo_de_materia_prima->bindParam(6, $op);
        $atualizar_movimentacao_consumo_de_materia_prima->bindParam(7, $consumo);
        $atualizar_movimentacao_consumo_de_materia_prima->bindParam(8, $perda);
        $atualizar_movimentacao_consumo_de_materia_prima->bindParam(9, $total);
        $atualizar_movimentacao_consumo_de_materia_prima->bindParam(10, $data_pedido);   
        $atualizar_movimentacao_consumo_de_materia_prima->bindParam(11, $entrou_em_producao);
        $atualizar_movimentacao_consumo_de_materia_prima->bindParam(12, $produzido);
        $atualizar_movimentacao_consumo_de_materia_prima->bindParam(13, $ativo);
        $atualizar_movimentacao_consumo_de_materia_prima->bindParam(14, $id_atualizar);

        return $atualizar_movimentacao_consumo_de_materia_prima->execute();
        
    }


    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM movimentacao_consumo_de_materia_prima WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>