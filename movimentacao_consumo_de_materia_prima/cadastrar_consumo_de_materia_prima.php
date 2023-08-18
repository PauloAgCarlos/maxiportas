<?php 
  if(isset($_POST['btn_cadastrar_consumo_de_materia_prima'])):

    $descricao = addslashes($_POST['descricao']);
    $codigo_produto_digitado = addslashes($_POST['codigo_produto']);
    $codigo_produto = "CConMatPriHJ-" . $codigo_produto_digitado;
    $codigo_da_fabrica = addslashes($_POST['codigo_da_fabrica']);
    $tipo = addslashes($_POST['tipo']);
    $unidade = addslashes($_POST['unidade']);
    $op = addslashes($_POST['op']);
    $consumo = addslashes($_POST['consumo']);        
    $perda = addslashes($_POST['perda']);
    $total = addslashes($_POST['total']);
    $data_pedido = addslashes($_POST['data_pedido']);
    $entrou_em_producao = addslashes($_POST['entrou_em_producao']);
    $produzido = addslashes($_POST['produzido']);
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
        $stmt = $pdo->prepare("INSERT INTO movimentacao_consumo_de_materia_prima (descricao, codigo_produto, codigo_da_fabrica, tipo, unidade, op, consumo, perda, total, data_pedido, entrou_em_producao, produzido, ativo) VALUES (:descricao, :codigo_produto, :codigo_da_fabrica, :tipo, :unidade, :op, :consumo, :perda, :total, :data_pedido, :entrou_em_producao, :produzido, :ativo)");
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":codigo_produto", $codigo_produto);
        $stmt->bindParam(":codigo_da_fabrica", $codigo_da_fabrica);
        $stmt->bindParam(":tipo", $tipo);            
        $stmt->bindParam(":unidade", $unidade);
        $stmt->bindParam(":op", $op);
        $stmt->bindParam(":consumo", $consumo);
        $stmt->bindParam(":perda", $perda);
        $stmt->bindParam(":total", $total);
        $stmt->bindParam(":data_pedido", $data_pedido);   
        $stmt->bindParam(":entrou_em_producao", $entrou_em_producao);
        $stmt->bindParam(":produzido", $produzido);
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
  