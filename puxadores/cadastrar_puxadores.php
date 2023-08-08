<?php 
  if(isset($_POST['btn_cadastrar_puxadores'])):

    $descricao = addslashes($_POST['descricao']);
    $usinagem_box_tres = addslashes($_POST['usinagem_box_tres']);
    $medida_maxima_para_usinagem = addslashes($_POST['medida_maxima_para_usinagem']);
    $agregar = addslashes($_POST['agregar']);
    $unidade = addslashes($_POST['unidade']);        
    $codigo_da_fabrica = addslashes($_POST['codigo_da_fabrica']);
    
    $codigo_produto_digitado = addslashes($_POST['codigo_produto']);
    $codigo_produto = "CPuHJ-" . $codigo_produto_digitado;
    // $codigo_unico = uniqid();
    // $codigo_produto = "CPuHJ-" . substr($codigo_unico, 10);
    $ponteira_obrigatoria = addslashes($_POST['ponteira_obrigatoria']);
    $referencias_do_mercado = addslashes($_POST['referencias_do_mercado']);
    $custo_metro = addslashes($_POST['custo_metro']);
    $markup = addslashes($_POST['markup']);
    $metragem_minima = addslashes($_POST['metragem_minima']);
    $valor = addslashes($_POST['valor']);
    $desconto_corte = addslashes($_POST['desconto_corte']);
    $perda = addslashes($_POST['perda']);
    $perda_bordas = addslashes($_POST['perda_bordas']);
    $perda_corte = addslashes($_POST['perda_corte']);
    $dimensao = addslashes($_POST['dimensao']);
    $perda_bordas_retalho = addslashes($_POST['perda_bordas_retalho']);
    $perda_corte_retalho = addslashes($_POST['perda_corte_retalho']);
    $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
    $ativo = addslashes($_POST['ativo']);

    
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
        $stmt = $pdo->prepare("INSERT INTO puxadores (descricao, usinagem_box_tres, medida_maxima_para_usinagem, agregar, unidade, codigo_da_fabrica, codigo_produto, ponteira_obrigatoria, referencias_do_mercado, custo_metro, markup, metragem_minima, valor, desconto_corte, perda, perda_bordas, perda_corte, dimensao, perda_bordas_retalho, perda_corte_retalho, imagem, ultima_alteracao, ativo) VALUES (:descricao, :usinagem_box_tres, :medida_maxima_para_usinagem, :agregar, :unidade, :codigo_da_fabrica, :codigo_produto, :ponteira_obrigatoria, :referencias_do_mercado, :custo_metro, :markup, :metragem_minima, :valor, :desconto_corte, :perda, :perda_bordas, :perda_corte, :dimensao, :perda_bordas_retalho, :perda_corte_retalho, :imagem, :ultima_alteracao, :ativo)");
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":usinagem_box_tres", $usinagem_box_tres);
        $stmt->bindParam(":medida_maxima_para_usinagem", $medida_maxima_para_usinagem);            
        $stmt->bindParam(":agregar", $agregar);
        $stmt->bindParam(":unidade", $unidade);
        $stmt->bindParam(":codigo_da_fabrica", $codigo_da_fabrica);
        $stmt->bindParam(":codigo_produto", $codigo_produto);
        $stmt->bindParam(":ponteira_obrigatoria", $ponteira_obrigatoria);
        $stmt->bindParam(":referencias_do_mercado", $referencias_do_mercado);   
        $stmt->bindParam(":custo_metro", $custo_metro);         
        $stmt->bindParam(":markup", $markup);            
        $stmt->bindParam(":metragem_minima", $metragem_minima);           
        $stmt->bindParam(":valor", $valor);
        $stmt->bindParam(":desconto_corte", $desconto_corte);
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
            echo $erro = $e->getMessage(); ?>
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
  