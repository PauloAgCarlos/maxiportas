<?php

    include "../database.php";

class controllers_basicos_usuarios extends database
{

    public function inserir($nome_ususario, $telefone_usuario, $email_login, $libera_xml_pedido, $libera_painel_producao, $desconto_maximo, $grupo_de_usuarios, $observacao, $ultima_alteracao, $ativo)
    {

        $insert = $this->conn->prepare("INSERT INTO `basicos_usuarios` (nome_ususario, telefone_usuario, email_login, libera_xml_pedido,  libera_painel_producao, desconto_maximo, grupo_de_usuarios, observacao, ultima_alteracao, ativo) VALUES (:nome_ususario, :telefone_usuario, :email_login, :libera_xml_pedido, :libera_painel_producao, :desconto_maximo, :grupo_de_usuarios, :observacao, :ultima_alteracao, :ativo)");
        $insert->bindParam(":nome_ususario", $nome_ususario);
        $insert->bindParam(":telefone_usuario", $telefone_usuario);           
        $insert->bindParam(":email_login", $email_login);
        $insert->bindParam(":libera_xml_pedido", $libera_xml_pedido);
        $insert->bindParam(":libera_painel_producao", $libera_painel_producao);
        $insert->bindParam(":desconto_maximo", $desconto_maximo);
        $insert->bindParam(":grupo_de_usuarios", $grupo_de_usuarios);
        $insert->bindParam(":observacao", $observacao);
        $insert->bindParam(":ultima_alteracao", $ultima_alteracao);
        $insert->bindParam(":ativo", $ativo);
        $insert->execute();
    }

    public function selecionar_basicos_usuarios()
    {
        $selecionar_basicos_usuarios = $this->conn->prepare("SELECT * FROM basicos_usuarios ORDER BY id DESC");
        $selecionar_basicos_usuarios->execute();

        $resulbasicos_usuarios = $selecionar_basicos_usuarios->fetchAll(PDO::FETCH_ASSOC);
        return $resulbasicos_usuarios;
        
    }

    public function selecionar_basicos_usuarios_id($id)
    {
        $selecionar_basicos_usuarios_id = $this->conn->prepare("SELECT * FROM basicos_usuarios WHERE id = ? ORDER BY id DESC");
        $selecionar_basicos_usuarios_id->bindParam(1, $id);
        $selecionar_basicos_usuarios_id->execute();

        $resulbasicos_usuariosID = $selecionar_basicos_usuarios_id->fetchAll(PDO::FETCH_ASSOC);
        return $resulbasicos_usuariosID;
        
    }

    public function atualizar_basicos_usuarios($nome_ususario, $telefone_usuario, $email_login, $libera_xml_pedido, $libera_painel_producao, $desconto_maximo, $grupo_de_usuarios, $observacao, $ultima_alteracao, $ativo, $id_atualizar)
    {

        $atualizar_basicos_usuarios = $this->conn->prepare("UPDATE basicos_usuarios SET nome_ususario = ?, telefone_usuario = ?, email_login = ?, libera_xml_pedido = ?, libera_painel_producao = ?, desconto_maximo = ?, grupo_de_usuarios = ?, observacao = ?, ultima_alteracao = ? ,ativo = ?   WHERE id = ?");
        $atualizar_basicos_usuarios->bindParam(1, $nome_ususario);
        $atualizar_basicos_usuarios->bindParam(2, $telefone_usuario);           
        $atualizar_basicos_usuarios->bindParam(3, $email_login);
        $atualizar_basicos_usuarios->bindParam(4, $libera_xml_pedido);
        $atualizar_basicos_usuarios->bindParam(5, $libera_painel_producao);
        $atualizar_basicos_usuarios->bindParam(6, $desconto_maximo);
        $atualizar_basicos_usuarios->bindParam(7, $grupo_de_usuarios);
        $atualizar_basicos_usuarios->bindParam(8, $observacao);
        $atualizar_basicos_usuarios->bindParam(9, $ultima_alteracao);
        $atualizar_basicos_usuarios->bindParam(10, $ativo);
        $atualizar_basicos_usuarios->bindParam(11, $id_atualizar);

        return $atualizar_basicos_usuarios->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM basicos_usuarios WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>