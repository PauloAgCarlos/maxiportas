<?php 
  if(isset($_POST['btn_cadastrar_travessas'])):

    $descricao = addslashes($_POST['descricao']);
    $codigo_produto_digitado = addslashes($_POST['codigo_produto']);
    $codigo_produto = "CTHJ-" . $codigo_produto_digitado;
    // $codigo_unico = uniqid();
    // $codigo_produto_reduzido = substr_replace($codigo_unico, 5,-1);
    // $codigo_produto = "CTHJ-" . substr($codigo_unico, 10);
    $agregar = addslashes($_POST['agregar']);
    $unidade = addslashes($_POST['unidade']);
    $esquadreta = addslashes($_POST['esquadreta']);
    $oculto = addslashes($_POST['oculto']);
    $referencias_do_mercado = addslashes($_POST['referencias_do_mercado']);        
    $custo_metro = addslashes($_POST['custo_metro']);
    $markup = addslashes($_POST['markup']);
    $valor = addslashes($_POST['valor']);
    $desconto_corte_vidro = addslashes($_POST['desconto_corte_vidro']);
    $perda = addslashes($_POST['perda']);
    $perda_bordas = addslashes($_POST['perda_bordas']);
    $perda_corte = addslashes($_POST['perda_corte']);
    $dimensao = addslashes($_POST['dimensao']);
    $perda_bordas_retalho = addslashes($_POST['perda_bordas_retalho']);
    $perda_corte_retalho = addslashes($_POST['perda_corte_retalho']);
    $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
    $ativo = addslashes($_POST['ativo']);
        
    $imagem = $_FILES['imagem'];
    // if(!empty($imagem))
    // {
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
        $stmt = $pdo->prepare("INSERT INTO travessas (descricao, codigo_produto, agregar, unidade, esquadreta, oculto, referencias_do_mercado, custo_metro, markup, valor, desconto_corte_vidro, perda, perda_bordas, perda_corte, dimensao, perda_bordas_retalho, perda_corte_retalho, imagem, ultima_alteracao, ativo) VALUES (:descricao, :codigo_produto, :agregar, :unidade, :esquadreta, :oculto, :referencias_do_mercado, :custo_metro, :markup, :valor, :desconto_corte_vidro, :perda, :perda_bordas, :perda_corte, :dimensao, :perda_bordas_retalho, :perda_corte_retalho, :imagem, :ultima_alteracao, :ativo)");
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":codigo_produto", $codigo_produto);
        $stmt->bindParam(":agregar", $agregar);
        $stmt->bindParam(":unidade", $unidade);            
        $stmt->bindParam(":esquadreta", $esquadreta);
        $stmt->bindParam(":oculto", $oculto);
        $stmt->bindParam(":referencias_do_mercado", $referencias_do_mercado);
        $stmt->bindParam(":custo_metro", $custo_metro);
        $stmt->bindParam(":markup", $markup);
        $stmt->bindParam(":valor", $valor);   
        $stmt->bindParam(":desconto_corte_vidro", $desconto_corte_vidro);         
        $stmt->bindParam(":perda", $perda);            
        $stmt->bindParam(":perda_bordas", $perda_bordas);           
        $stmt->bindParam(":perda_corte", $perda_corte);
        $stmt->bindParam(":dimensao", $dimensao);
        $stmt->bindParam(":perda_bordas_retalho", $perda_bordas_retalho);
        $stmt->bindParam(":perda_corte_retalho", $perda_corte_retalho);
        $stmt->bindParam(":imagem", $path_image);
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
  