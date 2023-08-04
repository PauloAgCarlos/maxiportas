<?php
    require_once "../controllers/controllers_clientes.php";

    if(isset($_POST['btn_cadastrar_clientes'])):

        $cpf_cnpj = addslashes($_POST['cpfcnpj']);
        $nome_razao_social = addslashes($_POST['nomerazaosocial']);
        $contato = addslashes($_POST['contato']);
        $telefone = addslashes($_POST['telefone']);
        $celular = addslashes($_POST['celular']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $cep = addslashes($_POST['cep']);
        $rua = addslashes($_POST['rua']);
        $complemento = addslashes($_POST['complemento']);
        $bairro = addslashes($_POST['bairro']);
        $cidade = addslashes($_POST['cidade']);
        $numero = addslashes($_POST['numero']);        
        $estado = addslashes($_POST['estado']);
        $id_atualizar = $_POST['id_atualizar']; 
    

        $atualizar_clientes = new controllers_clientes();
        $atualizar = $atualizar_clientes->atualizar_clientes($cpf_cnpj, $nome_razao_social, $contato, $telefone, $celular, $email, $senha, $cep, $rua, $numero, $complemento, $bairro, $cidade, $estado, $id_atualizar);

        if($atualizar)
        {
            header('Location: visualizar_clientes.php?atualizado');
            // echo $id_atualizar;
        }
        else 
        {
            header('Location: atualizar_clientes.php?nao-atualizado');
        }
    endif;

?>
