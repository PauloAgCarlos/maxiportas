<?php

    include "../database.php";

class controllers_parceiros extends database
{

    public function inserir($razaosocial, $nomefantasia, $complemento, $cidade, $endreco, $email, $instagram, $facebook, $codigointerno, $bairro, $cnpj, $cep, $uf, $ie, $numero, $telefone, $path_image)
    {

        $insert = $this->conn->prepare("INSERT INTO `parceiros` (`razaosocial`, `nomefantasia`,`complemento`, `cidade`, `endreco`, `email`, `instagram`, `facebook`, `codigointerno`, `bairro`, `cnpj`, `cep`, `uf`, `ie`, `numero`, `telefone`, `imagem`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert->bindParam(1, $razaosocial);
        $insert->bindParam(2, $nomefantasia);
        $insert->bindParam(3, $complemento);            
        $insert->bindParam(4, $cidade);
        $insert->bindParam(5, $endreco);
        $insert->bindParam(6, $email);
        $insert->bindParam(7, $instagram);
        $insert->bindParam(8, $facebook);
        $insert->bindParam(9, $codigointerno);   
        $insert->bindParam(10, $bairro);         
        $insert->bindParam(11, $cnpj);            
        $insert->bindParam(12, $cep);           
        $insert->bindParam(13, $uf);
        $insert->bindParam(14, $ie);
        $insert->bindParam(15, $numero);
        $insert->bindParam(16, $telefone);
        $insert->bindParam(17, $path_image);

        $insert->execute();
    }

    public function selecionar_parceiros()
    {
        $selecionar_parceiros = $this->conn->prepare("SELECT * FROM parceiros ORDER BY id DESC");
        $selecionar_parceiros->execute();

        $resulparceiros = $selecionar_parceiros->fetchAll(PDO::FETCH_ASSOC);
        return $resulparceiros;
    }

    public function selecionar_parceiros_id($id)
    {
        $selecionar_parceiros_id = $this->conn->prepare("SELECT * FROM parceiros WHERE id = ? ORDER BY id DESC");
        $selecionar_parceiros_id->bindParam(1, $id);
        $selecionar_parceiros_id->execute();

        if($selecionar_parceiros_id->rowCount() > 0)
        {
            $resulparceirosID = $selecionar_parceiros_id->fetchAll(PDO::FETCH_ASSOC);
            return $resulparceirosID;
        }else
        {
            return "Não tem produtos no momento!";
        }
    }

    // public function eliminar_imagem($id_atualizar)
    // {
    //     $selecionar_imagem_id = $this->conn->prepare("SELECT * FROM parceiros WHERE id = ? ORDER BY id DESC");
    //     $selecionar_imagem_id->bindParam(1, $id_atualizar);
    //     return $selecionar_imagem_id->execute();
    // }

    public function atualizar_parceiros($cnpj, $nome, $password, $email, $atividade_principal, $endereco, $abertura, $porte, $situacao, $tipo, $fantasia, $natureza_juridica, $nivel, $id_atualizar)
    {

        $atualizar_parceiros = $this->conn->prepare("UPDATE parceiros SET cnpj = ?, nome = ?, senha = ?, email = ?, atividade_principal = ?, endereco = ?, abertura = ?, porte = ?, situacao = ?, tipo = ?, fantasia = ?, natureza_juridica = ?, nivel = ? WHERE id = ?");
        $atualizar_parceiros->bindParam(1, $cnpj);
        $atualizar_parceiros->bindParam(2, $nome);
        $atualizar_parceiros->bindParam(3, $password);            
        $atualizar_parceiros->bindParam(4, $email);
        $atualizar_parceiros->bindParam(5, $atividade_principal);
        $atualizar_parceiros->bindParam(6, $endereco);
        $atualizar_parceiros->bindParam(7, $abertura);
        $atualizar_parceiros->bindParam(8, $porte);
        $atualizar_parceiros->bindParam(9, $situacao);   
        $atualizar_parceiros->bindParam(10, $tipo);         
        $atualizar_parceiros->bindParam(11, $fantasia);            
        $atualizar_parceiros->bindParam(12, $natureza_juridica);           
        $atualizar_parceiros->bindParam(13, $nivel);
        $atualizar_parceiros->bindParam(14, $id_atualizar);

        return $atualizar_parceiros->execute();
        
    }

    public function atualizar_imagem_parceiros($path_image, $id_atualizar)
    {

        $atualizar_imagem_parceiros = $this->conn->prepare("UPDATE parceiros SET imagem = ?  WHERE id = ?");
        $atualizar_imagem_parceiros->bindParam(1, $path_image);
        $atualizar_imagem_parceiros->bindParam(2, $id_atualizar);

        return $atualizar_imagem_parceiros->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM parceiros WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>