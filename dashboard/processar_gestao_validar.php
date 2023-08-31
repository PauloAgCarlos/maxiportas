<?php
    require_once "../controllers/controllers_pedidos_dos_clientes.php";

    if(isset($_POST['btn_validar_pedido'])):

        $data_final = addslashes($_POST['data_final']);
        $id_gestao_pedido = addslashes($_POST['id_atualizar']);
        $status = addslashes($_POST['status']);
        $produto_servico = addslashes($_POST['produto_servico']);
        $quantidade_produto_servico = addslashes($_POST['quantidade_produto_servico']);
        $nome_responsavel = addslashes($_POST['responsavel']);        

        // if($produto_servico == '')

        
        //Começa AQui        
        $host = "localhost";
        $user = "root";
        $password = "";
        $bd_name = "maxportas";
        try
        {
            $conn = new PDO("mysql:host=$host;dbname=" . $bd_name, $user, $password);
        }
        catch(PDOException $error)
        {
            die("Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado: " . $error->getMessage());
        }

        //Travessas
        $result_travessas = $conn->prepare("SELECT descricao FROM travessas ORDER BY id DESC");
        $result_travessas->execute();
        // $row_travessa = [];
        $row_travessa = $result_travessas->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<pre>";
        var_dump($row_travessa);
        //Termina Aqui




        echo "<hr>";
        if(in_array($produto_servico, $row_travessa))
        {
            //Se existir vai atualizar quantidade = :quantidade_produto_servico WHERE descricao = $produto_servico
            echo "Exite";
        }else {
            echo "Não";
        }
        
        die();
        //Last Travessas

        $gestao_pedido = new controllers_pedidos_dos_clientes();
        $atualizar = $gestao_pedido->atualizar_pedidos_dos_clientes($data_final, $status, $nome_responsavel, $id_gestao_pedido);
        if($atualizar)
        {
            header('Location: dashboard.php?atualizado');
        }
        else 
        {
            header('Location: dashboard.php?nao-atualizado');
        }
        
    endif;