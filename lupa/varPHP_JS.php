<?php
$meuValor = "Olá, mundo!";  // Seu valor em PHP
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Passando Valor de PHP para JavaScript</title>
</head>
<body>

<script>
  // Definindo uma função JavaScript e passando o valor de PHP como parâmetro
  function minhaFuncao(valorPHP) {
    alert(valorPHP);
  }

  // Chamando a função JavaScript com o valor de PHP
  minhaFuncao('<?php echo $meuValor; ?>');
</script>

</body>
</html>
