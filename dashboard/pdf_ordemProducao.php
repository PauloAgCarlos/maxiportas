<?php
require_once('./TCPDF-main/tcpdf.php');

// Função para criar o PDF
function criarPDF($id_uniqUsuario, $emailUsuario) {
    $pdf = new TCPDF();

    require_once "../config.php";
    $conn = new mysqli($DBHOST, $DBUSER, $DBPASS, $DBNAME);
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
    $id_uniq = $_POST['id_ordemProducao'];
    $adminName = isset($_POST['admin']) ? htmlspecialchars($_POST['admin']) : '';
 
    
    if(empty($id_uniq))
    {
        header('Location: ordem_producao.php?vazio');
    }
    
    $sql = "SELECT * FROM tbl_ordem_producao WHERE id_uniq = '$id_uniq'";
    $result = $conn->query($sql);

    $tbl_ordem_producao = array();

    if ($result->num_rows > 0) {
                
        // Preenche o array com os dados dos tbl_ordem_producao
        while ($row = $result->fetch_assoc()) {
            $tbl_ordem_producao[] = array('id_uniq' => $row['id_uniq'], 'cliente' => $row['cliente'], 'modo' => $row['modo'], 'qtd' => $row['qtd'], 'op' => $row['op'], 'altura' => $row['altura'], 'largura' => $row['largura'], 'imagem_perfil' => $row['imagem_perfil'], 'perfil_lado_esquerdo' => $row['perfil_lado_esquerdo'], 'usinagem_para_esquerdo' => $row['usinagem_para_esquerdo'], 'puxador_esquerdo' => $row['puxador_esquerdo'], 'perfil_lado_direito' => $row['perfil_lado_direito'], 'usinagem_para_direito' => $row['usinagem_para_direito'], 'puxador_direito' => $row['puxador_direito'], 'perfil_lado_superior' => $row['perfil_lado_superior'], 'usinagem_para_superior' => $row['usinagem_para_superior'], 'puxador_superior' => $row['puxador_superior'], 'perfil_lado_inferior' => $row['perfil_lado_inferior'], 'usinagem_para_inferior' => $row['usinagem_para_inferior'], 'puxador_inferior' => $row['puxador_inferior'], 'vidro' => $row['vidro'], 'tv' => $row['tv'], 'servicos' => $row['servicos'], 'travessa' => $row['travessa'], 'portas_pares' => $row['portas_pares'], 'reforco' => $row['reforco'], 'desempenador' => $row['desempenador'], 'esquadreta' => $row['esquadreta'], 'ponteira' => $row['ponteira'], 'kit' => $row['kit'], 'valor_item_cliente' => $row['valor_item_cliente'], 'porcento_desconto' => $row['porcento_desconto'], 'desconto' => $row['desconto'], 'produto' => $row['produto'], 'prod_qtd' => $row['prod_qtd'], 'prod_usinagem_puxador' => $row['prod_usinagem_puxador'], 'prod_valor_item_cliente' => $row['prod_valor_item_cliente'], 'prod_porcento_desconto' => $row['prod_porcento_desconto'], 'prod_desconto' => $row['prod_desconto'], 'val_forma_pagamento' => $row['val_forma_pagamento'], 'val_condicao_pagamento'  => $row['val_condicao_pagamento'], 'val_situacao_financeira' => $row['val_situacao_financeira'], 'val_qtd_portas' => $row['val_qtd_portas'], 'val_qtd_vidros' => $row['val_qtd_vidros'], 'val_qtd_quadros' => $row['val_qtd_quadros'], 'val_qtd_total' => $row['val_qtd_total'], 'val_total_consumidor' => $row['val_total_consumidor'], 'val_valor_itens_clientes' => $row['val_valor_itens_clientes'], 'val_porcento_desconto' => $row['val_porcento_desconto'], 'val_desconto' => $row['val_desconto'], 'val_frete' => $row['val_frete'], 'val_total_cliente' => $row['val_total_cliente'], 'out_valor_itens_parceiro' => $row['out_valor_itens_parceiro'], 'out_porcento_desconto' => $row['out_porcento_desconto'], 'out_desconto' => $row['out_desconto'], 'out_total_parceiro' => $row['out_total_parceiro'], 'out_markup_parceiro' => $row['out_markup_parceiro'], 'out_total_fabrica' => $row['out_total_fabrica'], 'out_markup_fabrica' => $row['out_markup_fabrica'], 'obs_observacao_op' => $row['obs_observacao_op'], 'ap_cli_aprovacao_cliente' => $row['ap_cli_aprovacao_cliente'], 'ap_cli_aprovacao_cliente_data' => $row['ap_cli_aprovacao_cliente_data'], 'ap_cli_cliente_retira' => $row['ap_cli_cliente_retira'], 'ap_cli_pedido_parceiro' => $row['ap_cli_pedido_parceiro'], 'ap_parc_aprovacao_parceiro' => $row['ap_parc_aprovacao_parceiro'], 'ap_parc_andamento_parceiro' => $row['ap_parc_andamento_parceiro'], 'ap_parc_entregue_data' => $row['ap_parc_entregue_data'], 'ap_parc_vendedor_interno' => $row['ap_parc_vendedor_interno'], 'ap_parc_vendedor_externo' => $row['ap_parc_vendedor_externo'], 'ap_parc_vendedor_pedido' => $row['ap_parc_vendedor_pedido'], 'ap_fab_aprovacao_fabrica' => $row['ap_fab_aprovacao_fabrica'], 'ap_fab_pedido_fabrica_data' => $row['ap_fab_pedido_fabrica_data'], 'ap_fab_andamento' => $row['ap_fab_andamento'], 'ap_fab_entrou_producao_data' => $row['ap_fab_entrou_producao_data'], 'ap_fab_produzido' => $row['ap_fab_produzido'], 'ap_fab_entregue' => $row['ap_fab_entregue'],);
        } 
    }

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

    if(isset($_POST['btn_submit']) && $_POST['btn_submit'] == 'Ficha de Corte')
    {
        
            $btn_submit = $_POST['btn_submit'];

            
            // Adiciona a imagem
            $image_file = '../assets/img/logoHJ-Aluminio.jpg'; 
            $pdf->Image($image_file, 0, $pdf->GetY(), 30, 20);  

            $header_height = 20;
            // Adiciona uma borda ao rodapé
            $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $header_height);
            $data = date("d/m/Y");

            // Adiciona o conteúdo em divs
            $pdf->writeHTMLCell(0, 50, 60, $pdf->GetY(), '<div style="font-size: 11px;"><strong style="font-size: 12px; padding: 50px; margin: 50px;">HJ Alumínios</strong><br><br>43-3056-0052<br><a href="malito:hjaluminio@hotmail.com" style="text-decoration: none; color: black;">hjaluminio@hotmail.com</a></div>', 0, 0, false, true, 'L', true);
            $pdf->writeHTMLCell(0, 0, 150, $pdf->GetY(), '<div style="font-size: 11px; padding-left: 30px;"><strong>Pedido: 22.546<br>Data: ' . $data . '</strong><br>Aprovado ('.$data.')</div>', 0, 0, false, true, 'L', true);
            // Last Header


        foreach ($tbl_clientes_system as $row_clientes) 
        {
            $segundoHeader_bottom_margin = 239;
            $segundoHeader_height = 20;
            $pdf->setY(-$segundoHeader_height - $segundoHeader_bottom_margin);
            // Borda
            $pdf->Rect(5, 33, $pdf->getPageWidth() - 10, $segundoHeader_height);
            // Content
            $pdf->writeHTMLCell(0, 0, 6, 34, '<div style="font-size: 10px;"><strong>Cliente: </strong>'.$row_clientes['nome'].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Celular: </strong>'.$row_clientes['celular'].'
            <br><strong>Endereço: </strong>&nbsp;'.$row_clientes['endereco'].'<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CEP:</strong> '.$row_clientes['cep'].'
            <br><strong>Bairro: </strong>'.$row_clientes['bairro'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Cidade: </strong>'.$row_clientes['cidade'].'</div>');
            // Last segundoHeader
        }
        
        foreach ($tbl_ordem_producao as $row_odermproducao) { }

        foreach($tbl_Perfil as $rowPerfil) { }
            
            $altura_cortada = ($row_odermproducao['altura'] - ($rowPerfil['desconto_corte_perfil'] * 2));
            $largura_cortada = ($row_odermproducao['largura'] - ($rowPerfil['desconto_corte_perfil'] * 2));
            
            $terceira_borda = 70;
            // Borda
            $pdf->Rect(5, 56, $pdf->getPageWidth() - 10, $terceira_borda);
            $pdf->writeHTMLCell(0, 0, 8, 57, '<div style="font-size: 10px;"><strong>Item: </strong>'.$row_odermproducao['qtd'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Tipo: </strong>'.$row_odermproducao['produto'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Quantidade: </strong>'.$row_odermproducao['val_qtd_vidros'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Altura: </strong>'.$altura_cortada.' (mm)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Largura: </strong>'.$largura_cortada.' (mm)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Área: </strong>1,956 (m^2)</div> 
            ');
                   

            $quarta_borda = 12;
            // Borda
            $pdf->Rect(8, 63, 205 - 10, $quarta_borda);
            $pdf->writeHTMLCell(0, 0, 8, 64, '
            <table style="text-align: center !important;"><thead><tr style="font-size: 0.9em;">
            <th><strong>Vidro: </strong></th>
            <th><strong>Qtd: </strong></th>
            <th><strong>Corte - Vidro: </strong></th>
            </tr>
            </thead>
            <tbody><tr style="font-size: 0.9em;"><td>'.$row_odermproducao['vidro'].'</td><td>'.$row_odermproducao['val_qtd_vidros'].'</td><td>'.$altura_cortada.' X '.$largura_cortada.'</td></tr></tbody></table>');

            $oitava_borda = 30;
            // Borda
            $pdf->Rect(8, 84, 110 - 10, $oitava_borda);
            $observacao = $pdf->writeHTMLCell(0, 0, 8, 86, '<div style="font-size: 10px;"><strong>Observação do Item: </strong>
            <br>'.$row_odermproducao['obs_observacao_op'].'
            </div>');

            if($altura_cortada < $largura_cortada)
            {
                $alturaCortada = $pdf->writeHTMLCell(0, 0, 112, 98, '<div>'.$altura_cortada.'</div>');
                $larguraCortada = $pdf->writeHTMLCell(0, 0, 142, 117, '<div>'.$largura_cortada.'</div>');

                // Adiciona a imagem
                $image_file = '../assets/img/vidro_horizontal.jpeg';  // Substitua pelo caminho real da sua imagem
                $pdf->Image($image_file, 120, 85, 55, 30); 
                // $container_observacao_image = $pdf->writeHTMLCell(0, 0, 0, 150);
            }elseif($altura_cortada > $largura_cortada)
            {
                $alturaCortada = $pdf->writeHTMLCell(0, 0, 116, 95, '<div>'.$altura_cortada.'</div>');
                $larguraCortada = $pdf->writeHTMLCell(0, 0, 133, 117, '<div>'.$largura_cortada.'</div>');

                $image_file = '../assets/img/vidro_vertical.jpeg';  // Substitua pelo caminho real da sua imagem
                $pdf->Image($image_file, 125, 77, 25, 40);  
            }else{
                $alturaCortada = $pdf->writeHTMLCell(0, 0, 112, 98, '<div>'.$altura_cortada.'</div>');
                $larguraCortada = $pdf->writeHTMLCell(0, 0, 136, 117, '<div>'.$largura_cortada.'</div>');

                $image_file = '../assets/img/vidro_quadrado.jpeg';  // Substitua pelo caminho real da sua imagem
                $pdf->Image($image_file, 121, 77, 39, 39); 
            }
            // Desative o corte automático de página
            $pdf->SetAutoPageBreak(false, 0);

            // Altura da margem de baixo do rodapé (em milímetros)
            $footer_bottom_margin = 20;

            // Altura do rodapé
            $footer_height = 50;
            // Posiciona o cursor para o rodapé
            $pdf->SetY(-$footer_height - $footer_bottom_margin);

            $pdf->writeHTMLCell(0, 0, 8, 107, '<div style="font-size: 10px; text-align: left;"><a href="https://www.exemplo.com" style=" color: #000;">https://www.exemplo.com</a></div>', 0, 0, false, true, 'L', true);        

    }elseif(isset($_POST['btn_submit']) && $_POST['btn_submit'] == 'Sintético - Cliente')
    {
        
             // Adiciona a imagem
             $image_file = '../assets/img/logoHJ-Aluminio.jpg'; 
             $pdf->Image($image_file, 0, $pdf->GetY(), 30, 20);  
 
             $header_height = 20;
             // Adiciona uma borda ao rodapé
             $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $header_height);
             $data = date("d/m/Y");
 
             // Adiciona o conteúdo em divs
             $pdf->writeHTMLCell(0, 50, 60, $pdf->GetY(), '<div style="font-size: 11px;"><strong style="font-size: 12px; padding: 50px; margin: 50px;">HJ Alumínios</strong><br><br>43-3056-0052<br><a href="malito:hjaluminio@hotmail.com" style="text-decoration: none; color: black;">hjaluminio@hotmail.com</a></div>', 0, 0, false, true, 'L', true);
             $pdf->writeHTMLCell(0, 0, 150, $pdf->GetY(), '<div style="font-size: 11px; padding-left: 30px;"><strong>Pedido: 22.546<br>Data: ' . $data . '</strong><br>Aprovado ('.$data.')</div>', 0, 0, false, true, 'L', true);
             // Last Header
 
 
         foreach ($tbl_clientes_system as $row_clientes) 
         {
             $segundoHeader_bottom_margin = 239;
             $segundoHeader_height = 20;
             $pdf->setY(-$segundoHeader_height - $segundoHeader_bottom_margin);
             // Borda
             $pdf->Rect(5, 33, $pdf->getPageWidth() - 10, $segundoHeader_height);
             // Content
             $pdf->writeHTMLCell(0, 0, 6, 34, '<div style="font-size: 10px;"><strong>Cliente: </strong>'.$row_clientes['nome'].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Celular: </strong>'.$row_clientes['celular'].'
             <br><strong>Endereço: </strong>&nbsp;'.$row_clientes['endereco'].'<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CEP:</strong> '.$row_clientes['cep'].'
             <br><strong>Bairro: </strong>'.$row_clientes['bairro'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Cidade: </strong>'.$row_clientes['cidade'].'</div>');
             // Last segundoHeader
         }
 
        foreach ($tbl_ordem_producao as $row_odermproducao) {        
            $produto_qtd_unitario = $row_odermproducao['valor_item_cliente'] * $row_odermproducao['qtd'];
            $segundoHeader_bottom_margin = 239;
             $segundoHeader_height = 20;
             $pdf->setY(-$segundoHeader_height - $segundoHeader_bottom_margin);
             // Content
             $pdf->writeHTMLCell(0, 0, 6, 55, '<table style="text-align: center !important;"><thead><tr style="font-weight: bolder;">
             <th>Item</th>
             <th>Descrição</th>
             <th>Quantidade</th>
             <th>Unidade</th>
             <th>V. Unitário</th>
             <th>Total</th>
             </tr>
             </thead>
             <tbody><tr style="font-size: 0.9em;"><td>'.$row_odermproducao['qtd'].'</td><td>'.$row_odermproducao['perfil_lado_direito'].'</td><td>'.$row_odermproducao['qtd'].'</td><td></td><td>R$ '.number_format($row_odermproducao['valor_item_cliente'], 2, '.', ',').'</td><td>R$ '.number_format($produto_qtd_unitario, 2, '.', ',').'</td></tr></tbody></table>');
             
             $pdf->writeHTMLCell(0, 0, 45, 70, ' <div style="margin-left: 500px; font-size: 0.9em;">(Modo: '.$row_odermproducao['modo'].' - Usinagem Esquerdo: '.$row_odermproducao['usinagem_para_esquerdo'].' - Usinagem Direito: '.$row_odermproducao['usinagem_para_direito'].' - Usinagem Superior: '.$row_odermproducao['usinagem_para_superior'].' - Usiangem Inferior: '.$row_odermproducao['usinagem_para_inferior'].' - Puxador Esquerdo:'.$row_odermproducao['puxador_esquerdo'].' - Puxador Direito: '.$row_odermproducao['puxador_direito'].' - Puxador Superior: '.$row_odermproducao['puxador_superior'].' - Puxador Inferior: '.$row_odermproducao['puxador_inferior'].' - Vidro: '.$row_odermproducao['vidro'].' - TV: '.$row_odermproducao['tv'].' - Serviços: '.$row_odermproducao['servicos'].' - Travessa: '.$row_odermproducao['travessa'].' - Portas Pares: '.$row_odermproducao['portas_pares'].' - Reforço: '.$row_odermproducao['reforco'].' - Desempenador: '.$row_odermproducao['desempenador'].' - Esquadreta: '.$row_odermproducao['esquadreta'].' - Ponteira: '.$row_odermproducao['ponteira'].' - Kit: '.$row_odermproducao['kit'].' - Valor Item Cliente: '.$row_odermproducao['valor_item_cliente'].' - Porcento Desconto: '.$row_odermproducao['porcento_desconto'].' - Desconto: '.$row_odermproducao['desconto'].' - Produto: '.$row_odermproducao['produto'].' - Produto Usinagem Puxador: '.$row_odermproducao['prod_usinagem_puxador'].' - Prod_Porcento_Desconto: '.$row_odermproducao['prod_porcento_desconto'].') </div>');
        }
 
         // Desative o corte automático de página
         $pdf->SetAutoPageBreak(false, 0);
 
         // Altura da margem de baixo do rodapé (em milímetros)
         $footer_bottom_margin = 28;
 
         // Altura do rodapé
         $footer_height = 28;
 
         // Posiciona o cursor para o rodapé
         $pdf->SetY(-$footer_height - $footer_bottom_margin);
         // Adiciona uma borda ao rodapé
         $pdf->Rect(5, 248, $pdf->getPageWidth() - 10, $footer_height);
         $data = date("d/m/Y");
         //$pdf->writeHTMLCell(0, 0, 6, 240, '<div><strong style="font-size: 11px">Qtd Total (Portas + Vidros): 1</strong></div>');
         $pdf->writeHTMLCell(0, 0, 6, 249, '<div style="font-size: 12px;"><strong>Observação da OP: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vendedor(a): '.$adminName.'
         <br><br><br><br><strong>Prev. Entrega:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Pedido P.:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Conferido Por: _____________________________</strong></div>', 0, 0, false, true, 'L', true);
         $pdf->SetY($pdf->GetY() + 30);
         // Last Footer
 
         $debaixo_footer_height = 10;
            $pdf->Rect(5, 279, $pdf->getPageWidth() - 10, $debaixo_footer_height);
            $pdf->writeHTMLCell(0, 0, 6, 283, '<div style="font-size: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Total-Cliente:</strong> R$ '.number_format($produto_qtd_unitario, 2, '.', ',').'</div>', 0, 0, false, true, 'L', true);

            $pdf->writeHTMLCell(0, 0, 5, 290, '<div style="font-size: 10px; text-align: left;"><a href="https://www.exemplo.com" style=" color: #000;">https://www.exemplo.com</a></div>', 0, 0, false, true, 'L', true);
         
    }elseif(isset($_POST['btn_submit']) && $_POST['btn_submit'] == 'Sintético 3 - Cliente')
    {

            // Adiciona a imagem
            $image_file = '../assets/img/logoHJ-Aluminio.jpg'; 
            $pdf->Image($image_file, 0, $pdf->GetY(), 30, 20);  

            $header_height = 20;
            // Adiciona uma borda ao rodapé
            $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $header_height);
            $data = date("d/m/Y");

            // Adiciona o conteúdo em divs
            $pdf->writeHTMLCell(0, 50, 60, $pdf->GetY(), '<div style="font-size: 11px;"><strong style="font-size: 12px; padding: 50px; margin: 50px;">HJ Alumínios</strong><br><br>43-3056-0052<br><a href="malito:hjaluminio@hotmail.com" style="text-decoration: none; color: black;">hjaluminio@hotmail.com</a></div>', 0, 0, false, true, 'L', true);
            $pdf->writeHTMLCell(0, 0, 150, $pdf->GetY(), '<div style="font-size: 11px; padding-left: 30px;"><strong>Pedido: 22.546<br>Data: ' . $data . '</strong><br>Aprovado ('.$data.')</div>', 0, 0, false, true, 'L', true);
            // Last Header


        foreach ($tbl_clientes_system as $row_clientes) 
        {
            $segundoHeader_bottom_margin = 239;
            $segundoHeader_height = 20;
            $pdf->setY(-$segundoHeader_height - $segundoHeader_bottom_margin);
            // Borda
            $pdf->Rect(5, 33, $pdf->getPageWidth() - 10, $segundoHeader_height);
            // Content
            $pdf->writeHTMLCell(0, 0, 6, 34, '<div style="font-size: 10px;"><strong>Cliente: </strong>'.$row_clientes['nome'].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Celular: </strong>'.$row_clientes['celular'].'
            <br><strong>Endereço: </strong>&nbsp;'.$row_clientes['endereco'].'<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CEP:</strong> '.$row_clientes['cep'].'
            <br><strong>Bairro: </strong>'.$row_clientes['bairro'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Cidade: </strong>'.$row_clientes['cidade'].'</div>');
            // Last segundoHeader
        }

    foreach ($tbl_ordem_producao as $row_odermproducao) {        
        $produto_qtd_unitario = $row_odermproducao['valor_item_cliente'] * $row_odermproducao['qtd'];
        $segundoHeader_bottom_margin = 239;
            $segundoHeader_height = 20;
            $pdf->setY(-$segundoHeader_height - $segundoHeader_bottom_margin);
            // Content
            $pdf->writeHTMLCell(0, 0, 6, 55, '<table style="text-align: center !important;"><thead><tr style="font-weight: normal;">
            <th>Qtd</th>
            <th>Descrição</th>
            <th>Medida</th>
            <th>V. Unitário</th>
            <th>Total</th>
            </tr>
            </thead>
            <tbody><tr><td>'.$row_odermproducao['qtd'].'</td><td>'.$row_odermproducao['perfil_lado_direito'].'</td><td>'.$row_odermproducao['largura'].' X '.$row_odermproducao['altura'].'</td><td>R$ '.number_format($row_odermproducao['valor_item_cliente'], 2, '.', ',').'</td><td>R$ '.number_format($produto_qtd_unitario, 2, '.', ',').'</td></tr></tbody></table>');


            $pdf->writeHTMLCell(0, 0, 45, 70, ' <div style="margin-left: 500px; font-size: 0.9em;">('.$row_odermproducao['usinagem_para_esquerdo'].' - '.$row_odermproducao['usinagem_para_direito'].' - '.$row_odermproducao['usinagem_para_superior'].' - '.$row_odermproducao['usinagem_para_inferior'].' - '.$row_odermproducao['puxador_esquerdo'].' - '.$row_odermproducao['puxador_direito'].' - '.$row_odermproducao['puxador_superior'].' - '.$row_odermproducao['puxador_inferior'].') </div>');
    }

        // Desative o corte automático de página
        $pdf->SetAutoPageBreak(false, 0);

        // Altura da margem de baixo do rodapé (em milímetros)
        $footer_bottom_margin = 28;

        // Altura do rodapé
        $footer_height = 28;

        // Posiciona o cursor para o rodapé
        $pdf->SetY(-$footer_height - $footer_bottom_margin);
        // Adiciona uma borda ao rodapé
        $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $footer_height);
        $data = date("d/m/Y");
        //$pdf->writeHTMLCell(0, 0, 6, 233, '<div><strong style="font-size: 11px">Qtd Total (Portas + Vidros): 1</strong></div>');
        
        $pdf->writeHTMLCell(0, 0, 6, 242, '<div style="font-size: 12px;"><strong>Observação da OP: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vendedor(a): '.$adminName.'
        <br><br><br><br><strong>Prev. Entrega:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Pedido P.:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Conferido Por: _____________________________</strong></div>', 0, 0, false, true, 'L', true);
        $pdf->SetY($pdf->GetY() + 30);
        // Last Footer

        $debaixo_footer_height = 17;
        $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $debaixo_footer_height);
        $pdf->writeHTMLCell(0, 0, 6, $pdf->GetY(), '<div style="font-size: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Total-Cliente:</strong> R$ '.number_format($produto_qtd_unitario, 2, '.', ',').'</div>', 0, 0, false, true, 'L', true);

        $pdf->writeHTMLCell(0, 0, 5, 290, '<div style="font-size: 10px; text-align: left;"><a href="https://www.exemplo.com" style=" color: #000;">https://www.exemplo.com</a></div>', 0, 0, false, true, 'L', true);        
        
    }elseif(isset($_POST['btn_submit']) && $_POST['btn_submit'] == 'Sintético 3 - Sem Valor')
    {

        // Adiciona a imagem
        $image_file = '../assets/img/logoHJ-Aluminio.jpg'; 
        $pdf->Image($image_file, 0, $pdf->GetY(), 30, 20);  

        $header_height = 20;
        // Adiciona uma borda ao rodapé
        $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $header_height);
        $data = date("d/m/Y");

        // Adiciona o conteúdo em divs
        $pdf->writeHTMLCell(0, 50, 60, $pdf->GetY(), '<div style="font-size: 11px;"><strong style="font-size: 12px; padding: 50px; margin: 50px;">HJ Alumínios</strong><br><br>43-3056-0052<br><a href="malito:hjaluminio@hotmail.com" style="text-decoration: none; color: black;">hjaluminio@hotmail.com</a></div>', 0, 0, false, true, 'L', true);
        $pdf->writeHTMLCell(0, 0, 150, $pdf->GetY(), '<div style="font-size: 11px; padding-left: 30px;"><strong>Pedido: 22.546<br>Data: ' . $data . '</strong><br>Aprovado ('.$data.')</div>', 0, 0, false, true, 'L', true);
        // Last Header


        foreach ($tbl_clientes_system as $row_clientes) 
        {
            $segundoHeader_bottom_margin = 239;
            $segundoHeader_height = 20;
            $pdf->setY(-$segundoHeader_height - $segundoHeader_bottom_margin);
            // Borda
            $pdf->Rect(5, 33, $pdf->getPageWidth() - 10, $segundoHeader_height);
            // Content
            $pdf->writeHTMLCell(0, 0, 6, 34, '<div style="font-size: 10px;"><strong>Cliente: </strong>'.$row_clientes['nome'].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Celular: </strong>'.$row_clientes['celular'].'
            <br><strong>Endereço: </strong>&nbsp;'.$row_clientes['endereco'].'<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CEP:</strong> '.$row_clientes['cep'].'
            <br><strong>Bairro: </strong>'.$row_clientes['bairro'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Cidade: </strong>'.$row_clientes['cidade'].'</div>');
            // Last segundoHeader
        }

        foreach ($tbl_ordem_producao as $row_odermproducao) {        
                
            $segundoHeader_bottom_margin = 239;
                $segundoHeader_height = 20;
                $pdf->setY(-$segundoHeader_height - $segundoHeader_bottom_margin);
                // Content
                $pdf->writeHTMLCell(0, 0, 6, 55, '<table style="text-align: center !important;"><thead><tr style="font-weight: normal;">
                <th>Quantidade</th>
                <th>Descrição</th>
                <th>Medida</th>
                </tr>
                </thead>
                <tbody><tr><td>'.$row_odermproducao['qtd'].'</td><td>'.$row_odermproducao['perfil_lado_direito'].'</td><td>'.$row_odermproducao['largura'].' X '.$row_odermproducao['altura'].'</td></tr></tbody></table>');


                $pdf->writeHTMLCell(0, 0, 45, 70, ' <div style="margin-left: 500px; font-size: 0.9em;">('.$row_odermproducao['usinagem_para_esquerdo'].' - '.$row_odermproducao['usinagem_para_direito'].' - '.$row_odermproducao['usinagem_para_superior'].' - '.$row_odermproducao['usinagem_para_inferior'].' - '.$row_odermproducao['puxador_esquerdo'].' - '.$row_odermproducao['puxador_direito'].' - '.$row_odermproducao['puxador_superior'].' - '.$row_odermproducao['puxador_inferior'].') </div>');

                
        }

        // Desative o corte automático de página
        $pdf->SetAutoPageBreak(false, 0);

        // Altura da margem de baixo do rodapé (em milímetros)
        $footer_bottom_margin = 28;

        // Altura do rodapé
        $footer_height = 28;

        // Posiciona o cursor para o rodapé
        $pdf->SetY(-$footer_height - $footer_bottom_margin);
        // Adiciona uma borda ao rodapé
        $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $footer_height);
        $data = date("d/m/Y");
        //$pdf->writeHTMLCell(0, 0, 6, 233, '<div><strong style="font-size: 11px">Qtd Total (Portas + Vidros): 1</strong></div>');
        $pdf->writeHTMLCell(0, 0, 6, 242, '<div style="font-size: 12px;"><strong>Observação da OP: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vendedor(a): '.$adminName.'
        <br><br><br><br><strong>Prev. Entrega:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Pedido P.:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Conferido Por: _____________________________</strong></div>', 0, 0, false, true, 'L', true);
        $pdf->SetY($pdf->GetY() + 30);
        // Last Footer

        $pdf->writeHTMLCell(0, 0, 5, 290, '<div style="font-size: 10px; text-align: left;"><a href="https://www.exemplo.com" style=" color: #000;">https://www.exemplo.com</a></div>', 0, 0, false, true, 'L', true);
        
    }elseif(isset($_POST['btn_submit']) && $_POST['btn_submit'] == 'Relátorio de Vendas (OP)')
    {
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

    }elseif(isset($_POST['btn_submit']) && $_POST['btn_submit'] == 'Relátorio para Entrega Por Cliente')
    {
        $pdf->setPageOrientation('L');
        
        // Adiciona a imagem
        $image_file = '../assets/img/logoHJ-Aluminio.jpg'; 
        $pdf->Image($image_file, 0, 2, 30, 20); 
        // Adiciona uma borda ao rodapé

        $height = 35;
        $pdf->Rect(5, 2, $pdf->getPageWidth() - 10, $height);
        $data = date("d/m/Y");

        foreach ($tbl_clientes_system as $row_tbl_clientes_system) {}
        
        // Adiciona o conteúdo em divs
        $pdf->writeHTMLCell(0, 50, 120, 3, '<div style="font-size: 12px;"><span style="font-size: 12px;">HJ Alumínios EIRELI</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;43-3056-0052</span><br><span>&nbsp;<a style="text-decoration: none; color: black;" href="malito:hjaluminio@hotmail.com">hjaluminio@hotmail.com</a></span></div>', 0, 0, false, true, 'L', true);
        $pdf->writeHTMLCell(0, 0, 256, $pdf->GetY(), '<div style="font-size: 11px; font-weight: bold;">' . $data . '</div>', 0, 0, false, true, 'L', true);
        $pdf->writeHTMLCell(0, 0, 5, 25, '<div>Cliente: '.$row_tbl_clientes_system['nome'].'<br>E-mail:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Celular: '.$row_tbl_clientes_system['celular'].'
        </div>');
        // Last Header

        foreach ($tbl_ordem_producao as $row_odermproducao) { }     

        $pdf->writeHTMLCell(320, 0, 4, 40, '<table style="font-size: 10px;"><thead style="border: 1px solid black;"><tr style="font-weight: bold;"><th>Qtd</th><th>Descrição</th><th>Alt</th><th>Lar</th><th>Vidro</th><th>Perfil</th><th>Pedido</th></tr></thead>
        <tbody><tr><td>'.$row_odermproducao['qtd'].'</td><td>'.$row_odermproducao['produto'].'</td><td></td><td>'.$row_odermproducao['altura'].'</td><td>'.$row_odermproducao['largura'].'</td><td></td><td>'.$row_odermproducao['op'].'</td></tr></tbody></table>');

        // Desative o corte automático de página
        $pdf->SetAutoPageBreak(false, 0);
        // Altura da margem de baixo do rodapé (em milímetros)
        $footer_bottom_margin = 8;
        // Altura do rodapé
        $footer_height = 20;
        // Posiciona o cursor para o rodapé
        $pdf->SetY(-$footer_height - $footer_bottom_margin);
        // Adiciona uma borda ao rodapé
        $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $footer_height);
        $pdf->writeHTMLCell(0, 0, 6, 185, '<div><strong style="font-size: 11px">Total de Itens: ____________________________</strong></div>');
        $pdf->writeHTMLCell(0, 0, 6, 195, '<div style="font-size: 11px;"><strong>Total de Volumes: ____________________________</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Assinatura do Comprador: _______________________________</strong>
        <br><br><br><br><strong>Prev. Entrega:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Pedido P.:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Conferido Por: _____________________________</strong></div>', 0, 0, false, true, 'L', true);
        
        $pdf->writeHTMLCell(0, 0, 5, 204,'<div style="font-size: 10px; text-align: left;"><a style="color: black; font-weight: bold; text-decoration:none;" href="https://www.exemplo.com">https://www.exemplo.com</a></div>', 0, 0, false, true, 'L', true);     
    }      

    // id_uniq do arquivo
    $id_uniqArquivo = 'hjaluminio.pdf';
    $destino = 'I';

    ob_clean();

    // Gere o PDF
    $pdf->Output($id_uniqArquivo, $destino);
}

$idDoSeuDado = 123;
$id_uniqUsuario = "Exemplo id_uniq";
$emailUsuario = "exemplo@dominio.com";

// Chame a função para criar o PDF
criarPDF($id_uniqUsuario, $emailUsuario);
?>