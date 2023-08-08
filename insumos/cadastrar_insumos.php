<?php

    if(isset($_POST['btn_cadastrar_insumos'])):

        $descricao = addslashes($_POST['descricao']);
        $codigo_produto_digitado = addslashes($_POST['codigo_produto']);
        $codigo_produto = "CInHJ-". $codigo_produto_digitado;
        $observacao = addslashes($_POST['observacao']);
        $custo = addslashes($_POST['custo']); 
        $markup = addslashes($_POST['markup']); 
        $valor = addslashes($_POST['valor']);      
        $unidade = addslashes($_POST['unidade']);
        $codigo_da_fabrica = addslashes($_POST['codigo_da_fabrica']);
        $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
        $imagem = $_FILES['imagem'];
        $ativo = addslashes($_POST['ativo']);

          $dir = "upload/";
          $name_image = $imagem['name'];
          $nameNew_image = uniqid();
          $extensao_image = strtolower(pathinfo($name_image, PATHINFO_EXTENSION));
          $path_image = $dir . $nameNew_image . "." . $extensao_image;
          move_uploaded_file($imagem['tmp_name'], $path_image);

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
          $stmt = $pdo->prepare("INSERT INTO insumos (descricao, codigo_produto, observacao, custo, markup, valor, unidade, codigo_da_fabrica, ultima_alteracao, imagem, ativo) VALUES (:descricao, :codigo_produto, :observacao, :custo, :markup, :valor, :unidade, :codigo_da_fabrica, :ultima_alteracao, :imagem, :ativo)");
          $stmt->bindParam(":descricao", $descricao);
          $stmt->bindParam(":codigo_produto", $codigo_produto);
          $stmt->bindParam(":observacao", $observacao);
          $stmt->bindParam(":custo", $custo);
          $stmt->bindParam(":markup", $markup);
          $stmt->bindParam(":valor", $valor);
          $stmt->bindParam(":unidade", $unidade);
          $stmt->bindParam(":codigo_da_fabrica", $codigo_da_fabrica);
          $stmt->bindParam(":ultima_alteracao", $ultima_alteracao);
          $stmt->bindParam(":imagem", $path_image);
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
