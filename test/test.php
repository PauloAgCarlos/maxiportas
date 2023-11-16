<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>ID:</th>
            <th>Cliente</th>
        </tr>
    </thead>
    <tbody>  
        <?php
            require_once "../conexao-bd.php";

            require_once "../controllers/controllers_pedidos_dos_clientes.php";
            $pedidos_dos_clientes = new controllers_pedidos_dos_clientes();
            $result_pedidos = $pedidos_dos_clientes->selecionar_pedidos_dos_clientes();  
            foreach($result_pedidos as $row_pedidos){ 
        ?>
        <tr>
            <td>
                <form id="selectForm">
                    <?php    
                        echo '<input type="checkbox" name="selectedItems[]" value="' . $row_pedidos['id'] . '"> ' . $row_pedidos['id'] . '<br>';
                    ?>
                </form>
            </td>
            <td>
                <?php echo  $row_pedidos['nome_cliente']; ?>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>

    <form id="resultForm" action="testPHP.php" method="post">
        <input type="hidden" id="selectedIds" name="selectedIds">
        <button type="submit">Enviar para processamento</button>
    </form>

    <script>
        const checkboxes = document.querySelectorAll("#selectForm input[type='checkbox']");
        const selectedIdsInput = document.getElementById("selectedIds");

        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener("change", updateSelectedIds);
        });

        function updateSelectedIds() {
            const selectedCheckboxes = Array.from(checkboxes).filter((checkbox) => checkbox.checked);
            const selectedIds = selectedCheckboxes.map((checkbox) => checkbox.value);

            selectedIdsInput.value = JSON.stringify(selectedIds);
        }
    </script>
</body>
</html>