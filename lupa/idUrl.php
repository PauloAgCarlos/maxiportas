<!DOCTYPE html>
<html>
<head>
  <title>Exemplo de Botão</title>
</head>
<body>

<button id="seuBotao">Clique para Enviar ID</button>
<br>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo 'ID recebido: ' . $id;
} else {
    echo 'ID não recebido.';
}
?>


<script>
  // Função para lidar com o clique no botão
  function handleButtonClick(id) {
    // Redirecionar para a URL com o ID
    window.location.href = 'idUrl.php?id=' + id;
  }

  // Exemplo de uso: associar essa função a um botão
  var idDoSeuDado = 123; // Substitua pelo ID real que você quer enviar
  var seuBotao = document.getElementById('seuBotao'); // Substitua pelo seu elemento real
  seuBotao.addEventListener('click', function() {
    handleButtonClick(idDoSeuDado);
  });
</script>

</body>
</html>
