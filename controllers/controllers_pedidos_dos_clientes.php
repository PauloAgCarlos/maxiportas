<?php

    include "../database.php";

class controllers_pedidos_dos_clientes extends database
{

    public function inserir($nome_cliente, $descricao_pedido, $data_inicial)
    {

        $insert = $this->conn->prepare("INSERT INTO pedidos_dos_clientes (nome_cliente, descricao_pedido, data_inicial) VALUES (?, ?, ?)");
        $insert->bindParam(1, $nome_cliente);
        $insert->bindParam(2, $descricao_pedido);
        $insert->bindParam(3, $data_inicial);  
        return $insert->execute();

    }

    public function selecionar_pedidos_dos_clientes()
    {
        $selecionar_pedidos_dos_clientes = $this->conn->prepare("SELECT * FROM pedidos_dos_clientes ORDER BY id DESC");
        $selecionar_pedidos_dos_clientes->execute();

        $resulpedidos_dos_clientes = $selecionar_pedidos_dos_clientes->fetchAll(PDO::FETCH_ASSOC);
        return $resulpedidos_dos_clientes;
        
    }

    public function selecionar_pedidos_dos_clientes_id($id)
    {
        $selecionar_pedidos_dos_clientes_id = $this->conn->prepare("SELECT * FROM pedidos_dos_clientes WHERE id = ? ORDER BY id DESC");
        $selecionar_pedidos_dos_clientes_id->bindParam(1, $id);
        $selecionar_pedidos_dos_clientes_id->execute();

        $resulpedidos_dos_clientesID = $selecionar_pedidos_dos_clientes_id->fetchAll(PDO::FETCH_ASSOC);
        return $resulpedidos_dos_clientesID;
        
    }

    public function atualizar_pedidos_dos_clientes($data_final, $status, $nome_responsavel, $id_gestao_pedido)
    {

        $atualizar_pedidos_dos_clientes = $this->conn->prepare("UPDATE pedidos_dos_clientes SET data_final = ?, status = ?, nome_responsavel = ?  WHERE id = ?");
        $atualizar_pedidos_dos_clientes->bindParam(1, $data_final);
        // $atualizar_pedidos_dos_clientes->bindParam(2, $garantia);
        $atualizar_pedidos_dos_clientes->bindParam(2, $status);
        $atualizar_pedidos_dos_clientes->bindParam(3, $nome_responsavel);
        $atualizar_pedidos_dos_clientes->bindParam(4, $id_gestao_pedido);
        return $atualizar_pedidos_dos_clientes->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM pedidos_dos_clientes WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>