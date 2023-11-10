<?php 
  if(isset($_POST['btn_cadastrar_parceiros'])):

    $cnpj = addslashes($_POST['cnpj']);
    $nome = addslashes($_POST['nome']);
    $password = addslashes($_POST['password']);
    $email = addslashes($_POST['email']);
    $atividade_principal = addslashes($_POST['atividade_principal']);
    $endereco = addslashes($_POST['endereco']);
    $abertura = addslashes($_POST['abertura']);
    $porte = addslashes($_POST['porte']);
    $situacao = addslashes($_POST['situacao']);
    $tipo = addslashes($_POST['tipo']);
    $fantasia = addslashes($_POST['fantasia']);
    $natureza_juridica = addslashes($_POST['natureza_juridica']);
    $nivel = addslashes($_POST['nivel']);

    // Configurações do banco de dados
    require_once "../config.php";

    try {
        // Conexão com o banco de dados usando PDO
        $pdo = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta para inserir o usuário na tabela
        $stmt = $pdo->prepare("INSERT INTO parceiros (cnpj, nome, senha, email, atividade_principal, endereco, abertura, porte, situacao, tipo, fantasia, natureza_juridica, nivel) VALUES (:cnpj, :nome, :senha, :email, :atividade_principal, :endereco, :abertura, :porte, :situacao, :tipo, :fantasia, :natureza_juridica, :nivel)");
        $stmt->bindParam(":cnpj", $cnpj);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":senha", $password);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":atividade_principal", $atividade_principal);
        $stmt->bindParam(":endereco", $endereco);
        $stmt->bindParam(":abertura", $abertura);
        $stmt->bindParam(":porte", $porte);
        $stmt->bindParam(":situacao", $situacao);
        $stmt->bindParam(":tipo", $tipo);
        $stmt->bindParam(":fantasia", $fantasia);
        $stmt->bindParam(":natureza_juridica", $natureza_juridica);
        $stmt->bindParam(":nivel", $nivel);
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
            <!-- // header('Location: parceiros.php?error');
            // echo "Erro ao cadastrar usuário: " . $e->getMessage(); -->
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
  