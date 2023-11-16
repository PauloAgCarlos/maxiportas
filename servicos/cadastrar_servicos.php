<?php

    if(isset($_POST['btn_cadastrar_servicos'])):

        $descricao = addslashes($_POST['descricao']);
        $tipo_de_servico = addslashes($_POST['tipo_de_servico']);
        $exibe_no_orcamento = addslashes($_POST['exibe_no_orcamento']);
        $exibe_na_lista_de_corte = addslashes($_POST['exibe_na_lista_de_corte']);  
        $observacao = addslashes($_POST['observacao']);      
        $custo_metro = addslashes($_POST['custo_metro']);
        $codigo_produto = addslashes($_POST['codigo_produto']);
        $markup = addslashes($_POST['markup']);
        $valor = addslashes($_POST['valor']);
        $adiciona_para_o_corte = addslashes($_POST['adiciona_para_o_corte']);
        $calculo = addslashes($_POST['calculo']);
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
            $stmt = $pdo->prepare("INSERT INTO servicos (descricao, tipo_de_servico, exibe_no_orcamento, exibe_na_lista_de_corte, observacao, custo_metro, codigo_produto, markup, valor, adiciona_para_o_corte, calculo, codigo_da_fabrica, ultima_alteracao, ativo) VALUES (:descricao, :tipo_de_servico, :exibe_no_orcamento, :exibe_na_lista_de_corte, :observacao, :custo_metro, :codigo_produto, :markup, :valor, :adiciona_para_o_corte, :calculo, :codigo_da_fabrica, :ultima_alteracao, :ativo)");
            $stmt->bindParam(":descricao", $descricao);
            $stmt->bindParam(":tipo_de_servico", $tipo_de_servico);
            $stmt->bindParam(":exibe_no_orcamento", $exibe_no_orcamento);
            $stmt->bindParam(":exibe_na_lista_de_corte", $exibe_na_lista_de_corte);
            $stmt->bindParam(":observacao", $observacao);
            $stmt->bindParam(":custo_metro", $custo_metro);
            $stmt->bindParam(":codigo_produto", $codigo_produto);
            $stmt->bindParam(":markup", $markup);
            $stmt->bindParam(":valor", $valor);
            $stmt->bindParam(":adiciona_para_o_corte", $adiciona_para_o_corte);
            $stmt->bindParam(":calculo", $calculo);
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
