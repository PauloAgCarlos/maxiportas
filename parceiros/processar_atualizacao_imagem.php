
<?php
    require_once "../controllers/controllers_parceiros.php";

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
            header('Location: visualizar_parceiros.php?imagem_invalida');

        }
        else
        {
            
            $servername = "localhost";
            $user = "root";
            $senha = "";
            $bdn = "maxportas";
            $conection_bd = mysqli_connect($servername, $user, $senha, $bdn);
            $resul = $conection_bd->query("SELECT * FROM parceiros WHERE id = $id_atualizar");
            $row_image = $resul->fetch_array();
            unlink($row_image['imagem']);

            $path_image = $dir . $nameNew_image . "." . $extensao_image;
            move_uploaded_file($imagem['tmp_name'], $path_image);
    
            $atualizar_imagem_parceiros = new controllers_parceiros();
            $atualizar = $atualizar_imagem_parceiros->atualizar_imagem_parceiros($path_image, $id_atualizar);

            if($atualizar)
            {
                header('Location: visualizar_parceiros.php?atualizado');
            }
            else 
            {
                header('Location: atualizar_parceiros.php?nao-atualizado');
            }
        }
    endif;
?>