<?php

    if(isset($_POST['btn_cadastrar_vidros'])):

        $descricao = addslashes($_POST['descricao']);
        $agregar = addslashes($_POST['agregar']);
        $unidade = addslashes($_POST['unidade']);
        $liberado_para = addslashes($_POST['liberado_para']);  
        $permite_pintura = addslashes($_POST['permite_pintura']);      
        $codigo_da_fabrica = addslashes($_POST['codigo_da_fabrica']);
        $codigo_produto = addslashes($_POST['codigo_produto']);
        $quantidade = addslashes($_POST['quantidade']);
        $observacao = addslashes($_POST['observacao']);
        $custo_metro = addslashes($_POST['custo_metro']);
        $markup = addslashes($_POST['markup']);
        $markup_avulso = addslashes($_POST['markup_avulso']);
        $metragem_minima = addslashes($_POST['metragem_minima']);
        $valor = addslashes($_POST['valor']);
        $valor_avulso = addslashes($_POST['valor_avulso']);
        $valor_com_perda = addslashes($_POST['valor_com_perda']);
        $perda = addslashes($_POST['perda']);
        $perda_avulso = addslashes($_POST['perda_avulso']);
        $perda_bordas = addslashes($_POST['perda_bordas']);
        $perda_corte = addslashes($_POST['perda_corte']);
        $perda_bordas_retalho = addslashes($_POST['perda_bordas_retalho']);
        $perda_corte_retalho = addslashes($_POST['perda_corte_retalho']);
        $dimensao = addslashes($_POST['dimensao']);
        $imagem = $_FILES['imagem'];
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
          $stmt = $pdo->prepare("INSERT INTO vidros (descricao, agregar, unidade, liberado_para, permite_pintura, codigo_da_fabrica, codigo_produto, quantidade, observacao, custo_metro, markup, markup_avulso, metragem_minima, valor, valor_avulso, valor_com_perda, perda, perda_avulso, perda_bordas, perda_corte, perda_bordas_retalho, perda_corte_retalho, dimensao, imagem, ultima_alteracao, ativo) VALUES (:descricao, :agregar, :unidade, :liberado_para, :permite_pintura, :codigo_da_fabrica, :codigo_produto, :quantidade, :observacao, :custo_metro, :markup, :markup_avulso, :metragem_minima, :valor, :valor_avulso, :valor_com_perda, :perda, :perda_avulso, :perda_bordas, :perda_corte, :perda_bordas_retalho, :perda_corte_retalho, :dimensao, :imagem, :ultima_alteracao, :ativo)");
          $stmt->bindParam(":descricao", $descricao);
          $stmt->bindParam(":agregar", $agregar);
          $stmt->bindParam(":unidade", $unidade);
          $stmt->bindParam(":liberado_para", $liberado_para);
          $stmt->bindParam(":permite_pintura", $permite_pintura);
          $stmt->bindParam(":codigo_da_fabrica", $codigo_da_fabrica);
          $stmt->bindParam(":codigo_produto", $codigo_produto);
          $stmt->bindParam(":quantidade", $quantidade);
          $stmt->bindParam(":observacao", $observacao);
          $stmt->bindParam(":custo_metro", $custo_metro);
          $stmt->bindParam(":markup", $markup);
          $stmt->bindParam(":markup_avulso", $markup_avulso);
          $stmt->bindParam(":metragem_minima", $metragem_minima);
          $stmt->bindParam(":valor", $valor);
          $stmt->bindParam(":valor_avulso", $valor_avulso);
          $stmt->bindParam(":valor_com_perda", $valor_com_perda);
          $stmt->bindParam(":perda", $perda);
          $stmt->bindParam(":perda_avulso", $perda_avulso);
          $stmt->bindParam(":perda_bordas", $perda_bordas);
          $stmt->bindParam(":perda_corte", $perda_corte);
          $stmt->bindParam(":perda_bordas_retalho", $perda_bordas_retalho);
          $stmt->bindParam(":perda_corte_retalho", $perda_corte_retalho);
          $stmt->bindParam(":dimensao", $dimensao);
          $stmt->bindParam(":imagem", $path_image);
          $stmt->bindParam(":ultima_alteracao", $ultima_alteracao);
          $stmt->bindParam(":ativo", $ativo);
          $stmt->execute();

          // Redirecionar para a página principal com a mensagem de sucesso
          header("Location: vidros.php?success=1");
          exit();
          
        } catch (PDOException $e) {
            // Exibir mensagem de erro caso ocorra uma exceção
            echo "Erro ao cadastrar Vidro: " . $e->getMessage();
        }        
    endif;

?>
