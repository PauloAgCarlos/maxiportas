<?php

    if(isset($_POST['btn_cadastrar_calendario'])):

        $ano_mes = addslashes($_POST['ano_mes']);
        $dias_uteis = addslashes($_POST['dias_uteis']);

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
          $stmt = $pdo->prepare("INSERT INTO calendario (ano_mes, dias_uteis) VALUES (:ano_mes, :dias_uteis)");
          $stmt->bindParam(":ano_mes", $ano_mes);
          $stmt->bindParam(":dias_uteis", $dias_uteis);
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
