<!DOCTYPE html>
<html>
<head>
    <!-- Adicione os links para os arquivos Bootstrap CSS e JavaScript -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- <button id="abrirModalBtn">Abrir Modal</button> -->
    <input type="text" id="campoDeEntrada">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#meuModal">
    Selecionar Valor
    </button>

    <!-- Modal -->
    <div class="modal fade" id="meuModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Selecione um Valor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Insira opções de seleção aqui -->
            <select id="selecionarValor">
            <option value="1">Valor 1</option>
            <option value="2">Valor 2</option>
            <option value="3">Valor 3</option>
            </select>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary" id="selecionarBtn">Selecionar</button>
        </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Quando o botão "Selecionar" no modal é clicado
        document.getElementById('selecionarBtn').addEventListener('click', function() {
            // Obtenha o valor selecionado
            var selectedValue = document.getElementById('selecionarValor').value;
            
            // Defina o valor no campo de entrada
            document.getElementById('campoDeEntrada').value = selectedValue;
            
            // Modifique a URL sem atualizar a página
            history.pushState({ id: selectedValue }, '', '?id=' + selectedValue);
            
            // Feche o modal
            $('#meuModal').modal('hide');
        });

    </script>
    <!-- Botão para abrir o modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Abrir Modal
    </button>

    Modal
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Selecione um Valor</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Opções para seleção
                    <select id="selectValor" class="form-control">
                        <option value="1">Valor 1</option>
                        <option value="2">Valor 2</option>
                        <option value="3">Valor 3</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="selecionarBtn">Selecionar</button>
                </div>
            </div>
        </div>
    </div>

    <form>
        Campo de input para o valor selecionado
        <input type="text" id="valorSelecionado" class="form-control" placeholder="Valor Selecionado">
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="seu-script.js"></script> -->
</body>
</html>



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <button id="abrirModal">Abrir Modal</button>

    Modal
    <div id="meuModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <select id="selecionarValor">
        <option value="1">Opção 1</option>
        <option value="2">Opção 2</option>
        <option value="3">Opção 3</option>
        </select>
        <button id="confirmarSelecao">Confirmar</button>
    </div>
    </div>



    <button id="abrirModal">Abrir Modal</button>

    Modal
    <div id="meuModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <select id="selecionarValor">
        <option value="1">Opção 1</option>
        <option value="2">Opção 2</option>
        <option value="3">Opção 3</option>
        </select>
        <button id="confirmarSelecao">Confirmar</button>
    </div>
    </div>

    Campo de input
    <input type="text" id="campoDeInput" readonly> 

    <button class="meuBotao" data-id="123">Clique para Enviar ID 123</button>
    <button class="meuBotao" data-id="456">Clique para Enviar ID 456</button>
    <button id="meuBotao">Clique para Enviar ID</button>
</body>
    <script>
        // Abre o modal quando o botão é clicado
        document.getElementById('abrirModal').addEventListener('click', function() {
        var modal = document.getElementById('meuModal');
        modal.style.display = 'block';
        });

        // Fecha o modal quando o botão "X" é clicado
        document.querySelector('.modal .close').addEventListener('click', function() {
        var modal = document.getElementById('meuModal');
        modal.style.display = 'none';
        });

        // Envia o ID do valor selecionado para a URL quando o botão "Confirmar" é clicado
        document.getElementById('confirmarSelecao').addEventListener('click', function() {
        var select = document.getElementById('selecionarValor');
        var selectedOption = select.options[select.selectedIndex];
        var id = selectedOption.value;

        // Modifica a URL sem atualizar a página
        history.pushState({ id: id }, '', '?id=' + id);

        // Fecha o modal
        var modal = document.getElementById('meuModal');
        modal.style.display = 'none';

        // Faça o que desejar com o ID aqui
        console.log('ID enviado: ' + id);
        });



        // Abre o modal quando o botão é clicado
        // document.getElementById('abrirModal').addEventListener('click', function() {
        // var modal = document.getElementById('meuModal');
        // modal.style.display = 'block';
        // });

        // // Fecha o modal quando o botão "X" é clicado
        // document.querySelector('.modal .close').addEventListener('click', function() {
        // var modal = document.getElementById('meuModal');
        // modal.style.display = 'none';
        // });

        // // Envia o ID do valor selecionado para o campo de input quando o botão "Confirmar" é clicado
        // document.getElementById('confirmarSelecao').addEventListener('click', function() {
        // var select = document.getElementById('selecionarValor');
        // var selectedOption = select.options[select.selectedIndex];
        // var id = selectedOption.value;

        // // Define o valor no campo de input
        // var campoDeInput = document.getElementById('campoDeInput');
        // campoDeInput.value = id;

        // // Fecha o modal
        // var modal = document.getElementById('meuModal');
        // modal.style.display = 'none';

        // // Faça o que desejar com o ID aqui
        // console.log('ID enviado: ' + id);
        // });



        // Selecione todos os botões com a classe "meuBotao"
        // var botoes = document.querySelectorAll('.meuBotao');

        // // Adicione um ouvinte de evento de clique a cada botão
        // botoes.forEach(function(botao) {
        //     botao.addEventListener('click', function() {
        //         // Obtenha o ID associado ao botão clicado
        //         var id = this.getAttribute('data-id');

        //         // Modifique a URL sem atualizar a página
        //         history.pushState({ id: id }, '', '?id=' + id);

        //         // Faça o que desejar com o ID aqui
        //         console.log('ID enviado: ' + id);
        //     });
        // });

        // document.getElementById('meuBotao').addEventListener('click', function() {
        //     // ID que você deseja enviar
        //     var id = 123; // Substitua 123 pelo seu ID real
            
        //     // Modifica a URL sem atualizar a página
        //     history.pushState({id: id}, '', '?id=' + id);

        //     // Verifica se o navegador suporta a manipulação do histórico
        //     if (typeof (history.pushState) != "undefined") {
        //         var novaURL = window.location.protocol + "//" + window.location.host + window.location.pathname + '?id=' + id;
        //         window.history.pushState({path: novaURL}, '', novaURL);
        //     } else {
        //         // Se o navegador não suportar, você pode redirecionar para a nova URL
        //         window.location.href = novaURL;
        //     }
        // });
    </script>
</html> -->