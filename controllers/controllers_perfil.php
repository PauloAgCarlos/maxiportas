<?php

    include "../database.php";

class controllers_perfil extends database
{

    public function inserir($descricao, $puxadoracoplado, $ponteira_acoplado, $ponteira_obrigatoria, $exige_pinturano_vidro, $agregar, $unidade, $vidro, $esquadreta, $esquadreta_reforcada_a, $esquadreta_reforcada_b, $esquadreta_dupla, $custo_metro, $desconto_corte_perfil, $desconto_corte_vidro, $desconto_corte_travessa, $desconto_corte_travessa_oculta, $perda_bordas, $perda_corte, $dimensao, $perda_bordas_retalho, $perda_corte_retalho, $codigo_produto, $quantidade, $ultima_alteracao, $largura_da_mascara, $codigo_da_fabrica, $referencias_do_mercado, $detalhes, $path_image, $ativo)
    {

        $insert = $this->conn->prepare("INSERT INTO `perfil` (`descricao`, `puxadoracoplado`,`ponteira_acoplado`, `ponteira_obrigatoria`, `exige_pinturano_vidro`, `agregar`, `unidade`, `vidro`, `esquadreta`, `esquadreta_reforcada_a`, `esquadreta_reforcada_b`, `esquadreta_dupla`, `custo_metro`, `desconto_corte_perfil`, `desconto_corte_vidro`, `desconto_corte_travessa`, `desconto_corte_travessa_oculta`, `perda_bordas`, `perda_corte`, `dimensao`, `perda_bordas_retalho`, `perda_corte_retalho`, `codigo_produto`, `quantidade`, `ultima_alteracao`, `largura_da_mascara`, `codigo_da_fabrica`, `referencias_do_mercado`, `detalhes`, `imagem`, `ativo`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert->bindParam(1, $descricao);
        $insert->bindParam(2, $puxadoracoplado);
        $insert->bindParam(3, $ponteira_acoplado);            
        $insert->bindParam(4, $ponteira_obrigatoria);
        $insert->bindParam(5, $exige_pinturano_vidro);
        $insert->bindParam(6, $agregar);
        $insert->bindParam(7, $unidade);
        $insert->bindParam(8, $vidro);
        $insert->bindParam(9, $esquadreta);   
        $insert->bindParam(10, $esquadreta_reforcada_a);         
        $insert->bindParam(11, $esquadreta_reforcada_b);            
        $insert->bindParam(12, $esquadreta_dupla);           
        $insert->bindParam(13, $custo_metro);
        $insert->bindParam(14, $desconto_corte_perfil);
        $insert->bindParam(15, $desconto_corte_vidro);
        $insert->bindParam(16, $desconto_corte_travessa);
        $insert->bindParam(17, $desconto_corte_travessa_oculta);
        $insert->bindParam(18, $perda_bordas);
        $insert->bindParam(19, $perda_corte);
        $insert->bindParam(20, $dimensao);
        $insert->bindParam(21, $perda_bordas_retalho);
        $insert->bindParam(22, $perda_corte_retalho);
        $insert->bindParam(23, $codigo_produto);
        $insert->bindParam(24, $quantidade);
        $insert->bindParam(25, $ultima_alteracao);
        $insert->bindParam(26, $largura_da_mascara);
        $insert->bindParam(27, $codigo_da_fabrica);
        $insert->bindParam(28, $referencias_do_mercado);
        $insert->bindParam(29, $detalhes);
        $insert->bindParam(30, $path_image);
        $insert->bindParam(31, $ativo);

        $insert->execute();
    }

    public function selecionar_perfil()
    {
        $selecionar_perfil = $this->conn->prepare("SELECT * FROM perfil ORDER BY id DESC");
        $selecionar_perfil->execute();

        $resulperfil = $selecionar_perfil->fetchAll(PDO::FETCH_ASSOC);
        return $resulperfil;
       
    }

    public function selecionar_perfil_id($id)
    {
        $selecionar_perfil_id = $this->conn->prepare("SELECT * FROM perfil WHERE id = ? ORDER BY id DESC");
        $selecionar_perfil_id->bindParam(1, $id);
        $selecionar_perfil_id->execute();

        if($selecionar_perfil_id->rowCount() > 0)
        {
            $resulperfilID = $selecionar_perfil_id->fetchAll(PDO::FETCH_ASSOC);
            return $resulperfilID;
        }else
        {
            return "Não tem produtos no momento!";
        }
    }

    public function atualizar_perfil($descricao, $puxadoracoplado, $ponteira_acoplado, $ponteira_obrigatoria, $exige_pinturano_vidro, $agregar, $unidade, $vidro, $esquadreta, $esquadreta_reforcada_a, $esquadreta_reforcada_b, $esquadreta_dupla, $custo_metro, $desconto_corte_perfil, $desconto_corte_vidro, $desconto_corte_travessa, $desconto_corte_travessa_oculta, $perda_bordas, $perda_corte, $dimensao, $perda_bordas_retalho, $perda_corte_retalho, $codigo_produto, $quantidade, $ultima_alteracao, $largura_da_mascara, $codigo_da_fabrica, $referencias_do_mercado, $detalhes, $ativo, $id_atualizar)
    {

        $atualizar_perfil = $this->conn->prepare("UPDATE perfil SET descricao = ?, puxadoracoplado = ?, ponteira_acoplado = ?, ponteira_obrigatoria = ?, exige_pinturano_vidro = ?, agregar = ?, unidade = ?, vidro = ?, esquadreta = ?, esquadreta_reforcada_a = ?, esquadreta_reforcada_b = ?, esquadreta_dupla = ?, custo_metro = ?, desconto_corte_perfil = ?, desconto_corte_vidro = ?, desconto_corte_travessa = ?, desconto_corte_travessa_oculta = ?, perda_bordas = ?, perda_corte = ?, dimensao = ?, perda_bordas_retalho = ?, perda_corte_retalho = ?, codigo_produto = ?, quantidade = ?, ultima_alteracao = ?, largura_da_mascara = ?, codigo_da_fabrica = ?, referencias_do_mercado = ?, detalhes = ?, ativo = ?  WHERE id = ?");
        $atualizar_perfil->bindParam(1, $descricao);
        $atualizar_perfil->bindParam(2, $puxadoracoplado);
        $atualizar_perfil->bindParam(3, $ponteira_acoplado);            
        $atualizar_perfil->bindParam(4, $ponteira_obrigatoria);
        $atualizar_perfil->bindParam(5, $exige_pinturano_vidro);
        $atualizar_perfil->bindParam(6, $agregar);
        $atualizar_perfil->bindParam(7, $unidade);
        $atualizar_perfil->bindParam(8, $vidro);
        $atualizar_perfil->bindParam(9, $esquadreta);   
        $atualizar_perfil->bindParam(10, $esquadreta_reforcada_a);         
        $atualizar_perfil->bindParam(11, $esquadreta_reforcada_b);            
        $atualizar_perfil->bindParam(12, $esquadreta_dupla);           
        $atualizar_perfil->bindParam(13, $custo_metro);
        $atualizar_perfil->bindParam(14, $desconto_corte_perfil);
        $atualizar_perfil->bindParam(15, $desconto_corte_vidro);
        $atualizar_perfil->bindParam(16, $desconto_corte_travessa);
        $atualizar_perfil->bindParam(17, $desconto_corte_travessa_oculta);
        $atualizar_perfil->bindParam(18, $perda_bordas);
        $atualizar_perfil->bindParam(19, $perda_corte);
        $atualizar_perfil->bindParam(20, $dimensao);
        $atualizar_perfil->bindParam(21, $perda_bordas_retalho);
        $atualizar_perfil->bindParam(22, $perda_corte_retalho);
        $atualizar_perfil->bindParam(23, $codigo_produto);
        $atualizar_perfil->bindParam(24, $quantidade);
        $atualizar_perfil->bindParam(25, $ultima_alteracao);
        $atualizar_perfil->bindParam(26, $largura_da_mascara);
        $atualizar_perfil->bindParam(27, $codigo_da_fabrica);
        $atualizar_perfil->bindParam(28, $referencias_do_mercado);
        $atualizar_perfil->bindParam(29, $detalhes);
        $atualizar_perfil->bindParam(30, $ativo);
        $atualizar_perfil->bindParam(31, $id_atualizar);

        return $atualizar_perfil->execute();
        
    }

    public function atualizar_imagem_perfil($path_image, $id_atualizar)
    {

        $atualizar_imagem_perfil = $this->conn->prepare("UPDATE perfil SET imagem = ?  WHERE id = ?");
        $atualizar_imagem_perfil->bindParam(1, $path_image);
        $atualizar_imagem_perfil->bindParam(2, $id_atualizar);

        return $atualizar_imagem_perfil->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM perfil WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>