<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Processar os dados do primeiro formulário
  $nome = $_POST['nome'];

  // Salvar os dados no banco de dados ou onde for necessário

  // Redirecionar para o segundo formulário com o ID
  header("Location: index.php?nome=$nome");
  exit();
}
?>
