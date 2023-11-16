<?php

    include "../database.php";

class controllers_clientes extends database
{

    public function inserir($cpf_cnpj, $nome_razao_social, $contato, $telefone, $celular, $email, $senha, $cep, $rua, $numero, $complemento, $bairro, $cidade, $estado)
    {

        $insert = $this->conn->prepare("INSERT INTO `clientes` (`cpf_cnpj`, `nome_razao_socil`, `contato`, `telefone`, `celular`, `email`, `senha`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert->bindParam(1, $cpf_cnpj);
        $insert->bindParam(2, $nome_razao_social);
        $insert->bindParam(3, $contato);            
        $insert->bindParam(4, $telefone);
        $insert->bindParam(5, $celular);
        $insert->bindParam(6, $email);
        $insert->bindParam(7, $senha);
        $insert->bindParam(8, $rua);
        $insert->bindParam(9, $cep);   
        $insert->bindParam(10, $numero);         
        $insert->bindParam(11, $complemento);            
        $insert->bindParam(12, $bairro);           
        $insert->bindParam(13, $cidade);
        $insert->bindParam(14, $estado);
        $insert->execute();
    }

    public function selecionar_clientes()
    {
        $selecionar_clientes = $this->conn->prepare("SELECT * FROM clientes ORDER BY id DESC");
        $selecionar_clientes->execute();

        $result_clientes = $selecionar_clientes->fetchAll(PDO::FETCH_ASSOC);

        return $result_clientes;
    }

    public function selecionar_clientes_id($id)
    {
        $selecionar_clientes_id = $this->conn->prepare("SELECT * FROM clientes WHERE id = ? ORDER BY id DESC");
        $selecionar_clientes_id->bindParam(1, $id);
        $selecionar_clientes_id->execute();

        if($selecionar_clientes_id->rowCount() > 0)
        {
            $resulClientesID = $selecionar_clientes_id->fetchAll(PDO::FETCH_ASSOC);
            return $resulClientesID;
        }else
        {
            return "Não tem produtos no momento!";
        }
    }

    public function atualizar_clientes($cnpj, $nome, $password, $email, $atividade_principal, $endereco, $abertura, $porte, $situacao, $tipo, $fantasia, $natureza_juridica, $nivel, $id_atualizar)
    {

        $atualizar_clientes = $this->conn->prepare("UPDATE clientes SET cnpj = ?, nome = ?, senha = ?, email = ?, atividade_principal = ?, endereco = ?, abertura = ?, porte = ?, situacao = ?, tipo = ?, fantasia = ?, natureza_juridica = ?, nivel = ? WHERE id = ?");
        $atualizar_clientes->bindParam(1, $cnpj);
        $atualizar_clientes->bindParam(2, $nome);
        $atualizar_clientes->bindParam(3, $password);            
        $atualizar_clientes->bindParam(4, $email);
        $atualizar_clientes->bindParam(5, $atividade_principal);
        $atualizar_clientes->bindParam(6, $endereco);
        $atualizar_clientes->bindParam(7, $abertura);
        $atualizar_clientes->bindParam(8, $porte);
        $atualizar_clientes->bindParam(9, $situacao);   
        $atualizar_clientes->bindParam(10, $tipo);         
        $atualizar_clientes->bindParam(11, $fantasia);            
        $atualizar_clientes->bindParam(12, $natureza_juridica);           
        $atualizar_clientes->bindParam(13, $nivel);
        $atualizar_clientes->bindParam(14, $id_atualizar);
        return $atualizar_clientes->execute();
        
    }

    public function delete($id) 
    {     
        $delete = $this->conn->prepare("DELETE FROM clientes WHERE id = ?");
        $delete->bindParam(1, $id);
        return $delete->execute();
    }
}

?>