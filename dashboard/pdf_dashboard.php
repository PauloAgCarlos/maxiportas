<?php
require_once('./TCPDF-main/tcpdf.php');

// Função para criar o PDF
function criarPDF($idUsuario, $emailUsuario) {
    $pdf = new TCPDF();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "maxportas";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
    $id = $_POST['idOculto'];
    // echo $id; die();
    if(empty($id))
    {
        header('Location: dashboard.php?vazio');
    }
    $sql = "SELECT * FROM pedidos_dos_clientes WHERE id = '$id'";
    $result = $conn->query($sql);

    // Inicializa uma variável para armazenar os dados dos pedidos_dos_clientes
    $pedidos_dos_clientes = array();


    $pdf->SetMargins(5, 10, 5, 0);
    $pdf->AddPage();

    // Defina o conteúdo do PDF
    $header = '
    <table style="border: 1px solid #ccc; padding: 10px;">
        <tr>
            <td style="text-align: left;"><img src="../assets/img/logoHJ-Aluminio.jpg" alt="Logotipo" width="100px"></td>
        </tr>
    </table>
    ';

    // Escreva o conteúdo no PDF
    $pdf->writeHTML($header, true, false, true, false, '');

    if ($result->num_rows > 0) {
        // Preenche o array com os dados dos pedidos_dos_clientes
        while ($row = $result->fetch_assoc()) {
            $pedidos_dos_clientes[] = array('id' => $row['id'], 'cliente' => $row['cliente']);
        }
    }
    if(isset($_POST['btn_submit']) && $_POST['btn_submit'] == 'Sintético - Cliente')
    {
        $btn_submit = $_POST['btn_submit'];
        foreach ($pedidos_dos_clientes as $arquivo) {
            // $pdf->Cell(0, 10, $arquivo['id']. '___' . $arquivo['cliente'] , 0, true, 'L', 0, '', 0, false, 'T', 'M'); 
        
            // Defina o conteúdo do PDF
            $content = '
            <h1 style="text-align: center;">Conteúdo do PDF</h1>
            <p> ' . $arquivo['id'] . ' ' . $btn_submit .'___'. $id . ' Sintético - Cliente</p>
            ';
        }
        // Escreva o conteúdo no PDF
        $pdf->writeHTML($content, true, false, true, false, '');
    }elseif(isset($_POST['btn_submit']) && $_POST['btn_submit'] == 'Sintético 3 - Cliente')
    {
        $btn_submit = $_POST['btn_submit'];
        foreach ($pedidos_dos_clientes as $arquivo) {
            $pdf->Cell(0, 10, $arquivo['id']. '___' . $arquivo['cliente'] , 0, true, 'L', 0, '', 0, false, 'T', 'M'); 
        
            // Defina o conteúdo do PDF
            $content = '
            <h1 style="text-align: center;">Conteúdo do PDF</h1>
            <p> ' . $arquivo['id'] . ' ' . $btn_submit .'___'. $id . ' Sintético 3 - Cliente</p>
            ';
        }
        // Escreva o conteúdo no PDF
        $pdf->writeHTML($content, true, false, true, false, '');
    }

    
    
    // Defina o rodapé
    $rodape = '
    <table style="width: 100%; border: 1px solid #ddd; padding: 10px; margin: 0 !important;">
        <tr>
            <td style="text-align: left;"><img src="../assets/img/logoHJ-Aluminio.jpg" alt="Logotipo" width="100" ></td>
            <td style="text-align: right;">
                <strong>Dados do Usuário</strong><br>
                id: ' . $idUsuario . '<br>
                Email: ' . $emailUsuario . '
            </td>
            <td style="text-align: center;">
                <strong>Dados do Usuário</strong><br>
                id: ' . $idUsuario . '<br>
                Email: ' . $emailUsuario . '
            </td>
        </tr>
    </table>
    ';
    $pdf->SetY(238);  // Posiciona a 15 unidades a partir do final da página (para o rodapé)
    $pdf->writeHTML($rodape, true, false, true, false, '');

    // id do arquivo
    $idArquivo = 'hjaluminio.pdf';
    $destino = 'I';

    ob_clean();

    // Gere o PDF
    $pdf->Output($idArquivo, $destino);
}

$idDoSeuDado = 123;
$idUsuario = "Exemplo id";
$emailUsuario = "exemplo@dominio.com";

// Chame a função para criar o PDF
criarPDF($idUsuario, $emailUsuario);
?>