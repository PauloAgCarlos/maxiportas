<?php

    if(isset($_POST['btn_cadastrar_esquadretas'])):

        $descricao = addslashes($_POST['descricao']);
        $observacao = addslashes($_POST['observacao']);
        $custo_metro = addslashes($_POST['custo_metro']);
        $markup = addslashes($_POST['markup']);  
        $valor_unitario = addslashes($_POST['valor_unitario']);      
        $agregar = addslashes($_POST['agregar']);
        $codigo_produto_digitado = addslashes($_POST['codigo_produto']);
        $codigo_produto = "CEsHJ-" . $codigo_produto_digitado;
        // $codigo_unico = uniqid();
        // $codigo_produto = "CEsHJ-". substr($codigo_unico, 10);
        $unidade = addslashes($_POST['unidade']);
        $imagem = $_FILES['imagem'];
        $codigo_da_fabrica = addslashes($_POST['codigo_da_fabrica']);
        $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
        $ativo = addslashes($_POST['ativo']);

          $dir = "upload/";
          $name_image = $imagem['name'];
          $nameNew_image = uniqid();
          $extensao_image = strtolower(pathinfo($name_image, PATHINFO_EXTENSION));
          $path_image = $dir . $nameNew_image . "." . $extensao_image;
          move_uploaded_file($imagem['tmp_name'], $path_image);

        // Configurações do banco de dados
      require_once "../config.php";

      try {
          // Conexão com o banco de dados usando PDO
          $pdo = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          // Consulta para inserir o usuário na tabela
          $stmt = $pdo->prepare("INSERT INTO esquadretas (descricao, observacao, custo_metro, markup, valor_unitario, agregar, codigo_produto, unidade, imagem, codigo_da_fabrica, ultima_alteracao, ativo) VALUES (:descricao, :observacao, :custo_metro, :markup, :valor_unitario, :agregar, :codigo_produto, :unidade, :imagem, :codigo_da_fabrica, :ultima_alteracao, :ativo)");
          $stmt->bindParam(":descricao", $descricao);
          $stmt->bindParam(":observacao", $observacao);
          $stmt->bindParam(":custo_metro", $custo_metro);
          $stmt->bindParam(":markup", $markup);
          $stmt->bindParam(":valor_unitario", $valor_unitario);
          $stmt->bindParam(":agregar", $agregar);
          $stmt->bindParam(":codigo_produto", $codigo_produto);
          $stmt->bindParam(":unidade", $unidade);
          $stmt->bindParam(":imagem", $path_image);
          $stmt->bindParam(":codigo_da_fabrica", $codigo_da_fabrica);
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
