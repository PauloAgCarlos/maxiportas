<?php

    if(isset($_POST['btn_enviar_solicitacao'])):

        $nome_cliente = addslashes($_POST['nome_cliente']);
        $descricao_pedido = addslashes($_POST['descricao_pedido']);
        $data_inicial = addslashes($_POST['data_inicial']);
        $data_final = addslashes($_POST['data_final']);
        $status = addslashes($_POST['status']);

        if(isset($descricao_pedido) and !empty($descricao_pedido))
        {

          // Configurações do banco de dados
          $dbHost = "localhost";
          $dbName = "maxportas";
          $dbUsuario = "root";
          $dbSenha = "";

          try {
              $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsuario, $dbSenha);
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              $stmt = $pdo->prepare("INSERT INTO pedidos_dos_clientes (nome_cliente, descricao_pedido, data_inicial, data_final, status) VALUES (:nome_cliente, :descricao_pedido, :data_inicial, :data_final, :status)");
              $stmt->bindParam(":nome_cliente", $nome_cliente);
              $stmt->bindParam(":descricao_pedido", $descricao_pedido);
              $stmt->bindParam(":data_inicial", $data_inicial);
              $stmt->bindParam(":data_final", $data_final);
              $stmt->bindParam(":status", $status);
              $stmt->execute();

              if($stmt)
              { ?>

                <script>
                  const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 5000,
                  timerProgressBar: true,
                  didOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
                  })

                  Toast.fire({
                  icon: 'success',
                  title: 'Solicitação Enviada Com Sucesso!'
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
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toaste.fire({
                icon: 'error',
                title: 'Erro ao Enviar Solicitação!'
                })
              </script>
        <?php  }
        } else { ?>

            <script>
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Preencha Descrição Produto/Serviço não pode esta vazio!',
                showConfirmButton: true,
                timer: 7000
                });
            </script>

      <?php }
     
  endif;

?>
