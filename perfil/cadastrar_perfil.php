<?php 
  if(isset($_POST['btn_cadastrar_perfil'])):

    $descricao = addslashes($_POST['descricao']);
    $puxadoracoplado = addslashes($_POST['puxadoracoplado']);
    $ponteira_acoplado = addslashes($_POST['ponteira_acoplado']);
    $ponteira_obrigatoria = addslashes($_POST['ponteira_obrigatoria']);
    $exige_pinturano_vidro = addslashes($_POST['exige_pinturano_vidro']);
    $agregar = addslashes($_POST['agregar']);
    $unidade = addslashes($_POST['unidade']);
    $vidro = addslashes($_POST['vidro']);
    $esquadreta = addslashes($_POST['esquadreta']);
    $esquadreta_reforcada_a = addslashes($_POST['esquadreta_reforcada_a']);
    $esquadreta_reforcada_b = addslashes($_POST['esquadreta_reforcada_b']);
    $esquadreta_dupla = addslashes($_POST['esquadreta_dupla']);
    $custo_metro = addslashes($_POST['custo_metro']);        
    $desconto_corte_perfil = addslashes($_POST['desconto_corte_perfil']);
    $desconto_corte_vidro = addslashes($_POST['desconto_corte_vidro']);
    $desconto_corte_travessa = addslashes($_POST['desconto_corte_travessa']);
    $desconto_corte_travessa_oculta = addslashes($_POST['desconto_corte_travessa_oculta']);
    $perda_bordas = addslashes($_POST['perda_bordas']);
    $perda_corte = addslashes($_POST['perda_corte']);
    $dimensao = addslashes($_POST['dimensao']);
    $perda_bordas_retalho = addslashes($_POST['perda_bordas_retalho']);
    $perda_corte_retalho = addslashes($_POST['perda_corte_retalho']);

    $codigo_produto_digitado = addslashes($_POST['codigo_produto']);
    $codigo_produto = "CPHJ-" . $codigo_produto_digitado;
    // $codigo_unico = uniqid();
    // $codigo_produto = "CPHJ-" . substr($codigo_unico, 10);
    $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
    $largura_da_mascara = addslashes($_POST['largura_da_mascara']);
    $codigo_da_fabrica = addslashes($_POST['codigo_da_fabrica']);
    $referencias_do_mercado = addslashes($_POST['referencias_do_mercado']);
    $detalhes = addslashes($_POST['detalhes']);
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
        $stmt = $pdo->prepare("INSERT INTO perfil (descricao, puxadoracoplado, ponteira_acoplado, ponteira_obrigatoria, exige_pinturano_vidro, agregar, unidade, vidro, esquadreta, esquadreta_reforcada_a, esquadreta_reforcada_b, esquadreta_dupla, custo_metro, desconto_corte_perfil, desconto_corte_vidro, desconto_corte_travessa, desconto_corte_travessa_oculta, perda_bordas, perda_corte, dimensao, perda_bordas_retalho, perda_corte_retalho, codigo_produto, ultima_alteracao, largura_da_mascara, codigo_da_fabrica, referencias_do_mercado, detalhes, imagem, ativo) VALUES (:descricao, :puxadoracoplado, :ponteira_acoplado, :ponteira_obrigatoria, :exige_pinturano_vidro, :agregar, :unidade, :vidro, :esquadreta, :esquadreta_reforcada_a, :esquadreta_reforcada_b, :esquadreta_dupla, :custo_metro, :desconto_corte_perfil, :desconto_corte_vidro, :desconto_corte_travessa, :desconto_corte_travessa_oculta, :perda_bordas, :perda_corte, :dimensao, :perda_bordas_retalho, :perda_corte_retalho, :codigo_produto, :ultima_alteracao, :largura_da_mascara, :codigo_da_fabrica, :referencias_do_mercado, :detalhes, :imagem, :ativo)");
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":puxadoracoplado", $puxadoracoplado);
        $stmt->bindParam(":ponteira_acoplado", $ponteira_acoplado);            
        $stmt->bindParam(":ponteira_obrigatoria", $ponteira_obrigatoria);
        $stmt->bindParam(":exige_pinturano_vidro", $exige_pinturano_vidro);
        $stmt->bindParam(":agregar", $agregar);
        $stmt->bindParam(":unidade", $unidade);
        $stmt->bindParam(":vidro", $vidro);
        $stmt->bindParam(":esquadreta", $esquadreta);   
        $stmt->bindParam(":esquadreta_reforcada_a", $esquadreta_reforcada_a);         
        $stmt->bindParam(":esquadreta_reforcada_b", $esquadreta_reforcada_b);            
        $stmt->bindParam(":esquadreta_dupla", $esquadreta_dupla);           
        $stmt->bindParam(":custo_metro", $custo_metro);
        $stmt->bindParam(":desconto_corte_perfil", $desconto_corte_perfil);
        $stmt->bindParam(":desconto_corte_vidro", $desconto_corte_vidro);
        $stmt->bindParam(":desconto_corte_travessa", $desconto_corte_travessa);
        $stmt->bindParam(":desconto_corte_travessa_oculta", $desconto_corte_travessa_oculta);
        $stmt->bindParam(":perda_bordas", $perda_bordas);
        $stmt->bindParam(":perda_corte", $perda_corte);
        $stmt->bindParam(":dimensao", $dimensao);
        $stmt->bindParam(":perda_bordas_retalho", $perda_bordas_retalho);
        $stmt->bindParam(":perda_corte_retalho", $perda_corte_retalho);
        $stmt->bindParam(":codigo_produto", $codigo_produto);
        $stmt->bindParam(":ultima_alteracao", $ultima_alteracao);
        $stmt->bindParam(":largura_da_mascara", $largura_da_mascara);
        $stmt->bindParam(":codigo_da_fabrica", $codigo_da_fabrica);
        $stmt->bindParam(":referencias_do_mercado", $referencias_do_mercado);
        $stmt->bindParam(":detalhes", $detalhes);
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
  