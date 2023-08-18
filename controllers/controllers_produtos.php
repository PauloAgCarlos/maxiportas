<?php

    include "../database.php";

class controllers_produtos extends database
{

    public function inserir($descricao_do_produto, $codigo_produto, $codigo_da_fabrica, $referencia, $libera_para_venda, $bloqueia_estoque_negativo, $embalagem_fornecedor, $consumo_medio, $massa, $ultima_alteracao, $ativo, $custo_atual, $markup, $venda, $ipi, $unidade_basica, $estoque, $estoque_minimo, $estoque_de_seguranca, $tempo_de_reposicao, $linha, $embalagem, $localizador, $classificacao_fiscal, $volume)
    {

        $insert = $this->conn->prepare("INSERT INTO produtos (descricao_do_produto, codigo_produto, codigo_da_fabrica, referencia, libera_para_venda, bloqueia_estoque_negativo, embalagem_fornecedor, consumo_medio, massa, ultima_alteracao, ativo, custo_atual, markup, venda, ipi, unidade_basica, estoque, estoque_minimo, estoque_de_seguranca, tempo_de_reposicao, linha, embalagem, localizador, classificacao_fiscal, volume) VALUES (:descricao_do_produto, :codigo_produto, :codigo_da_fabrica, :referencia, :libera_para_venda, :bloqueia_estoque_negativo, :embalagem_fornecedor, :consumo_medio, :massa, :ultima_alteracao, :ativo, :custo_atual, :markup, :venda, :ipi, :unidade_basica, :estoque, :estoque_minimo, :estoque_de_seguranca, :tempo_de_reposicao, :linha, :embalagem, :localizador, :classificacao_fiscal, :volume)");
 
        $insert->bindParam(":descricao_do_produto", $descricao_do_produto);
        $insert->bindParam(":codigo_produto", $codigo_produto);
        $insert->bindParam(":codigo_da_fabrica", $codigo_da_fabrica);
        $insert->bindParam(":referencia", $referencia);
        $insert->bindParam(":libera_para_venda", $libera_para_venda);
        $insert->bindParam(":bloqueia_estoque_negativo", $bloqueia_estoque_negativo);
        $insert->bindParam(":embalagem_fornecedor", $embalagem_fornecedor);
        $insert->bindParam(":consumo_medio", $consumo_medio);
        $insert->bindParam(":massa", $massa);
        $insert->bindParam(":ultima_alteracao", $ultima_alteracao);
        $insert->bindParam(":ativo", $ativo);
        $insert->bindParam(":custo_atual", $custo_atual);
        $insert->bindParam(":markup", $markup);
        $insert->bindParam(":venda", $venda);
        $insert->bindParam(":ipi", $ipi);
        $insert->bindParam(":unidade_basica", $unidade_basica);
        $insert->bindParam(":estoque", $estoque);
        $insert->bindParam(":estoque_minimo", $estoque_minimo);
        $insert->bindParam(":estoque_de_seguranca", $estoque_de_seguranca);
        $insert->bindParam(":tempo_de_reposicao", $tempo_de_reposicao);
        $insert->bindParam(":linha", $linha);
        $insert->bindParam(":embalagem", $embalagem);
        $insert->bindParam(":localizador", $localizador);
        $insert->bindParam(":classificacao_fiscal", $classificacao_fiscal);
        $insert->bindParam(":volume", $volume);
        return $insert->execute();

    }

    public function selecionar_produtos()
    {
        $selecionar_produtos = $this->conn->prepare("SELECT * FROM produtos ORDER BY id DESC");
        $selecionar_produtos->execute();

        $resulprodutos = $selecionar_produtos->fetchAll(PDO::FETCH_ASSOC);
        return $resulprodutos;
        
    }

    public function selecionar_produtos_id($id)
    {
        $selecionar_produtos_id = $this->conn->prepare("SELECT * FROM produtos WHERE id = ? ORDER BY id DESC");
        $selecionar_produtos_id->bindParam(1, $id);
        $selecionar_produtos_id->execute();

        $resulprodutosID = $selecionar_produtos_id->fetchAll(PDO::FETCH_ASSOC);
        return $resulprodutosID;
        
    }

    public function atualizar_produtos($descricao_do_produto, $codigo_produto, $codigo_da_fabrica, $referencia, $libera_para_venda, $bloqueia_estoque_negativo, $embalagem_fornecedor, $consumo_medio, $massa, $ultima_alteracao, $ativo, $custo_atual, $markup, $venda, $ipi, $unidade_basica, $estoque, $estoque_minimo, $estoque_de_seguranca, $tempo_de_reposicao, $linha, $embalagem, $localizador, $classificacao_fiscal, $volume, $id_atualizar)
    {

        $atualizar_produtos = $this->conn->prepare("UPDATE produtos SET descricao_do_produto = ?, codigo_produto = ?, codigo_da_fabrica = ?, referencia = ?, libera_para_venda = ?, bloqueia_estoque_negativo = ?, embalagem_fornecedor = ?, consumo_medio = ?, massa = ?, ultima_alteracao = ?, ativo = ?, custo_atual = ?, markup = ?, venda = ?, ipi = ?, unidade_basica = ?, estoque = ?, estoque_minimo = ?, estoque_de_seguranca = ?, tempo_de_reposicao = ?, linha = ?, embalagem = ?, localizador = ?, classificacao_fiscal = ?, volume = ?  WHERE id = ?");
        $atualizar_produtos->bindParam(1, $descricao_do_produto);
        $atualizar_produtos->bindParam(2, $codigo_produto);
        $atualizar_produtos->bindParam(3, $codigo_da_fabrica);
        $atualizar_produtos->bindParam(4, $referencia);
        $atualizar_produtos->bindParam(5, $libera_para_venda);
        $atualizar_produtos->bindParam(6, $bloqueia_estoque_negativo);
        $atualizar_produtos->bindParam(7, $embalagem_fornecedor);
        $atualizar_produtos->bindParam(8, $consumo_medio);
        $atualizar_produtos->bindParam(9, $massa);
        $atualizar_produtos->bindParam(10, $ultima_alteracao);
        $atualizar_produtos->bindParam(11, $ativo);
        $atualizar_produtos->bindParam(12, $custo_atual);
        $atualizar_produtos->bindParam(13, $markup);
        $atualizar_produtos->bindParam(14, $venda);
        $atualizar_produtos->bindParam(15, $ipi);
        $atualizar_produtos->bindParam(16, $unidade_basica);
        $atualizar_produtos->bindParam(17, $estoque);
        $atualizar_produtos->bindParam(18, $estoque_minimo);
        $atualizar_produtos->bindParam(19, $estoque_de_seguranca);
        $atualizar_produtos->bindParam(20, $tempo_de_reposicao);
        $atualizar_produtos->bindParam(21, $linha);
        $atualizar_produtos->bindParam(22, $embalagem);
        $atualizar_produtos->bindParam(23, $localizador);
        $atualizar_produtos->bindParam(24, $classificacao_fiscal);
        $atualizar_produtos->bindParam(25, $volume);
        $atualizar_produtos->bindParam(26, $id_atualizar);
        return $atualizar_produtos->execute();
        
    }

    public function delete($id_delete) 
    {     
        $delete = $this->conn->prepare("DELETE FROM produtos WHERE id = ?");
        $delete->bindParam(1, $id_delete);
        return $delete->execute();
    }
}

?>