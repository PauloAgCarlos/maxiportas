<?php
    require_once "../controllers/controllers_pedidos_dos_clientes.php";

    if(isset($_POST['btn_validar_pedido']))
    {
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //Começa AQui        
        $host = "localhost";
        $user = "root";
        $password = "";
        $bd_name = "maxportas";
        try
        {
            $conn = new PDO("mysql:host=$host;dbname=" . $bd_name, $user, $password);
        }
        catch(PDOException $error)
        {
            die("Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado: " . $error->getMessage());
        }

        //produtos
        $result_produtos = $conn->prepare("SELECT descricao_do_produto FROM produtos ORDER BY id DESC");
        $result_produtos->execute();
        $row_produtos = $result_produtos->fetchAll(PDO::FETCH_ASSOC);

        $array_unido = array();
            $keys = array();
            foreach($row_produtos as $key => $arr) {
                $innerKey = array_keys($arr)[0];
                if(!isset($keys[$innerKey])) {
                    $keys[$innerKey] = 0;
                }
                else {
                    $keys[$innerKey] += 1;
                }
                $prefix = $keys[$innerKey];
                $array_unido[$prefix. '_' .$innerKey] = $arr[$innerKey];
            }
        
        for ($i=0; $i<count($dados['produto_servico']); $i++)
        {        

            if(in_array($dados["produto_servico"][$i], $array_unido))
            {
                //Atualizar Stock
                $qtd_produtos = $conn->prepare("SELECT quantidade_stock FROM produtos WHERE descricao_do_produto = ?");
                $qtd_produtos->bindParam(1, $dados["produto_servico"][$i]);
                $qtd_produtos->execute();
                $row_qtd = $qtd_produtos->fetch(PDO::FETCH_ASSOC);

                if($dados["quantidade_produto_servico"][$i] > $row_qtd['quantidade_stock'])
                {
                    header('Location: dashboard.php?stock_baixo');
                    exit;
                }else 
                {
                    $qtd_atualizada = $row_qtd['quantidade_stock'] - $dados["quantidade_produto_servico"][$i]; 

                    //Atualizar Stock da tbl produtos
                    $atualizar_estoque_produtos = $conn->prepare("UPDATE produtos SET quantidade_stock = ? WHERE descricao_do_produto = ?");
                    $atualizar_estoque_produtos->bindParam(1, $qtd_atualizada);
                    $atualizar_estoque_produtos->bindParam(2, $dados["produto_servico"][$i]);
                    $qtd_stock_atualizado = $atualizar_estoque_produtos->execute();

                    // Select valuer of tbl_produtos where 
                    $produto_sel = $dados["produto_servico"][$i];
                    $select_value_product = $conn->prepare("SELECT descricao_do_produto, venda FROM produtos WHERE descricao_do_produto = ?");
                    $select_value_product->bindParam(1, $dados["produto_servico"][$i]);
                    $select_value_product->execute();
                    $row_select_value_product = $select_value_product->fetchAll(PDO::FETCH_ASSOC);

                    for($c = 0; $c < count($row_select_value_product); $c++)
                    {
                        // echo $row_select_value_product[$c]['descricao_do_produto'] . '_' . $row_select_value_product[$c]['venda'] ; total_valor
                        //Inserir dados na tbl_painel_pedidos_orcamentos
                        $insert = $conn->prepare("INSERT INTO painel_pedidos_orcamentos (valor, descricao_produto_pedido, qtd_produto_pedido, status, ano) VALUES (?, ?, ?, ?, ?)");
                        $insert->bindParam(1, $row_select_value_product[$c]['venda']);
                        $insert->bindParam(2, $dados['produto_servico'][$i]);
                        $insert->bindParam(3, $dados["quantidade_produto_servico"][$i]);
                        $insert->bindParam(4, $dados['status']);
                        $insert->bindValue(5, date('Y'));
                        $insert->execute();

                    }

                    if($qtd_stock_atualizado)
                    {
                        //Atualizar pedidos dos clientes
                        $gestao_pedido = new controllers_pedidos_dos_clientes();
                        $atualizar = $gestao_pedido->atualizar_pedidos_dos_clientes($data_final, $status, $nome_responsavel, $id_gestao_pedido);
                        if($atualizar)
                        {
                            header('Location: dashboard.php?atualizado');
                        }
                        else 
                        {
                            header('Location: dashboard.php?nao-atualizado');
                        }
                    }
                }//Last produtos

                // echo "Exite";
            } else{
                echo "Não Existe";
            }
        }

        // $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        // echo "<pre>";
        // var_dump($dados["produto_servico"]);
        // echo "<pre>";
        // var_dump($dados["quantidade_produto_servico"]);
    }
?>