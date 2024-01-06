<?php

    require_once('./TCPDF-main/tcpdf.php');

    // Crie uma instância do TCPDF
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    // Adicione uma nova página com um tamanho personalizado
    $pdf->AddPage('P', array(100, 100)); // Substitua 100 e 150 pelos tamanhos desejados

    // Adicione conteúdo ao PDF
    $pdf->writeHTMLCell(0, 50, 20, $pdf->GetY(), '<div style="font-size: 10px;"><span style="font-size: 12px;">HJ Alumínios EIRELI</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;Relátorio de Vendas</span></div>', 0, 0, false, true, 'L', true);
    
    // Salve o PDF ou envie para o navegador
    $pdf->Output('example.pdf', 'I');

?>