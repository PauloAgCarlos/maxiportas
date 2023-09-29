<?php
require_once('./TCPDF-main/tcpdf.php');

// Função para criar o PDF
function criarPDF($nomeUsuario, $emailUsuario) {
    $pdf = new TCPDF();

    $pdf->SetMargins(5, 10, 5, 0);
    $pdf->AddPage();

    // Defina o conteúdo do PDF
    $header = '
    <table style="border: 1px solid #ccc; padding: 10px;">
        <tr>
            <td style="text-align: left;"><img src="../img/logoHJ-Aluminio.jpg" alt="Logotipo" width="100px"></td>
        </tr>
    </table>
    ';

    // Escreva o conteúdo no PDF
    $pdf->writeHTML($header, true, false, true, false, '');

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pdf_gpt";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
    $id = 19;
    if(empty($id))
    {
        header('Location: ordem_producao.php?vazio');
    }
    $sql = "SELECT nome, caminho FROM arquivos WHERE id = $id";
    $result = $conn->query($sql);

    // Inicializa uma variável para armazenar os dados dos arquivos
    $arquivos = array();

    if ($result->num_rows > 0) {
        // Preenche o array com os dados dos arquivos
        while ($row = $result->fetch_assoc()) {
            $arquivos[] = array('nome' => $row['nome'], 'caminho' => $row['caminho']);
        }
    }
    // if(isset($_POST['btn_submit']))
    $btn_submit = $_POST['btn_submit'];
    foreach ($arquivos as $arquivo) {
        $pdf->Cell(0, 10, $arquivo['nome']. '___' . $arquivo['caminho'] , 0, true, 'L', 0, '', 0, false, 'T', 'M'); 
    
        // Defina o conteúdo do PDF
        $content = '
        <h1 style="text-align: center;">Conteúdo do PDF</h1>
        <p> ' . $arquivo['nome'] . ' ' . $btn_submit . ' Aqui vai o conteúdo do PDF</p>
        ';
    }

    // Escreva o conteúdo no PDF
    $pdf->writeHTML($content, true, false, true, false, '');
    
    // Defina o rodapé
    $rodape = '
    <table style="width: 100%; border: 1px solid #ddd; padding: 10px; margin: 0 !important;">
        <tr>
            <td style="text-align: left;"><img src="../img/logoHJ-Aluminio.jpg" alt="Logotipo" width="100" style="margin-top: 100px;"></td>
            <td style="text-align: right;">
                <strong>Dados do Usuário</strong><br>
                Nome: ' . $nomeUsuario . '<br>
                Email: ' . $emailUsuario . '
            </td>
            <td style="text-align: center;">
                <strong>Dados do Usuário</strong><br>
                Nome: ' . $nomeUsuario . '<br>
                Email: ' . $emailUsuario . '
            </td>
        </tr>
    </table>
    ';
    $pdf->SetY(257);  // Posiciona a 15 unidades a partir do final da página (para o rodapé)
    $pdf->writeHTML($rodape, true, false, true, false, '');

    // Nome do arquivo
    $nomeArquivo = 'hjaluminio.pdf';
    $destino = 'I';

    ob_clean();

    // Gere o PDF
    $pdf->Output($nomeArquivo, $destino);
}

$idDoSeuDado = 123;
$nomeUsuario = "Exemplo Nome";
$emailUsuario = "exemplo@dominio.com";

// Chame a função para criar o PDF
criarPDF($nomeUsuario, $emailUsuario);
?>