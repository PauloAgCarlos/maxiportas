<?php
    require_once "../controllers/controllers_parceiros.php";

    if(isset($_POST['btn_atualizar_parceiros'])):

        $razaosocial = addslashes($_POST['razaosocial']);
        $nomefantasia = addslashes($_POST['nomefantasia']);
        $complemento = addslashes($_POST['complemento']);
        $cidade = addslashes($_POST['cidade']);
        $endreco = addslashes($_POST['endreco']);
        $email = addslashes($_POST['email']);
        $instagram = addslashes($_POST['instagram']);
        $facebook = addslashes($_POST['facebook']);
        $codigointerno = addslashes($_POST['codigointerno']);
        $bairro = addslashes($_POST['bairro']);
        $cnpj = addslashes($_POST['cnpj']);
        $cep = addslashes($_POST['cep']);
        $uf = addslashes($_POST['uf']);        
        $ie = addslashes($_POST['ie']);
        $numero = addslashes($_POST['numero']);
        $telefone = addslashes($_POST['telefone']);
        $id_atualizar = $_POST['id_atualizar'];        

        $controllers_parceiros = new controllers_parceiros();
        $atualizar = $controllers_parceiros->atualizar_parceiros($razaosocial, $nomefantasia, $complemento, $cidade, $endreco, $email, $instagram, $facebook, $codigointerno, $bairro, $cnpj, $cep, $uf, $ie, $numero, $telefone, $id_atualizar);

        if($atualizar)
        {
            header('Location: visualizar_parceiros.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_parceiros.php?nao-atualizado');
        }
    endif;
?>