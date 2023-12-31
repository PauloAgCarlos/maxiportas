<?php 
  if(isset($_POST['btn_cadastrar_tintas'])):

    $descricao = addslashes($_POST['descricao']);
    $codigo_produto = addslashes($_POST['codigo_produto']);
    $unidade = addslashes($_POST['unidade']);     
    $custo = addslashes($_POST['custo']);
    $codigo_da_fabrica = addslashes($_POST['codigo_da_fabrica']);
    $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
    $ativo = addslashes($_POST['ativo']);
        
    // Configurações do banco de dados
    require_once "../config.php";

    try {
        // Conexão com o banco de dados usando PDO
        $pdo = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta para inserir o usuário na tabela
        $stmt = $pdo->prepare("INSERT INTO tintas (descricao, codigo_produto, unidade, custo, codigo_da_fabrica, ultima_alteracao, ativo) VALUES (:descricao, :codigo_produto, :unidade, :custo, :codigo_da_fabrica, :ultima_alteracao, :ativo)");
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":codigo_produto", $codigo_produto);
        $stmt->bindParam(":unidade", $unidade);     
        $stmt->bindParam(":custo", $custo);
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
  