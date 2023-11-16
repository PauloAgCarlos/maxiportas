<?php
    require_once "../controllers/controllers_calendario.php";

    if(isset($_POST['btn_atualizar_calendario'])):

        $ano_mes = addslashes($_POST['ano_mes']);
        $dias_uteis = addslashes($_POST['dias_uteis']);
        $id_atualizar = $_POST['id_atualizar'];        

        $controllers_calendario = new controllers_calendario();
        $atualizar = $controllers_calendario->atualizar_calendario($ano_mes, $dias_uteis, $id_atualizar);
        if($atualizar)
        {
            header('Location: visualizar_calendario.php?atualizado');
        }
        else 
        {
            header('Location: atualizar_calendario.php?nao-atualizado');
        }
    endif;
?>