<?php 
  if(isset($_POST['btn_cadastrar_parceiros'])):

    $razaosocial = addslashes($_POST['razaosocial']);
    $nomefantasia = addslashes($_POST['nomefantasia']);
    $complemento = addslashes($_POST['complemento']);
    $cidade = addslashes($_POST['cidade']);
    $endreco = addslashes($_POST['endreco']);
    $email = addslashes($_POST['email']);
    $instagram = addslashes($_POST['instagram']);
    $facebook = addslashes($_POST['facebook']);
    $codigointerno = addslashes($_POST['codigointerno']);
    $bairro = addslashes($_POST['bairro']);
    $cnpj = addslashes($_POST['cnpj']);
    $cep = addslashes($_POST['cep']);
    $uf = addslashes($_POST['uf']);        
    $ie = addslashes($_POST['ie']);
    $numero = addslashes($_POST['numero']);
    $telefone = addslashes($_POST['telefone']);
    
    $imagem = $_FILES['imagem'];
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
        $stmt = $pdo->prepare("INSERT INTO parceiros (razaosocial, nomefantasia,complemento, cidade, endreco, email, instagram, facebook, codigointerno, bairro, cnpj, cep, uf, ie, numero, telefone, imagem) VALUES (:razaosocial, :nomefantasia, :complemento, :cidade, :endreco, :email, :instagram, :facebook, :codigointerno, :bairro, :cnpj, :cep, :uf, :ie, :numero, :telefone, :imagem)");
        $stmt->bindParam(":razaosocial", $razaosocial);
        $stmt->bindParam(":nomefantasia", $nomefantasia);
        $stmt->bindParam(":complemento", $complemento);            
        $stmt->bindParam(":cidade", $cidade);
        $stmt->bindParam(":endreco", $endreco);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":instagram", $instagram);
        $stmt->bindParam(":facebook", $facebook);
        $stmt->bindParam(":codigointerno", $codigointerno);   
        $stmt->bindParam(":bairro", $bairro);         
        $stmt->bindParam(":cnpj", $cnpj);            
        $stmt->bindParam(":cep", $cep);           
        $stmt->bindParam(":uf", $uf);
        $stmt->bindParam(":ie", $ie);
        $stmt->bindParam(":numero", $numero);
        $stmt->bindParam(":telefone", $telefone);
        $stmt->bindParam(":imagem", $path_image);
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
  