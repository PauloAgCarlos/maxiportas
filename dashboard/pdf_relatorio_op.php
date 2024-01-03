<?php
require_once('./TCPDF-main/tcpdf.php');

function criarPDF($id_uniqUsuario, $emailUsuario) {
    $pdf = new TCPDF();

    $pdf->SetMargins(5, 10, 5, true);

    require_once "../config.php";
    $conn = new mysqli($DBHOST, $DBUSER, $DBPASS, $DBNAME);
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
    $id = json_decode($_GET["selectedIdsPedidos"]);
    
    if(empty($id)) {
        header('Content-Type: text/html; charset=utf-8');
        header('Location: dashboard.php?vazio');
        exit;
    } else {
        foreach($id as $row_id) 
        {
            // Adicionar uma nova página para cada cliente no PDF

            $sql = "SELECT * FROM tbl_ordem_producao WHERE id = $row_id";
            $result = $conn->query($sql);
            $tbl_ordem_producao = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $tbl_ordem_producao[] = array('id_uniq' => $row['id_uniq'], 'cliente' => $row['cliente'], 'modo' => $row['modo'], 'qtd' => $row['qtd'], 'op' => $row['op'], 'altura' => $row['altura'], 'largura' => $row['largura'], 'imagem_perfil' => $row['imagem_perfil'], 'perfil_lado_esquerdo' => $row['perfil_lado_esquerdo'], 'usinagem_para_esquerdo' => $row['usinagem_para_esquerdo'], 'puxador_esquerdo' => $row['puxador_esquerdo'], 'perfil_lado_direito' => $row['perfil_lado_direito'], 'usinagem_para_direito' => $row['usinagem_para_direito'], 'puxador_direito' => $row['puxador_direito'], 'perfil_lado_superior' => $row['perfil_lado_superior'], 'usinagem_para_superior' => $row['usinagem_para_superior'], 'puxador_superior' => $row['puxador_superior'], 'perfil_lado_inferior' => $row['perfil_lado_inferior'], 'usinagem_para_inferior' => $row['usinagem_para_inferior'], 'puxador_inferior' => $row['puxador_inferior'], 'vidro' => $row['vidro'], 'tv' => $row['tv'], 'servicos' => $row['servicos'], 'travessa' => $row['travessa'], 'portas_pares' => $row['portas_pares'], 'reforco' => $row['reforco'], 'desempenador' => $row['desempenador'], 'esquadreta' => $row['esquadreta'], 'ponteira' => $row['ponteira'], 'kit' => $row['kit'], 'valor_item_cliente' => $row['valor_item_cliente'], 'porcento_desconto' => $row['porcento_desconto'], 'desconto' => $row['desconto'], 'produto' => $row['produto'], 'prod_qtd' => $row['prod_qtd'], 'prod_usinagem_puxador' => $row['prod_usinagem_puxador'], 'prod_valor_item_cliente' => $row['prod_valor_item_cliente'], 'prod_porcento_desconto' => $row['prod_porcento_desconto'], 'prod_desconto' => $row['prod_desconto'], 'val_forma_pagamento' => $row['val_forma_pagamento'], 'val_condicao_pagamento'  => $row['val_condicao_pagamento'], 'val_situacao_financeira' => $row['val_situacao_financeira'], 'val_qtd_portas' => $row['val_qtd_portas'], 'val_qtd_vidros' => $row['val_qtd_vidros'], 'val_qtd_quadros' => $row['val_qtd_quadros'], 'val_qtd_total' => $row['val_qtd_total'], 'val_total_consumidor' => $row['val_total_consumidor'], 'val_valor_itens_clientes' => $row['val_valor_itens_clientes'], 'val_porcento_desconto' => $row['val_porcento_desconto'], 'val_desconto' => $row['val_desconto'], 'val_frete' => $row['val_frete'], 'val_total_cliente' => $row['val_total_cliente'], 'out_valor_itens_parceiro' => $row['out_valor_itens_parceiro'], 'out_porcento_desconto' => $row['out_porcento_desconto'], 'out_desconto' => $row['out_desconto'], 'out_total_parceiro' => $row['out_total_parceiro'], 'out_markup_parceiro' => $row['out_markup_parceiro'], 'out_total_fabrica' => $row['out_total_fabrica'], 'out_markup_fabrica' => $row['out_markup_fabrica'], 'obs_observacao_op' => $row['obs_observacao_op'], 'ap_cli_aprovacao_cliente' => $row['ap_cli_aprovacao_cliente'], 'ap_cli_aprovacao_cliente_data' => $row['ap_cli_aprovacao_cliente_data'], 'ap_cli_cliente_retira' => $row['ap_cli_cliente_retira'], 'ap_cli_pedido_parceiro' => $row['ap_cli_pedido_parceiro'], 'ap_parc_aprovacao_parceiro' => $row['ap_parc_aprovacao_parceiro'], 'ap_parc_andamento_parceiro' => $row['ap_parc_andamento_parceiro'], 'ap_parc_entregue_data' => $row['ap_parc_entregue_data'], 'ap_parc_vendedor_interno' => $row['ap_parc_vendedor_interno'], 'ap_parc_vendedor_externo' => $row['ap_parc_vendedor_externo'], 'ap_parc_vendedor_pedido' => $row['ap_parc_vendedor_pedido'], 'ap_fab_aprovacao_fabrica' => $row['ap_fab_aprovacao_fabrica'], 'ap_fab_pedido_fabrica_data' => $row['ap_fab_pedido_fabrica_data'], 'ap_fab_andamento' => $row['ap_fab_andamento'], 'ap_fab_entrou_producao_data' => $row['ap_fab_entrou_producao_data'], 'ap_fab_produzido' => $row['ap_fab_produzido'], 'ap_fab_entregue' => $row['ap_fab_entregue'],);

                    foreach ($tbl_ordem_producao as $row_odermproducao){}

                    $perfil_selected = $row_odermproducao['perfil_lado_direito'];
                    $sql_tbl_perfil = "SELECT * FROM perfil WHERE descricao = '$perfil_selected'";
                    $result_tbl_perfil = $conn->query($sql_tbl_perfil);

                    $tbl_Perfil = array();

                    if ($result_tbl_perfil->num_rows > 0) {
                                
                        // Preenche o array com os dados dos tbl_Perfil
                        while ($row = $result_tbl_perfil->fetch_assoc()) {
                            $tbl_Perfil[] = array('id' => $row['id'], 'desconto_corte_perfil' => $row['desconto_corte_perfil'],);
                        } 
                    }

                    foreach($tbl_ordem_producao as $rowC)
                    {
                        $newCliente = $rowC['cliente'];
                    }
                    $sql_cliente = "SELECT * FROM tbl_clientes_system WHERE nome = '$newCliente'";
                    $result_tbl_clientes_system = $conn->query($sql_cliente);
                    $tbl_clientes_system = array();

                    $pdf->SetMargins(5, 10, 5, 0);
                    
                    $pdf->AddPage();
                    
                    $header_height = 26;


                    //tbl_clientes_system
                    if ($result_tbl_clientes_system->num_rows > 0) {
                        // Preenche o array com os dados dos tbl_clientes_system
                        while ($row_tbl_clientes_system = $result_tbl_clientes_system->fetch_assoc()) {
                            $tbl_clientes_system[] = array('id' => $row_tbl_clientes_system['id'], 'nome' => $row_tbl_clientes_system['nome'], 'endereco' => $row_tbl_clientes_system['endereco'], 'bairro' => $row_tbl_clientes_system['bairro'], 'cidade' => $row_tbl_clientes_system['cidade'], 'cep' => $row_tbl_clientes_system['cep'], 'celular' => $row_tbl_clientes_system['celular']);
                        }
                    }
                    
                if(isset($_POST['btn_submit']) && $_POST['btn_submit'] == 'Relátorio de Vendas (OP)')
                    {
                        header('Location: pdf_relatorio_op.php');
                        $pdf->setPageOrientation('L');
                        
                        // Adiciona a imagem
                        $image_file = '../assets/img/logoHJ-Aluminio.jpg';  // Substitua pelo caminho real da sua imagem
                        $pdf->Image($image_file, 0, 5, 30, 20);  // Ajuste as coordenadas e o tamanho conforme necessário
                
                        $data = date("d/m/Y");
                
                        // Adiciona o conteúdo em divs
                        $pdf->writeHTMLCell(0, 50, 120, $pdf->GetY(), '<div style="font-size: 10px;"><span style="font-size: 12px;">HJ Alumínios EIRELI</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;Relátorio de Vendas</span></div>', 0, 0, false, true, 'L', true);
                        $pdf->writeHTMLCell(0, 0, 240, $pdf->GetY(), '<div style="font-size: 11px; padding-left: 30px;">Emitido em: ' . $data . '</div>', 0, 0, false, true, 'L', true);
                        // Last Header
                
                        foreach ($tbl_ordem_producao as $row_odermproducao) { }
                        $valorTotal = $row_odermproducao['valor_item_cliente'] * $row_odermproducao['qtd'];
                        $valorTotalConvertido = number_format($valorTotal, 2, '.',',');
                
                        foreach ($tbl_clientes_system as $row_tbl_clientes_system) {
                
                            $pdf->writeHTMLCell($pdf->GetX(), 0, 0, 28, '<table style="font-size: 10px;"><thead style="border: 1px solid black;"><tr style="font-weight: bold;"><th>OP</th><th>Dt.Pedido</th><th>Parceiro</th><th>Cliente</th><th>Valor</th></tr></thead>
                            <tbody><tr><td>'.$row_odermproducao['op'].'</td><td>'.$data.'</td><td>HJ Alumínios</td><td>'.$row_tbl_clientes_system['nome'].'</td><td>$'.number_format($row_odermproducao['valor_item_cliente'], 2, '.', ',').'</td></tr></tbody></table>');
                        }
                        // Adiciona uma borda ao rodapé
                        $header_borda = 8;
                        $pdf->Rect(1, 52, $pdf->getPageWidth() - 2, $header_borda);
                        // Adiciona o conteúdo em divs
                        $pdf->writeHTMLCell(0, 50, 240, 55, '<div style="font-size: 12px;"><strong style="font-size: 11px; padding: 50px; margin: 50px;">Valor Total: $'.$valorTotalConvertido.'</strong></div>', 0, 0, false, true, 'L', true);
                        
                    }
                }
            }
        }
    }

    $pdf->Output('hjaluminio.pdf', 'I');
}

criarPDF("Exemplo id_uniq", "exemplo@dominio.com");
?>
