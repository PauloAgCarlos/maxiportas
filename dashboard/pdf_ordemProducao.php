<?php
require_once('./TCPDF-main/tcpdf.php');

// Função para criar o PDF
function criarPDF($id_uniqUsuario, $emailUsuario) {
    $pdf = new TCPDF();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "maxportas";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
    $id_uniq = $_POST['id_ordemProducao'];
    // echo $id_uniq; die();
    if(empty($id_uniq))
    {
        header('Location: ordem_producao.php?vazio');
    }
    $sql = "SELECT * FROM tbl_ordem_producao WHERE id_uniq = '$id_uniq'";
    $result = $conn->query($sql);

    // Inicializa uma variável para armazenar os dados dos tbl_ordem_producao
    $tbl_ordem_producao = array();


    $pdf->SetMargins(5, 10, 5, 0);
    // Defina o padding do cabeçalho e rodapé (em milímetros)
    // $pdf->setHeaderMargin(10);
    // $pdf->setFooterMargin(10);
    $pdf->AddPage();

    // Defina o conteúdo do PDF
    // $header = '
    // <table style="border: 1px solid #ccc; padding: 10px;">
    //     <tr style="margin-left: -100px !important;">
    //         <td style="text-align: left; "><img src="../assets/img/logoHJ-Aluminio.jpg" alt="Logotipo" width="100px"></td>
    //     </tr>
    // </table>
    // ';

    // // Escreva o conteúdo no PDF
    // $pdf->writeHTML($header, true, false, true, false, '');
    
    // Desative o corte automático de página
    // $pdf->SetAutoPageBreak(false, 0);

    // Altura da margem de baixo do rodapé (em milímetros)
    // $header_bottom_margin = 8;

    // Altura do rodapé
    $header_height = 26;

    // Posiciona o cursor para o rodapé
    // $pdf->SetY(-$header_height - $header_bottom_margin);

    // // Adiciona a imagem
    // $image_file = '../assets/img/logoHJ-Aluminio.jpg';  // Substitua pelo caminho real da sua imagem
    // $pdf->Image($image_file, 0, $pdf->GetY(), 40, 30);  // Ajuste as coordenadas e o tamanho conforme necessário

    // // Adiciona uma borda ao rodapé
    // $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $header_height);
    // $data = date("d/m/Y");

    // // Adiciona o conteúdo em divs
    // $pdf->writeHTMLCell(0, 50, 60, $pdf->GetY(), '<div style="font-size: 12px;"><strong style="font-size: 15px; padding: 50px; margin: 50px;">HJ Alumínios</strong><br><br>43-3056-0052<br><a href="malito:hjaluminio@hotmail.com" style="text-decoration: none; color: black;">hjaluminio@hotmail.com</a></div>', 0, 0, false, true, 'L', true);
    // $pdf->writeHTMLCell(0, 0, 150, $pdf->GetY(), '<div style="font-size: 12px; padding-left: 30px;"><strong>Pedido: 22.546<br>Data: ' . $data . '</strong><br>Aprovado ('.$data.')</div>', 0, 0, false, true, 'L', true);
    // // Last Header

    

    // $segundoHeader_bottom_margin = 216;
    // $segundoHeader_height = 38;
    // $pdf->setY(-$segundoHeader_height - $segundoHeader_bottom_margin);
    // // Borda
    // $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $segundoHeader_height);
    // // Content
    // $pdf->writeHTMLCell(0, 50, 10, $pdf->GetY(), '<div>
    // <br><strong>Cliente:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COZY HOME
    // <br><strong>Consumidor</strong>
    // <br><strong>Endereço: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RUA AAA<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CEP:</strong> 86.705-560
    // <br><strong>Bairro: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VILA SAMPAIO
    // <br><strong>Cidade: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ARAPONGAS-PR<br><strong>Fone: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 76735257285345</div>');
    // // Last segundoHeader


    // $content_height = 38;
    // $pdf->writeHTMLCell(238, 0, -14, 85, '<table style="text-align: center !important;"><thead><tr style="font-weight: bold;">
    // <th>Qtd</th>
    // <th>Descrição</th>
    // <th>Medida</th>
    // <th>V. Unitário</th>
    // <th>Total</th>
    // </tr>
    // </thead>
    // <tbody><tr><td>1</td><td>PORTA 2.525 x 775 mm - HJ 045 - FOSCO / PX</td><td>2.525 x 775</td><td>955.84</td><td>955.84</td></tr></tbody></table>');

    // $pdf->writeHTMLCell(0, 160, 4, 85, '<div style="border: 1px solid red; "><strong>Qtd</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Descrição</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Medida</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>V.Unitário</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Total</strong>
    // <br>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="width: 10px !important">PORTA 2.525 x 775 mm</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.525 x 775&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;955.84&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;955.84
    // </div>');


    if ($result->num_rows > 0) {
        // Preenche o array com os dados dos tbl_ordem_producao
        while ($row = $result->fetch_assoc()) {
            $tbl_ordem_producao[] = array('id_uniq' => $row['id_uniq'], 'cliente' => $row['cliente']);
        }
    }
    if(isset($_POST['btn_submit']) && $_POST['btn_submit'] == 'Sintético - Cliente')
    {
        $btn_submit = $_POST['btn_submit'];

        
        // Adiciona a imagem
        $image_file = '../assets/img/logoHJ-Aluminio.jpg';  // Substitua pelo caminho real da sua imagem
        $pdf->Image($image_file, 0, $pdf->GetY(), 30, 20);  // Ajuste as coordenadas e o tamanho conforme necessário

        $header_height = 20;
        // Adiciona uma borda ao rodapé
        $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $header_height);
        $data = date("d/m/Y");

        // Adiciona o conteúdo em divs
        $pdf->writeHTMLCell(0, 50, 60, $pdf->GetY(), '<div style="font-size: 11px;"><strong style="font-size: 12px; padding: 50px; margin: 50px;">HJ Alumínios</strong><br><br>43-3056-0052<br><a href="malito:hjaluminio@hotmail.com" style="text-decoration: none; color: black;">hjaluminio@hotmail.com</a></div>', 0, 0, false, true, 'L', true);
        $pdf->writeHTMLCell(0, 0, 150, $pdf->GetY(), '<div style="font-size: 11px; padding-left: 30px;"><strong>Pedido: 22.546<br>Data: ' . $data . '</strong><br>Aprovado ('.$data.')</div>', 0, 0, false, true, 'L', true);
        // Last Header


        $segundoHeader_bottom_margin = 239;
        $segundoHeader_height = 20;
        $pdf->setY(-$segundoHeader_height - $segundoHeader_bottom_margin);
        // Borda
        $pdf->Rect(5, 33, $pdf->getPageWidth() - 10, $segundoHeader_height);
        // Content
        $pdf->writeHTMLCell(0, 0, 6, 34, '<div style="font-size: 10px;"><strong>Cliente: </strong>ANDERSON DIOGO GOMES COZY HOME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Qtd Total: </strong>1
        <br><strong>Consumidor</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Fone: </strong>43996624492
        <br><strong>Endereço: </strong>&nbsp;RUA AAA<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CEP:</strong> 86.705-560
        <br><strong>Bairro: </strong>VILA SAMPAIO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Cidade: </strong>ARAPONGAS-PR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>CNPJ/CPF: </strong>41.337.530/0001-07</div>');
        // Last segundoHeader

        $terceira_borda = 138;
        // Borda
        $pdf->Rect(5, 56, $pdf->getPageWidth() - 10, $terceira_borda);
        $pdf->writeHTMLCell(0, 0, 8, 57, '<div style="font-size: 10px;"><strong>Item: </strong>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Tipo: </strong>Porta&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Quantidade: </strong>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Altura (mm): </strong>2525&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Largura: (mm)</strong>775&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Área (m^2): </strong>1,956</div>');
        // $pdf->writeHTMLCell(0, 0, 5, 60, '<table style="font-size: 10px;"><tr><td><strong>Item: </strong>1</td><td><strong>Tipo: </strong>Porta</td><td><strong>Quantidade: </strong>1</td><td><strong>Altura (mm): </strong>2525</td><td><strong>Largura: (mm)</strong>775</td><td><strong>Área (m^2): </strong>1,956</td></tr></table>');
        
        $quarta_borda = 32;
        // Borda
        $pdf->Rect(8, 63, 205 - 10, $quarta_borda);
        $pdf->writeHTMLCell(0, 0, 8, 64, '<div style="font-size: 10px;"><strong>Lado Esquerdo: </strong>HJ 045 - FOSCO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PX HJ009FOSCO 18MM (2525mm) Centralizado
        <br><br><strong>Lado Direito: </strong>HJ 045 - FOSCO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PX HJ009FOSCO 18MM (2525mm) Centralizado
        <br><br><strong>Lado Superior: </strong>HJ 045 - FOSCO
        <br><br><strong>Lado Inferior: </strong>HJ 045 - FOSCO</div>');

        $quinta_borda = 14;
        // Borda
        $pdf->Rect(8, 97, 100 - 10, $quinta_borda);
        $pdf->writeHTMLCell(0, 0, 8, 98, '<div style="font-size: 10px;"><strong>Travessa: </strong>TRAVA OCULTA FOSCA
        <br><br>ESPELHO PRATA 4MM</div>');

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
        <br>() - Esquadreta: ESQ 300- 045 -</div>');        
        // Adiciona a imagem
        $image_file = '../assets/img/logoHJ-Aluminio.jpg';  // Substitua pelo caminho real da sua imagem
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

        foreach ($tbl_ordem_producao as $arquivo) {
            // $pdf->Cell(0, 50, $arquivo['id_uniq']. '___' . $arquivo['cliente'] , 0, true, 'L', 0, '', 0, false, 'T', 'M'); 
        
            // Defina o conteúdo do PDF
            // $content = '
            // <h1 style="text-align: center;">Conteúdo do PDF</h1>
            // <p> ' . $arquivo['id_uniq'] . ' ' . $btn_submit .'___'. $id_uniq . ' Sintético - Cliente</p>
            // ';
        }
        // Escreva o conteúdo no PDF
        // $pdf->writeHTML($content, true, false, true, false, '');
        // $pdf->writeHTMLCell(0, 0, 10, 100, '<div> '. $content .' </div>');
        // $content_height = 38;

    }elseif(isset($_POST['btn_submit']) && $_POST['btn_submit'] == 'Sintético 3 - Cliente')
    {
        // Defina o conteúdo do PDF
        // $header = '
        // <table style="border: 1px solid #ccc; padding: 10px;">
        //     <tr>
        //         <td style="text-align: left;"><img src="../assets/img/logoHJ-Aluminio.jpg" alt="Logotipo" width="10px"></td>
        //     </tr>
        // </table>
        // ';
        // // Escreva o conteúdo no PDF
        // $pdf->writeHTML($header, true, false, true, false, '');
        
        // Adiciona a imagem
        $image_file = '../assets/img/logoHJ-Aluminio.jpg';  // Substitua pelo caminho real da sua imagem
        $pdf->Image($image_file, 0, $pdf->GetY(), 40, 30);  // Ajuste as coordenadas e o tamanho conforme necessário

        // Adiciona uma borda ao rodapé
        $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $header_height);
        $data = date("d/m/Y");

        // Adiciona o conteúdo em divs
        $pdf->writeHTMLCell(0, 50, 60, $pdf->GetY(), '<div style="font-size: 12px;"><strong style="font-size: 15px; padding: 50px; margin: 50px;">HJ Alumínios</strong><br><br>43-3056-0052<br><a href="malito:hjaluminio@hotmail.com" style="text-decoration: none; color: black;">hjaluminio@hotmail.com</a></div>', 0, 0, false, true, 'L', true);
        $pdf->writeHTMLCell(0, 0, 150, $pdf->GetY(), '<div style="font-size: 12px; padding-left: 30px;"><strong>Pedido: 22.546<br>Data: ' . $data . '</strong><br>Aprovado ('.$data.')</div>', 0, 0, false, true, 'L', true);
        // Last Header



        $segundoHeader_bottom_margin = 216;
        $segundoHeader_height = 38;
        $pdf->setY(-$segundoHeader_height - $segundoHeader_bottom_margin);
        // Borda
        $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $segundoHeader_height);
        // Content
        $pdf->writeHTMLCell(0, 50, 10, $pdf->GetY(), '<div>
        <br><strong>Cliente:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COZY HOME
        <br><strong>Consumidor</strong>
        <br><strong>Endereço: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RUA AAA<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CEP:</strong> 86.705-560
        <br><strong>Bairro: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VILA SAMPAIO
        <br><strong>Cidade: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ARAPONGAS-PR<br><strong>Fone: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 76735257285345</div>');
        // Last segundoHeader


        // Desative o corte automático de página
        $pdf->SetAutoPageBreak(false, 0);

        // Altura da margem de baixo do rodapé (em milímetros)
        $footer_bottom_margin = 28;

        // Altura do rodapé
        $footer_height = 28;

        // Posiciona o cursor para o rodapé
        $pdf->SetY(-$footer_height - $footer_bottom_margin);
        // Adiciona a imagem
        // $image_file = '../assets/img/logoHJ-Aluminio.jpg';  // Substitua pelo caminho real da sua imagem
        // $pdf->Image($image_file, 0, $pdf->GetY(), 40, 30);  // Ajuste as coordenadas e o tamanho conforme necessário
        // Adiciona uma borda ao rodapé
        $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $footer_height);
        $data = date("d/m/Y");
        // Adiciona o conteúdo em divs
        // $pdf->writeHTMLCell(0, 0, 6, $pdf->GetY(), '<div style="font-size: 12px;"><strong style="font-size: 15px;">Observação da OP: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vendedor(a): Elaine Ap. Gorris Benedit<br><br><a href="malito:hjaluminio@hotmail.com" style="text-decoration: none; color: black;">hjaluminio@hotmail.com</a></div>', 0, 0, false, true, 'L', true);
        // $pdf->writeHTMLCell(0, 0, 150, $pdf->GetY(), '<div style="font-size: 12px; padding-left: 30px;"><strong>Pedido: 22.546<br>Data: ' . $data . '</strong><br>Aprovado ('.$data.')</div>', 0, 0, false, true, 'L', true);
        $pdf->writeHTMLCell(0, 0, 6, 233, '<div><strong style="font-size: 14px">Qtd Total (Portas + Vidros): 1</strong></div>');
        $pdf->writeHTMLCell(0, 0, 6, 242, '<div style="font-size: 12px;"><strong>Observação da OP: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vendedor(a): Elaine Ap. Gorris Benedit
        <br><br><br><br><strong>Prev. Entrega:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Pedido P.:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Conferido Por: _____________________________</strong></div>', 0, 0, false, true, 'L', true);
        // $pdf->writeHTMLCell(0, 0, 150, $pdf->GetY(), '<div style="font-size: 12px; padding-left: 30px;"><strong>Pedido: 22.546<br>Data: ' . $data . '</strong><br>Aprovado ('.$data.')</div>', 0, 0, false, true, 'L', true);
        // Posicione o cursor para o endereço web
        $pdf->SetY($pdf->GetY() + 30);
        // $pdf->writeHTML('<div style="font-size: 10px; text-align: center;"><a href="https://www.exemplo.com">https://www.exemplo.com</a></div>', true, false, false, false, '');
        // Posicione o cursor para o número da página
        // $pdf->SetX($pdf->getPageWidth() - 40);
        // $pdf->writeHTML('<div style="font-size: 10px; text-align: center;">Página '.$pdf->getAliasNumPage().' de '.$pdf->getAliasNbPages().'</div>', true, false, false, false, '');
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
        // Adiciona a imagem
        // $image_file = '../assets/img/logoHJ-Aluminio.jpg';  // Substitua pelo caminho real da sua imagem
        // $pdf->Image($image_file, 0, $pdf->GetY(), 40, 30);  // Ajuste as coordenadas e o tamanho conforme necessário
        // Adiciona uma borda ao rodapé
        $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $footer_height);
        $data = date("d/m/Y");
        // Adiciona o conteúdo em divs
        // $pdf->writeHTMLCell(0, 0, 6, $pdf->GetY(), '<div style="font-size: 12px;"><strong style="font-size: 15px;">Observação da OP: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vendedor(a): Elaine Ap. Gorris Benedit<br><br><a href="malito:hjaluminio@hotmail.com" style="text-decoration: none; color: black;">hjaluminio@hotmail.com</a></div>', 0, 0, false, true, 'L', true);
        // $pdf->writeHTMLCell(0, 0, 150, $pdf->GetY(), '<div style="font-size: 12px; padding-left: 30px;"><strong>Pedido: 22.546<br>Data: ' . $data . '</strong><br>Aprovado ('.$data.')</div>', 0, 0, false, true, 'L', true);
        $pdf->writeHTMLCell(0, 0, 6, 233, '<div><strong style="font-size: 14px">Qtd Total (Portas + Vidros): 1</strong></div>');
        $pdf->writeHTMLCell(0, 0, 6, 242, '<div style="font-size: 12px;"><strong>Observação da OP: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vendedor(a): Elaine Ap. Gorris Benedit
        <br><br><br><br><strong>Prev. Entrega:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Pedido P.:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Conferido Por: _____________________________</strong></div>', 0, 0, false, true, 'L', true);
        // $pdf->writeHTMLCell(0, 0, 150, $pdf->GetY(), '<div style="font-size: 12px; padding-left: 30px;"><strong>Pedido: 22.546<br>Data: ' . $data . '</strong><br>Aprovado ('.$data.')</div>', 0, 0, false, true, 'L', true);
        // Posicione o cursor para o endereço web
        $pdf->SetY($pdf->GetY() + 30);
        // $pdf->writeHTML('<div style="font-size: 10px; text-align: center;"><a href="https://www.exemplo.com">https://www.exemplo.com</a></div>', true, false, false, false, '');
        // Posicione o cursor para o número da página
        // $pdf->SetX($pdf->getPageWidth() - 40);
        // $pdf->writeHTML('<div style="font-size: 10px; text-align: center;">Página '.$pdf->getAliasNumPage().' de '.$pdf->getAliasNbPages().'</div>', true, false, false, false, '');
        // Last Footer

        $debaixo_footer_height = 17;
        $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $debaixo_footer_height);
        $pdf->writeHTMLCell(0, 0, 6, $pdf->GetY(), '<div style="font-size: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Total-Cliente:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;955,84</div>', 0, 0, false, true, 'L', true);

        $pdf->writeHTMLCell(0, 0, 5, 290, '<div style="font-size: 10px; text-align: left;"><a href="https://www.exemplo.com" style=" color: #000;">https://www.exemplo.com</a></div>', 0, 0, false, true, 'L', true);

        $btn_submit = $_POST['btn_submit'];
        foreach ($tbl_ordem_producao as $arquivo) {
            // $pdf->Cell(0, 10, $arquivo['id_uniq']. '___' . $arquivo['cliente'] , 0, true, 'L', 0, '', 0, false, 'T', 'M');        
            // Defina o conteúdo do PDF
            // $content = '
            // <h1 style="text-align: center;">Conteúdo do PDF</h1>
            // <p> ' . $arquivo['id_uniq'] . ' ' . $btn_submit .'___'. $id_uniq . 'Sintético 3 - Cliente</p>
            // ';
            $pdf->writeHTMLCell(238, 0, -14, 85, '<table style="text-align: center !important;"><thead><tr style="font-weight: bold;">
            <th>Qtd</th>
            <th>Descrição</th>
            <th>Medida</th>
            <th>V. Unitário</th>
            <th>Total</th>
            </tr>
            </thead>
            <tbody><tr><td>1</td><td>PORTA 2.525 x 775 mm - HJ 045 - FOSCO / PX</td><td>2.525 x 775</td><td>955.84</td><td>955.84</td></tr></tbody></table>');
        }
        // Escreva o conteúdo no PDF
        // $pdf->writeHTML($content, true, false, true, false, '');
    }elseif(isset($_POST['btn_submit']) && $_POST['btn_submit'] == 'Sintético 3 - Sem Valor')
    {
        // Defina o conteúdo do PDF
        // $header = '
        // <table style="border: 1px solid #ccc; padding: 10px;">
        //     <tr>
        //         <td style="text-align: left;"><img src="../assets/img/logoHJ-Aluminio.jpg" alt="Logotipo" width="10px"></td>
        //     </tr>
        // </table>
        // ';
        // // Escreva o conteúdo no PDF
        // $pdf->writeHTML($header, true, false, true, false, '');
        
        // Adiciona a imagem
        $image_file = '../assets/img/logoHJ-Aluminio.jpg';  // Substitua pelo caminho real da sua imagem
        $pdf->Image($image_file, 0, $pdf->GetY(), 40, 30);  // Ajuste as coordenadas e o tamanho conforme necessário

        // Adiciona uma borda ao rodapé
        $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $header_height);
        $data = date("d/m/Y");

        // Adiciona o conteúdo em divs
        $pdf->writeHTMLCell(0, 50, 60, $pdf->GetY(), '<div style="font-size: 12px;"><strong style="font-size: 15px; padding: 50px; margin: 50px;">HJ Alumínios</strong><br><br>43-3056-0052<br><a href="malito:hjaluminio@hotmail.com" style="text-decoration: none; color: black;">hjaluminio@hotmail.com</a></div>', 0, 0, false, true, 'L', true);
        $pdf->writeHTMLCell(0, 0, 150, $pdf->GetY(), '<div style="font-size: 12px; padding-left: 30px;"><strong>Pedido: 22.546<br>Data: ' . $data . '</strong><br>Aprovado ('.$data.')</div>', 0, 0, false, true, 'L', true);
        // Last Header



        $segundoHeader_bottom_margin = 216;
        $segundoHeader_height = 38;
        $pdf->setY(-$segundoHeader_height - $segundoHeader_bottom_margin);
        // Borda
        $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $segundoHeader_height);
        // Content
        $pdf->writeHTMLCell(0, 50, 10, $pdf->GetY(), '<div>
        <br><strong>Cliente:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COZY HOME
        <br><strong>Consumidor</strong>
        <br><strong>Endereço: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RUA AAA<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CEP:</strong> 86.705-560
        <br><strong>Bairro: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VILA SAMPAIO
        <br><strong>Cidade: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ARAPONGAS-PR<br><strong>Fone: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 76735257285345</div>');
        // Last segundoHeader


        // Desative o corte automático de página
        $pdf->SetAutoPageBreak(false, 0);

        // Altura da margem de baixo do rodapé (em milímetros)
        $footer_bottom_margin = 28;

        // Altura do rodapé
        $footer_height = 28;

        // Posiciona o cursor para o rodapé
        $pdf->SetY(-$footer_height - $footer_bottom_margin);
        // Adiciona a imagem
        // $image_file = '../assets/img/logoHJ-Aluminio.jpg';  // Substitua pelo caminho real da sua imagem
        // $pdf->Image($image_file, 0, $pdf->GetY(), 40, 30);  // Ajuste as coordenadas e o tamanho conforme necessário
        // Adiciona uma borda ao rodapé
        $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $footer_height);
        $data = date("d/m/Y");
        // Adiciona o conteúdo em divs
        // $pdf->writeHTMLCell(0, 0, 6, $pdf->GetY(), '<div style="font-size: 12px;"><strong style="font-size: 15px;">Observação da OP: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vendedor(a): Elaine Ap. Gorris Benedit<br><br><a href="malito:hjaluminio@hotmail.com" style="text-decoration: none; color: black;">hjaluminio@hotmail.com</a></div>', 0, 0, false, true, 'L', true);
        // $pdf->writeHTMLCell(0, 0, 150, $pdf->GetY(), '<div style="font-size: 12px; padding-left: 30px;"><strong>Pedido: 22.546<br>Data: ' . $data . '</strong><br>Aprovado ('.$data.')</div>', 0, 0, false, true, 'L', true);
        $pdf->writeHTMLCell(0, 0, 6, 233, '<div><strong style="font-size: 14px">Qtd Total (Portas + Vidros): 1</strong></div>');
        $pdf->writeHTMLCell(0, 0, 6, 242, '<div style="font-size: 12px;"><strong>Observação da OP: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vendedor(a): Elaine Ap. Gorris Benedit
        <br><br><br><br><strong>Prev. Entrega:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Pedido P.:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Conferido Por: _____________________________</strong></div>', 0, 0, false, true, 'L', true);
        // $pdf->writeHTMLCell(0, 0, 150, $pdf->GetY(), '<div style="font-size: 12px; padding-left: 30px;"><strong>Pedido: 22.546<br>Data: ' . $data . '</strong><br>Aprovado ('.$data.')</div>', 0, 0, false, true, 'L', true);
        // Posicione o cursor para o endereço web
        $pdf->SetY($pdf->GetY() + 30);
        // $pdf->writeHTML('<div style="font-size: 10px; text-align: center;"><a href="https://www.exemplo.com">https://www.exemplo.com</a></div>', true, false, false, false, '');
        // Posicione o cursor para o número da página
        // $pdf->SetX($pdf->getPageWidth() - 40);
        // $pdf->writeHTML('<div style="font-size: 10px; text-align: center;">Página '.$pdf->getAliasNumPage().' de '.$pdf->getAliasNbPages().'</div>', true, false, false, false, '');
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
        // Adiciona a imagem
        // $image_file = '../assets/img/logoHJ-Aluminio.jpg';  // Substitua pelo caminho real da sua imagem
        // $pdf->Image($image_file, 0, $pdf->GetY(), 40, 30);  // Ajuste as coordenadas e o tamanho conforme necessário
        // Adiciona uma borda ao rodapé
        $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $footer_height);
        $data = date("d/m/Y");
        // Adiciona o conteúdo em divs
        // $pdf->writeHTMLCell(0, 0, 6, $pdf->GetY(), '<div style="font-size: 12px;"><strong style="font-size: 15px;">Observação da OP: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vendedor(a): Elaine Ap. Gorris Benedit<br><br><a href="malito:hjaluminio@hotmail.com" style="text-decoration: none; color: black;">hjaluminio@hotmail.com</a></div>', 0, 0, false, true, 'L', true);
        // $pdf->writeHTMLCell(0, 0, 150, $pdf->GetY(), '<div style="font-size: 12px; padding-left: 30px;"><strong>Pedido: 22.546<br>Data: ' . $data . '</strong><br>Aprovado ('.$data.')</div>', 0, 0, false, true, 'L', true);
        $pdf->writeHTMLCell(0, 0, 6, 233, '<div><strong style="font-size: 14px">Qtd Total (Portas + Vidros): 1</strong></div>');
        $pdf->writeHTMLCell(0, 0, 6, 242, '<div style="font-size: 12px;"><strong>Observação da OP: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vendedor(a): Elaine Ap. Gorris Benedit
        <br><br><br><br><strong>Prev. Entrega:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Pedido P.:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Conferido Por: _____________________________</strong></div>', 0, 0, false, true, 'L', true);
        // $pdf->writeHTMLCell(0, 0, 150, $pdf->GetY(), '<div style="font-size: 12px; padding-left: 30px;"><strong>Pedido: 22.546<br>Data: ' . $data . '</strong><br>Aprovado ('.$data.')</div>', 0, 0, false, true, 'L', true);
        // Posicione o cursor para o endereço web
        $pdf->SetY($pdf->GetY() + 30);
        // $pdf->writeHTML('<div style="font-size: 10px; text-align: center;"><a href="https://www.exemplo.com">https://www.exemplo.com</a></div>', true, false, false, false, '');
        // Posicione o cursor para o número da página
        // $pdf->SetX($pdf->getPageWidth() - 40);
        // $pdf->writeHTML('<div style="font-size: 10px; text-align: center;">Página '.$pdf->getAliasNumPage().' de '.$pdf->getAliasNbPages().'</div>', true, false, false, false, '');
        // Last Footer

        $debaixo_footer_height = 17;
        $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $debaixo_footer_height);
        $pdf->writeHTMLCell(0, 0, 6, $pdf->GetY(), '<div style="font-size: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Total-Cliente:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;955,84</div>', 0, 0, false, true, 'L', true);

        $pdf->writeHTMLCell(0, 0, 5, 290, '<div style="font-size: 10px; text-align: left;"><a href="https://www.exemplo.com" style=" color: #000;">https://www.exemplo.com</a></div>', 0, 0, false, true, 'L', true);

        $btn_submit = $_POST['btn_submit'];
        foreach ($tbl_ordem_producao as $arquivo) {
            // $pdf->Cell(0, 10, $arquivo['id_uniq']. '___' . $arquivo['cliente'] , 0, true, 'L', 0, '', 0, false, 'T', 'M');        
            // Defina o conteúdo do PDF
            // $content = '
            // <h1 style="text-align: center;">Conteúdo do PDF</h1>
            // <p> ' . $arquivo['id_uniq'] . ' ' . $btn_submit .'___'. $id_uniq . 'Sintético 3 - Cliente</p>
            // ';
            $pdf->writeHTMLCell(238, 0, -14, 85, '<table style="text-align: center !important;"><thead><tr style="font-weight: bold;">
            <th>Qtd</th>
            <th>Descrição</th>
            <th>Medida</th>
            </tr>
            </thead>
            <tbody><tr><td>1</td><td>PORTA 2.525 x 775 mm - HJ 045 - FOSCO / PX</td><td>2.525 x 775</td><td>955.84</td><td>955.84</td></tr></tbody></table>');
        }
        // Escreva o conteúdo no PDF
        // $pdf->writeHTML($content, true, false, true, false, '');
    }elseif(isset($_POST['btn_submit']) && $_POST['btn_submit'] == 'Relátorio de Vendas (OP)')
    {
        $pdf->setPageOrientation('L');
        
        // Adiciona a imagem
        $image_file = '../assets/img/logoHJ-Aluminio.jpg';  // Substitua pelo caminho real da sua imagem
        $pdf->Image($image_file, 0, 5, 30, 20);  // Ajuste as coordenadas e o tamanho conforme necessário

        // Adiciona uma borda ao rodapé
        // $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $header_height);
        $data = date("d/m/Y");

        // Adiciona o conteúdo em divs
        $pdf->writeHTMLCell(0, 50, 120, $pdf->GetY(), '<div style="font-size: 10px;"><span style="font-size: 12px;">HJ Alumínios EIRELI</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;Relátorio de Vendas</span></div>', 0, 0, false, true, 'L', true);
        $pdf->writeHTMLCell(0, 0, 240, $pdf->GetY(), '<div style="font-size: 11px; padding-left: 30px;">Emitido em: ' . $data . '</div>', 0, 0, false, true, 'L', true);
        // Last Header

        $pdf->writeHTMLCell(350, 0, 0, 28, '<table style="font-size: 10px;"><thead style="border: 1px solid black;"><tr style="font-weight: bold;"><th>OP</th><th>Dt.Pedido</th><th>Parceiro</th><th>Cliente</th><th>Valor</th></tr></thead>
        <tbody><tr><td>22546</td><td>'.$data.'</td><td>HJ Alumínios</td><td>ANDERSON DIEGO GOMES</td><td>955,84</td></tr><tr><td>22546</td><td>'.$data.'</td><td>HJ Alumínios</td><td>ANDERSON DIEGO GOMES</td><td>955,84</td></tr><tr><td>22546</td><td>'.$data.'</td><td>HJ Alumínios</td><td>ANDERSON DIEGO GOMES</td><td>955,84</td></tr><tr><td>22546</td><td>'.$data.'</td><td>HJ Alumínios</td><td>ANDERSON DIEGO GOMES</td><td>955,84</td></tr></tbody></table>');
        // $pdf->writeHTMLCell(0, 5, 6, 28, '<div style="font-size: 10px;"><strong>OP</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Dt.Pedido</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Parceiro</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Cliente</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Valor</strong>
        // </div>', 0, 0, false, true, 'L', true);
        // $pdf->writeHTMLCell(297, 0, 0, 27, '<strong><hr></strong>');
        // $pdf->writeHTMLCell(0, 0, 3, 33, '<div style="font-size: 10px;">22546</div>');

        // Adiciona uma borda ao rodapé
        $header_borda = 8;
        $pdf->Rect(1, 52, $pdf->getPageWidth() - 2, $header_borda);
        // Adiciona o conteúdo em divs
        $pdf->writeHTMLCell(0, 50, 240, 55, '<div style="font-size: 12px;"><strong style="font-size: 11px; padding: 50px; margin: 50px;">Valor Total: 1.887,64</strong></div>', 0, 0, false, true, 'L', true);

        $btn_submit = $_POST['btn_submit'];
        foreach ($tbl_ordem_producao as $arquivo) {
            // $pdf->Cell(0, 10, $arquivo['id_uniq']. '___' . $arquivo['cliente'] , 0, true, 'L', 0, '', 0, false, 'T', 'M'); 
        
            // Defina o conteúdo do PDF
            // $content = '
            // <h1 style="text-align: center;">Conteúdo do PDF</h1>
            // <p> ' . $arquivo['id_uniq'] . ' ' . $btn_submit .'___'. $id_uniq . 'Relátorio de Vendas (OP)</p>
            // ';
        }
        // Escreva o conteúdo no PDF
        // $pdf->writeHTML($content, true, false, true, false, '');
    }elseif(isset($_POST['btn_submit']) && $_POST['btn_submit'] == 'Relátorio para Entrega Por Cliente')
    {
        $pdf->setPageOrientation('L');
        
        // Adiciona a imagem
        $image_file = '../assets/img/logoHJ-Aluminio.jpg';  // Substitua pelo caminho real da sua imagem
        $pdf->Image($image_file, 0, 2, 30, 20);  // Ajuste as coordenadas e o tamanho conforme necessário

        // Adiciona uma borda ao rodapé

        $height = 30;
        $pdf->Rect(5, 2, $pdf->getPageWidth() - 10, $height);
        $data = date("d/m/Y");

        // Adiciona o conteúdo em divs
        $pdf->writeHTMLCell(0, 50, 120, 3, '<div style="font-size: 12px;"><span style="font-size: 12px;">HJ Alumínios EIRELI</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;43-3056-0052</span><br><span>&nbsp;<a style="text-decoration: none; color: black;" href="malito:hjaluminio@hotmail.com">hjaluminio@hotmail.com</a></span></div>', 0, 0, false, true, 'L', true);
        $pdf->writeHTMLCell(0, 0, 256, $pdf->GetY(), '<div style="font-size: 11px; font-weight: bold;">' . $data . '</div>', 0, 0, false, true, 'L', true);
        $pdf->writeHTMLCell(0, 0, 5, 20, '<div>Cliente: CASSANDRO BOM SUCESSO<br>E-mail:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telefone: (43) 99806-9640
        </div>');
        // Last Header

        $pdf->writeHTMLCell(320, 0, 4, 35, '<table style="font-size: 10px;"><thead style="border: 1px solid black;"><tr style="font-weight: bold;"><th>Qtd</th><th>Descrição</th><th>Alt</th><th>Lar</th><th>Vidro</th><th>Perfil</th><th>Pedido</th></tr></thead>
        <tbody><tr><td>1</td><td>PX HJ183INOX</td><td></td><td>18000</td><td></td><td></td><td>22.543</td></tr><tr><td>1</td><td>PX HJ183INOX</td><td></td><td>18000</td><td></td><td></td><td>22.543</td></tr><tr><td>1</td><td>PX HJ183INOX</td><td></td><td>18000</td><td></td><td></td><td>22.543</td></tr></tbody></table>');

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



        $btn_submit = $_POST['btn_submit'];
        foreach ($tbl_ordem_producao as $arquivo) {
            // $pdf->Cell(0, 10, $arquivo['id_uniq']. '___' . $arquivo['cliente'] , 0, true, 'L', 0, '', 0, false, 'T', 'M'); 
        
            // Defina o conteúdo do PDF
            // $content = '
            // <h1 style="text-align: center;">Conteúdo do PDF</h1>
            // <p> ' . $arquivo['id_uniq'] . ' ' . $btn_submit .'___'. $id_uniq . 'Relátorio de Vendas (OP)</p>
            // ';
        }
        // Escreva o conteúdo no PDF
        // $pdf->writeHTML($content, true, false, true, false, '');
    }      
    








    
    // Defina o rodapé
    // $rodape = '
    // <div style="width: 100%; border: 1px solid #ddd; padding: 10px !important; margin: 0 !important; display: flex !important;">
    //     <div style="background-color: red">
    //         <p>id_uniq: ' . $id_uniqUsuario . '</p>
    //         <p>Email: ' . $emailUsuario . '</p>
    //     </div>

    //     <div>
    //         <p>id_uniq: ' . $id_uniqUsuario . '</p>
    //         <p>Email: ' . $emailUsuario . '</p>
    //     </div>
    // </div>
    // ';
    // $pdf->SetY(238);  // Posiciona a 15 unidades a partir do final da página (para o rodapé)
    // $pdf->writeHTML($rodape, true, false, true, false, '');

    // // Desative o corte automático de página
    // $pdf->SetAutoPageBreak(false, 0);

    // // Altura da margem de baixo do rodapé (em milímetros)
    // $footer_bottom_margin = 28;

    // // Altura do rodapé
    // $footer_height = 28;

    // // Posiciona o cursor para o rodapé
    // $pdf->SetY(-$footer_height - $footer_bottom_margin);
    // // Adiciona a imagem
    // // $image_file = '../assets/img/logoHJ-Aluminio.jpg';  // Substitua pelo caminho real da sua imagem
    // // $pdf->Image($image_file, 0, $pdf->GetY(), 40, 30);  // Ajuste as coordenadas e o tamanho conforme necessário
    // // Adiciona uma borda ao rodapé
    // $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $footer_height);
    // $data = date("d/m/Y");
    // // Adiciona o conteúdo em divs
    // // $pdf->writeHTMLCell(0, 0, 6, $pdf->GetY(), '<div style="font-size: 12px;"><strong style="font-size: 15px;">Observação da OP: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vendedor(a): Elaine Ap. Gorris Benedit<br><br><a href="malito:hjaluminio@hotmail.com" style="text-decoration: none; color: black;">hjaluminio@hotmail.com</a></div>', 0, 0, false, true, 'L', true);
    // // $pdf->writeHTMLCell(0, 0, 150, $pdf->GetY(), '<div style="font-size: 12px; padding-left: 30px;"><strong>Pedido: 22.546<br>Data: ' . $data . '</strong><br>Aprovado ('.$data.')</div>', 0, 0, false, true, 'L', true);
    // $pdf->writeHTMLCell(0, 0, 6, 233, '<div><strong style="font-size: 14px">Qtd Total (Portas + Vidros): 1</strong></div>');
    // $pdf->writeHTMLCell(0, 0, 6, 242, '<div style="font-size: 12px;"><strong>Observação da OP: </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vendedor(a): Elaine Ap. Gorris Benedit
    // <br><br><br><br><strong>Prev. Entrega:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Pedido P.:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Conferido Por: _____________________________</strong></div>', 0, 0, false, true, 'L', true);
    // // $pdf->writeHTMLCell(0, 0, 150, $pdf->GetY(), '<div style="font-size: 12px; padding-left: 30px;"><strong>Pedido: 22.546<br>Data: ' . $data . '</strong><br>Aprovado ('.$data.')</div>', 0, 0, false, true, 'L', true);
    // // Posicione o cursor para o endereço web
    // $pdf->SetY($pdf->GetY() + 30);
    // // $pdf->writeHTML('<div style="font-size: 10px; text-align: center;"><a href="https://www.exemplo.com">https://www.exemplo.com</a></div>', true, false, false, false, '');
    // // Posicione o cursor para o número da página
    // // $pdf->SetX($pdf->getPageWidth() - 40);
    // // $pdf->writeHTML('<div style="font-size: 10px; text-align: center;">Página '.$pdf->getAliasNumPage().' de '.$pdf->getAliasNbPages().'</div>', true, false, false, false, '');
    // // Last Footer

    // $debaixo_footer_height = 17;
    // $pdf->Rect(5, $pdf->GetY(), $pdf->getPageWidth() - 10, $debaixo_footer_height);
    // $pdf->writeHTMLCell(0, 0, 6, $pdf->GetY(), '<div style="font-size: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Total-Cliente:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;955,84</div>', 0, 0, false, true, 'L', true);

    // $pdf->writeHTMLCell(0, 0, 5, 290, '<div style="font-size: 10px; text-align: left;"><a href="https://www.exemplo.com" style=" color: #000;">https://www.exemplo.com</a></div>', 0, 0, false, true, 'L', true);



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

<!-- <php
require_once('./TCPDF-main/tcpdf.php');
    
// Crie um novo objeto TCPDF
$pdf = new TCPDF();

// Defina as margens (em milímetros)
$pdf->SetMargins(10, 10, 10);

// Defina o padding do cabeçalho e rodapé (em milímetros)
$pdf->setHeaderMargin(10);
$pdf->setFooterMargin(10);

// Defina a orientação da página como horizontal (L para landscape)
$pdf->setPageOrientation('L');

// Adicione uma página
$pdf->AddPage();

// Configurações de fonte
$font_size = 10;
// $pdf->SetFont('Arial', '', $font_size);

// Conteúdo para cada coluna do rodapé
$col1 = 'Coluna 1';
$col2 = 'Coluna 2';
$col3 = 'Coluna 3';

// Largura de cada coluna (ajuste conforme necessário)
$col_width = 60;

// Altura do rodapé
$footer_height = 15;

// Coordenadas iniciais para cada coluna
$x1 = 10;
$x2 = $x1 + $col_width;
$x3 = $x2 + $col_width;

// Posiciona o cursor para o rodapé
$pdf->SetY(-$footer_height);

// Adiciona o conteúdo em cada coluna
$pdf->Cell($col_width, $footer_height, $col1, 0, 0, 'L');
$pdf->Cell($col_width, $footer_height, $col2, 0, 0, 'C');
$pdf->Cell($col_width, $footer_height, $col3, 0, 0, 'R');

?> -->