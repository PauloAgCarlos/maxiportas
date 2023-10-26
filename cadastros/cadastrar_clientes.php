<?php 
  if(isset($_POST['btn_cadastrar_clientes'])):

    $cpf_cnpj = addslashes($_POST['cpfcnpj']);
    $nome_razao_social = addslashes($_POST['nomerazaosocial']);
    $contato = addslashes($_POST['contato']);
    $telefone = addslashes($_POST['telefone']);
    $celular = addslashes($_POST['celular']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $cep = addslashes($_POST['cep']);
    $rua = addslashes($_POST['rua']);
    $complemento = addslashes($_POST['complemento']);
    $bairro = addslashes($_POST['bairro']);
    $cidade = addslashes($_POST['cidade']);
    $numero = addslashes($_POST['numero']);        
    $estado = addslashes($_POST['estado']);

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
        $stmt = $pdo->prepare("INSERT INTO clientes (cpf_cnpj, nome_razao_socil, contato, telefone, celular, email, senha, cep, rua, numero, complemento, bairro, cidade, estado) VALUES (:cpf_cnpj, :nome_razao_socil, :contato, :telefone, :celular, :email, :senha, :cep, :rua, :numero, :complemento, :bairro, :cidade, :estado)");
        $stmt->bindParam(":cpf_cnpj", $cpf_cnpj);
        $stmt->bindParam(":nome_razao_socil", $nome_razao_social);
        $stmt->bindParam(":contato", $contato);
        $stmt->bindParam(":telefone", $telefone);
        $stmt->bindParam(":celular", $celular);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha);
        $stmt->bindParam(":cep", $cep);
        $stmt->bindParam(":rua", $rua);
        $stmt->bindParam(":numero", $numero);
        $stmt->bindParam(":complemento", $complemento);
        $stmt->bindParam(":bairro", $bairro);
        $stmt->bindParam(":cidade", $cidade);
        $stmt->bindParam(":estado", $estado);
        $stmt->execute();

        if($stmt)
        { 
        
          //Cadastrar tbl_clientes_system
          $tbl_clientes_system = $pdo->prepare("INSERT INTO tbl_clientes_system (nome, endereco, bairro, cidade, fone, cep) VALUES (:nome, :endereco, :bairro, :cidade, :fone, :cep)");
          $tbl_clientes_system->bindParam(":nome", $nome_razao_social);
          $tbl_clientes_system->bindParam(":endereco", $rua);
          $tbl_clientes_system->bindParam(":bairro", $bairro);
          $tbl_clientes_system->bindParam(":cidade", $cidade);
          $tbl_clientes_system->bindParam(":fone", $celular);
          $tbl_clientes_system->bindParam(":cep", $cep);
          $tbl_clientes_system->execute();

        ?>

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
            <!-- // header('Location: clientes.php?error');
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
  