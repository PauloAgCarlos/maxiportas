<?php

    if(isset($_POST['btn_cadastrar_dobradicas'])):

        $descricao = addslashes($_POST['descricao']);
        $codigo_produto = addslashes($_POST['codigo_produto']);
        $quantidade = addslashes($_POST['quantidade']);
        $medida_inicial = addslashes($_POST['medida_inicial']); 
        $medida_final = addslashes($_POST['medida_final']); 
        $quantidade_de_furos = addslashes($_POST['quantidade_de_furos']);      
        $distancia_primeiro_furo = addslashes($_POST['distancia_primeiro_furo']);
        $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
        $ativo = addslashes($_POST['ativo']);

        // Configurações do banco de dados
      require_once "../config.php";

      try {
          // Conexão com o banco de dados usando PDO
          $pdo = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          // Consulta para inserir o usuário na tabela
          $stmt = $pdo->prepare("INSERT INTO dobradicas (descricao, codigo_produto, quantidade, medida_inicial, medida_final, quantidade_de_furos, distancia_primeiro_furo, ultima_alteracao, ativo) VALUES (:descricao, :codigo_produto, :quantidade, :medida_inicial, :medida_final, :quantidade_de_furos, :distancia_primeiro_furo, :ultima_alteracao, :ativo)");
          $stmt->bindParam(":descricao", $descricao);
          $stmt->bindParam(":codigo_produto", $codigo_produto);
          $stmt->bindParam(":quantidade", $quantidade);
          $stmt->bindParam(":medida_inicial", $medida_inicial);
          $stmt->bindParam(":medida_final", $medida_final);
          $stmt->bindParam(":quantidade_de_furos", $quantidade_de_furos);
          $stmt->bindParam(":distancia_primeiro_furo", $distancia_primeiro_furo);
          $stmt->bindParam(":ultima_alteracao", $ultima_alteracao);
          $stmt->bindParam(":ativo", $ativo);
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
