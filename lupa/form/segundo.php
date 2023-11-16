<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário 2</title>
</head>
<body>
  <h1>Formulário 2</h1>
  <?php
  // Verificar se o ID foi passado
  if (isset($_POST['btn'])) {
    $id_filter = $_POST['id_filter'];
    if(empty($id_filter))
    {
        header('Location: index.php?vazio');
    }
    $nome = $_POST['nome'];
    echo "<p>$id_filter Nome recebido do primeiro formulário: $nome</p>";
  } else {
    echo "<p>ID não recebido.</p>";
  }
  ?>
</body>
</html>