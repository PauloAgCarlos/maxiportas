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
?>
