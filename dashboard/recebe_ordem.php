<?php
    require_once "../config.php";

    try {
        $conn = new PDO("mysql:host=$DBHOST;dbname=$DBNAME;charset=utf8", $DBUSER, $DBPASS);
        // Habilitar exceções PDO
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo 'Erro na conexão ao banco de dados: ' . $e->getMessage();
    }
    if(isset($_POST['btn_incluir']))
    {
        $id_unik = $_POST['id_unik'];
        if($id_unik)
        {
            // header("Location: ordem_producao.php?id_filter=$id_unik");
            
            $cliente = $_POST['cliente'];
            $consumidor = $_POST['name_consumidor'];

            $modo = $_POST['modo'];
            $quantidade = $_POST['qtd'];
            $op = $_POST['op'];
            $altura = $_POST['altura'];
            $largura = $_POST['largura'];

            $imagem_perfil = $_POST['imagem_perfil'];
            $perfil_lado_esquerdo = $_POST['perfil_lado_esquerdo'];
            $usinagem_para_esquerdo = $_POST['usinagem_para_esquerdo'];
            $puxador_esquerdo = $_POST['puxador_esquerdo'];

            $perfil_lado_direito = $_POST['perfil_lado_direito'];
            $usinagem_para_direito = $_POST['usinagem_para_direito'];
            $puxador_direito = $_POST['puxador_direito'];

            $perfil_lado_superior = $_POST['perfil_lado_superior'];
            $usinagem_para_superior = $_POST['usinagem_para_superior'];
            $puxador_superior = $_POST['puxador_superior'];

            $perfil_lado_inferior = $_POST['perfil_lado_inferior'];
            $usinagem_para_inferior = $_POST['usinagem_para_inferior'];
            $puxador_inferior = $_POST['puxador_inferior'];

            $vidro = $_POST['vidro'];
            $tv = $_POST['tv'];

            $servicos = $_POST['servicos'];

            $travessa = $_POST['travessa'];

            // Outros
            $portas_pares = $_POST['portas_pares'];
            $reforco = $_POST['reforco'];
            $desempenador = $_POST['desempenador'];
            $esquadreta = $_POST['esquadreta'];
            $ponteira = $_POST['ponteira'];
            $kit = $_POST['kit'];

            // Valores Clientes
            $portas_valor_item_cliente = $_POST['portas_valor_item_cliente'];
            $porcento_desconto = $_POST['porcento_desconto'];
            $desconto = $_POST['desconto'];

            // Aba Produtos
            $produto = $_POST['produto'];
            $prod_qtd = $_POST['prod_qtd'];
            $prod_usinagem_puxador = $_POST['prod_usinagem_puxador']; 
            $prod_valor_item_cliente = $_POST['prod_valor_item_cliente'];
            $prod_porcento_desconto = $_POST['prod_porcento_desconto'];
            $prod_desconto = $_POST['prod_desconto'];

            // Aba Valores
            $val_forma_pagamento = $_POST['val_forma_pagamento'];
            $val_condicao_pagamento = $_POST['val_condicao_pagamento'];
            $val_situacao_financeira = $_POST['val_situacao_financeira'];
            $val_qtd_portas = $_POST['val_qtd_portas'];
            $val_qtd_vidros = $_POST['val_qtd_vidros'];
            $val_qtd_quadros = $_POST['val_qtd_quadros'];
            $val_qtd_total = $_POST['val_qtd_total'];
            $val_total_consumidor = $_POST['val_total_consumidor'];
            $val_valor_itens_clientes = $_POST['val_valor_itens_clientes'];
            $val_porcento_desconto = $_POST['val_porcento_desconto'];
            $val_desconto = $_POST['val_desconto'];
            $val_frete = $_POST['val_frete'];
            $val_total_cliente = $_POST['val_total_cliente'];
            
            // Aba Outros Valores
            $out_valor_itens_parceiro = $_POST['out_valor_itens_parceiro'];
            $out_porcento_desconto = $_POST['out_porcento_desconto'];
            $out_desconto = $_POST['out_desconto'];
            $out_total_parceiro = $_POST['out_total_parceiro'];
            $out_markup_parceiro = $_POST['out_markup_parceiro'];
            $out_total_fabrica = $_POST['out_total_fabrica'];
            $out_markup_fabrica = $_POST['out_markup_fabrica'];

            // Aba Observações da OP
            $obs_observacao_op = $_POST['obs_observacao_op'];

            // Aba Aprovações Clientes
            $ap_cli_aprovacao_cliente = $_POST['ap_cli_aprovacao_cliente'];
            $ap_cli_aprovacao_cliente_data = $_POST['ap_cli_aprovacao_cliente_data'];
            $ap_cli_cliente_retira = $_POST['ap_cli_cliente_retira'];
            $ap_cli_pedido_parceiro = $_POST['ap_cli_pedido_parceiro'];
            
            // Aba Aprovações Parceiro
            $ap_parc_aprovacao_parceiro = $_POST['ap_parc_aprovacao_parceiro'];
            $ap_parc_andamento_parceiro = $_POST['ap_parc_andamento_parceiro'];
            $ap_parc_entregue_data = $_POST['ap_parc_entregue_data'];
            $ap_parc_vendedor_interno = $_POST['ap_parc_vendedor_interno'];
            $ap_parc_vendedor_externo = $_POST['ap_parc_vendedor_externo'];
            $ap_parc_vendedor_pedido = $_POST['ap_parc_vendedor_pedido'];
            
            // Aba Aprovações Fábrica
            $ap_fab_aprovacao_fabrica = $_POST['ap_fab_aprovacao_fabrica'];
            $ap_fab_pedido_fabrica_data = $_POST['ap_fab_pedido_fabrica_data'];
            $ap_fab_andamento = $_POST['ap_fab_andamento'];
            $ap_fab_entrou_producao_data = $_POST['ap_fab_entrou_producao_data'];
            // Erro #1118 - Tamanho de linha grande demais. O máximo tamanho de linha, não contando BLOBs, é 65535. Você tem que mudar alguns campos para BLOBs
            $ap_fab_produzido = $_POST['ap_fab_produzido'];
            $ap_fab_entregue = $_POST['ap_fab_entregue'];

            // $usinagem_puxador = $_POST['usinagem_puxador'];

            // $endereco = $_POST[''];
            // $bairro = $_POST[''];
            // $cidade = $_POST[''];
            // $qtd_total = $_POST['qtd'];
            // $fone = $_POST[''];
            // $cep = $_POST[''];
            // $cnpj_cpf = $_POST[''];
            
            // $item = $_POST['qtd'];
            // $tipo_produto = $_POST[''];
            // $area = $_POST[''];

            // $travessa = $_POST['travessa'];

            // $vidro = $_POST['vidro'];

            // $obeservacao_item = $_POST[''];

            // $unitario = $_POST[''];
            // $total_item = $_POST[''];

            // $obeservacao_op = $_POST['observacao_op'];
            // $vendedor_a = $_POST[''];

            // $total_cliente = $_POST['total_cliente'];

            // echo $id_unik;
            // .'__'. $qtd .'__'. $altura .'__'. $largura .'__'. $perfil_lado_esquerdo;


            // try {
            //     $stmt = $conn->prepare("INSERT INTO tbl_ordem_producao (id_uniq, cliente, altura, largura) VALUES (:id_uniq, :cliente, :altura, :largura)");
            //     $stmt->bindParam(':id_uniq', $id_unik);
            //     $stmt->bindParam(':cliente', $cliente);
            //     $stmt->bindParam(':altura', $altura);
            //     $stmt->bindParam(':largura', $largura);
            //     $success = $stmt->execute();
            //     if($success)
            //     {
            //         header("Location: ordem_producao.php?id_filter=$id_unik");
            //     }
            // } catch(PDOException $e) {
            //     echo 'Erro ao inserir os dados: ' . $e->getMessage();
            // }

            require_once "../controllers/controllers_ordem_producao.php";
            //try {

                $controller_ordem_producao = new controllers_ordem_producao();
                $atualizar = $controller_ordem_producao->inserir($id_unik, $cliente, $modo, $quantidade, $op, $altura, $largura, $imagem_perfil, $perfil_lado_esquerdo, $usinagem_para_esquerdo, $puxador_esquerdo, $perfil_lado_direito, $usinagem_para_direito, $puxador_direito, $perfil_lado_superior, $usinagem_para_superior, $puxador_superior, $perfil_lado_inferior, $usinagem_para_inferior, $puxador_inferior, $vidro, $tv, $servicos, $travessa, $portas_pares, $reforco, $desempenador, $esquadreta, $ponteira, $kit, $portas_valor_item_cliente, $porcento_desconto, $desconto, $produto, $prod_qtd, $prod_usinagem_puxador, $prod_valor_item_cliente, $prod_porcento_desconto, $prod_desconto, $val_forma_pagamento, $val_condicao_pagamento, $val_situacao_financeira, $val_qtd_portas, $val_qtd_vidros, $val_qtd_quadros, $val_qtd_total, $val_total_consumidor, $val_valor_itens_clientes, $val_porcento_desconto, $val_desconto, $val_frete, $val_total_cliente, $out_valor_itens_parceiro, $out_porcento_desconto, $out_desconto, $out_total_parceiro, $out_markup_parceiro, $out_total_fabrica, $out_markup_fabrica, $obs_observacao_op, $ap_cli_aprovacao_cliente, $ap_cli_aprovacao_cliente_data, $ap_cli_cliente_retira, $ap_cli_pedido_parceiro, $ap_parc_aprovacao_parceiro, $ap_parc_andamento_parceiro, $ap_parc_entregue_data, $ap_parc_vendedor_interno, $ap_parc_vendedor_externo, $ap_parc_vendedor_pedido, $ap_fab_aprovacao_fabrica, $ap_fab_pedido_fabrica_data, $ap_fab_andamento, $ap_fab_entrou_producao_data, $ap_fab_produzido, $ap_fab_entregue);

            
            /*} catch(PDOException $e) {
                 echo 'Erro ao inserir os dados: ' . $e->getMessage();
            }*/
            if($atualizar)
            {
                header("Location: ordem_producao.php?id_filter=$id_unik");
            }
            else 
            {
                header('Location: ordem_producao.php?nao-atualizado');
            }
        }
    }
?>