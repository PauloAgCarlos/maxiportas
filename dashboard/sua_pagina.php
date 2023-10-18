<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button onclick="enviarIdAJAX(123)">Enviar ID</button>

</body>
</html>

<script>
        function enviarIdAJAX(id) {
            // Cria um objeto XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // Define a função a ser chamada quando a requisição for concluída
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // A requisição foi bem-sucedida, faça o que quiser com a resposta
                        console.log('Resposta do servidor:', xhr.responseText);
                    } else {
                        // Ocorreu um erro na requisição
                        console.error('Erro na requisição:', xhr.status);
                    }
                }
            };

            // Abre uma requisição GET assíncrona para sua_pagina.php, passando o ID como parâmetro
            xhr.open('GET', 'sua_pagina.php?id=' + id, true);

            // Envia a requisição
            xhr.send();
        }
    </script>