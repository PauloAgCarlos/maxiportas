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
    $id = json_decode($_POST["selectedIdsPedidos"]);
    
    if(empty($id)) {
        header('Content-Type: text/html; charset=utf-8');
        header('Location: dashboard.php?vazio');
        exit;
    } else {
        foreach($id as $row_id) {
            // Adicionar uma nova página para cada cliente no PDF
            $pdf->AddPage();

            $sql = "SELECT * FROM tbl_ordem_producao WHERE id = $row_id";
            $result = $conn->query($sql);
            $tbl_ordem_producao = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $tbl_ordem_producao[] = array('id' => $row['id'], 'cliente' => $row['cliente'], 'produto' => $row['produto']);

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

                    foreach ($tbl_ordem_producao as $row_ordemproducao) {
                        // Definir a posição do conteúdo relacionado ao cliente
                        $pdf->Rect(5, $pdf->GetY() + 22, $pdf->getPageWidth() - 10, 20);
                        $pdf->writeHTMLCell(0, 0, 6, $pdf->GetY() + 23, '<div style="font-size: 10px;"><strong>Cliente: </strong>'.$row_ordemproducao['cliente'].'</div>');
                        // Adicionar mais conteúdo relacionado ao cliente aqui
                    }


                    // Desative o corte automático de página
                    $pdf->SetAutoPageBreak(false, 0);

                    // Altura da margem de baixo do rodapé (em milímetros)
                    $footer_bottom_margin = 6;

                    // Altura do rodapé
                    $footer_height = 10;
                    // Posiciona o cursor para o rodapé
                    $pdf->SetY(-$footer_height - $footer_bottom_margin);
                    $data = date("d/m/Y");
                    // $pdf->writeHTMLCell(0, 0, 6, 233, '<div><strong style="font-size: 14px">Qtd Total (Portas + Vidros): 1</strong></div>');
                    $pdf->writeHTMLCell(0, 0, 6, 290, '<div style="font-size: 10px; text-align: left;"><a href="https://www.exemplo.com" style=" color: #000;">https://www.exemplo.com</a></div>', 0, 0, false, true, 'L', true);
                    $pdf->SetY($pdf->GetY() + 30);
                    // Last Footer

                }
            }
        }
    }

    $pdf->Output('hjaluminio.pdf', 'I');
}

criarPDF("Exemplo id_uniq", "exemplo@dominio.com");
?>
