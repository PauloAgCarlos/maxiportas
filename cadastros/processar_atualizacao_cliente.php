<?php
    require_once "../controllers/controllers_clientes.php";

    if(isset($_POST['btn_cadastrar_clientes'])):

        $cnpj = addslashes($_POST['cnpj']);
        $nome = addslashes($_POST['nome']);
        $password = addslashes($_POST['password']);
        $email = addslashes($_POST['email']);
        $atividade_principal = addslashes($_POST['atividade_principal']);
        $endereco = addslashes($_POST['endereco']);
        $abertura = addslashes($_POST['abertura']);
        $porte = addslashes($_POST['porte']);
        $situacao = addslashes($_POST['situacao']);
        $tipo = addslashes($_POST['tipo']);
        $fantasia = addslashes($_POST['fantasia']);
        $natureza_juridica = addslashes($_POST['natureza_juridica']);
        $nivel = addslashes($_POST['nivel']);
        $id_atualizar = $_POST['id_atualizar']; 

        $atualizar_clientes = new controllers_clientes();
        $atualizar = $atualizar_clientes->atualizar_clientes($cnpj, $nome, $password, $email, $atividade_principal, $endereco, $abertura, $porte, $situacao, $tipo, $fantasia, $natureza_juridica, $nivel, $id_atualizar);

        if($atualizar)
        {
            require_once "../config.php";
            $pdo = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $atualizar_clientes = $pdo->prepare("UPDATE logado SET nome = ?, email = ?, senha = ?, atividade_principal = ?, cpf = ?, endereco = ?, abertura = ?, porte = ?, situacao = ?, tipo = ?, fantasia = ?, natureza_juridica = ?, nivel = ? WHERE cpf = ?");
            $atualizar_clientes->bindParam(1, $nome);
            $atualizar_clientes->bindParam(2, $email);
            $atualizar_clientes->bindParam(3, $password);            
            $atualizar_clientes->bindParam(4, $atividade_principal);
            $atualizar_clientes->bindParam(5, $cnpj);
            $atualizar_clientes->bindParam(6, $endereco);
            $atualizar_clientes->bindParam(7, $abertura);
            $atualizar_clientes->bindParam(8, $porte);
            $atualizar_clientes->bindParam(9, $situacao);   
            $atualizar_clientes->bindParam(10, $tipo);         
            $atualizar_clientes->bindParam(11, $fantasia);            
            $atualizar_clientes->bindParam(12, $natureza_juridica);           
            $atualizar_clientes->bindParam(13, $nivel);
            $atualizar_clientes->bindParam(14, $cnpj);
            $atualizar_clientes_sucess = $atualizar_clientes->execute();
            
            //return $atualizar_clientes->execute();

            /*if($tbl_clientes_system->rowCount() > 0)
            {
                $stmt_logado = $pdo->prepare("INSERT INTO `logado` (`id`, `nome`, `email`, `senha`, `atividade_principal`, `cpf`, `endereco`, `abertura`, `porte`, `situacao`, `tipo`, `fantasia`, `natureza_juridica`, `nivel`) VALUES (NULL, :nome, :email, :senha, :atividade_principal, :cpf, :endereco, :abertura, :porte, :situacao, :tipo, :fantasia, :natureza_juridica, :nivel)");
                $stmt_logado->bindParam(':nome', $nome);
                $stmt_logado->bindParam(':email', $email);
                $stmt_logado->bindParam(':senha', $password);
                $stmt_logado->bindParam(':atividade_principal', $atividade_principal);
                $stmt_logado->bindParam(':cpf', $cnpj);
                $stmt_logado->bindParam(':endereco', $endereco);
                $stmt_logado->bindParam(':abertura', $abertura);
                $stmt_logado->bindParam(':porte', $porte);
                $stmt_logado->bindParam(':situacao', $situacao);
                $stmt_logado->bindParam(':tipo', $tipo);
                $stmt_logado->bindParam(':fantasia', $fantasia);
                $stmt_logado->bindParam(':natureza_juridica', $natureza_juridica);
                $stmt_logado->bindParam(':nivel', $nivel);
                $stmt_logado->execute();
            }*/

            header('Location: visualizar_clientes.php?atualizado');
            // echo $id_atualizar;
        }
        else 
        {
            header('Location: atualizar_clientes.php?nao-atualizado');
        }
    endif;

?>
