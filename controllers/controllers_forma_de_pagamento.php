<?php

    include "../database.php";

class controllers_forma_de_pagamento extends database
{

    public function inserir($descricao, $codigo_produto)
    {

        $insert = $this->conn->prepare("INSERT INTO forma_de_pagamento (descricao, codigo_produto) VALUES (?, ?)");
        $insert->bindParam(1, $descricao);
        $insert->bindParam(2, $codigo_produto);
        return $insert->execute();

    }

    public function selecionar_forma_de_pagamento()
    {
        $selecionar_forma_de_pagamento = $this->conn->prepare("SELECT * FROM forma_de_pagamento ORDER BY id DESC");
        $selecionar_forma_de_pagamento->execute();

        $resulforma_de_pagamento = $selecionar_forma_de_pagamento->fetchAll(PDO::FETCH_ASSOC);
        return $resulforma_de_pagamento;
        
    }

    public function selecionar_forma_de_pagamento_id($id)
    {
        $selecionar_forma_de_pagamento_id = $this->conn->prepare("SELECT * FROM forma_de_pagamento WHERE id = ? ORDER BY id DESC");
        $selecionar_forma_de_pagamento_id->bindParam(1, $id);
        $selecionar_forma_de_pagamento_id->execute();

        $resulforma_de_pagamentoID = $selecionar_forma_de_pagamento_id->fetchAll(PDO::FETCH_ASSOC);
        return $resulforma_de_pagamentoID;
        
    }

    public function atualizar_forma_de_pagamento($descricao, $codigo_produto, $id_atualizar)
    {

        $atualizar_forma_de_pagamento = $this->conn->prepare("UPDATE forma_de_pagamento SET descricao = ?, codigo_produto = ?  WHERE id = ?");
        $atualizar_forma_de_pagamento->bindParam(1, $descricao);
        $atualizar_forma_de_pagamento->bindParam(2, $codigo_produto);
        $atualizar_forma_de_pagamento->bindParam(3, $id_atualizar);
        return $atualizar_forma_de_pagamento->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM forma_de_pagamento WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>