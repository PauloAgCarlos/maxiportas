<?php
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $selectedIds = json_decode($_POST["selectedIds"]);
    
        if (!empty($selectedIds)) {
            foreach ($selectedIds as $id) {
                echo "Checkbox selecionado com ID: $id<br>";
            }
        } else {
            echo "Nenhum checkbox selecionado.";
        }
    }
    /*if (isset($_POST['btn_enviar_ids'])) {
        // Verifique se o campo 'selectedIds' está definido
        if (isset($_POST["selectedIds"])) {
            // Decodificar a string JSON para obter o array
            $selectedIds = json_decode($_POST["selectedIds"], true);

            // Mostrar os IDs usando var_dump
            echo "<pre/>";
            var_dump($selectedIds);
        }
    }*/
?>