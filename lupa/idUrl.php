<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulários com ID</title>
</head>
<body>

<h2>Formulário 1</h2>
<?php $id = uniqid(); ?>

<form id="form1">
  <label for="nome">Nome:</label>
  <input type="text" id="nome" name="nome"><br><br>
  <button type="button" onclick="enviarForm1('<?php echo $id; ?>')">Enviar Formulário 1</button>
</form>

<h2>Formulário 2</h2>
<form id="form2">
  <label for="idDoForm1">ID do Formulário 1:</label>
  <input type="text" id="idDoForm1" name="idDoForm1" readonly><br><br>
  <label for="outroCampo">Outro Campo:</label>
  <input type="text" id="outroCampo" name="outroCampo"><br><br>
  <button type="submit">Enviar Formulário 2</button>
</form>

<script>
  function enviarForm1(id_parm) {
    // Simulando o envio e obtenção de um ID
    const idDoForm1 = id_parm;  // Substitua isso pela lógica real para obter o ID

    // Define o ID do Formulário 1 no campo correspondente no Formulário 2
    document.getElementById("idDoForm1").value = idDoForm1;
  }
</script>

</body>
</html>
















<!-- <!DOCTYPE html>
<html>
<head>
  <title>Exemplo de Botão</title>
</head>
<body>

<button id="seuBotao">Clique para Enviar ID</button>
<br>

<php
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
</html> -->
