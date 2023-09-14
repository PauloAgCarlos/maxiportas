<?php

    if(isset($_POST['btn_cadastrar_produtos'])):

        $descricao_do_produto = addslashes($_POST['descricao_do_produto']);
        $codigo_produto_digitado = addslashes($_POST['codigo_produto']);
        $codigo_produto = "CProdHJ-". $codigo_produto_digitado;
        $quantidade = addslashes($_POST['quantidade']); 
        $codigo_da_fabrica = addslashes($_POST['codigo_da_fabrica']);
        $referencia = addslashes($_POST['referencia']);
        $libera_para_venda = addslashes($_POST['libera_para_venda']); 
        $bloqueia_estoque_negativo = addslashes($_POST['bloqueia_estoque_negativo']); 
        $embalagem_fornecedor = addslashes($_POST['embalagem_fornecedor']);      
        $consumo_medio = addslashes($_POST['consumo_medio']);
        $massa = addslashes($_POST['massa']);
        $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
        $ativo = addslashes($_POST['ativo']);
        $custo_atual = addslashes($_POST['custo_atual']);
        $markup = addslashes($_POST['markup']);
        $venda = addslashes($_POST['venda']);
        $ipi = addslashes($_POST['ipi']);
        $unidade_basica = addslashes($_POST['unidade_basica']);
        $estoque = addslashes($_POST['estoque']);
        $estoque_minimo = addslashes($_POST['estoque_minimo']);
        $estoque_de_seguranca = addslashes($_POST['estoque_de_seguranca']);
        $tempo_de_reposicao = addslashes($_POST['tempo_de_reposicao']);
        $linha = addslashes($_POST['linha']);
        $embalagem = addslashes($_POST['embalagem']);
        $localizador = addslashes($_POST['localizador']);
        $classificacao_fiscal = addslashes($_POST['classificacao_fiscal']);
        $volume = addslashes($_POST['volume']);

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
          $stmt = $pdo->prepare("INSERT INTO produtos (descricao_do_produto, codigo_produto, codigo_da_fabrica, referencia, libera_para_venda, bloqueia_estoque_negativo, embalagem_fornecedor, consumo_medio, massa, ultima_alteracao, ativo, custo_atual, markup, venda, ipi, unidade_basica, estoque, estoque_minimo, estoque_de_seguranca, tempo_de_reposicao, linha, embalagem, localizador, classificacao_fiscal, volume, quantidade_stock) VALUES (:descricao_do_produto, :codigo_produto, :codigo_da_fabrica, :referencia, :libera_para_venda, :bloqueia_estoque_negativo, :embalagem_fornecedor, :consumo_medio, :massa, :ultima_alteracao, :ativo, :custo_atual, :markup, :venda, :ipi, :unidade_basica, :estoque, :estoque_minimo, :estoque_de_seguranca, :tempo_de_reposicao, :linha, :embalagem, :localizador, :classificacao_fiscal, :volume, :quantidade_stock)");
          $stmt->bindParam(":descricao_do_produto", $descricao_do_produto);
          $stmt->bindParam(":codigo_produto", $codigo_produto);
          $stmt->bindParam(":codigo_da_fabrica", $codigo_da_fabrica);
          $stmt->bindParam(":referencia", $referencia);
          $stmt->bindParam(":libera_para_venda", $libera_para_venda);
          $stmt->bindParam(":bloqueia_estoque_negativo", $bloqueia_estoque_negativo);
          $stmt->bindParam(":embalagem_fornecedor", $embalagem_fornecedor);
          $stmt->bindParam(":consumo_medio", $consumo_medio);
          $stmt->bindParam(":massa", $massa);
          $stmt->bindParam(":ultima_alteracao", $ultima_alteracao);
          $stmt->bindParam(":ativo", $ativo);
          $stmt->bindParam(":custo_atual", $custo_atual);
          $stmt->bindParam(":markup", $markup);
          $stmt->bindParam(":venda", $venda);
          $stmt->bindParam(":ipi", $ipi);
          $stmt->bindParam(":unidade_basica", $unidade_basica);
          $stmt->bindParam(":estoque", $estoque);
          $stmt->bindParam(":estoque_minimo", $estoque_minimo);
          $stmt->bindParam(":estoque_de_seguranca", $estoque_de_seguranca);
          $stmt->bindParam(":tempo_de_reposicao", $tempo_de_reposicao);
          $stmt->bindParam(":linha", $linha);
          $stmt->bindParam(":embalagem", $embalagem);
          $stmt->bindParam(":localizador", $localizador);
          $stmt->bindParam(":classificacao_fiscal", $classificacao_fiscal);
          $stmt->bindParam(":volume", $volume);
          $stmt->bindParam(":quantidade_stock", $quantidade);
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
          echo $erro = $e->getMessage();
          die();
          ?>
          
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
