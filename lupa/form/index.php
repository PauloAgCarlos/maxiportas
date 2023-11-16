<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário 1</title>
</head>
<body>
  <h1>Formulário 1</h1>
  <form action="processar.php" method="post">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome">
    <button type="submit">Enviar</button>
  </form>

  <h1>Formulário 2</h1>
  <?php
  // Verificar se o ID foi passado
  if (isset($_GET['nome'])) {
    $nome = $_GET['nome'];
    echo "<p>Nome recebido do primeiro formulário: $nome</p>";
  } else {
    echo "<p>ID não recebido.</p>";
  }
  ?>
  <form action="index.php" method="post">
    <input type="hidden" value="<?php
     if(!empty($_GET['nome'])){
     echo $_GET['nome'];} ?>" required name="id_filter">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome">
    <button type="submit" name="btn">Enviar</button>
  </form>

  <h1>Dados 2</h1>
  <?php
  // Verificar se o ID foi passado
  if (isset($_POST['btn'])) {
    $id_filter = $_POST['id_filter'];
    $nome = $_POST['nome'];
    echo "<p>$id_filter Nome recebido do primeiro formulário: $nome</p>";
  } else {
    echo "<p>ID não recebido.</p>";
  }
  ?>
</body>
</html>
