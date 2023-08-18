<?php 
  if(isset($_POST['btn_cadastrar_basicos_usuarios'])):

    $nome_ususario = addslashes($_POST['nome_ususario']);
    $telefone_usuario = addslashes($_POST['telefone_usuario']);
    $email_login = addslashes($_POST['email_login']);
    $libera_xml_pedido = addslashes($_POST['libera_xml_pedido']);
    $libera_painel_producao = addslashes($_POST['libera_painel_producao']);
    $desconto_maximo = addslashes($_POST['desconto_maximo']);        
    $grupo_de_usuarios = addslashes($_POST['grupo_de_usuarios']);
    $observacao = addslashes($_POST['observacao']);
    $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
    $ativo = addslashes($_POST['ativo']);

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
        $stmt = $pdo->prepare("INSERT INTO basicos_usuarios (nome_ususario, telefone_usuario, email_login, libera_xml_pedido, libera_painel_producao, desconto_maximo, grupo_de_usuarios, observacao, ultima_alteracao, ativo) VALUES (:nome_ususario, :telefone_usuario, :email_login, :libera_xml_pedido, :libera_painel_producao, :desconto_maximo, :grupo_de_usuarios, :observacao, :ultima_alteracao, :ativo)");
        $stmt->bindParam(":nome_ususario", $nome_ususario);
        $stmt->bindParam(":telefone_usuario", $telefone_usuario);           
        $stmt->bindParam(":email_login", $email_login);
        $stmt->bindParam(":libera_xml_pedido", $libera_xml_pedido);
        $stmt->bindParam(":libera_painel_producao", $libera_painel_producao);
        $stmt->bindParam(":desconto_maximo", $desconto_maximo);
        $stmt->bindParam(":grupo_de_usuarios", $grupo_de_usuarios);
        $stmt->bindParam(":observacao", $observacao);
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
  