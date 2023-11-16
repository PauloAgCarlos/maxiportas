<?php

    if(isset($_POST['btn_cadastrar_acessorios'])):

        $descricao = addslashes($_POST['descricao']);
        $codigo_produto = addslashes($_POST['codigo_produto']);
        $quantidade = addslashes($_POST['quantidade']);
        $observacao = addslashes($_POST['observacao']);
        $custo_unitario = addslashes($_POST['custo_unitario']); 
        $markup = addslashes($_POST['markup']); 
        $valor_unitario = addslashes($_POST['valor_unitario']);      
        $unidade = addslashes($_POST['unidade']);
        $tipo_do_acessorio = addslashes($_POST['tipo_do_acessorio']);
        $desconto_corte = addslashes($_POST['desconto_corte']);
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
          $stmt = $pdo->prepare("INSERT INTO acessorios (descricao, codigo_produto, quantidade, observacao, custo_unitario, markup, valor_unitario, unidade, tipo_do_acessorio, desconto_corte, imagem, codigo_da_fabrica, ultima_alteracao, ativo) VALUES (:descricao, :codigo_produto, :quantidade, :observacao, :custo_unitario, :markup, :valor_unitario, :unidade, :tipo_do_acessorio, :desconto_corte, :imagem, :codigo_da_fabrica, :ultima_alteracao, :ativo)");
          $stmt->bindParam(":descricao", $descricao);
          $stmt->bindParam(":codigo_produto", $codigo_produto);
          $stmt->bindParam(":quantidade", $quantidade);
          $stmt->bindParam(":observacao", $observacao);
          $stmt->bindParam(":custo_unitario", $custo_unitario);
          $stmt->bindParam(":markup", $markup);
          $stmt->bindParam(":valor_unitario", $valor_unitario);
          $stmt->bindParam(":unidade", $unidade);
          $stmt->bindParam(":tipo_do_acessorio", $tipo_do_acessorio);
          $stmt->bindParam(":desconto_corte", $desconto_corte);
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
