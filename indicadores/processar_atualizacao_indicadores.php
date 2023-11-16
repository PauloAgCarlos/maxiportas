<?php
    require_once "../controllers/controllers_indicadores.php";

    if(isset($_POST['btn_atualizar_indicadores'])):

        $ano_mes = addslashes($_POST['ano_mes']);
        $id_atualizar = $_POST['id_atualizar'];        

        $controllers_indicadores = new controllers_indicadores();
        $atualizar = $controllers_indicadores->atualizar_indicadores($ano_mes, $id_atualizar);
        if($atualizar)
        {
            header('Location: visualizar_indicadores.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_indicadores.php?nao-atualizado');
        }
    endif;
?>