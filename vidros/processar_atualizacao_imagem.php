
<?php
    require_once "../controllers/controllers_vidros.php";

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
            header('Location: visualizar_vidros.php?imagem_invalida');

        }
        else
        {
            
            require_once "../config.php";
            $conection_bd = mysqli_connect($DBHOST, $DBUSER, $DBPASS, $DBNAME);
            $resul = $conection_bd->query("SELECT * FROM vidros WHERE id = $id_atualizar");
            $row_image = $resul->fetch_array();
            unlink($row_image['imagem']);

            $path_image = $dir . $nameNew_image . "." . $extensao_image;
            move_uploaded_file($imagem['tmp_name'], $path_image);
    
            $atualizar_imagem_vidros = new controllers_vidros();
            $atualizar = $atualizar_imagem_vidros->atualizar_imagem_vidros($path_image, $id_atualizar);

            if($atualizar)
            {
                header('Location: visualizar_vidros.php?atualizado');
            }
            else 
            {
                header('Location: atualizar_vidros.php?nao-atualizado');
            }
        }
    endif;
?>