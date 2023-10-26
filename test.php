<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <form id="selectForm">
    <input type="checkbox" name="item" value="1"> Item 1
    <input type="checkbox" name="item" value="2"> Item 2
    <input type="checkbox" name="item" value="3"> Item 3
    <input type="checkbox" name="item" value="4"> Item 4
    <input type="checkbox" name="item" value="5"> Item 5
    </form>

    <form id="resultForm" method="post">
    <input type="text" id="selectedIds" name="selectedIds">
    <button type="submit" name="btn_enviar_ids">Enviar IDs</button>
    </form>

    <script>
    const checkboxes = document.querySelectorAll("#selectForm input[type='checkbox']");
    const selectedIdsField = document.getElementById("selectedIds");

    checkboxes.forEach(checkbox => {
    checkbox.addEventListener("change", function () {
        // Selecionar todos os checkboxes marcados no primeiro formulário
        const checkedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);
        
        // Extrair os IDs dos checkboxes selecionados
        const selectedIds = checkedCheckboxes.map(checkbox => checkbox.value);
        
        // Definir o valor do campo de input no segundo formulário com os IDs selecionados como uma string JSON
        selectedIdsField.value = JSON.stringify(selectedIds);
    });
    });
    </script>



    <!--form id="selectForm">
    <input type="checkbox" name="item" value="1"> Item 1
    <input type="checkbox" name="item" value="2"> Item 2
    <input type="checkbox" name="item" value="3"> Item 3
    <input type="checkbox" name="item" value="4"> Item 4
    <input type="checkbox" name="item" value="5"> Item 5
    <button type="button" id="submitSelection">Enviar Seleção</button>
    </form>

    <form id="resultForm" method="post">
    <input type="text" id="selectedIds" name="selectedIds">
    <button type="submit" name="btn_enviar_ids">Enviar IDs</button>
    </form-->
    <!--<form id="form1">
        <input type="checkbox" id="checkbox1" value="1"> Checkbox 1
        <input type="checkbox" id="checkbox2" value="2"> Checkbox 2
        <input type="checkbox" id="checkbox3" value="3"> Checkbox 3
    </form>

    <form id="form2">
        <input type="text" id="selectedIds" name="selectedIds">
        <input type="submit" value="Enviar">
    </form>*-->

    <!--script>
        document.getElementById('form1').addEventListener('submit', function(e) {
        e.preventDefault(); // Impede o envio do primeiro formulário

        // Coletar os IDs dos checkboxes selecionados
        const checkboxes = document.querySelectorAll('#form1 input[type=checkbox]:checked');
        const selectedIds = Array.from(checkboxes).map(checkbox => checkbox.value).join(',');

        // Atualizar o campo selectedIds no segundo formulário
        document.getElementById('selectedIds').value = selectedIds;

        // Enviar o segundo formulário
        document.getElementById('form2').submit();
        });
    </script-->
    <script>
        /*document.getElementById("submitSelection").addEventListener("click", function () {
        // Selecionar todos os checkboxes marcados no primeiro formulário
        const checkboxes = document.querySelectorAll("#selectForm input[type='checkbox']:checked");

        // Extrair os IDs dos checkboxes selecionados
        const selectedIds = Array.from(checkboxes).map((checkbox) => checkbox.value);

        // Definir o valor do campo de input no segundo formulário com os IDs selecionados
        document.getElementById("selectedIds").value = selectedIds.join(",");

        // Enviar o segundo formulário (opcional)
        // document.getElementById("resultForm").submit();
        });*/

        document.getElementById("submitSelection").addEventListener("click", function () {
        // Selecionar todos os checkboxes marcados no primeiro formulário
        const checkboxes = document.querySelectorAll("#selectForm input[type='checkbox']:checked");

        // Extrair os IDs dos checkboxes selecionados e armazená-los em um array
        const selectedIds = Array.from(checkboxes).map((checkbox) => checkbox.value);

        // Definir o valor do campo de input no segundo formulário com os IDs selecionados como uma string JSON
        document.getElementById("selectedIds").value = JSON.stringify(selectedIds);

        // Enviar o segundo formulário (opcional)
        // document.getElementById("resultForm").submit();
        });


    </script>

    <?php
        if (isset($_POST['btn_enviar_ids'])) {
            // Verifique se o campo 'selectedIds' está definido
            if (isset($_POST["selectedIds"])) {
                // Decodificar a string JSON para obter o array
                $selectedIds = json_decode($_POST["selectedIds"], true);

                // Mostrar os IDs usando var_dump
                echo "<pre/>";
                var_dump($selectedIds);
            }
        }
    ?>
</body>
</html>
<?php

    /*$array = ['Um', 'Dois', 'Tres'];

    echo "<pre>";
    print_r($array);
    echo "<br>";

    if(in_array('Um',$array))
    {
        echo "Existe";
    }
    else
    {
        echo "Não Existe";
    }*/