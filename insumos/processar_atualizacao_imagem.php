
<?php
    require_once "../controllers/controllers_insumos.php";

    if(isset($_POST['btn_atualizar_imagem'])):
        
        $id_atualizar = $_POST['id_atualizar'];        

        $imagem = $_FILES['imagem'];
        $dir = "upload/";
        $name_image = $imagem['name'];
        $nameNew_image = uniqid();
        $extensao_image = strtolower(pathinfo($name_image, PATHINFO_EXTENSION));
        $formatos_permitidos = array("png", "jpeg", "jpg");
        if(!in_array($extensao_image, $formatos_permitidos))
        {
            header('Location: visualizar_insumos.php?imagem_invalida');

        }
        else
        {
            
            require_once "../config.php";
            $conection_bd = mysqli_connect($DBHOST, $DBUSER, $DBPASS, $DBNAME);
            $resul = $conection_bd->query("SELECT * FROM insumos WHERE id = $id_atualizar");
            $row_image = $resul->fetch_array();
            unlink($row_image['imagem']);

            $path_image = $dir . $nameNew_image . "." . $extensao_image;
            move_uploaded_file($imagem['tmp_name'], $path_image);
    
            $atualizar_imagem_insumos = new controllers_insumos();
            $atualizar = $atualizar_imagem_insumos->atualizar_imagem_insumos($path_image, $id_atualizar);

            if($atualizar)
            {
                header('Location: visualizar_insumos.php?atualizado');
            }
            else 
            {
                header('Location: atualizar_insumos.php?nao-atualizado');
            }
        }
    endif;
?>