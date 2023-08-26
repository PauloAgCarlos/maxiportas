<?php

    if(isset($_POST['btn_cadastrar_classificacao_de_clientes'])):

        $descricao = addslashes($_POST['descricao']);
        $codigo_produto_digitado = addslashes($_POST['codigo_produto']);
        $codigo_produto = "CClassClien-". $codigo_produto_digitado;

        // Configurações do banco de dados
      $dbHost = "localhost";
      $dbName = "maxportas";
      $dbUsuario = "root";
      $dbSenha = "";

      try {
          // Conexão com o banco de dados usando PDO
          $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsuario, $dbSenha);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          // Consulta para inserir o usuário na tabela
          $stmt = $pdo->prepare("INSERT INTO classificacao_de_clientes (descricao, codigo_produto) VALUES (:descricao, :codigo_produto)");
          $stmt->bindParam(":descricao", $descricao);
          $stmt->bindParam(":codigo_produto", $codigo_produto);
          $stmt->execute();

          if($stmt)
          { ?>

            <script>
              const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
              didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
              }
              })

              Toast.fire({
              icon: 'success',
              title: 'Cadastrado Com Sucesso!'
              })
            </script>

          <?php }
          exit();
      
          } catch (PDOException $e) {
          $erro = $e->getMessage(); ?>
          <script>
            const Toaste = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toaste.fire({
            icon: 'error',
            title: 'Erro ao Cadastradrar!'
            })
          </script>
    <?php  }
     
  endif;

?>
