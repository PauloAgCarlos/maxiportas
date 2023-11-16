<?php 
  if(isset($_POST['btn_cadastrar_unidades_de_produto'])):

    $descricao = addslashes($_POST['descricao']);
    $codigo_produto = addslashes($_POST['codigo_produto']);
    $codigo_interno = addslashes($_POST['codigo_interno']);
    $abreviacao = addslashes($_POST['abreviacao']);
    $ultima_alteracao = addslashes($_POST['ultima_alteracao']);    
    $ativo = addslashes($_POST['ativo']);
        
    // Configurações do banco de dados
    require_once "../config.php";

    try {
        // Conexão com o banco de dados usando PDO
        $pdo = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta para inserir o usuário na tabela
        $stmt = $pdo->prepare("INSERT INTO unidades_de_produto (descricao, codigo_produto, codigo_interno, abreviacao, ultima_alteracao, ativo) VALUES (:descricao, :codigo_produto, :codigo_interno, :abreviacao, :ultima_alteracao, :ativo)");
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":codigo_produto", $codigo_produto);
        $stmt->bindParam(":codigo_interno", $codigo_interno);
        $stmt->bindParam(":abreviacao", $abreviacao);
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
            $erro = $e->getMessage();
            echo $erro;
            die();
            ?>
            <!-- <script>
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
            </script> -->
      <?php  }

  endif;
?>
  