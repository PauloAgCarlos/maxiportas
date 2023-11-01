<?php
require_once('./TCPDF-main/tcpdf.php');

// Função para criar o PDF
function criarPDF($id_uniqUsuario, $emailUsuario) {
    $pdf = new TCPDF();

    $pdf->SetMargins(5, 10, 5, 0);
    $pdf->AddPage();
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


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "maxportas";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
    $id = json_decode($_POST["selectedIds"]);
    /*echo "<pre>";
    var_dump($id);
    die();*/
    // echo $id_uniq; die();
    if(empty($id))
    {
        header('Location: dashboard.php?vazio');
    }else
    {
        $eixo_x = 33;
        $posicao = 0;

        //for($c = 0; $c < count($id); $c++){
            ///echo $row_id;
            
            foreach($id as $row_id)
            {
                /*echo "<pre/>";
                var_dump($id);
                die();*/
                
                $sql = "SELECT * FROM pedidos_dos_clientes WHERE id = $row_id";
                $result = $conn->query($sql);
                $pedidos_dos_clientes = array();
                //echo $row_id;

                // Altura do rodapé
                $header_height = 26;

                if ($result->num_rows > 0) {
                    // Preenche o array com os dados dos pedidos_dos_clientes
                    while ($row = $result->fetch_assoc()) {
                        $pedidos_dos_clientes[] = array('id' => $row['id'], 'nome_cliente' => $row['nome_cliente'], 'descricao_pedido' => $row['descricao_pedido'], 'data_inicial' => $row['data_inicial'], 'data_final' => $row['data_final'], 'garantia' => $row['garantia'], 'status' => $row['status'], 'nome_responsavel' => $row['nome_responsavel'],);

                            if(isset($_POST['btn_submit']) && $_POST['btn_submit'] == 'PDF Cliente')
                            {
                                foreach ($pedidos_dos_clientes as $row_odermproducao) 
                                {
                                    $btn_submit = $_POST['btn_submit'];
                                    //Repetição

                                    //$segundoHeader_bottom_margin = 239;
                                    $segundoHeader_height = 20;
                                    $pdf->setY(-$segundoHeader_height - $segundoHeader_bottom_margin);
                                    // Borda
                                    $pdf->Rect(5, $eixo_x, $pdf->getPageWidth() - 10, $segundoHeader_height);
                                    // Content
                                    $pdf->writeHTMLCell(0, 0, 6, $eixo_x + 1, '<div style="font-size: 10px;"><strong>Cliente: </strong>'.$row['nome_cliente'].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>
                                    <br><strong>Consumidor</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Fone: </strong>43996624492
                                    <br><strong>Endereço: </strong>&nbsp;RUA AAA<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CEP:</strong> 86.705-560
                                    <br><strong>Bairro: </strong>VILA SAMPAIO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Cidade: </strong>ARAPONGAS-PR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>CNPJ/CPF: </strong>41.337.530/0001-07</div>');
                                    // Last segundoHeader

                                    $terceira_borda = 48;
                                    // Borda
                                    $pdf->Rect(5, $eixo_x, $pdf->getPageWidth() - 10, $terceira_borda);
                                    $pdf->writeHTMLCell(0, 0, 8, $eixo_x + 21, '<div style="font-size: 10px;"><strong>Descrição Pedido: </strong>'.$row['descricao_pedido'].'<strong>Data Inicial: </strong>'.$row['data_inicial'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Data Final: </strong>'.$row['data_final'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Garantia: </strong>'.$row['garantia'].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Status: </strong>'.$row['status'].'<br><strong>Nome Responsavel: </strong>'.$row['nome_responsavel'].'</div>');

                                    $posicao += 1;
                                    $eixo_x += 57;

                                    //Last Repetição                                
                                    
                                    // Desative o corte automático de página
                                    /*if(count($id) <= 4)
                                    {
                                        $pdf->SetAutoPageBreak(false, 0);
                                    }*/
                                    if($posicao == 2)
                                    {
                                        $borda = 900;

                                        $terceira_borda = 48;
                                        // Borda
                                        $pdf->Rect(5, $eixo_x, $pdf->getPageWidth() - 10, $terceira_borda);
                                        $pdf->writeHTMLCell(0, 0, 8, $eixo_x + 21, '<div style="font-size: 10px;"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>');
                                        /*$pdf->writeHTMLCell(0, 0, 8, $eixo_x + 24, '<div style="font-size: 10px;"><strong>Desctgttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt</div>');*/
                                    }

                                    $pdf->writeHTMLCell(0, 0, 5, 290, '<div style="font-size: 10px; text-align: left;"><a href="https://www.exemplo.com" style=" color: #000;">https://www.exemplo.com</a></div>', 0, 0, false, true, 'L', true);
                                }

                            }
                        } 
                    }
            }
        //}
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