<?php
require_once('./TCPDF-main/tcpdf.php');

// Função para criar o PDF
function criarPDF($id_uniqUsuario, $emailUsuario) {
    $pdf = new TCPDF();

    $pdf->SetMargins(5, 10, 5, 0);
    $pdf->AddPage();

    // Adicione a imagem
    $image_file = '../assets/img/logoHJ-Aluminio.jpg';  // Substitua pelo caminho real da sua imagem
    $pdf->Image($image_file, 10, 10, 30, 20);  // Ajuste as coordenadas e o tamanho conforme necessário

    // Estilo para o cabeçalho
    $headerStyle = 'font-size: 11px;';
    $boldStyle = 'font-weight: bold;';
    $linkStyle = 'text-decoration: none; color: black;';

    // Cabeçalho
    $pdf->writeHTMLCell(0, 50, 60, 10, "
        <div style='$headerStyle'>
            <strong style='$boldStyle'>HJ Alumínios</strong><br>
            43-3056-0052<br>
            <a href='mailto:hjaluminio@hotmail.com' style='$linkStyle'>hjaluminio@hotmail.com</a>
        </div>", 0, 0, false, true, 'L', true);

    $data = date("d/m/Y");

    // Informações do Pedido
    $pdf->writeHTMLCell(0, 0, 150, 10, "
        <div style='$headerStyle; padding-left: 30px;'>
            <strong>Pedido: 22.546</strong><br>
            <strong>Data: $data</strong><br>
            Aprovado ($data)
        </div>", 0, 0, false, true, 'L', true);

    // Dados dos clientes
    require_once "../config.php";
    $conn = new mysqli($DBHOST, $DBUSER, $DBPASS, $DBNAME);
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $id = json_decode($_POST["selectedIds"]);

    if (empty($id)) {
        header('Location: dashboard.php?vazio');
    } else {
        $eixo_x = 33;

        foreach ($id as $row_id) {
            $sql = "SELECT * FROM pedidos_dos_clientes WHERE id = $row_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Tabela para os dados do cliente
                    $pdf->SetXY(10, $eixo_x);
                    $pdf->SetFillColor(240, 240, 240);
                    $pdf->SetFont('', 'B');
                    $pdf->Cell(80, 6, 'Cliente', 1, 0, 'C', 1);
                    $pdf->Cell(50, 6, 'Consumidor', 1, 0, 'C', 1);
                    $pdf->Cell(60, 6, 'Fone / CEP', 1, 0, 'C', 1);
                    $pdf->Ln();
                    $pdf->SetFont('');
                    $pdf->Cell(80, 6, $row['nome_cliente'], 1);
                    $pdf->Cell(50, 6, '...', 1);
                    $pdf->Cell(60, 6, '43996624492 / 86.705-560', 1);
                    $pdf->Ln();

                    // Tabela para descrição do pedido
                    $pdf->SetX(10);
                    $pdf->SetFillColor(240, 240, 240);
                    $pdf->SetFont('', 'B');
                    $pdf->Cell(190, 6, 'Descrição Pedido', 1, 0, 'C', 1);
                    $pdf->Ln();
                    $pdf->SetFont('');
                    $pdf->MultiCell(190, 6, $row['descricao_pedido'], 1);
                    $pdf->Ln(10); // Espaçamento entre os clientes

                    $eixo_x = $pdf->GetY();
                }
            }
        }
    }

    // Rodapé
    $pdf->SetXY(10, $pdf->GetY() + 10);
    $pdf->SetFont('', 'I');
    $pdf->writeHTMLCell(0, 0, 10, $pdf->GetY(), "<div style='$headerStyle; text-align: left;'><a href='https://www.exemplo.com' style='$linkStyle'>https://www.exemplo.com</a></div>", 0, 0, false, true, 'L', true);

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
