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
    // echo $id_uniq; die();
    if(empty($id_uniq))
    {
        header('Location: ordem_producao.php?vazio');
    }
    
    $sql = "SELECT * FROM tbl_ordem_producao WHERE id = '50'";
    $result = $conn->query($sql);

    // Inicializa uma variável para armazenar os dados dos tbl_ordem_producao
    $tbl_ordem_producao = array();

    if ($result && $result->num_rows > 0) {
        // Obtém a primeira linha do resultado como um array associativo
        $tbl_ordem_producao = $result->fetch_assoc();

        // Obtém o ID da tbl_ordem_producao
        $nome_clientes_system = $tbl_ordem_producao['cliente'];
    } 
    $pdf->SetMargins(5, 10, 5, 0);
    
    $pdf->AddPage();
    
    $header_height = 26;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tbl_ordem_producao[] = array('id_uniq' => $row['id_uniq'], 'cliente' => $row['cliente'], 'modo' => $row['modo'], 'qtd' => $row['qtd'], 'altura' => $row['altura'], 'largura' => $row['largura'], 'imagem_perfil' => $row['imagem_perfil'], 'perfil_lado_esquerdo' => $row['perfil_lado_esquerdo'], 'usinagem_para_esquerdo' => $row['usinagem_para_esquerdo'], 'puxador_esquerdo' => $row['puxador_esquerdo'], 'perfil_lado_direito' => $row['perfil_lado_direito'], 'usinagem_para_direito' => $row['usinagem_para_direito'], 'puxador_direito' => $row['puxador_direito'], 'perfil_lado_superior' => $row['perfil_lado_superior'], 'usinagem_para_superior' => $row['usinagem_para_superior'], 'puxador_superior' => $row['puxador_superior'], 'perfil_lado_inferior' => $row['perfil_lado_inferior'], 'usinagem_para_inferior' => $row['usinagem_para_inferior'], 'puxador_inferior' => $row['puxador_inferior'], 'vidro' => $row['vidro'], 'tv' => $row['tv'], 'servicos' => $row['servicos'], 'travessa' => $row['travessa'], 'portas_pares' => $row['portas_pares'], 'reforco' => $row['reforco'], 'desempenador' => $row['desempenador'], 'esquadreta' => $row['esquadreta'], 'ponteira' => $row['ponteira'], 'kit' => $row['kit'], 'valor_item_cliente' => $row['valor_item_cliente'], 'porcento_desconto' => $row['porcento_desconto'], 'desconto' => $row['desconto'], 'produto' => $row['produto'], 'prod_qtd' => $row['prod_qtd'], 'prod_usinagem_puxador' => $row['prod_usinagem_puxador'], 'prod_valor_item_cliente' => $row['prod_valor_item_cliente'], 'prod_porcento_desconto' => $row['prod_porcento_desconto'], 'prod_desconto' => $row['prod_desconto'], 'val_forma_pagamento' => $row['val_forma_pagamento'], 'val_condicao_pagamento'  => $row['val_condicao_pagamento'], 'val_situacao_financeira' => $row['val_situacao_financeira'], 'val_qtd_portas' => $row['val_qtd_portas'], 'val_qtd_vidros' => $row['val_qtd_vidros'], 'val_qtd_quadros' => $row['val_qtd_quadros'], 'val_qtd_total' => $row['val_qtd_total'], 'val_total_consumidor' => $row['val_total_consumidor'], 'val_valor_itens_clientes' => $row['val_valor_itens_clientes'], 'val_porcento_desconto' => $row['val_porcento_desconto'], 'val_desconto' => $row['val_desconto'], 'val_frete' => $row['val_frete'], 'val_total_cliente' => $row['val_total_cliente'], 'out_valor_itens_parceiro' => $row['out_valor_itens_parceiro'], 'out_porcento_desconto' => $row['out_porcento_desconto'], 'out_desconto' => $row['out_desconto'], 'out_total_parceiro' => $row['out_total_parceiro'], 'out_markup_parceiro' => $row['out_markup_parceiro'], 'out_total_fabrica' => $row['out_total_fabrica'], 'out_markup_fabrica' => $row['out_markup_fabrica'], 'obs_observacao_op' => $row['obs_observacao_op'], 'ap_cli_aprovacao_cliente' => $row['ap_cli_aprovacao_cliente'], 'ap_cli_aprovacao_cliente_data' => $row['ap_cli_aprovacao_cliente_data'], 'ap_cli_cliente_retira' => $row['ap_cli_cliente_retira'], 'ap_cli_pedido_parceiro' => $row['ap_cli_pedido_parceiro'], 'ap_parc_aprovacao_parceiro' => $row['ap_parc_aprovacao_parceiro'], 'ap_parc_andamento_parceiro' => $row['ap_parc_andamento_parceiro'], 'ap_parc_entregue_data' => $row['ap_parc_entregue_data'], 'ap_parc_vendedor_interno' => $row['ap_parc_vendedor_interno'], 'ap_parc_vendedor_externo' => $row['ap_parc_vendedor_externo'], 'ap_parc_vendedor_pedido' => $row['ap_parc_vendedor_pedido'], 'ap_fab_aprovacao_fabrica' => $row['ap_fab_aprovacao_fabrica'], 'ap_fab_pedido_fabrica_data' => $row['ap_fab_pedido_fabrica_data'], 'ap_fab_andamento' => $row['ap_fab_andamento'], 'ap_fab_entrou_producao_data' => $row['ap_fab_entrou_producao_data'], 'ap_fab_produzido' => $row['ap_fab_produzido'], 'ap_fab_entregue' => $row['ap_fab_entregue'],);
            die();
        } 
    }


    //tbl_clientes_system
    if ($result_tbl_clientes_system->num_rows > 0) {
        // Preenche o array com os dados dos tbl_clientes_system
        while ($row_tbl_clientes_system = $result_tbl_clientes_system->fetch_assoc()) {
            $tbl_clientes_system[] = array('id' => $row_tbl_clientes_system['id'], 'nome' => $row_tbl_clientes_system['nome'], 'endereco' => $row_tbl_clientes_system['endereco'], 'bairro' => $row_tbl_clientes_system['bairro'], 'cidade' => $row_tbl_clientes_system['cidade'], 'fone' => $row_tbl_clientes_system['fone'], 'cep' => $row_tbl_clientes_system['cep']);
        } 
    }

    if(isset($_POST['btn_submit']) && $_POST['btn_submit'] == 'Sintético - Cliente')
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
            $pdf->writeHTMLCell(0, 0, 6, 34, '<div style="font-size: 10px;"><strong>Cliente: </strong>'.$row_clientes['cliente'].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Qtd Total: </strong>'.$row_clientes['qtd'].'
            <br><strong>Consumidor</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Fone: </strong>43996624492
            <br><strong>Endereço: </strong>&nbsp;RUA AAA<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CEP:</strong> 86.705-560
            <br><strong>Bairro: </strong>VILA SAMPAIO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Cidade: </strong>ARAPONGAS-PR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>CNPJ/CPF: </strong>41.337.530/0001-07</div>');
            // Last segundoHeader
        }
        
        foreach ($tbl_ordem_producao as $row_odermproducao) 
        {
            $terceira_borda = 138;
            // Borda
            $pdf->Rect(5, 56, $pdf->getPageWidth() - 10, $terceira_borda);
            $pdf->writeHTMLCell(0, 0, 8, 57, '<div style="font-size: 10px;"><strong>Item: </strong>'.$row_odermproducao['qtsd'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Tipo: </strong>'.$row_odermproducao['produto'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Quantidade: </strong>'.$row_odermproducao['qtd'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Altura: </strong>'.$row_odermproducao['altura'].' (mm)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Largura: </strong>'.$row_odermproducao['largura'].' (mm)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Área: </strong>1,956 (m^2)</div>');
        } 
            $quarta_borda = 32;
            // Borda
            $pdf->Rect(8, 63, 205 - 10, $quarta_borda);
            $pdf->writeHTMLCell(0, 0, 8, 64, '<div style="font-size: 10px;"><strong>Lado Esquerdo: </strong>'.$row_odermproducao['perfil_lado_esquerdo'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <br><br><strong>Lado Direito: </strong>'.$row_odermproducao['perfil_lado_direito'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <br><br><strong>Lado Superior: </strong>'.$row_odermproducao['perfil_lado_superior'].'
            <br><br><strong>Lado Inferior: </strong>'.$row_odermproducao['perfil_lado_inferior'].'</div>');

            $quinta_borda = 14;
            // Borda
            $pdf->Rect(8, 97, 100 - 10, $quinta_borda);
            $pdf->writeHTMLCell(0, 0, 8, 98, '<div style="font-size: 10px;"><strong>Travessa: </strong>'.$row_odermproducao['travessa'].'</div>');

            $sexta_borda = 14;
            // Borda
            $pdf->Rect(8, 113, 205 - 10, $sexta_borda);
            $pdf->writeHTMLCell(0, 0, 8, 114, '<div style="font-size: 10px;"><strong>Vidro: </strong>
            <br><br><strong>Sentido: </strong>HORIZONTAL - 1/Porta</div>');

            $cetima_borda = 14;
            // Borda
            $pdf->Rect(8, 129, 100 - 10, $cetima_borda);
            $pdf->writeHTMLCell(0, 0, 8, 130, '<div style="font-size: 10px;"><strong>Acessórios: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Qtd: </strong>
            <br><br>SISTEMA JP85&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1,00 Inst.
            </div>');



            $oitava_borda = 30;
            // Borda
            $pdf->Rect(8, 145, 110 - 10, $oitava_borda);
            $observacao = $pdf->writeHTMLCell(0, 0, 8, 146, '<div style="font-size: 10px;"><strong>Observação do Item: </strong>
            <br>'.$row_odermproducao['obs_observacao_op'].'</div>');        
            // Adiciona a imagem
            $image_file = $row_odermproducao['imagem_perfil'];  // Substitua pelo caminho real da sua imagem
            $pdf->Image($image_file, 120, $pdf->GetY(), 40, 30); 
            // $container_observacao_image = $pdf->writeHTMLCell(0, 0, 0, 150);


            
            $nona_borda = 14;
            // Borda
            $pdf->Rect(8, 177, 205 - 10, $nona_borda);
            $pdf->writeHTMLCell(0, 0, 8, 178, '<div style="font-size: 10px;"><strong>Unitário: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Total-Item</strong>
            <br><br>955.84&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;955.84</div>');


            // Desative o corte automático de página
            $pdf->SetAutoPageBreak(false, 0);

            // Altura da margem de baixo do rodapé (em milímetros)
            $footer_bottom_margin = 20;

            // Altura do rodapé
            $footer_height = 50;
            // Posiciona o cursor para o rodapé
            $pdf->SetY(-$footer_height - $footer_bottom_margin);
            $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $footer_height);
            $data = date("d/m/Y");
            // $pdf->writeHTMLCell(0, 0, 6, 233, '<div><strong style="font-size: 14px">Qtd Total (Portas + Vidros): 1</strong></div>');
            $pdf->writeHTMLCell(0, 0, 6, 228, '<div style="font-size: 10px;"><strong>Observação da OP: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vendedor(a): Elaine Ap. Gorris Benedit
            <br><br><br><br><br><br><br><br><br><br><strong>Prev. Entrega:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Pedido P.:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Conferido Por: _____________________________</strong></div>', 0, 0, false, true, 'L', true);
            $pdf->SetY($pdf->GetY() + 30);
            // Last Footer

            $debaixo_footer_height = 10;
            $pdf->Rect(5, 279, $pdf->getPageWidth() - 10, $debaixo_footer_height);
            $pdf->writeHTMLCell(0, 0, 6, 283, '<div style="font-size: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Total-Cliente:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;955,84</div>', 0, 0, false, true, 'L', true);

            $pdf->writeHTMLCell(0, 0, 5, 290, '<div style="font-size: 10px; text-align: left;"><a href="https://www.exemplo.com" style=" color: #000;">https://www.exemplo.com</a></div>', 0, 0, false, true, 'L', true);      

    }elseif(isset($_POST['btn_submit']) && $_POST['btn_submit'] == 'Sintético 3 - Cliente')
    {
        $image_file = '../assets/img/logoHJ-Aluminio.jpg'; 
        $pdf->Image($image_file, 0, $pdf->GetY(), 40, 30); 

        // Adiciona uma borda ao rodapé
        $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $header_height);
        $data = date("d/m/Y");

        // Adiciona o conteúdo em divs
        $pdf->writeHTMLCell(0, 50, 60, $pdf->GetY(), '<div style="font-size: 12px;"><strong style="font-size: 15px; padding: 50px; margin: 50px;">HJ Alumínios</strong><br><br>43-3056-0052<br><a href="malito:hjaluminio@hotmail.com" style="text-decoration: none; color: black;">hjaluminio@hotmail.com</a></div>', 0, 0, false, true, 'L', true);
        $pdf->writeHTMLCell(0, 0, 150, $pdf->GetY(), '<div style="font-size: 12px; padding-left: 30px;"><strong>Pedido: 22.546<br>Data: ' . $data . '</strong><br>Aprovado ('.$data.')</div>', 0, 0, false, true, 'L', true);
        // Last Header

    foreach ($tbl_clientes_system as $row_Clientes) {

        $segundoHeader_bottom_margin = 239;
            $segundoHeader_height = 20;
            $pdf->setY(-$segundoHeader_height - $segundoHeader_bottom_margin);
            // Borda
            $pdf->Rect(5, 41, $pdf->getPageWidth() - 10, $segundoHeader_height);
            // Content
            $pdf->writeHTMLCell(0, 0, 6, 42, '<div style="font-size: 10px;"><strong>Cliente: </strong>'.$row_Clientes['nome'].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <br><strong>Consumidor</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Fone: </strong>43996624492
            <br><strong>Endereço: </strong>&nbsp;RUA AAA<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CPF/CNPJ:</strong> '.$row_Clientes['cep'].'
            <br><strong>Bairro: </strong>'.$row_Clientes['bairro'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Cidade: </strong>'.$row_Clientes['cidade'].'&nbsp;&nbsp;</div>');
            // Last segundoHeader
    }

    foreach ($tbl_ordem_producao as $row_odermproducao) {        
            
        $segundoHeader_bottom_margin = 239;
            $segundoHeader_height = 20;
            $pdf->setY(-$segundoHeader_height - $segundoHeader_bottom_margin);
            // Borda
            //$pdf->Rect(5, 68, $pdf->getPageWidth() - 10, $segundoHeader_height);
            // Content
            $pdf->writeHTMLCell(0, 0, 6, 69, '<table style="text-align: center !important;"><thead><tr style="font-weight: normal;">
            <th>Qtd AAA</th>
            <th>Descrição</th>
            <th>Medida</th>
            </tr>
            </thead>
            <tbody><tr><td>'.$row_odermproducao['qtd'].'</td><td>'.$row_odermproducao['descricao'].'</td><td>'.$row_odermproducao['medida'].'</td></tr></tbody></table>');
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
        $pdf->writeHTMLCell(0, 0, 6, 233, '<div><strong style="font-size: 14px">Qtd Total (Portas + Vidros): 1</strong></div>');
        $pdf->writeHTMLCell(0, 0, 6, 242, '<div style="font-size: 12px;"><strong>Observação da OP: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vendedor(a): Elaine Ap. Gorris Benedit
        <br><br><br><br><strong>Prev. Entrega:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Pedido P.:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Conferido Por: _____________________________</strong></div>', 0, 0, false, true, 'L', true);
        $pdf->SetY($pdf->GetY() + 30);
        // Last Footer

        $debaixo_footer_height = 17;
        $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $debaixo_footer_height);
        $pdf->writeHTMLCell(0, 0, 6, $pdf->GetY(), '<div style="font-size: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Total-Cliente:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;955,84</div>', 0, 0, false, true, 'L', true);

        $pdf->writeHTMLCell(0, 0, 5, 290, '<div style="font-size: 10px; text-align: left;"><a href="https://www.exemplo.com" style=" color: #000;">https://www.exemplo.com</a></div>', 0, 0, false, true, 'L', true);

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
        $pdf->writeHTMLCell(0, 0, 6, 233, '<div><strong style="font-size: 14px">Qtd Total (Portas + Vidros): 1</strong></div>');
        $pdf->writeHTMLCell(0, 0, 6, 242, '<div style="font-size: 12px;"><strong>Observação da OP: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vendedor(a): Elaine Ap. Gorris Benedit
        <br><br><br><br><strong>Prev. Entrega:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Pedido P.:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Conferido Por: _____________________________</strong></div>', 0, 0, false, true, 'L', true);
        $pdf->SetY($pdf->GetY() + 30);
        // Last Footer

        $debaixo_footer_height = 17;
        $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $debaixo_footer_height);
        $pdf->writeHTMLCell(0, 0, 6, $pdf->GetY(), '<div style="font-size: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Total-Cliente:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;955,84</div>', 0, 0, false, true, 'L', true);

        $pdf->writeHTMLCell(0, 0, 5, 290, '<div style="font-size: 10px; text-align: left;"><a href="https://www.exemplo.com" style=" color: #000;">https://www.exemplo.com</a></div>', 0, 0, false, true, 'L', true);
        
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