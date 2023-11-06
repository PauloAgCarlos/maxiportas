<?php
    require_once "../controllers/controllers_basicos_usuarios.php";

    if(isset($_POST['btn_atualizar_basicos_usuarios'])):

        $nome_ususario = addslashes($_POST['nome_ususario']);
        $senha = addcslashes($_POST['senha']);
        $telefone_usuario = addslashes($_POST['telefone_usuario']);
        $email_login = addslashes($_POST['email_login']);
        $libera_xml_pedido = addslashes($_POST['libera_xml_pedido']);
        $libera_painel_producao = addslashes($_POST['libera_painel_producao']);
        $desconto_maximo = addslashes($_POST['desconto_maximo']);        
        $grupo_de_usuarios = addslashes($_POST['grupo_de_usuarios']);
        $observacao = addslashes($_POST['observacao']);
        $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
        $ativo = addslashes($_POST['ativo']);
        $id_atualizar = $_POST['id_atualizar'];      

        $controllers_atualizar_basicos_usuarios = new controllers_basicos_usuarios();
        $atualizar = $controllers_atualizar_basicos_usuarios->atualizar_basicos_usuarios($nome_ususario, $senha, $telefone_usuario, $email_login, $libera_xml_pedido, $libera_painel_producao, $desconto_maximo, $grupo_de_usuarios, $observacao, $ultima_alteracao, $ativo, $id_atualizar);     

        if($atualizar)
        {
            header('Location: visualizar_usuarios.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_usuarios.php?nao-atualizado');
        }
    endif;
?>