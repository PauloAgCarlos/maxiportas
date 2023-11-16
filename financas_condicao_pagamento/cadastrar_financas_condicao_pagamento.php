<?php 
  if(isset($_POST['btn_cadastrar_financas_condicao_pagamento'])):

    $descricao = addslashes($_POST['descricao']);
    $codigo_produto_digitado = addslashes($_POST['codigo_produto']);
    $codigo_produto = "CFinHJ-" . $codigo_produto_digitado;
    $tipo = addslashes($_POST['tipo']);
    $ultima_alteracao = addslashes($_POST['ultima_alteracao']);
    $ativo = addslashes($_POST['ativo']);
    $numero_de_parcelas = addslashes($_POST['numero_de_parcelas']);
    $markup = addslashes($_POST['markup']);
    $prazo_primeira_parcela_dias = addslashes($_POST['prazo_primeira_parcela_dias']);
    $prazo_segunda_parcela_dias = addslashes($_POST['prazo_segunda_parcela_dias']);        
    $intervalo_entre_parcelas_dias = addslashes($_POST['intervalo_entre_parcelas_dias']);
    $entrada = addslashes($_POST['entrada']);

    // Configurações do banco de dados
    require_once "../config.php";

    try {
        // Conexão com o banco de dados usando PDO
        $pdo = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta para inserir o usuário na tabela
        $stmt = $pdo->prepare("INSERT INTO financas_condicao_pagamento (descricao, codigo_produto, tipo, ultima_alteracao, ativo, numero_de_parcelas, markup, prazo_primeira_parcela_dias, prazo_segunda_parcela_dias, intervalo_entre_parcelas_dias, entrada) VALUES (:descricao, :codigo_produto, :tipo, :ultima_alteracao, :ativo, :numero_de_parcelas, :markup, :prazo_primeira_parcela_dias, :prazo_segunda_parcela_dias, :intervalo_entre_parcelas_dias, :entrada)");
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":codigo_produto", $codigo_produto);  
        $stmt->bindParam(":tipo", $tipo);        
        $stmt->bindParam(":ultima_alteracao", $ultima_alteracao);
        $stmt->bindParam(":ativo", $ativo);
        $stmt->bindParam(":numero_de_parcelas", $numero_de_parcelas);
        $stmt->bindParam(":markup", $markup);            
        $stmt->bindParam(":prazo_primeira_parcela_dias", $prazo_primeira_parcela_dias);
        $stmt->bindParam(":prazo_segunda_parcela_dias", $prazo_segunda_parcela_dias);
        $stmt->bindParam(":intervalo_entre_parcelas_dias", $intervalo_entre_parcelas_dias);
        $stmt->bindParam(":entrada", $entrada); 
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
  